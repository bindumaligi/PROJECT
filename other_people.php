       <?php include("get_following.php"); ?>  
         
         <div class="status-wrapper">

         <?php foreach($other_people as $person){ ?>
                    <div class="status-card">
                        <div class="profile-pic"><img src="<?php echo "assets/imgs/". $person['image']; ?>"/></div>
                        <p class="username"><?php echo $person['username'] ?></p>
                    </div>
                    <?php } ?>
            </div>    

            <!-- get people from the databse, in status wrapper, you should display the pl you are following and not the suugestion
                so we need to get these people, we are follwoing from the databse -->