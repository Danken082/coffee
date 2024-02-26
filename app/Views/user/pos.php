<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }
    body{
        min-height:100vh;
        overflow-x:hidden;
    }
    .container{
        position:absolute;
        justify-content:center;
        align-items:center;
        margin-top:10px;
        width:100vw;
        display:grid;
        grid-template-columns:repeat(auto-fill, minmax(300px, 300px));
        column-gap:6px;
        row-gap:4px;
    }
    .box{

        width:300px;
        height:300px;
        text-align:center;
        object-fit:cover;
        object-position:center;
        text-transform:uppercase;
    }
    img{
        margin:20px;
        border-radius: 20px;
        width:250px;
        height:250px;
        text-align:center;
        object-fit:fill;
        object-position:center;
        
    }
</style>
<body>
    <div class="container">
        <?php foreach($app as $i):?>
    <div class="box">    
    <img class="menu-img img mb-4" src="<?="/assets/images/" .$i['prod_img']?>">

    <h3><a><?=$i['prod_name']?></a></h3>
    <p class="price"><span>Regular ₱ <?=$i['prod_mprice'] ?><br>Large ₱ <?=$i['prod_lprice'] ?> </span></p>
    <p><a class="btn btn-primary btn-outline-primary" href="#">Order Now</a></p>
    <p><a class="btn btn-primary btn-outline-primary" href="<?= base_url('/viewProd/'). $i['prod_id'] ?>">Add to cart</a></p>
    </div>
    <?php endforeach;?>
    </div>
</body>
</html>