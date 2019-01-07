<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets_main/img/logo.png" />
  <link rel="icon" type="image/png" href="<?php echo base_url();?>assets_main/img/logo.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Halaman Masuk</title>

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">

</head>

<body>

  <form id="formLogin" class="form" action="<?php echo site_url('login');?>" method="post" enctype="multipart/form-data">
    <div class="login-form">
      <h1>Letsbook Login</h1>
      <div class="form-group ">
        <input type="text" class="form-control" placeholder="email" id="email" name="email">
        <i class="fa fa-user"></i>
      </div>
      <div class="form-group log-status">
        <input type="password" class="form-control" placeholder="Kata sandi" id="kata_sandi" name="kata_sandi">
        <i class="fa fa-lock"></i>
      </div>
      <span class="alert" id="error_message">Id Pengguna atau Katasandi Salah</span>
      <input type="submit" class="log-btn" value="Masuk"/>
    </div>
    <?php if (validation_errors()) {?>
						<ul style="color:red;">
							<?php echo validation_errors('<li>', '</li>') ?>
						</ul>
						<?php } ?>
    <?php 
    if(isset($_SESSION)) {
                        if($this->session->userdata('message')!='')
                        {
                            echo '<div class="alert alert-info"> ' .$this->session->userdata('message'). '</div>';
                        }
                    } ?>
  </form>
</body>
</html>
