<!--If you want to reach other people's profile-->

<?php include('header.php'); ?>

<?php  
    include('connection.php');

    if(isset($_POST['other_user_id'])){
        $other_user_id = $_POST['other_user_id'];
       $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
       $stmt->bind_param("i", $other_user_id);

       if($stmt->execute()){
        $user_array = $stmt->get_result();
       }else{
        header("location: index.php");
        exit;
       }

    }else{
        header("location: index.php");
        exit;
    }

?>


    <header class="profile-header">
        <div class="profile-container">
            <div class="profile">
              <div class="profile-image">
                <img src="assets/imgs/1.jpg" alt="">
              </div>
              <div class="profile-user-settings">
                <h1 class="profile-user-name">username</h1>
                
              </div>
               <div class="profile-stats">
                <ul>
                    <li><span class="profile-stat-count">345</span> posts</li>
                    <li><span class="profile-stat-count">345</span> followers</li>
                    <li><span class="profile-stat-count">345</span> following</li>
                </ul>

                <form action="">
                    <button type="submit" class="follow-btn-user-profile">Follow</button>
                </form>
               </div>

               <div class="profile-bio">
                <p><span class="profile-real-name">Name</span> This is the bio area that I designed and used html and css</p>
               </div>

            </div>
        </div>
     </header>   



     <main>
        <div class="profile-container">
           <div class="gallery">
              <div class="gallery-item">
                <img src="assets/imgs/flower.jpg" class="gallery-image" alt="">
                <div class="gallery-item-info">
                    <ul>
                        <li class="gallery-item-likes"><span class="hide-gallery-element">Likes:</span>
                            <i class="fas fa-heart"></i>
                        </li>
                        <li class="gallery-item-comments"><span class="hide-gallery-element">Comments:</span>
                            <i class="fas fa-comment"></i>
                        </li>
                    </ul>
                </div>
              </div>


              <div class="gallery-item">
                <img src="assets/imgs/flower.jpg" class="gallery-image" alt="">
                <div class="gallery-item-info">
                    <ul>
                        <li class="gallery-item-likes"><span class="hide-gallery-element">Likes:</span>
                            <i class="fas fa-heart"></i>
                        </li>
                        <li class="gallery-item-comments"><span class="hide-gallery-element">Comments:</span>
                            <i class="fas fa-comment"></i>
                        </li>
                    </ul>
                </div>
              </div>

              <div class="gallery-item">
                <img src="assets/imgs/flower.jpg" class="gallery-image" alt="">
                <div class="gallery-item-info">
                    <ul>
                        <li class="gallery-item-likes"><span class="hide-gallery-element">99</span>
                            <i class="fas fa-heart"></i>
                        </li>
                        <li class="gallery-item-comments"><span class="hide-gallery-element">767</span>
                            <i class="fas fa-comment"></i>
                        </li>
                    </ul>
                </div>
              </div>

              


           </div>
        </div>
     </main>

     








    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>    