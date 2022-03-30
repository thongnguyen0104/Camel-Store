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
         </div>
         <!-- /.row -->

     </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->