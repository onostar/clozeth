<div id="highestSelling" class="allResults displays">
    <div class="select_date">
        <form action="search_highest.php" method="POST">
            <div class="from_to_date">
                <label>Select From Date</label><br>
                <input type="date" name="highest_from_date" id="highest_from_date"><br>
            </div>
            <div class="from_to_date">
                <label>Select to Date</label><br>
                <input type="date" name="highest_to_date" id="highest_to_date"><br>
            </div>
            <button type="submit" name="search_highest" id="search_highest">Search</button>
        </form>
    </div>
    <div class="new_highest_data">
        <h2>Todays' Top selling Items</h2>
        <hr>
    
        <div class="search">
            <input type="search" id="searchHighestItems" placeholder="Enter keyword">
        </div>
        <table id="highestItemsTable">
        
            <thead>
                <tr>
                    <td>S/N</td>
                    <td>item</td>
                    <td>Qty</td>
                    <td>Unit Price</td>
                    <td>Total Amount</td>
                    
                    <td>Date</td>
                </tr>
            </thead>

            <?php
                $n = 1;
                $select_items = $connectdb->prepare("SELECT item_name, item_price, delivery_date, SUM(quantity) AS total_quantity, SUM(item_price) AS total_amount FROM orders WHERE company = :company AND order_status = 1 AND delivery_date = CURDATE() GROUP BY item_name ORDER BY total_quantity DESC");
                $select_items->bindvalue('company', $user->exhibitor_id);
                $select_items->execute();
        
                $rows = $select_items->fetchAll();
                foreach($rows as $row):
                    
            ?>
            <tbody>
                <tr>
                    <td style="text-align:center;"><?php echo $n?></td>
                    <td><?php echo $row->item_name?></td>
                    <td style="text-align:center;"><?php echo $row->total_quantity?></td>
                    <td>₦ <?php $get_price = $connectdb->prepare("SELECT * FROM menu WHERE item_name = :item_name");
                    $get_price->bindvalue("item_name", $row->item_name);
                    $get_price->execute();
                    $prices = $get_price->fetchAll();
                    foreach($prices as $price){
                        echo number_format($price->item_prize, 2);
                    }?></td>
                    <td>₦ <?php echo number_format($row->total_amount, 2)?></td>
                    <td><?php echo date("jS M, Y", strtotime($row->delivery_date))?></td>
                    
                </tr>
                
            </tbody>
            <?php $n++; endforeach;?>
            
        </table>
        
        
        <?php 
            $check_order = $select_items->rowCount();
            if(!$check_order){
            echo "<p style='font-weight:bold; color:chocolate; text-transform:capitalize; font-size:1.3rem; text-align:center; margin-top:10px;'>No record found!</p>";
        }
        /* if($select_items){
                $totalAmount = $connectdb->prepare("SELECT SUM(item_price) AS total_price FROM orders WHERE order_status = 1 AND delivery_date = CURDATE()");
                $totalAmount->execute();

                $amounts = $totalAmount->fetchAll();
                foreach($amounts as $amount){
                    echo "<p style='color:green; font-size:1.3rem; text-align:right; text-decoration:underline; font-weight:bold; margin-top:30px;'>Total = ₦ ". number_format($amount->total_price, 2) . "</p>";
                }
            } */
        
        ?>
    </div>
</div>