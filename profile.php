
<?php include('header.php'); ?>


    <header class="profile-header">
    
        <div class="profile-container">
        
        <?php if(isset($_GET['success_message'])) { ?>
                <p class="text-center alert-success"> <?php echo $_GET['success_message']; ?></p>
                <?php } ?>

            <div class="profile">
              <div class="profile-image">
                <img src="<?php echo "assets/imgs/".$_SESSION['image']; ?>" alt="">
              </div>
              <div class="profile-user-settings">
                <h1 class="profile-user-name"> <?php echo $_SESSION['username']; ?></h1>
                <form action="edit_profile.php" method="GET" style="display:inline-block">
                    <button class="profile-btn profile-edit-btn" type="submit">Edit Profile</button>
                </form>
             
                
                <button class="profile-btn profile-settings-btn" id="options_btn" aria-label="profile settings">
                    <i class="fas fa-cog"></i>
                </button>
                </div>
               
                <!--This will display the popup window-->
                <div class="popup" id="popup">
                    <div class="popup-window">
                        <span class="close-popup" id="close_popup">&times;</span>

                        <a href="edit_profile.php">Edit Profile</a>
                        <a href="camera.php">Create Post</a>
                        <a href="logout.php">Logout</a>


                </div>







              </div>
               <div class="profile-stats">
                <ul>
                    <li><span class="profile-stat-count"><?php echo $_SESSION['posts']; ?></span> posts</li>
                    <li><span class="profile-stat-count"><?php echo $_SESSION['followers']; ?></span> followers</li>
                    <li><span class="profile-stat-count"><?php echo $_SESSION['following']; ?></span> following</li>
                </ul>
               </div>

               <div class="profile-bio">
                <p><span class="profile-real-name"> <?php echo $_SESSION['username'] . ", ";?></span> <?php echo $_SESSION['bio']; ?></p>
               </div>

            </div>
        </div>
     </header>   



     <main>
        <div class="profile-container">
           <div class="gallery">

           <?php include('get_user_posts.php');?>

           <?php foreach($posts as $post) { ?>
              <div class="gallery-item">
                <img src="<?php echo "assets/imgs/".$post['image']; ?>" class="gallery-image" alt="">
                <div class="gallery-item-info">
                    <ul>
                        <li class="gallery-item-likes"><span class="hide-gallery-element"><?php echo $post['likes']; ?></span>
                            <i class="fas fa-heart"></i>
                        </li>
                        <li class="gallery-item-comments"><span class="hide-gallery-element"></span>
                            <i class="fas fa-comment"></i>
                        </li>
                    </ul>
                </div>
              </div>

            <?php } ?>
             

              

              


           </div> 
        </div>
     </main>

     
    <script>
           var popupWindow = document.getElementById('popup');
           var optionsBtn = document.getElementById('options_btn');
           var closeWindow = document.getElementById('close_popup');

          // incase the user click on the options button, it will display the window
           optionsBtn.addEventListener('click', (e)=>{
            e.preventDefault();
              popupWindow.style.display = "block";

           })
           // In case, user clicks on close window, it will hide the window
           closeWindow.addEventListener('click', (e)=>{
            e.preventDefault();
              popupWindow.style.display = "none";

           })
           // if user click anywhere oon the screen, it will hide the window
           window.addEventListener('click', (e)=>{
            if(e.target == popupWindow){
                popupWindow.style.display ="none";
            }
           })
    </script>







    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>    