<?php
    session_start();
    require "../controller/connections.php";
    if(isset($_GET['user'])){
        $user = $_GET['user'];
    }
    $user_details = $connectdb->prepare("SELECT * FROM users WHERE user_id = :user_id");
    // $user_details->bindvalue("user_email", $user);
    $user_details->bindvalue("user_id", $user);
    $user_details->execute();
    $users  = $user_details->fetchAll();

    foreach($users as $user):
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PSN is the National reguatory body for all pharmacist in Nigeria. it is formally known as Pharmacist society of NIgeria">
    <meta name="keywords" content="PSN, psn, Pharmacist, pharmacist association, pharmacist society, Nigeria">
    <title>ACPN Conference| <?php echo $user->first_name . $user->last_name?></title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="../images/ACPN_logO.PNg" size="32X32">
    <link rel="stylesheet" href="../style.css">
    
</head>
<body>
    
<section class="top_head" id="topHeader">
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
        </section>
    <header>
        <h1 class="logo">
            <a href="admin.php" title="ACPN">
                <img src="../images/acpn_logo.png" alt="PSN Logo" class="img-fluid">
            </a>
        </h1>
        <div class="search">
            <form class="form-inline" method="POST">
                <input type="search" name="search_items" placeholder="search members, reg_number, search phone number">
                <button type="submit" name="searchBtn" class="main_searchbtn" id="searchBtn">Search <i class="fas fa-search"></i></button>
                <button type="submit" name="search_items" class="mobilesearchbtn" id="searchBtn"><i class="fas fa-search"></i></button>
            </form>
            
        </div>
        <div class="other_menu">
            <a href="admin.php" title="Our Gallery">Admin</a>
        </div>
        <div class="login">
            <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
            <div class="login_option">
                <div>
                    <button id="loginBtn"><a href="../controller/logout.php">Log out</a></button>
                    
                </div>
            </div>
        </div>
        <div class="cart">
            <a href="javascript:void(0);" title="Registered members"><i class="fas fa-users"></i> Registered 
                <span id="cart_value"><?php
                $get_members = $connectdb->prepare("SELECT * FROM users WHERE last_name != 'Admin' AND last_name != 'User'");
                $get_members->execute();
                echo $get_members->rowCount();
                ?> </span></a>
        </div>
        <div class="menu_icon">
            <a href="javascript:void(0)"><i class="fas fa-bars"></i></a>
        </div>
    </header>

    <main>
        <div class="success">
            <?php
                if(isset($_SESSION['success'])){
                    echo "<p>" .$_SESSION['success']. "</p>";
                    unset($_SESSION['success']);
                }
            ?>
        </div>
        <!-- search results -->
                <?php
                    if($user->payment_status != 2){
                        echo "<div class='status_message'>
                        <p>This user has not made payment for " . Date("Y")."</p></div>";
                    }else{
                ?>
        <button onclick="window.close()" id="goback">Go back <i class ="fas fa-angle-double-left"></i></button>
        <h2 id="reg_slip">Registration slip</h2>
        <hr>
        <section class="clearanceSlip">
            
            <div class="logos">
                <img src="../images/acpn_logo.png" alt="ACPN logo">
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
    </main>
    <script src="../jquery.js"></script>
    <script src="../script.js"></script>
</body>
</html>

<?php endforeach;?>