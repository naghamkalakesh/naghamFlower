<?php
session_start(); 
if(!empty($_SESSION['hasOpen']) && $_SESSION['hasOpen']){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
include "db_config/connection.php";
include "include/head.php";
?>

    <body id="page-top" class="index">
		<!--top navigation-->
		 
        <?php
          include "include/header.php";
        ?>
        <main>
            <div class="container">
                <img src="images/flower-vase1.png" alt="" class="img-responsive"/>
               
            <form class="form-spacing form-reg" action="php/login.php" method="post">
                 <h1>Sign in Form</h1>
                <hr>
                <h2><?php
                if(!empty($_SESSION['Message'])){
                    echo $_SESSION['Message'];
                }
                ?></h2>
                <label class="sr-only" for="membName">Email id</label>
                <input type="text" name="email" class="form-control" id="mememail" placeholder="Your email" required/>
                <br/>
                <label class="sr-only" for="membPassword">Password</label>
                <input type="password" name="pass" class="form-control" id="membPassword" placeholder="Password" required/> 
                <br/>
                

                <button type="submit" class="btn btn-lg btn-danger">Sign In</button>
                <br>
                <br>
                <p>By creating an account, you are agreeing to Nagham Flower <a href="conditons.html">conditions of use</a> and <a href="privacy.html">Privacy notice.</a></p>
                
                <hr>
                <p>has not an account? <a href="registration.php">Registration</a></p>
                
                
                </form>             
            </div>
        </main> 
              <?php

include "include/footer.php";

?>
        
        </div>

          
    </body>
</html>