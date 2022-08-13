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
                <td>Phone No.</td>
                <td>item</td>
                <td>Qty</td>
                <td>Amount</td>
                <td>Address</td>
                <td>Payment</td>
                <td>Date</td>
                <td>Action</td>
            </tr>
        </thead>

        <?php
            $n = 1;
            $select_order = $connectdb->prepare("SELECT shoppers.first_name, shoppers.last_name, shoppers.email, shoppers.address, shoppers.city, shoppers.phone_number, orders.order_id, orders.customer_email, orders.item_name, orders.quantity, orders.item_price, orders.company, orders.order_date, orders.order_status, orders.order_time, menu.payment_option FROM shoppers, orders, menu WHERE orders.company = :company AND shoppers.email = orders.customer_email AND orders.item_name = menu.item_name AND orders.order_status = 0 ORDER BY orders.order_time DESC");
            $select_order->bindvalue('company', $user->exhibitor_id);
            $select_order->execute();
    
            $rows = $select_order->fetchAll();
            foreach($rows as $row):
        ?>
        <tbody>
            <tr>
                <td style="color:red; text-align:center;"><?php echo $n?></td>
                <td><?php echo $row->first_name . " " . $row->last_name?></td>
                <td><?php echo "<a href='https://wa.me/+234".$row->phone_number."' title='Chat on whatsapp'>$row->phone_number</a>"?></td>
                <td><?php echo $row->item_name?></td>
                <td><?php echo $row->quantity?></td>
                <td>₦<?php echo number_format($row->item_price)?></td>
                <td><?php echo $row->address . "<br>" . $row->city;?></td>
                <td><?php echo $row->payment_option;?></td>
                <td><?php echo date("jS M, Y", strtotime($row->order_date))?></td>
                <td>
                    <button style="background:transparent; border:none; margin:0 auto;" title="Dispense Item" onclick="dispenseItem('<?php echo $row->order_id?>')"><i class="fas fa-truck" style="color:skyblue; font-size:1rem;" ></i></button>
                    <button style="background:transparent; border:none; margin:0 auto;" title="Cancel Order" onclick="cancelOrder('<?php echo $row->order_id?>')"><i class="fas fa-plane-slash" style="color:red; font-size:1rem;" ></i></button></td>
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