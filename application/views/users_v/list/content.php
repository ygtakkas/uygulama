<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kullanıcı İşlemleri</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- /.card -->

            <div class="card">
              <div class="card-header"> 
               <div class="row">
                <div class="col-md-6"><h3 class="card-title">Kullanıcılar</h3>
               </div>
                <div class="col-md-6 text-right">
                  <a href="<?php echo base_url("users/new_form")?>" class="btn btn-success btn-xs mb-2 "><i class="fas fa-plus"></i>Yeni Kullanıcı Ekle</a>
               </div>
              </div>               
              </div>



              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>email</th>
                    <th>Durum</th>                    
                    <th>Oluşturma Tarhi</th>
                    <th>İşlemler</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($items as $item){?>
                  <tr>
                    <td><?php echo $item->id ;?></td>
                    <td><?php echo $item->email ;?></td>
                    <td><?php echo $item->is_active == 1 ? "aktif":"pasif";?></td>
                    <td><?php echo dateTimeFormat($item->created_at);?></td>
                    <td> 
                      <a href="<?php echo base_url("users/delete/$item->id")?>" class="btn btn-danger">Sil</a>  
                      <a href="<?php echo base_url("users/updateForm/$item->id")?>" class="btn btn-info">Güncelle</a>
                    </td>
                  </tr> 
                  <?php }?>
                    </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->