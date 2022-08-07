<?php
    session_start();
    require "../controller/connections.php";
    if(isset($_SESSION['user'])){
        $username = $_SESSION['user'];
        if(isset($_GET['company'])){
            $user = $_GET['company'];
        }
        $user_details = $connectdb->prepare("SELECT * FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
        // $user_details->bindvalue("user_email", $user);
        $user_details->bindvalue("exhibitor_id", $user);
        $user_details->execute();
        $users  = $user_details->fetchAll();

        foreach($users as $user):
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Clozeth is an online platform made for the purpose of ordering fashion wears, men and women clothing, bed sheets, jewellries, etc from all kinds of retailers and wholesalers in Nigeria and Abroad from whereever you are through your mobile phone, tablet or pc">
    <meta name="keywords" content="Fashion, fashion store, clothings, men, women, men wears, women wears, jewellry, jewellries, rings, earings, wrist watch, eye glass, glass, shoes, order, ordering">
    <title>Clozeth | Company Info <?php echo $user->company_name?></title>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.css">
    <link rel="icon" type="image/png" href="../images/ACPN_logO.PNg" size="32X32">
    <link rel="stylesheet" href="../style.css">
    
</head>
<body>
    
    
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
                    <button id="loginBtn"><a href="../controller/logout.php">Log out <i class="fas fa-power-off"></i></a></button>
                    
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
                
        <button onclick="window.close()" id="goback">Go back <i class ="fas fa-angle-double-left"></i></button>
        <h2 id="reg_slip">Company Details</h2>
        <hr>
        <div id="company_details">
            <div class="information">
                <div class="core">
                    <h3><?php echo $user->company_name?></h3>
                    <p><i class="fas fa-map"></i> <?php echo $user->company_address;?></p>
                    <p><i class="fas fa-envelope"></i> <?php echo $user->company_email?></p>
                    <p><i class="fas fa-phone"></i> <?php echo $user->company_phone?></p>
                </div>
                <div class="info_logo">
                    <img src="<?php echo "../logos/".$user->company_logo?>" alt="Company logo">
                </div>
            </div>
            <div class="other_details">
                <div class="con_det">
                    <p>Contact person: <span><?php echo $user->contact_person?></span></p>
                </div>
                <div class="con_det">
                    <p>Plan/Package: <span><?php 
                        if($user->payment_status == 2){
                            $get_booth = $connectdb->prepare("SELECT * FROM plan_package WHERE package_id = :package_id");
                            $get_booth->bindvalue("package_id", $user->plan_package);
                            $get_booth->execute();
                            $booths = $get_booth->fetchAll();
                            foreach($booths as $booth){
                                echo $booth->plan."(".$booth->package.")";
                            }
                        }else{
                            echo "Not paid for a pacakge";
                        }
                    ?></span></p>
                </div>
                <div class="con_det">
                    <p>Contact Phone: <span><?php echo $user->contact_phone?></span></p>
                </div>
                <div class="con_det">
                    <p>Exhibitor store ID: <span><?php echo $user->reg_number?></span></p>
                </div>
            </div>
        </div>
        
      
    </main>
    <script src="../jquery.js"></script>
    <script src="../script.js"></script>
</body>
</html>

<?php endforeach;
    }else{
        header("Location: ../index.php");
    }

?>