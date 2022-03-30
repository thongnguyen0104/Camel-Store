<!-- hader -->
    <div id="toast">
        <!-- <div id="img"></div> -->
        <div id="desc">A notification message</div>
    </div>
    <p hidden id="documentRootId"><?= DOCUMENT_ROOT ?></p>
<div style="background-color: #ffd7d7">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="<?= DOCUMENT_ROOT ?>">
                    <img src="<?= PUBLIC_URL ?>/img/logo.png" alt="logo" width="125px">
                </a>
            </div>

            <div class="navbar__input">
                <form action="<?=DOCUMENT_ROOT?>/products/search" method="GET" style="width: 100%">
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
                                <?php if(isset($_SESSION['user'])) : ?>
                                    <?= DOCUMENT_ROOT . "/account/profile" ?>
                                <?php else : ?>
                                    <?= DOCUMENT_ROOT . "/account/index" ?>
                                <?php endif; ?>">Tài khoản
                                </a>
                            </li>
                    <?php if(isset($_SESSION['user'])) : ?>
                        <li><a href="<?= DOCUMENT_ROOT . "/account/signout" ?>">Đăng xuất</a></li>
                    <?php endif; ?>
                </ul>
            </nav>

            <a class="header__cart" href="<?= DOCUMENT_ROOT . "/cart" ?>">
                <img src="<?= PUBLIC_URL ?>/img/cart.png" alt="cart" width="30px" height="30px">
                <span id="numInCartId" class="header__cart-notice"></span>
            </a>
            <img src="<?= PUBLIC_URL ?>/img/menu.png" alt="menu" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>
</div>