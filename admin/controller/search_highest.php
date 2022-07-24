<?php

    include "connections.php";
    session_start();
    if(isset($_SESSION['my_company'])){
        $company = $_SESSION['my_company'];
    }
    
    $from_date = $_POST['highest_from_date'];
    $to_date = $_POST['highest_to_date'];

    $select_items = $connectdb->prepare("SELECT item_name, item_price, delivery_date, SUM(quantity) AS total_quantity, SUM(item_price) AS total_amount FROM orders WHERE company = :company AND order_status = 1 AND delivery_date BETWEEN '$from_date' AND '$to_date' GROUP BY item_name ORDER BY total_quantity DESC");
    
    $select_items->bindvalue('company', $company);
    $select_items->execute();

    
    
?>  
    <?php echo "<h2>Highest Selling Items between '" . date('jS M, Y', strtotime($from_date)) . "' and '" . date('jS M, Y', strtotime($to_date)) ."'</h2>;"?>
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
        if($select_items){
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
        
        }
        ?>

    