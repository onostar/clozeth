<section class="top_head" id="topHeader">
        <div class="social_media">
            <p>
                <span>Call us </span>(+234) 706 8897 068
            </p>
            <p>
                info@clozeth.com
            </p>
        </div>
        <div class="contact_phone">
            <ul>
                <li><a href="javascript:void(0);" class="showRequest">Schedule Appointment</a></li>
                <li><a href="plans.html">Find plans</a></li>
                <li><a href="javascript:void(0);">Pay Bills</a></li>
                <li><a href="javascript:void(0);">Covid-19 Updates</a></li>
            </ul>
        </div>
    </section>
    <header>
        <h1 class="logo">
            <a href="../index.php" title="home">
                <img src="images/logo.png" alt="Clozeth" class="img-fluid">
            </a>
        </h1>
        <div class="search">
            <form class="form-inline" action="search_result.php" method="POST">
                <input type="search" name="search_items" placeholder="search products">
                <button type="submit" name="search" class="main_searchbtn"> <i class="fas fa-search"></i>Search</button>
                <button type="submit" name="search" class="mobilesearchbtn" ><i class="fas fa-search"></i></button>
            </form>
            
        </div>
        <!-- login menu -->
        <div class="login">
            <?php 
                if(isset($_SESSION['user'])){    
            ?>
            <button id="loginDiv"><i class="far fa-user"></i> 
            <?php 
                $statement = $connectdb->prepare("SELECT * FROM shoppers WHERE email = :email");
                $statement->bindvalue('email', $user);
                $statement->execute();
                $infos = $statement->fetchAll();
                foreach($infos as $info){
                    echo "Hello $info->first_name";
                }
                    
            ?> 
            <i class="fas fa-chevron-down"></i></button>
        <div class="login_option" id="account">
            <div>
                <a href="account.php" class="signupBtn">My Account</a>
                <a href="order_history.php" class="signupBtn">My orders</a>
                <button id="logoutBtn"><a href="../controller/logout.php">Logout</a></button>
                
            </div>
        </div>
            <?php
                }else{
            ?>
            <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
            <div class="login_option">
                <div>
                    <button id="loginBtn"><a href="../login_page.php">Login<i class="fas fa-sign-in-alt"></i></a></button>
                    <h3>Or</h3>
                    <a href="../registration.php" id="signupBtn"><i class="fas fa-paper-plane"></i> Create an account</a>
                </div>
            </div>
            <?php } ?>
        </div>
        <!-- notification -->
        <?php if(isset($_SESSION['user'])){?>
            <div class="notification">
                <a href="notifications.php" title="Notifications">
                <i class="fas fa-bell"></i> 
                    <?php
                        $get_not = $connectdb->prepare("SELECT * FROM notifications WHERE customer_email =:customer_email AND status = 0");
                        $get_not->bindvalue("customer_email", $user);
                        $get_not->execute();

                        echo $get_not->rowCount();
                    ?>
                    
                </a>
            </div>
        <?php }?>
        <!-- cart -->
        <?php if(isset($_SESSION['user'])){?>
            <div class="cart">
                <a href="shopping_cart.php" title="view cart"><i class="fas fa-shopping-cart"></i> Cart <span id="cart_value">
                    <?php
                        $cart_num = $connectdb->prepare("SELECT * FROM cart WHERE customer_email = :customer_email");
                        $cart_num->bindvalue('customer_email', $user);
                        $cart_num->execute();

                        if($cart_num->rowCount() > 0){
                            echo $cart_num->rowCount();
                        }else{
                            echo "0";
                        }
                    ?>
                </span></a>
            </div>
        <?php 
            }else{    
        ?>
        <div class="cart">
            <a href="login_page.php?item=Please login to view cart" title="view cart"><i class="fas fa-shopping-cart"></i> Cart <span id="cart_value">0</span></a>
        </div>
        <?php }?>
        <!-- menu icon -->
        <div class="menu_icon">
            <a href="javascript:void(0)"><i class="fas fa-bars"></i></a>
        </div>
    </header>