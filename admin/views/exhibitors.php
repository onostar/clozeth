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
            <h2 id="mobile_h2">Portal</h2>
            <div class="other_menu">
                <a href="#" title="Our Gallery">Store owner</a>
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
            <aside class="main_menu" id="mobile_log">
                <div class="login">
                    <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
                    <div class="login_option">
                        
                        <div>
                            <button id="loginBtn"><a href="../controller/exh_logout.php">Log out</a></button>
                            
                        </div>
                    </div>
                </div>
                <nav>
                    <h3><a href="exhibitors.php" title="Home"><i class="fas fa-home"></i> Dashboard</a></h3>
                    <ul>        
                        <!-- <li><a href="javascript:void(0);" id="addCat" title="View floor plans" class="page_navs" data-page="floor_plans"><i class="fas fa-building"></i> Floor plans</a></li> -->
                        <?php
                            
                            if($user->payment_status == 0){
                        ?>
                        <li><a href="javascript:void(0);" id="storePlans" title="select store plans" class="page_navs" data-page="floor_plans"><i class="fas fa-building"></i> View store Plans</a></li>
                        <li><a href="javascript:void(0);" id="addCat" title="Upload payment" class="page_navs" data-page="addCategories"><i class="fas fa-money-check-alt"></i> Make payment</a></li>
                        <?php }?>
                        <?php
                            if($user->payment_status == 2){
                        ?>
                        <li><a href="javascript:void(0);" class="addMenu" title="set up your store"><i class="fas fa-store"></i> Manage store <i class="fas fa-chevron-down more_option"></i></a>
                            <ul class="nav1Menu">
                                <li><a href="javascript:void(0);" id="addHot" title="Add items" class="page_navs" data-page="add_items"><i class="fas fa-folder-plus"></i>Add Items </a></li>
                                <li><a href="javascript:void(0);" id="addBan" title="Store bnners" class="page_navs" data-page="addBanner"><i class="fas fa-images"></i>Update Banners </a></li>
                                <li><a href="javascript:void(0);" id="addpri" title="Manage item prices" class="page_navs" data-page="managePrice"><i class="fas fa-tags"></i>Item prices </a></li>
                                <li><a href="javascript:void(0);" id="delItem" title="Delete item from store" class="page_navs" data-page="deleteItems"><i class="fas fa-trash"></i>Delete Item </a></li>
                            </ul>
                        </li>
                        <?php }?>
                        
                        <li><a href="javascript:void(0);" id="itemsBtn" class="page_navs" data-page="itemList"><i class="fas fa-gift"></i> Item list</a></li>
                        <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="orderList"><i class="fas fa-shopping-cart"></i> Manage Orders </a></li>
                        <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="deliveryList"><i class="fas fa-coins"></i> Delivery Reports </a></li>
                        <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="profile"><i class="fas fa-user-cog"></i> Update profile</a></li>
                    </ul>
                </nav>
            </aside>
            <aside class="mobile_menu" id="mobile_log">
                <div class="login">
                    <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
                    <div class="login_option">
                        <div>
                            <a class="password_link"href="javascript:void(0)" class="page-navs" data-page="update_password">Change password <i class="fas fa-key"></i></a>
                            <button id="loginBtn"><a href="../controller/logout.php">Log out</a></button>
                            
                        </div>
                    </div>
                </div>
                <nav>
                    <h3><a href="user.php" title="Home"><i class="fas fa-home"></i> Dashboard</a></h3>
                    <ul>        
                    <?php
                            
                            if($user->payment_status == 0){
                        ?>
                        <li><a href="javascript:void(0);" id="storePlans" title="select store plans" class="page_navs" data-page="floor_plans"><i class="fas fa-money-check-alt"></i> View store Plans</a></li>
                        <li><a href="javascript:void(0);" id="addCat" title="Upload payment" class="page_navs" data-page="addCategories"><i class="fas fa-money-check-alt"></i> Make payment</a></li>
                        <?php }?>
                        <?php
                            if($user->payment_status == 2){
                        ?>
                        <li><a href="javascript:void(0);" class="addMenu" title="set up your store"><i class="fas fa-store"></i> Manage store <i class="fas fa-chevron-down more_option"></i></a>
                            <ul class="nav1Menu">
                                <li><a href="javascript:void(0);" id="addHot" title="Add items" class="page_navs" data-page="add_items"><i class="fas fa-folder-plus"></i>Add Items </a></li>
                                <li><a href="javascript:void(0);" id="addBan" title="Store bnners" class="page_navs" data-page="addBanner"><i class="fas fa-images"></i>Update Banners </a></li>
                            </ul>
                        </li>
                        <?php }?>
                        <li><a href="javascript:void(0);" id="itemsBtn" class="page_navs" data-page="itemList"><i class="fas fa-gift"></i> Item list</a></li>
                        <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="orderList"><i class="fas fa-shopping-cart"></i> Manage Orders </a></li>
                        <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="deliveryList"><i class="fas fa-coins"></i> Delivery Reports </a></li>
                        <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="profile"><i class="fas fa-user-cog"></i> Update profile</a></li>
                    </ul>
                </nav>
            </aside>
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
                    <p class="user_store"><i class="fas fa-store"></i> <span><?php 
                        echo "<a target='_blank' href='../../view/exhibitor_menu.php?company=".$user->reg_number."'>Visit store</a>";
                    ?></span></p>
                    <!-- <div class="clear"></div> -->
                    <?php endif?>
                </div>
                <div id="dashboard">
                    
                    <div class="cards" id="card2">
                        <a href="javascript:void(0)">
                            <p>Store status</p>
                            <div class="infos">
                                <?php
                                    $get_status = $connectdb->prepare("SELECT payment_status FROM exhibitors WHERE company_email = :company_email");
                                    $get_status->bindvalue("company_email", $username);
                                    $get_status->execute();
                                    $stat = $get_status->fetch();
                                    if($stat->payment_status == 1){
                                        echo "<i class='fas fa-spinner'></i>";
                                    }elseif($stat->payment_status == 2){
                                        echo "<i class='fas fa-check'></i>";
                                    }else{
                                        echo "<i class='fas fa-ban'></i>";
                                    }
                                ?>
                                
                                <p>
                                    <?php
                                        
                                        if($stat->payment_status == 1){
                                            echo "Processing";
                                        }elseif($stat->payment_status == 2){
                                            echo "Approved";
                                        }else{
                                            echo "Pending";
                                        }

                                        
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div> 
                    <div class="cards" id="card4">
                        <a href="javascript:void(0)" class="page_navs" data-page="orderList">
                            <p>Pending Orders</p>
                            <div class="infos">
                                <i class="fas fa-cart-arrow-down"></i>
                                <p>
                                <?php
                                    $orders = $connectdb->prepare("SELECT * FROM orders WHERE company = :company AND order_status != 1 AND order_status != -1");
                                    $orders->bindvalue('company', $user->exhibitor_id);
                                    $orders->execute();
                                    echo $orders->rowCount();
                                ?>
                                </p>
                            </div>
                        </a>
                    </div> 
                    <div class="cards" id="card5">
                        <a href="javascript:void(0)">
                            <p>Daily sales</p>
                            <div class="infos">
                                <i class="fas fa-coins"></i>
                                <p>
                                    <?php
                                        
                                        $sales = $connectdb->prepare("SELECT SUM(item_price) AS today_sales  FROM orders WHERE company = :company AND order_status = 1 AND delivery_date = CURDATE()");
                                        $sales->bindvalue('company', $user->exhibitor_id);
                                        $sales->execute();
                                        
                                        $totals = $sales->fetchAll();
                                        foreach($totals as $total){
                                            echo "₦ " . number_format($total->today_sales, 2);
                                        }
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div> 
                   
                </div>
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
                                        <td><?php echo $daily->customers?></td>
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
                                        <td>Date</td>
                                        <td>Orders</td>
                                        <td>Revenue</td>
                                        <td>Daily Average</td>
                                    </tr>
                                </thead>
                                <?php
                                    $get_monthly = $connectdb->prepare("SELECT COUNT(order_id) AS customers, SUM(item_price) AS revenue, delivery_date FROM orders WHERE company = :company AND order_status = 1 GROUP BY MONTH(delivery_date) ORDER BY order_date DESC");
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
                                        <td><?php echo $monthly->customers?></td>
                                        <td><?php echo "₦".number_format($monthly->revenue)?></td>
                                        <td></td>
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
                <div id="floor_plans" class="displays">
                    <h3>Store plans</h3>
                    <div class="plans">
                        <?php
                            $get_plans = $connectdb->prepare("SELECT * FROM plans ORDER BY plan");
                            $get_plans->execute();
                            $planss = $get_plans->fetchAll();
                            foreach($planss as $plans):
                        ?>
                        <div class="store_plan">
                            <?php
                                $get_package = $connectdb->prepare("SELECT * FROM plan_package WHERE plan = :plan ORDER BY package");
                                $get_package->bindvalue("plan", $plans->plan_id);
                                $get_package->execute();
                                $packagess = $get_package->fetchAll();
                                foreach($packagess as $packages):
                            ?>
                            <div class="packages">
                                <h5><?php echo $plans->plan?></h5>
                                <h2><?php echo $packages->package?></h2>
                                <p><strong>Duration:</strong> <?php echo $packages->duration . " days"?></p>
                                <h4>Features:</h4>
                                <p><?php echo $packages->features?></p>
                                <h4 class="allFeats"><?php echo "₦".number_format($packages->package_price, 2, ".");?></h4>
                                <a href="javascript:void(0)" title="Select this plan" class="page_navs" data-page="addCategories">Get Plan <i class="fas fa-paper-plane"></i></a>
                            </div>
                            <?php endforeach?>
                        </div>
                        <?php endforeach?>
                    </div>
                </div>
                <!-- upload payment for store -->
                <?php
                    if($user->payment_status != 2 || $user->payment_status != 1):
                ?>
                <div id="addCategories" class="displays">
                    <?php
                        $get_booth_status = $connectdb->prepare("SELECT * FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
                        $get_booth_status->bindvalue("exhibitor_id", $user->exhibitor_id);
                        $get_booth_status->execute();
                        $statuss = $get_booth_status->fetchAll();
                        foreach($statuss as $status){
                            if($status->payment_status == 2){
                            
                        
                    ?>
                    <div class="add_user_form" id="booth_det">
                        <?php
                            $get_boothId = $connectdb->prepare("SELECT * FROM plans WHERE plan_id = :plan_id");
                            $get_boothId->bindvalue("plan_id", $status->plan);
                            $get_boothId->execute();
                            $booths = $get_boothId->fetchAll();
                            foreach($booths as $booth):
                        ?>
                        <h3>Your plan details</h3>
                        <div class="inputs">
                                
                            <div class="data">
                                <h2><?php echo $booth->plan?></h2>
                            </div>
                            <?php 
                                $get_package = $connectdb->prepare("SELECT package FROM plan_package WHERE plan = :plan");
                                $get_package->execute();
                                $booth = $get_package->fetch();
                            ?>
                            <div class="data">
                                <p>(<?php echo $booth->package?>)</p>
                            </div>
                        </div>
                        <?php endforeach?>
                    </div>
                    <?php 
                        }elseif($status->payment_status == 1){
                            echo "<p class='alert'>Your store request is still under propagation. Kindly await approval!</p>";
                        }else{
                    ?>
                    <div class="info"></div>
                    <div class="add_user_form">
                        <h3>Select store package with payment</h3>
                        <form method="POST"  id="addCatForm" action="../controller/upload_exh_payment.php" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $user->exhibitor_id?>" name="exhibitor_id">
                            <div class="inputs">
                                
                                <div class="data booth_type">
                                    <label for="store_plans">Select plans</label>
                                    <select name="store_plans" id="store_plans">
                                        <option value=""selected>Select Plan</option>
                                        <?php
                                            $get_plan = $connectdb->prepare("SELECT * FROM plans ORDER BY plan");
                                            $get_plan->execute();
                                            $planss = $get_plan->fetchAll();
                                            foreach($planss as $plans):
                                        ?>
                                        <option value="<?php echo $plans->plan_id;?>"><?php echo $plans->plan;?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="data">
                                    <label for="package">Choose package</label>
                                    <select name="package_id" id="package_id">
                                        <option value=""selected>select plan first</option>
                                    </select>
                                </div>
                              
                            </div>
                            <div class="inputs" id="price">
                                
                            </div>
                            <div class="inputs">
                                <div class="data">
                                    <label for="payment">Upload Payment Slip</label>
                                    <input type="file" name="payment" id="payment" required>
                                </div>
                                <div class="data">
                                    <button type="submit" id="add_booth_pay" name="add_booth_pay">Upload payment <i class="fas fa-upload"></i></button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                    <?php
                            }
                        }
                    ?>
                </div>
                <?php endif?>
                <!-- Banners -->
                <?php include "banners.php"?>
                <!-- add items -->
                <div id="add_items" class="displays">
                    <?php
                        $payment_status = $connectdb->prepare("SELECT payment_status FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
                        $payment_status->bindvalue("exhibitor_id", $user->exhibitor_id);
                        $payment_status->execute();
                        $status = $payment_status->fetch();
                        if($status->payment_status == 0){
                            echo "<p class='enrolled'>Store status is currently pending!<br>Kindly select  a plan and upload payment evidence</p>";
                        }elseif($status->payment_status == 1){
                            echo "<p class='enrolled'>Your payment is under review!<br>Kindly await approval</p>";
                        }else{
                    ?>
                    <div class="info"></div>
                    <div class="add_user_form">
                        <h3>Add items to store</h3>
                        <form method="POST"  id="addCatForm" action="../controller/add_items.php" enctype="multipart/form-data">
                            
                            <div class="inputs">
                                <input type="hidden" name="company" id="company"value="<?php echo $user->exhibitor_id;?>">
                                <div class="data">
                                    <label for="category">Select Category</label>
                                    <select name="item_category" id="item_category" required>
                                        <option value=""selected>Choose a category</option>
                                        <?php
                                            $get_cat = $connectdb->prepare("SELECT * FROM categories ORDER BY category");
                                            $get_cat->execute();
                                            $cats = $get_cat->fetchAll();
                                            foreach($cats as $cat):
                                        ?>
                                        <option value="<?php echo $cat->category_id?>"><?php echo $cat->category?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="data">
                                    <label for="items">Enter Item name</label>
                                    <input type="text" name="item_name" id="item_name" required value="<?php
                                        if(isset($_SESSION['item_name'])){
                                            echo $_SESSION['item_name'];
                                            unset($_SESSION['item_name']);
                                        }
                                    ?>">
                                </div>
                                <div class="inputs">
                                    <div class="data">
                                        <label for="item_prize">Item Price (NGN)</label>
                                        <input type="number" name="item_prize" id="item_prize" required value="<?php
                                            if(isset($_SESSION['price'])){
                                                echo $_SESSION['price'];
                                            unset($_SESSION['price']);

                                            }
                                        ?>">
                                    </div>
                                    <div class="data">
                                        <label for="payment_option">Payment Options</label>
                                        <select name="payment_option" id="pyment_option" required>
                                            <option value="" SELECTED>Select a payment option</option>
                                            <option value="pay on delivery">Pay on Delivery</option>
                                            <option value="50% upfront">Pay 50% upfront </option>
                                            <option value="Full pyment">Full payment </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="inputs">
                                    
                                    <div class="data">
                                        <label for="item_desc">Item description</label>
                                        <textarea rows="6" type="text" name="item_desc" id="item_desc" required placeholder="Give proper description and features of the product"value="<?php
                                            if(isset($_SESSION['item_desc'])){
                                                echo $_SESSION['item_desc'];
                                            unset($_SESSION['item_desc']);

                                            }
                                        ?>"></textarea>
                                    </div>
                                    
                                    <div class="data">
                                        <label for="item_foto">Item Image</label>
                                        <input type="file" name="item_foto" id="item_foto" required>
                                    </div>
                                </div>
                                    
                                    <div class="data">
                                        <button type="submit" id="addItem" name="addItem">Add item <i class="fas fa-folder-plus"></i></button>
                                    </div>
                            </div>
                            
                        </form>
                    </div>
                    <?php } ?>
                </div>
                <!-- modify price list -->
                <div id="managePrice" class="allResults displays">
                    <h2>Modify Item Price</h2>
                    <hr>
                    <div class="info"></div>
                    <div class="search">
                        <input type="search" id="searchPrice" placeholder="Enter keyword">
                    </div>
                    <table id="priceTable">
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <!-- <td>Restaurant Name</td> -->
                                <td>item</td>
                                <td>Modify Price</td>
                            </tr>
                        </thead>

                        <?php
                            $n = 1;
                            $select_itemss = $connectdb->prepare("SELECT * FROM menu WHERE company = :company ORDER BY item_name");
                            $select_itemss->bindvalue("company", $user->exhibitor_id);
                            $select_itemss->execute();
                            
                            $rows = $select_itemss->fetchAll();
                            foreach($rows as $row):
                        ?>
                        <tbody>
                            <tr>
                                <td style="text-align:center;"><?php echo $n?></td>
                                
                                <td><?php echo $row->item_name?></td>
                                <td class="prices">
                                    <a href="javascript:void(0)" data-form="check<?php echo $row->item_id?>" class="each_prices"><?php echo "₦ ". number_format($row->item_prize);?></a>
                                    <form method="POST" id="check<?php echo $row->item_id?>" class="priceForm" action="../controller/change_price.php">
                                        <input type="hidden" name="item_id" id="item_id" value="<?php echo $row->item_id?>">
                                        <input type="hidden" name="old_prize" id="old_prize" value="<?php echo $row->item_prize?>">
                                        <input type="text" name="item_prize" id="item_prize" title="Click to edit price" value="<?php echo $row->item_prize;?>"><button type="submit" name="change_prize" id="changePrize" class="changePrizes"><i class="fas fa-check"></i></button>
                                        <button><a href="javascript:void(0)" class="closeForm"><i class="fas fa-window-close"></i></a></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>

                        <?php $n++; endforeach;?>
                    </table>
                </div>
                
                <!-- Delete items -->
                <div id="deleteItems" class="displays allResults">
                
                <h2>Delete item from store</h2>
                    <hr>
                    <div class="search">
                        <input type="search" id="searchDel" placeholder="Enter keyword">
                    </div>
                    <table id="del_table">
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Category</td>
                                <td>Item name</td>
                                <td>Action</td>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $get_item = $connectdb->prepare("SELECT * FROM menu WHERE company = :company ORDER BY item_name");
                                $get_item->bindvalue("company", $user->exhibitor_id);
                                $get_item->execute();
                                $n = 1;
                                
                                $items = $get_item->fetchAll();

                                foreach($items as $item):
                            ?>
                            <tr>
                                <td style="text-align:center; color:red"><?php echo $n?></td>
                                <td><?php 
                                    $get_cat = $connectdb->prepare("SELECT category FROM categories WHERE category_id = :category_id");
                                    $get_cat->bindvalue("category_id", $item->item_category);
                                    $get_cat->execute();
                                    $cat = $get_cat->fetch();
                                    echo $cat->category;
                                ?></td>
                                <td><?php echo $item->item_name;?></td>
                                <td>
                                    <form method="POST" class="del_item_form">
                                        <input type="hidden" name="company_id" id="company_id" value="<?php echo $user->exhibitor_id?>">        
                                        <input type="hidden" name="itemToDelete" id="itemToDelete" value="<?php echo $row->item_id?>">        
                                        <button type="submit" name="delete_item" id="deleteItemsBtn" title="delete item"><i class="fas fa-trash"></i></a></button>
                                    </form>
                                </td>
                            </tr>
                            <?php $n++; endforeach;?>
                        </tbody>
                    </table>
                    <?php
                        if(!$get_item->rowCount() > 0){
                            echo "<p class='no_result'>'No result found!'</p>";
                        }
                    ?>
                </div>
                <!-- Item lists with price -->
                <div id="itemList" class="displays allResults">
                <h2>Item List</h2>
                    <hr>
                    <div class="search">
                        <input type="search" id="searchItem" placeholder="Enter keyword">
                    </div>
                    <table id="item_table">
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Category</td>
                                <td>Item name</td>
                                <td>Price</td>
                                <td>Status</td>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $get_item = $connectdb->prepare("SELECT * FROM menu WHERE company = :company ORDER BY item_name");
                                $get_item->bindvalue("company", $user->exhibitor_id);
                                $get_item->execute();
                                $n = 1;
                                
                                $items = $get_item->fetchAll();

                                foreach($items as $item):
                            ?>
                            <tr>
                                <td style="text-align:center; color:red"><?php echo $n?></td>
                                <td><?php 
                                    $get_cat = $connectdb->prepare("SELECT category FROM categories WHERE category_id = :category_id");
                                    $get_cat->bindvalue("category_id", $item->item_category);
                                    $get_cat->execute();
                                    $cat = $get_cat->fetch();
                                    echo $cat->category;
                                ?></td>
                                <td><?php echo $item->item_name;?></td>
                                <td><?php echo "₦ ".number_format($item->item_prize, 2, ".")?></td>
                                    
                                <td>
                                    <?php
                                        if($item->item_status == 0){
                                    ?>
                                    Available <a href="javascript:void(0);" onclick="disableItem('<?php echo $item->item_id?>')" title="Disable this item"><i class="fas fa-power-off"></i></a>
                                    <?php 
                                        }else{
                                    ?>
                                    Disabled <a href="javascript:void(0);" onclick="activateItem('<?php echo $item->item_id?>')" title="Activate this item" style="color:green"><i class="fas fa-toggle-on"></i></a>
                                    <?php }?>
                                </td>
                            </tr>
                            <?php $n++; endforeach;?>
                        </tbody>
                    </table>
                    <?php
                        if(!$get_item->rowCount() > 0){
                            echo "<p class='no_result'>'No result found!'</p>";
                        }
                    ?>
                </div>
                <!-- manage orders -->
                <div id="orderList" class="displays allResults">
                    <h2>Manage pending order</h2>
                    <hr>
                    <div class="search">
                        <input type="search" id="searchOrder" placeholder="Enter keyword">
                    </div>
                    <table id="orderTable">
                    
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Customer</td>
                                <td>Phone No.</td>
                                <td>item</td>
                                <td>Qty</td>
                                <td>Amount</td>
                                <td>Address</td>
                                <td>Payment</td>
                                <td>Date</td>
                                <td>Action</td>
                            </tr>
                        </thead>

                        <?php
                            $n = 1;
                            $select_order = $connectdb->prepare("SELECT shoppers.first_name, shoppers.last_name, shoppers.email, shoppers.address, shoppers.city, shoppers.phone_number, orders.order_id, orders.customer_email, orders.item_name, orders.quantity, orders.item_price, orders.company, orders.order_date, orders.order_status, orders.order_time, menu.payment_option FROM shoppers, orders, menu WHERE orders.company = :company AND shoppers.email = orders.customer_email AND orders.item_name = menu.item_name AND orders.order_status != 1 AND orders.order_status != -1 ORDER BY orders.order_time DESC");
                            $select_order->bindvalue('company', $user->exhibitor_id);
                            $select_order->execute();
                    
                            $rows = $select_order->fetchAll();
                            foreach($rows as $row):
                        ?>
                        <tbody>
                            <tr>
                                <td style="color:red; text-align:center;"><?php echo $n?></td>
                                <td><?php echo $row->first_name . " " . $row->last_name?></td>
                                <td><?php echo $row->phone_number?></td>
                                <td><?php echo $row->item_name?></td>
                                <td><?php echo $row->quantity?></td>
                                <td>₦<?php echo number_format($row->item_price)?></td>
                                <td><?php echo $row->address . "<br>" . $row->city;?></td>
                                <td><?php echo $row->payment_option;?></td>
                                <td><?php echo date("jS M, Y", strtotime($row->order_date))?></td>
                                <td>
                                    <?php
                                        if($row->order_status == 2){
                                    ?>
                                    <button style="background:transparent; border:none; margin:0 auto;" title="Confirm Delivery" onclick="confirmDeliveryUser('<?php echo $row->order_id?>')"><i class="fas fa-check" style="color:green; font-size:1rem;" ></i></button>
                                    <?php
                                        }else{
                                    ?>
                                    <button style="background:transparent; border:none; margin:0 auto;" title="Dispense Item" onclick="dispenseItem('<?php echo $row->order_id?>')"><i class="fas fa-truck" style="color:skyblue; font-size:1rem;" ></i></button>
                                    <?php }?>
                                    <button style="background:transparent; border:none; margin:0 auto;" title="Cancel Order" onclick="cancelOrder('<?php echo $row->order_id?>')"><i class="fas fa-plane-slash" style="color:red; font-size:1rem;" ></i></button></td>
                            </tr>
                            
                        </tbody>
                        <?php $n++; endforeach;?>
                        
                    </table>
                    <?php 
                            $check_order = $select_order->rowCount();
                            if(!$check_order){
                            echo "<p style='font-weight:bold; color:chocolate; text-transform:capitalize; font-size:1.3rem; text-align:center; margin-top:10px;'>No record found!</p>";
                        }
                    ?>
                </div>
                <!-- successful deliveries list -->
                <div id="deliveryList" class="management displays">
                    <div class="select_date">
                        <form action="search_date.php" method="POST">
                            <div class="from_to_date">
                                <label>Select From Date</label><br>
                                <input type="date" name="from_date" id="from_date"><br>
                            </div>
                            <div class="from_to_date">
                                <label>Select to Date</label><br>
                                <input type="date" name="to_date" id="to_date"><br>
                            </div>
                            <button type="submit" name="search_date" id="search_date">Search <i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="new_data allResults">
                        <h2>Successful Deliveries for today</h2>
                        <hr>
                    
                        <div class="search">
                            <input type="search" id="searchDeliveries" placeholder="Enter keyword">
                        </div>
                        <table id="deliveriesTable">
                        
                            <thead>
                                <tr>
                                    <td>S/N</td>
                                    <td>Customer</td>
                                    <td>item</td>
                                    <td>Qty</td>
                                    <td>Amount</td>
                                    <td>Address</td>
                                    <td>Date</td>
                                </tr>
                            </thead>

                            <?php
                                $n = 1;
                                $todays_date = date("Y-m-d");
                                $select_deliveries = $connectdb->prepare("SELECT shoppers.first_name, shoppers.last_name, shoppers.email, shoppers.address, shoppers.city, orders.order_id, orders.customer_email, orders.item_name, orders.quantity, orders.item_price, orders.company, orders.order_date, orders.delivery_date FROM shoppers, orders WHERE orders.company = :company AND shoppers.email = orders.customer_email AND orders.order_status = 1 AND orders.delivery_date = CURDATE() ORDER BY orders.delivery_date DESC");
                                $select_deliveries->bindvalue('company', $user->exhibitor_id);
                                $select_deliveries->execute();
                        
                                $rows = $select_deliveries->fetchAll();
                                foreach($rows as $row):
                            ?>
                            <tbody>
                                <tr>
                                    <td style="color:red; text-align:center"><?php echo $n?></td>
                                    <td><?php echo $row->first_name . " " . $row->last_name?></td>
                                    <td><?php echo $row->item_name?></td>
                                    <td><?php echo $row->quantity?></td>
                                    <td>₦ <?php echo $row->item_price?></td>
                                    <td><?php echo $row->address . "<br>" . $row->city;?></td>
                                    <td><?php echo date("jS M, Y", strtotime($row->delivery_date))?></td>
                                    
                                </tr>
                                
                            </tbody>
                            <?php $n++; endforeach;?>
                            
                        </table>
                        
                        
                        <?php 
                            $check_order = $select_deliveries->rowCount();
                            if(!$check_order){
                            echo "<p style='font-weight:bold; color:chocolate; text-transform:capitalize; font-size:1.3rem; text-align:center; margin-top:10px;'>No record found!</p>";
                        }
                        if($select_deliveries){
                                $totalAmount = $connectdb->prepare("SELECT SUM(item_price) AS total_price FROM orders WHERE company = :company AND order_status = 1 AND delivery_date = CURDATE()");
                                $totalAmount->bindvalue('company', $user->exhibitor_id);
                                $totalAmount->execute();

                                $amounts = $totalAmount->fetchAll();
                                foreach($amounts as $amount){
                                    echo "<p style='color:green; font-size:1.3rem; text-align:right; text-decoration:underline; font-weight:bold; margin-top:30px;'>Total = ₦ ". number_format($amount->total_price, 2) . "</p>";
                                }
                            }
                        
                        ?>
                    </div>
                </div>
                <!-- update profile -->
                <div class="displays" id="profile">
                    <div class="info"></div>
                    <div class="add_user_form">
                        <h3>Update profile</h3>
                        <form method="POST"  id="addCatForm" action="../controller/update_exh_profile.php"">
                            <input type="hidden" value="<?php echo $user->exhibitor_id?>" name="user_id">
                            <div class="inputs">
                                <div class="data">
                                    <div class="user_passport">
                                        <img src="<?php echo "../logos/".$user->company_logo;?>" alt="Logo">
                                    </div>
                                    <!-- <input type="file" name="company_logo" id="company_logo"> -->
                                </div>
                                <div class="data">
                                    <label for="contact_person">Store address:</label>
                                    <p style=" color:red; display:block; margin-right:10px"><?php echo "www.clozeth.com/exhibitor_menu.php?company=".$user->reg_number?></p>
                                </div>
                            </div>
                            <div class="inputs">
                                <div class="data">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" name="company_name" value="<?php echo $user->company_name;?>" id="company_name">
                                </div>
                                <div class="data">
                                    <label for="address">Address</label>
                                    <input type="text" name="company_address" value="<?php echo $user->company_address;?>" id="company_address">
                                </div>
                            </div>
                            <div class="inputs">
                                <div class="data">
                                    <label for="company_phone">Company Phone</label>
                                    <input type="tel" name="company_phone" value="<?php echo $user->company_phone;?>" id="company_phone">
                                </div>
                                <div class="data">
                                    <label for="company_email">company_email</label>
                                    <input type="email" name="company_email" value="<?php echo $user->company_email;?>" id="other_number">
                                </div>
                            </div>
                            <div class="inputs">
                                <div class="data">
                                    <label for="contact_person">contact person</label>
                                    <input type="text" name="contact_person" value="<?php echo $user->contact_person;?>" id="contact_person">
                                </div>
                                <div class="data">
                                    <label for="contact_phone">contact phone</label>
                                    <input type="text" name="contact_phone" value="<?php echo $user->contact_phone;?>" id="contact_phone">
                                </div>
                            </div>
                            
                            <div class="inputs">    
                                <div class="data">
                                    <button type="submit" id="update" name="update">Update Profile <i class="fas fa-user"></i></button>
                                </div>
                            </div>
                            
                                
                        </form>
                    </div>
                </div>
                <!-- update password -->
                <div id="update_password" class="displays">
                    <!-- <h3>Update Password</h3>
                    <hr> -->
                    <!-- change password -->
                    <div class="change_password">
                        <div class="info" id="info"></div>
                        <form method="POST">
                            <h3>Change your password</h3>
                            <input type="hidden" name="admin_email" id="admin_email" value="<?php echo $username?>">
                            <label for="currPwd">Current password</label><br>
                            <input type="password" name="current_password" id="current_password" required><br>
                            <label for="newPwd">New Password</label><br>
                            <input type="password" name="new_password" id="new_password" required><br>
                            <label for="rePwd">Retype Password</label><br>
                            <input type="password" name="retype_password" id="retype_password" required><br>
                            <button type="submit" name="change_passwords" id="change_passwords">Update</button>
                        </form>
                    </div>
                </div>
            </section>

        </div>
        
        
    </main>
    <?php
        if($user->payment_status == 2){
            $get_plan = $connectdb->prepare("SELECT plan FROM plan_package WHERE package_id = :package_id");
            $get_plan->bindvalue("package_id", $user->plan_package);
            $get_plan->execute();
            $plans = $get_plan->fetch();
            if($plans->plan == 10){
                
        
    ?>
    <div id="chat">
        <div class="chat_icon" title="Live chat">
            <p class="live_box"> <i class="fas fa-comments"></i></p> 
        </div>
        <div class="chat_close" title="Close chat">
            <p class="live_box" id="close_box">Close Live Chat <i class="fas fa-comment-slash"></i></p> 
        </div>
            <div class="chat_message">
                <h2>Live Chat <i class="far fa-comment"></i></h2>
                <div class="all_chat">
                    <div id="chat1">
                        <div class="main_chats">
                            <div class="sender">
                                <i class="fas fa-user-tie"></i>
                                <p>Agent</p>
                            </div>
                            <p class="chats">Hi. This is customer service<br> Welcome to Clozeth. Your online stop shop for all things fashion and home interiors. How may we be of service today?</p>
                            
                        </div>
                    </div>
                    
                    <div id="chat2">
                        <?php
                            $get_chats = $connectdb->prepare("SELECT * FROM chats WHERE sender = :sender OR recipient = :recipient ORDER BY chat_time");
                            $get_chats->bindvalue("sender", $user->exhibitor_id);
                            $get_chats->bindvalue("recipient", $user->exhibitor_id);
                            $get_chats->execute();
                            $chats = $get_chats->fetchAll();
                            foreach($chats as $chat):
                        ?>
                        <div class="main_chats">
                            <div class="sender">
                                <i class="fas fa-user-tie"></i>
                                
                                <p>
                                    <?php
                                        $get_sender = $connectdb->prepare("SELECT * FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
                                        $get_sender->bindvalue("exhibitor_id", $chat->sender);
                                        $get_sender->execute();
                                        $senders = $get_sender->fetchAll();
                                        foreach($senders as $sender){
                                            echo $sender->company_name;
                                        }
                                        if(!$get_sender->rowCount() > 0){
                                            echo "Agent";
                                        }
                                    ?>
                                    
                                </p>
                            </div>
                            <p class="chats"><?php echo $chat->messages?><br><span style="color:rgb(238, 238, 238); font-size:.rem; float:right"><?php echo date("M jS, h:i", strtotime($chat->chat_time))?></span></p>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
                
                 <form action="" method="POST" id="chat_box">
                    <input type="text" name="messages" id="messages" placeholder="Type your message here">
                    <input type="hidden" name="recipient" id="recipient"value="admin">
                    <input type="hidden" name="sender" id="sender" value="<?php echo $user->exhibitor_id?>">
                    <button type="submit" id="submit_chat" name="submit_chat" title="Send"><i class="fas fa-paper-plane"></i></button>
                 </form>   
                    
            </div>
        </div>
        <?php
                }else{
                    echo "";
                }
            }else{
                echo "";
            }
        ?>
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