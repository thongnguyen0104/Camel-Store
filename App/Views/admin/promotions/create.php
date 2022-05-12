<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm khuyến mãi mới</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href="<?= DOCUMENT_ROOT ?>/admin/promotions">Khuyến mãi</a></li>
                    <li class="breadcrumb-item active">Thêm</li>
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
            <form action="<?= DOCUMENT_ROOT ?>/admin/promotions/store" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col">
                            <label for="name">Tên</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Promotion-name" required>
                        </div>
                        <div class="form-group col">
                            <label for="percent">Khuyễn mãi còn</label>
                            <input type="number" min="1" max="100" class="form-control" name="percent" id="percent" required></input>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="start_date">Ngày bắt đầu</label>
                            <input value="" name="start_date" type="date" class="form-control" id="start_date" placeholder="" required>
                        </div>
                        <div class="form-group col">
                            <label for="start_time">Thời gian bắt đầu</label>
                            <input value="" name="start_time" type="time" class="form-control" id="start_time" placeholder="" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="end_date">Ngày kết thúc</label>
                            <input value="" name="end_date" type="date" class="form-control" id="end_date" placeholder="" required>
                        </div>
                        <div class="form-group col">
                            <label for="end_time">Thời gian kết thúc</label>
                            <input value="" name="end_time" type="time" class="form-control" id="end_time" placeholder="" required>
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