<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Crossroad</title>
    <link rel="shortcut icon" type="image/png" href="/assets/images/coffeelogo.jpg">
    <link rel="stylesheet" href="/assets/css/preloader.css">
  </head>
  <body>
  <div id="preloader"></div>
  <section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(/assets/images/hmpg1.1.jpg);"  data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">
          <div class="col-md-7 col-sm-12 text-center ftco-animate">
            <h1 class="mb-3 mt-5 bread">Services</h1>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="ftco-section ftco-services">
    	<div class="container">
    		<div class="row">
          <div class="col-md-4 ftco-animate">
            <div class="media d-block text-center block-6 services">
              <div class="icon d-flex justify-content-center align-items-center mb-5">
              	<span class="flaticon-choices"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Easy to Order</h3>
                <p>Experience the inviting aroma of freshly brewed coffee and create your own
                   mouthwatering sandwich or salad at Crossroads Coffee and Deli. Our friendly 
                   staff is ready to make your cravings a delicious reality!</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="media d-block text-center block-6 services">
              <div class="icon d-flex justify-content-center align-items-center mb-5">
              	<span class="flaticon-delivery-truck"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Fastest Delivery</h3>
                <p>Swiftly savor the aromatic brews and craft your personalized sandwich or salad at Crossroads Coffee 
                  and Deli – where fast delivery meets flavorful satisfaction!</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="media d-block text-center block-6 services">
              <div class="icon d-flex justify-content-center align-items-center mb-5">
              	<span class="flaticon-coffee-bean"></span></div>
              <div class="media-body">
                <h3 class="heading">Quality Coffee</h3>
                <p></p>Experience the pinnacle of coffee perfection at Crossroads Coffee and Deli,
                 where each cup is a testament to our unwavering commitment to quality.
              </div>
            </div>    
          </div>
        </div>
    	</div>
    </section>
     
    <?php include('header.php'); ?>
		<?php include('footer.php'); ?>

    <script>
				var loader = document.getElementById("preloader");

				window.addEventListener("load", function () {
					setTimeout(function () {
						loader.style.display = "none";
					}, 1500);
				});
			</script>
    
  </body>
</html>