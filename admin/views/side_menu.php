<aside class="main_menu" id="mobile_log">
    <div class="login">
        <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
        <div class="login_option">
            
            <div>
                <button id="loginBtn"><a href="../controller/exh_logout.php">Log out <i class="fas fa-power-off"></i></a></button>
                
            </div>
        </div>
    </div>
    <nav>
        <h3><a href="exhibitors.php" title="Home"><i class="fas fa-home"></i> Dashboard</a></h3>
        <ul>        
            <?php
                
                if($user->payment_status == 0){
            ?>
            <li><a href="javascript:void(0);" id="storePlans" title="select store plans" class="page_navs" data-page="floor_plans"><i class="fas fa-building"></i> View store Plans</a></li>
            <li><a href="javascript:void(0);" id="addCat" title="Upload payment" class="page_navs" data-page="addCategories"><i class="fas fa-money-check-alt"></i> Make payment</a></li>
            <?php }?>
            <?php
                if($user->payment_status == 2){
            ?>
            <li><a href="javascript:void(0);" class="addMenu" title="set up your store"><i class="fas fa-store"></i> Manage store <i class="fas fa-chevron-down more_option"></i></a>
                <ul class="nav1Menu">
                    <li><a href="javascript:void(0);" id="addHot" title="Add items" class="page_navs" data-page="add_items"><i class="fas fa-folder-plus"></i>Add Items </a></li>
                    <li><a href="javascript:void(0);" id="addBan" title="Store bnners" class="page_navs" data-page="addBanner"><i class="fas fa-images"></i>Update Banners </a></li>
                    <li><a href="javascript:void(0);" id="addpri" title="Manage item prices" class="page_navs" data-page="managePrice"><i class="fas fa-tags"></i>Item prices </a></li>
                    <!-- <li><a href="javascript:void(0);" id="delItem" title="Delete item from store" class="page_navs" data-page="deleteItems"><i class="fas fa-trash"></i>Delete Item </a></li> -->
                    <li><a href="javascript:void(0);" id="itemsBtn" class="page_navs" data-page="itemList"><i class="fas fa-list"></i> Item list</a></li>

                </ul>
            </li>
            <?php }?>
            
            <li><a href="javascript:void(0);" class="addExh" title="Manage orders & deliveries"><i class="fas fa-shopping-cart"></i> Manage orders <i class="fas fa-chevron-down more_option"></i></a>
                <ul class="nav2Menu">
                    <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="orderList"><i class="fas fa-cart-arrow-down"></i> Pending Orders </a></li>
                    <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="confirmDelivery"><i class="fas fa-truck"></i> Confirm Delivery </a></li>
                    <li><a href="javascript:void(0);" class="page_navs" data-page="cancelledOrders"><i class="fas fa-plane-slash" title="View Cancelled orders"></i> Cancelled orders </a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="page_navs" data-page="deliveryList"><i class="fas fa-coins"></i> Sales Reports </a></li>
            <li><a href="javascript:void(0);" class="page_navs" data-page="customers"><i class="fas fa-users" title="View Customers"></i> Customer List </a></li>
            <li><a href="javascript:void(0);" class="page_navs" data-page="highestSelling"><i class="fas fa-chart-line" title="View Highest & lowest selling items"></i> Highest selling items </a></li>
            <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="profile"><i class="fas fa-user-cog"></i> Update profile</a></li>
            <li><a href="javascript:void(0);" class="page_navs" data-page="helpCenter"><i class="fas fa-question-circle"></i> Help centre</a></li>
        </ul>
    </nav>
</aside>
<aside class="mobile_menu" id="mobile_log">
    <div class="login">
        <button id="loginDiv"><i class="far fa-user"></i> <?php echo $user->contact_person?> <i class="fas fa-chevron-down"></i></button>
        <div class="login_option">
            <div>
                <a class="password_link page_navs" href="javascript:void(0)" data-page="update_password">Change password <i class="fas fa-key"></i></a>
                <button id="loginBtn"><a href="../controller/logout.php">Log out <i class="fas fa-power-off"></i></a></button>
                
            </div>
        </div>
    </div>
    <nav>
        <h3><a href="user.php" title="Home" class="user_mobile">
            <i class="fas fa-shop"></i> <span><?php 
                echo "<a target='_blank' href='../../view/exhibitor_menu.php?company=".$user->reg_number."'>Visit store</a>";
            ?></span>
        </a></h3>
        <ul>        
        <?php
                
                if($user->payment_status == 0){
            ?>
            <li><a href="javascript:void(0);" id="storePlans" title="select store plans" class="page_navs" data-page="floor_plans"><i class="fas fa-building"></i> View store Plans</a></li>
            <li><a href="javascript:void(0);" id="addCat" title="Upload payment" class="page_navs" data-page="addCategories"><i class="fas fa-money-check-alt"></i> Make payment</a></li>
            <?php }?>
            <?php
                if($user->payment_status == 2){
            ?>
            <li><a href="javascript:void(0);" class="addMenu" title="set up your store"><i class="fas fa-store"></i> Manage store <i class="fas fa-chevron-down more_option"></i></a>
                <ul class="nav1Menu">
                    <li><a href="javascript:void(0);" id="addHot" title="Add items" class="page_navs" data-page="add_items"><i class="fas fa-folder-plus"></i>Add Items </a></li>
                    <li><a href="javascript:void(0);" id="addBan" title="Store bnners" class="page_navs" data-page="addBanner"><i class="fas fa-images"></i>Update Banners </a></li>
                    <li><a href="javascript:void(0);" id="addpri" title="Manage item prices" class="page_navs" data-page="managePrice"><i class="fas fa-tags"></i>Item prices </a></li>
                    <!-- <li><a href="javascript:void(0);" id="delItem" title="Delete item from store" class="page_navs" data-page="deleteItems"><i class="fas fa-trash"></i>Delete Item </a></li> -->
                    <li><a href="javascript:void(0);" id="itemsBtn" class="page_navs" data-page="itemList"><i class="fas fa-list"></i> Item list</a></li>

                </ul>
            </li>
            <?php }?>
            
            <li><a href="javascript:void(0);" class="addExh" title="Manage orders & deliveries"><i class="fas fa-shopping-cart"></i> Manage orders <i class="fas fa-chevron-down more_option"></i></a>
                <ul class="nav2Menu">
                    <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="orderList"><i class="fas fa-cart-arrow-down"></i> Pending Orders </a></li>
                    <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="confirmDelivery"><i class="fas fa-truck"></i> Confirm Delivery </a></li>
                    <li><a href="javascript:void(0);" class="page_navs" data-page="cancelledOrders"><i class="fas fa-plane-slash" title="View Cancelled orders"></i> Cancelled orders </a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="page_navs" data-page="deliveryList"><i class="fas fa-coins"></i> Sales Reports </a></li>
            <li><a href="javascript:void(0);" class="page_navs" data-page="customers"><i class="fas fa-users" title="View Customers"></i> Customer List </a></li>
            <li><a href="javascript:void(0);" class="page_navs" data-page="highestSelling"><i class="fas fa-chart-line" title="View Highest & lowest selling items"></i> Highest selling items </a></li>
            <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="profile"><i class="fas fa-user-cog"></i> Update profile</a></li>
            <li><a href="javascript:void(0);" class="page_navs" data-page="helpCenter"><i class="fas fa-question-circle"></i> Help centre</a></li>
        </ul>
    </nav>
</aside>