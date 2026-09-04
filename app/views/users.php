<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px;
            font-family: Arial, sans-serif;
            background-color: #eef4ff;
            color: #333;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background-color: #ffffff;
            padding: 25px;
            border-radius: 10px;
            border-top: 4px solid #4f7cff;
            box-shadow: 0 4px 15px rgba(79, 124, 255, 0.08);
        }

        h1 {
            margin: 0 0 20px;
            font-size: 24px;
            font-weight: 600;
            color: #3158c7;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th {
            padding: 13px 15px;
            text-align: left;
            font-size: 13px;
            font-weight: 600;
            color: #ffffff;
            background-color: #4f7cff;
        }

        th:first-child {
            border-radius: 6px 0 0 0;
        }

        th:last-child {
            border-radius: 0 6px 0 0;
        }

        td {
            padding: 14px 15px;
            font-size: 14px;
            border-bottom: 1px solid #e5eaf5;
        }

        tbody tr:hover {
            background-color: #f3f6ff;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .id {
            color: #3158c7;
            font-weight: 600;
        }

        .email {
            color: #555;
        }

        .username {
            color: #3158c7;
        }

        .no-data {
            text-align: center;
            padding: 30px;
            color: #888;
        }

        @media (max-width: 600px) {
            body {
                padding: 15px;
            }

            .container {
                padding: 18px;
            }

            h1 {
                font-size: 21px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Users</h1>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Username</th>
                </tr>
            </thead>

            <tbody>

                <?php if (!empty($users)): ?>

                    <?php foreach ($users as $user): ?>

                        <tr>
                            <td class="id">
                                <?= htmlspecialchars($user['id']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($user['firstname']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($user['lastname']) ?>
                            </td>

                            <td class="email">
                                <?= htmlspecialchars($user['email']) ?>
                            </td>

                            <td class="username">
                                <?= htmlspecialchars($user['username']) ?>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>
                        <td colspan="5" class="no-data">
                            No users found.
                        </td>
                    </tr>

                <?php endif; ?>

            </tbody>
        </table>
    </div>

</div>

</body>
</html>

