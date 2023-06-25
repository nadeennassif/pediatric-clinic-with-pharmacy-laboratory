
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Pharma &mdash; </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">


  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <div class="site-wrap">

    <?php 
    include_once("pages/header.php");
    include_once("pages/conn.php");
    // print_r($_SESSION);
    $sql = "SELECT * FROM product WHERE pid='".$_GET['id']."';";
    $P;
    if($res = mysqli_query($conn,$sql)){
      $P = mysqli_fetch_assoc($res);
    }
    ?>
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <a
              href="shop.php">Store</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo $P['pname']; ?></strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-5 mr-auto">
            <div class="border text-center">
              <img src="uploads/<?php echo $P['prod_img']; ?>" alt="Image" class="img-fluid p-5">
            </div>
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $P['pname']; ?></h2>
            <p> </p>
            

            <p><strong class="text-primary h4">$<?php echo $P['price']; ?></strong></p>

            
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 220px;">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                </div>
                <input type="number" id="quan" class="form-control text-center" value="1" placeholder=""
                  aria-label="Example text with button addon" aria-describedby="button-addon1">
                <div class="input-group-append">
                  <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                </div>
              </div>
    
            </div>
            <p>
  <a id="add_btn" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To Cart</a>
</p>


            <div class="mt-5">
              <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                    aria-controls="pills-home" aria-selected="true">Ordering Information</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                    aria-controls="pills-profile" aria-selected="false">Specifications</a>
                </li>
            
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  <table class="table custom-table">
                    <thead>
                      <th>Material</th>
                      <th>Description</th>
                      <th>Packaging</th>
                    </thead>
                    <tbody>
                      <?php
                        $sql = "SELECT * FROM info WHERE pid='".$_GET['id']."';";
                        if($res = mysqli_query($conn,$sql)){
                          while($row = mysqli_fetch_assoc($res)){
                            echo '<tr>
                              <th scope="row">'.$row['material'].'</th>
                              <td>'.$row['description'].'</td>
                              <td>'.$row['packaging'].'</td>
                            </tr>';
                          }
                        }
                      ?>
                      
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            
                  <table class="table custom-table">
                    <?php 
                      $sql = "SELECT * FROM specs WHERE pid='".$_GET['id']."';";
                      $S;
                      if($res = mysqli_query($conn,$sql)){
                        $S = mysqli_fetch_assoc($res);
                      }
                    ?>
                    <tbody>
                      <tr>
                        <td>HPIS CODE</td>
                        <td class="bg-light"><?php echo $S['hpis']; ?></td>
                      </tr>
                      <tr>
                        <td>HEALTHCARE PROVIDERS ONLY</td>
                        <td class="bg-light"><?php echo $S['healthcare']; ?></td>
                      </tr>
                      <tr>
                        <td>LATEX FREE</td>
                        <td class="bg-light"><?php echo $S['latex']; ?></td>
                      </tr>
                      <tr>
                        <td>MEDICATION ROUTE</td>
                        <td class="bg-light"><?php echo $S['route']; ?></td>
                      </tr>
                    </tbody>
                  </table>
            
                </div>
            
              </div>
            </div>

    
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-secondary bg-image" style="background-image: url('images/bg_2.jpg');">
      <div class="container">
        <div class="row align-items-stretch">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_1.jpg');">
              <div class="banner-1-inner align-self-center">
                <h2>Pharma Products</h2>
                <p>
                </p>
              </div>
            </a>
          </div>
          <div class="col-lg-6 mb-5 mb-lg-0">
            <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('images/bg_2.jpg');">
              <div class="banner-1-inner ml-auto  align-self-center">
                <h2>Rated by Experts</h2>
                <p>
                </p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>


    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

            <div class="block-7">
              <h3 class="footer-heading mb-4">About Us</h3>
              <p>Kidsville Pharmacy provides specialized pharmaceutical care for children at Kidsville Pediatric Hospital. Our priority is the health and well-being of children, and we achieve this by delivering safe and effective medications. Our experienced team collaborates closely with pediatric healthcare professionals to provide personalized solutions. We create a child-friendly environment and prioritize patient safety, ensuring families have confidence in the medications we prescribe.</p>
            </div>

          </div>
          <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Quick Links</h3>
            <ul class="list-unstyled">
              <li><a href="#">Supplements</a></li>
              <li><a href="#">Vitamins</a></li>
              <li><a href="#">Diet &amp; Nutrition</a></li>
            </ul>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
              <li class="address">203 Sheikh Zayed. Beverly Hills, Cairo, Egypt</li>
                <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                <li class="email">emailaddress@nu.com</li>
              </ul>
            </div>

            
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
          </div>

        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
  <script>
    document.getElementById("add_btn").addEventListener('click',addToCart);
    function addToCart() {
      var Q =document.getElementById("quan").value;
      const xhttp = new XMLHttpRequest();
      xhttp.open("GET", "pages/cart.php?pid=<?php echo $_GET['id']; ?>&quan="+Q);
      //xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
          alert(this.responseText);
        }
      };
      xhttp.send();
    }
  </script>

</body>

</html>