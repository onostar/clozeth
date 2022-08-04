<?php
    require "../controller/server.php";
    session_start();
    $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
    

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
                echo $view->first_name . " " . $view->last_name. " - Clozeth | All items";
            }else{
                echo "Clozeth | ALl items";
            }
         ?>

    </title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.css">
    <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" href="../fontawesome-free-6.0.0-web/css/all.css">
    <link rel="icon" type="image/png" href="images/foodie.png" size="32X32">
    <link rel="stylesheet" href="../controller/style.css">
    
</head>
<body>
    <?php include "header.php";?>

    <?php include "mobile_menu.php";?>

    <main>
        <section id="searchResults">
            <?php
                $search_query = $connectdb->prepare("SELECT * FROM menu WHERE item_status = 0 ORDER BY time_created DESC");
                $search_query->execute();
                    
            ?>
            <h2><strong>Check out more items from our collections</strong></h2>
            <hr>
            <div class="results featured">
                
                <?php 
                    if(!$search_query->rowCount()){
                        echo "<p class='no_result'>'No result found!'</p>";
                    }
                    $shows = $search_query->fetchAll();
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
                        <img src="<?php echo '../items/'.$show->item_foto?>" alt="featured item" title="click to view">

                   
                        <figcaption>
                            <div class="todo">
                                <p class="first"><?php echo $show->item_name?></p>
                                <p><i class="fas fa-shop"></i> <?php
                                $get_company = $connectdb->prepare("SELECT company_name FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
                                $get_company->bindvalue("exhibitor_id",$show->company);
                                $get_company->execute();
                                $com = $get_company->fetch(); echo $com->company_name;?></p>
                                <!-- <p><?php echo $show->item_category?></p> -->
                                <span>₦ <?php echo number_format($show->item_prize)?></span>
                                <?php if($show->item_prize < $show->previous_price){?>
                                    <span class="previous_price">₦<?php echo number_format($show->previous_price)?></span>
                                <?php }?>
                            </div>

                            <?php
                                if($show->item_prize < $show->previous_price){
                            ?>
                            <div class="percentage">
                                <?php
                                    $percent = (($show->previous_price - $show->item_prize) / $show->previous_price) * 100;
                                ?>
                                <p style="color:#2e2d2d">-<?php echo number_format($percent);?>%</p>
                            </div>
                            <?php }?>
                        </figcaption>
                        <div class="view_add">
                            <a class="view_item" href="javascript:void(0)" title="show item details" onclick="showItems('<?php echo $show->item_id?>')">View item <i class="fas fa-eye"></i></a>
                            <form action="../controller/cart.php" method="POST">
                            <input type="hidden" name="cart_item_id" id="cart_item_id" value="<?php echo $show->item_id?>">
                            <input type="hidden" name="cart_item_name" id="cart_item_name" value="<?php echo $show->item_name?>">
                            <input type="hidden" name="cart_item_price" id="cart_item_price" value="<?php echo $show->item_prize?>">
                            <input type="hidden" name="cart_item_restaurant" id="cart_item_restaurant" value="<?php echo $show->company?>">
                            <input type="hidden" name="customer_email" id="customer_email" value="<?php echo $user?>">
                            <input type="hidden" id="quantity" name="quantity" value="1">
                            <button title="add to cart" class="send_cart"><i class="fas fa-cart-plus"></i></button>
                            </form>
                </figure>
                <?php }?>
                <?php endforeach ?>
            </div>
        </section>

        
    </main>
    <footer>
        <?php include "footer.php";?>
    </footer>

    <!-- <script src="bootstrap.min.js"></script> -->
    <script src="../controller/jquery.js"></script>
    <script src="../controller/script.js"></script>
    
</body>
</html>

