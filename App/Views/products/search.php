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
        <!-- Lastest Products -->
        <h2 class="title">Sản phẩm</h2>
        <p style="text-align: center; font-size: 20px">Kết quả cho từ khóa tìm kiếm: <b> <?= $data['keyword'] ?> </b> </p>
        <div class="row">
            <?php if (!empty($data['products'])) : ?>
                <?php foreach ($data['products'] as $index => $product) : ?>
                    <div class="col-4">
                        <a href="<?= DOCUMENT_ROOT .  "/products/details/" . $product['id'] ?>">
                            <img src="<?= IMAGES_PRODUCTS_URL ?>/<?= $product['image1'] ?>" alt="product">
                            <h4> <?= $product['name'] ?> </h4>
                            <div class="rating">
                                <?php for ($i=1; $i <= $product['avgStar']; $i++) : ?>
                                    <i class="fa fa-star"></i>
                                <?php endfor;?>

                                <?php for ($i = floor($product['avgStar']); $i < ceil($product['avgStar']); $i++) : ?>
                                    <i class="fa fa-star-half-o"></i>
                                <?php endfor;?>

                                <?php for ($i = ceil($product['avgStar']); $i < 5; $i++) : ?>
                                    <i class="fa fa-star-o"></i>
                                <?php endfor;?>
                            </div>
                            <span style="color: #999; font-size: 13px; text-decoration: line-through;"><?= number_format($product['price'], 0, '', ',') ?>đ</span>
                            <p style="color: #e4270e;"><?= (number_format(($product['price'] * ($data['date_time'] < $product['start_date'] ? 100 : ($product['percent'] == 0 ? 100 : $product['percent'])) /100), 0, '', ',')) ?>đ</p>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p style="font-size: 20px">Không tìm thấy từ khóa: <b> <?= $data['keyword'] ?> </b> </p>
            <?php endif; ?>
        </div>

        <!-- <div class="page-btn">
            <span class="page-btn-arrow">&#8592;</span>
            <span class="page-btn-arrow">1</span>
            <span class="page-btn-arrow">2</span>
            <span class="page-btn-arrow">3</span>
            <span class="page-btn-arrow">4</span>
            <span class="page-btn-arrow">&#8594;</span>
        </div> -->
        <?php if ($data['pageCount'] > 1) : ?>
            <div class="page-btn">
                <a href="<?= $data['page'] == 1 ? "#/" : DOCUMENT_ROOT . "/products/search?page=" . ($data['page'] - 1) . "&keyword=" . $data['keyword'] ?>">
                    <span class="page-btn-arrow <?php if ($data['page'] == 1) echo "page-btn-arrow--hover" ?>">&#8592;</span>
                </a>
                <?php for ($i = 1; $i <= $data['pageCount']; $i++) : ?>
                    <a <?= $i == $data['page'] ? 'onclick="event.preventDefault()"' : "" ?> href="<?= DOCUMENT_ROOT . "/products/search?page=$i" . "&keyword=" . $data['keyword'] ?>">
                        <span class="page-btn-arrow <?= $i == $data['page'] ? "page-btn--active" : "" ?>"><?= $i ?></span>
                    </a>
                <?php endfor; ?>
                <a href="<?= $data['page'] == $data['pageCount'] ? "#/" : DOCUMENT_ROOT . "/products/search?page=" . ($data['page'] + 1) . "&keyword=" . $data['keyword'] ?>">
                    <span class="page-btn-arrow <?php if ($data['page'] == $data['pageCount']) echo "page-btn-arrow--hover" ?>">&#8594;</span>
                </a>
            </div>
        <?php endif; ?>
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