```php
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
            padding: 40px 20px;
            font-family: Arial, sans-serif;
            background: #f8fafc;
            color: #1f2937;
        }

        .container {
            max-width: 1050px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0;
            font-size: 26px;
            font-weight: 600;
            color: #111827;
        }

        .user-count {
            font-size: 14px;
            color: #6b7280;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        th {
            padding: 14px 16px;
            text-align: left;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6b7280;
            background: #f9fafb;
            border-bottom: 1px solid #e5e7eb;
        }

        td {
            padding: 16px;
            font-size: 14px;
            border-bottom: 1px solid #f0f0f0;
        }

        tbody tr {
            transition: background-color 0.2s ease;
        }

        tbody tr:hover {
            background: #fafafa;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .id {
            color: #6b7280;
            font-weight: 500;
        }

        .name {
            font-weight: 500;
            color: #111827;
        }

        .email {
            color: #4b5563;
        }

        .username {
            color: #4b5563;
        }

        .no-data {
            text-align: center;
            padding: 40px 20px;
            color: #9ca3af;
        }

        @media (max-width: 700px) {
            body {
                padding: 20px 10px;
            }

            .container {
                padding: 20px;
            }

            .header {
                align-items: flex-start;
                flex-direction: column;
                gap: 5px;
            }

            h1 {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Users</h1>

        <div class="user-count">
            <?= !empty($users) ? count($users) . ' users' : '0 users' ?>
        </div>
    </div>

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

                            <td class="name">
                                <?= htmlspecialchars($user['firstname']) ?>
                            </td>

                            <td class="name">
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
```
