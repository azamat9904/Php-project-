<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/database/user.php';
    $id = isLoggedIn()->userId;
    $user = getUserById($id);
    require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/sharedMethods.php';
?>
<div class="sidebar">
    <center class="sidebar__center">
        <img class="sidebar__img" src="assets/images/avatar.png" alt="sidebar image"/>
        <h4><?= $user->name ?></h4>
    </center>
    <a href="index.php"><i class="fas fa-store"></i><span>Shop</span></a>
    <a href="admin.php" class = "<?=isCurrentUrl('/admin.php') ? 'active' : '' ?>"><i class="fas fa-th"></i><span>Products</span></a>
    <a href="admin.php?addProducts=true" class = "<?=isCurrentUrl('/admin.php?addProducts=true') ? 'active' : '' ?>"><i class="fas fa-plus-circle"></i><span>Add Products</span></a>
    <a href="admin.php?editProducts=true" class = "<?=isCurrentUrl('/admin.php?editProducts=true') ? 'active' : '' ?>"><i class="far fa-edit"></i><span>Edit Products</span></a>
    <a href="admin.php?addUsers=true" class = "<?=isCurrentUrl('/admin.php?addUsers=true') ? 'active' : '' ?>"><i class="fas fa-user-plus"></i><span>Add Users</span></a>
    <a href="admin.php?orderList=true" class = "<?=isCurrentUrl('/admin.php?orderList=true') ? 'active' : '' ?>"><i class="fas fa-list-ul"></i><span>Order List</span></a>
</div>