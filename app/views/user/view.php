<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>View</title>
    <style>
:root {
    --gold-500: #f59e0b;
    --gold-600: #d97706;
    --border: #e5e7eb;
}

/* Button styles */
.btn {
    padding: 8px 12px;
    border-radius: 10px;
    font-size: 13px;
    color: white;
    margin: 2px;
    display: inline-block;
    box-shadow: 0 4px 10px rgba(0,0,0,0.12);
    transition: transform 120ms ease, filter 150ms ease;
}
.btn:hover { transform: translateY(-1px); filter: brightness(1.02); }
.edit { background: #16a34a; }
.delete { background: #ef4444; }
.restore { background: #f59e0b; color: #111827; }
.hard-delete { background: #b91c1c; }

img { border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); }

/* Horizontal Pagination without bullets */
.pagination ul {
    list-style: none;
    padding: 0;
    margin: 14px 0 0 0;
    display: flex;
    gap: 8px;
    justify-content: center;
    flex-wrap: wrap;
}

.pagination li { display: inline-block; }

.pagination li a,
.pagination li span {
    display: inline-block;
    padding: 8px 12px;
    border: 1px solid var(--border);
    border-radius: 10px;
    color: var(--gold-600);
    background: #ffffff;
    text-decoration: none;
    box-shadow: 0 4px 10px rgba(0,0,0,0.06);
}

.pagination li a:hover {
    background: linear-gradient(135deg, var(--gold-500), var(--gold-600));
    color: #111827;
    border-color: transparent;
}

.pagination li span.active {
    background: linear-gradient(135deg, var(--gold-500), var(--gold-600));
    color: #111827;
    border: 1px solid transparent;
    font-weight: 700;
}
</style>
</head>
<body>
<div class="pagination">
    <ul>
    <?php
    $queryStr = !empty($query) ? '&q=' . urlencode($query) : '';
    for ($i = 1; $i <= $pagination['totalPages']; $i++):
    ?>
        <li>
            <?php if ($i == $pagination['currentPage']): ?>
                <span class="active"><?= $i ?></span>
            <?php else: ?>
                <a href="?page=<?= $i . $queryStr ?>"><?= $i ?></a>
            <?php endif; ?>
        </li>
    <?php endfor; ?>
    </ul>
</div>
</body>
</html>
