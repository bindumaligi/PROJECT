<?php  // Index.php is the home page ?>


<?php include('header.php'); ?>
     
    <!--Working on the user Interface, for this add a section and a class to it called main, bcoz this is going to contain the main content inside this-->
    <section class="main">
        <div class="wrapper">
            <div class="left-col">                     <!--inside the left-col, This container will contain profile images where each single image will be diplayed inside circle -->

                <!--Status Wrapper-->

                <?php include('other_people.php'); ?>
                <!--<div class="status-wrapper">
                    <div class="status-card">
                        <div class="profile-pic"><img src="assets/imgs/1.jpeg"/></div>
                        <p class="username">username_1</p>
                    </div>

                    <div class="status-card">
                        <div class="profile-pic"><img src="assets/imgs/1.jpeg"/></div>
                        <p class="username">username_1</p>
                    </div>

                    <div class="status-card">
                        <div class="profile-pic"><img src="assets/imgs/1.jpeg"/></div>
                        <p class="username">username_1</p>
                    </div>

                    <div class="status-card">
                        <div class="profile-pic"><img src="assets/imgs/1.jpeg"/></div>
                        <p class="username">username_1</p>
                    </div>

                    <div class="status-card">
                        <div class="profile-pic"><img src="assets/imgs/1.jpeg"/></div>
                        <p class="username">username_1</p>
                    </div>

                    <div class="status-card">
                        <div class="profile-pic"><img src="assets/imgs/1.jpeg"/></div>
                        <p class="username">username_1</p>
                    </div>

                    <div class="status-card">
                        <div class="profile-pic"><img src="assets/imgs/1.jpeg"/></div>
                        <p class="username">username_1</p>
                    </div>  

                </div> -->


               <?php include('get_latest_posts.php'); ?>

               <?php foreach($posts as $post) { ?>
                <!--Post-->
                <div class="post">
                    <div class="info">
                        <div class="user">
                            <div class="profile-pic"><img src="<?php echo "assets/imgs/". $post['profile_image']; ?>"/></div>  <!--In the post table, image and profile_image are different, profile_image is the image of the user who created that post-->
                            <p class="username"><?php echo $post['username']; ?></p>
                        </div>
                        <i class="fas fa-ellipsis-h options"></i>   <!--To add 3 dots above the posted image-->
                    </div>
                    <img src="<?php echo "assets/imgs/". $post['image'];?>" class="post-image"/>   <!--Here, image will be displayed, posted by the user-->
                    <div class="post-content">
                        <div class="reaction-wrapper">
                            <i class="icon fas fa-heart"></i>
                            <i class="icon fas fa-comment"></i>
                        </div>

                        <p class="likes"><?php echo $post['likes']; ?> likes</p>
                        <p class="description"><span><?php echo $post['caption']; ?> </span> <?php echo $post['hashtags'];?> </p>
                        <p class="post-time"><?php echo date("M,Y", strtotime($post['date'])); ?></p>

                        <div>
                        <a class="comment-btn" href="single_post.php?post_id=<?php echo $post['id']; ?>">comments</a>
                        </div>


                    </div>

                    

                 <!--   <div class="comment-wrapper">   // we will not be able to comment in index.php, after clicking the image, we will go single_post.php, there we will be able to add comments
                        <img src="assets/imgs/1.jpeg" class="icon"/>   //Here, adding the image before comment section, that the user is commenting
                        <input type="text" class="comment-box" placeholder="Add a comment"/>
                        <button class="comment-btn">comment</button>
                    </div>    // In main page, we will be displaying only hashtags and likes, but not cooments -->   
                </div>

                <?php } ?>

                <nav aria-label="Page navigation example" class="mx-auto mt-3">  <!--This is for pagination bar-->
                 <ul class="pagination">



                 <li class="page-item <?php if($page_no <= 1){echo 'disabled';}?>">
                      <a class="page-link" href="<?php if($page_no <=1){echo "#";}else{ echo '?page_no='. ($page_no-1);}?>">Previous</a>
                    </li>  <!--page_no - 1 bcoz we want to decrase the page number, as we wnat the previous page-->



                 
                 <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
                 <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>
                 <li class="page-item"><a class="page-link" href="?page_no=3">3</a></li>


                 <?php if($page_no >= 3){ ?>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="<?php echo "?page_no=". $page_no;?>"></a>

                 <?php }   ?>

                 <li class="page-item <?php if($page_no >= $total_no_of_pages){echo 'disabled';}?>">
                 <a class="page-link" href="<?php if($page_no >= $total_no_of_pages){echo "#";}else{echo "?page_no=".($page_no+1);}?>">Next</a>
                </li>
                 </ul>
                </nav>
            
            </div>   

            <div class="right-col">

                <!--PROFILE CARD-->
                <?php include('profile_card.php'); ?>


                <!--<div class="profile-card">
                    <div class="profile-pic">
                        <img src="<//?php echo "assets/imgs/". $_SESSION['image']; ?>"/>
                    </div>
                    <div>
                        <p class="username"><//?php echo $_SESSION['username']; ?></p>
                        <p class="sub-text"><//?php echo substr($_SESSION['bio'], 0, 15); ?></p>
                    </div>

                    <form method="GET" action="logout.php">
                      <button class="logout-btn">logout</button>
                    </form>

                </div>  -->


                <!-- Suggestions -->
                <?php include('suggestion_sidearea.php'); ?>

            <!--    <p class="suggestion-text">Suggestions For You</p>

                <//?php include("get_suggestions.php"); ?>
                <//?php foreach($suggestions as $suggestion) { ?>


                    <//?php // To check that we don't follow ourseslves ?>
                    <//?php if($suggestion['id'] != $_SESSION['id']){ ?> 
               SUGGESTIONS

               
                <div class="suggestion-card">
                    <div class="suggestion-pic">
                        <img src="<//?php echo "assets/imgs/".$suggestion['image']; ?>"/>
                    </div>
                    <div>
                        <p class="username"><//?php echo $suggestion['username']; ?></p>
                        <p class="sub-text"><//?php echo substr($suggestion['bio'],0,15); ?></p>
                    </div>
                    <button class="follow-btn">follow</button>
                </div>
                    

                <//?//php// } ?>
                <//?php } ?> -->

               



               

                </div> 
        </div>
    </section>
   
    

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>