<?php
    require "../controller/server.php";
    session_start();
    $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Clozeth is an online platform made for the purpose of ordering fashion wears, men and women clothing, bed sheets, jewellries, etc from all kinds of retailers and wholesalers in Nigeria and Abroad from whereever you are through your mobile phone, tablet or pc">
    <meta name="keywords" content="Fashion, fashion store, clothings, men, women, men wears, women wears, jewellry, jewellries, rings, earings, wrist watch, eye glass, glass, shoes, order, ordering">
    <title>
        <?php
            $user_info = $connectdb->prepare("SELECT * FROM shoppers WHERE email = :email");
            $user_info->bindvalue('email', $user);
            $user_info->execute();
            $view = $user_info->fetch();
            echo $view->first_name . " " . $view->last_name. " | Clozeth - Order history";
        ?>
    </title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="images/logo.png" size="32X32">
    <link rel="stylesheet" href="../controller/style.css">
    
</head>
<body>
    <?php include "header.php";?>

    <?php include "mobile_menu.php";?>

    <main>
    <section id="history">
            <h2>My Order history</h2>
            <hr>
            <p class="successful">
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
            </p>
            <div class="order_history">
                <?php
                    $select_orders = $connectdb->prepare("SELECT orders.customer_email, orders.item_name, orders.quantity, orders.item_price, orders.company, orders.order_date, orders.order_number, orders.order_status, orders.delivery_date, menu.item_name, menu.item_foto FROM orders, menu WHERE orders.item_name = menu.item_name AND orders.customer_email = :customer_email ORDER BY orders.order_time DESC");
                    $select_orders->bindvalue('customer_email', $user);
                    $select_orders->execute();

                    $rows = $select_orders->fetchAll();
                    foreach($rows as $row):
                ?>

                <figure>
                    <img src="<?php echo '../items/'.$row->item_foto?>" alt="my order">
                    <figcaption>
                        <div class="order_details">
                            <h4>Order#: <?php echo $row->order_number;?></h4>
                            <p id="name"><?php echo $row->item_name;?></p>
                            <p><i class="fas fa-store"></i> <?php
                            $get_company = $connectdb->prepare("SELECT company_name FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
                            $get_company->bindvalue("exhibitor_id",$row->company);
                            $get_company->execute();
                            $com = $get_company->fetch(); echo $com->company_name;?></p>
                            <p>Qty: <?php echo $row->quantity;?></p>
                            <p>Amount: ₦<?php echo number_format($row->item_price);?></p>
                            <p>Date: <?php echo date("M jS, Y", strtotime($row->order_date));?></p>
                        </div>
                        <div class="status_order"> 
                            <?php 
                                $order_status = 
                                $row->order_status;
                                if($order_status == 1){
                                    echo "<p style='background:green; padding:4px;
                                    border-radius:5px;'>Delivered <i class='fas fa-truck'></i></p>";
                                }elseif($order_status == -1){
                                    echo "<p style='background:red; padding:4px;
                                    border-radius:5px;'>Cancelled <i class='fas fa-plane-slash'></i></p>";
                                }else{
                                    echo "<p style='background:rgb(188, 201, 68); padding:4px;
                                    border-radius:5px;'>Awaiting delivery <i class='fas fa-plane'></i></p>";
                                }
                            ?>
                        </div>
                    </figcaption>
                </figure>
                <?php
                    endforeach;
                    
                    if(!$select_orders->rowCount()){
                        echo "<p style='font-weight:bold; color:chocolate; text-transform:capitalize; font-size:1.1; text-align:center; margin-top:10px;'>No record found!</p>";
                    }
                ?>
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

<?php
    }else{
        header("Location: ../index.php");
    }
?> 