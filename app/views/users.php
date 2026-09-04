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
            background-color: #f5f5f5;
            color: #333;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background-color: #fff;
            padding: 25px;
            border-radius: 8px;
        }

        h1 {
            margin: 0 0 20px;
            font-size: 24px;
            font-weight: 600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 12px 15px;
            text-align: left;
            font-size: 13px;
            font-weight: 600;
            background-color: #f5f5f5;
            border-bottom: 1px solid #ddd;
        }

        td {
            padding: 14px 15px;
            font-size: 14px;
            border-bottom: 1px solid #eee;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover {
            background-color: #fafafa;
        }

        .no-data {
            text-align: center;
            padding: 25px;
            color: #888;
        }

        .table-wrapper {
            overflow-x: auto;
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

            table {
                min-width: 650px;
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
                            <td><?= htmlspecialchars($user['id']) ?></td>
                            <td><?= htmlspecialchars($user['firstname']) ?></td>
                            <td><?= htmlspecialchars($user['lastname']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td><?= htmlspecialchars($user['username']) ?></td>
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

