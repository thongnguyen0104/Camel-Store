<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm loại sản phẩm mới</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href="<?= DOCUMENT_ROOT ?>/admin/categories">Loại sản phẩm</a></li>
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
                <h3 class="card-title">Thông tin loại sản phẩm</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= DOCUMENT_ROOT ?>/admin/categories/store" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col">
                            <label for="name">Tên</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Category-name" required>
                        </div>
                        <div class="form-group col">
                            <label for="description">Mô tả</label>
                            <textarea class="form-control" name="description" id="description" required></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <b>Hình ảnh</b>
                            <input type="file" name="image" required>
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