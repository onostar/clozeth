<?php
    require "../controller/server.php";
    session_start();
    $_SESSION['current_page'] = $_SERVER['REQUEST_URI'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
                echo $view->first_name . " " . $view->last_name. " - Report product";
            }else{
                echo "Clozeth | Report Product";
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

    <main>
        <section id="help_center">
            <div class="help_logo">
                <i class="fas fa-headset"></i>
                <h3>HELP<span>Center</span></h3>
            </div>
            <h2>Report a product or issue</h2>
            <div class="report_form">
                <p class="help_p">Please fill out the report form</p>

                <form action="../controller/report_issue.php" method="POST">
                    <div class="inputs">
                        <div class="data">
                            <label>Full Name*</label>
                            <input type="text" name="full_name" id="full_name" placeholder="James Johnson" required>
                        </div>
                        <div class="data">
                            <label>Phone Number*</label>
                            <input type="tel" name="phone_number" id="phone_number" placeholder="07012345678" required>
                        </div>
                        <div class="data">
                            <label>Email Address*</label>
                            <input type="email" name="email_address" id="email_address" placeholder="mail@example.com" required>
                        </div>
                        <div class="data">
                            <label>Reason for report</label>
                            <select name="reason" id="reason" required>
                                <option value="" selected>Select reason for report</option>
                                <option value="Product is prohibited or probably a banned product">Product is prohibited or probably a banned product</option>
                                <option value="Product appears counterfeit">Product appears counterfeit</option>
                                <option value="Product description is misleading">Product description is misleading</option>
                                <option value="Inappropriate content">Inappropriate content</option>
                                <option value="Other reasons">Other reasons</option>
                            </select>
                        </div>
                        <div class="data">
                            <label>Company</label>
                            <select name="company" id="company" required>
                                <option value=""Selected>Select Company</option>
                                <?php
                                    $get_company = $connectdb->prepare("SELECT * FROM exhibitors WHERE company_name != 'Admin'");
                                    $get_company->execute();
                                    $companys = $get_company->fetchAll();
                                    foreach($companys as $company):
                                    
                                ?>
                                <option value="<?php echo $company->company_name?>"><?php echo $company->company_name?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                        <div class="data">
                            <label>Product name*</label>
                            <input type="text" name="item_name" id="item_name" placeholder="name of the reported product" required>
                        </div>
                        <div class="data">
                            <label>Details of report*</label>
                            <textarea name="description" id="description" cols="30" rows="5" placeholder="Give a proper description of your complaint" required></textarea>
                        </div>
                        <button type="submit" name="send_report">Submit <i class="fas fa-paper-plane"></i></button>
                    </div>
                </form>
            </div>
        </section>
        
    </main>
    <?php include "footer.php"?>
    <script src="../controller/jquery.js"></script>
    <script src="../controller/script.js"></script>
    
</body>
</html>
