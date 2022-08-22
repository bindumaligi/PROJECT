<?php  

session_start();
include('connection.php');

// to check if user has clicked login button
if( isset($_POST['login_btn'])){

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // now, we need to use sql to select the user who has that email and make sure that this email exist
    $stmt = $conn->prepare("SELECT id, username, email, image, followers, following, posts, bio
                           FROM users WHERE email = ? AND password = ?");

    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    
    $stmt->store_result();
    
    // there is user with this email and password
    if($stmt->num_rows() > 0){
       $stmt->bind_result($id, $username, $email, $image, $followers, $following, $posts, $bio);
       $stmt->fetch();

       //now store the values in thr session
       $_SESSION['id']=$id;
       $_SESSION['username']=$username;
       $_SESSION['email']=$email;
       $_SESSION['image']=$image;
       $_SESSION['followers']=$followers;
       $_SESSION['following']=$following;
       $_SESSION['posts']=$posts;
       $_SESSION['bio']=$bio;

       header('location: index.php');
    }else{
        header('location: login.php?error_message=Email/Password ais incorrect');
        exit;
    }



}else{
    header('location: login.php?error_message=Error Occured, Try Again');


}

?>