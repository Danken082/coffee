<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Feedback</title>
    <link href="/assets/css/viewfeedback.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="/assets/images/coffeelogo.jpg">
    <script>
        function maskUsername(username) {
            if (username.length <= 2) return username;

            let letters = username.replace(/[0-9]/g, '');
            let numbers = username.replace(/[^0-9]/g, '');

            if (letters.length <= 2) {
                return username;
            }

            let maskedLetters = letters[0] + '*'.repeat(letters.length - 1) + letters[letters.length - 1];
            let result = '';
            let lettersIndex = 0;
            let numbersIndex = 0;

            for (let i = 0; i < username.length; i++) {
                if (/[0-9]/.test(username[i])) {
                    result += numbers[numbersIndex++];
                } else {
                    result += maskedLetters[lettersIndex++];
                }
            }
            return result;
        }
    </script>
</head>
<body>
    <div class="container">
        <a href="<?= base_url('mainshop') ?>" class="back-button">Back</a>
        <div class="feedback-grid">
            <?php if (empty($feedback)): ?>
                <p style="color:black; font-size: 20px;">No one has given feedback on this product.</p>
            <?php else: ?>
                <?php foreach($feedback as $customerComment): ?>
                    <div class="feedback-item">
                        <div class="stars" style="--rating: <?= htmlspecialchars($customerComment['ratings']) ?>;"></div>
                        <p><?= htmlspecialchars($customerComment['comment']) ?></p>
                        <div>
                            <p class="username">
                                <script>
                                    document.write(maskUsername('<?= htmlspecialchars($customerComment['Username']) ?>'));
                                </script>
                                <span class="verified">✔</span>
                            </p>
                            <p class="date"><?= htmlspecialchars(date('M d, Y', strtotime($customerComment['created_at']))) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>