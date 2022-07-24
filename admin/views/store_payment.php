<?php
    if($user->payment_status != 2 || $user->payment_status != 1):
?>
<div id="addCategories" class="displays">
    <?php
        $get_booth_status = $connectdb->prepare("SELECT * FROM exhibitors WHERE exhibitor_id = :exhibitor_id");
        $get_booth_status->bindvalue("exhibitor_id", $user->exhibitor_id);
        $get_booth_status->execute();
        $statuss = $get_booth_status->fetchAll();
        foreach($statuss as $status){
            if($status->payment_status == 2){
            
        
    ?>
    <div class="add_user_form" id="booth_det">
        <?php
            $get_boothId = $connectdb->prepare("SELECT * FROM plans WHERE plan_id = :plan_id");
            $get_boothId->bindvalue("plan_id", $status->plan);
            $get_boothId->execute();
            $booths = $get_boothId->fetchAll();
            foreach($booths as $booth):
        ?>
        <h3>Your plan details</h3>
        <div class="inputs">
                
            <div class="data">
                <h2><?php echo $booth->plan?></h2>
            </div>
            <?php 
                $get_package = $connectdb->prepare("SELECT package FROM plan_package WHERE plan = :plan");
                $get_package->execute();
                $booth = $get_package->fetch();
            ?>
            <div class="data">
                <p>(<?php echo $booth->package?>)</p>
            </div>
        </div>
        <?php endforeach?>
    </div>
    <?php 
        }elseif($status->payment_status == 1){
            echo "<p class='alert'>Your store request is still under propagation. Kindly await approval!</p>";
        }else{
    ?>
    <div class="info"></div>
    <div class="add_user_form">
        <h3>Select store package with payment</h3>
        <form method="POST"  id="addCatForm" action="../controller/upload_exh_payment.php" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $user->exhibitor_id?>" name="exhibitor_id">
            <div class="inputs">
                
                <div class="data booth_type">
                    <label for="store_plans">Select plans</label>
                    <select name="store_plans" id="store_plans">
                        <option value=""selected>Select Plan</option>
                        <?php
                            $get_plan = $connectdb->prepare("SELECT * FROM plans ORDER BY plan");
                            $get_plan->execute();
                            $planss = $get_plan->fetchAll();
                            foreach($planss as $plans):
                        ?>
                        <option value="<?php echo $plans->plan_id;?>"><?php echo $plans->plan;?></option>
                        <?php endforeach?>
                    </select>
                </div>
                <div class="data">
                    <label for="package">Choose package</label>
                    <select name="package_id" id="package_id">
                        <option value=""selected>select plan first</option>
                    </select>
                </div>
                
            </div>
            <div class="inputs" id="price">
                
            </div>
            <div class="inputs">
                <div class="data">
                    <label for="payment">Upload Payment Slip</label>
                    <input type="file" name="payment" id="payment" required>
                </div>
                <div class="data">
                    <button type="submit" id="add_booth_pay" name="add_booth_pay">Upload payment <i class="fas fa-upload"></i></button>
                </div>
            </div>
            
        </form>
    </div>
    <?php
            }
        }
    ?>
</div>
<?php endif?>