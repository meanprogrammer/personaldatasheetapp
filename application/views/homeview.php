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
		$personals = $pinfo->result(); 
	?>
	<div class="page-header custom-header">
	  <h1>ICS - Personal Data Sheet</h1>
	</div>
	<div class="logout-container">
		<div class="btn-group">
		  <button type="button" class="btn btn-default" />Welcome, <?php echo $this->session->userdata('Username');?></button>
		  <a class="btn btn-danger" href="<?php echo site_url('login/logout');?>">Log Out</a>
		</div>
	</div>
   	<div class="container-fluid">
   	<table class="table table-bordered table-striped">
   	<tr>
   		<td colspan="4"></td>
   		<td>Surname</td>
   		<td>Firstname</td>
   		<td>Middlename</td>
   		<td>Ext.Name</td>
   		<td>Birthdate</td>
   		<td>Sex</td>
   		<td>Civil Status</td>
   		<td>Owned By</td>
   	</tr>
	   	<?php foreach ($personals as $p) {
	   		?>
	   		<tr>
	   			<td width="30"><a class="btn btn-default btn-sm" href="<?php echo site_url("pds/detail/").'/'.$p->RecordID; ?>">Detail</a></td>
	   			<td width="30"><a class="btn btn-primary btn-sm"  href="<?php echo site_url("pds/edit/").'/'.$p->RecordID; ?>">Edit</a></td>
	   			<td width="30"><a class="btn btn-danger btn-sm" onclick="return beforedelete();" href="<?php echo site_url("pds/delete/").'/'.$p->RecordID; ?>">Delete</a></td>
	   			<td width="30"><a class="btn btn-default btn-sm" onclick="return print('<?php echo site_url('pds/detail/').'/'.$p->RecordID.'/printpdsview';?>');">Print</a></td>
	   			<td><?php echo $p->Surname; ?></td>
	   			<td><?php echo $p->Firstname; ?></td>
	   			<td><?php echo $p->Middlename; ?></td>
	   			<td><?php echo $p->ExtensionName; ?></td>
	   			<td><?php echo $p->DateOfBirth; ?></td>
	   			<td><?php echo $p->Sex; ?></td>
	   			<td><?php echo $p->CivilStatus; ?></td>
	   			<td><?php echo $p->Username; ?></td>
	   		</tr>
	   		<?php 
	   	}?>
   	</table>
	<a href="<?php echo site_url('pds/index')?>" class="btn btn-primary md" style="width: 150px;">Add PDS</a>
	</div>
</body>
</html>
	<script type="text/javascript">
		function beforedelete(){
			if(confirm('Are you sure you want to delete the record?')){
				return true;
			}
			else
			{ return false; }
		}

		function print(url){
			window.open(url, '_blank', 'fullscreen=yes,location=no,scrollbars=yes', false);
		}
	</script>