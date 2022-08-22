 <?php include('header.php') ?>

    <div class="camera-container">   <!--In this page, images will appear that will be uplaoded-->
       <?php if(isset($_GET['success_message'])) {  ?>
         <p class="text-center mt-4 alert-success"><?php echo $_GET['success_message']; ?> </p>
        <?php } ?>

        <?php if(isset($_GET['error_message'])) {  ?>
         <p class="text-center mt-4 alert-danger"><?php echo $_GET['error_message']; ?> </p>
        <?php } ?>


        <div class="camera">
            <div class="camera-image">

             <?php if(isset($_GET['image_name'])){ ?>
                <img style="height: 500px; width: 500px;"src="<?php echo "assets/imgs/".$_GET['image_name']; ?>" alt="">
              <?php }else { ?>

                <img style="width:500px; height:500px;"src="assets/imgs/flower.jpg" class="own-created" alt="">

              <?php }  ?>


               
                <form action="create_post.php" method="POST" enctype="multipart/form-data" class="camera-form">
                    <div class="form-group">
                        <input type="file" name="image" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                        <input type="text" name="caption" class="for-control" placeholder="type caption..." required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="hashtags" class="for-control" placeholder="type hashtagas..." required>
                    </div>
                    <div class="form-group">
                       <button type="submit" name="upload_image_btn" class="upload-btn">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  
    
   
    

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>