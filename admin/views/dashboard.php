<div id="dashboard">
                    
    <div class="cards" id="card2">
        <a href="javascript:void(0)">
            <p>Store status</p>
            <div class="infos">
                <?php
                    $get_status = $connectdb->prepare("SELECT payment_status FROM exhibitors WHERE company_email = :company_email");
                    $get_status->bindvalue("company_email", $username);
                    $get_status->execute();
                    $stat = $get_status->fetch();
                    if($stat->payment_status == 1){
                        echo "<i class='fas fa-spinner'></i>";
                    }elseif($stat->payment_status == 2){
                        echo "<i class='fas fa-check'></i>";
                    }else{
                        echo "<i class='fas fa-ban'></i>";
                    }
                ?>
                
                <p>
                    <?php
                        
                        if($stat->payment_status == 1){
                            echo "Processing";
                        }elseif($stat->payment_status == 2){
                            echo "Approved";
                        }else{
                            echo "Pending";
                        }

                        
                    ?>
                </p>
            </div>
        </a>
    </div> 
    <div class="cards" id="card4">
        <a href="javascript:void(0)" class="page_navs" data-page="orderList">
            <p>Incoming Orders</p>
            <div class="infos">
                <i class="fas fa-cart-arrow-down"></i>
                <p>
                <?php
                    $orders = $connectdb->prepare("SELECT * FROM orders WHERE company = :company AND order_status = 0");
                    $orders->bindvalue('company', $user->exhibitor_id);
                    $orders->execute();
                    echo $orders->rowCount();
                ?>
                </p>
            </div>
        </a>
    </div> 
    <div class="cards" id="card5">
        <a href="javascript:void(0)" class="page_navs" data-page="confirmDelivery">
            <p>Pending Delivery</p>
            <div class="infos">
                <i class="fas fa-truck"></i>
                <p>
                <?php
                    $orders = $connectdb->prepare("SELECT * FROM orders WHERE company = :company AND order_status = 2");
                    $orders->bindvalue('company', $user->exhibitor_id);
                    $orders->execute();
                    echo $orders->rowCount();
                ?>
                </p>
            </div>
        </a>
    </div> 
    
</div>