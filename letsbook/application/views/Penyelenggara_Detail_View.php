<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets_main/img/logo.png" />
  <link rel="icon" type="image/png" href="<?php echo base_url();?>assets_main/img/logo.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Penyelenggara</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />


  <!-- Bootstrap core CSS     -->
  <link href="<?php echo base_url();?>assets_main/css/bootstrap.min.css" rel="stylesheet" />

  <!--  Material Dashboard CSS    -->
  <link href="<?php echo base_url();?>assets_main/css/material-dashboard.css" rel="stylesheet"/>

  <!--  CSS for Demo Purpose, don't include it in your project     -->
  <link href="<?php echo base_url();?>assets_main/css/demo.css" rel="stylesheet" />

  <!--     Fonts and icons     -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>

  <div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="<?php echo base_url();?>assets_main/img/sidebar-1.jpg">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
      Tip 2: you can also add an image using data-image tag

    -->

    <div class="logo">
      <a href="<?php echo base_url('index.php/dashboard');?>" class="simple-text">
        <?php echo $this->session->userdata('nama_admin')?>
      </a>
    </div>

    <div class="sidebar-wrapper">
      <ul class="nav">
        <li  class="active">
          <a href="<?php echo base_url();?>penyelenggara">
            <i class="material-icons">book</i>
            <p>Penyelenggara</p>
          </a>
        </li>

        <li >
          <a href="<?php echo base_url();?>kategori">
            <i class="material-icons">zoom_out_map</i>
            <p>Kategori</p>
          </a>
        </li>
        
        <li >
			<a href="<?php echo base_url();?>event">
            <i class="material-icons">movie</i>
            <p>Event</p>
          </a>
        </li>
        <li>

        <li >
			<a href="<?php echo base_url();?>eventselesai">
            <i class="material-icons">done_all</i>
            <p>Event Selesai</p>
          </a>
        </li>
        <li>
        <li>
					<a href="<?php echo base_url();?>pelanggan">
            <i class="material-icons">person</i>
            <p>Pelanggan</p>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url();?>transaksi">
            <i class="material-icons">attach_money</i>
            <p>Transaksi</p>
          </a>
        </li>
        <li >
          <a href="<?php echo base_url();?>transaksi/refund">
            <i class="material-icons">cached</i>
            <p>Transaksi Refund</p>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>logout">
            <i class="material-icons">assignment_return</i>
            <p>Keluar</p>
          </a>
        </li>
      </ul>
    </div>
  </div>

  <div class="main-panel">
    <nav class="navbar navbar-transparent navbar-absolute">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" >Detail Penyelenggara</a>
        </div>
        <!-- <div class="collapse navbar-collapse">
          <form class="navbar-form navbar-right" role="search">
            <div class="form-group  is-empty">
              <input type="text" class="form-control" placeholder="Search">
              <span class="material-input"></span>
            </div>
            <button type="submit" class="btn btn-white btn-round btn-just-icon">
              <i class="material-icons">search</i><div class="ripple-container"></div>
            </button>
          </form>
        </div> -->
      </div>
    </nav>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header" data-background-color="purple">
                <h4 class="title"><?php echo $nama_organisasi?></h4>
                <p class="category">Detail Penyelenggara</p>
              </div>
              <div class="card-content">
                <form>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group label-floating">
                        <label class="control-label">ID Penyelenggara</label>
                        <input type="text" value="<?php echo $id_penyelenggara; ?>"  class="form-control" disabled>
                      </div>
                    </div>
                    
                    <div class="col-md-9">
                      <div class="form-group label-floating">
                        <label class="control-label">nama_pengelola</label>
                        <input type="text" value="<?php echo $nama_pengelola; ?>" class="form-control" disabled>
                      </div>
                    </div>                    
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group label-floating">
                        <label class="control-label">Alamat</label>
                        <input type="text" value="<?php echo $alamat; ?>" class="form-control" disabled>
                      </div>
                    </div>      
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group label-floating">
                        <label class="control-label">E-mail</label>
                        <input type="text" value="<?php echo $email; ?>"  class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group label-floating">
                        <label class="control-label">Nomor Telepon</label>
                        <input type="text" value="<?php echo $no_telepon; ?>" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group label-floating">
                        <label class="control-label">Kata Sandi</label>
                        <input type="password" value="<?php echo $kata_sandi; ?>" class="form-control" disabled>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group label-floating">
                        <label class="control-label">Nama Bank</label>
                        <input type="text" value="<?php echo $nama_bank; ?>"  class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group label-floating">
                        <label class="control-label">Nomor Rekening</label>
                        <input type="text" value="<?php echo $nomor_rekening; ?>" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group label-floating">
                        <label class="control-label">Pemilik Rekening</label>
                        <input type="text" value="<?php echo $nama_pemilik_rekening; ?>" class="form-control" disabled>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group label-floating">
                        <label class="control-label">Deskripsi Penyelenggara</label>
                        <textarea class="form-control" rows="5" name="deskripsi_penyelenggara	" id="deskripsi_penyelenggara	" disabled required ><?php echo $deskripsi_penyelenggara	; ?></textarea>
                      </div>
                    </div>      
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                    <label class="control-label">Bukti Legalitas</label>
                      <div class="image"> 
                        <img src="<?php echo base_url('images/penyelenggara/legalitas/'.$foto_legalitas );?>" width="300px" height="auto" class="img-rounded"> 
                      </div>
                    </div>
                    <div class="col-md-6">
                    <label class="control-label">Kartu Identitas</label>
                      <div class="image"> 
                        <img src="<?php echo base_url('images/penyelenggara/identitas/'.$foto_kartu_identitas );?>" width="300px" height="auto" class="img-rounded"> 
                      </div>
                    </div>
                  </div>

                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-profile">
              <div class="card-avatar">
                <a>
                  <img  src="<?php echo base_url('images/penyelenggara/logo/'.$logo_organisasi);?>" width="100px"; height="auto";/>
                </a>
              </div>

              <div class="content">
                <h6 class="category text-gray">Penyelenggara</h6>
                <h4 class="card-title"><b><?php echo $nama_organisasi; ?></h4>
                <h6 class="category text-gray">Status</h6>
                <h4 class="card-title"><b><?php echo $status; ?></h4>
                <?php
                  echo anchor(base_url('penyelenggara/update/'.$id_penyelenggara),'<button href="#pablo" class="btn btn-primary btn-round">Edit Data Profile</button>');

                ?>
                <!-- <button class="btn btn-danger btn-round" data-toggle="modal" data-target="#myModal" onclick="getIdKatering(<?php echo $id_katering?>)">Hapus</button> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="footer">
      <div class="container-fluid">

        <p class="copyright pull-right">
          &copy; <script>document.write(new Date().getFullYear())</script> <a href="<?php echo base_url('index.php/dashboard');?>">Letsbook Admin</a>, Pangestu Kurniawan
        </p>
      </div>
    </footer>
  </div>
</div>


<!-- Sart Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Peringatan</h4>
      </div>
      <div class="modal-body">
        <p> Apakah anda yakin menghapus katering ini?
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-simple" onclick="deleteKatering()">Ya</button>
        <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>
<!--  End Modal -->

<script type="text/javascript">
var idKatering;

function getIdKatering(id)
{
  idKatering=id;
}

function deleteKatering()
{
  $.ajax({
    type: "GET",
    url: "<?php echo base_url(); ?>katering/delete/"+idKatering
  }).done(function(message) {
    window.location.href = "<?php echo site_url(); ?>katering";
  });
}

</script>

</body>

<!--   Core JS Files   -->
<script src="<?php echo base_url();?>assets_main/js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets_main/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets_main/js/material.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="<?php echo base_url();?>assets_main/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="<?php echo base_url();?>assets_main/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url();?>assets_main/js/material-dashboard.js"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url();?>assets_main/js/demo.js"></script>

</html>
