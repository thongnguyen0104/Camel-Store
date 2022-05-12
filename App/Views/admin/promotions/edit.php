<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sửa khuyến mãi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href="<?= DOCUMENT_ROOT ?>/admin/promotions">Khuyễn mãi</a></li>
                    <li class="breadcrumb-item active">Sửa</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Thông tin khuyến mãi</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= DOCUMENT_ROOT ?>/admin/promotions/update/<?= $data['promotions']['id'] ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col">
                            <label for="name">Tên</label>
                            <input value="<?= $data['promotions']['name'] ?>" type="text" class="form-control" id="name" name="name" placeholder="Product-name" required>
                        </div>
                        <div class="form-group col">
                            <label for="percent">Khuyễn mãi còn</label>
                            <input value="<?= $data['promotions']['percent'] ?>" type="number" min="1" max="100" class="form-control" name="percent" id="percent" required></input>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="order_date">Thời gian bắt đầu</label>
                            <input value="<?= $data['promotions']['start_date']?>" type="text" class="form-control" id="order_date" disabled>
                        </div>
                        <div class=" form-group col">
                            <label for="delivery_date">Thời gian kết thúc</label>
                            <input value="<?= $data['promotions']['end_date']?>" type="text" class="form-control" id="delivery_date" disabled></input>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="start_date">Ngày bắt đầu mới</label>
                            <input value="" name="start_date" type="date" class="form-control" id="start_date" placeholder="">
                        </div>
                        <div class="form-group col">
                            <label for="start_time">Giờ bắt đầu mới</label>
                            <input value="" name="start_time" type="time" class="form-control" id="start_time" placeholder="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="end_date">Ngày kết thúc mới</label>
                            <input value="" name="end_date" type="date" class="form-control" id="end_date" placeholder="">
                        </div>
                        <div class="form-group col">
                            <label for="end_time">Giờ kết thúc mới</label>
                            <input value="" name="end_time" type="time" class="form-control" id="end_time" placeholder="">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer float-right">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</section>