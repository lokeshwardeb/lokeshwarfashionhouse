<?php 

$active_class = 'home';
// $website_slogan = 'feel the shopping';

include("inc/_header.php");


?>

<?php 
include("inc/_navbar.php");


?>



    <!-- hero-area staets here -->

    <div class="container hero-area mt-1 hero-area-canvas-bg">
      <div class="row hero-area-canvas-bg">
        <div class="col-8">
          <div class="hero-text ">
            <div class="winter-sale"><b class="xx-large-font">W</b>inter</div> Sale !! <br>
            40% off on the lattest products
          </div>
        </div>
        <div class="col-4">
          <div class="img">
            <img src="img/hand-tshirt.png" class="img-fluid">
          </div>
        </div>
      </div>
      <div class="row hero-area-canvas-bg mb-4 pb-4">
        <div class="col-2 hero-area-canvas-bg float-s">
          <form class="d-flex float-end hero-shop-btn" role="search">

            <button class="btn btn-dark" type="submit">Shop</button>
          </form>
        </div>
        <div class="col-10 hero-area-canvas-bg">
          <form class="d-flex float-start" role="search">

            <button class="btn btn-outline-dark" type="submit">Buy now</button>
          </form>
        </div>
      </div>
    </div>
    <hr>


    <!-- hero-area ends here -->

    <!-- featured products section starts here -->
    <div class="container mb-4 pb-4 custom-product-bg">
      <div class="section-title text-center mt-4 mb-4">
        Featured Products
      </div>

      <div class="f-products-section ">
        <div class="row  cus-d-block ">
          <div class="col-4 products-col mb-4 p-3 custom-bg-light">
            <div class="product-info">
              <a href="" class="nav-link">
                <div class="p-img">
                  <img src="img/benjamin-rascoe-WdhmRPvMn7A-unsplash 1.png" alt="" srcset="">
                </div>
                <div class="p-title mt-2 mb-3 ms-4" name="product-name" id="pro-name">
                  Black modern t-shirt
                </div>
              </a>
              <div class="box ms-2 ps-5 d-flex">
                <label for="name"></label>
                <button class="dec button pe-4 btn">-</button>
                <input type="text" name="qty" id="1" value="1" class="numInp" disabled>
                <button class="inc button ps-4 btn">+</button>
              </div>
              <div class="price d-inline-flex">
                <div class="price_symbol">$</div>
                <div class="price_amount" name="product-price">40</div>
              </div><br>


            </div>
            <div class="price-button d-inline-flex mt-4">
              <div class="cart-button me-4 ">
                <button type="submit" class="btn btn-outline-dark btn-sm-md" onclick="cart()">Add to cart</button>
              </div>
              <div class="buy-button">
                <button type="submit" class="btn btn-dark btn-md-sm">Buy now</button>
              </div>
            </div>




          </div>
          <div class="col-4 mb-4 mb-4 p-3 custom-bg-light">
            <a href="" class="nav-link">
              <div class="p-img">
                <img src="img/benjamin-rascoe-WdhmRPvMn7A-unsplash 1.png" alt="" srcset="">
              </div>
              <div class="p-title mt-2 mb-3 ms-4">
                Black modern t-shirt
              </div>
            </a>
            <div class="box ms-2 ps-5">
              <label for="name"></label>
              <button class="dec button pe-4 btn">-</button>
              <input type="text" name="qty" id="1" value="1" class="numInp" disabled>
              <button class="inc button ps-4 btn">+</button>
            </div>
            <div class="price d-inline-flex">
              <div class="price_symbol">$</div>
              <div class="price_amount">40</div>
            </div><br>
            <div class="price-button d-inline-flex mt-4  ">
              <div class="cart-button me-4 col-6">
                <button type="submit" class="btn btn-outline-dark">Add to cart</button>
              </div>
              <div class="buy-button col-6">
                <button type="submit" class="btn btn-dark ">Buy now</button>
              </div>
            </div>




          </div>
          <div class="col-4 mb-4 mb-4 p-3 custom-bg-light">
            <a href="" class="nav-link">
              <div class="p-img">
                <img src="img/benjamin-rascoe-WdhmRPvMn7A-unsplash 1.png" alt="" srcset="">
              </div>
              <div class="p-title mt-2 mb-3 ms-4">
                Black modern t-shirt
              </div>
            </a>
            <div class="box ms-2 ps-5">
              <label for="name"></label>
              <button class="dec button pe-4 btn">-</button>
              <input type="text" name="qty" id="1" value="1" class="numInp" disabled>
              <div class="inc button ps-4 btn">+</div>
            </div>
            <div class="price d-inline-flex">
              <div class="price_symbol">$</div>
              <div class="price_amount">40</div>
            </div><br>
            <div class="price-button d-inline-flex mt-4">
              <div class="cart-button me-4 ">
                <button type="submit" class="btn btn-outline-dark">Add to cart</button>
              </div>
              <div class="buy-button">
                <button type="submit" class="btn btn-dark">Buy now</button>
              </div>
            </div>




          </div>

          <div class="buy-button more-products" style="">
            <button type="submit" class="btn btn-outline-dark mt-4 more-products-btn" style="">More Products</button>
          </div>

        </div>
      </div>
      <!-- featured products section ends here -->

      <!-- products section starts here -->

      <div class="container products-section">
        <div class="section-title text-center mt-4 mb-4">
          Products
        </div>

        <div class="f-products-section">
          <div class="row  cus-d-block">
            <div class="col-4 products-col mb-4 p-3 custom-bg-light">
              <a href="" class="nav-link">
                <div class="p-img">
                  <img src="img/benjamin-rascoe-WdhmRPvMn7A-unsplash 1.png" alt="" srcset="">
                </div>
                <div class="p-title mt-2 mb-3 ms-4">
                  Black modern t-shirt
                </div>
              </a>
              <div class="box ms-2 ps-5">
                <label for="name"></label>
                <button class="dec button pe-4 btn">-</button>
                <input type="text" name="qty" id="1" value="1" class="numInp" disabled>
                <button class="inc button ps-4 btn">+</button>
              </div>
              <div class="price d-inline-flex">
                <div class="price_symbol">$</div>
                <div class="price_amount">40</div>
              </div><br>
              <div class="price-button d-inline-flex mt-4">
                <div class="cart-button me-4 ">
                  <button type="submit" class="btn btn-outline-dark">Add to cart</button>
                </div>
                <div class="buy-button">
                  <button type="submit" class="btn btn-dark">Buy now</button>
                </div>
              </div>




            </div>
            <div class="col-4 mb-4 p-3 custom-bg-light">
              <a href="" class="nav-link">
                <div class="p-img">
                  <img src="img/benjamin-rascoe-WdhmRPvMn7A-unsplash 1.png" alt="" srcset="">
                </div>
                <div class="p-title mt-2 mb-3 ms-4">
                  Black modern t-shirt
                </div>
              </a>
              <div class="box ms-2 ps-5">
                <label for="name"></label>
                <button class="dec button pe-4 btn">-</button>
                <input type="text" name="qty" id="1" value="1" class="numInp" disabled>
                <button class="inc button ps-4 btn">+</button>
              </div>
              <div class="price d-inline-flex">
                <div class="price_symbol">$</div>
                <div class="price_amount">40</div>
              </div><br>
              <div class="price-button d-inline-flex mt-4  ">
                <div class="cart-button me-4 col-6">
                  <button type="submit" class="btn btn-outline-dark">Add to cart</button>
                </div>
                <div class="buy-button col-6">
                  <button type="submit" class="btn btn-dark ">Buy now</button>
                </div>
              </div>




            </div>
            <div class="col-4 mb-4 p-3 custom-bg-light">
              <a href="" class="nav-link">
                <div class="p-img">
                  <img src="img/benjamin-rascoe-WdhmRPvMn7A-unsplash 1.png" alt="" srcset="">
                </div>
                <div class="p-title mt-2 mb-3 ms-4">
                  Black modern t-shirt
                </div>
              </a>
              <div class="box ms-2 ps-5">
                <label for="name"></label>
                <button class="dec button pe-4 btn">-</button>
                <input type="text" name="qty" id="1" value="1" class="numInp" disabled>
                <div class="inc button ps-4 btn">+</div>
              </div>
              <div class="price d-inline-flex">
                <div class="price_symbol">$</div>
                <div class="price_amount">40</div>
              </div><br>
              <div class="price-button d-inline-flex mt-4">
                <div class="cart-button me-4 ">
                  <button type="submit" class="btn btn-outline-dark">Add to cart</button>
                </div>
                <div class="buy-button">
                  <button type="submit" class="btn btn-dark">Buy now</button>
                </div>
              </div>




            </div>


            <div class="buy-button more-products" style="">
              <button type="submit" class="btn btn-outline-dark mt-4 more-products-btn" style="">More Products</button>
            </div>

          </div>
        </div>

        <!-- products section ends here -->



        <!-- caragories section starts here -->

        <div class="container products-section catagories-section">
          <div class="section-title text-center mt-4 mb-4">
            Catagories
          </div>

          <div class="container">
            <div class="row">
              <div class="col-6">
                <a href="" class="nav-link text-light">
                  <div class="mens-section text-center ">
                    <div class="xx-large-font  text-center fash-catogo m-auto"> Mens fashion</div>
                  </div>

                </a>

              </div>
              <div class="col-6">
                <div class="row">
                  <div class="col-12">
                    <a href="" class="text-light nav-link">
                      <div class="womens-fashion">
                        <div class="xx-large-font  text-center other-catago "> Womens fashion</div>
                      </div>
                    </a>

                  </div>
                  <div class="col-12">
                    <a href="" class="text-light nav-link">
                      <div class="childs-fashion">
                        <div class="xx-large-font  text-center other-catago "> Baby fashion</div>
                      </div>
                    </a>

                  </div>
                </div>
              </div>
            </div>
          </div>







        </div>
        <!-- caragories section ends here -->

        <!-- newsletter section starts here -->

        <div class="container newsletter-section mb-5 pb-4 mt-4">
          <div class="row">
            <div class="col-6">
              <div class="newsletter-text mt-5 fw-normal">
                Please subscribe our newsletter to get all the updates of the newest arrivals.
                All the offers and the lattest products updates are available on our newsletter.
              </div>
            </div>
            <div class="col-6">
              <div class="input-group mb-3 mt-5">

                <input type="text" class="form-control" placeholder="example@example.com" aria-label="Username"
                  aria-describedby="basic-addon1">
                <button type="submit" class="btn btn-dark">Subscribe Now</button>
              </div>


            </div>
          </div>
        </div>

        <!-- newsletter section ends here -->




        <!-- banner slider section starts here -->


        <div id="carouselExampleCaptions" class="carousel slide banner-section">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
              aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
              aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="img/front-self.jpg" class="d-block w-100 main-banner-img" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="img/one-side-self.jpg" class="d-block w-100 main-banner-img " alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="img/pink-room.jpg" class="d-block w-100 main-banner-img img-fluid" alt="..." height="250px">
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>


        <!-- banner slider section ends here -->


        <!-- cart model starts here -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cart Items</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <!-- cart model ends here -->
    

        <!-- about us starts here -->
        <div class="container mt-5 pt-5">
          <div class="section-title text-center mt-4 mb-4">
            About us
          </div>
          <div class="row">
            <div class="col-6">
              <img src="img/lokeshwar_fashion_house 1.png" class="img-fluid" alt="" srcset="">
            </div>
            <div class="col-6 bg-light custom-round">
              <div class="mt-4 ">
          <?php echo $website_description?>
              </div>
            </div>
          </div>
        </div>
        <!-- about us ends here -->


  </main>
  <!-- the main content ends here -->


  <!-- footer section starts here -->
  <footer>
    <!-- footer section starts here -->

    <div class="container-fluid footer-section text-light pt-4 ">
      <div class="row pt-2">
        <div class="col-3">
          <img src="img/Loass Logo 1.png" width="" alt="Loass" srcset="" class="footer-logo"><br>
          <div class="logo-title ">
            Loass
          </div>
        </div>
        <div class="col-3">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="index.html" class="nav-link nav-link-footer">Home</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link nav-link-footer">About us</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link nav-link-footer">Shop</a>
            </li>
            <li class="nav-item">
              <a href="privacy-policy.html" class="nav-link nav-link-footer">Privacy Policy</a>
            </li>
            <li class="nav-item">
              <a href="termsofservice.html" class="nav-link nav-link-footer">Terms and Service</a>
            </li>
            <li class="nav-item">
              <a href="returnandrefundpolicy.html" class="nav-link nav-link-footer">Refund Policy</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link nav-link-footer">Contract us</a>
            </li>
          </ul>
        </div>
        <div class="col-3">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="" class="nav-link nav-link-footer">Caragories</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link nav-link-footer">Men's fashion</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link nav-link-footer">Women's fashion</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link nav-link-footer">Baby's fashion</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link nav-link-footer">Desinable Clothes</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link nav-link-footer">Modern Clothes</a>
            </li>

          </ul>
        </div>
        <div class="col-3">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="" class="nav-link nav-link-footer">Support</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link nav-link-footer">Get support from us</a>
            </li>

          </ul>
        </div>

      </div>
      <div class="container text-center">

        <img src="img/google.png" width="200px" class="img-fluid" alt="" srcset="">
      </div>
      <div class="text-center mt-5 ">
        <div class="container text-center mt-4">
          Find us on
        </div>
        <div class="social-links mt-4">
          <a href=""><img src="img/facebook 1 1.png" width="" class="img-fluid mt-4 me-4 pe-4 ms-4 ps-4 mt-4 mb-4 pb-4"
              alt="" srcset=""></a>
          <a href=""> <img src="img/twitter 1 1.png" width="" class="img-fluid mt-4 me-4 pe-4 ms-4 ps-4 mt-4 mb-4 pb-4"
              alt="" srcset=""></a>
          <a href=""><img src="img/instagram 1 1.png" width="" class="img-fluid mt-4 me-4 pe-4 ms-4 ps-4 mt-4 mb-4 pb-4"
              alt="" srcset=""></a>
          <a href=""><img src="img/linkedin 1 1.png" width="" class="img-fluid mt-4 me-4 pe-4 ms-4 ps-4 mt-4 mb-4 pb-4"
              alt="" srcset=""></a>
        </div>


      </div>
      <div class="container text-center mt-5 pt-5 pb-5">
        &copy; All right are reserved by loass || Copyright by loass 2022
      </div>
    </div>


  </footer>
  <!-- footer section ends here -->




  <!-- bootstrap js script -->

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script> -->


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
    crossorigin="anonymous"></script>


  <!-- <script>

  </script> -->

  <script src="js/script.js"></script>
  <!-- <script src="js/"></script>
</body>

</html>