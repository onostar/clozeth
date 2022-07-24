<div id="customers" class="displays allResults">
    <h2>My Customers</h2>
    <hr>
    <div class="search">
        <input type="search" id="searchCustomers" placeholder="Enter keyword">
    </div>
    <table id="customersTable">
    
        <thead>
            <tr>
                <td>S/N</td>
                <td>Customer</td>
                <td>Phone</td>
                <td>address</td>
            </tr>
        </thead>

        <?php
            $n = 1;
            $select_order = $connectdb->prepare("SELECT shoppers.first_name, shoppers.last_name, shoppers.email, shoppers.address, shoppers.city, shoppers.phone_number, orders.order_id, orders.customer_email, orders.item_name, orders.quantity, orders.item_price, orders.company, orders.order_date, orders.order_status, orders.order_time FROM shoppers, orders WHERE orders.company = :company AND shoppers.email = orders.customer_email GROUP BY shoppers.email AND orders.order_status = 1 ORDER BY orders.order_time DESC");
            $select_order->bindvalue('company', $user->exhibitor_id);
            $select_order->execute();
    
            $rows = $select_order->fetchAll();
            foreach($rows as $row):
        ?>
        <tbody>
            <tr>
                <td style="color:red; text-align:center;"><?php echo $n?></td>
                <td><?php echo $row->first_name . " " . $row->last_name?></td>
                <td><?php echo $row->phone_number?></td>
                <td><?php echo $row->address . ", " . $row->city;?></td>
                
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