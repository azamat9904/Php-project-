<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/utils/checkAuth.php';

    if(isLoggedIn()) header("Location:admin.php");

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']))
            require_once "utils/sharedMethods.php";
            require_once "database/user.php";

            $email = checkInput($_POST['email']);
            $password = checkInput($_POST['password']);
            $error = '';
            $user = getUserByEmail($email);
            if(!empty($user)){
                if(password_verify($password, $user->password)){
                    setcookie('token',$user->token,time() + 60*60*24);
                    header('Location:admin.php');
                }
            }else{
                $error = "* Email or password is incorrect";
            }
    }
?>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/sharedViews/head.php'; ?>
<title>Shop</title>
<link rel="stylesheet" href="assets/css/signup.css">
</head>
<body>
<main>
    <div class="container">
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" class = "form">
            <h2 class = "form__title">Login</h2>
            <div class="form__content">
                <input type="email" placeholder="Enter your email" name = "email" class = "form__control"/>
                <input type="password" placeholder="Enter your password" name = "password" class = "form__control"/>
                <button type = "submit" class = "btn">Log in</button>
                <div class = "unregistered">
                    <a href="#">Forgot password?</a>
                </div>
                <div class = "error">
                    <span><?=$error ?></span>
                </div>
            </div>
        </form>
    </div>
</main>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/sharedViews/end.php';?>
