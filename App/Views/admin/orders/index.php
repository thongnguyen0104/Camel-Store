    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Đơn hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= DOCUMENT_ROOT ?>/admin">Trang chủ</a></li>
              <li class="breadcrumb-item active">Đơn hàng</li>
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
                  <h5 class="col">Danh sách đơn hàng</h5>
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
                      <th>Ngày đặt</th>
                      <th>Ngày giao</th>
                      <th>Khách hàng</th>
                      <th>Trạng thái</th>
                      <th>Tổng tiền</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data['orders'] as $index => $order) : ?>
                      <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $order['order_date'] ?></td>
                        <td><?= $order['delivery_date'] ?></td>
                        <td><?= $order['name'] ?></td>
                        <td><?= $order['nameST'] ?></td>
                        <td><?= $data['totals'][$index] ?></td>
                        <td>
                          <div class="btn-group btn-lg btn-block" role="group" aria-label="Basic example">
                            <a href="<?= DOCUMENT_ROOT ?>/admin/orders/edit/<?= $order['id'] ?>" type="button" class="btn btn-info">Cập nhật</a>
                          </div>
                          <!-- Button trigger modal -->
                          <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?= $order['id'] ?>">
                            Xóa
                          </button> -->

                          <!-- modal -->
                          <!-- <div class="modal fade" id="exampleModal<?= $order['id'] ?>" aria-labelledby="my_modalLabel">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h2 class="modal-title" id="exampleModalLongTitle<?= $order['id'] ?>">Xác nhận xóa</h2>
                                </div>
                                <div class="modal-body">
                                  <p><b>Xóa đơn hàng: </b> <?= $order['id'] ?></p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-success" data-dismiss="modal">Hủy</button>
                                  <a href="<?= DOCUMENT_ROOT ?>/admin/orders/delete/<?= $order['id'] ?>"><button type="button" class="btn btn-danger">Xóa</button></a>
                                </div>
                              </div>
                            </div>
                          </div> -->
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