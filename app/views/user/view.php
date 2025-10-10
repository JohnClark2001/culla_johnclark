<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Employee Directory</title>

    <!-- Inter font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (lightweight) + Font Awesome (if you still use it elsewhere) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        /* -------------------------
           Dark Minimalist - Employee Directory
           Accent color: #1AEBFF
           ------------------------- */
        :root{
            --bg-start: #0f1724;     /* deep navy */
            --bg-end:   #111827;     /* slightly lighter */
            --card:     #0b1220;     /* card surface */
            --muted:    #94a3b8;     /* muted text */
            --text:     #e6eef6;     /* main text */
            --accent:   #1AEBFF;     /* user chosen */
            --soft:     rgba(255,255,255,0.04);
            --radius:   10px;
        }

        html,body{
            height:100%;
            margin:0;
            font-family: 'Inter', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            background: linear-gradient(180deg, var(--bg-start), var(--bg-end));
            color: var(--text);
            -webkit-font-smoothing:antialiased;
            -moz-osx-font-smoothing:grayscale;
            padding: 36px 18px;
        }

        /* Page title */
        .page-title {
            text-align:center;
            margin: 0 0 28px 0;
            font-weight:600;
            letter-spacing: 0.2px;
            color: var(--text);
            font-size: 20px;
        }

        /* Container card */
        .table-container {
            max-width: 1120px;
            margin: 0 auto;
            background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
            border: 1px solid rgba(255,255,255,0.04);
            box-shadow: 0 6px 30px rgba(2,6,23,0.6);
            padding: 22px;
            border-radius: var(--radius);
            backdrop-filter: blur(6px);
        }

        /* Top bar */
        .top-bar {
            display:flex;
            gap:12px;
            align-items:center;
            justify-content:space-between;
            flex-wrap:wrap;
            margin-bottom:18px;
        }

        /* Left group (title on small screens) */
        .top-left {
            display:flex;
            gap:12px;
            align-items:center;
        }

        .small-tag {
            font-size:13px;
            color: var(--muted);
            background: rgba(255,255,255,0.02);
            padding:6px 10px;
            border-radius:8px;
            border: 1px solid rgba(255,255,255,0.02);
        }

        /* Add button */
        .add-btn {
            display:inline-flex;
            align-items:center;
            gap:8px;
            background: linear-gradient(180deg, rgba(26,235,255,0.12), rgba(26,235,255,0.10));
            color: var(--accent);
            border: 1px solid rgba(26,235,255,0.18);
            padding:8px 14px;
            font-weight:600;
            font-size:14px;
            border-radius:8px;
            text-decoration:none;
            transition: transform .12s ease, box-shadow .12s ease;
            -webkit-tap-highlight-color: transparent;
        }

        .add-btn i { font-size:16px; }

        .add-btn:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 22px rgba(26,235,255,0.08);
        }

        /* Search form group */
        .search-form {
            display:flex;
            gap:10px;
            align-items:center;
        }

        .search-input {
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.03);
            padding:8px 12px;
            color: var(--text);
            border-radius:8px;
            min-width:220px;
            outline:none;
            transition: box-shadow .12s ease, border-color .12s ease;
        }

        .search-input::placeholder { color: rgba(230,238,246,0.35); }

        .search-input:focus {
            border-color: rgba(26,235,255,0.26);
            box-shadow: 0 6px 18px rgba(26,235,255,0.04) inset;
        }

        .icon-btn {
            display:inline-flex;
            align-items:center;
            justify-content:center;
            padding:8px 12px;
            border-radius:8px;
            background: transparent;
            border: 1px solid rgba(255,255,255,0.03);
            color: var(--muted);
            transition: background .12s ease, color .12s ease, transform .12s ease;
            cursor:pointer;
            font-weight:600;
        }

        .icon-btn:hover {
            color: var(--accent);
            border-color: rgba(26,235,255,0.14);
            transform: translateY(-2px);
        }

        .show-all-btn {
            background: transparent;
            border: 1px solid rgba(255,255,255,0.03);
            color: var(--muted);
            padding:8px 12px;
            border-radius:8px;
            font-weight:600;
            text-decoration:none;
            transition: color .12s ease, border-color .12s ease;
        }

        .show-all-btn:hover {
            color: var(--accent);
            border-color: rgba(26,235,255,0.12);
        }

        /* Table */
        table {
            width:100%;
            border-collapse:collapse;
            margin-top:6px;
            overflow:hidden;
            border-radius:8px;
        }

        thead th {
            text-align:center;
            font-weight:600;
            font-size:13px;
            color: rgba(230,238,246,0.9);
            padding:12px 14px;
            background: linear-gradient(180deg, rgba(255,255,255,0.015), rgba(255,255,255,0.01));
            border-bottom: 1px solid rgba(255,255,255,0.04);
            letter-spacing: 0.4px;
        }

        tbody td {
            text-align:center;
            padding:12px 14px;
            font-size:14px;
            color: var(--text);
            border-bottom:1px solid rgba(255,255,255,0.02);
        }

        tbody tr {
            transition: background .12s ease, transform .12s ease;
        }

        tbody tr:hover {
            background: linear-gradient(90deg, rgba(26,235,255,0.02), rgba(255,255,255,0.01));
            transform: translateY(-2px);
        }

        /* Action buttons (kept compact) */
        .btn-action {
            display:inline-flex;
            align-items:center;
            gap:8px;
            padding:6px 10px;
            border-radius:8px;
            font-weight:600;
            font-size:13px;
            color: #00121a;
            text-decoration:none;
            border:none;
            cursor:pointer;
        }

        .btn-edit {
            background: linear-gradient(180deg, rgba(26,235,255,1), rgba(26,235,255,0.86));
            color: #041b22; /* dark text on cyan */
            box-shadow: 0 6px 18px rgba(26,235,255,0.06);
        }
        .btn-edit:hover { transform: translateY(-2px); }

        .btn-delete {
            background: linear-gradient(180deg, rgba(255,96,96,0.12), rgba(255,96,96,0.08));
            color: #fca5a5;
            border: 1px solid rgba(255,96,96,0.06);
        }
        .btn-delete:hover { color:#fff; transform: translateY(-2px); }

        /* No data row */
        .no-data {
            padding: 28px;
            color: var(--muted);
            text-align:center;
            font-style:italic;
        }

        /* Pagination */
        .pagination {
            justify-content:center;
            margin-top:20px;
            gap:8px;
        }

        .pagination .page-link {
            color: var(--muted);
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.02);
            padding:8px 12px;
            border-radius:8px;
            transition: background .12s ease, color .12s ease, transform .12s ease;
        }
        .pagination .page-link:hover {
            background: rgba(26,235,255,0.06);
            color: var(--accent);
            transform: translateY(-2px);
        }
        .pagination .page-item.active .page-link {
            background: linear-gradient(180deg, rgba(26,235,255,0.14), rgba(26,235,255,0.08));
            color: var(--accent);
            border-color: rgba(26,235,255,0.12);
            pointer-events:none;
        }

        /* Responsive tweaks */
        @media (max-width:780px){
            .search-input{ min-width:140px; }
            thead th:nth-child(1), tbody td:nth-child(1) { display:none; } /* hide ID on small screens */
            .top-bar { gap:10px; }
            .page-title { font-size:18px; }
        }
    </style>
