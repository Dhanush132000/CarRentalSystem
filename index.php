<?php include './include/indexNav.php' ?>

<aside id="colorlib-hero">
    <div class="flexslider">
        <ul class="slides">
            <li style="background-image: url(./index/images/campbell-3ZUsNJhi_Ik-unsplash.jpg);">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3 text-center slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h1 class="head-1">Top</h1>
                                    <h2 class="head-2">Cars</h2>
                                    <h2 class="head-3">Collection</h2>
                                    <p class="category"><span>New trending cars</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url(./index/images/joey-banks-YApiWyp0lqo-unsplash.jpg);">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3 text-center slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h1 class="head-1">Huge</h1>
                                    <h2 class="head-2">Car</h2>
                                    <h2 class="head-3">Collection</h2>
                                    <p class="category"><span>Trending Cars</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url(./index/images/peter-broomfield-m3m-lnR90uM-unsplash.jpg);">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3 text-center slider-text">
                            <div class="slider-text-inner">
                                <div class="desc">
                                    <h1 class="head-1">New</h1>
                                    <h2 class="head-2">Arrival</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>
<div class="colorlib-intro">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="intro">It started with a simple idea: Create  high quality service that I wanted myself.</h2>
            </div>
        </div>
    </div>
</div>
<div class="colorlib-product">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 text-center">
                <div class="featured">
                    <a href="#" class="featured-img text-white" style="background-image: url(./index/images/peter-broomfield-m3m-lnR90uM-unsplash.jpg);">Rock and safe</a>
                    <div class="desc">
                        <h2><a href="#">Ride With New Launched Cars</a></h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 text-center">
                <div class="featured">
                    <a href="#" class="featured-img" style="background-image: url(./index/images/joey-banks-YApiWyp0lqo-unsplash.jpg);">New Style</a>
                    <div class="desc">
                        <h2><a href="#">Ride with Car</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="colorlib-product">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
                <h2>Our Vehicles</h2>
            </div>
        </div>
        <?php require_once './db/db.class.php';
        $db = new DB();
        $count = 0;
        $res = [];
        $query = "SELECT * FROM cars where is_available=1";
        $res = $db->executeSelect($query);
        ?>

        <div class="row row-pb-md">
            <?php foreach ($res as $row) { ?>
                <div class="col-lg-3 mb-4 text-center">
                    <div class="product-entry border">

                        <div class="image-container prod-img">
                            <img src="./Media/Cars/<?php echo $row['image'] ?>" class="img-fluid zoom-image" height="200" alt="">
                        </div>
                        <div class="desc">
                            <h2><a href="#"><?php echo $row['car_name'] ?></a></h2>
                            <span class="price">₹ <?php echo $row['rent'] ?>.00/day</span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p><a href="#" class="btn btn-primary btn-lg">Start Riding</a></p>
            </div>
        </div>
    </div>
</div>

<!-- <div class="colorlib-partner">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h2>Trusted Partners</h2>
					</div>
				</div>
				<div class="row">
					<div class="col partner-col text-center">
						<img src="images/brand-1.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-2.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-3.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-4.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
					<div class="col partner-col text-center">
						<img src="images/brand-5.jpg" class="img-fluid" alt="Free html4 bootstrap 4 template">
					</div>
				</div>
			</div>
		</div> -->
        <!-- <link rel="stylesheet" href="../Static/css/testi.css"> -->

<div class="section" id="testimoni">
<div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card d-flex mx-auto">
                        <div class="card-image">
                            <img class="img-fluid d-flex mx-auto" src="https://i.imgur.com/3TlwnLF.jpg" height="100px">
                        </div>
                        <div class="card-text">
                            <div class="card-title">Lorem Ipsum!</div>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. 
                            Aenean massa. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.
                            Maecenas nec odio et ante tincidunt tempus
                            Duis leo. Donec sodales sagittis magna
                        </div>
                        <div class="footer">
                            <span id="name">Micheal Smith<br></span>
                            <span id="position">CEO of <a href="#">Google.com</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card d-flex mx-auto">
                        <div class="card-image">
                            <img class="img-fluid d-flex mx-auto" src="https://i.imgur.com/Uz4FjGZ.jpg">
                        </div>
                        <div class="card-text">
                            <div class="card-title">Lorem Ipsum!</div>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. 
                            Aenean massa. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.
                            Maecenas nec odio et ante tincidunt tempus
                            Duis leo. Donec sodales sagittis magna
                        </div>
                        <div class="footer">
                            <span id="name">Angellia Miller<br></span>
                            <span id="position">CEO of <a href="#">Facebook.com</a></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card d-flex mx-auto ">
                        <div class="card-image">
                            <img class="img-fluid d-flex mx-auto" src="https://i.imgur.com/udGH5tO.jpg">
                        </div>
                        <div class="card-text">
                            <div class="card-title">Lorem Ipsum!</div>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. 
                            Aenean massa. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.
                            Maecenas nec odio et ante tincidunt tempus
                            Duis leo. Donec sodales sagittis magna
                        </div>
                        <div class="footer">
                            <span id="name">Christina Williams<br></span>
                            <span id="position">UX Designer at <a href="#">Youtube.com</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<style>
    .card{
    border-radius: 1rem;
    box-shadow: 0px -10px 0px rgb(151, 248, 6);
}
@media(max-width:767px){
    .card{
        margin: 1rem 0.7rem 1rem;
        max-width: 80vw;
    }
}
img{
    width: 10.2rem;
    border-radius: 5rem;
    margin: 1.3rem auto 1rem auto;
}
.col-md-4{
    padding:0  0.5rem;
}
.card-title{
    font-size: 1rem;
    margin-bottom: 0;
    font-weight: bold;
    font-family: 'IM Fell French Canon SC';
}
.card-text{
    text-align: center;
    padding: 1rem 2rem;
    font-size: 0.8rem;
    color: rgb(82, 81, 81);
    line-height: 1.4rem;
}
.footer{
    border-top: none;
    text-align: center;
    line-height: 1.2rem;
    padding: 2rem 0 1.4rem 0;
    font-family: 'Varela Round';
}
#name{
    font-size: 0.8rem;
    font-weight: bold;
}
#position{
    font-size: 0.7rem;
}
a{
    color: rgb(151, 248, 6);
    font-weight: bold;
}
a:hover{
    color: rgb(151, 248, 6);
}
</style>



        <div class="section" id="about">
