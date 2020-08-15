<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/utils/checkAuth.php';

    if(isLoggedIn()) $id = isLoggedIn()->userId;
    else header("Location:sign.php");
    require_once $_SERVER['DOCUMENT_ROOT'].'/sharedViews/head.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/utils/sharedMethods.php';
?>
<link rel="stylesheet" href="assets/css/header.css">
<link rel="stylesheet" href="assets/css/sidebar.css">
<link rel="stylesheet" href="assets/css/admin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<title>Admin panel</title>
</head>
<body>
<input type="checkbox" id="check">
<?php require_once $_SERVER['DOCUMENT_ROOT']."/sharedViews/adminHeader.php" ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']."/sharedViews/adminSidebar.php" ?>
<div class="content">
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
        for($i = 0;$i<count($urls);$i++){
            if(isCurrentUrl($urls[$i])){
                $id = $i;
            }
        }
        if($id === -1){
            echo "Home";
        }else{
            $name = explode('=',explode('?',$urls[$id])[1])[0];
            require_once $_SERVER['DOCUMENT_ROOT']."/sharedViews/adminHeader.php";
        }
//       if(isCurrentUrl('/admin.php?addUsers=true')){
//           echo "Users";
//       }else if (isCurrentUrl('/admin.php?products=true')){
//            echo "Product";
//       }else if(isCurrentUrl('/admin.php?addProducts=true')){
//            echo "add Products";
//       }else if(isCurrentUrl('/admin.php?editProducts=true')){
//            echo "edit Products";
//       }else if(isCurrentUrl('/admin.php?orderList=true')){
//            echo "Order list";
//       }else{
//           echo "Home";
//       }
    ?>
</div>
<script src = "assets/js/index.js"></script>
<?php require_once "sharedViews/end.php" ?>
