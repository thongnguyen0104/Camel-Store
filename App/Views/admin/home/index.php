 <!-- Main content -->
 <section class="content">
     <div class="container-fluid">
         <!-- Small boxes (Stat box) -->
         <div class="row">
             <div class="col-lg-3 col-6">
                 <!-- small box -->
                 <div class="small-box bg-info">
                     <div class="inner">
                         <h3>
                             <?= $data['orders'] ?>
                         </h3>

                         <p>Đơn hàng</p>
                     </div>
                     <div class="icon">
                         <i class="ion ion-bag"></i>
                     </div>
                     <a href="<?= DOCUMENT_ROOT . "/admin/orders" ?>" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                 </div>
             </div>
             <!-- ./col -->
             <div class="col-lg-3 col-6">
                 <!-- small box -->
                 <div class="small-box bg-success">
                     <div class="inner">
                         <h3>
                             <?= $data['categories'] ?>
                         </h3>

                         <p>Loại sản phẩm</p>
                     </div>
                     <div class="icon">
                         <i class="ion ion-stats-bars"></i>
                     </div>
                     <a href="<?= DOCUMENT_ROOT . "/admin/categories" ?>" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                 </div>
             </div>
             <!-- ./col -->
             <div class="col-lg-3 col-6">
                 <!-- small box -->
                 <div class="small-box bg-warning">
                     <div class="inner">
                         <h3>
                             <?= $data['products'] ?>
                         </h3>

                         <p>Sản phẩm</p>
                     </div>
                     <div class="icon">
                         <i class="ion ion-person-add"></i>
                     </div>
                     <a href="<?= DOCUMENT_ROOT . "/admin/products" ?>" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                 </div>
             </div>
             <!-- ./col -->
             <div class="col-lg-3 col-6">
                 <!-- small box -->
                 <div class="small-box bg-danger">
                     <div class="inner">
                         <h3>
                             <?= $data['users'] ?>
                         </h3>

                         <p>Khách hàng</p>
                     </div>
                     <div class="icon">
                         <i class="ion ion-pie-graph"></i>
                     </div>
                     <a href="<?= DOCUMENT_ROOT . "/admin/users" ?>" class="small-box-footer">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                 </div>
             </div>
             <!-- ./col -->
             <div class="col-lg-3 col-6">
                 <!-- small box -->
                 <div class="small-box bg-dark">
                     <div class="inner">
                         <h3>
                             <?= $data['comments'] ?>
                         </h3>

                         <p>Bình luận</p>
                     </div>
                     <div class="icon">
                         <i class="ion ion-pie-graph"></i>
                     </div>
                     <a href="<?= DOCUMENT_ROOT . "/admin/comments" ?>" class="small-box-footer">Xem bình luận <i class="fas fa-arrow-circle-right"></i></a>
                 </div>
             </div>
             <!-- ./col -->
             <!-- ./col -->
             <div class="col-lg-3 col-6">
                 <!-- small box -->
                 <div class="small-box bg-secondary">
                     <div class="inner">
                         <h3>
                             <?= $data['promotions'] ?>
                         </h3>

                         <p>Khuyến mãi</p>
                     </div>
                     <div class="icon">
                         <i class="ion ion-pie-graph"></i>
                     </div>
                     <a href="<?= DOCUMENT_ROOT . "/admin/promotions" ?>" class="small-box-footer">Xem khuyến mãi <i class="fas fa-arrow-circle-right"></i></a>
                 </div>
             </div>
             <!-- ./col -->
         </div>

         <div class="row">
          <div class="col-md-6">
            <!-- DONUT CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Thống kê</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 626px;" class="chartjs-render-monitor"></canvas>
              </div>
              <!-- /.card-body -->
            </div>

          </div>

          <!-- /.col (RIGHT) -->
        </div>

     </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
 