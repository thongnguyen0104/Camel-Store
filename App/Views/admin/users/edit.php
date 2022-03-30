<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thông tin người dùng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href="<?= DOCUMENT_ROOT ?>/admin/users">Người dùng</a></li>
                    <li class="breadcrumb-item active">Thông tin</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Thông tin người dùng</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= DOCUMENT_ROOT ?>/admin/users/update/<?= $data['user']['id'] ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col">
                            <label for="id">ID</label>
                            <input value="<?= $data['user']['id'] ?>" type="number" class="form-control" id="id" name="id" placeholder="Product-name" disabled required>
                        </div>
                        <div class="form-group col">
                            <label for="name">Tên</label>
                            <input value="<?= $data['user']['name'] ?>" type="text" class="form-control" id="name" name="name" placeholder="Product-name" disabled required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="email">Email</label>
                            <input value="<?= $data['user']['email'] ?>" name="email" type="text" class="form-control" id="email" placeholder="Product-price" disabled required>
                        </div>
                        <div class="form-group col">
                            <label for="address">Địa chỉ</label>
                            <textarea class="form-control" name="address" id="address" disabled required><?= $data['user']['address'] ?></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="email">Ảnh đại diện</label>
                            <img style="max-width: 100px" class="img-thumbnail" src="<?= USER_AVATAR_URL ?>/<?= $data['user']['avatar'] ?>" alt="User" />
                        </div>
                        <div class="form-group col">
                            <label for="phone">Điện thoại</label>
                            <input value="<?= $data['user']['phone'] ?>" name="phone" type="text" class="form-control" id="phone" placeholder="User-phone" disabled required>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer float-right">
                        <button type="submit" class="btn btn-primary" disabled>Lưu</button>
                    </div>
            </form>
        </div>
    </div>
</section>