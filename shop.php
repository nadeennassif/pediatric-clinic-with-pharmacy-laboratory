<!DOCTYPE html>
<html lang="en">

<head>
  <title>Pharma &mdash;</title>
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

    <?php include_once("pages/header.php"); ?>
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong
              class="text-black">Store</strong></div>
        </div>
      </div>
    </div>

      <div class="site-section">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
            <div id="slider-range" class="border-primary"></div>
            <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
          </div>
          <div class="col-lg-6">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Reference</h3>
            <button type="button" class="btn btn-secondary btn-md dropdown-toggle px-4" id="dropdownMenuReference"
              data-toggle="dropdown">Reference</button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
              <a class="dropdown-item" href="#">Relevance</a>
              <a class="dropdown-item" href="#">Name, A to Z</a>
              <a class="dropdown-item" href="#">Name, Z to A</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Price, low to high</a>
              <a class="dropdown-item" href="#">Price, high to low</a>
            </div>
          </div>
        </div>

        <div class="row">
        <?php 
        include_once("pages/conn.php");
        $sql = "SELECT pid,prod_img,pname,price FROM product;";
        if($res = mysqli_query($conn,$sql)){
          while($row = mysqli_fetch_assoc($res)){
            echo "<div class=\"col-sm-6 col-lg-4 text-center item mb-4\">
            <div class=\"card\" style=\"width: 18rem;\">
              <img class=\"card-img-top\" src=\"uploads/".$row['prod_img']."\" alt=\"Card image cap\">
              <div class=\"card-body\">
                <h5 class=\"card-title\">".$row['pname']."</h5>
                <p class=\"card-text\">".$row['price']."$</p>
                <a href=\"shop-single.php?id=".$row['pid']."\" class=\"btn btn-primary\">Purchase</a>
              </div>
            </div>
          </div>";
          }
        }
        ?>
        </div>
      </div>
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

            <div class="block-7">
              <h3 class="footer-heading mb-4">About Us</h3>
              <p>Kidsville Pharmacy provides specialized pharmaceutical care for children. Our priority is the health and well-being of children, and we achieve this by delivering safe and effective medications. Our experienced team collaborates closely with pediatric healthcare professionals to provide personalized solutions. We create a child-friendly environment and prioritize patient safety, ensuring families have confidence in the medications we prescribe..</p>
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
            <p>
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
  <script> function redirectToSingleItem() {
    window.location.href = "shop-single.php";
}</script> 
</body>

</html>