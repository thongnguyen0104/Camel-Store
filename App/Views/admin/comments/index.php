    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bình luận</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Trang chủ</a></li>
              <li class="breadcrumb-item active">Bình luận</li>
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
                  <h5 class="col">Danh sách bình luận</h5>
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
                      <th>Người dùng</th>
                      <th>Sản Phẩm</th>
                      <th>Nội dung</th>
                      <th>Số sao</th>
                      <th>Ngày đánh giá</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data['comments'] as $index => $comment) : ?>
                      <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $comment['user_name'] ?></td>
                        <td><?= $comment['prt_name'] ?></td>
                        <td><?= $comment['content'] ?></td>
                        <td><?= $comment['star'] ?></td>
                        <td><?= $comment['date'] ?></td>
                        <td>
                          <!-- <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="<?= DOCUMENT_ROOT ?>/admin/comments/edit/<?= $comment['id'] ?>" type="button" class="btn btn-info">Xem</a>
                          </div> -->
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?= $comment['id'] ?>">
                            Xóa
                          </button>

                          <!-- modal -->
                          <div class="modal fade" id="exampleModal<?= $comment['id'] ?>" aria-labelledby="my_modalLabel">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h2 class="modal-title" id="exampleModalLongTitle<?= $comment['id'] ?>">Xác nhận xóa</h2>
                                </div>
                                <div class="modal-body">
                                  <p><b>Xóa bình luận thứ </b> <?= $comment['id'] ?></p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-success" data-dismiss="modal">Hủy</button>
                                  <a href="<?= DOCUMENT_ROOT ?>/admin/comments/delete/<?= $comment['id'] ?>"><button type="button" class="btn btn-danger">Xóa</button></a>
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