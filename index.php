<?php
    require "controller/server.php";
    session_start();
    $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
    $_SESSION['order_page'] = $_SERVER['REQUEST_URI'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Clozeth is an online platform made for the purpose of ordering fashion wears, men and women clothing, bed sheets, jewellerie, etc from all kinds of retailers and wholesalers in Nigeria and Abroad from where eve you are through your mobile phone, tablet or pc">
    <meta name="keywords" content="Fashion, fashion store, clothings, men, women, men wears, women wears, jewellry, jewellries, rings, earings, wrist watch, eye glass, glass, shoes, order, ordering">
    <title>
        <?php
            if(isset($_SESSION['user'])){
                $user = $_SESSION['user'];
                $user_info = $connectdb->prepare("SELECT * FROM shoppers WHERE email = :email");
                $user_info->bindvalue('email', $user);
                $user_info->execute();
                $view = $user_info->fetch();
                echo $view->first_name . " " . $view->last_name. " - Clozeth - Great stores, Great prices";
            }else{
                echo "Clozeth - Great stores, Great prices";
            }
         ?>

    </title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" href="fontawesome-free-6.0.0-web/css/all.css">
    <link rel="stylesheet" href="fontawesome-free-6.0.0-web/css/all.min.css">
    <link rel="icon" type="image/png" href="images/logo.png" size="32X32">
    <link rel="stylesheet" href="controller/style.css">
    
</head>
<body>
    <!-- <div class="loader">
        <img src="images/acpn_logo.png" alt="Eko Akete 2022">
        <h1>Welcome to Eko Akete 2022</h1>

    </div>
<div class="main"> -->
    <?php include "header.php";?>
    <!-- <p class="successful">
        <?php
            if(isset($_SESSION['success'])){
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            }
        ?>
        <?php
            if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
        ?>
    </p> -->
    <section id="bannerContents">
        <aside id="asideLeft" class="main_cat">
            <nav id="index_nav">
            <ul>
                <h3>Shop by Categories</h3>
                
                <!-- <h3>Categories</h3> -->
                <?php
                    $get_categories = $connectdb->prepare("SELECT * FROM categories LIMIT 10");
                    $get_categories->execute();
                    $cats = $get_categories->fetchAll();
                    foreach($cats as $cat):
                ?>
                    <li>
                        <form action="view/categories.php" method="POST">
                            <input type="hidden" name="item_cat" value="<?php echo $cat->category_id?>">
                            <?php 
                                if($cat->category == "Bags"){
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
                                }elseif($cat->category == "Men's Fashion"){
                                    echo "<img src='images/hawaiian-shirt.png'>";
                                }elseif($cat->category == "Women's Fashion"){
                                    echo "<img src='images/woman-clothes.png'>";
                                }elseif($cat->category == "Kids Fashion"){
                                    echo "<img src='images/baby-clothes.png'>";
                                }elseif($cat->category == "Deodorants"){
                                    echo "<i class='fas fa-spray-can'></i>";
                                }else{
                            ?>
                            <i class="fas fa-shopping-cart"></i>
                            <?php }?>
                             <input type="submit" value="<?php echo $cat->category?>" name="check_category">
                        </form> 
                    </li>
                    
                    
                    <?php endforeach;?>
                    <?php if(isset($_SESSION['user'])){
                        echo "";
                    }else{    
                    ?>
                    <li><a href="view/sellers.php"><i class="fas fa-shop"></i>Become a Seller</a></li>
                    <?php }?>
                </ul>
            </nav>
        </aside>

        <?php include "mobile_menu.php";?>
        
        <section id="banner">
            <div class="slide">
                <div class="slides">
                    <div class="slide_img">
                        <img src="images/home2.jpg" alt="Clozeth banner">
                    </div>
                    <div class="description">
                        <h2>Welcome to clozeth</h2>
                        <p>Your home for all things fashion</p>
                        <div class="links">
                            <a href="view/all_items.php"><i class="fas fa-shopping-cart"></i> Shop Now</a>
                            <!-- <a href="contact.php"><i class="fas fa-photo-video"></i> Learn more</a> -->
                        </div>
                        
                    </div>
                </div>
                <div class="slides">
                    <div class="slide_img">
                        <img src="images/home3.jpg" alt="Banner">
                    </div>
                    <div class="description">
                    <h2>The home of exclusive fashion</h2>
                        <p>Great stores, great choices</p>
                        <div class="links">
                            <a class="appointment" href="view/all_items.php"><i class="fas fa-paper-plane"></i>shop now</a>
                            <!-- <a href="javascript:void(0);"><i class="fas fa-photo-video"></i> View Media</a> -->
                        </div>
                    </div>
                </div>
                <div class="slides">
                    <div class="slide_img">
                        <img src="images/online_shop3.jpg" alt="Clozeth Banner">
                    </div>
                    <div class="description">
                    <!-- <h2>All the best deals</h2> -->
                        <!-- <p>Best deals all day</p> -->
                        <div class="links">
                            <a href="view/all_items.php"><i class="fas fa-shopping-cart"></i> Shop Now</a>
                            <!-- <a href="gallery.php"><i class="fas fa-photo-video"></i> Gallery</a> -->
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </section>
        <aside id="asideRight">
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
                        <a href="view/report_product.php" title="who we are">
                            <i class="fas fa-street-view"></i>
                            <div class="note">
                                <h3>Report product</h3>
                                <p>Drop your complaint</p>
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
                </ul>
            </nav>
            <div id="adds">
                
                <img src="images/online_shop2.jpg" alt="clozeth adds">
                
            </div>
        </aside>
    </section>
    <section id="links">
        <div class="link_tags">
            <a href="javscript:void(0);">
                <i class="fas fa-users"></i>
                <p>Partners</p>
            </a>
        </div>
        <div class="link_tags">
            <a href="javscript:void(0);">
                <i class="fas fa-coins"></i>
                <p>Top deals</p>
            </a>
        </div>
        <div class="link_tags">
            <a href="#popular">
                <i class="fas fa-star"></i>
                <p>Popular</p>
            </a>
        </div>
        <div class="link_tags">
            <a href="view/exhibitors.php">    
                <i class="fas fa-home"></i>
                <p>Companies</p>
            </a>
        </div>
    </section>
    <main>
        <!-- general categories -->
        <section id="general_cat">
             <figure>
                <form action="view/categories.php" method="POST">
                    <input type="hidden" name="item_cat" id="item_cat" value="12">
                    <img src="images/men_suit.webp" alt="Mens Collections">
                    <figcaption>
                        <input type="submit" name="check_category"value="Men">
                    </figcaption>
                </form>
             </figure>
             <figure>
                <form action="view/categories.php" method="POST">
                    <input type="hidden" name="item_cat" id="item_cat" value="13">
                    <img src="images/women.webp" alt="Women's Collections">
                    <figcaption>
                        <input type="submit" name="check_category"value="Ladies">
                    </figcaption>
                </form>
             </figure>
             <figure>
                <a href="view/exhibitors.php">
                    <img src="images/stores.webp" alt="Verified stores">
                    <figcaption>
                        <button>Official stores</button>
                    </figcaption>
                </a>
             </figure>
             <figure>
                <a href="view/top_deals.php">
                    <img src="images/top_deals.jpg" alt="Top deals">
                    <figcaption>
                        <button>Top Deals</button>
                    </figcaption>
                </a>
             </figure>
             <figure>
                <a href="view/half_price.php">
                    <img src="images/half_price.png" alt="Half price">
                    <figcaption>
                        <button>Half price store</button>
                    </figcaption>
                </a>
             </figure>
             
             <!-- <figure>
                <form action="categories.php" method="POST">
                    <input type="hidden" name="item_cat" id="item_cat" value="5">
                    <img src="images/jewelries.webp" alt="Jewellries">
                    <figcaption>
                        <input type="submit" name="check_category"value="Jewelries">
                    </figcaption>
                </form>
             </figure> -->
        </section>
        <!-- featured items -->
        <section id="featured">
            <?php
                $select_featured = $connectdb->prepare("SELECT * FROM menu WHERE item_status = 0 AND featured_item = 1 ORDER BY time_created DESC LIMIT 6");
                $select_featured->execute();
                if($select_featured->rowCount() > 0){
            ?>
            <div class="featured_float">
                <h2>Featured Items</h2>
                <!-- <a href="featured_items.php">View all</a> -->
            </div>
            <div class="featured">
                <?php
                    
                    $rows = $select_featured->fetchAll();
                    foreach($rows as $row):
                ?>
                <!-- check company status -->
                <?php
                    $get_company = $connectdb->prepare("SELECT payment_status FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
                    $get_company->bindvalue("exhibitor_id", $row->company);
                    $get_company->execute();
                    $company_stat = $get_company->fetch();
                    $company_status = $company_stat->payment_status;
                    if($company_status == 2){
                ?>
                <figure>
                    
                        <img src="<?php echo 'items/'.$row->item_foto?>" alt="featured item">
                        
                        <figcaption>
                        
                            <div class="todo">
                                <p><?php echo $row->item_name?></p>
                                <!-- <p><i class="fas fa-layer-group"></i> <?php
                                $get_category = $connectdb->prepare("SELECT category FROM categories WHERE category_id = :category_id");
                                $get_category->bindvalue("category_id",$row->item_category);
                                $get_category->execute();
                                $cat = $get_category->fetch(); echo $cat->category;?></p> -->
                                <span>₦ <?php echo number_format($row->item_prize)?></span>

                            </div>
                        </figcaption>
                        <div class="view_add">
                            <a class="view_item" href="javascript:void(0)" title="show item details" onclick="showItems('<?php echo $row->item_id?>')">View item <i class="fas fa-eye"></i></a>
                            <form action="controller/cart.php" method="POST">
                            <input type="hidden" name="cart_item_id" id="cart_item_id" value="<?php echo $row->item_id?>">
                            <input type="hidden" name="cart_item_name" id="cart_item_name" value="<?php echo $row->item_name?>">
                            <input type="hidden" name="cart_item_price" id="cart_item_price" value="<?php echo $row->item_prize?>">
                            <input type="hidden" name="cart_item_restaurant" id="cart_item_restaurant" value="<?php echo $row->company?>">
                            <input type="hidden" name="customer_email" id="customer_email" value="<?php echo $user?>">
                            <input type="hidden" id="quantity" name="quantity" value="1">
                            <button title="add to cart" class="send_cart"><i class="fas fa-cart-plus"></i></button>
                            </form>
                </figure>
                
                <?php } endforeach?>
                
            </div>
            <!-- <form action="controller/more_featured.php" method="POST">
                <input type="hidden" name="moreFeatured" value="1" id="moreFeatured">
                <button type="submit" id="viewMore" name="viewMore">View more</button>
                
            </form> -->
            
        </section>
        <?php }?>
        <section id="just_in">
            <div class="featured_float">
                <h2>Just in</h2>
                <a href="view/all_items.php">View all</a>
            </div>
            <div class="featured">
                <?php
                    $select_featured = $connectdb->prepare("SELECT menu.item_name, menu.item_id, menu.item_foto, menu.item_prize, menu.previous_price, menu.company, menu.item_category, exhibitors.payment_status FROM menu, exhibitors WHERE exhibitors.exhibitor_id = menu.company AND exhibitors.payment_status = 2 AND menu.item_status = 0 ORDER BY menu.time_created DESC LIMIT 12");
                    $select_featured->execute();
                    $rows = $select_featured->fetchAll();
                    foreach($rows as $row):
                ?>
                
                <figure>
                    
                    
                    <img src="<?php echo 'items/'.$row->item_foto?>" alt="featured item">

                        
                        <figcaption>
                        
                            <div class="todo">
                                <p><?php echo $row->item_name?></p>
                                <!-- <p><i class="fas fa-layer-group"></i> <?php
                                $get_category = $connectdb->prepare("SELECT category FROM categories WHERE category_id = :category_id");
                                $get_category->bindvalue("category_id",$row->item_category);
                                $get_category->execute();
                                $cat = $get_category->fetch(); echo $cat->category;?></p> -->
                                <span>₦<?php echo number_format($row->item_prize)?></span>

                            </div>
                            
                        
                        </figcaption>
                            <div class="view_add">
                            <a class="view_item" href="javascript:void(0)" title="show item details" onclick="showItems('<?php echo $row->item_id?>')">View item <i class="fas fa-eye"></i></a>
                            <form action="controller/cart.php" method="POST">
                            <input type="hidden" name="cart_item_id" id="cart_item_id" value="<?php echo $row->item_id?>">
                            <input type="hidden" name="cart_item_name" id="cart_item_name" value="<?php echo $row->item_name?>">
                            <input type="hidden" name="cart_item_price" id="cart_item_price" value="<?php echo $row->item_prize?>">
                            <input type="hidden" name="cart_item_restaurant" id="cart_item_restaurant" value="<?php echo $row->company?>">
                            <input type="hidden" name="customer_email" id="customer_email" value="<?php echo $user?>">
                            <input type="hidden" id="quantity" name="quantity" value="1">
                            <button title="add to cart" class="send_cart"><i class="fas fa-cart-plus"></i></button>
                            </form>
                        </div>
                        
                </figure>
                
                <?php endforeach ?>
                
            </div>
            <!-- <form action="controller/more_featured.php" method="POST">
                <input type="hidden" name="moreFeatured" value="1" id="moreFeatured">
                <button type="submit" id="viewMore" name="viewMore">View more</button>
                
            </form> -->
        
        </section>
        <!-- show top deals -->
        <?php
            $search_deals = $connectdb->prepare("SELECT menu.item_name, menu.item_id, menu.item_foto, menu.item_prize, menu.previous_price, menu.company, menu.item_category, exhibitors.payment_status FROM menu, exhibitors WHERE exhibitors.exhibitor_id = menu.company AND exhibitors.payment_status = 2 AND menu.item_status = 0 AND menu.item_prize < menu.previous_price ORDER BY menu.time_created DESC LIMIT 6");
            $search_deals->execute();
            if($search_deals->rowCount() > 0){
                
        ?>
        <section id="top_deals">
            <div class="featured_float">
                <h2>Top Deals</h2>
                <a href="view/top_deals.php">View all</a>
            </div>
            <div class="featured">
                <?php
                    
                    $rows = $search_deals->fetchAll();
                    foreach($rows as $row):
                ?>
                
                <figure>
                
                        <img src="<?php echo 'items/'.$row->item_foto?>" alt="Top deals">
                        
                        <figcaption>
                        
                            <div class="todo">
                                <p><?php echo $row->item_name?></p>
                                <!-- <p><i class="fas fa-layer-group"></i> <?php
                                $get_category = $connectdb->prepare("SELECT category FROM categories WHERE category_id = :category_id");
                                $get_category->bindvalue("category_id",$row->item_category);
                                $get_category->execute();
                                $cat = $get_category->fetch(); echo $cat->category;?></p> -->
                                <span>₦ <?php echo number_format($row->item_prize)?></span>
                                <span class="previous_price">₦ <?php echo number_format($row->previous_price)?></span>
                            </div>
                            
                        </figcaption>
                        <div class="percentage">
                            <?php
                                $percent = (($row->previous_price - $row->item_prize) / $row->previous_price) * 100;
                            ?>
                            <p>-<?php echo number_format($percent);?>%</p>
                        </div>
                        <div class="view_add">
                            <a class="view_item" href="javascript:void(0)" title="show item details" onclick="showItems('<?php echo $row->item_id?>')">View item <i class="fas fa-eye"></i></a>
                            <form action="controller/cart.php" method="POST">
                            <input type="hidden" name="cart_item_id" id="cart_item_id" value="<?php echo $row->item_id?>">
                            <input type="hidden" name="cart_item_name" id="cart_item_name" value="<?php echo $row->item_name?>">
                            <input type="hidden" name="cart_item_price" id="cart_item_price" value="<?php echo $row->item_prize?>">
                            <input type="hidden" name="cart_item_restaurant" id="cart_item_restaurant" value="<?php echo $row->company?>">
                            <input type="hidden" name="customer_email" id="customer_email" value="<?php echo $user?>">
                            <input type="hidden" id="quantity" name="quantity" value="1">
                            <button title="add to cart" class="send_cart"><i class="fas fa-cart-plus"></i></button>
                            </form>
                </figure>
                
                <?php endforeach ?>
                
            </div>
            
        </section>
        <?php }?>
        <!-- Popular items -->
        <?php
            $select_all = $connectdb->prepare("SELECT * FROM menu RIGHT JOIN orders USING (item_name) WHERE menu.item_status = 0 GROUP BY item_name HAVING SUM(orders.quantity) >= 4  ORDER BY orders.delivery_date LIMIT 6");
            $select_all->execute();
            if($select_all->rowCount() > 0){
        ?>
        <section id="popular">
            <div class="featured_float">
                <h2>Popular Items <i class="fas fa-star"></i><i class="fas fa-star"></i></h2>
            </div>
            <div class="all_items popular_items">
                <?php
                    /* $select_all = $connectdb->prepare("SELECT menu.item_name, menu.item_category, menu.restaurant_name, menu.item_prize, menu.item_foto, menu.item_id, orders.item_name FROM orders, menu WHERE menu.item_name = orders.item_name AND orders.quantity >= 2 GROUP BY orders.item_name"); */
                   
                    $rows = $select_all->fetchAll();
                    foreach($rows as $row):
                ?>
                <!-- check company status -->
                <?php
                    $get_company = $connectdb->prepare("SELECT payment_status FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
                    $get_company->bindvalue("exhibitor_id", $row->company);
                    $get_company->execute();
                    $company_stat = $get_company->fetch();
                    $company_status = $company_stat->payment_status;
                    if($company_status == 2){
                ?>
                <figure>
                    
                        <img src="<?php echo 'items/'.$row->item_foto?>" alt="featured item">
                        
                        <figcaption>
                        
                            <div class="todo">
                                <p><?php echo $row->item_name?></p>
                                <p><i class="fas fa-layer-group"></i> <?php
                                $get_category = $connectdb->prepare("SELECT category FROM categories WHERE category_id = :category_id");
                                $get_category->bindvalue("category_id",$row->item_category);
                                $get_category->execute();
                                $cat = $get_category->fetch(); echo $cat->category;?></p>
                                <span>₦ <?php echo number_format($row->item_prize)?></span>
                                <?php
                                    if($row->item_prize < $row->previous_price):
                                ?>
                                <span class="previous_price">₦ <?php echo number_format($row->previous_price)?></span>
                            </div>
                            
                            <div class="percentage">
                            <?php
                                $percent = (($row->previous_price - $row->item_prize) / $row->previous_price) * 100;
                            ?>
                            <p>-<?php echo number_format($percent);?>%</p>
                            </div>
                            <?php endif?>
                        </figcaption>
                        <div class="view_add">
                            <a class="view_item" href="javascript:void(0)" title="show item details" onclick="showItems('<?php echo $row->item_id?>')">View item <i class="fas fa-eye"></i></a>
                            <form action="controller/cart.php" method="POST">
                            <input type="hidden" name="cart_item_id" id="cart_item_id" value="<?php echo $row->item_id?>">
                            <input type="hidden" name="cart_item_name" id="cart_item_name" value="<?php echo $row->item_name?>">
                            <input type="hidden" name="cart_item_price" id="cart_item_price" value="<?php echo $row->item_prize?>">
                            <input type="hidden" name="cart_item_restaurant" id="cart_item_restaurant" value="<?php echo $row->company?>">
                            <input type="hidden" name="customer_email" id="customer_email" value="<?php echo $user?>">
                            <input type="hidden" id="quantity" name="quantity" value="1">
                            <button title="add to cart" class="send_cart"><i class="fas fa-cart-plus"></i></button>
                            </form>
                        </div>
                </figure>
                
                <?php } endforeach ?>
                
            </div>
            <!-- <button id="more_popular">View more</button>
            <button id="less_popular">Show less</button> -->
        </section>
        <?php }?>
        <!-- All categories -->
        <section id="all_items">
            <div class="featured_float">
                <h2>Check the best collections for you!</h2>

            </div>
            <div class="all_items">
                <figure>
                    <form action="view/categories.php" method="POST">
                        <input type="hidden" name="item_cat" id="item_cat" value="13">
                        <img src="images/women3.jpg" alt="Womens Collections">
                        <figcaption>
                            <input type="submit" name="check_category"value="Women's Clothing">
                        </figcaption>
                    </form>
                </figure>
                <figure>
                    <form action="view/categories.php" method="POST">
                        <input type="hidden" name="item_cat" id="item_cat" value="12">
                        <img src="images/men.webp" alt="Men's Collections">
                        <figcaption>
                            <input type="submit" name="check_category"value="Men's Clothing">
                        </figcaption>
                    </form>
                </figure>
                <figure>
                    <form action="view/categories.php" method="POST">
                        <input type="hidden" name="item_cat" id="item_cat" value="20">
                        <img src="images/kids_fashion.webp" alt="Kids Fashion">
                        <figcaption>
                            <input type="submit" name="check_category"value="Kids Fashion">
                        </figcaption>
                    </form>
                </figure>
                <figure>
                    <form action="view/categories.php" method="POST">
                        <input type="hidden" name="item_cat" id="item_cat" value="14">
                        <img src="images/shoes.webp" alt="Shoes">
                        <figcaption>
                            <input type="submit" name="check_category"value="Shoes & Sneakers">
                        </figcaption>
                    </form>
                </figure>
                <figure>
                    <form action="view/categories.php" method="POST">
                        <input type="hidden" name="item_cat" id="item_cat" value="16">
                        <img src="images/wrist_wateches.jpg" alt="Wrist watches">
                        <figcaption>
                            <input type="submit" name="check_category"value="Wrist watches">
                        </figcaption>
                    </form>
                </figure>
                <figure>
                    <form action="view/categories.php" method="POST">
                        <input type="hidden" name="item_cat" id="item_cat" value="17">
                        <img src="images/hair2.webp" alt="Hairs & wigs">
                        <figcaption>
                            <input type="submit" name="check_category"value="Hairs & Wigs">
                        </figcaption>
                    </form>
                </figure>
                <figure>
                    <form action="view/categories.php" method="POST">
                        <input type="hidden" name="item_cat" id="item_cat" value="18">
                        <img src="images/glasses.png" alt="Glasses">
                        <figcaption>
                            <input type="submit" name="check_category"value="Glasses">
                        </figcaption>
                    </form>
                </figure>
                <figure>
                    <form action="view/categories.php" method="POST">
                        <input type="hidden" name="item_cat" id="item_cat" value="21">
                        <img src="images/jewelries.webp" alt="Jewelries">
                        <figcaption>
                            <input type="submit" name="check_category"value="Jewelries">
                        </figcaption>
                    </form>
                </figure>
                <figure>
                    <form action="view/categories.php" method="POST">
                        <input type="hidden" name="item_cat" id="item_cat" value="19">
                        <img src="images/bed_sheet.jpg" alt="Beddings">
                        <figcaption>
                            <input type="submit" name="check_category"value="Beddings">
                        </figcaption>
                    </form>
                </figure>
                <figure>
                    <form action="view/categories.php" method="POST">
                        <input type="hidden" name="item_cat" id="item_cat" value="15">
                        <img src="images/bagsss.png" alt="Bags">
                        <figcaption>
                            <input type="submit" name="check_category"value="Bags">
                        </figcaption>
                    </form>
                </figure>
                <figure>
                    <form action="view/categories.php" method="POST">
                        <input type="hidden" name="item_cat" id="item_cat" value="22">
                        <img src="images/deodorants.jpg" alt="deodorants">
                        <figcaption>
                            <input type="submit" name="check_category"value="Deodorants">
                        </figcaption>
                    </form>
                </figure>
                <figure>
                    <form action="view/categories.php" method="POST">
                        <input type="hidden" name="item_cat" id="item_cat" value="23">
                        <img src="images/makeup-cosmetics.webp" alt="other accessories">
                        <figcaption>
                            <input type="submit" name="check_category"value="Others">
                        </figcaption>
                    </form>
                </figure>
                
            </div>
            
        </section>
        <!-- recommended for you -->
        <?php
            if(isset($_SESSION['user'])){
            $select_all = $connectdb->prepare("SELECT orders.customer_email, orders.item_name, orders.company, menu.item_id, menu.item_category, menu.item_name, menu.item_prize, menu.item_foto, menu.company, menu.item_description FROM orders, menu WHERE menu.item_status = 0 AND orders.customer_email = :customer_email AND menu.item_name =  orders.item_name AND menu.company = orders.company GROUP BY orders.item_name LIMIT 6");
            $select_all->bindvalue('customer_email', $user);
            $select_all->execute();
        ?>
        <section id="recommendedItems">
        <h2>Recommended for you</h2>
            <div class="all_items">
                <?php
                    
                    $rows = $select_all->fetchAll();
                    foreach($rows as $row):
                ?>
                <!-- check company status -->
                <?php
                    $get_company = $connectdb->prepare("SELECT payment_status FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
                    $get_company->bindvalue("exhibitor_id", $row->company);
                    $get_company->execute();
                    $company_stat = $get_company->fetch();
                    $company_status = $company_stat->payment_status;
                    if($company_status == 2){
                ?>
                <figure>
                            <img src="<?php echo 'items/'.$row->item_foto?>" alt="recommended item" title="Click to view">
                        
                        <figcaption>
                            <div class="todo">
                                <p><?php echo $row->item_name?></p>
                                <p><i class="fas fa-store"></i> <?php
                                $get_company = $connectdb->prepare("SELECT company_name FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
                                $get_company->bindvalue("exhibitor_id",$row->company);
                                $get_company->execute();
                                $com = $get_company->fetch(); echo $com->company_name;?></p>
                                <span>₦ <?php echo number_format($row->item_prize)?></span>
                            </div>
                            
                        </figcaption>
                        <div class="view_add">
                            <a class="view_item" href="javascript:void(0)" title="show item details" onclick="showItems('<?php echo $row->item_id?>')">View item <i class="fas fa-eye"></i></a>
                            <form action="controller/cart.php" method="POST">
                            <input type="hidden" name="cart_item_id" id="cart_item_id" value="<?php echo $row->item_id?>">
                            <input type="hidden" name="cart_item_name" id="cart_item_name" value="<?php echo $row->item_name?>">
                            <input type="hidden" name="cart_item_price" id="cart_item_price" value="<?php echo $row->item_prize?>">
                            <input type="hidden" name="cart_item_restaurant" id="cart_item_restaurant" value="<?php echo $row->company?>">
                            <input type="hidden" name="customer_email" id="customer_email" value="<?php echo $user?>">
                            <input type="hidden" id="quantity" name="quantity" value="1">
                            <button title="add to cart" class="send_cart"><i class="fas fa-cart-plus"></i></button>
                            </form>
                   
                </figure>
                
                <?php } endforeach ?>
                
            </div>
        </section>
        <?php }?>
    </main>
    <footer>
        <?php include "footer.php"; ?>
    </footer>
    <!-- <div id="loginPrompt">
        <p>Kindly Login to View Item!</p>
        <div class="log">
            <a href="registration.php" title="Login here">Login</a>
            <a href="javascript:void();" id="closeBox" title="Close box">Close</a>
        </div>
    </div> -->
<!-- </div> -->
    <script src="controller/jquery.js"></script>
    <script src="controller/script.js"></script>
</body>
</html>

