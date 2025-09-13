<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>View</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            margin: 0;
            padding: 20px;
            color: #fff;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            text-shadow: 2px 2px 6px rgba(0,0,0,0.5);
        }

        /* Container for the button and table */
        .table-container {
            width: 80%;
            margin: 0 auto;
        }

        /* Add User Button */
        .add-btn {
            display: inline-block;
            margin-bottom: 12px;
            padding: 12px 20px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
        }

        .add-btn:hover {
            background: linear-gradient(135deg, #5a67d8, #6b46c1);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.4);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0px 8px 20px rgba(0,0,0,0.5);
            border-radius: 10px;
            overflow: hidden;
            background: #fff;
            color: #333;
        }

        th, td {
            padding: 15px 20px;
            text-align: center;
        }

        th {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            font-size: 18px;
        }

        tr {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        tr:nth-child(odd) {
            background: #f0f0f0;
        }

        tr:hover {
            transform: scale(1.02);
            box-shadow: 0px 5px 15px rgba(0,0,0,0.3);
            background: #e0f7fa;
        }

        a {
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: bold;
            transition: 0.3s;
        }

        a[href*="update"] {
            background: #4CAF50;
            color: white;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        }

        a[href*="update"]:hover {
            background: #45a049;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.3);
        }

        a[href*="delete"] {
            background: #e53935;
            color: white;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        }

        a[href*="delete"]:hover {
            background: #d32f2f;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>
    <h1>Welcome to the User Page</h1>

    <div class="table-container">
        <!-- Add New User Button -->
        <a href="<?= site_url('user/create'); ?>">
            <button type="button" class="add-btn">+ Add New User</button>
        </a>

        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>

            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['username']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td>
                        <a href="<?= site_url('user/update/'.$user['id']); ?>" title="Edit" class="btn-action btn-edit">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="<?= site_url('user/delete/'.$user['id']); ?>" 
                        onclick="return confirm('Are you sure you want to delete this user?');" 
                        title="Delete" class="btn-action btn-delete">
                            <i class="fas fa-trash-alt"></i> Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
