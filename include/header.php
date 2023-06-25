<!--end of top navigation-->
<!---Navigation--->
<nav id="mainNav" class="navbar navbar-default navbar-custom">
    <div class="container">
        <!--brand and toggle for better mobile display-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>Menu<i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#page-top">Nagham Flower</a>

        </div>
        <!--list of menu items current-page-item-->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>

                <li class="page-scroll ">
                    <a href="index.php">Home</a>
                </li>

                <li class="page-scroll ">
                    <a href="shop.php">Shop</a>
                </li>


                <?php
                if (!empty($_SESSION['Position']) && $_SESSION['Position'] == "Admin") {


                    echo "
                        <li class='page-scroll dropdown'>
                            <a href='#' class='dropdown-toggle' role='button' data-toggle='dropdown' aria-expanded='false' aria-haspopup='true'>Product<span class='caret'></span></a>
                            <ul class='dropdown-menu dropdown-custom'>
                                <li><a href='newproduct.php'>New</a></li>
                                <li><a href='editProduct.php'>Edit</a></li>
                                                               
                            </ul><!---end of dropdown menu-->
                        
                            
                        </li>";
                }

                ?>
                <?php
                if (!empty($_SESSION['hasOpen']) && $_SESSION['hasOpen']) {
                    echo "
                    <li>
                    <a href='card.php'><span class='glyphicon glyphicon-shopping-cart'></span></a>
                    </li>
            <li class='page-scroll'>
                 <a href='php/logout.php'>logout</a>
            </li>
        
            ";
                } else {

                    echo "
            <li class='page-scroll dropdown'>
                <a href='#' class='dropdown-toggle' role='button' data-toggle='dropdown' aria-expanded='false' aria-haspopup='true'>Join US<span class='caret'></span></a>
                <ul class='dropdown-menu dropdown-custom'>
                    <li class='page-scroll'>
                        <a href='registration.php'>Registration</a>
                    </li>
                    <li class='page-scroll'>
                        <a href='login.php'>Login</a>
                    </li>
                </ul>
            ";
                }
                ?>



            </ul>
        </div>

    </div>

</nav>