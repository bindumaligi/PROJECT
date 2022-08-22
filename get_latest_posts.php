<?php

include('connection.php');

// to check the page number, if we have a page number , then we need to set the page number
if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
    $page_no = $_GET['page_no'];
}else{
    // if the page no. is equal to nothing, the we need to set it to 1. Here, pages means number of pages in index.php to show large number of images uploaded by user
    $page_no = 1;
}

// we want to get the number of posts in databse
$stmt = $conn->prepare("SELECT COUNT(*) as total_posts FROM posts") ;
$stmt->execute();
$stmt->bind_result($total_posts);
$stmt->store_result();
$stmt->fetch();

//determine the total posts per page
$total_posts_per_page = 2;

$offset = ($page_no-1)* $total_posts_per_page;  //offset will determne from where should we continue getting more posts

$total_no_of_pages = ceil($total_posts/$total_posts_per_page); // total number of pages in indexx.php

// we need to get all of the posts
$stmt = $conn->prepare("SELECT * FROM posts LIMIT $offset,$total_posts_per_page");  // this is going to paginate the posts, instead of returning 100 posts at once, we will get 5 in fisrt page and 5 in 2nd page and so on... offset will help us starting from the correct point
$stmt->execute();
$posts = $stmt->get_result();

?>