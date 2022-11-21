<?php
include "./inc/header.php";
?>


<body>
  <?php
  include "./inc/navbar.php";
  ?>

  <?php
  if (isset($_GET['page'])) {  //1
    $page = $_GET['page']; //2
  } else { 
    $page = "";     //3
  }

  switch ($page) {  

    case 'products':  //4    
      include "./pages/products.php";  //5
      break;

    case 'login':  //6
      include "./pages/login.php"; //7
      break;

    case 'register':  //8
      include "./pages/register.php"; //9
      break;

    case 'details': //10
      include "./pages/details.php"; //11
      break;

    case 'cart':  //12
      include "./pages/shop_cart.php";//13
      break;

    case 'checkout':  //14
      include "./pages/checkout.php"; //15
      break;

    case 'thongtin':  //16
      include "./pages/information.php";  //17
      break;

    default:  //18
      include "./pages/home.php";//19
      break;
  }
  ?>

  <?php
  include "./inc/footer.php"
  ?>

</body>

<?php
include "./inc/footer_html.php"
?>