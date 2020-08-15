<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/checkAuth.php';

if (isLoggedIn()) $id = isLoggedIn()->userId;
else header("Location:sign.php");
require_once $_SERVER['DOCUMENT_ROOT'] . '/sharedViews/head.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/utils/sharedMethods.php';
?>
<link rel="stylesheet" href="assets/css/header.css">
<link rel="stylesheet" href="assets/css/sidebar.css">
<link rel="stylesheet" href="assets/css/admin.css">
<link rel="stylesheet" href="assets/css/order.css">
<title>Admin panel</title>
</head>
<body>
<input type="checkbox" id="check">
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/views/admin/adminHeader.php" ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/views/admin/adminSidebar.php" ?>
<div class="content">
    <div class="content__wrapper">
        <?php
        $urls =
            array(
                '/admin.php?addUsers=true',
                '/admin.php?products=true',
                '/admin.php?addProducts=true',
                '/admin.php?editProducts=true',
                '/admin.php?orderList=true'
            );
        $id = -1;
        for ($i = 0; $i < count($urls); $i++) {
            if (isCurrentUrl($urls[$i])) {
                $id = $i;
            }
        }
        if ($id === -1) {
            require_once $_SERVER['DOCUMENT_ROOT'] . '/views/admin/products.php';
        } else {
            $name = explode('=', explode('?', $urls[$id])[1])[0];
            require_once $_SERVER['DOCUMENT_ROOT'] . '/views/admin/' . $name . '.php';
        }
        ?>
    </div>
</div>
<script src="assets/js/index.js"></script>
<?php require_once "sharedViews/end.php" ?>
