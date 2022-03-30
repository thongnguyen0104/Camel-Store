    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Người dùng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Trang chủ</a></li>
              <li class="breadcrumb-item active">Người dùng</li>
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
                  <h5 class="col">Danh sách người dùng</h5>
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
                      <th>Điện thoại</th>
                      <th>Email</th>
                      <th>Đại chỉ</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data['users'] as $index => $user) : ?>
                      <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['phone'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['address'] ?></td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="<?= DOCUMENT_ROOT ?>/admin/users/edit/<?= $user['id'] ?>" type="button" class="btn btn-info">Xem</a>
                          </div>
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?= $user['id'] ?>">
                            Xóa
                          </button>

                          <!-- modal -->
                          <div class="modal fade" id="exampleModal<?= $user['id'] ?>" aria-labelledby="my_modalLabel">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h2 class="modal-title" id="exampleModalLongTitle<?= $user['id'] ?>">Xác nhận xóa</h2>
                                </div>
                                <div class="modal-body">
                                  <p><b>Xóa: </b> <?= $user['name'] ?></p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-success" data-dismiss="modal">Hủy</button>
                                  <a href="<?= DOCUMENT_ROOT ?>/admin/users/delete/<?= $user['id'] ?>"><button type="button" class="btn btn-danger">Xóa</button></a>
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