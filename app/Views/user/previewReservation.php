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

  <section class="ftco-section">
		<div class="heading-section ftco-animate ">
			<span class="subheading" style="text-align:center; font-size:100px;">Preview</span>
		</div><br><br>
    <form action="<?= base_url('/GoToProducts')?>" method="get">
    	<div class="container">
			<div class="row">

				<div class="col-md-6 mb-5 pb-3">
					<h3 class="mb-5 heading-pricing ftco-animate">Preview Reservation And Get orders</h3>
				
						<div class="desc pl-3">
								<div class="d-flex text align-items-center">
                                   <div class="form-group ml-md-4">
                                    <label for="form-label">Last Name</label>
									<input type="text" name="LastName" class = "form-control"value = "<?= $lastname ?>">
                                    </div>
                                    <div class="form-group ml-md-4">
                                    <label for="form-label">First Name</label>
									<input type="text" name="FirstName" class = "form-control"value = "<?= $firstname ?>">
                                    </div>
                                    <div class="form-group ml-md-4">
                                    <label for="form-label">Contact Number</label>
									<input type="text" name="contact" class = "form-control"value = "<?= $contact ?>">
                                    </div>

								</div>
                <div class="d-flex text align-items-center">
                <div class="form-group ml-md-4">
                                    <label for="form-label">Email</label>
									<input type="text" name="email" class = "form-control"value = "<?= $email ?>">
                                    </div>
                                    <div class="form-group ml-md-4">
                                    <label for="form-label">Custmers Count</label>
									<input type="text" name="hc" class = "form-control"value = "<?= $hc ?>">
                                    </div>
                                    </div>
                                    <div class="form-group ml-md-4">
                                    <label for="form-label">Reservation Date</label>
									<input type="text" name="date" class = "form-control"value = "<?= $date ?>">
                                    </div>
                                    <div class="form-group">
                                    <label for="form-label">Message: </label>
                  <textarea name="message" id="" cols="30" rows="10" class="form-control" placeholder="Message" ><?= esc($message) ?></textarea>
                                    </div>

                      <button type= "submit" class = "buttonReservation">
                          Get order For Reservation
                      </button>
                                    
							</div>
					</div>
				</div>
				</div><br><br>
			</div>
      </form>
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
     
    <?php include('mainheader.php'); ?>
	  <?php include('footer.php'); ?>
    
    <script src="/assets/js/preloader.js"></script>
  </body>
</html>