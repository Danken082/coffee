<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-bottom: 1rem;
            color: #333;
        }

        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #4cae4c;
        }

        #message {
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
    <script>
        function validatePasswords(event) {
            const password = document.querySelector('input[name="password"]').value;
            const confirmPassword = document.querySelector('input[name="ConfirmPassword"]').value;
            const message = document.getElementById('message');

            if (password !== confirmPassword) {
                message.textContent = "Passwords do not match!";
                message.style.color = "red";
                event.preventDefault(); // Prevent form submission
            } else {
                message.textContent = "Passwords match!"; // Optional: feedback for matching passwords
                message.style.color = "green";
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Create New Password</h2>
        <form action="<?= base_url('newPass')?>" method="post" onsubmit="validatePasswords(event)">

        <input type="password" name="password" class="form-control" id="password" placeholder="Enter new password" 
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  title="Must contain at least one  
        number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <input type="password" name="ConfirmPassword" placeholder="Re-type Your Password" required>
            <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" hidden>
            <button type="submit">Submit</button>
            <div id="message"></div>
        </form>
    </div>
</body>
</html>
