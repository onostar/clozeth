<?php
    session_start();
    require "../controller/connections.php";
    if(isset($_SESSION['user'])){
        $username = $_SESSION['user'];
    
        $user_details = $connectdb->prepare("SELECT * FROM exhibitors WHERE company_email = :company_email");
        $user_details->bindvalue("company_email", $username);
        $user_details->execute();

        $users = $user_details->fetchAll();
        foreach($users as $user):
?>
<?php $my_company = $user->exhibitor_id;
    $_SESSION['my_company'] = $my_company;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Clozeth is an online platform made for the purpose of ordering fashion wears, men and women clothing, bed sheets, jewellries, etc from all kinds of retailers and wholesalers in Nigeria and Abroad from whereever you are through your mobile phone, tablet or pc">
    <meta name="keywords" content="Fashion, fashion store, clothings, men, women, men wears, women wears, jewellry, jewellries, rings, earings, wrist watch, eye glass, glass, shoes, order, ordering">
    <title>Clozeth | <?php echo $user->company_name;?> Portal</title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" href="../../fontawesome-free-6.0.0-web/css/all.css">
    <link rel="icon" type="image/png" href="../images/logo.png" size="32X32">
    <link rel="stylesheet" href="../style.css">
    
</head>
<body>
    <main>
        <header>
            <h1 class="logo">
                <a href="exhibitors.php" title="Home">
                    <img src="../images/logo.png" alt="Logo" class="img-fluid">
                </a>
            </h1>
            <h2 id="desktop_h2"><?php echo $user->company_name?></h2>
            <h2 id="mobile_h2"><?php echo $user->company_name;?></h2>
            <div class="other_menu">
                <a href="#" title="Our Gallery">Seller</a>
            </div>
            <div class="login">
                <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
                <div class="login_option">
                    <div>
                        <a class="password_link page_navs" href="javascript:void(0)" data-page="update_password">Change password <i class="fas fa-key"></i></a>
                        <button id="loginBtn"><a href="../controller/exh_logout.php">Log out  <i class="fas fa-power-off"></i></a></button>
                    </div>    
                </div>
            </div>
            <div class="cart" id="user_data">
                <a href="javascript:void(0);" title="<?php echo "Hello. " .$user->contact_person;?>" id="user_name">
                     <span><?php echo $user->contact_person;?></span> 
                    <div class="user_img">
                        <img src="<?php echo "../logos/".$user->company_logo;?>" alt="Logo">
                    </div>
                </a>
            </div>
            <div class="menu_icon">
                <a href="javascript:void(0)"><i class="fas fa-bars"></i></a>
            </div>
        </header>
    
        
        <div class="admin_main">
            <!-- side menus -->
            <?php include "side_menu.php"?>
            
            <section id="contents">
                <div class="success_message">
                    <p>
                        <?php
                            if(isset($_SESSION['success'])){
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                            }
                        ?>
                    </p>
                </div>
                <div class="error_message">
                    <p>
                        <?php
                            if(isset($_SESSION['error'])){
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                        ?>
                    </p>
                </div>
                
                <?php
                    if(isset($_SESSION['reg_success'])){
                        echo "<p class='reg_success'>" . $_SESSION['reg_success'] . "</p>";
                        unset($_SESSION['reg_success']);
                    }
                ?>
                <?php
                    if(isset($_SESSION['package_status'])){
                        echo "<p class='reg_success'>" . $_SESSION['package_status'] . "</p>";
                        unset($_SESSION['package_status']);
                    }
                ?>
                
                <div class="booth">
                    
                    <?php
                        if($user->payment_status == 2):
                    ?>
                    <div class="quick_links">
                        <a class="page_navs" data-page="add_items"href="javascript:void(0)" title="Add items"><i class="fas fa-cart-plus"></i></a>
                        <a class="page_navs" data-page="managePrice"href="javascript:void(0)" title="manage item prices"><i class="fas fa-tags"></i></a>
                        <a class="page_navs" data-page="deleteItems" href="javascript:void(0)" title="Delete items from store"><i class="fas fa-trash"></i></a>
                        <a class="page_navs" data-page="addBanner" href="javascript:void(0)" title="Update store banners"><i class="fas fa-photo-video"></i></a>
                    </div>
                    <?php
                        if($user->payment_status == 2):   
                    ?>
                    <div class="expiration_date">
                        <p>
                            <?php
                                if(date("Y-m-d", strtotime($user->expiration)) != date("Y-m-d")){
                                    echo "Current package will expire on <span>" . date("jS M, Y", strtotime($user->expiration))."</span>";
                                }else{
                                    echo "<span class='expired'>You are running on an expired package. Services wiil be deactivated soon!</span>";
                                }
                            ?>
                        </p>
                    </div>
                    <?php endif?>
                    <p class="user_store"><i class="fas fa-shop"></i> <span><?php 
                        echo "<a target='_blank' href='../../view/exhibitor_menu.php?company=".$user->reg_number."'>Visit store</a>";
                    ?></span></p>
                    <!-- <div class="clear"></div> -->
                    <?php endif?>
                </div>
                <!-- dasghboard -->
                <?php include "dashboard.php"?>
                <!-- show message to encourage sellers to buy plan -->
                <?php
                    if($user->payment_status == 0){

                ?>
                <div class="reg_success reminder">
                    <p>Welcome to Clozeth! Kindly <a href="javascript:void(0)" title="select plan" class="page_navs" data-page="floor_plans" style="background:green; border-radius:20px; color:#fff; padding:5px 10px; margin:5px;" >view our plans</a> and select one to start selling your products online</p>
                </div>
                <?php 
                    }elseif($user->payment_status == 1){
                ?>
                <div class="reg_success reminder">
                    <p style="color:green">Please be patient! Your payment status is being processed. On activation, You can start selling on Clozeth!</p>
                </div>
                <?php }?>
                <!--show summary report -->
                <div id="paid_receipt" class="displays management">
                    <div class="info"></div>
                    
                    <?php 
                        $payment_status = $connectdb->prepare("SELECT * FROM exhibitors WHERE exhibitor_id = :exhibitor_id AND payment_status = 2");
                        $payment_status->bindvalue("exhibitor_id", $user->exhibitor_id);
                        $payment_status->execute();
                        if(!$payment_status->rowCount() > 0){
                            echo "";
                        }else{
                    ?>
                    
                    <div class="daily_monthly">
                        <div class="daily_report allResults">
                            <h3>Daily Encounters</h3>
                            <table>
                                <thead>
                                    <tr>
                                        <td>S/N</td>
                                        <td>Date</td>
                                        <td>Orders</td>
                                        <td>Revenue</td>
                                    </tr>
                                </thead>
                                <?php
                                    $get_daily = $connectdb->prepare("SELECT COUNT(order_id) AS customers, SUM(item_price) AS revenue, delivery_date FROM orders WHERE company = :company AND order_status = 1 GROUP BY delivery_date ORDER BY order_date DESC");
                                    $get_daily->bindvalue("company", $user->exhibitor_id);
                                    $get_daily->execute();
                                        $n = 1;
                                    $dailys = $get_daily->fetchAll();
                                    foreach($dailys as $daily):

                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $n?></td>
                                        <td><?php echo date("jS M, Y",strtotime($daily->delivery_date))?></td>
                                        <td style="text-align:center"><?php echo $daily->customers?></td>
                                        <td><?php echo "₦".number_format($daily->revenue)?></td>
                                    </tr>
                                </tbody>
                                <?php $n++; endforeach;?>

                                
                            </table>
                            <?php 
                                $check_order = $get_daily->rowCount();
                                if(!$check_order){
                                echo "<p style='font-weight:bold; color:chocolate; text-transform:capitalize; font-size:1rem; text-align:center; margin-top:10px;'>No record found!</p>";
                                }
                            ?>
                        </div>
                        <div class="monthly_report allResults">
                            <h3>Monthly Reports</h3>
                            <table>
                                <thead>
                                    <tr>
                                        <td>S/N</td>
                                        <td>Month</td>
                                        <td>Orders</td>
                                        <td>Revenue</td>
                                        <td>Daily Average</td>
                                    </tr>
                                </thead>
                                <?php
                                    $get_monthly = $connectdb->prepare("SELECT COUNT(order_id) AS customers, SUM(item_price) AS revenue, delivery_date, COUNT(delivery_date) AS deliveries,COUNT(DISTINCT delivery_date) AS daily_average FROM orders WHERE company = :company AND order_status = 1 GROUP BY MONTH(delivery_date) ORDER BY order_date DESC");
                                    $get_monthly->bindvalue("company", $user->exhibitor_id);
                                    $get_monthly->execute();
                                    $n = 1;
                                    $monthlys = $get_monthly->fetchAll();
                                    foreach($monthlys as $monthly):

                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $n?></td>
                                        <td><?php echo date("M, Y", strtotime($monthly->delivery_date))?></td>
                                        <td style="text-align:center"><?php echo $monthly->customers?></td>
                                        <td><?php echo "₦".number_format($monthly->revenue)?></td>
                                        <td><?php
                                            $average = $monthly->revenue/$monthly->daily_average;
                                            echo "₦".number_format($average);
                                        ?></td>
                                    </tr>
                                </tbody>
                                <?php $n++; endforeach;?>

                                
                            </table>
                            <?php 
                                $check_order = $get_monthly->rowCount();
                                if(!$check_order){
                                echo "<p style='font-weight:bold; color:chocolate; text-transform:capitalize; font-size:1rem; text-align:center; margin-top:10px;'>No record found!</p>";
                                }
                            ?>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <!-- check store plans -->
                <?php include "store_plans.php"?>

                <!-- upload payment for store -->
                <?php include "store_payment.php"?>

                <!-- Banners -->
                <?php include "banners.php"?>

                <!-- add items -->
                <?php include "add_item.php"?>

                <!-- modify price list -->
                <?php include "modify_price.php" ?>
                
                <!-- Delete items -->
                <?php include "delete_item.php"?>

                <!-- Item lists with price -->
                <?php include "item_list.php"?>

                <!-- manage incoming orders -->
                <?php include "incoming_orders.php"?>

                <!-- manage deliveries -->
                <?php include "deliveries.php"?>
                
                <!-- successful deliveries list -->
                <?php include "sales_report.php"?>

                <!-- Cancelled orders -->
                <?php include "cancelled_orders.php"?>

                <!-- customer list -->
                <?php include "customer_list.php"?>

            <!-- Highest/Lowest Selling items list -->
                <?php include "highest_selling.php"?>

                <!-- update profile -->
                <?php include "update_profile.php"?>

                <!-- update password -->
                <?php include "update_password.php"?>
                
                <!-- help centre -->
                <?php include "help_centre.php"?>
            </section>

        </div>
        
        
    </main>
    
    <?php include "live_chat.php"?>
        
    <script src="../jquery.js"></script>
    <script src="../script.js"></script>
    <script>
        setInterval(function() {
            $("#chat2").load("users.php #chat2");
            let d = $(".all_chat");
            d.scrollTop(d.prop("scrollHeight"));
        }, 3000);
        
    </script>
</body>
</html>

<?php 
    endforeach;
    }else{
        header("Location:../index.php");
    }
?>