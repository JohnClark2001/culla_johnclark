<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background: #0f172a;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #e2e8f0;
        }

        .profile-container {
            background: #1e293b;
            padding: 40px 45px;
            border-radius: 18px;
            box-shadow: 0px 10px 25px rgba(0,0,0,0.5);
            width: 400px;
            animation: fadeIn 0.6s ease-in-out;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        h1 {
            text-align: center;
            color: #1AEBFF;
            margin-bottom: 20px;
            font-size: 22px;
            font-weight: 600;
        }

        label {
            display: block;
            font-weight: 500;
            margin-top: 15px;
            margin-bottom: 5px;
            color: #cbd5e1;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            background: #334155;
            border: none;
            border-radius: 10px;
            color: #f1f5f9;
            font-size: 15px;
            box-shadow: inset 0 0 0 1px #475569;
        }

        input:disabled {
            opacity: 0.8;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
   <div class="profile-container">
    <h1>My Profile</h1>

    <label for="employee_id">Employee ID:</label>
    <input type="text" id="employee_id" value="<?= htmlspecialchars($user['employee_id'] ?? '') ?>" disabled>

    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" value="<?= htmlspecialchars($user['first_name'] ?? '') ?>" disabled>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" value="<?= htmlspecialchars($user['last_name'] ?? '') ?>" disabled>

    <label for="username">Username:</label>
    <input type="text" id="username" value="<?= htmlspecialchars($user['username'] ?? '') ?>" disabled>

    <label for="email">Email:</label>
    <input type="text" id="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>" disabled>

    <label for="role">Role:</label>
    <input type="text" id="role" value="<?= ucfirst(htmlspecialchars($user['role'] ?? 'employee')) ?>" disabled>

    <label for="created_at">Joined On:</label>
    <input type="text" id="created_at" value="<?= date('M d, Y', strtotime($user['created_at'] ?? '')) ?>" disabled>

    <!-- Logout button -->
    <a href="<?= site_url('logout'); ?>" 
       style="
            display:block;
            margin-top:25px;
            text-align:center;
            background: linear-gradient(180deg, rgba(255,96,96,0.12), rgba(255,96,96,0.08));
            color: #fca5a5;
            padding: 12px 0;
            border-radius: 10px;
            text-decoration:none;
            font-weight:600;
            transition: background .2s ease, color .2s ease;
       "
       onclick="return confirm('Are you sure you want to logout?');">
        Logout
    </a>
</div>

</body>
</html>
