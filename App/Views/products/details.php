<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CamelStore | Ecommerce Website Desgin</title>
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/input.css">
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/style.css">
    <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/styleComment.css">
    <link rel="icon" href="<?= PUBLIC_URL ?>/img/camel-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- header -->
    <?php require_once(VIEW . '/shared/header.php') ?>

    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">

                <img style="height: 316.66px; " src="<?= IMAGES_PRODUCTS_URL ?>/<?= $data['products']['image3'] ?>" alt="gallery" width="100%" id="ProductImg">

                <div class="small-img-row">
                    <div class="small-img-col">
                        <img style="height: 76px; object-fit: cover" src="<?= IMAGES_PRODUCTS_URL ?>/<?= $data['products']['image3'] ?>" alt="gallery" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img style="height: 76px; object-fit: cover" src="<?= IMAGES_PRODUCTS_URL ?>/<?= $data['products']['image5'] ?>" alt="gallery" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img style="height: 76px; object-fit: cover" src="<?= IMAGES_PRODUCTS_URL ?>/<?= $data['products']['image4'] ?>" alt="gallery" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img style="height: 76px; object-fit: cover" src="<?= IMAGES_PRODUCTS_URL ?>/<?= $data['products']['image5'] ?>" alt="gallery" width="100%" class="small-img">
                    </div>
                </div>
            </div>
            <div class="col-2">
                <p><a href="<?= DOCUMENT_ROOT ?>">Trang chủ</a> / <a href="<?= DOCUMENT_ROOT ?>/products">Sản phẩm</a></p>
                <h1 style="font-size: 35px; line-height: 38px"><?= $data['products']['name'] ?></h1>
                <span class="giamgia"><?= number_format($data['products']['price'], 0, '', ',') ?>đ</span>
                <h4><?= number_format($data['products']['price'], 0, '', ',') ?>đ</h4>
                <input type="number" value="1" min="1">
                <a style="cursor: pointer" onclick="addToCart(<?= isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0 ?>, <?= $data['products']['id'] ?>)" class="btn">+Thêm vào giỏ hàng</a>
                <h3>Mô tả sản phẩm <i class="fa fa-indent"></i> </h3>
                <br>
                <p><?= $data['products']['description'] ?></p>
            </div>
        </div>
    </div>

    <!-- title -->
    <div class="small-container">
        <div class="row row-2">
            <h2>Sản phẩm liên quan</h2>
            <a href="<?= DOCUMENT_ROOT ?>/products">
                <p style="color: blue;">Xem thêm</p>
            </a>
        </div>
    </div>
    <!-- products -->
    <div class="small-container">
        <div class="row">
            <?php foreach ($data['productsSame'] as $index => $product) : ?>
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
                        <span class="giamgia"><?= number_format($product['price'], 0, '', ',') ?>đ</span>
                        <p><?= number_format($product['price'], 0, '', ',') ?>đ</p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Commnet -->
    <div class="small-container">
        <h2 class="title row cmt-tittle">
            ĐÁNH GIÁ SẢN PHẨM
        </h2>
        <!-- <div class="row">
            <div class="cmt-tittle">
                Đánh giá trung bình của sản phẩm
            </div>
            <div style="display: inline-block;">
                <i class="fa fa-star" style="color: orange;"></i>
                <i class="fa fa-star" style="color: orange;"></i>
                <i class="fa fa-star" style="color: orange;"></i>
                <i class="fa fa-star" style="color: orange;"></i>
                <i class="fa fa-star" style="color: orange;"></i>
            </div>
        </div> -->

        <br>
        <?php if ($data['comments'] != "Chưa có đánh giá nào") : ?>
            <?php foreach ($data['comments'] as $index => $comment) : ?>
                <div class="small-container" style="border-bottom: 1px solid rgb(187, 183, 183);">
                    <div class="row">
                        <div>
                            <img class="cmt-image" src="<?= USER_AVATAR_URL ?>/<?= ($comment['avatar'] !="") ? $comment['avatar'] :  "default/default-avatar.png" ?>" alt="user-image">
                        </div>
                        <div>
                            <span hidden id="user-cmt-star"><?= $comment['star']?></span>
                            <div style="width: 200px;" ><?= $comment['name'] ?></div>
                            <?php for ($i=0; $i < $comment['star']; $i++) : ?>
                                <i class="fa fa-star" style="color: orange;"></i>
                            <?php endfor; ?>
                            <?php for ($i=0; $i < (5 - $comment['star']); $i++) : ?>
                                <i class="fa fa-star-o" style="color: orange;"></i>
                            <?php endfor; ?>
                        </div>
                        <div><?= $comment['date'] ?></div>

                        <div onclick = "editComment()" id="editComment" class="
                            <?php if(isset($_SESSION['user']['id'])) : ?>
                                <?php if($_SESSION['user']['id'] == $comment['id_user']) : ?>
                                    <?= "user-cmt-edit" . $comment['id'] ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            "
                            style= "color: #ff523b; cursor: pointer;">
                            Sửa
                        </div>
                        
                    </div>
                    <div class="cmt-content">
                        <?= $comment['content'] ?>
                    </div>
                </div>
                <br>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="small-container" style="border: 1px solid rgb(187, 183, 183);">
                <?= "Chưa có đánh giá nào"?>
            </div>
        <?php endif; ?>
        <br>

        <div class="row">
            <?php if($_SESSION) : ?>
                <div onload = "loadComment()" class="container-star">

                    <div class="container_post">
                        <div class="container_post-text">Cảm ơn bạn đánh giá!</div>
                    </div>

                    <div class="container_star-widget">
                        <input onclick = "Comment()" type="radio" name="rate" class="rank-star" id="rate-5">
                        <label for="rate-5" class="fa fa-star"></label>

                        <input onclick = "Comment()" type="radio" name="rate" class="rank-star" id="rate-4">
                        <label for="rate-4" class="fa fa-star"></label>

                        <input onclick = "Comment()" type="radio" name="rate" class="rank-star" id="rate-3">
                        <label for="rate-3" class="fa fa-star"></label>

                        <input onclick = "Comment()" type="radio" name="rate" class="rank-star" id="rate-2">
                        <label for="rate-2" class="fa fa-star"></label>

                        <input onclick = "Comment()" type="radio" name="rate" class="rank-star" id="rate-1">
                        <label for="rate-1" class="fa fa-star"></label>
                            
                        <form class="container_star-widget-form" action="<?= DOCUMENT_ROOT ?>/products/evaluation/<?= $data['products']['id'] ?>" method="post" enctype="multipart/form-data">
                            <input id="form-star-input" hidden name="star-rank" value="0">
                            <header class="cmt-like"></header>
                            <span hidden class="form-cmt-rank" style="color: #fff;">
                            </span>
                            <div class="textarea">
                                <textarea name="content" id="" cols="30" placeholder="Nhận xét của bạn ... "></textarea>
                            </div>

                            <div class="form-btn" type="submit" disabled>
                                <button class="form-button">
                                        THỰC HIỆN
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
            
        </div>

    </div>


    <!-- footer -->
    <?php require_once(VIEW . '/shared/footer.php') ?>

