<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Personal Data Sheet - Home</title>
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<?php
		if(!$this->session->userdata('UserID')){ redirect('login/index'); }
	?>
	<div class="page-header custom-header">
	  <h1>Personal Data Sheet</h1>
	</div>
	<div class="logout-container">
		<div class="btn-group">
		  <button type="button" class="btn btn-default" />Welcome, <?php echo $this->session->userdata('Username');?></button>
		  <a class="btn btn-danger" href="<?php echo site_url('login/logout');?>">Log Out</a>
		</div>
	</div>
   	<div class="container-fluid">
   		<div class="well" style="margin: 0 auto;width: 300px;">
   			<?php if($this->session->userdata('AssociatedPDS') > 0) {?>
   				<a href="<?php echo site_url('pds/edit/'.$this->session->userdata('AssociatedPDS'));?>" class="btn btn-primary btn-lg btn-block">Edit My PDS</a>
   			<?php } else {?>
   				<a class="btn btn-primary btn-lg btn-block" href="<?php echo site_url('pds/index');?>">Add PDS</a>
   			<?php }?>
   		</div>
	</div>
</body>
</html>