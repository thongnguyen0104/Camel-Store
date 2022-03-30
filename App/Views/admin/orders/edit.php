<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cập nhật đơn hàng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href="<?= DOCUMENT_ROOT ?>/admin/orders">Đơn hàng</a></li>
                    <li class="breadcrumb-item active">Cập nhật</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Thông tin đơn hàng</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= DOCUMENT_ROOT ?>/admin/orders/update/<?= $data['order']['id'] ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col">
                            <label for="id">Mã đơn hàng</label>
                            <input value="<?= $data['order']['id'] ?>" type="text" class="form-control" id="id" name="id" placeholder="Product-name" disabled required>
                        </div>
                        <div class="form-group col">
                            <label for="status">Trạng thái</label>
                            <select name="statusId" class="form-control" id="status" required>
                                <?php foreach ($data['status'] as $index => $status) : ?>
                                    <option value="<?= $status['id'] ?>" <?= $status['id'] == $data['order']['id_status'] ? "selected" : "" ?>><?= $status['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="order_date">Ngày đặt hàng</label>
                            <input value="<?= $data['order']['order_date'] ?>" type="text" class="form-control" id="order_date" placeholder="Product-price" disabled required>
                        </div>
                        <!-- <div class="form-group col">
                            <label for="delivery_date">Ngày giao hàng</label>
                            <input value="<?= $data['order']['delivery_date'] ?>" class="form-control" name="delivery_date" id="delivery_date" placeholder="YY-mm-dd" required>
                        </div> -->
                        <div class=" form-group col">
                            <label for="delivery_date">Ngày giao hàng</label>
                            <input required type="date" id="delivery_date" name="delivery_date" class="form-control" value="<?= date_format(date_create(str_replace("/", "-",  $data['order']['delivery_date'])), "Y-m-d") ?>"></input>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="address">Địa chỉ</label>
                            <input value="<?= $data['order']['address'] ?>" type="text" class="form-control" id="address" placeholder="Product-price" disabled required>
                        </div>
                        <div class="form-group col">
                            <label for="phone">Số điện thoại</label>
                            <input value="<?= $data['order']['phone'] ?>" class="form-control" id="phone" disabled required></input>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="nameUser">Tên khách hàng</label>
                            <input value="<?= $data['userName']['name'] ?>" class="form-control" id="nameUser" disabled required></input>
                        </div>
                        <div class="form-group col">
                            <label for="address">Tổng tiền</label>
                            <input value="<?= $data['total'] ?>" type="number" class="form-control" id="address" placeholder="Product-price" disabled required>
                        </div>
                    </div>
                    <?php foreach ($data['orderDetails'] as $index => $orderDetail) : ?>
                        <hr>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="name">Sản phẩm <?= $index + 1 ?></label>
                                <input value="<?= $orderDetail['nameP'] ?>" type="text" class="form-control" id="name" placeholder="Product-price" disabled required>
                            </div>
                            <div class="form-group col-6">
                                <img style="max-width: 100px; height: 100px" class="img-thumbnail" src="<?= IMAGES_PRODUCTS_URL ?>/<?= $orderDetail['imageP'] ?>" alt="Product" />
                            </div>
                            <div class="form-group col-6">
                                <label for="address">Giá</label>
                                <input value="<?= $orderDetail['price_product'] ?>" type="number" class="form-control" id="address" placeholder="Product-price" disabled required>
                            </div>
                            <div class="form-group col-6">
                                <label for="amount">Số lượng</label>
                                <input value="<?= $orderDetail['amount'] ?>" type="number" class="form-control" id="amount" placeholder="Product-price" disabled required>
                            </div>
                        </div>
                    <?php endforeach ?>
                    <!-- /.card-body -->

                    <div class="card-footer float-right">
                        <button type="submit" class="btn btn-primary" <?= $data['order']['id_status'] == "DG" ? "disabled" : "" ?>>Lưu</button>
                    </div>
            </form>
        </div>
    </div>
</section>