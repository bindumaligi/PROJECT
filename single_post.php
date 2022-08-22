<?php include('header.php'); ?>

<?php
  // in single_post.h ,we will be keep displaying the comments

  include('connection.php');

  if(isset($_GET['post_id'])) {// if we have the post id, we need to make a request and get the data from databse
    
    $post_id = $_GET['post_id'];  // post_id which is stored in get request
    $stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
    $stmt->bind_param('i', $post_id);
    $stmt->execute();
    //$posts = $stmt->get_result();
    $post_array = $stmt->get_result(); // this iss gonna return the post

       /* Get and paginate comments */ 
    if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
        $page_no = $_GET['page_no'];
    }else{
        // if the page no. is equal to nothing, the we need to set it to 1. Here, pages means number of pages in index.php to show large number of images uploaded by user
        $page_no = 1;
    }
    
    // we want to get the number of posts in databse
    $stmt = $conn->prepare("SELECT COUNT(*) as total_comments FROM comments WHERE post_id = ?") ;
    $stmt->bind_param("i",$post_id);
    $stmt->execute();
    $stmt->bind_result($total_comments);
    $stmt->store_result();
    $stmt->fetch();
    
    //determine the total posts per page
    $total_comments_per_page = 3;
    
    $offset = ($page_no-1)* $total_comments_per_page;  //offset will determne from where should we continue getting more posts
    
    $total_no_of_pages = ceil($total_comments/$total_comments_per_page); // total number of pages in indexx.php
    
    // we need to get all of the posts
    $stmt = $conn->prepare("SELECT * FROM comments WHERE post_id = $post_id LIMIT $offset,$total_comments_per_page");  // this is going to paginate the posts, instead of returning 100 posts at once, we will get 5 in fisrt page and 5 in 2nd page and so on... offset will help us starting from the correct point
    $stmt->execute();
    $comments = $stmt->get_result();

    

  }else{
    
    header("location: index.php");
    exit;
  }

  ?>

  
    <!--Working on the user Interface, for this add a section and a class to it called main, bcoz this is going to contain the main content inside this-->
    <section class="main single-post-container">
        <div class="wrapper">
            <div class="left-col">                     <!--inside the left-col, This container will contain profile images where each single image will be diplayed inside circle -->

            <!--If the comment was succesfully written, then show success message-->
            <?php if(isset($_GET['success_message'])) { ?>
                <p class="text-center alert-success"> <?php echo $_GET['success_message']; ?></p>
                <?php } ?>

            <?php if(isset($_GET['error_message'])) { ?>
                <p class="text-center alert-danger"> <?php echo $_GET['error_message']; ?></p>
                <?php } ?>    
                <!--Post-->

               <?php foreach($post_array as $post) { ?>

                <div class="post">
                    <div class="info">
                        <div class="user">
                            <div class="profile-pic"><img src="<?php echo "assets/imgs/". $post['profile_image']; ?>"/></div>
                            <p class="username"><?php echo $post['username']; ?></p>
                        </div>
                        
                    </div>
                    <img src="<?php echo "assets/imgs/". $post['image']; ?>" class="post-image"/>
                    <div class="post-content">
                        <div class="reaction-wrapper">
                            <i class="icon fas fa-heart"></i>
                            <i class="icon fas fa-comment"></i> 
                        </div>

                        <p class="likes"><?php echo $post['likes']; ?> Likes</p>
                        <p class="description"><span><?php echo $post['caption']; ?></span> <?php echo $post['hashtags']; ?></p>
                        <p class="post-time"><?php echo date("M,Y", strtotime($post['date'])); ?></p>

                    
                     </div>

                    

                    <?php foreach($comments as $comment) { ?>

                    
                    <div class="comment-element">
                        <img src="<?php echo "assets/imgs/".$comment['profile_image']; ?>" class="icon" alt="">
                        <p><?php echo $comment['comment_text'] ?> <span><?php  echo date("M,Y", strtotime($comment['date']));?></span></p>

                    </div>   

                    <?php  }  ?>

                    <nav aria-label="Page navigation example" style="display: flex; justify-content:center">  <!--This is for pagination bar-->
                         <ul class="pagination">
                            <li class="page-item <?php if($page_no <= 1){echo 'disabled';}?>">
                                <a class="page-link" href="<?php if($page_no <=1){echo "#";}else{ echo 'single_post.php?post_id='.$post_id. '&page_no='. ($page_no-1);}?>"><</a>
                            </li>  <!--page_no - 1 bcoz we want to decrase the page number, as we wnat the previous page-->

                            <li class="page-item <?php if($page_no >= $total_no_of_pages){echo 'disabled';}?>">
                            <a class="page-link" href="<?php if($page_no >= $total_no_of_pages){echo "#";}else{echo "single_post.php?post_id=".$post_id."&page_no=".($page_no+1);}?>">></a>
                            </li>
                         </ul>
                    </nav>
            
                    





                    <div class="comment-wrapper">
                        <img src="<?php echo "assets/imgs/". $_SESSION['image']; ?>" class="icon"/>  <!--Here, adding the image before comment section, that the user is commenting-->
                        <form class="comment-wrapper" method="POST" action="store_comment.php">
                            <input type="hidden" name="post_id" value="<?php echo $post['id'];?>">
                          <input type="text" class="comment-box" name="comment_text" placeholder="Add a comment"/>
                          <button class="comment-btn" name="comment_btn" type="submit">comment</button>
                        </form>
                    </div>
                    </div>

                <?php }  ?>
            
            </div>   

            <div class="right-col">

            <!--PROFILE CARD-->
            <?php include('profile_card.php'); ?>

            <!-- Suggestions -->
            <?php include('suggestion_sidearea.php'); ?>

                <!--PROFILE CARD-->
               <!-- <div class="profile-card">
                    <div class="profile-pic">
                        <img src="assets/imgs/1.jpg"/>
                    </div>
                    <div>
                        <p class="username">username</p>
                        <p class="sub-text">sub-text</p>
                    </div>
                    <button class="logout-btn">logout</button>
                </div>  -->

              <!--  <p class="suggestion-text">Suggestion For You</p>


               SUGGESTIONS
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
                        <img src="assets/imgs/1.jpg"/>
                    </div>
                    <div>
                        <p class="username">username</p>
                        <p class="sub-text">sub-text</p>
                    </div>
                    <button class="follow-btn">follow</button>
                </div> -->


               

            </div>
        </div>
    </section>
   
    

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>