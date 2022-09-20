<?php
    require "controller/server.php";
    session_start();
    $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
    /* get item details */
    if(isset($_GET['item'])){
        $item_id = $_GET['item'];
        $get_name = $connectdb->prepare("SELECT * FROM menu WHERE item_id = :item_id");
        $get_name->bindvalue("item_id", $item_id);
        $get_name->execute();
        $namess = $get_name->fetchAll();
        foreach($namess as $names){
            $item = $names->item_name;
            $item_desc = $names->item_description;
            $item_img = $names->item_foto;
            $item_com = $names->company;
        }
        $get_company = $connectdb->prepare("SELECT company_name FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
        $get_company->bindvalue("exhibitor_id", $item_com);
        $get_company->execute();
        $seller = $get_company->fetch();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php
     echo $seller->company_name. ' | '.$item. ' - ' .$item_desc?>">
    <meta name="keywords" content="Fashion, fashion store, clothings, men, women, men wears, women wears, jewellry, jewellries, rings, earings, wrist watch, eye glass, glass, shoes, order, ordering">
    <title>
        <?php
            
            if(isset($_SESSION['user'])){
                $user = $_SESSION['user'];
                $user_info = $connectdb->prepare("SELECT * FROM shoppers WHERE email = :email");
                $user_info->bindvalue('email', $user);
                $user_info->execute();
                $view = $user_info->fetch();
                echo $view->first_name . " " . $view->last_name. " - ".$item;
            }else{
                echo $seller->company_name." | ". $item;
            }
            
         ?>

    </title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" href="fontawesome-free-6.0.0-web/css/all.css">
    <link rel="icon" type="image/png" href="<?php echo 'items/'.$item_img?>" size="32X32">
    <link rel="stylesheet" href="controller/style.css">
    
</head>
<body>
    <?php include "header.php";?>

    <?php include "view/mobile_menu.php";?>

    
    <main>
        <section id="itemContent">
            
            <div class="itemInfo">
                <?php
                    if(isset($_GET['item'])){
                        $item_id = $_GET['item'];
                    

                        $view_item = $connectdb->prepare("SELECT menu.item_name, menu.item_prize, menu.item_id, menu.item_category, menu.item_foto, menu.other_foto, menu.item_description, menu.company, menu.payment_option, menu.delivery_time, exhibitors.exhibitor_id, exhibitors.company_name, exhibitors.company_address, exhibitors.company_logo, exhibitors.reg_number, exhibitors.contact_phone FROM menu, exhibitors WHERE menu.company = exhibitors.exhibitor_id AND item_id = :item_id");
                        $view_item->bindvalue('item_id', $item_id);
                        $view_item->execute();

                        $items = $view_item->fetchAll();
                        foreach($items as $item): 
                ?>
                <?php
                    $restaurant_name = $item->company_name;
                    $get_category = $connectdb->prepare("SELECT category FROM categories WHERE category_id = :category_id");
                    $get_category->bindvalue("category_id",$item->item_category);
                    $get_category->execute();
                    $cat = $get_category->fetch();
                    $category = $cat->category;
                    $item_name = $item->item_name;
                ?>
                <figure class="item_details"> 
                    <div class="item_pics">
                        <div class="slide_foto">
                            <img src="<?php echo 'items/'.$item->item_foto?>" alt="Item">
                            <img src="<?php echo 'items/'.$item->other_foto?>" alt="Item">

                        </div>
                        <div class="arrows">
                            <a class="left_arrow" href="javascript:void(0)"><i class="fas fa-chevron-left"></i></a>
                            <a class="right_arrow" href="javascript:void(0)"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <form action="controller/cart.php" method="POST">
                        <input type="hidden" name="cart_item_name" id="cart_item_name" value="<?php echo $item->item_name?>">
                        <input type="hidden" name="cart_item_id" id="cart_item_id" value="<?php echo $item->item_id?>">
                        <input type="hidden" name="cart_item_price" id="cart_item_price" value="<?php echo $item->item_prize?>">
                        <input type="hidden" name="cart_item_restaurant" id="cart_item_restaurant" value="<?php echo $item->company?>">
                        <input type="hidden" name="customer_email" id="customer_email" value="<?php echo $user?>">
                        <figcaption>
                            <div class="menu_logo">
                                <img src="<?php echo "admin/logos/".$item->company_logo;?>" alt="company">
                                <!-- view store  -->
                                <?php
                                    echo "<a href='view/exhibitor_menu.php?company=".$item->reg_number."'><i class='fas fa-shop'></i> Visit store</a>";
                                ?>
                                
                            </div>
                            <div class="clear"></div>
                            <p><span>Name:</span> <?php echo $item->item_name?></p>
                            <p><span>Category:</span> <?php echo $category?></p>
                            <p><span>Amount:</span> ₦<?php echo number_format($item->item_prize)?></p>
                            <p><span>Company:</span> <?php echo $item->company_name?></p>
                            <p><span>Payment Option:</span> <?php echo $item->payment_option?></p>
                            <p><span>Delivery time:</span> <?php echo $item->delivery_time?></p>
                            <input type="number" id="quantity" title="Enter quantity" name="quantity" required placeholder="Quantity" value="1">
                            <button type="submit" name="add_to_cart" id="add_to_cart" title="add to cart" class="add_cart">Add to Cart <i class="fas fa-cart-plus"></i></button>
                            <p class="dm"><?php echo "<a target='_blank' href='https://wa.me/+234".$item->contact_phone."' title='Message Store owner'><i class='fab fa-whatsapp'></i> Send us a DM</a>";?></p>
                        </figcaption>
                    </form>
                </figure>
                <div class="item_descriptions">
                    <hr>
                    <h3>Item Descriptions</h3>
                    <p><?php echo $item->item_description;?></p>
                </div>
                <?php endforeach; }?>
            </div>
        </section>
        <section id="just_in">
            <?php
                 $select_featured = $connectdb->prepare("SELECT * FROM menu WHERE /* item_name != :item_name AND  */item_category LIKE '%$item->item_category%' OR company LIKE '%$item->company%' AND item_name != :item_name ORDER BY time_created LIMIT 6");
                 $select_featured->bindvalue("item_name", $item->item_name);
                 $select_featured->execute();
                 if($select_featured->rowCount() > 0){
            ?>
            <h2>Items you may like</h2>
            <div class="all_items">

                <?php
                    $select_featured = $connectdb->prepare("SELECT * FROM menu WHERE item_name != :item_name AND /* item_category LIKE '%$item->item_category%' OR */ company LIKE '%$item->company%' ORDER BY time_created LIMIT 6");
                    $select_featured->bindvalue("item_name", $item_name);
                    $select_featured->execute();
                    $shows = $select_featured->fetchAll();
                    foreach($shows as $show):
                ?>
                <!-- check company status -->
                <?php
                    $get_company = $connectdb->prepare("SELECT payment_status FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
                    $get_company->bindvalue("exhibitor_id", $show->company);
                    $get_company->execute();
                    $company_stat = $get_company->fetch();
                    $company_status = $company_stat->payment_status;
                    if($company_status == 2){
                ?>
                <figure>
                    <a href="javascript:void(0);" onclick="showItems('<?php echo $show->item_id?>')">
                        <img src="<?php echo 'items/'.$show->item_foto?>" alt="Item">

                    </a>
                    <form action="../controller/cart.php" method="POST">
                        <input type="hidden" name="cart_item_id" id="cart_item_id" value="<?php echo $show->item_id?>">
                        <input type="hidden" name="cart_item_name" id="cart_item_name" value="<?php echo $show->item_name?>">
                        <input type="hidden" name="cart_item_price" id="cart_item_price" value="<?php echo $show->item_prize?>">
                        <input type="hidden" name="cart_item_restaurant" id="cart_item_restaurant" value="<?php echo $show->company?>">
                        <input type="hidden" name="customer_email" id="customer_email" value="<?php echo $user?>">
                        <input type="hidden" id="quantity" name="quantity" value="1">
                        <figcaption>
                            <div class="todo">
                                <p class="first"><?php echo $show->item_name?></p>
                                <p><i class="fas fa-store"></i> <?php
                                $get_company = $connectdb->prepare("SELECT company_name FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
                                $get_company->bindvalue("exhibitor_id",$show->company);
                                $get_company->execute();
                                $com = $get_company->fetch(); echo $com->company_name;?></p>
                                <!-- <p><?php echo $show->item_category?></p> -->
                                <span>₦ <?php echo number_format($show->item_prize)?></span>
                            </div>
                            <button type="submit" name="add_to_cart" id="add_to_cart" title="add to cart" class="add_cart"><i class="fas fa-shopping-cart"></i></button>
                        </figcaption>
                    </form>
                </figure>
                
                <?php }; endforeach ?>
            </div>
            <?php }?>
            <!-- <button id="view_more">View more</button>
            <button id="show_less">Show less</button> -->
        </section>
        <!-- <section id="shop" class="row">
            
        </section> -->
        
    </main>
    
    <footer>
        <?php include "footer.php";?>
    </footer>
    <!-- <script src="bootstrap.min.js"></script> -->
    <script src="controller/jquery.js"></script>
    <script src="controller/script.js"></script>
    <script>
        /* show next foto */
        $(document).ready(function(){
            $(".right_arrow").click(function(){
                document.querySelector(".slide_foto").style.left = "-100%";
            })
        })
        /* show previous page */
        $(document).ready(function(){
            $(".left_arrow").click(function(){
                document.querySelector(".slide_foto").style.left = "0%";
            })
        })
    </script>
</body>
</html>
