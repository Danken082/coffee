<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Code</title>
    <link rel="stylesheet" href="/assets/css/reset.css"> <!-- Optional CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f0; /* Light cream background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff5e1; /* Light coffee color */
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-bottom: 1rem;
            color: #4b3c31; /* Dark coffee color */
        }

        .alert {
            margin: 10px 0;
            padding: 10px;
            border-radius: 4px;
        }

        .alert-success {
            background-color: #d8f3dc; /* Light green for success */
            color: #1b4332; /* Dark green text */
        }

        .alert-danger {
            background-color: #ffdddd; /* Light red for error */
            color: #9b2226; /* Dark red text */
        }

        .login-card {
            margin-top: 1rem;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fefae0; /* Very light cream */
        }

        button {
            background-color: #a77b5d; /* Medium coffee color */
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #8e5b3e; /* Darker coffee color on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Verify Your Code</h2>

        <?php if (session()->getFlashdata('msg')): ?>
            <div class="alert alert-success" id="flashMessage">
                <?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger" id="flashError">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <div class="login-card">
            <form action="<?= base_url('verifyCodeAuth') ?>" method="post">
                <input type="text" name="code" placeholder="Input your Verification Code" required>
                <input type="email" name="email" value="<?= htmlspecialchars(session()->getFlashdata('email')) ?>" hidden>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
