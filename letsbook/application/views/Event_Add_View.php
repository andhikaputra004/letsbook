<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets_main/img/logo.png" />
  <link rel="icon" type="image/png" href="<?php echo base_url();?>assets_main/img/logo.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Tambah  Event</title>

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
        
        <li class="active">
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
          <!-- <a class="navbar-brand" >Edit Data Penyelenggara</a> -->
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
            <form action="<?php echo site_url('event/add');?>" method="post" enctype="multipart/form-data">
              <div class="card">

                <div class="card-header" data-background-color="purple">
                  <h4 class="title">Tambah Event</h4>
                  <p class="category">Isi data dengan lengkap dan benar</p>
                </div>

                <div class="card-content">
                  <form>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group label-floating">
                            <label class="control-label">Nama Event</label>
                            <input type="text" class="form-control" name="nama_event" id="nama_event" >
                          </div>
                        </div>      
                        
                      </div>

                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <tr>
                            <label class="control-label">Penyelenggara</label>
                              <div >
                                <select name="id_penyelenggara" id="id_penyelenggara" style="width: col-md-8;" class="form-control">
                                  <option value="pilih">Pilih</option>
                                  
                                  <?php
                                  foreach($all_penyelenggara as $data => $value){ // Lakukan looping pada variabel siswa dari controller
                                    echo "<option value='".$value->id_penyelenggara."'>".$value->nama_organisasi."</option>";
                                  }
                                  ?>
                                </select>
                              </div>
                            </tr>
                          </div>
                        </div> 
                       
                        <div class="col-md-4">
                        <div class="form-group">
                            <tr>
                            <label class="control-label">Kategori</label>
                              <div  >
                                <select name="id_kategori" id="id_kategori" style="width: col-md-4;" class="form-control">
                                  <option value="">Pilih</option>
                                  
                                  <?php
                                  foreach($all_Kategori as $data => $value){ // Lakukan looping pada variabel siswa dari controller
                                    echo "<option value='".$value->id_kategori."'>".$value->nama_kategori."</option>";
                                  }
                                  ?>
                                </select>
                              </div>
                            </tr>
                          </div>
                        </div> 
                      </div>

                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Lokasi</label>
                                  <textarea class="form-control" rows="1" name="lokasi" id="lokasi" required > </textarea>
                              </div>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group ">
                            <label class="control-label">Harga TIket</label>
                            <input type="number" class="form-control" name="harga_tiket" id="harga_tiket" required>
                          </div>
                        </div> 
                        <div class="col-md-4">
                          <div class="form-group ">
                            <label class="control-label">Biaya Pelayanan</label>
                            <input type="number" class="form-control" name="biaya_pelayanan" id="biaya_pelayanan" required>
                          </div>
                        </div> 
                        <div class="col-md-4">
                          <div class="form-group ">
                            <label class="control-label">Quota Peserta</label>
                            <input type="number" class="form-control" name="quota_peserta" id="quota_peserta" required>
                          </div>
                        </div> 
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group ">
                            <label class="control-label">Link Lokasi</label>
                            <input type="text" class="form-control" name="link_lokasi" id="link_lokasi" required>
                          </div>
                        </div> 

                        <div class="col-md-3">
                          <div class="form-group ">
                            <label class="control-label">Tanggal Penyelenggaraan</label>
                            <input type="date" class="form-control" name="tanggal_event" id="tanggal_event" required>
                          </div>
                        </div> 
                        <div class="col-md-3">
                          <div class="form-group ">
                            <label class="control-label">Waktu Kegiatan</label>
                            <input type="time" class="form-control" name="jam_event" id="jam_event" required>
                          </div>
                        </div> 
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <label>Poster Event</label>
                          <div class="input-group">
                            <input type="file" class="btn btn-primary" name="gambar_poster" id="gambar_poster" require/>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group ">
                            <label class="control-label">Kontak Informasi</label>
                            <textarea class="form-control" rows="auto" name="kontak_informasi" id="kontak_informasi" required > </textarea>
                          </div>
                        </div> 
                      </div>

                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Keterangan</label>
                                  <textarea class="form-control" rows="5" name="keterangan_event" id="keterangan_event" required > </textarea>
                              </div>
                          </div>
                      </div>
                      
                      
                      <button type="submit" class="btn btn-primary pull-right"><?php echo "Simpan" ?></button>
                        <a href="<?php echo site_url('event') ?>" class="btn btn-primary pull-right">Cancel</a>
                      <div class="clearfix"></div>

                  </form>
                </div>
              </div>
            </form>
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



<script type="text/javascript">
var idPenyelenggara;

function getIdKatering(id)
{
  idKatering=id;
}

function EditData(id_bank)
{
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('Bank_controller/ajax_edit')?>/" + id_bank,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_bank"]').val(data.id_bank);
            $('[name="nama_bank"]').val(data.nama_bank);
            $('#myModalEdit').modal('show'); // show bootstrap modal when complete loaded
            //$('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
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
