<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/styleAdmin.css">
</head>

<body>
    <div class="center">
        <div class="container">
            <div class="text">Login Form</div>
            <form action="<?= DOCUMENT_ROOT ?>/admin/login/authentication" method="post" enctype="multipart/form-data">
                <div class="data">
                    <label for=""><b>Tên đăng nhập:</b> admin@gmail.com</label>
                    <input name="email" type="text" required>
                </div>
                <div class="data">
                    <label for=""><b>Password:</b> 123</label>
                    <input name="password" type="password" required>
                </div>
                <div class="btn">
                    <div class="inner"></div>
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>