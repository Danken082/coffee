<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
   <link rel="stylesheet" href="/assets/css/reset.css">
</head>
<body>
    <form action="<?= base_url('sendAuthCode')?>" method="post">
    <div class="container">
        <div class="profile-card">
            <img src="<?= base_url('/userassetsimages/user/images/') . $search['profile_img'] ?>" alt="User Image"> 
            <div>
                <h2><?= ucwords($search['FirstName']) ?> <?= ucwords($search['LastName']) ?></h2>
                <input type="email" hidden name="email" value="<?= htmlspecialchars($email)?>">
            </div>
            <button type="submit" class="continue-button">Reset my Password</button>
        </div>
    </div>
    </form>
</body>
</html>
