<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Personal Data Sheet - Home</title>
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="page-header custom-header">
	  <h1>Personal Data Sheet</h1>
	</div>
   	<div class="container-fluid">
   		<form method="post" action="<?php echo site_url('login/dologin');?>" >
		   	<div style="width:300px;margin: 0 auto;">
				<table class="table table-bordered">
					<tr>
						<th colspan="2">Login</th>
					</tr>
					<?php if(strlen($error) > 0) {?>
					<tr>
						<td colspan="2">
							<div class="alert alert-danger">
								<?php echo $error;?>
							</div>
						</td>
					</tr>
					<?php } ?>
					<tr>
						<td><strong>Username</strong></td>
						<td><input type="text" id="username" class="form-control input-md" name="username" /> </td>
					</tr>
					<tr>
						<td><strong>Password</strong></td>
						<td><input type="password" id="password" class="form-control input-md" name="password" /> </td>
					</tr>
					<tr>
						<td colspan="2"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" id="dologin" value="Login" class="btn btn-primary btn-lg" /></td>
					</tr>
				</table>
			</div>
		</form>
	</div>
</body>
</html>
