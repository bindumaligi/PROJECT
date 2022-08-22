<?php
session_start();

include('connection.php');

if(isset($_POST['upload_image_btn'])){

    $id = $_SESSION['id'];
    $username = $_SESSION['username'];
    $profile_image = $_SESSION['image'];

    $caption = $_POST['caption'];
    $hashtags = $_POST['hashtags'];
    $image = $_FILES['image']['tmp_name']; // image is the file itself
    $likes = 0;
    $date = date("Y-m-d");

    
    $image_name = strval(time()) . ".jpeg"; // imagename is the name , we refer to file and strval function will convert time into string
   
    
    
        // Create the post
        $stmt = $conn->prepare("INSERT INTO posts (user_id, likes, image,caption, hashtags,date, username, profile_image)
                               VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param("iissssss", $id, $likes, $image_name, $caption, $hashtags, $date, $username, $profile_image);  // we need to start with i--integer, bcoz of user-id ans s-->stands for string

        if($stmt->execute()){

            if($image != ""){   // This if condition is not mandatory as the file will not be empty in any case, thsi is checked in camera.php by adding the required parameter
              //this will store image in image folder
              move_uploaded_file($image, "assets/imgs/".$image_name);
            }
            

            header("location: camera.php?success_message=Post has been created sucessfully&image_name=".$image_name);
            exit;

        }else{
            header("location: camera.php?error_message=error occured, try again");
            exit;
        }



    
}else{
    header("location: camera.php?error_message=error occured, try again");
    exit;
}
?>