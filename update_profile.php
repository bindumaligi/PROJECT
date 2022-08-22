<?php
session_start();

include('connection.php');

if(isset($_POST['update_profile_btn'])){

    $id = $_SESSION['id'];
    $username = $_POST['username'];
    $bio = $_POST['bio'];
    $image = $_FILES['image']['tmp_name']; // image is the file itself

    if($image != ""){
    $image_name = $username . ".jpeg"; // imagename is the name , we refer to file
    }else{
        $image_name = $_SESSION['image'];
    }
    //make sure that username is unique
    // now, we need to use sql to select the user who has that email and make sure that this email exist
    $stmt = $conn->prepare("SELECT username FROM users WHERE username = ?");

    $stmt->bind_param("s", $username);
    $stmt->execute();
    
    $stmt->store_result();
    
    // there is user with this email and password
    if($stmt->num_rows() > 0){
        header("location: edit_profile.php?error_message=Username was already taken");
        exit;
    }else{
        // we need to update the information
        $stmt = $conn->prepare("UPDATE users SET username = ?, bio = ?, image = ? WHERE id = ?");
        $stmt->bind_param("sssi", $username, $bio, $image_name, $id);

        if($stmt->execute()){

            if($image != ""){
              //this will store image in image folder
              move_uploaded_file($image, "assets/imgs/".$image_name);
            }
            //update session
            $_SESSION['username']=$username;
            $_SESSION['bio']=$bio;
            $_SESSION['image']=$image_name;

            header("location: profile.php?success_message?Profile has been updated sucessfully");
            exit;

        }else{
            header("location: edit_profile.php?error_message?error occured, try again");
            exit;
        }



    }
}else{
    header("location: edit_profile.php?error_message?error occured, try again");
    exit;
}
?>