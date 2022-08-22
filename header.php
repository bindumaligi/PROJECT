<?php
// REFACTORING 


session_start();

// will check if user_id is not in session, then they are not logged in, so we need to take them to login page
if(!isset($_SESSION['id'])){
    header("location: login.php");
    exit;
}

?>




<!-- php file willnot work in browsers, it requiires a server to be able to run the file. In order to do this(run php file), we need to start a local server, open terminal and type php -S localhost:8000 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>



    <link rel="stylesheet" href="assets/css/style.css"/>   <!--css file from css/style.css has been imported to the index and we will be able to use it in index.html-->
</head>
<body>


    <nav class="navbar">
        <div class="nav-wrapper">
            <img src="assets/imgs/logo.png" class="brand-img"/>        <!--inside the div we want to display the logo, in form of image-->
            <form class="search-form">
                <input type="text" class="search-box" placeholder="search"/>       <!--Next to the logo, we want to craete a search bar-->
            </form>
            <div class="nav-items">
                <a href="index.php" style="color: #000;"><i class="icon fas fa-home"></i></a>        <!--we wnat to display the buttons to search-->
                <a href="discover.php" stylr="color: #000;"><i class="icon fas fa-plus"></i></a>
                <i class="icon fas fa-heart"></i>        
                <div class="icon user-profile">
                  <a href="profile.php" style="color: #000;"><i class="fas fa-user"></i> </a>
                </div>     <!--Next to the icons, we are gonna display userprofile-->
            </div>                                               
        </div>
    </nav>
  