<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets_main/img/logo.png" />
  <link rel="icon" type="image/png" href="<?php echo base_url();?>assets_main/img/logo.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Pelanggan</title>

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
        <li>
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

        <li  class="active">
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
        </div>
        <div class="collapse navbar-collapse">


          <form class="navbar-form navbar-right" role="search" action="<?php echo site_url('pelanggan/search');?>" method="post">
            <div class="form-group  is-empty">
              <input type="text" class="form-control" placeholder="Search" name="keyword">
              <span class="material-input"></span>
            </div>
            <button type="submit" class="btn btn-white btn-round btn-just-icon">
              <i class="material-icons">search</i><div class="ripple-container"></div>
            </button>
          </form>
        </div>
      </div>
    </nav>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header" data-background-color="purple">
                <h4 class="title">Pelanggan</h4>
                <p class="category">Data Semua Pelanggan</p>
              </div>
              <div class="card-content table-responsive">
                <table class="table">
                  <thead class="text-primary">
                    <th>Id</th>
                    <!-- <th>Foto Pelanggan</th> -->
                    <th>Nama Pelanggan</th>
                    <th>E-mail</th>
                    <th>Saldo</th>
                    <th>Status</th>
                    <th>Action</th>
                  </thead>
                  <?php
                  $start = 0;
                  foreach ($list_pelanggan as $pelanggan)
                  {
                    ?>
                    <tbody>
                      <tr>
                        <td><?php echo $pelanggan->id_pelanggan ?></td>
                        <!-- <td><img src="<?php echo base_url('images/pelanggan/'.$pelanggan->foto_profile);?>" class="imgsiswa" width="75px" height="auto"></td> -->
                        <td><?php echo $pelanggan->nama_pelanggan ?></td>
                        <td><?php echo $pelanggan->email ?></td>
                        <td><?php echo $pelanggan->saldo ?> </td>
                        <td><?php echo $pelanggan->status ?></td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Read More" class="btn btn-info btn-simple btn-xs" onclick="ViewData(<?php echo $pelanggan->id_pelanggan ?>)">
                                <i class="material-icons">visibility</i>
                            </button>
                            <button type="button" rel="tooltip" title="Reset Password" class="btn btn-danger btn-simple btn-xs" data-toggle="modal" data-target="#myModal" onclick="updatePassword(<?php echo $pelanggan->id_pelanggan ?>)">
                            <i class="material-icons">vpn_key</i>
													  </button>
                          
                        </td>
                      </tr>
                    </tbody>
                    <?php
                  }
                  ?>
                </table>

              </div>
            </div>
            <div class="text-center">
              <ul class="pagination pagination-info">
                <?php
                echo $this->pagination->create_links();
                ?>
              </ul>
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

<!-- Sart Modal Edit Data -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<form class="form" action="<?php echo site_url('pelanggan/resetPassword'); ?>" method="post" enctype="multipart/form-data">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Reset Password Pelanggan</h4>
					<input type="hidden" name="id_pelanggan" />
				</div>
				<div class="modal-body">
        <div class="form-group label-floating">
						<label class="control-label">Yakin Reset Password Pelanggan Ini?</label>
						<input type="hidden" id="kata_sandi" name="kata_sandi" class="form-control" required >
					</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-round">Simpan Data</button>
					<button type="button" onclick="unset_data()" class="btn btn-primary btn-round" data-dismiss="modal">Batal</button>
				</div>
			</div>
		</div>
	</form>
	</div>
	</div>
	<!--  End Modal -->
<!-- Sart Modal Read More -->
<div class="modal fade" id="myModalReadMore" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<i class="material-icons">clear</i>
					</button>
					<h4 class="modal-title">Detail Donatur</h4>
				</div>
				<div class="modal-body">
					<div class="card card-profile">
						<div class="card-avatar">
							<a href="#pablo">
								<img class="imgberita"  name="foto_profile" src="<?php echo base_url('images/pelanggan/') ;?>" width="100%"; height="auto"; />
							</a>									
						</div>
						<div class="content">
              <h6 class="category text-gray">Data Profile</h6>
              <h4 class="card-title" name="nama_pelanggan"></h4>
              <h4 class="card-title" name="no_telepon"></h4>
              <h4 class="card-title" name="email"></h4>
              <h4 class="card-title"  name="saldo"></h4>
              <h4 class="card-title" name="status"></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--  End Modal -->

</div>

<script type="text/javascript">

function ViewData(id_pelanggan)
{
	var foto;
	$.ajax({
        url : "<?php echo site_url('Web_Pelanggan_controller/ajax_edit')?>/" + id_pelanggan,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			      $('[name="nama_pelanggan"]').text(data.nama_pelanggan);
            $('[name="no_telepon"]').text(data.no_telepon);
            $('[name="email"]').text(data.email);
            $('[name="saldo"]').text(data.saldo);
            $('[name="status"]').text(data.status);
		      	$('[name="foto_profile"]').attr('src',"<?php echo base_url();?>images/pelanggan/"+data.foto_profile);
            $('#myModalReadMore').modal('show'); // show bootstrap modal when complete loaded
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
function updatePassword(id_pelanggan)
{
  $.ajax({
        url : "<?php echo site_url('Web_Pelanggan_controller/ajax_edit')?>/" + id_pelanggan,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_pelanggan"]').val(data.id_pelanggan);
            $('[name="kata_sandi"]').val(data.kata_sandi);
            $('#myModal').modal('show'); // show bootstrap modal when complete loaded
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
</script>

</body>

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

<script type="text/javascript">
$(document).ready(function(){

  // Javascript method's body can be found in assets/js/demos.js
  demo.initDashboardPageCharts();

});
</script>

</html>
