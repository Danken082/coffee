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
      <div class="slider-item" style="background-image: url(/assets/images/coffeewlp2.jpg);"  data-stellar-background-ratio="0.5">
          <div class="overlay"></div>
          <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

              <div class="col-md-7 col-sm-12 text-center ftco-animate">
                <h1 class="mb-3 mt-5 bread">Contact Us</h1>
              </div>

            </div>
          </div>
        </div>
      </section>

    <section class="ftco-section contact-section">
      <div class="container mt-5">
        <div class="row block-9">
					<div class="col-md-4 contact-info ftco-animate">
						<div class="row">
							<div class="col-md-12 mb-4">
	              <h2>Contact Information</h2>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Address:</span> Tawiran, Calapan Oriental Mindoro Philippines</p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Phone:</span> <a href="tel://1234567920">09178901067</a></p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Email:</span> <a href="mailto:info@yoursite.com">crossroad@gmail.com</a></p>
	            </div>
              <div class="col-md-12 mb-3">
	              <p><span>Messenger:</span> <a href="https://web.facebook.com/messages/t/106550545381263/">crossroad@gmail.com</a></p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Website:</span>  <a href="https://www.facebook.com/crossroadcafedeli" target="_blank">Crossroads Coffee and Deli</a></p>
	            </div>
						</div>
					</div>
					<div class="col-md-1"></div>
          <div class="col-md-6 ftco-animate">
            <form action="#" class="contact-form">
            	<div class="row">
            		<div class="col-md-6">
	                <div class="form-group">
	                  <input type="text" disabled class="form-control" placeholder="<?= session()->get('FirstName')?> <?= session()->get('LastName')?>">
	                </div>
                </div>
                <div class="col-md-6">
	                <div class="form-group">
	                  <input type="text" disabled class="form-control" placeholder="<?= session()->get('email')?>">
	                </div>
	                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <div id="map"></div>

    <?php include('mainheader.php'); ?>
    <?php include('footer.php'); ?>
    
    <script src="/assets/js/preloader.js"></script>
  	</body>
</html>