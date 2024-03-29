<?php
    require "../controller/server.php";
    session_start();
    $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
    $_SESSION['order_page'] = $_SERVER['REQUEST_URI'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Clozeth is an online platform made for the purpose of ordering fashion wears, men and women clothing, bed sheets, jewellries, etc from all kinds of retailers and wholesalers in Nigeria and Abroad from whereever you are through your mobile phone, tablet or pc">
    <meta name="keywords" content="Fashion, fashion store, clothings, men, women, men wears, women wears, jewellry, jewellries, rings, earings, wrist watch, eye glass, glass, shoes, order, ordering">
    <title>
        <?php
            if(isset($_SESSION['user'])){
                $user = $_SESSION['user'];
                $user_info = $connectdb->prepare("SELECT * FROM shoppers WHERE email = :email");
                $user_info->bindvalue('email', $user);
                $user_info->execute();
                $view = $user_info->fetch();
                echo $view->first_name . " " . $view->last_name. " - Top deals";
            }else{
                echo "Clozeth | Top deals";
            }
         ?>

    </title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="../images/logo.png" size="32X32">
    <link rel="stylesheet" href="../controller/style.css">
    
</head>
<body>
    <?php include "header.php";?>

    <?php include "mobile_menu.php";?>

    <main id="exhibitor_store" class="other_deals">
        <section id="banner">
            <div class="slide">
                <div class="slides">
                    <div class="slide_img">
                        <img src="../images/top_deals2.webp" alt="banner">
                    </div>
                    <div class="description">
                        <h2>Top deals</h2>
                        <p>Get the best deals for the best products available</p>
                        <div class="links">
                            <!-- <a href="#just_in"><i class="fas fa-shopping-cart"></i> Shop Now</a> -->
                            <!-- <a href="contact.php"><i class="fas fa-photo-video"></i> Learn more</a> -->
                        </div>
                        
                    </div>
                </div>
                
                
            </div>
        </section>
        

        <!-- show top deals for this company -->
        <?php
            $search_deals = $connectdb->prepare("SELECT * FROM menu WHERE item_status = 0 AND item_prize < previous_price ORDER BY time_created DESC");
            $search_deals->execute();
            if($search_deals->rowCount() > 0){
                
        ?>
        <section id="just_in">
            <!-- <div class="featured_float">
                <h2>Top Deals</h2>
            </div> -->
            <div class="featured">
                <?php
                    
                    $rows = $search_deals->fetchAll();
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
                        <img src="<?php echo '../items/'.$row->item_foto?>" alt="Top deals">
                        
                        <figcaption>
                            <div class="todo">
                                <p><?php echo $row->item_name?></p>
                                <!-- <p><i class="fas fa-layer-group"></i> <?php
                                $get_category = $connectdb->prepare("SELECT category FROM categories WHERE category_id = :category_id");
                                $get_category->bindvalue("category_id",$row->item_category);
                                $get_category->execute();
                                $cat = $get_category->fetch(); echo $cat->category;?></p> -->
                                <span>₦<?php echo number_format($row->item_prize)?></span>
                                <span class="previous_price">₦<?php echo number_format($row->previous_price)?></span>
                            </div>
                        </figcaption>
                        <div class="view_add">
                            <a class="view_item" href="javascript:void(0)" title="show item details" onclick="showItems('<?php echo $row->item_id?>')">View item <i class="fas fa-eye"></i></a>
                            <form action="../controller/cart.php" method="POST">
                            <input type="hidden" name="cart_item_id" id="cart_item_id" value="<?php echo $row->item_id?>">
                            <input type="hidden" name="cart_item_name" id="cart_item_name" value="<?php echo $row->item_name?>">
                            <input type="hidden" name="cart_item_price" id="cart_item_price" value="<?php echo $row->item_prize?>">
                            <input type="hidden" name="cart_item_restaurant" id="cart_item_restaurant" value="<?php echo $row->company?>">
                            <input type="hidden" name="customer_email" id="customer_email" value="<?php echo $user?>">
                            <input type="hidden" id="quantity" name="quantity" value="1">
                            <button title="add to cart" class="send_cart"><i class="fas fa-cart-plus"></i></button>
                            </form>
                        </div>
                        <div class="percentage">
                            <?php
                                $percent = (($row->previous_price - $row->item_prize) / $row->previous_price) * 100;
                            ?>
                            <p>-<?php echo number_format($percent);?>%</p>
                        </div>
                 
                </figure>
                
                <?php }; endforeach ?>
                
            </div>
            <!-- <form action="controller/more_featured.php" method="POST">
                <input type="hidden" name="moreFeatured" value="1" id="moreFeatured">
                <button type="submit" id="viewMore" name="viewMore">View more</button>
                
            </form> -->
            
        </section>
        <?php }?>
        

        
    </main>
    <footer>
        <?php include "footer.php";?>
    </footer>
    <script src="../controller/jquery.js"></script>
    <script src="../controller/script.js"></script>
    
</body>
</html>
