<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Yeni Marka İşlemleri</h1>
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
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Ekleme formu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="<?php echo base_url("users/save")?>">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="email" id="email" placeholder=" Eposta Giriniz">
                    </div>
                  </div>
                  <?php if(isset($formError)){?>
                      <small> <?php echo form_error("email");?></small>
                  <?php }?>
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Ad</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" id="name" placeholder=" Adınızı Giriniz">
                    </div>
                  </div>
                  <?php if(isset($formError)){?>
                      <small> <?php echo form_error("name");?></small>
                  <?php }?>
                  <div class="form-group row">
                    <label for="surname" class="col-sm-2 col-form-label">Soyad</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="surname" id="surname" placeholder=" Soyadınızı Giriniz">
                    </div>
                  </div>
                  <?php if(isset($formError)){?>
                      <small> <?php echo form_error("surname");?></small>
                  <?php }?>
                  <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Şifre</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="password" id="password" placeholder=" Şifrenizi Giriniz">
                    </div>
                  </div>
                  <?php if(isset($formError)){?>
                      <small> <?php echo form_error("password");?></small>
                  <?php }?>
                  <div class="form-group row">
                    <label for="re-password" class="col-sm-2 col-form-label">Şifre Tekrar</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="re-password" id="re-password" placeholder=" Şifre Tekrarı Giriniz">
                    </div>
                  </div>
                </div>                
                  <?php if(isset($formError)){?>
                      <small> <?php echo form_error("re-password");?></small>
                  <?php }?>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Kaydet</button>
                  <a href="<?php echo base_url("users")?>" class="btn btn-default float-right">İptal</a>
                </div>
                <!-- /.card-footer -->
              </form>
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