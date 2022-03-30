    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Trang chủ</a></li>
              <li class="breadcrumb-item active">Sản phẩm</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                  <h5 class="col">Danh sách Sản phẩm</h5>
                  <a class="btn btn-primary" href="<?= DOCUMENT_ROOT ?>/admin/products/create">Thêm</a>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <h5 class="col text-primary">
                    <?php if (isset($_SESSION['message'])) : ?>
                      <?= $_SESSION['message'] ?>
                      <?php unset($_SESSION['message']); ?>
                    <?php else : ?>
                      <?= "" ?>
                    <?php endif; ?>
                  </h5>
                </div>
              </div>

              <div class="card-body">
                <table id="myTable" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Tên</th>
                      <th>Giá</th>
                      <th>Hình ảnh</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data['products'] as $index => $product) : ?>
                      <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['price'] ?></td>
                        <td><img style="max-width: 100px" class="img-thumbnail" src="<?= IMAGES_PRODUCTS_URL ?>/<?= $product['image1'] ?>" alt="Product" /></td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="<?= DOCUMENT_ROOT ?>/admin/products/edit/<?= $product['id'] ?>" type="button" class="btn btn-info">Sửa</a>
                            <!-- <a href="<?= DOCUMENT_ROOT ?>/admin/products/delete/<?= $product['id'] ?>" type="button" class="btn btn-danger">Delete</a> -->
                          </div>

                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?= $product['id'] ?>">
                            Xóa
                          </button>

                          <!-- modal -->
                          <div class="modal fade" id="exampleModal<?= $product['id'] ?>" aria-labelledby="my_modalLabel">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h2 class="modal-title" id="exampleModalLongTitle<?= $product['id'] ?>">Xác nhận xóa</h2>
                                </div>
                                <div class="modal-body">
                                  <p><b>Xóa: </b> <?= $product['name'] ?></p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-success" data-dismiss="modal">Hủy</button>
                                  <a href="<?= DOCUMENT_ROOT ?>/admin/products/delete/<?= $product['id'] ?>"><button type="button" class="btn btn-danger">Xóa</button></a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- end modal -->

                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->