<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <!-- Add your additional head styles or scripts here -->
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        min-height: 100vh;
        overflow-x: hidden;
    }

    .container  {
        position: absolute;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
        width: 100vw;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 300px));
        column-gap: 6px;
        row-gap: 4px;
    }

    .box {
        width: 300px;
        height: 300px;
        text-align: center;
        object-fit: cover;
        object-position: center;
        text-transform: uppercase;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out, color 0.3s ease-in-out;
        color: #fff; /* Adjust the default text color */
    }

    .box:hover {
        transform: scale(1.05);
    }

    img {
        margin: 20px;
        width: 250px;
        height: 250px;
        object-fit: cover;
        object-position: center;
        border-radius: 10px;
    }

    h3 {
        margin-top: 10px;
        font-size: 1.8rem; /* Increase font size */
        color: #fff; /* Adjust the default text color */
    }

    .price {
        font-size: 1.2rem;
        color: #ddd; /* Adjust the default text color */
    }

    .btn {
        margin-top: 10px;
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 1rem;
        color: #fff; /* Adjust the default text color */
        transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
    }

    .btn-primary {
        background-color: #007bff;
        border: 2px solid #007bff;
    }

    .btn-outline-primary {
        background-color: transparent;
        color: #007bff;
    }

    .btn:hover {
        background-color: #0056b3;
    }
</style>
<body>
    <div class="container">
        <?php foreach($app as $item): ?>
            <div class="box">    
                <img class="menu-img img mb-4" src="<?= "/assets/images/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
             
                <h3><a><?= $item['prod_name'] ?></a></h3>
                <?php if($item['prod_lprice'] == 0.00):?> 
                    
                <p class="price">
                    <span>Regular ₱ <?= $item['prod_mprice'] ?> </span>
                </p>
                <?php else:?>
                    <p class="price">
                    <span>Regular ₱ <?= $item['prod_mprice'] ?><br>Large ₱ <?= $item['prod_lprice'] ?> </span>
                </p>
                <?php endif;?>
                <p><a class="btn btn-primary btn-outline-primary" href="#">Order Now</a></p>
                <p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('/viewProd/') . $item['prod_id'] ?>">Add to Cart</a></p>
            </div>
        <?php endforeach; ?>
        <?php foreach($coffee as $item): ?>
            <div class="box">    
                <img class="menu-img img mb-4" src="<?= "/assets/images/" . $item['prod_img'] ?>" alt="<?= $item['prod_name'] ?>">
             
                <h3><a><?= $item['prod_name'] ?></a></h3>
                <?php if($item['prod_lprice'] == 0.00):?> 
                    
                <p class="price">
                    <span>Regular ₱ <?= $item['prod_mprice'] ?> </span>
                </p>
                <?php else:?>
                    <p class="price">
                    <span>Regular ₱ <?= $item['prod_mprice'] ?><br>Large ₱ <?= $item['prod_lprice'] ?> </span>
                </p>
                <?php endif;?>
                <p><a class="btn btn-primary btn-outline-primary" href="#">Order Now</a></p>
                <p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('/viewProd/') . $item['prod_id'] ?>">Add to Cart</a></p>
            </div>
        <?php endforeach; ?>

    </div>
</body>
</html>