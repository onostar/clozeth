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
                        <p class="chats">Hi. This is customer service<br> Welcome to Clozeth. Your online stop shop for all things fashion, skin care and accessories. How may we be of service today?</p>
                        
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
                        <p class="chats"><?php echo $chat->messages?><br><span style="color:rgb(238, 238, 238); font-size:.rem; float:right"><?php echo date("M jS, h:ia", strtotime($chat->chat_time))?></span></p>
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