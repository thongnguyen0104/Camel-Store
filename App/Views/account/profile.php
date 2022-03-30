<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CamelStore | Ecommerce Website Desgin</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/input.css">
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/style.css">
    <link rel="icon" href="<?= PUBLIC_URL ?>/img/camel-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/styleProfile.css">
    <!-- CSS only -->
</head>

<body>
    <!-- header -->
    <?php require_once(VIEW . '/shared/header.php') ?>
    <!-- header -->

    <!-- cart item details -->
    <div class="small-container cart-page">
        <div class="about-user">
            <div class="about-user-img">
                <div class="profile">
                    <img class="profile-image" src="<?= USER_AVATAR_URL ?>/<?= ($_SESSION['user']['avatar'] != "") ? $_SESSION['user']['avatar'] :  "default/default-avatar.png" ?>" alt="user">
                    <i class="fa fa-camera profile-icon-camera" aria-hidden="true"></i>
                </div>
            </div>
            <div class="info">
                <div class="info-username">
                    <b>Name:</b>
                    <span><?= $_SESSION['user']['name'] ?></span>
                </div>
                <div class="info-email">
                    <b>Email:</b>
                    <span><?= $_SESSION['user']['email'] ?></span>
                </div>
                <div class="info-phone">
                    <b>SDT:</b>
                    <span><?= $_SESSION['user']['phone'] ?></span>
                </div>
                <div class="info-address">
                    <b>Địa chỉ:</b>
                    <span><?= $_SESSION['user']['address'] ?></span>
                </div>
                <br>
                <div class="info-form">
                    <form class="form-address" action="<?= DOCUMENT_ROOT ?>/account/updateInfo/<?= $_SESSION['user']['id'] ?>" method="post" enctype="multipart/form-data">
                        <label for="new-address"><b>Địa chỉ mới</b></label>
                        <input value="<?= $_SESSION['user']['address'] ?>" type="text" id="new-address" name="new-address" required>
                        <label for="new-phone"><b>Số điện thoại mới (+84)</b></label>
                        <input value="<?= $_SESSION['user']['phone'] ?>" type="text" id="new-phone" name="new-phone" required>
                        <button class="btn btn-primary" type="submit">Lưu</button>
                    </form>
                    <form class="form-avatar" action="<?= DOCUMENT_ROOT ?>/account/updateAvatar/<?= $_SESSION['user']['id'] ?>" method="post" enctype="multipart/form-data">
                        <label for="new-avatar"><b>Ảnh đại diện mới</b></label>
                        <input name="image" style="border: none;" type="file" id="new-avatar" required>
                        <button class="btn btn-primary" type="submit">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- cart item details -->
    <div class="small-container cart-page">
        <?php if (!empty($data['orders'])) : ?>
            <h3 class="title title-order">Đơn hàng đã đặt</h3>
            <?php foreach ($data['orders'] as $index => $order) : ?>
                <div class="border-express"></div>
                <br>
                <h3>Mã đơn hàng: #<?= $order['id'] ?></h3>
                <b>Trạng thái đơn hàng:</b>
                <span><?= $order['name'] ?></span>
                <div class="cart-page_express">
                    <div class="cart-page__express-location">
                        <i style="color: #ff533b; font-size: 20px" class="fa fa-map-marker" aria-hidden="true"></i>
                        <p class="cart-page__express-address">Địa chỉ nhận hàng</p>
                    </div>
                    <div class="cart-page__express-address-info">
                        <div class="cart-page__express-address-info-contact">
                            <span><?= $_SESSION['user']['name'] ?></span>
                            <br>
                            <span><?= $order['phone'] ?></span>
                        </div>
                        <div class="cart-page__express-address-info-receive">
                            <span><?= $order['address'] ?></span>
                        </div>
                    </div>
                </div>
                <table>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php foreach ($data["orderDetail$order[id]"] as $index => $orderDetail) : ?>
                        <tr style="border-bottom: 0.5px solid #d2cece">
                            <td>
                                <div class="cart-info">
                                    <img src="<?= IMAGES_PRODUCTS_URL ?>/<?= $orderDetail['imageP'] ?>" alt="cart">
                                    <div>
                                        <p><?= $orderDetail['nameP'] ?></p>
                                        <small><?= number_format($orderDetail['price_product'], 0, '', ',') ?>đ</small>
                                    </div>
                                </div>
                            </td>
                            <td> <input class="order-amount" value="<?= $orderDetail['amount'] ?>" disabled type="number"> </td>
                            <td><?= number_format($orderDetail['price_product'] * $orderDetail['amount'], 0, '', ',') ?>đ</td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <div class="total-price">
                    <table>
                        <tr>
                            <td>Tổng tiền</td>
                            <td><?= number_format($data["total$order[id]"], 0, '', ',') ?>đ</td>
                        </tr>
                    </table>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <h3><?= $data['message'] ?></h3>
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
    <script type="text/javascript" src="<?= PUBLIC_URL ?>/js/total.js"></script>

</body>

</html>