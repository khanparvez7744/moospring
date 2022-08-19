<?php require_once("conn.php")?>
<?php $conn = new dbconn();
$pdo= $conn->connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon-cow.png" sizes="16x16">
     <title class="page-title">Moospring</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" media="screen,projection">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link href="css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <header>
        <nav class="" role="navigation" id="stickyNav">
            <div class="nav-wrapper">
            <a id="logo-container" href="index.php" class="brand-logo black-text logo right">
                <img src="images/moospring-logo-white.png" alt="Logo" class="responsive-img blackLogo">
                <img src="images/moospring-logo-white.png" alt="Logo" class="responsive-img whiteLogo d-none">
            </a>
            <a href="#" data-target="mobile-moospring" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="left hide-on-med-and-down desktpUl">
                <li><a href="index.php">HOME</a></li>
                <li><a href="about.php">ABOUT US</a></li>
                <li><a href="process.php">PROCESS</a></li>
                <li><a href="career.php">CAREER</a></li>
                <li><a href="contact.php">CONTACT US</a></li>
            </ul>
            </nav>
            <ul id="mobile-moospring" class="sidenav">
                <li><a href="index.php">HOME</a></li>
                <li><a href="about.php">ABOUT US</a></li>
                <li><a href="process.php">PROCESS</a></li>
                <li><a href="career.php">CAREER</a></li>
                <li><a href="contact.php">CONTACT US</a></li>
                <li><a href="privacy.php">PRIVACY POLICY</a></li>
                <li><a href="term.php">TERMS & CONDITION</a></li>
                <li class="copyrightLi">© 2021 Moospring Pvt. Ltd.</li>
            </ul>
            </div>

</header>


