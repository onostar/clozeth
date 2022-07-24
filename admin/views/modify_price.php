<div id="managePrice" class="allResults displays">
    <h2>Modify Item Price</h2>
    <hr>
    <div class="info"></div>
    <div class="search">
        <input type="search" id="searchPrice" placeholder="Enter keyword">
    </div>
    <table id="priceTable">
        <thead>
            <tr>
                <td>S/N</td>
                <!-- <td>Restaurant Name</td> -->
                <td>item</td>
                <td>Modify Price</td>
            </tr>
        </thead>

        <?php
            $n = 1;
            $select_itemss = $connectdb->prepare("SELECT * FROM menu WHERE company = :company ORDER BY item_name");
            $select_itemss->bindvalue("company", $user->exhibitor_id);
            $select_itemss->execute();
            
            $rows = $select_itemss->fetchAll();
            foreach($rows as $row):
        ?>
        <tbody>
            <tr>
                <td style="text-align:center;"><?php echo $n?></td>
                
                <td><?php echo $row->item_name?></td>
                <td class="prices">
                    <a href="javascript:void(0)" data-form="check<?php echo $row->item_id?>" class="each_prices"><?php echo "₦ ". number_format($row->item_prize);?></a>
                    <form method="POST" id="check<?php echo $row->item_id?>" class="priceForm" action="../controller/change_price.php">
                        <input type="hidden" name="item_id" id="item_id" value="<?php echo $row->item_id?>">
                        <input type="hidden" name="old_prize" id="old_prize" value="<?php echo $row->item_prize?>">
                        <input type="text" name="item_prize" id="item_prize" title="Click to edit price" value="<?php echo $row->item_prize;?>"><button type="submit" name="change_prize" id="changePrize" class="changePrizes"><i class="fas fa-check"></i></button>
                        <button><a href="javascript:void(0)" class="closeForm"><i class="fas fa-window-close"></i></a></button>
                    </form>
                </td>
            </tr>
        </tbody>

        <?php $n++; endforeach;?>
    </table>
</div>