<?php require_once("conn.php"); ?>
<?php
    /*Just for your server-side code*/
    header('Content-Type: text/html; charset=ISO-8859-1');
?>
<?php
 $d1=new dbconn();
 $pdo=$d1->connect();
 ?>
 <?php require_once("function.php"); ?>
 <?php

 //call all avdrstisment here
 $sql="SELECT * FROM adsense where is_active=0";
 $result=$pdo->query($sql);
 $globalad=$result->fetchAll();
 // echo "<pre>";
 // print_r($globalad);
 // echo "</pre>";
 //call all common contect here
 $sql="SELECT * FROM setting";
 $sett=$pdo->query($sql);
 $setting=$sett->fetch();

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="title" content="The Retail Story">
  <meta name="keywords" content="The Retail Story">
  <meta name="description" content="The Retail Story">
  <meta name="author" content="The Retail Story">
  <title>Your Retail Story</title>
  <link rel="shortcut icon" type="image/png" href="images/favicon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/owl.carousel.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">

<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-classic.css" />
<!--language translater-->
    
    <style>
        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        } 
        body {
            top: 0px !important; 
        }
        .goog-logo-link {
            display:none !important;
        }
        .trans-section {
            margin: 100px;
        }
    </style>
<!--end of translater-->
</head>

<body>
  <header class="stickyHeader">
    <div class="row logoHeader px-lg-5 px-0 py-0 py-sm-2 bg-white">
      <nav class="navbar py-0">
        <div class="container-fluid">
          <a class="navbar-brand mb-md-2 mb-lg-0" href="index.php">
            <img src="images/<?php echo $setting['logo']; ?>" class="img-fluid" alt="Logo">
          </a>
          <form class="d-flex" action="search.php" method="post">
              <input class="form-control me-2 bg-white border-1 rounded-0 searchInput" type="search" placeholder="Search" aria-label="Search" name="search">
              <button class="btn bg-darkred" type="submit"> <i class="fa fa-search"></i></button>
          </form>
          <div class="dropdown  ms-md-5 ms-0">
              <div class="translate btn btn-white text-red fw-bold" id="google_translate_element"></div>
                          <script type="text/javascript">
                              function googleTranslateElementInit() {
                              new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                                      }
                         </script>
             <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
          </div>
        </div>
      </nav>
    </div>
    <div class="row menubarTop bg-red py-0 py-sm-1 ps-0" id="mobileBg">
      <div class="">
      <nav class="navbar navbar-expand-lg py-0 float-lg-end float-start">
        <div class="container-fluid">
          <button class="navbar-toggler" id="mobileToggle" type="button" data-bs-toggle="collapse" data-bs-target="#nndMenubar"
            aria-controls="nndMenubar" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <span class="navbar-toggler-icon"></span> -->
            <span class="fa fa-bars text-red"></span>
          </button>
          <div class="collapse navbar-collapse" id="nndMenubar">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-light text-capitalize" href="index.php"><i class="fa fa-home"></i> Home</a>
              </li>
              <?php  $result=$pdo->query("SELECT * FROM category where is_active=0 and display_head=0");
                     $data=$result->fetchAll();
                     foreach ($data as $value) {
                      $sub=0;
                      $value_id=$value['id'];
                      $sub_cat=$pdo->query("SELECT * FROM subcategory where category_id='$value_id' and is_active=0");
                      $sub=$sub_cat->fetchAll();
                      if(!empty($sub)){ ?>

                      
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light text-capitalize" href="" id="ndmMarketing" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="<?php echo $value['icon']; ?>"></i> <?php echo $value['category']; ?>
                </a>
                <ul class="dropdown-menu rounded-0" aria-labelledby="ndmIndustry">
                <?php
                foreach ($sub as $sub1){
                  ?>
                  <li><a class="dropdown-item fs-16 text-capitalize" href="marketing-news.php?cat=<?php echo $sub1['sub_category']; ?>"><?php echo $sub1['sub_category']; ?></a></li>
                  <!-- <li><a class="dropdown-item fs-16" href="#">Industry Story 2</a></li>
                  <li><a class="dropdown-item fs-16" href="#">Industry Story 3</a></li> -->
                <?php } ?>
                </ul>
              </li>
            <?php } else{?>
              <li class="nav-item">
                <a class="nav-link text-light text-capitalize" href="marketing-news.php?cat=<?php echo $value['category']; ?>"><i class="<?php echo $value['icon']; ?>"></i> <?php echo $value['category']; ?></a>
              </li>
            <?php } }?>



            <li class="nav-item dropdown">
              <a href="#" id="moreMenu" role="button" data-bs-toggle="dropdown" aria-expanded="true" class="nav-link dropdown-toggle text-light text-capitalize fs-16 show">
               More</a>
                <ul aria-labelledby="moreMenu" class="dropdown-menu rounded-0 show" data-bs-popper="none">
                 
                <li>
                  <a  href="contact.php" class="dropdown-item fs-16 text-capitalize">Contact</a>
                </li>
                 <?php if(isset($_SESSION['user'])){ ?>
                  <li>
                    <a href="#" class="dropdown-item fs-16 text-capitalize" ><i class="fas fa-user"></i>   <?php echo explode(" ", $_SESSION['user'])[0]; ?></a>
                </li>
                  <?php } else { ?>
                  <li>
                    <a href="#" class="dropdown-item fs-16 text-capitalize" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                </li>
                <?php } ?>
                </ul>
              
              </li>

            </ul>
          </div>
        </div>
      </nav>
      </div>
    </div>
    <div class="row bg-light-red px-sm-5 px-1 py-1">
      <div class="col-xxl-2 col-4">
        <button class="btn bg-red rounded-pill px-xl-5 px-lg-3 px-1 fs-16">Latest News</button>
      </div>
      <div class="col-xxl-10 col-8">
        <marquee behavior="" direction="">
          <ul class="list-style-none marqLNews">
            <?php
            $result=$pdo->query("SELECT heading FROM news where is_active=0 ORDER BY id desc LIMIT 7"); 
            $data=$result->fetchAll();
            foreach ($data as $value) {
              # code...
            ?>
            <li class="text-dark fs-16"><i class="fa fa-chevron-right"></i> <?php echo $value['heading']; ?></li>
          <?php } ?>
          </ul>
        </marquee>
      </div>
    </div>
  </header>

<?php include('./inc/popup.php'); ?>