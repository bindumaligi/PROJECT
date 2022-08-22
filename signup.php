<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>




    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>



    <link rel="stylesheet" href="assets/css/style.css"/>








</head>
<body>


     <div class="container">
        <div class="main-container">

            <div class="main-content">
                <div class="slide-container" style="background-image: url('assets/imgs/frame.png');">   <!--grame.png is going to be the background image of this div-->
                    <div class="slide-content" id="slide-content">
                        <img src="assets/imgs/screen1.jpg" class="active" alt="screen1">
                        <img src="assets/imgs/screen2.jpg" alt="screen2">
                        <img src="assets/imgs/screen3.jpg" alt="screen3">
                        <img src="assets/imgs/screen4.jpg" alt="screen4">
                    </div>
                </div> 
                <div class="form-container">
                    <div class="form-content box">
                        <div class="logo">
                            <img src="assets/imgs/logo.png" class="logo-img" alt="">
                        </div>
                        <form class="login-form" id="signup-form" action="process_signup.php" method="POST">
                          
                        <?php if(isset($_GET['error_message'])) { ?>
                            
                            <p id="error_message" class="text-center alert-danger"> <?php echo $_GET['error_message'];?></p>  <!-- Reference for the message t be printed when pwd and confirm_pwd are not matched-->
                            <?php } ?>
                            

                            <div class="form-group">
                                <div class="login-input">
                                    <input type="text" name="email" placeholder="Type your Email address.." required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="login-input">
                                    <input type="text" name="username" placeholder="Type your username.." required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="login-input">
                                    <input type="password" name="password" id="password" placeholder="Type your Password.." required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="login-input">
                                    <input type="password" name="password_confirm" id="confirm_password" placeholder="Type your Password Again.." required>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button class="login-btn" id="signup_btn" type="submit" name="signup_btn">Sign Up</button>
                            </div>

                        </form>
                        <div class="or">
                            <hr/>
                             <span>OR</span>
                            <hr/> 
                        </div> 

                        <div class="goto">
                            <p>Already have an Account?  <a href ="login.php">Log In</a></p>
                        </div>

                        <div class="app-download">
                            <p>Get The App.</p>
                            <div class="store-link">
                                <a href="#">               <!--By adding link here, we can take the user to app store-->
                                    <img src="assets/imgs/store.png" alt="">
                                </a>
                                <a href="#">
                                    <img src="assets/imgs/gbs.png" alt="">
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </div>
            

        <div class="footer">
            <div class="links" id="links">
                <a href="#">About</a>
                <a href="#">Blog</a>
                <a href="#">Jobs</a>
                <a href="#">Help</a>
                <a href="#">Privacy</a>
                <a href="#">API</a>
                <a href="#">Terms</a>
                <a href="#">Top Accounts</a>
                <a href="#">Hashtags</a>
                <a href="#" id="dark-btn">Dark</a>
            </div>
            <div class="copyright">
                @ 2035 Instagram From Meta
            </div>
        </div> 
     </div>

    <script>


    setInterval(()=>{changeImage();}, 1000);

         changeImage();

         function changeImage(){

    var images=  document.getElementById('slide-content').getElementsByTagName('img');

    var i=0;
    for(i=0;i<images.length;i++){
    var image = images[i];

        if(image.classList.contains('active')){
          //remove active class from this image
          image.classList.remove('active');

          // if we are at last iteration , then go back to first image
          if(i == images.length-1){
            var nextImage=images[0];
            nextImage.classList.add('active');
            break;
          }
            var nextImage=images[i+1];
            nextImage.classList.add('active');
            break;
        }
    }

}

         function changeMode(){
            var body = document.getElementsByTagName('body')[0];  // return an array, and we need to access first element
            var footerLinks = document.getElementById('links').getElementsByTagName('a');
            
            // if we are currently using dark mode
            if(body.classList.contains('dark')){
                body.classList.remove('dark');
            }else{
                // we are currently using the light mode
                body.classList.add('dark');
            }
         }

         function verifyForm(){
            var password=document.getElementById('password').value;
            var confirm_password=document.getElementById('confirm_password').value;
            var error_message = document.getElementById('error_message');


            if(password.length < 6){
                error_message.innerHTML = "Password is too short";
                return false;
            }

            if(password !== confirm_password ){
                error_message.innerHTML = "Passwords Don't Match";
                return false;
            }
            return true;
         }

         document.getElementById('dark-btn').addEventListener('click', (e)=>{
            e.preventDefault();

            changeMode();
         });
       
         // No need of this to check in javascript as it has been already done in php
       //  document.getElementById('signup-form').addEventListener('submit', (e)=>{
       //     e.preventDefault();
       //     verifyForm();
       //  })



    
    </script>



    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>