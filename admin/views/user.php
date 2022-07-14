<?php
    session_start();
    require "../controller/connections.php";
    if(isset($_SESSION['user'])){
        $username = $_SESSION['user'];
    
    $user_details = $connectdb->prepare("SELECT * FROM users WHERE pcn_number = :pcn_number");
    $user_details->bindvalue("pcn_number", $username);
    $user_details->execute();

    $users = $user_details->fetchAll();
    foreach($users as $user):
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PSN is the National regulatory body for all pharmacist in Nigeria. it is formally known as Pharmacist society of NIgeria">
    <meta name="keywords" content="PSN, psn, Pharmacist, pharmacist association, pharmacist society, Nigeria">
    <title>ACPN CONFERENCE| <?php echo $user->first_name . " " . $user->last_name;?></title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="../images/acpn_logo.png" size="32X32">
    <link rel="stylesheet" href="../style.css">
    
</head>
<body>
    <!-- <div class="loader">
        <img src="images/psn_logo.jpg" alt="PSN">
        <h2>Welcome to PSN national Conference registration</h2>
    </div> -->
    <main>
    
        <header>
            <h1 class="logo">
                <a href="user.php" title="ACPN">
                    <img src="../images/acpn_logo.png" alt="PSN Logo" class="img-fluid">
                </a>
            </h1>
            <h2 id="desktop_h2">Association of Community pharmacists of Nigeria</h2>
            <h2 id="mobile_h2">ACPN</h2>
            <!-- <div class="other_menu">
                <a href="#" title="Our Gallery">Gallery</a>
            </div> -->
            <div class="login">
                <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
                <div class="login_option">
                    <div>
                        <button id="loginBtn"><a href="../controller/logout.php">Log out</a></button>
                    </div>    
                </div>
            </div>
            <div class="cart" id="user_data">
                <a href="javascript:void(0);" title="<?php echo "Pharm. " .$user->last_name;?>" id="user_name">
                     <span><?php echo $user->last_name . " " . $user->first_name;?></span> 
                    <div class="user_img">
                        <img src="<?php echo "../passports/".$user->passport;?>" alt="passport">
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
                            <button id="loginBtn"><a href="../controller/logout.php">Log out</a></button>
                            
                        </div>
                    </div>
                </div>
                <nav>
                    <h3><a href="user.php" title="Home"><i class="fas fa-home"></i> Dashboard</a></h3>
                    <ul>
                        <?php
                            $pay_status = $connectdb->prepare("SELECT payment_status FROM users WHERE pcn_number = :pcn_number");
                            $pay_status->bindvalue("pcn_number", $user->pcn_number);
                            $pay_status->execute();
                            $payStat = $pay_status->fetch();
                            if($payStat->payment_status == 0 || $payStat->payment_status == 1){
                                
                        ?>
                        <li><a href="javascript:void(0);" id="addCat" title="Upload payment" class="page_navs" data-page="addCategories"><i class="fas fa-paper-plane"></i>Upload payment</a></li>
                        <?php 
                            }else{
                                echo "";
                            }
                        ?>
                        <?php
                            $pay = $connectdb->prepare("SELECT payment_status FROM users WHERE pcn_number = :pcn_number AND payment_status = 2");
                            $pay->bindvalue("pcn_number", $user->pcn_number);
                            $pay->execute();
                            if($pay->rowCount() > 0){
                                
                        ?>
                        <li><a href="javascript:void(0);" id="addMenu" title="Add restaurant menu" class="page_navs" data-page="reqHotel"><i class="fas fa-hotel"></i> Request Accomodation</a></li>
                        <?php
                            }else{
                                echo "";
                            }
                        ?>
                        <?php
                            $get_request = $connectdb->prepare("SELECT * FROM request_hotel WHERE pcn_number = :pcn_number");
                            $get_request->bindvalue("pcn_number", $user->pcn_number);
                            $get_request->execute();
                            if($get_request->rowCount() > 0){

                        ?>
                        <li><a href="javascript:void(0);" id="addMenu" title="Add hotel payment" class="page_navs" data-page="confirm_hotel"><i class="fas fa-receipt"></i> Upload accomodation receipt</a></li>
                        <?php
                            }else{
                                echo "";
                            }
                        ?>
                        <?php
                            $get_bulk = $connectdb->prepare("SELECT * FROM request_hotel WHERE pcn_number = :pcn_number AND request_status = 1");
                            $get_bulk->bindvalue("pcn_number", $user->pcn_number);
                            $get_bulk->execute();
                            if($get_bulk->rowCount() > 0){

                        ?>
                        <li><a href="javascript:void(0);" id="addMenu" title="Make request for other members" class="page_navs" data-page="bulk_request"><i class="fas fa-users"></i> Bulk request</a></li>
                        
                        <li><a href="javascript:void(0);" id="addMenu" title="Add bulk payment" class="page_navs" data-page="confirm_bulk"><i class="fas fa-receipt"></i> Upload bulk receipt</a></li>
                        <?php
                            }else{
                                echo "";
                            }
                        ?>
                        <li><a href="javascript:void(0);" id="addStore" class="page_navs" data-page="addRestaurant"><i class="fas fa-print"></i> Print slip</a></li>
                        <li><a href="javascript:void(0);" id="addStore" class="page_navs" data-page="certificate"><i class="fas fa-certificate"></i> Attendance Certificate</a></li>
                        <li><a href="javascript:void(0);" id="downloads" class="page_navs" data-page="conference_downloads"><i class="fas fa-download"></i> Conference Downloads</a></li>
                        <li><a href="javascript:void(0);" id="gallery" class="page_navs" data-page="conference_gallerys"><i class="fas fa-photo-video"></i> Conference Gallery</a></li>
                        <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="profile"><i class="fas fa-user"></i> Update Profile</a></li>
                    </ul>
                </nav>
            </aside>
            <aside class="mobile_menu" id="mobile_log">
                <div class="login">
                    <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
                    <div class="login_option">
                        <div>
                            <button id="loginBtn"><a href="../controller/logout.php">Log out</a></button>
                            
                        </div>
                    </div>
                </div>
                <nav>
                    <h3><a href="user.php" title="Home"><i class="fas fa-home"></i> Dashboard</a></h3>
                    <ul>
                        <?php
                            $pay_status = $connectdb->prepare("SELECT payment_status FROM users WHERE pcn_number = :pcn_number");
                            $pay_status->bindvalue("pcn_number", $user->pcn_number);
                            $pay_status->execute();
                            $payStat = $pay_status->fetch();
                            if($payStat->payment_status == 0 || $payStat->payment_status == 1){
                                
                        ?>
                        <li><a href="javascript:void(0);" id="addCat" title="Upload payment" class="page_navs" data-page="addCategories"><i class="fas fa-paper-plane"></i>Upload payment</a></li>
                        <?php 
                            }else{
                                echo "";
                            }
                        ?>
                        <?php
                            $pay = $connectdb->prepare("SELECT payment_status FROM users WHERE pcn_number = :pcn_number AND payment_status = 2");
                            $pay->bindvalue("pcn_number", $user->pcn_number);
                            $pay->execute();
                            if($pay->rowCount() > 0){
                                
                        ?>
                        <li><a href="javascript:void(0);" id="addMenu" title="Add restaurant menu" class="page_navs" data-page="reqHotel"><i class="fas fa-hotel"></i> Request Accomodation</a></li>
                        <?php
                            }else{
                                echo "";
                            }
                        ?>
                        <?php
                            $get_request = $connectdb->prepare("SELECT * FROM request_hotel WHERE pcn_number = :pcn_number");
                            $get_request->bindvalue("pcn_number", $user->pcn_number);
                            $get_request->execute();
                            if($get_request->rowCount() > 0){

                        ?>
                        <li><a href="javascript:void(0);" id="addMenu" title="Add hotel payment" class="page_navs" data-page="confirm_hotel"><i class="fas fa-receipt"></i> Upload accomodation receipt</a></li>
                        <?php
                            }else{
                                echo "";
                            }
                        ?>
                        <?php
                            $get_bulk = $connectdb->prepare("SELECT * FROM request_hotel WHERE pcn_number = :pcn_number AND request_status = 1");
                            $get_bulk->bindvalue("pcn_number", $user->pcn_number);
                            $get_bulk->execute();
                            if($get_bulk->rowCount() > 0){

                        ?>
                        <li><a href="javascript:void(0);" id="addMenu" title="Make request for other members" class="page_navs" data-page="bulk_request"><i class="fas fa-users"></i> Bulk request</a></li>
                        <?php
                            }else{
                                echo "";
                            }
                        ?>
                        <?php
                            $get_bulk_stat = $connectdb->prepare("SELECT * FROM request_hotel WHERE pcn_number = :pcn_number AND bulk = 1");
                            $get_bulk_stat->bindvalue("pcn_number", $user->pcn_number);
                            $get_bulk_stat->execute();
                            if($get_bulk_stat->rowCount() > 0){

                        ?>
                        <li><a href="javascript:void(0);" id="addMenu" title="Add bulk payment" class="page_navs" data-page="confirm_bulk"><i class="fas fa-receipt"></i> Upload bulk receipt</a></li>
                        <?php
                            }else{
                                echo "";
                            }
                        ?>
                        <li><a href="javascript:void(0);" id="addStore" class="page_navs" data-page="addRestaurant"><i class="fas fa-print"></i> Print slip</a></li>
                        <li><a href="javascript:void(0);" id="addStore" class="page_navs" data-page="certificate"><i class="fas fa-certificate"></i> Attendance Certificate</a></li>
                        <li><a href="javascript:void(0);" id="downloads" class="page_navs" data-page="conference_downloads"><i class="fas fa-download"></i> Conference Downloads</a></li>
                        <li><a href="javascript:void(0);" id="gallery" class="page_navs" data-page="conference_gallerys"><i class="fas fa-photo-video"></i> Conference Gallery</a></li>
                        <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="profile"><i class="fas fa-user"></i> Update Profile</a></li>
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
                    if(isset($_SESSION['error_note'])){
                        echo "<p class='error_note'>" . $_SESSION['error_note'] . "</p>";
                        unset($_SESSION['error_note']);
                    }
                ?>
                <!-- <?php
                    if(isset($_SESSION['reg_success'])){
                        echo "<p id='reg_success'>" . $_SESSION['reg_success'] . "</p>";
                        unset($_SESSION['reg_success']);
                    }
                ?> -->
                <?php
                    if(isset($_SESSION['upload'])){
                        
                ?>
                        <form method="post" class="passport_form" action="../controller/upload_passport.php" enctype="multipart/form-data">
                            <label><?php echo $_SESSION['upload']; ?></label><br>
                            <input type="hidden" value="<?php echo $user->user_id;?>" name="user_id">
                            <input type="file" name="passport" required>
                            <button type="submit" name="upload_passport">Upload <i class="fas fa-upload"></i></button>
                        </form>
                <?php
                        unset($_SESSION['upload']);
                    }
                ?>
                <div id="dashboard">
                    
                    <div class="cards" id="card2">
                        <a href="javascript:void(0)">
                            <p>Registration status</p>
                            <div class="infos">
                                <?php
                                    $get_status = $connectdb->prepare("SELECT payment_status FROM users WHERE pcn_number = :pcn_number");
                                    $get_status->bindvalue("pcn_number", $username);
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
                    <div class="cards" id="card3">
                        <a href="javascript:void(0)">
                            <p>Accomodation</p>
                            <div class="infos">
                                <i class="fas fa-hotel"></i>
                                <p>
                                    <?php
                                        $get_hotel = $connectdb->prepare("SELECT request_status FROM request_hotel WHERE pcn_number = :pcn_number");
                                        $get_hotel->bindvalue("pcn_number", $username);
                                        $get_hotel->execute();
                                        if(!$get_hotel->rowCount() > 0){
                                            echo "No request";
                                        }else{
                                            $hotels = $get_hotel->fetch();
                                            if($hotels->request_status == 0){
                                                echo "Requested";
                                            }elseif($hotels->request_status == 1){
                                                echo "Accepted";
                                            }else{
                                                echo "Denied";
                                            }
                                        }
                                        

                                        
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div> 
                   
                </div>
                <!--show RECEIPT -->
                <div id="paid_receipt" class="displays management">
                    <div class="info"></div>
                    
                    <?php 
                        $payment_status = $connectdb->prepare("SELECT * FROM users WHERE user_id = :user_id AND payment_status = 2 AND passport != ''");
                        $payment_status->bindvalue("user_id", $user->user_id);
                        $payment_status->execute();
                        if(!$payment_status->rowCount() > 0){
                            echo "";
                        }else{
                    ?>
                    <p class="reg_success">
                        You have successfully registered for the Eko Akate 2022 conference.<br> Kindly present the slip below at the point of physical registration
                    </p>
                    <h2>Registration Slip</h2>
                    <section class="clearanceSlip">
            
                        <div class="logos">
                            <img src="../images/acpn_logo.png" alt="Acpn logo">
                            <P>Eko Akate 2022</P>
                        </div>
                        <div class="slip">
                            <div class="slip_back">
                                <img src="../images/acpn_logo.png" alt="psn">
                            </div>
                            <div class="details">
                                <div class="logos_passport">
                                    <div class="passports">
                                        <img src="<?php echo '../passports/'.$user->passport;?>" alt="member passport">
                                    </div>
                                </div>
                                <p class="full_name"><?php echo $user->first_name . " " .$user->last_name?></p>
                                <p><?php echo $user->res_state?></p>
                                <p><span>Registration ID: </span><?php echo $user->reg_number?></p>
                                <div class="qr_code">
                                <img src="../images/qr_code.png" alt="qr_code">
                                </div>
                            </div>
                        </div>
                        
                        
                    </section>
                    <div class="download">
                        <button id="print" onclick="window.print()">Print slip <i class="fas fa-print"></i></button>
                    </div>
                    <?php }?>
                </div>
                
                <!-- Upload payment -->
                <div id="addCategories" class="displays">
                    <div class="info"></div>
                    <div class="add_user_form">
                        <h3>Upload payment</h3>
                        <form method="POST"  id="addCatForm" action="../controller/upload_payment.php" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $user->user_id?>" name="user_id">
                            <div class="inputs">
                                <!-- <div class="data" id="accomodate">
                                    <select name="accomod" id="accomod" onchange="showHotels(this.value)">
                                        <option value=""selected>Do you want accomomdation?</option>
                                        <option value="yes" id="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                                <div class="data" id="hotels">
                                    <select name="hotel" id="hotel">
                                        <option value="" selected>Select Hotel</option>
                                        <option value="Prestige Hotel">Prestige Hotel</option>
                                        <option value="Eko hotel">Eko hotel</option>
                                        <option value="Transcorp hilton">Transcorp hilton</option>
                                    </select>
                                </div> -->
                                <div class="data">
                                    <label for="payment">Upload Payment Slip</label>
                                    <input type="file" name="payment" id="payment" required>
                                </div>
                                <button type="submit" id="add_payment" name="add_payment">Upload payment <i class="fas fa-upload"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- request accomodation -->
                <div id="reqHotel" class="displays">
                    <?php
                        
                        $get_request = $connectdb->prepare("SELECT * FROM request_hotel WHERE pcn_number = :pcn_number");
                        $get_request->bindvalue("pcn_number", $user->pcn_number);
                        $get_request->execute();

                        if(!$get_request->rowCount() > 0){

                        
                    ?>
                    
                    <div class="info"></div>
                    <div class="add_user_form">
                        <h3>Request Accomodation</h3>
                        <form method="POST"  id="addCatForm" action="../controller/request_hotel.php">
                            <input type="hidden" value="<?php echo $user->pcn_number?>" name="requester">
                            <input type="hidden" value="<?php echo $user->pcn_number?>" name="pcn_id">
                            <div class="inputs">
                                <div class="data">
                                    <label for="user_hotel">Select hotel</label>
                                    <select name="user_hotel" id="user_hotel" required>
                                        <option value="" selected>Select Hotel</option>
                                        <?php
                                            $get_hotel = $connectdb->prepare("SELECT * FROM hotels ORDER BY hotel");
                                            $get_hotel->execute();
                                            $hotels = $get_hotel->fetchAll();
                                            foreach($hotels as $hotel):
                                        ?>
                                        <option value="<?php echo $hotel->hotel;?>"><?php echo $hotel->hotel;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="data">
                                    <label for="room">Select room type</label>
                                    <select name="user_room" id="user_room" required>
                                    <option value="" selected>Select Hotel</option>
                                    
                                    </select>
                                </div>
                                
                            </div>
                            <div class="inputs">
                                <div class="data">
                                    <label for="check_in_date">Check_in date</label>
                                    <input type="date" name="check_in_date" id="check_in_date" required>
                                </div>
                            </div>
                            <div class="inputs" id="price">
                                
                            </div>
                                <button type="submit" id="request" name="request">Make Request <i class="fas fa-paper-plane"></i></button>
                            
                        </form>
                    </div>
                    <?php
                        }else{
                            $get_acc_status = $connectdb->prepare("SELECT request_status FROM request_hotel WHERE pcn_number = :pcn_number");
                            $get_acc_status->bindvalue("pcn_number", $user->pcn_number);
                            $get_acc_status->execute();
                            $status = $get_acc_status->fetch();
                            if($status->request_status == 1){
                        
                    ?>
                    <div class="add_user_form">
                        <h3>Your Accomodation details</h3>
                        <?php
                            $get_hotel = $connectdb->prepare("SELECT * FROM request_hotel WHERE pcn_number = :pcn_number");
                            $get_hotel->bindvalue("pcn_number", $username);
                            $get_hotel->execute();
                            $infos = $get_hotel->fetchAll();
                            foreach($infos as $info):
                        ?>
                        <form action="">
                            <div class="inputs">
                                <div class="data">
                                    <h3 style='background:skyblue'><?php echo $info->hotel?></h3>
                                </div>
                                <div class="data">
                                    <p>Room type: <?php echo $info->room?></p>
                                </div>
                                
                            </div>
                            <div class="inputs">
                                <div class="data">
                                    <p style="font-weight:bold">Amount: <?php 
                                        $get_price = $connectdb->prepare("SELECT price FROM rooms WHERE hotel = :hotel AND room = :room");
                                        $get_price->bindvalue("hotel", $info->hotel);
                                        $get_price->bindvalue("room", $info->room);
                                        $get_price->execute();
                                        $price = $get_price->fetch();
                                        echo "₦ " . number_format($price->price, 2, ".")." <i class='fas fa-check' style='color:green'></i>";
                                    ?></p>
                                </div>
                                <div class="data">
                                    <p style="font-weight:bold; text-transform:uppercase">Check in Date: <?php echo date("jS F, Y", strtotime($info->check_in_date))?></p>
                                </div>
                            </div>
                        </form>
                        
                        <?php endforeach?>
                    </div>
                    
                    <?php
                        }else{
                            echo "<p class='reg_success'>You have already made a request. kindly await approval</p>";
                        }
                    ?>
                    
                    <?php }?>
                </div>
                <!-- upload accomodation pay slip -->
                <div id="confirm_hotel" class="displays">
                   <?php
                        $get_evid = $connectdb->prepare("SELECT * FROM request_hotel WHERE pcn_number = :pcn_number AND payment_evidence = ''");
                        $get_evid->bindvalue("pcn_number", $user->pcn_number);
                        $get_evid->execute();
                        if(!$get_evid->rowCount() > 0){
                            echo "<p class='alert'>Your accomodation payment has been uploaded already!</p>";
                        }else{
                   ?>
                    <div class="info"></div>
                    <div class="add_user_form">
                        <h3>Upload accomodation payment</h3>
                        <form method="POST"  id="addCatForm" action="../controller/upload_hotel_payment.php" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $user->pcn_number?>" name="user_id">
                            <div class="inputs">
                                
                                <div class="data">
                                    <label for="payment">Upload Payment Slip</label>
                                    <input type="file" name="payment" id="payment" required>
                                </div>
                                <button type="submit" id="add_payment" name="add_payment">Upload payment <i class="fas fa-upload"></i></button>
                            </div>
                        </form>
                    </div>
                    <?php }?>
                </div>
                <!-- accomodation bulk request -->
                <div id="bulk_request" class="displays">
                    
                    <div class="info"></div>
                    <div class="add_user_form">
                        <h3>Request accomodation for state Members</h3>
                        <form method="POST"  id="addCatForm" action="../controller/request_bulk.php">
                            <input type="hidden" value="<?php echo $user->pcn_number?>" name="bulk_requester" id="bulk_requester">
                            <div class="inputs">
                                <div class="data">
                                    <label for="bulk_delegate">State delegates</label>
                                    <select name="bulk_delegate" id="bulk_delegate" required>
                                        <option value=""selected>Select delegates</option>
                                        <?php
                                            $get_delegate = $connectdb->prepare("SELECT * FROM users WHERE res_state = :res_state AND payment_status = 2 AND pcn_number != :pcn_number ORDER BY reg_date");
                                            $get_delegate->bindvalue("res_state", $user->res_state);
                                            $get_delegate->bindvalue("pcn_number", $user->pcn_number);
                                            $get_delegate->execute();
                                            $dels = $get_delegate->fetchAll();
                                            foreach($dels as $del):
                                        ?>
                                        <option value="<?php echo $del->pcn_number?>"><?php echo $del->first_name." ".$del->last_name?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="data">
                                    <label for="user_hotel">Select hotel</label>
                                    <select name="user_hotel" id="user_hotel" required>
                                        <option value="" selected>Select Hotel</option>
                                        <?php
                                            $get_hotel = $connectdb->prepare("SELECT * FROM hotels ORDER BY hotel");
                                            $get_hotel->execute();
                                            $hotels = $get_hotel->fetchAll();
                                            foreach($hotels as $hotel):
                                        ?>
                                        <option value="<?php echo $hotel->hotel;?>"><?php echo $hotel->hotel;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                
                                
                            </div>
                            <div class="inputs">
                                <div class="data">
                                    <label for="room">Select room type</label>
                                    <select name="user_room" id="user_room" required>
                                    <option value="" selected>Select Hotel first</option>
                                    
                                    </select>
                                    
                                </div>
                                <div class="data">
                                    <label for="check_in_date">Check_in date</label>
                                    <input type="date" name="check_date" id="check_date" required>
                                </div>
                            </div>
                            <div class="inputs" id="price">
                                
                            </div>
                                <button type="submit" id="request_bulk" name="request_bulk">Make Request <i class="fas fa-paper-plane"></i></button>
                            
                        </form>
                    </div>
                    <div id="requested" class="allResults">
                        <h2>Members requested</h2>
                        <hr>
                        <div class="search">
                            <input type="search" id="searchRequest" placeholder="Enter keyword">
                        </div>
                        <table id="request_table">
                            <thead>
                                <tr>
                                    <td>S/N</td>
                                    <td>Delegate</td>
                                    <td>Hotel</td>
                                    <td>Room</td>
                                    <td>Price</td>
                                    <td>Check in date</td>
                                    <td>Status</td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $get_delegates = $connectdb->prepare("SELECT * FROM request_hotel WHERE request_by = :request_by AND pcn_number != request_by ORDER BY request_date");
                                    $get_delegates->bindvalue("request_by", $user->pcn_number);
                                    $get_delegates->execute();
                                    $n = 1;
                                    
                                    $delegates = $get_delegates->fetchAll();

                                    foreach($delegates as $delegate):
                                ?>
                                <tr>
                                    <td style="text-align:center; color:red"><?php echo $n?></td>
                                    <td><?php 
                                        $get_user = $connectdb->prepare("SELECT * FROM users WHERE pcn_number = :pcn_number");
                                        $get_user->bindvalue("pcn_number", $delegate->pcn_number);
                                        
                                        $get_user->execute();
                                        $userss = $get_user->fetchAll();
                                        foreach($userss as $users){
                                            echo $users->last_name . " ". $users->first_name;
                                        }
                                        
                                    ?></td>
                                    <td><?php echo $delegate->hotel;?></td>
                                    <td><?php echo $delegate->room?></td>
                                    <td><?php 
                                        $get_price = $connectdb->prepare("SELECT price FROM rooms WHERE hotel = :hotel AND room = :room");
                                        $get_price->bindvalue("hotel", $delegate->hotel);
                                        $get_price->bindvalue("room", $delegate->room);
                                        $get_price->execute();
                                        $price = $get_price->fetch();
                                        echo "₦ ".number_format($price->price, 2, ".")?></td>
                                     <td><?php echo date("jS M, Y", strtotime($delegate->check_in_date))?></td>   
                                    <td><?php
                                        if($delegate->request_status ==1){
                                            echo "Approved";
                                        }else{
                                            echo "Pending";
                                        }
                                    ?></td>
                                </tr>
                                <?php $n++; endforeach;?>
                            </tbody>
                        </table>
                        <div class="total">
                            <P>Amount Due: <?php
                                $get_due = $connectdb->prepare("SELECT SUM(amount) AS amount_due FROM request_hotel WHERE request_by = :request_by AND request_by != pcn_number AND request_status = 0");
                                $get_due->bindvalue("request_by", $user->pcn_number);
                                $get_due->execute();
                                $amount_due = $get_due->fetch();
                                echo "₦ ".number_format($amount_due->amount_due);
                            ?></P>
                        </div>
                        <?php
                            if(!$get_delegates->rowCount() > 0){
                                echo "<p class='no_result'>'No result found!'</p>";
                            }
                        ?>
                    </div>
                </div>
                <!-- upload bulk accomodation pay slip -->
                <div id="confirm_bulk" class="displays">
                    <div class="info"></div>
                    <div class="add_user_form">
                        <h3>Upload bulk payment for accomodation</h3>
                        <form method="POST"  id="addCatForm" action="../controller/upload_bulk_payment.php" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $user->pcn_number?>" name="user_id">
                            <div class="inputs">
                                <div class="data">
                                    <h3>Amount due:<?php
                                        $get_due = $connectdb->prepare("SELECT SUM(amount) AS amount_due FROM request_hotel WHERE request_by = :request_by AND request_by != pcn_number AND request_status = 0");
                                        $get_due->bindvalue("request_by", $user->pcn_number);
                                        $get_due->execute();
                                        $amount_due = $get_due->fetch();
                                        echo "₦ ".number_format($amount_due->amount_due);
                                    ?></h3>
                                </div>
                                <div class="data">
                                    <label for="payment">Upload Payment Slip</label>
                                    <input type="file" name="payment" id="payment" required>
                                </div>
                                
                            </div>
                                <button type="submit" id="add_bulk_payment" name="add_bulk_payment">Upload payment <i class="fas fa-upload"></i></button>
                        </form>
                    </div>
                </div>
                <!--PRINT RECEIPT -->
                <div id="addRestaurant" class="displays management">
                    <div class="info"></div>
                    <h2>Registration Slip</h2>
                    <?php 
                        $payment_status = $connectdb->prepare("SELECT * FROM users WHERE user_id = :user_id AND payment_status = 2");
                        $payment_status->bindvalue("user_id", $user->user_id);
                        $payment_status->execute();
                        if(!$payment_status->rowCount() > 0){
                            echo "<p class='enrolled'>Registration status is currently pending!</p>";
                        }else{
                            $get_passport = $connectdb->prepare("SELECT * FROM users WHERE user_id = :user_id AND payment_status = 2 AND passport = ''");
                            $get_passport->bindvalue("user_id", $user->user_id);
                            $get_passport->execute();
                            if($get_passport->rowCount() > 0){
                                echo "<p class='enrolled'>Kindly Upload Your passport</p>";
                            }else{
                    ?>
                    <p class="reg_success">
                        You have successfully registered for the Eko Akate 2022 conference.<br> Kindly present the slip below at the point of physical registration
                    </p>
                    <section class="clearanceSlip">
            
                        <div class="logos">
                            <img src="../images/acpn_logo.png" alt="Acpn logo">
                            <P>Eko Akate 2022</P>
                        </div>
                        <div class="slip">
                            <div class="slip_back">
                                <img src="../images/acpn_logo.png" alt="psn">
                            </div>
                            <div class="details">
                                <div class="logos_passport">
                                    <div class="passports">
                                        <img src="<?php echo '../passports/'.$user->passport;?>" alt="member passport">
                                    </div>
                                </div>
                                <p class="full_name"><?php echo $user->first_name . " " .$user->last_name?></p>
                                <p><?php echo $user->res_state?></p>
                                <p><span>Registration ID: </span><?php echo $user->reg_number?></p>
                                <div class="qr_code">
                                <img src="../images/qr_code.png" alt="qr_code">
                                </div>
                            </div>
                        </div>
                        
                        
                    </section>
                    <div class="download">
                        <button id="print" onclick="window.print()">Print slip <i class="fas fa-print"></i></button>
                    </div>
                    <?php } }?>
                </div>
                <!--PRINT RECEIPT -->
                <div id="certificate" class="displays management">
                    <div class="info"></div>
                    <h2>Certificate of Participation</h2>
                    <?php 
                        $attendance_status = $connectdb->prepare("SELECT * FROM users WHERE user_id = :user_id AND attendance = 1");
                        $attendance_status->bindvalue("user_id", $user->user_id);
                        $attendance_status->execute();
                        if(!$attendance_status->rowCount() > 0){
                            echo "<p class='enrolled'>You did not attend this conference!</p>";
                        }else{
                            
                    ?>
                    <p class="reg_success">
                        You have successfully attended the Eko Akate 2022 conference.<br> You can print your certifcate of attendance below
                    </p>
                    <section id="attendanceSlip">
            
                        <div class="slip">
                            <div class="slip_back">
                                <img src="../images/acpn_logo.png" alt="psn">
                            </div>
                            <div class="all_details">
                                <div class="top_details">
                                    <figure clsas="first_child">
                                        <img src="<?php echo '../passports/'.$user->passport?>" alt="ACPN">
                                    <figcaption>Motto</figcaption>
                                    </figure>
                                    <div class="cert">
                                        <h3>CERTIFICATE OF PARTICIPATION</h3>
                                        <p>This is to certify that</p>
                                    </div>
                                    <figure>
                                        <img src="../images/psn_logo2.png" alt="psn">
                                        <figcaption>Motto</figcaption>
                                    </figure>
                                    
                                </div>
                                <div class="details">
                                    <h2 class="full_name"><?php echo $user->last_name . " " .$user->first_name?></h2>
                                    <hr>
                                    <p>Attended the <span>41st Annual National Conference</span> of the Association of Community Pharmacists of Nigeria (ACPN) <span>"EKO AKETE" 2022</p>
                                    <div class="dates">
                                        <h4>July 24<sup>th</sup> to 29<sup>th</sup>, 2022</h4>
                                    </div>
                                    <h4 class="theme">Theme:</h4>
                                    <p class="theme_note">"Benefits of community pharmacist to the modern day Nigerian society"</p>
                                </div>
                                <div class="stamp">
                                        <i class="fas fa-certificate"></i>
                                    </div>
                                <div class="signatories">
                                    <div class="sign">
                                        <p>Pharm. <span>Joshua Briggs,</span>FPSN, FNAPharm, FPC</p>
                                        <p class="title">President</p>
                                    </div>
                                    
                                    <div class="sign">
                                        <p>Pharm. <span>Damian Waterloo,</span>FPSN</p>
                                        <p class="title">National Secretary</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </section>
                    <div class="download">
                        <button id="print" onclick="window.print()">Print <i class="fas fa-print"></i></button>
                    </div>
                    <?php }?>
                </div>
                <!-- update profile -->
                <div class="management displays" id="profile">
                    <div class="info"></div>
                    <div class="add_user_form">
                        <h3>Update profile</h3>
                        <form method="POST"  id="addCatForm" action="../controller/profile_update.php" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $user->user_id?>" name="user_id">
                            <div class="inputs">
                                <div class="data">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" value="<?php echo $user->first_name;?>" id="first_name">
                                </div>
                                <div class="data">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" value="<?php echo $user->last_name;?>" id="last_name" readonly>
                                </div>
                            </div>
                            <div class="inputs">
                                <div class="data">
                                    <label for="whatsapp">whatsapp Number</label>
                                    <input type="tel" name="whatsapp" value="<?php echo $user->whatsapp;?>" id="whatsapp">
                                </div>
                                <div class="data">
                                    <label for="other_number">Other Number</label>
                                    <input type="tel" name="other_number" value="<?php echo $user->other_number;?>" id="other_number">
                                </div>
                            </div>
                            <div class="inputs">
                                <div class="data">
                                    <label for="user_email">Email address</label>
                                    <input type="email" name="user_email" value="<?php echo $user->user_email;?>" id="user_email">
                                </div>
                                <div class="data">
                                    <label for="res_state">State of practice</label>
                                    <select name="res_state" id="res_state" readonly>
                                        <option value="<?php echo $user->res_state?>"selected><?php echo $user->res_state?></option>
                                        <!-- <option value="Abia">Abia</option>
                                        <option value="Adamawa">Adamawa</option>
                                        <option value="Akwa-ibom">Akwa-ibom</option>
                                        <option value="Anambra">Anambra</option>
                                        <option value="Bauchi">Bauchi</option>
                                        <option value="Bayelsa">Bayelsa</option>
                                        <option value="Benue">Benue</option>
                                        <option value="Borno">Borno</option>
                                        <option value="Cross rivers">Cross rivers</option>
                                        <option value="Delta">Delta</option>
                                        <option value="Ebonyi">Ebonyi</option>
                                        <option value="Edo">Edo</option>
                                        <option value="Ekiti">Ekiti</option>
                                        <option value="Enugu">Enugu</option>
                                        <option value="Gombe">Gombe</option>
                                        
                                        <option value="Imo">Imo</option>
                                        <option value="Jigawa">Jigawa</option>
                                        <option value="Kaduna">Kaduna</option>
                                        <option value="Kano">Kano</option>
                                        <option value="Katsina">Katsina</option>
                                        <option value="Kebbi">Kebbi</option>
                                        <option value="Kogi">Kogi</option>
                                        <option value="Kwarra">Kwarra</option>
                                        <option value="Lagos">Lagos</option>
                                        <option value="Nassarawa">Nassarawa</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Ogun">Ogun</option>
                                        <option value="Ondo">Ondo</option>
                                        <option value="Osun">Osun</option>
                                        <option value="Oyo">Oyo</option>
                                        <option value="Plateau">Plateau</option>
                                        <option value="Rivers">Rivers</option>
                                        <option value="Sokoto">Sokoto</option>
                                        <option value="Taraba">Taraba</option>
                                        <option value="Yobe">Yobe</option>
                                        <option value="Zamfara">Zamfara</option>
                                        <option value="FCT">FCT</option> -->
                                        
                                    </select>
                                </div>
                                <div class="inputs">
                                    <div class="data">
                                        <div class="user_passport">
                                            <img src="<?php echo "../passports/".$user->passport;?>" alt="Passport">
                                        </div>
                                        <input type="file" name="passport" id="passport">
                                    </div>
                                    <div class="data">
                                        <label for="other_number">Gender</label>
                                        <select name="gender" id="gender">
                                            <option value="<?php echo $user->gender;?>" selected><?php echo $user->gender;?></option>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                        </select>
                                        
                                    </div>
                                    
                                </div>
                                <button type="submit" id="update" name="update">Update Profile <i class="fas fa-user"></i></button>
                            </div>
                        </form>
                    </div>  
                </div>

            </section>

        </div>
        
            
        
        
            
        
    </main>
    <script src="../jquery.js"></script>
    <script src="../script.js"></script>
</body>
</html>

<?php 
    endforeach;
    }else{
        header("Location: registration.php");
    }
?>