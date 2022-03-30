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
    <!-- featured products -->
    <div class="small-container">

        <div class="row">
            <?php foreach ($data['categories'] as $index => $category) : ?>
                <div class="col-4">
                    <a href="<?= DOCUMENT_ROOT .  "/products/categories/" . $category['id'] ?>">
                        <img src="<?= IMAGES_CATEGORY_URL ?>/<?= $category['image'] ?>" alt="category">
                        <h4 style="text-align: center; font-size: 18px; line-height: 26px; height: 26px"> <?= $category['name'] ?> </h4>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

    <div class="small-container">
        <!-- Lastest Products -->
        <h2 class="title">Các sản phẩm cùng loại</h2>
        <div class="row">
            <?php if (!empty($data['products'])) : ?>
                <?php foreach ($data['products'] as $index => $product) : ?>
                    <div class="col-4">
                        <a href="<?= DOCUMENT_ROOT .  "/products/details/" . $product['id'] ?>">
                            <img src="<?= IMAGES_PRODUCTS_URL ?>/<?= $product['image1'] ?>" alt="product">
                            <h4> <?= $product['name'] ?> </h4>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <p><?= number_format($product['price'], 0, '', ',') ?>đ</p>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p style="font-size: 20px"> Not found for category </p>
            <?php endif; ?>
        </div>

        <div class="page-btn">
        </div>

    </div>

    <!-- brands -->
    <div class="brands">
        <div class="small-container">
            <div class="row">
                <div class="col-5">
                    <a href="https://kangaroo.vn/" target="_blank"><img src="<?= PUBLIC_URL ?>/img/logo-kangoroo.png" alt="logo"></a>
                </div>
                <div class="col-5">
                    <a href="http://www.delta.com.vn/" target="_blank"><img src="<?= PUBLIC_URL ?>/img/logo-delta.png" alt="logo"></a>
                </div>
                <div class="col-5">
                    <a href="https://tefla.co.za/" target="_blank"><img src="<?= PUBLIC_URL ?>/img/logo-tefla.png" alt="logo"></a>
                </div>
                <div class="col-5">
                    <a href="https://www.electrolux.vn/" target="_blank"><img src="<?= PUBLIC_URL ?>/img/logo-elextrolux.png" alt="logo"></a>
                </div>
                <div class="col-5">
                    <a href="https://sanaky.com.vn/" target="_blank"><img src="<?= PUBLIC_URL ?>/img/logo-sananky.png" alt="logo"></a>
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
</body>

</html>