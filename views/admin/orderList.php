<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/database/order.php';
    $orders = getOrderList();
?>

<?php

if(count($orders) !== 0){ ?>
<table class = "table">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile number</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($orders as $order){
                ?>
                <tr class = "table__row">
                    <td class = "table__col"><?= $order->id ?></td>
                    <td class = "table__col"><?= $order->name ?></td>
                    <td class = "table__col"><?= $order->email ?></td>
                    <td class = "table__col"><?= $order->number ?></td>
                    <td data-id = "<?=$order->id?>" class = "deleteOrder"><i class="far fa-trash-alt" style = "color:red;cursor:pointer;"></i></td>
                </tr>
                <?php
        }
        ?>
    </tbody>
</table>
<?php }else { ?>
    <div class = "empty">No orders yet</div>
<?php }?>
