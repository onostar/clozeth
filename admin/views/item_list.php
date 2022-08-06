<div id="itemList" class="displays allResults">
    <h2>Item List</h2>
        <hr>
        <div class="search">
            <input type="search" id="searchItem" placeholder="Enter keyword">
        </div>
        <table id="item_table">
            <thead>
                <tr>
                    <td>S/N</td>
                    <td>Category</td>
                    <td>Item name</td>
                    <td>Item Link</td>
                    <td>Price</td>
                    <td>Status</td>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    $get_item = $connectdb->prepare("SELECT * FROM menu WHERE company = :company ORDER BY item_name");
                    $get_item->bindvalue("company", $user->exhibitor_id);
                    $get_item->execute();
                    $n = 1;
                    
                    $items = $get_item->fetchAll();

                    foreach($items as $item):
                ?>
                <tr>
                    <td style="text-align:center; color:red"><?php echo $n?></td>
                    <td><?php 
                        $get_cat = $connectdb->prepare("SELECT category FROM categories WHERE category_id = :category_id");
                        $get_cat->bindvalue("category_id", $item->item_category);
                        $get_cat->execute();
                        $cat = $get_cat->fetch();
                        echo $cat->category;
                    ?></td>
                    <td><?php echo $item->item_name;?></td>
                    <td><?php echo "<a href='https://www.clozeth.com.ng/item_info.php?item=".$item->item_id."' target='_blank'>View/copy item</a>";?></td>
                    <td><?php echo "₦ ".number_format($item->item_prize, 2, ".")?></td>
                        
                    <td>
                        <?php
                            if($item->item_status == 0){
                        ?>
                        Available <a href="javascript:void(0);" onclick="disableItem('<?php echo $item->item_id?>')" title="Disable this item"><i class="fas fa-power-off"></i></a>
                        <?php 
                            }else{
                        ?>
                        Disabled <a href="javascript:void(0);" onclick="activateItem('<?php echo $item->item_id?>')" title="Activate this item" style="color:green"><i class="fas fa-toggle-on"></i></a>
                        <?php }?>
                    </td>
                </tr>
                <?php $n++; endforeach;?>
            </tbody>
        </table>
        <?php
            if(!$get_item->rowCount() > 0){
                echo "<p class='no_result'>'No result found!'</p>";
            }
        ?>
    </div>