<!--###############################################################################################################################################--->
    
    <!-- js for toggle nemu -->
    <script src="<?= PUBLIC_URL ?>/js/menuToggle.js"></script>
    <!-- js for product gallery -->
    <script src="<?= PUBLIC_URL ?>/js/productGallery.js"></script>

    <!-- js for comment -->

    <!-- Lấy id cmt ra gắn vào id class để cho user sưa cmt lại -->
    <script>
            const btn = document.querySelector(".form-button");
            const post = document.querySelector(".container_post");
            const widget = document.querySelector(".container_star-widget");

            <?php foreach ($data['comments'] as $index => $comment) : ?>
                <?php if($_SESSION['user']['id'] == $comment['id_user']) : ?>
                    const <?= "editBtn" . $comment['id'] ?> = document.querySelector("<?= ".user-cmt-edit" . $comment['id']; ?>");
                <?php endif; ?>
                // console.log("Bat  dau");
                btn.onclick = () => {
                    widget.style.display = "none";
                    post.style.display = "block";
                    <?= "editBtn" . $comment['id'] ?>.onclick = () => {
                        widget.style.display = "block";
                        post.style.display = "none";
                    }
                    return false;
                }
            <?php endforeach; ?>
    </script>

    <!-- Get value user star rank -->
    <script>
        star_1 = document.getElementById("rate-1");
        star_2 = document.getElementById("rate-2");
        star_3 = document.getElementById("rate-3");
        star_4 = document.getElementById("rate-4");
        star_5 = document.getElementById("rate-5");
        var rank = document.getElementById("form-star-input");
        star_1.onclick = () => {
            rank.value = "1";
            console.log("Da in 1");
        }
        star_2.onclick = () => {
            rank.value = "2";
            console.log("Da in 2");
        }
        star_3.onclick = () => {
            rank.value = "3";
            console.log("Da in 3");
        }
        star_4.onclick = () => {
            rank.value = "4";
            console.log("Da in 4");
        }
        star_5.onclick = () => {
            rank.value = "5";
            console.log("Da in 5");
        }
    </script>

    <!-- Checked star-->
    <script>
        function Comment() {
            var cmt = parseInt(document.getElementById("user-cmt-star").innerHTML);
            var star = [];
            star[0] = document.getElementById("rate-1");
            star[1] = document.getElementById("rate-2");
            star[2] = document.getElementById("rate-3");
            star[3] = document.getElementById("rate-4");
            star[4] = document.getElementById("rate-5");
            switch (cmt) {
                case 1:
                    star[0].checked = true;
                    break;
                case 2:
                    star[1].checked = true;
                    break;
                case 3:
                    star[2].checked = true;
                    break;
                case 4:
                    star[3].checked = true;
                    break;
                case 5:
                    star[4].checked = true;
                    break;
                default:
                    console.log("Không biết");
            }
            // console.log(cmt);
        }
        Comment();
    </script>

    <!-- Hidden form comment -->
    <script>
        // alert("BAN DA BINH LUAN SAN PHAM NAY ROI");
        function loadComment() {
            var containerStar = document.querySelector(".container-star");
            containerStar.style.display = "none";
        }
        function editComment() {
            var containerStar = document.querySelector(".container-star");
            containerStar.style.display = "block";
        }
    </script>

<!--###############################################################################################################################################--->

</body>

</html>