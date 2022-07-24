<div id="floor_plans" class="displays">
    <h3>Store plans</h3>
    <div class="plans">
        <?php
            $get_plans = $connectdb->prepare("SELECT * FROM plans ORDER BY plan");
            $get_plans->execute();
            $planss = $get_plans->fetchAll();
            foreach($planss as $plans):
        ?>
        <div class="store_plan">
            <?php
                $get_package = $connectdb->prepare("SELECT * FROM plan_package WHERE plan = :plan ORDER BY package");
                $get_package->bindvalue("plan", $plans->plan_id);
                $get_package->execute();
                $packagess = $get_package->fetchAll();
                foreach($packagess as $packages):
            ?>
            <div class="packages">
                <h5><?php echo $plans->plan?></h5>
                <h2><?php echo $packages->package?></h2>
                <p><strong>Duration:</strong> <?php echo $packages->duration . " days"?></p>
                <h4>Features:</h4>
                <p><?php echo $packages->features?></p>
                <h4 class="allFeats"><?php echo "₦".number_format($packages->package_price, 2, ".");?></h4>
                <a href="javascript:void(0)" title="Select this plan" class="page_navs" data-page="addCategories">Get Plan <i class="fas fa-paper-plane"></i></a>
            </div>
            <?php endforeach?>
        </div>
        <?php endforeach?>
    </div>
</div>