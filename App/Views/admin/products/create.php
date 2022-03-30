<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm sản phẩm mới</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Home</a></li>
                    <li class="breadcrumb-item active"><a href="<?= DOCUMENT_ROOT ?>/admin/products">Sản phẩm</a></li>
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
                <h3 class="card-title">Thông tin sản phẩm</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= DOCUMENT_ROOT ?>/admin/products/store" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col">
                            <label for="name">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Product-name" required>
                        </div>
                        <div class="form-group col">
                            <label for="category">Loại sản phẩm</label>
                            <select name="categoryId" class="form-control" id="category" required>
                                <option value="" disabled selected>Selected one</option>
                                <?php foreach ($data['categories'] as $index => $category) : ?>
                                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="price">Giá</label>
                            <input name="price" type="number" class="form-control" id="price" placeholder="Product-price" required>
                        </div>
                        <div class="form-group col">
                            <label for="description">Mô tả</label>
                            <textarea class="form-control" name="description" id="description" required></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <b>Hình ảnh sản phẩm 1</b>
                            <input type="file" name="image1" required>
                        </div>
                        <div class="form-group col-6">
                            <b>Hình ảnh sản phẩm 2</b>
                            <input type="file" name="image2" required>
                        </div>
                        <div class="form-group col-6">
                            <b>Hình ảnh sản phẩm 3</b>
                            <input type="file" name="image3" required>
                        </div>
                        <div class="form-group col-6">
                            <b>Hình ảnh sản phẩm 4</b>
                            <input type="file" name="image4" required>
                        </div>
                        <div class="form-group col-6">
                            <b>Hình ảnh sản phẩm 5</b>
                            <input type="file" name="image5" required>
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