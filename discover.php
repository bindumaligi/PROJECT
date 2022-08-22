
<!--Will Display the latest posts created by the people, only those posts will be visible-->

<?php include('header.php') ?>


<?php

include('connection.php');

// to check the page number, if we have a page number , then we need to set the page number
if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
    $page_no = $_GET['page_no'];
}else{
    // if the page no. is equal to nothing, the we need to set it to 1. Here, pages means number of pages in index.php to show large number of images uploaded by user
    $page_no = 1;
}

// we want to get the number of posts in databse
$stmt = $conn->prepare("SELECT COUNT(*) as total_posts FROM posts") ;
$stmt->execute();
$stmt->bind_result($total_posts);
$stmt->store_result();
$stmt->fetch();

//determine the total posts per page
$total_posts_per_page = 6;

$offset = ($page_no-1)* $total_posts_per_page;  //offset will determne from where should we continue getting more posts

$total_no_of_pages = ceil($total_posts/$total_posts_per_page); // total number of pages in indexx.php

// we need to get all of the posts
$stmt = $conn->prepare("SELECT * FROM posts LIMIT $offset,$total_posts_per_page");  // this is going to paginate the posts, instead of returning 100 posts at once, we will get 5 in fisrt page and 5 in 2nd page and so on... offset will help us starting from the correct point
$stmt->execute();
$posts = $stmt->get_result();

?>

     <main>
        <div class="discover-container">
           <div class="gallery">

           <?php foreach($posts as $post) { ?>
              <div class="gallery-item">
                <img src="<?php echo "assets/imgs/".$post['image']; ?>" class="gallery-image" alt="">
                <div class="gallery-item-info">
                    <ul>
                        <li class="gallery-item-likes"><span class="hide-gallery-element"><?php echo $post['likes']; ?></span>
                            <i class="fas fa-heart"></i>
                        </li>
                        <li class="gallery-item-comments"><span class="hide-gallery-element"></span>
                           <a href="single_post.php?post_id=<?php echo $post['id'];?>" style="color: #fff;"><i class="fas fa-comment"></i></a>
                        </li>
                    </ul>
                </div>
              </div>


            <?php } ?> 


              

             <!-- <div class="gallery-item">
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
              </div> -->

             
            
              </div>

             <!-- <nav aria-label="Page navigation example" style="display:flex; justify-content: center">
                <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
              </nav>  -->


              <nav aria-label="Page navigation example" style="display:flex; justify-content: center"">  <!--This is for pagination bar-->
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
        </div>
     </main>

     








    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>    