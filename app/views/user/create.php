<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Employee</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(145deg, #0f172a, #1e293b);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #e2e8f0;
        }

        .form-container {
            background: #1e293b;
            color: #e2e8f0;
            padding: 40px 50px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.5);
            width: 380px;
            animation: fadeIn 0.5s ease-in-out;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 22px;
            color: #1AEBFF;
            font-weight: 600;
        }

        label {
            font-weight: 500;
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
            font-size: 14px;
            color: #cbd5e1;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 12px 14px;
            background: #0f172a;
            border: 1px solid #334155;
            border-radius: 10px;
            color: #e2e8f0;
            outline: none;
            transition: border-color 0.3s, box-shadow 0.3s;
            font-size: 15px;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            border-color: #1AEBFF;
            box-shadow: 0 0 6px rgba(26, 235, 255, 0.5);
        }

        input[type="submit"] {
            margin-top: 25px;
            width: 100%;
            padding: 12px;
            background: #1AEBFF;
            color: #0f172a;
            font-size: 15px;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s, box-shadow 0.3s;
        }

        input[type="submit"]:hover {
            background: #16c5e0;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(26, 235, 255, 0.3);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {  /* added password here */
            width: 100%;
            padding: 12px 14px;
            background: #0f172a;
            border: 1px solid #334155;
            border-radius: 10px;
            color: #e2e8f0;
            outline: none;
            transition: border-color 0.3s, box-shadow 0.3s;
            font-size: 15px;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {  /* added password here */
            border-color: #1AEBFF;
            box-shadow: 0 0 6px rgba(26, 235, 255, 0.5);
        }

    </style>
</head>
<body>
    <div class="form-container">
        <h1>Sign Up as Employee</h1>
        <form method="post" action="">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" required>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" required>

            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>

            <label for="email">Email Address:</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <div id="password-msg" style="font-size:12px;color:#f00;margin-top:4px;"></div>

            <script>
            const passwordInput = document.getElementById('password');
            const msg = document.getElementById('password-msg');

            passwordInput.addEventListener('input', () => {
                const val = passwordInput.value;
                const rules = [
                    {regex: /.{6,}/, text: "At least 6 characters"},
                    {regex: /[A-Z]/, text: "At least 1 uppercase letter"},
                    {regex: /[a-z]/, text: "At least 1 lowercase letter"},
                    {regex: /\d/, text: "At least 1 number"}
                ];

                const failed = rules.filter(r => !r.regex.test(val)).map(r => r.text);
                if (failed.length > 0) {
                    msg.textContent = "Requirements: " + failed.join(', ');
                } else {
                    msg.textContent = "Password looks good ✅";
                    msg.style.color = "#0f0"; // green if all rules pass
                }
            });
            </script>

            <input type="submit" value="Save Employee">
        <p style="margin-top: 15px; font-size:14px; text-align:center; color:#cbd5e1;">
            Already have an account? <a href="<?= site_url('/') ?>" style="color:#1AEBFF;">Sign in here</a>
        </p>
        </form>
    </div>
</body>
</html>

