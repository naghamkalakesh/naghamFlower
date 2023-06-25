<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
    include "include/head.php";

?>
    <body id="page-top" class="index">
        <?php
            include "include/header.php";
        ?>
        <main>
            <div class="container">
                <img src="images/flower-vase1.png" alt="" class="img-responsive"/>
               
            <form class="form-spacing form-reg" action="php/registration.php" method="post">
                 <h1>Registration Form</h1>
                <hr>
                <h2><?php
                if(!empty($_SESSION['Message'])){
                    echo $_SESSION['Message'];
                }
                ?></h2>
                <label class="sr-only" for="membName">Email id</label>
                <input type="text" name="username" class="form-control" id="memName" placeholder="Your Name" required/>
                <br/>
                <label class="sr-only" for="membEmailid">Email id</label>
                <input type="email" name="email" class="form-control" id="membEmailid" placeholder="Email" required/>
                <br/>
                <label class="sr-only" for="membPassword">Password</label>
                <input type="password" name="pass" class="form-control" id="membPassword" placeholder="Password" required/> 
                <br/>
                <label class="sr-only" for="membPassword">PasswordAgain</label>
                <input type="password" name="repass" class="form-control" id="membPassword" placeholder="Password" required/> 
                <br/>
                
                <button type="submit" class="btn btn-lg btn-danger">Create your account</button>
                <br>
                <br>
                <p>By creating an account, you are agreeing to Nagham Flower <a href="conditons.html">conditions of use</a> and <a href="privacy.html">Privacy notice.</a></p>
                
                <hr>
                <p>Already have an account?<a href="login.php">Sign in</a></p>
                
                
                </form>             
            </div>
        </main> 
        <?php
            include "include/footer.php";
        ?>
        
        
        
        
        
        
        
        
        
        
        
        
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript">
       $( document ).ready(function() {
    $( '[data-toggle="popover"]' ).popover();   
});

    </script>
   
        
        
        
            
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    </body>