</head>
<body>
    <h1 class="page-title">Employee Directory</h1>

    <div class="table-container">
        <!-- Top bar -->
<div class="top-bar">
    <div class="top-left">
        <a href="<?= site_url('user/create'); ?>" class="add-btn" title="Add Employee">
            <i class="bi bi-person-plus"></i>
            <span>Add Employee</span>
        </a>
        <span class="small-tag">Records</span>
    </div>

    <!-- Right group: search + logout -->
    <div class="top-right" style="display:flex; gap:10px; align-items:center;">
        <!-- Search Form -->
        <form action="#" method="get" class="search-form" role="search" aria-label="Search employees">
            <input class="search-input" type="text" name="q" placeholder="Search by name or email" value="<?= isset($query) ? htmlspecialchars($query, ENT_QUOTES) : '' ?>">
            <button type="submit" class="icon-btn" title="Search">
                <i class="bi bi-search"></i>
            </button>
            <a href="<?= site_url('user'); ?>" class="show-all-btn" title="Show all employees">Show All</a>
        </form>

        <!-- Logout Button -->
        <a href="<?= site_url('logout'); ?>" class="btn-action btn-logout" style="
            background: linear-gradient(180deg, rgba(255,96,96,0.12), rgba(255,96,96,0.08));
            color: #fca5a5;
            border: 1px solid rgba(255,96,96,0.06);
            padding: 8px 14px;
            border-radius: 8px;
            font-weight:600;
            text-decoration:none;
            transition: background .12s ease, color .12s ease, transform .12s ease;
        " 
        onclick="return confirm('Are you sure you want to logout?');">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </div>
</div>

<!-- Table -->
<div style="overflow:auto;">
    <table role="table" aria-label="Employee list">
        <thead>
            <tr>
                <th scope="col">Employee ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Date Added</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['employee_id'] ?? '', ENT_QUOTES); ?></td>
                        <td><?= htmlspecialchars(($user['first_name'] ?? '') . ' ' . ($user['last_name'] ?? ''), ENT_QUOTES); ?></td>
                        <td><?= htmlspecialchars($user['email'] ?? '', ENT_QUOTES); ?></td>
                        <td><?= ucfirst(htmlspecialchars($user['role'] ?? '', ENT_QUOTES)); ?></td>
                        <td><?= !empty($user['created_at']) ? date('M d, Y', strtotime($user['created_at'])) : '-'; ?></td>
                        <td>
                            <a href="<?= site_url('user/update/'.$user['id']); ?>" title="Edit" class="btn-action btn-edit">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>

                            <a href="<?= site_url('user/delete/'.$user['id']); ?>"
                            onclick="return confirm('Are you sure you want to delete this record?');"
                            title="Delete" class="btn-action btn-delete">
                                <i class="bi bi-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="no-data">
                        <i class="bi bi-exclamation-circle" style="margin-right:8px; color: rgba(255,255,255,0.12)"></i>
                        No employees found matching your search.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-3">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php
                    $queryStr = !empty($query) ? '&q=' . urlencode($query) : '';
                    $firstPage = 1;
                    $lastPage = $pagination['totalPages'];
                    $prevPage = max($firstPage, $pagination['currentPage'] - 1);
                    $nextPage = min($lastPage, $pagination['currentPage'] + 1);
                    ?>
                    <li class="page-item<?= $pagination['currentPage'] == $firstPage ? ' disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $firstPage . $queryStr ?>" aria-label="First">First</a>
                    </li>

                    <li class="page-item<?= $pagination['currentPage'] == $firstPage ? ' disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $prevPage . $queryStr ?>" aria-label="Previous">&laquo;</a>
                    </li>

                    <li class="page-item active">
                        <span class="page-link" aria-current="page"><?= $pagination['currentPage'] ?></span>
                    </li>

                    <li class="page-item<?= $pagination['currentPage'] == $lastPage ? ' disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $nextPage . $queryStr ?>" aria-label="Next">&raquo;</a>
                    </li>

                    <li class="page-item<?= $pagination['currentPage'] == $lastPage ? ' disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $lastPage . $queryStr ?>" aria-label="Last">Last</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</body>
</html>
