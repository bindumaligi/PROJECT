<?php include('header.php'); ?>

    <!--Working on the user Interface, for this add a section and a class to it called main, bcoz this is going to contain the main content inside this-->
    <section class="main">
        <div class="wrapper">
            <div class="left-col">   <!--inside the left-col, This container will contain profile images where each single image will be diplayed inside circle -->

              <h3 class="text-center">Update profile</h3>
              
              <?php if(isset($_GET['error_message'])) { ?>
                <p class="text-center alert-danger"> <?php echo $_GET['error_message']; ?></p>
                <?php } ?>
                
              <form action="update_profile.php" method="POST" enctype="multipart/form-data">  <!--This enctype will help us in uplaoding the image, (new profile images to be uplaoded)-->
                <div class="mb-3">
                    <img src="assets/imgs/1.jpeg" class="edit-profile-image" alt="">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                     <p class="form-control">Email</p>   <!--bootstrap class-->
                    <!--<input type="email" id="email" name="email" class="form-label">-->
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="username" required 
                                value="<?php echo $_SESSION['username']?>"/>
                </div>
                <div class="mb-3">
                    <label for="bio" class="form-label">Bio</label>
                    <textarea name="bio" id="bio" class="form-control" cols="30" rows="3"><?php echo $_SESSION['bio']; ?>
                    </textarea>
                </div>
                <div class="mb-3">
                    <input name="update_profile_btn" id="update_profile_btn" type="submit" class="update-profile-btn" value="Update">
                </div>
              </form>

              
            
            </div>   

            <div class="right-col">

                <!--PROFILE CARD-->
                <div class="profile-card">
                    <div class="profile-pic">
                        <img src="assets/imgs/1.jpeg"/>
                    </div>
                    <div>
                        <p class="username">username</p>
                        <p class="sub-text">sub-text</p>
                    </div>
                    <button class="logout-btn">logout</button>
                </div>

                <p class="suggestion-text">Suggestion For You</p>


               <!--SUGGESTIONS-->
                <div class="suggestion-card">
                    <div class="suggestion-pic">
                        <img src="assets/imgs/1.jpeg"/>
                    </div>
                    <div>
                        <p class="username">username</p>
                        <p class="sub-text">sub-text</p>
                    </div>
                    <button class="follow-btn">follow</button>
                </div>

                <div class="suggestion-card">
                    <div class="suggestion-pic">
                        <img src="assets/imgs/1.jpeg"/>
                    </div>
                    <div>
                        <p class="username">username</p>
                        <p class="sub-text">sub-text</p>
                    </div>
                    <button class="follow-btn">follow</button>
                </div>

                <div class="suggestion-card">
                    <div class="suggestion-pic">
                        <img src="assets/imgs/1.jpeg"/>
                    </div>
                    <div>
                        <p class="username">username</p>
                        <p class="sub-text">sub-text</p>
                    </div>
                    <button class="follow-btn">follow</button>
                </div>


               

            </div>
        </div>
    </section>
   
    

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>