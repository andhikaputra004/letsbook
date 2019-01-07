 <!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets_main/img/logo.png" />
  <link rel="icon" type="image/png" href="<?php echo base_url();?>assets_main/img/logo.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Detail Katering</title>

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
        <li  >
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
        <li  class="active">
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
                <h4 class="title"><?php echo $nama_pelanggan?>/<?php echo $nama_event?>/<?php echo $id_transaksi?></h4>
                <p class="category">Detail Transaksi</p>
              </div>
              <div class="card-content">
                <form>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group label-floating">
                        <label class="control-label">Nomor Pesanan</label>
                        <input type="text" value="<?php echo $id_transaksi; ?>"  class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group label-floating">
                        <label class="control-label">Waktu Transaksi</label>
                        <input type="text" value="<?php echo $waktu_transaksi; ?>" class="form-control" disabled>
                      </div>
                    </div> 
                    <div class="col-md-3">
                      <div class="form-group label-floating">
                        <label class="control-label">Status Tiket</label>
                        <input type="text" value="<?php echo $status_tiket; ?>" class="form-control" disabled>
                      </div>
                    </div> 
                  </div>
                  
                  <div class="row">

                    <div class="col-md-2">
                      <div class="form-group label-floating">
                        <label class="control-label">Jumlah Tiket</label>
                        <input type="text" value="<?php echo $jumlah_tiket; ?>" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group label-floating">
                        <label class="control-label">Harga Tiket</label>
                        <input type="text" value="<?php echo $harga_tiket; ?>" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group label-floating">
                        <label class="control-label">Biaya Pelayanan</label>
                        <input type="text" value="<?php echo $biaya_pelayanan; ?>" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group label-floating">
                        <label class="control-label">Total Transaksi</label>
                        <input type="text" textstyle="bold" value="<?php echo $total_tagihan; ?>" class="form-control" disabled>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-group label-floating">
                        <label class="control-label">iD Event</label>
                        <input type="text" value="<?php echo $id_event; ?>"  class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="form-group label-floating">
                        <label class="control-label">Nama Event</label>
                        <input type="text" value="<?php echo $nama_event; ?>" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group label-floating">
                        <label class="control-label">Tanggal Event</label>
                        <input type="text" value="<?php echo $tanggal_event; ?>" class="form-control" disabled>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group label-floating">
                        <label class="control-label">Penyelenggara</label>
                        <input type="text" value="<?php echo $nama_organisasi; ?>"  class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group label-floating">
                        <label class="control-label">Izin Refund</label>
                        <input type="text" value="<?php echo $izin_refund; ?>" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group label-floating">
                        <label class="control-label">Status Event</label>
                        <input type="text" value="<?php echo $status_event; ?>" class="form-control" disabled>
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
                  <img  src="<?php echo base_url('images/pelanggan/'.$foto_profile);?>" width="150px"; height="auto";/>
                </a>
              </div>

              <div class="content">
                <h6 class="category text-gray">Pelanggan</h6>
                <h4 class="card-title"><b><?php echo $id_pelanggan; ?></h4>                
                <h4 class="card-title"><b><?php echo $nama_pelanggan; ?></h4>                
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
