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
          <button type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#myModalTambah">
            Tambah Penyelenggara
          </button>
        </div>
        <div class="collapse navbar-collapse">


          <form class="navbar-form navbar-right" role="search" action="<?php echo site_url('penyelenggara/search');?>" method="post">
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
                <h4 class="title">Penyelenggara</h4>
                <p class="category">Data Semua Penyelenggara</p>
              </div>
              <div class="card-content table-responsive">
                <table class="table">
                  <thead class="text-primary" >
                    <th>ID</th>
                    <th style="text-align:center">Logo</th>
                    <th>Nama Penyelenggara</th>
                    <th>Alamat Kantor</th>
                    <th>Status</th>
                    <th>Action</th>
                  </thead>
                  <?php
                  $start = 0;
                  foreach ($list_penyelenggara as $penyelenggara)
                  {
                    ?>
                    <tbody>
                      <tr >
                        <td><?php echo $penyelenggara->id_penyelenggara ?></td>
                        <td><img src="<?php echo base_url('images/penyelenggara/logo/'.$penyelenggara->logo_organisasi);?>" class="imgsiswa" width="50px" height="auto"></td>
                        <td><?php echo $penyelenggara->nama_organisasi ?></td>
                        <td><?php echo $penyelenggara->alamat ?></td>
                        <td><?php echo $penyelenggara->status ?></td>
                        <td class="td-actions text-right" >
                          <?php
                          
                          echo anchor(base_url().'penyelenggara/detail/'.$penyelenggara->id_penyelenggara,'<button type="button" rel="tooltip" title="Read More" class="btn btn-info btn-simple btn-xs">
                          <i class="material-icons">visibility</i>
                          </button>');
                          echo anchor(base_url().'penyelenggara/update/'.$penyelenggara->id_penyelenggara,'<button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-simple btn-xs">
                          <i class="material-icons">edit</i>
                          </button>');
                          
                          ?>
                          <button type="button" rel="tooltip" title="Ubah Data Kartu Identitas" class="btn btn-primary" data-toggle="modal" data-target="#myModalEditIdentitas" onclick="EditDataIdentitas(<?php echo $penyelenggara->id_penyelenggara ?>)">
														<i class="material-icons">contact_mail</i>
                          </button>
                          <button type="button" rel="tooltip" title="Ubah Data Bukti Legalitas" class="btn btn-primary" data-toggle="modal" data-target="#myModalEditLegalitas" onclick="EditDataLegalitas(<?php echo $penyelenggara->id_penyelenggara ?>)">
														<i class="material-icons">gavel</i>
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
<form action="<?php echo site_url('penyelenggara/add');?>" method="post" enctype="multipart/form-data">
	<div class="modal fade" id="myModalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">

					<h4 class="modal-title">Tambah Penyelenggara</h4>
				</div>
				<div class="modal-body">
					<div class="form-group label-floating">
						<label class="control-label">Nama Penyelenggara</label>
						<input type="text" id="nama_organisasi" name="nama_organisasi" class="form-control" required>
					</div>
					<div class="form-group label-floating">
						<label class="control-label">Nama Pengelola</label>
						<input type="text" id="nama_pengelola" name="nama_pengelola" class="form-control" >
					</div>
					<div class="form-group label-floating">
						<label class="control-label">E-mail</label>
						<input type="text" id="	email" name="email" class="form-control" required>
					</div>
					<div class="form-group label-floating">
						<label class="control-label">No Telepon</label>
						<input type="text" id="no_telepon" name="no_telepon" class="form-control" required>
					</div>
					<div class="form-group label-floating">
						<label class="control-label">Alamat Kantor</label>
						<input type="text" id="alamat" name="alamat" class="form-control" required>
					</div>
					<div class="form-group label-floating">
						<label class="control-label">Nama Bank</label>
						<input type="text" name="nama_bank" id="nama_bank"  class="form-control"required>
					</div>
          <div class="form-group label-floating">
						<label class="control-label">Nomor Rekening</label>
						<input type="text" name="nomor_rekening" id="nomor_rekening"  class="form-control"required>
					</div>
          <div class="form-group label-floating">
						<label class="control-label">Pemilik Rekening</label>
						<input type="text" name="nama_pemilik_rekening" id="nama_pemilik_rekening"  class="form-control"required>
					</div>
          <div class="form-group label-floating">
						<label class="control-label">Deskripsi Penyelenggara</label>
						<input type="text" name="deskripsi_penyelenggara" id="deskripsi_penyelenggara"  class="form-control"required>
					</div>
					<div class="input-group">
						<label>Logo Penyelenggara</label>
						<input type="file" class="btn btn-primary" name="logo_organisasi" id="logo_organisasi" required/>
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

  <!-- Sart Modal Edit Data Identitas -->
  <div class="modal fade" id="myModalEditIdentitas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form class="form" action="<?php echo site_url('penyelenggara/update_identitas'); ?>" method="post" enctype="multipart/form-data">
      <div class="modal-dialog">
        <div class="modal-content">

        <div class="modal-header">
					<h4 class="modal-title">Edit Data Identitas</h4>
					<input type="hidden" name="id_penyelenggara" />
        </div>
        
        <div class="modal-body">
					<div class="form-group">
						<label class="control-label">Nama Pengelola</label>
						<input type="text" id="nama_pengelola" name="nama_pengelola" class="form-control" disabled>
					</div>

        <div class="input-group">
          <label>Foto KTP</label>
          <input type="file" class="btn btn-primary" name="foto_kartu_identitas" id="foto_kartu_identitas"/>
        </div>

        <div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-round">Simpan Data</button>
					<button type="button" onclick="unset_data()" class="btn btn-primary btn-round" data-dismiss="modal">Batal</button>
				</div>
          
        </div>
      </div>
  	</form>
  </div>

  <!--  End Modal -->
  
  <!-- Sart Modal Edit Data Legalitas -->
  <div class="modal fade" id="myModalEditLegalitas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form class="form" action="<?php echo site_url('penyelenggara/update_legalitas'); ?>" method="post" enctype="multipart/form-data">
      <div class="modal-dialog">
        <div class="modal-content">

        <div class="modal-header">
					<h4 class="modal-title">Edit Data Identitas</h4>
					<input type="hidden" name="id_penyelenggara" />
        </div>
        
        <div class="modal-body">
					<div class="form-group">
						<label class="control-label">Nama Penyelenggara</label>
						<input type="text" id="nama_organisasi" name="nama_organisasi" class="form-control" disabled>
					</div>

        <div class="input-group">
          <label>Foto KTP</label>
          <input type="file" class="btn btn-primary" name="foto_legalitas" id="foto_legalitas"/>
        </div>

        <div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-round">Simpan Data</button>
					<button type="button" onclick="unset_data()" class="btn btn-primary btn-round" data-dismiss="modal">Batal</button>
				</div>
          
        </div>
      </div>
  	</form>
  </div>

	<!--  End Modal -->


</div>

<script type="text/javascript">

  function SaveId(id_penyelenggara)
  {
    //alert(id);
    $.ajax({
      type: "GET",
      url: "<?php echo site_url('penyelenggara/getid'); ?>",
      data: "id_penyelenggara="+id_penyelenggara
    }).done(function( msg ) {
    });
  }

  function EditDataIdentitas(id_penyelenggara)
  {
      //Ajax Load data from ajax
      $.ajax({
          url : "<?php echo site_url('Web_Penyelenggara_controller/ajax_edit')?>/" + id_penyelenggara,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
              $('[name="id_penyelenggara"]').val(data.id_penyelenggara);
              $('[name="nama_pengelola"]').val(data.nama_pengelola);
              $('[name="foto_kartu_identitas"]').val(data.foto_kartu_identitas);
              $('#myModalEditIdentitas').modal('show'); // show bootstrap modal when complete loaded
              //$('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error get data from ajax');
          }
      });
  }

  function EditDataLegalitas(id_penyelenggara)
  {
      //Ajax Load data from ajax
      $.ajax({
          url : "<?php echo site_url('Web_Penyelenggara_controller/ajax_edit')?>/" + id_penyelenggara,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
              $('[name="id_penyelenggara"]').val(data.id_penyelenggara);
              $('[name="nama_organisasi"]').val(data.nama_organisasi);
              $('[name="foto_legalitas"]').val(data.foto_legalitas);
              $('#myModalEditLegalitas').modal('show'); // show bootstrap modal when complete loaded
              //$('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error get data from ajax');
          }
      });
  }

  $(document).ready(function(){
    $("#buttonShowModal").click(function(){
        $("#addPenyelenggaraModal").modal();
    });
  });
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
