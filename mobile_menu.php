<div id="mobile_menu">
            
    <aside id="asideLeft">
        <div class="login">
            <?php 
                if(isset($_SESSION['user'])){
            ?>
                <button id="loginDiv" title="View profile"><i class="far fa-user"></i> 
                <?php 
                    $statement = $connectdb->prepare("SELECT * FROM shoppers WHERE email = :email");
                    $statement->bindvalue('email', $user);
                    $statement->execute();
                    $infos = $statement->fetchAll();
                    foreach($infos as $info){
                        echo "Hello $info->first_name";
                    }
                    
                ?>
                
                <a class="logout" title="Logout" href="controller/logout.php"><i class="fas fa-power-off"></i></a>
                
            <?php
                }else{    
            ?>
            <button id="loginDiv"><i class="far fa-user"></i> <a href="login_page.php">Sign in</a> <i class="fas fa-sign-in-alt"></i></button>
            <?php }?>
        </div>
        <nav id="index_nav">
            <ul>
                <?php if(isset($_SESSION['user'])){
                ?>
                <li class="user"><a href="view/account.php" class="signupBtn"><i class="fas fa-user-cog"></i> My Profile</a></li>
                <li class="user"><a href="view/order_history.php" class="signupBtn"><i class="fas fa-cart-arrow-down"></i> My orders</a></li>
                
                <?php
                    }else{    
                ?>
                <li><a href="admin/index.php"><i class="fas fa-shop"></i>Become a Seller</a></li>
                <?php }?>
                    <h3>Our Categories</h3>
                    <?php
                        $get_categories = $connectdb->prepare("SELECT * FROM categories ORDER BY category");
                        $get_categories->execute();
                        $cats = $get_categories->fetchAll();
                        foreach($cats as $cat):
                    ?>
                    <li>
                        <form action="view/categories.php" method="POST">
                            <input type="hidden" name="item_cat" value="<?php echo $cat->category_id?>">
                            <?php 
                                if($cat->category == "Bag"){
                                    echo "<i class='fas fa-shopping-bag'></i>";
                                }elseif($cat->category == "Glasses"){
                                    echo "<i class='fas fa-glasses'></i>";
                                }elseif($cat->category == "Beddings"){
                                    echo "<i class='fas fa-bed'></i>";
                                }elseif($cat->category == "Hairs And Wigs"){
                                    echo "<img src='images/hair_wig.png'>";
                                }elseif($cat->category == "Jewelries"){
                                    echo "<img src='images/necklace.png'>";
                                }elseif($cat->category == "Wrist Watches"){
                                    echo "<img src='images/wrist-watch.png'>";
                                }elseif($cat->category == "Shoes"){
                                    echo "<img src='images/sport-shoe.png'>";
                                }elseif($cat->category == "Mens Fashion"){
                                    echo "<img src='images/hawaiian-shirt.png'>";
                                }elseif($cat->category == "Womens Fashion"){
                                    echo "<img src='images/woman-clothes.png'>";
                                }elseif($cat->category == "Kids Fashion"){
                                    echo "<img src='images/baby-clothes.png'>";
                                }else{
                            ?>
                            <i class="fas fa-shopping-cart"></i>
                            <?php }?>
                             <input type="submit" value="<?php echo $cat->category?>" name="check_category">
                        </form> 
                    </li>
                    
                    
                    <?php endforeach;?>
            </ul>
        </nav>
        <hr>
        <nav id="help">
            <ul>
                <li>
                        <a href="view/help_center.php" title="Get in touch">
                            <i class="far fa-question-circle"></i>
                            <div class="note">
                                <h3>Help center</h3>
                                <p>Ask Clozeth</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" title="who we are">
                            <i class="fas fa-street-view"></i>
                            <div class="note">
                                <h3>About us</h3>
                                <p>Who we are</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="view/refunds.php">
                            <i class="fas fa-hand-holding-usd"></i>
                            <div class="note">
                                <h3>Refunds</h3>
                                <p>Money back guarantee</p>
                            </div>
                        </a>
                    </li>                
                <!-- <li>
                    <a href="javascript:void(0);">
                        <i class="fas fa-hand-holding-usd"></i>
                        <div class="note">
                            <h3>Sell on CLozeth</h3>
                            <p>Show your products to buyers</p>
                        </div>
                    </a>
                </li> -->                          
            </ul>
        </nav>
    </aside>
    
</div>
<!-- cart and notification for mobile -->
<?php if(isset($_SESSION['user'])){?>
<div class="cart_not">
    <a href="view/shopping_cart.php" title="view cart" class="mobile_cart"><i class="fas fa-shopping-cart"></i><span id="cart_value">
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
    <!-- notification -->
    <?php if(isset($_SESSION['user'])){?>
        <div class="notification">
            <a href="view/notifications.php" title="Notifications">
            <i class="fas fa-bell"></i>
                <span>
                    <?php
                        $get_not = $connectdb->prepare("SELECT * FROM notifications WHERE customer_email =:customer_email AND status = 0");
                        $get_not->bindvalue("customer_email", $user);
                        $get_not->execute();

                        echo $get_not->rowCount();
                    ?>
                </span>
            </a>
        </div>
    <?php }?>
</div>
<?php }?>