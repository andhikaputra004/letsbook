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

        <li class="active">
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

        <li  >
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
          <button type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#myModalTambah">
            Tambah Kategori
          </button>
        </div>
        <div class="collapse navbar-collapse">


          <!-- <form class="navbar-form navbar-right" role="search" action="<?php echo site_url('pelanggan/search');?>" method="post">
            <div class="form-group  is-empty">
              <input type="text" class="form-control" placeholder="Search" name="keyword">
              <span class="material-input"></span>
            </div>
            <button type="submit" class="btn btn-white btn-round btn-just-icon">
              <i class="material-icons">search</i><div class="ripple-container"></div>
            </button>
          </form> -->
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
                    <th>Id Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Action</th>
                  </thead>
                  <?php
                  $start = 0;
                  foreach ($list_kategori as $kategori)
                  {
                    ?>
                    <tbody>
                      <tr>
                        <td><?php echo $kategori->id_kategori ?></td>
                        <td><?php echo $kategori->nama_kategori ?></td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Ubah" class="btn  btn-simple btn-xs" data-toggle="modal" data-target="#myModal" onclick="updateKategori(<?php echo $kategori->id_kategori ?>)">
                            <i class="material-icons">edit</i>
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

<!-- Sart Modal Tamhah Data -->
<form action="<?php echo site_url('kategori/add');?>" method="post" enctype="multipart/form-data">
	<div class="modal fade" id="myModalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">

					<h4 class="modal-title">Tambah Kategori</h4>
				</div>
				<div class="modal-body">
					<div class="form-group label-floating">
						<label class="control-label">Nama Kategori</label>
						<input type="text" id="id_kategori" name="nama_kategori" class="form-control" required>
					</div>
				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-round">Tambah</button>
					<button type="button" class="btn btn-primary btn-round" data-dismiss="modal">Batal</button>
				</div>
			</div>
		</div>
	</div>
	</form>
	<!--  End Modal -->

<!-- Sart Modal Edit Data -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<form class="form" action="<?php echo site_url('kategori/update'); ?>" method="post" enctype="multipart/form-data">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Data Kategori</h4>
					<input type="hidden" name="id_kategori" />
				</div>
				<div class="modal-body">
          <div class="form-group">
              <label class="control-label">Nama Kategori</label>
              <input type="text" id="nama_kategori" name="nama_kategori" class="form-control" >
            </div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-round">Simpan Perubahan</button>
					<button type="button" onclick="unset_data()" class="btn btn-primary btn-round" data-dismiss="modal">Batal</button>
				</div>
			</div>
		</div>
	</form>
	</div>
	</div>
	<!--  End Modal -->


</div>

<script type="text/javascript">
function updateKategori(id_kategori)
{
  $.ajax({
        url : "<?php echo site_url('Web_Kategori_controller/ajax_edit')?>/" + id_kategori,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_kategori"]').val(data.id_kategori);
            $('[name="nama_kategori"]').val(data.nama_kategori);
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
