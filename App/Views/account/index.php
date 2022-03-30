<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CamelStore | Ecommerce Website Desgin</title>
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/input.css">
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/style.css">
    <link rel="icon" href="<?= PUBLIC_URL ?>/img/camel-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- header -->
    <?php require_once(VIEW . '/shared/header.php') ?>
    <!-- account page -->
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="<?= PUBLIC_URL ?>/img/image1.png" alt="account" width="100%">
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <?php (!isset($data['errorAu'])) ? "onload='login()'" : "onclick='login()'" ?>
                            <span onclick="login()"><b>Đăng nhập</b></span>
                            <span onclick="register()"><b>Đăng <br> ký</b></span>
                            <hr id="Indicator">
                        </div>

                        <form id="LoginForm" action="<?= DOCUMENT_ROOT ?>/account/authentication" method="post">
                            <?php if (isset($data['errorAu'])) : ?>
                                <?php foreach ($data['errorAu'] as $index => $error) : ?>
                                    <p style="color: red; font-size: 10px"><?= $error ?></p>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <input name="email" type="text" placeholder="Email" required autofocus>
                            <input name="password" type="password" placeholder="Mật khẩu" required>
                            <button type="submit" class="btn">Đăng nhập</button>
                            <a href="">Bạn không có tài khoản vui lòng đăng ký</a> <br>
                            <a href="">Quên mật khẩu</a>
                        </form>


                        <form id="RegForm" action="<?= DOCUMENT_ROOT ?>/account/signup" method="post">
                            <?php if (isset($data['error'])) : ?>
                                <?php foreach ($data['error'] as $index => $error) : ?>
                                    <p style="color: red; font-size: 10px"><?= $error ?></p>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if (isset($data['message'])) : ?>
                                <p style="color: blue; font-size: 10px"><?= $data['message'] ?></p>
                            <?php endif; ?>
                            <input onkeyup="checkValidEmail();" name="email" type="email" placeholder="Email" required id="email">
                            <p id="emailMessage"></p>
                            <input name="name" type="text" placeholder="Tên" required>
                            <input name="password" type="password" placeholder="Mật khẩu" required>
                            <input name="confirmPassword" type="password" placeholder="Nhập lại mật khẩu" required>
                            <button type="submit" class="btn">Đăng ký</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php require_once(VIEW . '/shared/footer.php') ?>

    <!-- js for toggle nemu -->
    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px";
            } else {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>

    <!-- js for toggle form -->
    <script>
        var LoginForm = document.getElementById("LoginForm");
        var RegForm = document.getElementById("RegForm");
        var Indicator = document.getElementById("Indicator");

        function register() {
            RegForm.style.transform = "translateX(0px)";
            LoginForm.style.transform = "translateX(0px)";
            Indicator.style.transform = "translateX(100px)";
        }

        function login() {
            RegForm.style.transform = "translateX(300px)";
            LoginForm.style.transform = "translateX(300px)";
            Indicator.style.transform = "translateX(0px)";
        }
    </script>
    <!-- js for check Valid user -->
    <!-- <script>
    function checkValidEmail(){
        var emailInput = new document.getElementById('email');

        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText === "true"){
                    document.getElementById('emailMessage').innerText = "Email is valid";
                    document.getElementById('emailMessage').style.color = "green";
                } else if(this.responseText === "false"){
                    document.getElementById('emailMessage').innerText = "Email already exists";
                    document.getElementById('emailMessage').style.color = "red";
                } else {
                       document.getElementById('emailMessage').innerText = "";
                }
            }
        }
        xhttp.open("GET", "<?= DOCUMENT_ROOT ?>/account/checkValidEmail?email=" + emailInput.value, true);
        xhttp.send();
    }
    </script> -->
</body>

</html>