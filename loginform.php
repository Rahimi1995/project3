<?php
require_once __DIR__ . '/header-singlepage.php'
?>


<body class="login-body">


<div class="container">
    <div class="loginform">
        <?php
        if(!empty($Login_error)):?>
            <div class="error">
                <?php echo implode('<br>',$Login_error);?>
            </div>
        <?php endif;?>
        <form class="form-signin" method="post" action="">
            <h2 class="form-signin-heading">همین حالا وارد شوید</h2>
            <div class="login-wrap">
                <input type="text" id="loginuser" name="username" class="form-control" value="<?php echo (isset($_POST,$_POST['username'])?$_POST['username']:'') ?>" placeholder="نام کاربری" autofocus>
                <input type="password" class="form-control" id="loginpas" name="password" value="<?php echo (isset($_POST,$_POST['password'])?$_POST['password']:'') ?>" placeholder="کلمه عبور">
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> مرا به خاطر بسپار
                    <span class="pull-right"> <a href="#"> کلمه عبور را فراموش کرده اید؟</a></span>
                </label>
<!--                <button class="btn btn-lg btn-login btn-block" type="submit">ورود</button>-->
                <input type="submit" name="submitlogin" value="ورود ">


            </div>

        </form>
    </div>
</div>


</body>
</html>





