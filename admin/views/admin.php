<?php
    session_start();
    require "../controller/connections.php";
    if(isset($_SESSION['user'])){
        $username = $_SESSION['user'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Clozeth is an online platform made for the purpose of ordering fashion wears, men and women clothing, bed sheets, jewellries, etc from all kinds of retailers and wholesalers in Nigeria and Abroad from whereever you are through your mobile phone, tablet or pc">
    <meta name="keywords" content="Fashion, fashion store, clothings, men, women, men wears, women wears, jewellry, jewellries, rings, earings, wrist watch, eye glass, glass, shoes, order, ordering">
    <title>Clozeth | Admin</title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="../images/logo.png" size="32X32">
    <link rel="stylesheet" href="../style.css">
    
</head>
<body>
    <!-- <div class="loader">
        <img src="images/psn_logo.jpg" alt="PSN">
        <h2>Welcome to PSN national Conference registration</h2>
    </div> -->
    <main>
    <!-- <section class="top_head" id="topHeader">
            <div class="social_media">
                <p>
                    <span>Call us </span>(+234) 123 456 78
                </p>
                <p>
                    info@acpn.com
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
        </section> -->
        <header>
            <h1 class="logo">
                <a href="admin.php" title="ACPN">
                    <img src="../images/logo.png" alt="Logo" class="img-fluid">
                </a>
            </h1>
            <div class="search">
                <form class="form-inline" method="POST">
                    <input type="search" name="search_items" placeholder="search members, reg_number, search phone number" id="search_items">
                    <button type="submit" name="searchBtn" id="searchBtn" class="main_searchbtn">Search <i class="fas fa-search"></i></button>
                    <button type="submit" name="searchBtn" id="searchBtn" class="mobilesearchbtn" ><i class="fas fa-search"></i></button>
                </form>
                
            </div>
            <div class="other_menu">
                <a href="#" title="Our Gallery">Admin</a>
            </div>
            <div class="login">
                <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
                <div class="login_option">
                    <div>
                        <button id="loginBtn"><a href="../controller/logout.php">Log out <i class="fas fa-power-off"></i></a></button>
                        <!-- <h3>OR</h3>
                        <a href="registration.php" id="signupBtn">Member Registration</a> -->
                    </div>
                </div>
            </div>
            <div class="cart">
                <a href="javascript:void(0);" title="Registered members" data-page="exhibitors" class="page_navs"><i class="fas fa-users"></i> <span id="reg_text">Registered </span>
                    <span id="cart_value"><?php
                    $get_members = $connectdb->prepare("SELECT * FROM exhibitors WHERE company_email != 'Admin@clozeth.com'");
                    $get_members->execute();
                    echo $get_members->rowCount();
                    ?> </span></a>
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
                            <button id="loginBtn"><a href="../controller/logout.php">Log out</a></button>
                            <!-- <h3>OR</h3>
                            <a href="registration.php" id="signupBtn">Member Registration</a> -->
                        </div>
                    </div>
                </div>
                <nav>
                    <h3><a href="admin.php" title="Home"><i class="fas fa-home"></i> Dashboard</a></h3>
                    <ul>        
                        <li><a href="javascript:void(0);" id="addCat" title="Upload payment" class="page_navs" data-page="addCategories"><i class="fas fa-money-check"></i> Add categories</a></li>
                        <li><a href="javascript:void(0);" id="addStore" class="page_navs" data-page="addRestaurant"><i class="fas fa-user-tie"></i> Approved members</a></li>
                        <li><a href="attendance.php" target="_blank" title="Check attendance"><i class="fas fa-users"></i> Check attendance</a></li>
                        <li><a href="javascript:void(0)" title="Conference attendance list" class="page_navs" data-page="attendance_list"><i class="fas fa-user-graduate"></i> Attendance List</a></li>
                        <li><a href="javascript:void(0);" class="addMenu" title="manage accomodations"><i class="fas fa-hotel"></i> Accomodation</a>
                            <ul class="nav1Menu">
                                <li><a href="javascript:void(0);" id="addMenu" title="View accomodation requests" class="page_navs" data-page="hotel_request"><i class="fas fa-paper-plane"></i> Accomodation requests</a></li>
                                <li><a href="javascript:void(0);" id="addMenu" title="Approve bulk requests" class="page_navs" data-page="bulk_request"><i class="fas fa-users"></i> Confirm Bulk requests</a></li>
                                <li><a href="javascript:void(0);" id="addHot" title="Add hotels" class="page_navs" data-page="add_hotel"><i class="fas fa-hotel"></i> Add Hotels</a></li>
                                <li><a href="javascript:void(0);" id="addrm" title="Add rooms to hotel" class="page_navs" data-page="add_rooms"><i class="fas fa-hotel"></i> Add Rooms & prices</a></li>
                                <li><a href="javascript:void(0);" id="acomls" title="Add rooms to hotel" class="page_navs" data-page="accom_list"><i class="fas fa-book"></i> Accomodation list</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="addExh" title="manage accomodations"><i class="fas fa-cart-arrow-down"></i> Exhibition</a>
                            <ul class="nav2Menu">
                                <li><a href="javascript:void(0);" id="addexhi" title="View Exhibitors" class="page_navs" data-page="exhibitors"><i class="fas fa-users"></i> Exhibitors list</a></li>
                                <li><a href="javascript:void(0);" id="confBooth" title="View Exhibitors" class="page_navs" data-page="booth_payments"><i class="fas fa-coins"></i> Confirm payment</a></li>
                                <li><a href="javascript:void(0);" id="addexhi" title="Add halls/ categories" class="page_navs" data-page="booth_categories"><i class="fas fa-store"></i> Add Plans</a></li>
                                <li><a href="javascript:void(0);" id="addexhi" title="Add booths" class="page_navs" data-page="add_booths"><i class="fas fa-store"></i> Add plan package</a></li>
                                <li><a href="javascript:void(0);" id="addexhi" title="Booth list" class="page_navs" data-page="booths"><i class="fas fa-store"></i> Plans & packages List</a></li>
                                <li><a href="javascript:void(0);" id="addexhi" title="Add Exhibition items" class="page_navs" data-page="add_items"> <i class="fas fa-shopping-cart"></i> Add items</a></li>
                                <li><a href="javascript:void(0);" id="addFeat" title="Add Exhibition items" class="page_navs" data-page="featured_items"> <i class="fas fa-star"></i> Featured items</a></li>
                                <li><a href="javascript:void(0);" id="addexhi" title="Exhibition items" class="page_navs" data-page="itemList"><i class="fas fa-cart-arrow-down"></i> Item List</a></li>
                                <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="orderList"><i class="fas fa-shopping-cart"></i> Manage Orders</a></li>
                                <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="deliveryList"><i class="fas fa-coins"></i> Delivery Reports</a></li>
                            </ul>
                        </li>
                        
                        <li><a href="javascript:void(0);" id="upLoadMem" class="page_navs" data-page="uploadMembers"><i class="fas fa-users"></i> Upload paid members</a></li>
                    </ul>
                </nav>
            </aside>
            <aside class="mobile_menu" id="mobile_log">
                <div class="login">
                    <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
                    <div class="login_option">
                        <div>
                            <button id="loginBtn"><a href="../controller/logout.php">Log out</a></button>
                            <!-- <h3>OR</h3>
                            <a href="registration.php" id="signupBtn">Member Registration</a> -->
                        </div>
                    </div>
                </div>
                <nav>
                    <h3><a href="admin.php" title="Home"><i class="fas fa-home"></i> Dashboard</a></h3>
                    <ul>        
                        <li><a href="javascript:void(0);" id="addCat" title="Upload payment" class="page_navs" data-page="addCategories"><i class="fas fa-money-check"></i> Add Categories</a></li>
                        <li><a href="javascript:void(0);" id="addStore" class="page_navs" data-page="addRestaurant"><i class="fas fa-user-tie"></i> Approved members</a></li>
                        <li><a href="attendance.php" target="_blank" title="Check attendance"><i class="fas fa-users"></i> Check attendance</a></li>
                        <li><a href="javascript:void(0)" title="Conference attendance list" class="page_navs" data-page="attendance_list"><i class="fas fa-user-graduate"></i> Attendance List</a></li>
                        <li><a href="javascript:void(0);" class="addMenu" title="manage accomodations"><i class="fas fa-hotel"></i> Accomodation</a>
                            <ul class="nav1Menu">
                                <li><a href="javascript:void(0);" id="addMenu" title="View accomodation requests" class="page_navs" data-page="hotel_request"><i class="fas fa-paper-plane"></i> Accomodation requests</a></li>
                                <li><a href="javascript:void(0);" id="addHot" title="Add hotels" class="page_navs" data-page="add_hotel"><i class="fas fa-hotel"></i> Add Hotels</a></li>
                                <li><a href="javascript:void(0);" id="addrm" title="Add rooms to hotel" class="page_navs" data-page="add_rooms"><i class="fas fa-hotel"></i> Add Rooms & prices</a></li>
                                <li><a href="javascript:void(0);" id="acomls" title="Add rooms to hotel" class="page_navs" data-page="accom_list"><i class="fas fa-book"></i> Accomodation list</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" class="addExh" title="manage accomodations"><i class="fas fa-cart-arrow-down"></i> Exhibition</a>
                            <ul class="nav2Menu">
                                <li><a href="javascript:void(0);" id="addexhi" title="View Exhibitors" class="page_navs" data-page="exhibitors"><i class="fas fa-users"></i> Exhibitors list</a></li>
                                <li><a href="javascript:void(0);" id="confBooth" title="View Exhibitors" class="page_navs" data-page="booth_payments"><i class="fas fa-coins"></i> Confirm payment</a></li>
                                <li><a href="javascript:void(0);" id="addexhi" title="Add halls/ categories" class="page_navs" data-page="booth_categories"><i class="fas fa-store"></i> Plans</a></li>
                                <li><a href="javascript:void(0);" id="addexhi" title="Add booths" class="page_navs" data-page="add_booths"><i class="fas fa-store"></i> Add plan package</a></li>
                                <li><a href="javascript:void(0);" id="addexhi" title="Booth list" class="page_navs" data-page="booths"><i class="fas fa-store"></i> Plans & package List</a></li>
                                <li><a href="javascript:void(0);" id="addexhi" title="Add Exhibition items" class="page_navs" data-page="add_items"> <i class="fas fa-shopping-cart"></i> Add items</a></li>
                                <li><a href="javascript:void(0);" id="addFeat" title="Add Exhibition items" class="page_navs" data-page="featured_items"> <i class="fas fa-star"></i> Featured items</a></li>
                                <li><a href="javascript:void(0);" id="addexhi" title="Exhibition items" class="page_navs" data-page="itemList"><i class="fas fa-cart-arrow-down"></i> Item List</a></li>
                                <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="orderList"><i class="fas fa-shopping-cart"></i> Manage Orders</a></li>
                                <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="deliveryList"><i class="fas fa-coins"></i> Delivery Reports</a></li>
                            </ul>
                        </li>
                        
                        <li><a href="javascript:void(0);" id="upLoadMem" class="page_navs" data-page="uploadMembers"><i class="fas fa-users"></i> Upload paid members</a></li>
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
                <div id="dashboard">
                    
                    
                    <div class="cards" id="card4">
                        <a class="page_navs" data-page="booth_payments" href="javascript:void(0)">
                            <p>Store/Package Request</p>
                            <div class="infos">
                                <i class="fas fa-store"></i>
                                <p>
                                    <?php
                                        $get_booth = $connectdb->prepare("SELECT * FROM exhibitors WHERE payment_status = 1");
                                        
                                        $get_booth->execute();
                                        
                                        echo $get_booth->rowCount()

                                        
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="cards" id="card0">
                        <a href="javascript:void(0)" class="page_navs" data-page="orderList">
                            <p>Pending Orders</p>
                            <div class="infos">
                                <i class="fas fa-cart-arrow-down"></i>
                                <p>
                                <?php
                                    $orders = $connectdb->prepare("SELECT * FROM orders WHERE order_status = 0");
                                    
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
                                        
                                        $sales = $connectdb->prepare("SELECT SUM(item_price) AS today_sales  FROM orders WHERE order_status = 1 AND delivery_date = CURDATE()");
                                        
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
                
                <!-- search results -->
                <!-- <div class="allResults">
                    
                </div> -->
                <!-- all members -->
                
                <!-- Add Item categories -->
                <div id="addCategories" class="displays" style="width:50%!important;">
                <div class="info"></div>
                <div class="add_user_form">
                    <h3>Add Item Categories</h3>
                    <form method="POST"  id="addCatForm">
                        <div class="inputs">
                            <div class="data">
                                <input type="text" name="category" id="category" placeholder="Enter item category" required>
                            </div>
                            <button type="submit" id="add_categories" name="add_categories">Add Category <i class="fas fa-sink"></i></button>
                        </div>
                    </form>
                </div>
            </div>
                
                <!-- view exhibitors -->
                <div class="allResults displays" id="exhibitors">
                    <h2>Registered Exhibitors</h2>
                    <hr>
                    <div class="options">
                        <div class="search">
                            <input type="search" id="searchExh" placeholder="Enter keyword">
                        </div>
                        <button class="downloadTags" onclick="window.print()">Download tags <i class="fas fa-download"></i></button>
                        <button id="download_companies" class="downloadBtn">Export to Excel <i class="fas fa-file-excel"></i></button>
                    </div>
                    
                    <table id="exh_table">
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Company</td>
                                <td>Contact Person</td>
                                <td>Contact Number</td>
                                <td>Password</td>
                                <td>Package</td>
                                <td>Expiration</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $get_all = $connectdb->prepare("SELECT * FROM exhibitors WHERE company_name != 'admin' ORDER BY reg_date");
                                $get_all->execute();
                                $n = 1;
                                
                                $alls = $get_all->fetchAll();

                                foreach($alls as $all):
                            ?>
                            <tr>
                                    <td><button><a href="javascript:void(0)" onclick="viewCompany('<?php echo $all->exhibitor_id;?>')" title="View Exhibitor"><?php echo $n?></a></button></td>
                                    <td><?php echo $all->company_name?></td>
                                    <td><?php echo $all->contact_person;?></td>
                                    <td><?php echo $all->contact_phone;?></td>
                                    <td><?php echo $all->company_password;?></td>
                                    <td>
                                    
                                        <?php 
                                            if($all->payment_status == 2){
                                                $get_booth = $connectdb->prepare("SELECT plan, package FROM  plan_package WHERE package_id = :package_id");
                                                $get_booth->bindvalue("package_id", $all->plan_package);
                                                $get_booth->execute();
                                                $booths = $get_booth->fetchAll();
                                                foreach($booths as $booth){
                                                    echo $booth->plan."(".$booth->package. ") <i style='color:green' class='fas fa-check'></i>";
                                                }
                                                
                                            
                                            }elseif($all->payment_status == 1){
                                                $get_booth = $connectdb->prepare("SELECT  plan, package FROM  plan_package WHERE package_id = :package_id");
                                                $get_booth->bindvalue("package_id", $all->plan_package);
                                                $get_booth->execute();
                                                $booths = $get_booth->fetchAll();
                                                foreach($booths as $booth){
                                                    echo $booth->plan."(".$booth->package. ") <i style='color:red' class='fas fa-spinner'></i>";
                                                }
                                                
                                            }elseif($all->payment_status == -1){
                                                echo "Declined";
                                            }else{
                                                echo "No request";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if($all->payment_status == 2){
                                                    echo date("jS M, Y", strtotime($all->expiration));
                                                
                                            }elseif($all->payment_status == 1){
                                                echo "Package processing";
                                                
                                            }else{
                                                echo "No package";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if($all->payment_status == 2){
                                        ?>
                                        <a href="javascript:void(0)" onclick="disableUser('<?php echo $all->exhibitor_id?>')" title="Disable user" style="color:red"><i class="fas fa-power-off"></i> Disable user</a>
                                        <?php
                                            }else{
                                        ?>
                                        <a href="javascript:void(0)" onclick="activateUser('<?php echo $all->exhibitor_id?>')" title="Activate user" style="color:green"><i class="fas fa-toggle-on"></i> Activate user</a>
                                        <?php }?>
                                    </td>
                                
                            </tr>
                            <?php $n++; endforeach;?>
                            
                        </tbody>
                    </table>
                    <?php
                        if(!$get_all->rowCount() > 0){
                            echo "<p class='no_result'>'No result found!'</p>";
                        }
                    ?>
                    
                </div>
                <!-- add shop owner plans -->
                <div id="booth_categories" class="displays">
                    <div class="info"></div>
                    <div class="add_user_form">
                        <h3>Add plans</h3>
                        <form method="POST"  id="addCatForm" action="../controller/add_plan.php">
                            
                            <div class="inputs">
                                <div class="data">
                                    <label for="plans">Enter plan name</label>
                                    <input type="text" name="plan" id="plan" required>
                                </div>
                                
                            </div>
                            <button type="submit" id="addPlan" name="addPlan">Add plan <i class="fas fa-hotel"></i></button>
                        </form>
                    </div>
                </div>
                <!-- add plan packages -->
                <div id="add_booths" class="displays">
                    <div class="info"></div>
                    <div class="add_user_form">
                        <h3>Add packages for plans</h3>
                        <form method="POST"  id="addCatForm">
                            
                            <div class="inputs">
                                <div class="data">
                                    <label for="package_plan">Select plan</label>
                                    <select name="package_plan" id="package_plan">
                                        <option value=""selected>Select Plan</option>
                                        <?php
                                            $get_hall = $connectdb->prepare("SELECT * FROM plans ORDER BY plan DESC");
                                            $get_hall->execute();
                                            $halls = $get_hall->fetchAll();
                                            foreach($halls as $hall):
                                        ?>
                                        <option value="<?php echo $hall->plan_id;?>"><?php echo $hall->plan;?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="data">
                                    <label for="package">Enter package</label>
                                    <input type="text" name="package" id="package" required>
                                </div>
                            </div>
                            <div class="inputs">
                                <div class="data">
                                    <label for="booth_price">Enter package price</label>
                                    <input type="number" name="package_price" id="package_price" required>
                                </div>
                                <div class="data">
                                    <label for="booth_price">Package duration (days)</label>
                                    <input type="number" name="package_duration" id="package_duration" required>
                                </div>
                            </div>    
                            <div class="inputs">
                                <div class="data" style="width:100%">
                                    <label for="features">Enter package features</label>
                                    <textarea width="100" name="features" id="features" required placeholder="Enter features of the package"></textarea>
                                </div>
                            </div>    
                                <div class="data">
                                    <button type="submit" id="addPackage" name="addPackage">Add package <i class="fas fa-hotel"></i></button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
                <!-- booth list -->
                <div class="allResults displays" id="booths">
                    <h2>Booths list</h2>
                    <hr>
                    <div class="options">
                        <div class="search">
                            <input type="search" id="searchBoothList" placeholder="Enter keyword">
                        </div>
                        <button id="download_boothList" class="downloadBtn">Export to Excel <i class="fas fa-file-excel"></i></button>
                    </div>
                    
                    <table id="boothList_table">
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Plan</td>
                                <td>Package</td>
                                <td>Price</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $get_all = $connectdb->prepare("SELECT * FROM plan_package ORDER BY plan");
                                $get_all->execute();
                                $n = 1;
                                
                                $alls = $get_all->fetchAll();

                                foreach($alls as $all):
                            ?>
                            <tr>
                                <td style="text-align:center"><?php echo $n?></td>
                                <td><?php echo $all->plan?></td>
                                <td><?php echo $all->package?></td>
                                <td><?php echo "₦ ".number_format($all->package_price, 2, ".");?></td>
                                <td>
                                    <?php
                                        if($all->booth_status == 1){
                                            echo "<span style='color:red'>Taken</span>";
                                        }else{
                                            echo "Available";
                                        }
                                    ?>
                                </td>
                                    
                            </tr>
                            <?php $n++; endforeach;?>
                            
                        </tbody>
                    </table>
                    <?php
                        if(!$get_all->rowCount() > 0){
                            echo "<p class='no_result'>'No result found!'</p>";
                        }
                    ?>
                </div>
                <!-- add exhibition items -->
                <div id="add_items" class="displays">
                    <div class="info"></div>
                    <div class="add_user_form">
                        <h3>Add items for exhibition</h3>
                        <form method="POST"  id="addCatForm" action="../controller/add_items.php">
                            
                            <div class="inputs">
                                <div class="data">
                                    <label for="company">Company</label>
                                    <select name="company" id="company">
                                        <option value=""Selected>Select Company</option>
                                        <?php
                                            $get_comp = $connectdb->prepare("SELECT * FROM exhibitors WHERE payment_status = 2");
                                            $get_comp->execute();
                                            $comps = $get_comp->fetchAll();
                                            foreach($comps as $comp):
                                        ?>
                                        <option value="<?php echo $comp->exhibitor_id;?>"><?php echo $comp->company_name;?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
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
                                
                                <div class="inputs">
                                    <div class="data">
                                        <label for="items">Enter Item name</label>
                                        <input type="text" name="item_name" id="item_name" required>
                                    </div>
                                    <div class="data">
                                        <label for="item_prize">Item Price (NGN)</label>
                                        <input type="number" name="item_prize" id="item_prize" required>
                                    </div>
                                    
                                </div>
                                <div class="data">
                                    <button type="submit" id="addItem" name="addItem">Add item <i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
                <!-- featured items -->
                <div class="displays" id="featured_items">
                    <div class="info"></div>
                    <div class="add_user_form" id="addFeatured">
                        <h3 style="color:#fff;">Add featured items</h3>
                        <form method="POST"  id="deleteItemForm">
                            <div class="inputs">
                                <div class="data">
                                    <label for="restaurant">Company</label><br>
                                    <select name="featuredRestaurant" id="featuredRestaurant" required>
                                        <option value="" selected>Select Company</option>
                                        <?php
                                            $select_restaurant = $connectdb->prepare("SELECT * FROM exhibitors ORDER BY company_name DESC");
                                            $select_restaurant->execute();
                                            $rows = $select_restaurant->fetchAll();
                                            foreach($rows as $row):
                                        ?>
                                        <option value="<?php echo $row->exhibitor_id;?>"><?php echo $row->company_name;?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="data">
                                    <label for="itemName">Select Item</label><br>
                                    <select name="featuredItem" id="featuredItem" required>
                                        <option value="" selected>Select item</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" id="add_feat" name="add_feat">Add item <i class="fas fa-plus"></i></button>
                        </form>
                    </div>
                    <h4>Featured Item List</h4>
                    <hr>
                    <!-- <div class="search">
                        <input type="search" id="searchUsers" placeholder="Enter keyword">
                    </div> -->
                    <div class="newTable allResults">
                        <table id="featuredTable">
                        
                            <thead>
                                <tr>
                                    <td>S/N</td>
                                    <td>Company</td>
                                    <td>Item name</td>
                                    <td>Item price</td>
                                    <td>Action</td>
                                </tr>
                            </thead>

                            <?php
                                $n = 1;
                                $select_user = $connectdb->prepare("SELECT * FROM menu WHERE featured_item = 1 ORDER BY company");

                                $select_user->execute();
                                
                                $rows = $select_user->fetchAll();
                                foreach($rows as $row):
                            ?>
                            <tbody>
                                <tr>
                                    <td style="text-align:center;"><?php echo $n?></td>
                                    <td><?php 
                                        $get_companys = $connectdb->prepare("SELECT company_name FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
                                        $get_companys->bindvalue("exhibitor_id", $row->company);
                                        $get_companys->execute();
                                        $companyss = $get_companys->fetch();
                                    echo $companyss->company_name?></td>
                                    <td><?php echo $row->item_name?></td>
                                    <td>₦ <?php echo number_format($row->item_prize)?></td>
                                    <td><button style="background:transparent; border:none; width:80%; margin:0 auto;" title="remove from featured" onclick="removeFeatured('<?php echo $row->item_id?>')"><i class="fas fa-trash" style="color:red; font-size:1.3rem; text-align:center;" ></i></button></td>
                                </tr>
                                
                            </tbody>
                            <?php $n++; endforeach;?>
                            
                        </table>
                    </div>
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
                                <td>Company</td>
                                <td>Item_name</td>
                                <td>Category</td>
                                <td>Price</td>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $get_item = $connectdb->prepare("SELECT * FROM menu ORDER BY company");
                                $get_item->execute();
                                $n = 1;
                                
                                $items = $get_item->fetchAll();

                                foreach($items as $item):
                            ?>
                            <tr>
                                <td style="text-align:center; color:red"><?php echo $n?></td>
                                <td><?php 
                                    $get_comp = $connectdb->prepare("SELECT company_name FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
                                    $get_comp->bindvalue("exhibitor_id", $item->company);
                                    $get_comp->execute();
                                    $comp = $get_comp->fetch();
                                    echo $comp->company_name;
                                ?></td>
                                <td><?php echo $item->item_name;?></td>
                                <td><?php 
                                    $get_cat = $connectdb->prepare("SELECT category FROM categories WHERE category_id = :category_id");
                                    $get_cat->bindvalue("category_id", $item->item_category);
                                    $get_cat->execute();
                                    $cat = $get_cat->fetch();
                                    echo $cat->category;
                                ?></td>
                                <td><?php echo "₦ ".number_format($item->item_prize, 2, ".")?></td>
                                    
                                
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
                <!-- confirm plan/package payment -->
                <div id="booth_payments" class="allResults displays">
                    <h2>Confirm payments for store</h2>
                    <hr>
                    <div class="search">
                        <input type="search" id="searchBooths" placeholder="Enter keyword">
                    </div>
                    <table id="booth_table">
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Company</td>
                                <td>Phone Number</td>
                                <td>Package</td>
                                <td>Package price</td>
                                <td>Payment Evidence</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $get_pay = $connectdb->prepare("SELECT exhibitors.company_name, exhibitors.company_phone, exhibitors.exhibitor_id, store_payments.package, store_payments.payment_slip, store_payments.payment_id, store_payments.exhibitor FROM exhibitors, store_payments WHERE exhibitors.exhibitor_id = store_payments.exhibitor AND store_payments.payment_status = 0 ORDER BY store_payments.payment_date");
                                $get_pay->execute();
                                $n = 1;
                                
                                $alls = $get_pay->fetchAll();

                                foreach($alls as $all):
                            ?>
                            <tr>
                                    <td><button><a href="javascript:void(0)"  title="Approve Company"><?php echo $n?></a></button></td>
                                    <td><?php echo $all->company_name;?></td>
                                    <td><?php echo $all->company_phone;?></td>
                                    <td><?php 
                                        $get_booth = $connectdb->prepare("SELECT * FROM plan_package WHERE package_id = :package_id");
                                        $get_booth->bindvalue("package_id", $all->package);
                                        $get_booth->execute();
                                        $boothss = $get_booth->fetchAll();
                                        foreach($boothss as $booths){
                                            
                                            echo $booths->plan." (".$booths->package.")";
                                            
                                            

                                        }
                                    ?></td>
                                    <td><?php 
                                        $get_booth = $connectdb->prepare("SELECT package_price FROM plan_package WHERE package_id = :package_id");
                                        $get_booth->bindvalue("package_id", $all->package);
                                        $get_booth->execute();
                                        $price = $get_booth->fetch();
                                        echo "₦ ".number_format($price->package_price, 2, ".");
                                    ?></td>
                                    <td id="rpt_img"><a href="<?php echo "../exh_receipts/".$all->payment_slip;?>" target="_blank" title="Payment evidence">View slip</a></td>
                                    <td>
                                        <button title="Approve Approve booth payment" onclick="approveExhibitor('<?php echo $all->payment_id;?>')"class="action accept"><i class="fas fa-check"></i></button>
                                        <button title="Decline request"onclick="declineExhibitor('<?php echo $all->payment_id?>')"class="action decline"><i class="fas fa-ban"></i></button>
                                    </td>
                                
                            </tr>
                            <?php $n++; endforeach;?>
                        </tbody>
                    </table>
                    <?php
                        if(!$get_pay->rowCount() > 0){
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
                                <td>item</td>
                                <td>Qty</td>
                                <td>Amount</td>
                                <td>Customer Address</td>
                                <td>Company</td>
                                <td>Company Contacts</td>
                                <td>Date</td>
                                
                            </tr>
                        </thead>

                        <?php
                            $n = 1;
                            $select_order = $connectdb->prepare("SELECT shoppers.first_name, shoppers.last_name, shoppers.email, shoppers.address, shoppers.city, orders.order_id, orders.customer_email, orders.item_name, orders.quantity, orders.item_price, orders.company, orders.order_date, orders.order_time FROM shoppers, orders WHERE shoppers.email = orders.customer_email AND orders.order_status = 0 ORDER BY orders.order_time");
                            $select_order->execute();
                    
                            $rows = $select_order->fetchAll();
                            foreach($rows as $row):
                        ?>
                        <tbody>
                            <tr>
                                <td style="color:red; text-align:center;"><?php echo $n?></td>
                                <td><?php echo $row->first_name . " " . $row->last_name?></td>
                                <td><?php echo $row->item_name?></td>
                                <td><?php echo $row->quantity?></td>
                                <td>₦ <?php echo $row->item_price?></td>
                                <td><?php echo $row->address?></td>
                                <td><?php 
                                    $get_company = $connectdb->prepare("SELECT company_name FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
                                    $get_company->bindvalue("exhibitor_id", $row->company);
                                    $get_company->execute();
                                    $company = $get_company->fetch();
                                    echo $company->company_name;
                                ?></td>
                                <td>
                                    <?php
                                    $get_company = $connectdb->prepare("SELECT * FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
                                    $get_company->bindvalue("exhibitor_id", $row->company);
                                    $get_company->execute();
                                    $company = $get_company->fetchAll();
                                    foreach($company as $company){
                                        echo $company->manager_contact.", ".$company_phone;
                                    }
                                    
                                    ?>
                                </td>
                                <td><?php echo $row->order_date?></td>
                                
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
                <div id="deliveryList" class="management">
                    <div class="select_date">
                        <form action="search_date_admin.php" method="POST">
                            <div class="from_to_date">
                                <label>Select From Date</label><br>
                                <input type="date" name="from_date_admin" id="from_date_admin"><br>
                            </div>
                            <div class="from_to_date">
                                <label>Select to Date</label><br>
                                <input type="date" name="to_date_admin" id="to_date_admin"><br>
                            </div>
                            <button type="submit" name="search_date_admin" id="search_date_admin">Search</button>
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
                                    <td>Company</td>
                                    <td>Amount</td>
                                    <td>Address</td>
                                    <td>Date</td>
                                </tr>
                            </thead>

                            <?php
                                $n = 1;
                                $todays_date = date("Y-m-d");
                                $select_deliveries = $connectdb->prepare("SELECT shoppers.first_name, shoppers.last_name, shoppers.email, shoppers.address, shoppers.city, orders.order_id, orders.customer_email, orders.item_name, orders.quantity, orders.item_price, orders.company, orders.order_date, orders.delivery_date FROM shoppers, orders WHERE shoppers.email = orders.customer_email AND orders.order_status = 1 AND orders.delivery_date = CURDATE() ORDER BY orders.delivery_date DESC");
                                
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
                                    <td><?php 
                                        $get_company = $connectdb->prepare("SELECT company_name FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
                                        $get_company->bindvalue("exhibitor_id", $row->company);
                                        $get_company->execute();
                                        $company = $get_company->fetch();
                                        echo $company->company_name;
                                    ?></td>
                                    <td>₦ <?php echo $row->item_price?></td>
                                    <td><?php echo $row->address . "<br>" . $row->city;?></td>
                                    <td><?php echo $row->delivery_date?></td>
                                    
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
                                $totalAmount = $connectdb->prepare("SELECT SUM(item_price) AS total_price FROM orders WHERE order_status = 1 AND delivery_date = CURDATE()");
                                
                                $totalAmount->execute();

                                $amounts = $totalAmount->fetchAll();
                                foreach($amounts as $amount){
                                    echo "<p style='color:green; font-size:1.3rem; text-align:right; text-decoration:underline; font-weight:bold; margin-top:30px;'>Total = ₦ ". number_format($amount->total_price, 2) . "</p>";
                                }
                            }
                        
                        ?>
                    </div>
                </div>
                
            </section>
        </div>
        
            
        
        
            
        
    </main>
    <script src="../jquery.js"></script>
    <script src="../jquery.table2excel.js"></script>
    <script src="../script.js"></script>
</body>
</html>

<?php 
    }else{
        header("Location: ../index.php");
    }
?>