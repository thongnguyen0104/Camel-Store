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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- header -->
    <?php require_once(VIEW . '/shared/header.php') ?>
    <!-- header -->
    <h2 class="title"><?= isset($_SESSION['user']) ? 'Giỏ hàng của: "' .  $_SESSION['user']['name'] . '"' : "Hum! bạn vui lòng đăng ký hoặc đăng nhập"?></h2>

    <!-- cart item details -->
    <div class="small-container cart-page">
        <?php if(isset($_SESSION['user'])) : ?>
            <div class="border-express"></div>
                <div class="cart-page_express">
                    <div class="cart-page__express-location">
                        <i style="color: #ff533b; font-size: 20px" class="fa fa-map-marker" aria-hidden="true"></i>
                        <p class="cart-page__express-address">Địa chỉ nhận hàng</p>
                    </div>
                    <div class="cart-page__express-address-info">
                        <div class="cart-page__express-address-info-contact">
                            <span><?=$_SESSION['user']['name']?></span>
                            <br>
                            <span><?=$_SESSION['user']['phone']?></span>
                        </div>
                        <div class="cart-page__express-address-info-receive">
                            <span><?=$_SESSION['user']['address']?></span>
                        </div>
                    </div>
                </div>
        <?php endif; ?>
        <form action="<?= DOCUMENT_ROOT ?>/cart/checkout" method="post">
            <table>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>

                    <th>Giá gốc</th>

                    <th>Tổng cộng</th>
                </tr>
                    <?php if(isset($_SESSION['user'])) : ?>
                        <?php if(!empty($data['products'])) : ?>
                            <?php foreach($data['products'] as $index => $product) : ?>
                                <tr style="border-bottom: 0.5px solid #d2cece">
                                    <td>
                                        <div class="cart-info">
                                            <img src="<?= IMAGES_PRODUCTS_URL ?>/<?=$product['image1']?>" alt="cart">
                                            <div class="cart-info__detail">
                                                <p><?=$product['name']?></p>
                                                <small class="cart-info__detail-price"><?=number_format($product['reducePrice'], 0, '', '')?>đ</small>
                                                <br>
                                                <a href="<?= DOCUMENT_ROOT . '/cart/deleteInCart/' . $product['id'] ?>">Xóa</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td> <input name="numOfProduct<?= $product['id'] ?>" class="cart-info-quantity" type="number" min="1" value="<?=$product['amount']?>"></td>
                                    
                                    <td><?=number_format($product['price'], 0, '', ',')?></td>
                                    
                                    <td class="cart-info-price__single"></td>

                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p style="font-size: 20px"> Khong co san pham nao trong gio hang <b></b> </p>
                        <?php endif; ?>
                    <?php else : ?>
                            <tr>
                                <td>Vui long dang nhap de xem san pham</td>
                            </tr>
                    <?php endif ?>
            </table>
            <?php if(isset($_SESSION['user'])) : ?>
                <?php if(!empty($data['products'])) : ?>
                    <div class="total-price">
                        <table>
                            <tr>
                                <td>Tổng tiền</td>
                                <td class="total-price-sum" id="total">10000</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="text-align: center">
                                    <button type="submit" id="thanhtoan" style="font-size: 18px" class="btn">Thanh toán</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                <?php endif; ?>
            <?php endif ?>
        </form>
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
    <script type="text/javascript" src="<?= PUBLIC_URL ?>/js/total.js"></script>

</body>

</html>