<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ApiController extends Controller
{
    public function before_action()
    {
        $this->call->library('api');
    }

    public function preflight()
    {
        $this->api->respond([], 204);
    }

    public function login()
    {
        $input = $this->input();
        $username = trim($input['username'] ?? '');
        $password = $input['password'] ?? '';

        if ($username === '' || !is_string($password) || $password === '') {
            $this->api->respond_error('Username and password are required.', 400);
        }

        $this->call->database();
        $this->call->model('UsersModel');
        $user = $this->UsersModel->find_by('username', $username);

        if (!$user || !password_verify($password, $user['password'])) {
            $this->api->respond_error('Invalid username or password.', 401);
        }
        if (isset($user['is_active']) && !$user['is_active']) {
            $this->api->respond_error('This account has been deactivated.', 403);
        }

        $tokens = $this->api->issue_tokens([
            'id' => (int) $user['id'],
            'role' => $user['role'] ?? 'user',
        ]);

        $this->api->respond([
            'user' => $this->public_user($user),
            'tokens' => $tokens,
        ]);
    }

    public function register()
    {
        $input = $this->input();
        $username = trim($input['username'] ?? '');
        $email = trim($input['email'] ?? '');
        $password = $input['password'] ?? '';

        if ($username === '' || $email === '' || !is_string($password) || $password === '') {
            $this->api->respond_error('Username, email, and password are required.', 400);
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->api->respond_error('Enter a valid email address.', 400);
        }
        if (strlen($password) < 6) {
            $this->api->respond_error('Password must be at least 6 characters.', 400);
        }

        $this->call->database();
        $this->call->model('UsersModel');

        if ($this->UsersModel->find_by('username', $username)) {
            $this->api->respond_error('That username is already taken.', 409);
        }
        if ($this->UsersModel->find_by('email', $email)) {
            $this->api->respond_error('That email is already registered.', 409);
        }

        $this->UsersModel->insert([
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => 'user',
            'is_active' => 1,
        ]);

        $user = $this->UsersModel->find_by('username', $username);
        $this->api->respond(['user' => $this->public_user($user)], 201);
    }

    public function refresh()
    {
        $input = $this->input();
        $refreshToken = $input['refresh_token'] ?? '';
        if (!is_string($refreshToken) || $refreshToken === '') {
            $this->api->respond_error('Refresh token is required.', 400);
        }

        $this->call->database();
        $this->api->refresh_access_token($refreshToken);
    }

    public function logout()
    {
        $input = $this->input();
        $refreshToken = $input['refresh_token'] ?? '';
        if (is_string($refreshToken) && $refreshToken !== '') {
            $this->call->database();
            $this->api->revoke_refresh_token($refreshToken);
        }

        $this->api->respond(['message' => 'Logged out successfully.']);
    }

    public function me()
    {
        $payload = $this->api->require_jwt();
        $this->call->database();
        $this->call->model('UsersModel');
        $user = $this->UsersModel->find((int) $payload['sub']);

        if (!$user) {
            $this->api->respond_error('User not found.', 404);
        }

        $this->api->respond(['user' => $this->public_user($user)]);
    }

    public function products()
    {
        $this->api->require_jwt();
        $this->call->database();
        $this->call->model('ProductModel');
        $this->api->respond(['data' => $this->ProductModel->all()]);
    }

    public function create_product()
    {
        $this->require_admin();
        $this->call->model('ProductModel');
        $input = $this->product_input($this->input());
        if (isset($input['error'])) {
            $this->api->respond_error($input['error'], 400);
        }

        $id = $this->ProductModel->insert($input);
        $this->api->respond(['data' => $this->ProductModel->find($id)], 201);
    }

    public function update_product($id)
    {
        $this->require_admin();
        $this->call->model('ProductModel');
        if (!$this->ProductModel->find((int) $id)) {
            $this->api->respond_error('Product not found.', 404);
        }

        $input = $this->product_input($this->input());
        if (isset($input['error'])) {
            $this->api->respond_error($input['error'], 400);
        }

        $this->ProductModel->update((int) $id, $input);
        $this->api->respond(['data' => $this->ProductModel->find((int) $id)]);
    }

    public function delete_product($id)
    {
        $this->require_admin();
        $this->call->model('ProductModel');
        if (!$this->ProductModel->find((int) $id)) {
            $this->api->respond_error('Product not found.', 404);
        }

        $this->ProductModel->delete((int) $id);
        $this->api->respond(['message' => 'Product deleted successfully.']);
    }

    private function require_admin()
    {
        $payload = $this->api->require_jwt();
        $this->call->database();
        $this->call->model('UsersModel');
        $user = $this->UsersModel->find((int) $payload['sub']);

        if (!$user || (int) ($user['is_active'] ?? 0) !== 1) {
            $this->api->respond_error('Unauthorized', 401);
        }
        if (($user['role'] ?? 'user') !== 'admin') {
            $this->api->respond_error('Admin access required.', 403);
        }
    }

    private function input()
    {
        $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
        if (stripos($contentType, 'application/json') !== false) {
            $input = json_decode(file_get_contents('php://input'), true);
            return is_array($input) ? $input : [];
        }

        return $_POST;
    }

    private function public_user(array $user)
    {
        return [
            'id' => (int) $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'role' => $user['role'],
        ];
    }

    private function product_input(array $input)
    {
        $name = trim($input['product_name'] ?? '');
        $description = trim($input['description'] ?? '');
        $price = $input['price'] ?? null;
        $quantity = $input['quantity'] ?? null;

        if ($name === '' || strlen($name) > 100) {
            return ['error' => 'Product name is required and must be 100 characters or fewer.'];
        }
        if (!is_numeric($price) || (float) $price < 0) {
            return ['error' => 'Price must be a valid non-negative number.'];
        }
        if (!is_scalar($quantity) || !ctype_digit((string) $quantity)) {
            return ['error' => 'Quantity must be a non-negative whole number.'];
        }

        return [
            'product_name' => $name,
            'description' => $description,
            'price' => number_format((float) $price, 2, '.', ''),
            'quantity' => (int) $quantity,
        ];
    }
}
