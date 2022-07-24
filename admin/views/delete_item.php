<div id="deleteItems" class="displays allResults">
                
    <h2>Delete item from store</h2>
        <hr>
        <div class="search">
            <input type="search" id="searchDel" placeholder="Enter keyword">
        </div>
        <table id="del_table">
            <thead>
                <tr>
                    <td>S/N</td>
                    <td>Category</td>
                    <td>Item name</td>
                    <td>Action</td>
                    
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
                    <td>
                        <form method="POST" class="del_item_form">
                            <input type="hidden" name="company_id" id="company_id" value="<?php echo $user->exhibitor_id?>">        
                            <input type="hidden" name="itemToDelete" id="itemToDelete" value="<?php echo $row->item_id?>">        
                            <button type="submit" name="delete_item" id="deleteItemsBtn" title="delete item"><i class="fas fa-trash"></i></a></button>
                        </form>
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