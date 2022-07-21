<div id="mobile_menu">
            
    <aside id="asideLeft">
        <div class="login">
            <button id="loginDiv"><i class="far fa-user"></i> <a href="login_page.php">My Account</a> <i class="fas fa-sign-in-alt"></i></button>
        </div>
        <nav id="index_nav">
            <ul>
                <?php if(isset($_SESSION['user'])){
                    echo "";
                    }else{    
                ?>
                <li><a href="../admin/index.php"><i class="fas fa-shop"></i>Become a Seller</a></li>
                <?php }?>
                    <h3>Our Categories</h3>
                    <?php
                        $get_categories = $connectdb->prepare("SELECT * FROM categories ORDER BY category");
                        $get_categories->execute();
                        $cats = $get_categories->fetchAll();
                        foreach($cats as $cat):
                    ?>
                    <li>
                        <form action="view/categories.php" method="POST">
                            <input type="hidden" name="item_cat" value="<?php echo $cat->category_id?>">
                            <?php 
                                if($cat->category == "Bag"){
                                    echo "<i class='fas fa-shopping-bag'></i>";
                                }elseif($cat->category == "Glasses"){
                                    echo "<i class='fas fa-glasses'></i>";
                                }elseif($cat->category == "Beddings"){
                                    echo "<i class='fas fa-bed'></i>";
                                }elseif($cat->category == "Hairs And Wigs"){
                                    echo "<img src='images/hair_wig.png'>";
                                }elseif($cat->category == "Jewelries"){
                                    echo "<img src='images/necklace.png'>";
                                }elseif($cat->category == "Wrist Watches"){
                                    echo "<img src='images/wrist-watch.png'>";
                                }elseif($cat->category == "Shoes"){
                                    echo "<img src='images/sport-shoe.png'>";
                                }elseif($cat->category == "Mens Fashion"){
                                    echo "<img src='images/hawaiian-shirt.png'>";
                                }elseif($cat->category == "Womens Fashion"){
                                    echo "<img src='images/woman-clothes.png'>";
                                }elseif($cat->category == "Kids Fashion"){
                                    echo "<img src='images/baby-clothes.png'>";
                                }else{
                            ?>
                            <i class="fas fa-shopping-cart"></i>
                            <?php }?>
                             <input type="submit" value="<?php echo $cat->category?>" name="check_category">
                        </form> 
                    </li>
                    
                    
                    <?php endforeach;?>
            </ul>
        </nav>
        <hr>
        <nav id="help">
            <ul>
                <li>
                    <a href="contact.php" title="Get in touch">
                        <i class="far fa-question-circle"></i>
                        <div class="note">
                            <h3>Help center</h3>
                            <p>Ask Clozeth</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="about.php" title="Who we are">
                        <i class="fas fa-street-view"></i>
                        <div class="note">
                            <h3>About us</h3>
                            <p>Who we are</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);">
                        <i class="fas fa-hand-holding-usd"></i>
                        <div class="note">
                            <h3>Refunds</h3>
                            <p>Money back guarantee</p>
                        </div>
                    </a>
                </li>                          
                <!-- <li>
                    <a href="javascript:void(0);">
                        <i class="fas fa-hand-holding-usd"></i>
                        <div class="note">
                            <h3>Sell on CLozeth</h3>
                            <p>Show your products to buyers</p>
                        </div>
                    </a>
                </li> -->                          
            </ul>
        </nav>
    </aside>
    
</div>