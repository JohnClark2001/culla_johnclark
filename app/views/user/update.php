<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee Record</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #0f172a;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #e0e0e0;
        }

        .form-container {
            background: #1e293b;
            padding: 40px 45px;
            border-radius: 18px;
            box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.5);
            width: 380px;
            animation: fadeIn 0.6s ease-in-out;
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 10px;
            font-size: 22px;
            color: #1AEBFF;
            letter-spacing: 0.5px;
        }

        .form-container p {
            text-align: center;
            margin-bottom: 25px;
            color: #a0aec0;
            font-size: 14px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-top: 18px;
            margin-bottom: 6px;
            color: #cbd5e1;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {  /* added password here */
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            outline: none;
            background: #334155;
            color: #f1f5f9;
            font-size: 15px;
            box-shadow: inset 0 0 0 1px #475569;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {  /* added password here */
            box-shadow: 0 0 8px #1AEBFF;
            background: #1e293b;
        }


        input[type="submit"] {
            margin-top: 30px;
            width: 100%;
            padding: 12px;
            background-color: #1AEBFF;
            color: #0f172a;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 0 0 12px rgba(26, 235, 255, 0.4);
            transition: all 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #00b4d8;
            box-shadow: 0 0 18px rgba(26, 235, 255, 0.6);
            transform: translateY(-2px);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Edit Employee Record</h1>
        <p>Modify employee details below.</p>
        <form method="post" action="<?= site_url('user/update/'.$user['id']) ?>">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" 
                   value="<?= html_escape($user['first_name'] ?? '') ?>" required>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" 
                   value="<?= html_escape($user['last_name'] ?? '') ?>" required>

            <label for="username">Username:</label>
            <input type="text" name="username" id="username" 
                   value="<?= html_escape($user['username'] ?? '') ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" 
                   value="<?= html_escape($user['email'] ?? '') ?>" required>

            <label for="password">Password (leave blank to keep current):</label>
            <input type="password" name="password" id="password">

            <input type="submit" value="Save Changes">
        </form>
    </div>
</body>
</html>

