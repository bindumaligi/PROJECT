<?php

session_start();
// created bcoz of signup.php 
include('connection.php');

//To make sure if user has clicked the button
if(isset($_POST['signup_btn'])){

    $username=$_POST['username'];
    $email = $_POST['email'];
    $password= $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    
    // make sure that passwords match
    if($password != $password_confirm){
        header('location: signup.php?error_message=passwords dont match');
        exit;
    }

    //check whether user alraedy exists -- to do this, we have to connect to databse
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email); // this bind_param will repalce the question marks with usrname and email
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows() > 0){
        header("location: signup.php?error_message=User already exists");
        exit;
    }else{
        // if there is no user with this email and pwd, then we need to create that user
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?,?,?)");
        $stmt->bind_param("sss", $username, $email, md5($password));
        
        // if user created successfully , then return user info
        if($stmt->execute()){
           $stmt = $conn->prepare("SELECT id,username,email, image, following, followers,posts, bio FROM users WHERE username = ?");
           $stmt->bind_param("s",$username);
           $stmt->execute();
           $stmt->bind_result($id,$username,$email,$image,$following,$followers,$posts,$bio);
           $stmt->fetch();

           $_SESSION['id']=$id;
           $_SESSION['username']=$username;
           $_SESSION['email']=$email;
           $_SESSION['image']=$image;
           $_SESSION['following']=$following;
           $_SESSION['followers']=$followers;
           $_SESSION['posts']=$posts;
           $_SESSION['bio']=$bio;

           header("location: index.php");

        }else{
            header('location: signup.php?error_message=error occured');
            exit;
        }
    }

}else{

    // in case the user, doesn't click on the button
    header("location: signup.php?error_message=error occured");
}

?>