<div class="container-fluid my-5">

<!-- Footer -->
<footer
        class="text-center text-lg-start text-white"
        style="background-color: #1c2331"
        >
  <!-- Section: Social media -->
  <section
           class="d-flex justify-content-between p-4"
           style="background-color: #6351ce"
           >
    <!-- Left -->
    <div class="me-5">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="text-white me-4">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="text-white me-4">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="text-white me-4">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold">Team name</h6>
          <hr
              class="mb-4 mt-0 d-inline-block mx-auto"
              style="width: 60px; background-color: #7c4dff; height: 2px"
              />
          <p>
            Here you can use rows and columns to organize your footer
            content. Lorem ipsum dolor sit amet, consectetur adipisicing
            elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <!-- <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold">Products</h6>
          <hr
              class="mb-4 mt-0 d-inline-block mx-auto"
              style="width: 60px; background-color: #7c4dff; height: 2px"
              />
          <p>
            <a href="#!" class="text-white">MDBootstrap</a>
          </p>
          <p>
            <a href="#!" class="text-white">MDWordPress</a>
          </p>
          <p>
            <a href="#!" class="text-white">BrandFlow</a>
          </p>
          <p>
            <a href="#!" class="text-white">Bootstrap Angular</a>
          </p>
        </div> -->
        <!-- Grid column -->

        <!-- Grid column -->
        <!-- <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold">Useful links</h6>
          <hr
              class="mb-4 mt-0 d-inline-block mx-auto"
              style="width: 60px; background-color: #7c4dff; height: 2px"
              />
          <p>
            <a href="#!" class="text-white">Your Account</a>
          </p>
          <p>
            <a href="#!" class="text-white">Become an Affiliate</a>
          </p>
          <p>
            <a href="#!" class="text-white">Shipping Rates</a>
          </p>
          <p>
            <a href="#!" class="text-white">Help</a>
          </p>
        </div> -->
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold">Contact</h6>
          <hr
              class="mb-4 mt-0 d-inline-block mx-auto"
              style="width: 60px; background-color: #7c4dff; height: 2px"
              />
          <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
          <p><i class="fas fa-envelope mr-3"></i> info@example.com</p>
          <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div
       class="text-center p-3"
       style="background-color: rgba(0, 0, 0, 0.2)"
       >
    © 2020 Copyright:
    <a class="text-white" href="https://mdbootstrap.com/"
       >MDBootstrap.com</a
      >
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
</div>
</div>
<!-- End of .container -->



<!-- jQuery -->
<script src="./index/js/jquery.min.js"></script>
<!-- popper -->
<script src="./index/js/popper.min.js"></script>
<!-- bootstrap 4.1 -->
<script src="./index/js/bootstrap.min.js"></script>
<!-- jQuery easing -->
<script src="./index/js/jquery.easing.1.3.js"></script>
<!-- Waypoints -->
<script src="./index/js/jquery.waypoints.min.js"></script>
<!-- Flexslider -->
<script src="./index/js/jquery.flexslider-min.js"></script>
<!-- Owl carousel -->
<script src="./index/js/owl.carousel.min.js"></script>
<!-- Magnific Popup -->
<script src="./index/js/jquery.magnific-popup.min.js"></script>
<script src="./index/js/magnific-popup-options.js"></script>
<!-- Date Picker -->
<script src="./index/js/bootstrap-datepicker.js"></script>
<!-- Stellar Parallax -->
<script src="./index/js/jquery.stellar.min.js"></script>
<!-- Main -->
<script src="./index/js/main.js"></script>

</body>

</html>