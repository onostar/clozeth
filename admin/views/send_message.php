<?php
    session_start();
    require "../controller/connections.php";
    if(isset($_SESSION['user'])){
        $username = $_SESSION['user'];
        /* get user_id */
        /* $get_id = $connectdb->prepare("SELECT user_id FROM users WHERE user_email = 
        :user_email");
        $get_id->bindvalue("user_email", $username);
        $get_id->execute();
        $user_id = $get_id->fetch();
        $user = $user_id->user_id; */
        if(isset($_GET['recipient'])){
            $recipient = $_GET['recipient'];
        }

        
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Clozeth is an online platform made for the purpose of ordering fashion wears, men and women clothing, bed sheets, jewellries, etc from all kinds of retailers and wholesalers in Nigeria and Abroad from whereever you are through your mobile phone, tablet or pc">
    <meta name="keywords" content="Fashion, fashion store, clothings, men, women, men wears, women wears, jewellry, jewellries, rings, earings, wrist watch, eye glass, glass, shoes, order, ordering">
    <title>Clozeth | Admin - Send DM</title>
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
        
        <header>
            <h1 class="logo">
                <a href="admin.php" title="Allied irish bank">
                    <img src="../images/aib_logo.png" alt="Logo" class="img-fluid">
                </a>
            </h1>
            <div class="search" id="admin_search">
                <form class="form-inline" method="POST">
                    <input type="search" name="search_items" placeholder="search members, reg_number, search phone number" id="search_items">
                    <button type="submit" name="searchBtn" id="searchBtn" class="main_searchbtn">Search <i class="fas fa-search"></i></button>
                    <button type="submit" name="searchBtn" id="searchBtn" class="mobilesearchbtn" ><i class="fas fa-search"></i></button>
                </form>
                
            </div>
            <div class="other_menu">
                <a href="#" title="Our Gallery">Admin Portal</a>
            </div>
            <div class="login">
                <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
                <div class="login_option">
                    <div>
                        <button id="loginBtn"><a href="../controller/logout.php"><i class="fas fa-power-off"></i>Log out</a></button>
                    </div>    
                </div>
            </div>
            <div class="cart" id="user_data">
                <a href="javascript:void(0);" id="user_name">
                     <span>Hello, Admin</span> 
                    <div class="user_img">
                        <i class="fas fa-user-tie"></i>
                    </div>
                </a>
            </div>
            <div class="menu_icon">
                <a href="javascript:void(0)"><i class="fas fa-bars"></i></a>
            </div>
        </header>
    <section id="chat_box">
        <!-- Send broadcast message -->
        <div id="broadcasts">
        
        <button id="go_back" onclick="window.close()">Go back <i class="fas fa-arrow-left"></i></button>
        <div class="add_user_form" id="single_mess">
            <h3>Send message to individuals</h3>
            <form method="POST">
                <div class="inputs">
                    <div class="data">
                        <input type="hidden" name="sender" id="sender" vaue="Admin">
                        
                        <select name="recipient" id="recipient">
                        
                            <option value="<?php echo $recipient?>" selected>Choose recipient</option>
                            <?php
                                $get_rec = $connectdb->prepare("SELECT * FROM exhibitors WHERE company_email != 'Admin@clozeth.com'");
                                $get_rec->execute();
                                $recs = $get_rec->fetchAll();
                                foreach($recs as $rec):
                            ?>
                            <option value="<?php echo $rec->exhibitor_id?>"><?php echo $rec->company_name?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    
                </div>
                
                    <div class="data" style="width:100%;">
                        <label for="ind_message">Message</label><br>
                        <textarea name="messages" id="messages" cols="50" rows="5"></textarea>
                    </div>
                
                <button type="submit" class="submit_chat" id="submit_chat" name="submit_chat">Send Message <i class="fas fa-paper-plane"></i></button>
            </form>
        </div>
    </div>
    </section>
        
        
        
    </main>
   
    <div id="chat">
        <div class="chat_icon" title="Live chat">
            <p class="live_box">Start Live Chat <i class="fas fa-comments"></i></p> 
        </div>
        <div class="chat_close" title="Close chat">
            <p class="live_box">Close Live Chat <i class="fas fa-comment-slash"></i></p> 
        </div>
            <div class="chat_message">
                <h2>Live Chat <i class="far fa-comment"></i></h2>
                <div class="all_chat">
                    
                    
                    <div id="chat2">
                        <?php
                            $get_chats = $connectdb->prepare("SELECT * FROM chats ORDER BY chat_time");
                            $get_chats->execute();
                            $chats = $get_chats->fetchAll();
                            foreach($chats as $chat):
                        ?>
                        <div class="main_chats">
                            <div class="sender">
                                <i class="fas fa-user-tie"></i>
                                
                                <p><a href="javascript:void(0)" title="Send private message" onclick="sendDm('<?php echo $chat->sender?>')">
                                    <?php
                                        $get_sender = $connectdb->prepare("SELECT * FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
                                        $get_sender->bindvalue("exhibitor_id", $chat->sender);
                                        $get_sender->execute();
                                        $senders = $get_sender->fetchAll();
                                        foreach($senders as $sender){
                                            echo $sender->company_name;
                                        }
                                        if(!$get_sender->rowCount() > 0){
                                            echo "Admin";
                                        }
                                    ?>
                                    </a>
                                </p>
                            </div>
                            <p class="chats"><?php echo $chat->messages?><br><span style="color:rgb(238, 238, 238); font-size:.rem; float:right"><?php echo date("M jS, h:ia", strtotime($chat->chat_time))?></span></p>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
                
                 <!-- <form action="" method="POST" id="chat_box">
                    <input type="text" name="messages" id="messages" placeholder="Type your message here">
                    <input type="hidden" name="recipient" id="recipient"value="admin">
                    <input type="hidden" name="sender" id="sender" value="Admin">
                    <button type="submit" id="submit_chat" name="submit_chat" title="Send"><i class="fas fa-paper-plane"></i></button>
                 </form> -->   
                    
                
            </div>
        </div>
        <script src="../jquery.js"></script>
    <script src="../script.js"></script>
    <script>
        setInterval(function() {
            $("#chat2").load("send_message.php #chat2");
            let d = $(".all_chat");
            d.scrollTop(d.prop("scrollHeight"));
        }, 3000);
        
    </script>
</body>
</html>

<?php 
                
    }else{
        header("Location: ../index.php");
    }
?>