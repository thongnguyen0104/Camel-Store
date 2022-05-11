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
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "111412526938504");
    chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
    window.fbAsyncInit = function() {
        FB.init({
        xfbml            : true,
        version          : 'v13.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    
    <!-- header -->
    <div id="toast">
        <div id="img">Icon</div>
        <div id="desc">A notification message</div>
    </div>
    <p hidden id="documentRootId"><?= DOCUMENT_ROOT ?></p>

    <div class="header">
        <!-- hader -->
        <div class="container">

            <div class="navbar">

                <div class="logo">
                    <a href="<?= DOCUMENT_ROOT ?>">
                        <img src="<?= PUBLIC_URL ?>/img/logo.png" alt="logo" width="125px">
                    </a>
                </div>

                <div class="navbar__input">
                    <form action="<?= DOCUMENT_ROOT ?>/products/search" method="GET" style="width: 100%">
                        <input name="keyword" type="text" placeholder="Tìm kiếm">
                    </form>
                    <div class="navnar__input-search">
                        <i class="navnar__input-search-icon fa fa-search" aria-hidden="true"></i>
                    </div>
                </div>

                <nav>
                    <ul id="MenuItems">
                        <li><a href="<?= DOCUMENT_ROOT ?>">Trang chủ</a></li>
                        <li><a href="<?= DOCUMENT_ROOT ?>/products">Sản phẩm</a></li>
                        <!-- <li><a href="">Về chúng tôi</a></li>
                        <li><a href="">Liên hệ</a></li> -->
                        <li><a href="
                                <?php if (isset($_SESSION['user'])) : ?>
                                    <?= DOCUMENT_ROOT . "/account/profile" ?>
                                <?php else : ?>
                                    <?= DOCUMENT_ROOT . "/account/index" ?>
                                <?php endif; ?>">Tài khoản
                            </a>
                        </li>
                        <?php if (isset($_SESSION['user'])) : ?>
                            <li><a href="<?= DOCUMENT_ROOT . "/account/signout" ?>">Đăng xuất</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>

                <a class="header__cart" href="<?= DOCUMENT_ROOT . "/cart" ?>">
                    <img src="<?= PUBLIC_URL ?>/img/cart.png" alt="cart" width="30px" height="30px">
                    <span id="numInCartId" class="header__cart-notice">0</span>
                </a>
                <img src="<?= PUBLIC_URL ?>/img/menu.png" alt="menu" class="menu-icon" onclick="menutoggle()">
            </div>

            <div class="row">
                <div class="col-2">
                    <h1>Không gian bếp của bạn<br>sẽ có một phong cách mới!</h1>
                    <p>Cái đẹp trong phong cách, sự hài hòa, lịch thiệp
                        và sự nhịp nhàng <br> phụ thuộc vào tính đơn giản.
                    </p>
                    <a href="#local" class="btn">Khám phá ngay &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="<?= PUBLIC_URL ?>/img/image1.png" alt="">
                </div>
            </div>
            
        </div>
    </div>

    <!-- featured categories -->
    <div class="categories">
        <div class="small-container">
            <h2 class="title">Loại sản phẩm</h2>
            <div class="row">
                <?php foreach ($data['categories'] as $index => $category) : ?>
                    <div class="col-4">
                        <a href="<?= DOCUMENT_ROOT .  "/products/categories/" . $category['id'] ?>">
                            <img src="<?= IMAGES_CATEGORY_URL ?>/<?= $category['image'] ?>" alt="">
                            <h4 style="text-align: center; font-size: 18px; line-height: 26px; height: 26px"><?= $category['name'] ?></h4>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- featured products -->
    <div class="small-container">
        <h2 class="title">Sản phẩm giảm giá</h2>
        <div class="row">
            <div class="col-4">
                <a href="">
                    <img src="<?= PUBLIC_URL ?>/img/products/1.jpg" alt="product">
                </a>
                <a href="">
                    <h4>Red Printed T-shirt</h4>
                </a>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="<?= PUBLIC_URL ?>/img/products/2.jpg" alt="product">
                <h4>Red Printed T-shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="<?= PUBLIC_URL ?>/img/products/3.jpg" alt="product">
                <h4>Red Printed T-shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$50.00</p>
            </div>
            <div class="col-4">
                <img src="<?= PUBLIC_URL ?>/img/products/4.jpg" alt="product">
                <h4>Red Printed T-shirt</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>$50.00</p>
            </div>
        </div>

        <!-- Lastest Products -->
        <h2 id="local" class="title">Sản phẩm mới nhất</h2>
        <div class="row">
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
                            <!-- <span><?= $product['avgStar']?> sao</span> -->
                        </div>
                        <span style="color: #999; font-size: 13px; text-decoration: line-through;"><?= number_format($product['price'], 0, '', ',') ?>đ</span>
                        <p style="color: #e4270e;"><?= (number_format(($product['price'] * ($data['date_time'] < $product['start_date'] ? 100 : ($product['percent'] == 0 ? 100 : $product['percent'])) /100), 0, '', ',')) ?>đ</p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="page-btn">
            <a href="<?= $data['page'] == 1 ? "#/" : DOCUMENT_ROOT . "/home/index?page=" . ($data['page'] - 1) ?>">
                <span class="page-btn-arrow <?php if ($data['page'] == 1) echo "page-btn-arrow--hover" ?>">&#8592;</span>
            </a>
            <?php for ($i = 1; $i <= $data['pageCount']; $i++) : ?>
                <a <?= $i == $data['page'] ? 'onclick="event.preventDefault()"' : "" ?> href="<?= DOCUMENT_ROOT . "/home/index?page=$i" ?>">
                    <span class="page-btn-arrow <?= $i == $data['page'] ? "page-btn--active" : "" ?>"><?= $i ?></span>
                </a>
            <?php endfor; ?>
            <a href="<?= $data['page'] == $data['pageCount'] ? "#/" : DOCUMENT_ROOT . "/home/index?page=" . ($data['page'] + 1) ?>">
                <span class="page-btn-arrow <?php if ($data['page'] == $data['pageCount']) echo "page-btn-arrow--hover" ?>">&#8594;</span>
            </a>
        </div>

    </div>

    <!-- offer -->
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="<?= PUBLIC_URL ?>/img/exclusive.png" alt="offer" class="offer-img">
                </div>
                <div class="col-2">
                    <p>Exclusive Available on RedStore</p>
                    <h1>Smart Band 4</h1>
                    <p>Instantly view call, text, app notifications and music in play.
                        Keep your hands free as you keep up with life.
                    </p>
                    <br>
                    <a href="" class="btn">Buy Now &#8594;</a>
                </div>
            </div>
        </div>
    </div>

    <!-- testimonial -->
    <div class="testimonial">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the
                        industry's standard
                        dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
                        to
                        make a type specimen
                        book.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="<?= PUBLIC_URL ?>/img/user-1.png" alt="user">
                    <h3>Sean Parker</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the
                        industry's standard
                        dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
                        to
                        make a type specimen
                        book.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="<?= PUBLIC_URL ?>/img/user-2.png" alt="user">
                    <h3>Mike Smith</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the
                        industry's standard
                        dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
                        to
                        make a type specimen
                        book.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <img src="<?= PUBLIC_URL ?>/img/user-3.png" alt="user">
                    <h3>Mabel Joe</h3>
                </div>
            </div>
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