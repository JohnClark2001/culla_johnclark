<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
        /* Top bar for Add button + Search */
        .top-bar {
            display: flex;
            justify-content: space-between; /* left and right alignment */
            align-items: center;
            margin-bottom: 20px;
        }

        /* Search Form */
        .search-form {
            display: flex;
            gap: 8px;
        }

        .search-form input {
            width: 250px;   /* adjust this value (250–300px looks good) */
            padding: 10px 14px;
            border: none;
            border-radius: 6px;
            outline: none;
            font-size: 14px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.3);
        }

        .search-btn {
            padding: 10px 16px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 3px 6px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            background: linear-gradient(135deg, #5a67d8, #6b46c1);
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(0,0,0,0.4);
        }

        /* Show All styled same as Search */
        .show-all-btn .search-btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 3px 6px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
            padding: 10px 16px;
        }

        .show-all-btn .search-btn:hover {
            background: linear-gradient(135deg, #5a67d8, #6b46c1);
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(0,0,0,0.4);
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin: 25px auto 0;
            flex-wrap: wrap; /* mobile-friendly */
        }

        .pagination .page-link {
            position: relative;
            padding: 10px 18px;
            background: #ffffff;
            color: #4a4a4a;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: all 0.25s ease;
        }

        .pagination .page-link:hover {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 6px 14px rgba(0,0,0,0.2);
        }

        .pagination .page-link.active {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            box-shadow: 0 6px 16px rgba(0,0,0,0.25);
            pointer-events: none; /* no click on active */
        }

    </style>
</head>
<body>
    <h1>Welcome to the User Page</h1>

    <div class="table-container">
    <!-- Top bar -->
<div class="top-bar">
    <!-- Add New User Button -->
    <a href="<?= site_url('user/create'); ?>">
        <button type="button" class="add-btn">+ Add New User</button>
    </a>

    <!-- Search Form + Show All -->
    <form action="#" method="get" class="search-form">
        <input type="text" name="q" placeholder="Search by username or email">
        <button type="submit" class="search-btn">Search</button>
        <a href="<?= site_url('user'); ?>" class="show-all-btn">
            <button type="button" class="search-btn">Show All</button>
        </a>
    </form>
</div>
<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Action</th>
    </tr>

    <?php if (!empty($users)): ?>
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
    <?php else: ?>
        <tr>
            <td colspan="4" class="no-data">🚫 No users found matching your search.</td>
        </tr>
    <?php endif; ?>
</table>
<div class="d-flex justify-content-center mt-4">
    <nav>
        <ul class="pagination">
            <?php
            $queryStr = !empty($query) ? '&q=' . urlencode($query) : '';
            $firstPage = 1;
            $lastPage = $pagination['totalPages'];
            $prevPage = max($firstPage, $pagination['currentPage'] - 1);
            $nextPage = min($lastPage, $pagination['currentPage'] + 1);
            ?>
            <!-- First -->
            <li class="page-item<?= $pagination['currentPage'] == $firstPage ? ' disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $firstPage . $queryStr ?>" aria-label="First">
                    First
                </a>
            </li>
            <!-- Previous -->
            <li class="page-item<?= $pagination['currentPage'] == $firstPage ? ' disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $prevPage . $queryStr ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <!-- Current Page Only -->
            <li class="page-item active">
                <span class="page-link"><?= $pagination['currentPage'] ?></span>
            </li>
            <!-- Next -->
            <li class="page-item<?= $pagination['currentPage'] == $lastPage ? ' disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $nextPage . $queryStr ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
            <!-- Last -->
            <li class="page-item<?= $pagination['currentPage'] == $lastPage ? ' disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $lastPage . $queryStr ?>" aria-label="Last">
                    Last
                </a>
            </li>
        </ul>
    </nav>
</div>
</div>
</body>
</html>
