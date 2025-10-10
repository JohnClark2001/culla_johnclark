<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

body {
    font-family: 'Inter', sans-serif;
    background: #0f172a;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #e2e8f0;
    margin: 0;
    padding: 0;
}

.login-container {
    background: #1e293b;
    padding: 40px 45px;
    border-radius: 18px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.5);
    width: 380px;
    text-align: center;
}

.login-container h1 {
    color: #1AEBFF;
    margin-bottom: 25px;
    font-weight: 600;
}

label {
    display: block;
    margin-top: 15px;
    margin-bottom: 6px;
    font-weight: 500;
    color: #cbd5e1;
    text-align: left;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 12px 14px;
    background: #334155;
    border: none;
    border-radius: 10px;
    color: #f1f5f9;
    margin-bottom: 10px;
}

input[type="submit"] {
    margin-top: 15px;
    width: 100%;
    padding: 12px;
    background: #1AEBFF;
    color: #0f172a;
    font-weight: 600;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s;
}

input[type="submit"]:hover {
    background: #16c5e0;
    transform: translateY(-2px);
}

.error-msg {
    background: #e53e3e;
    padding: 10px;
    border-radius: 6px;
    margin-bottom: 12px;
    color: #fff;
    font-weight: 500;
}

.register-link {
    margin-top: 12px;
    display: block;
    color: #1AEBFF;
    font-weight: 500;
    text-decoration: none;
}

.register-link:hover {
    text-decoration: underline;
}
</style>
</head>
<body>
<div class="login-container">
    <h1>Employee Login</h1>

    <?php if (!empty($error)): ?>
        <div class="error-msg"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('/login') ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" value="Login">
    </form>

    <a href="<?= site_url('/user/create') ?>" class="register-link">New Employee? Register Here</a>
</div>
</body>
</html>
