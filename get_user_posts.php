<?php

// This file is for getting the posts displayed in profile.php , those posts whhich were uploaded by the user

include('connection.php');

 $user_id = $_SESSION['id'];



     // Create the post
$stmt = $conn->prepare("SELECT * FROM posts WHERE user_id= ? LIMIT 6");  // LIMIT 6 denotes that will limit the number of posts, we will get recent 6 posts, if user has uploaded 100 postss
$stmt->bind_param("i", $user_id);  // we need to start with i--integer, bcoz of user-id ans s-->stands for string

if($stmt->execute()){
  $posts = $stmt->get_result();

}else{
  $posts=[];
}


?>