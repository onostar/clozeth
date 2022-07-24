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
                        <textarea rows="4" type="text" name="item_desc" id="item_desc" required placeholder="Give proper description and features of the product"value="<?php
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