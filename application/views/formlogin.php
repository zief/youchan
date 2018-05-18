<html>

<head>
<title><?php echo $judulform ?></title>

</head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/asset/css/bootstrap.css">
<body>

<div class="container">
<div class="row">
<div class="col-xs-8 col-sm-6 col-md-5 col-lg-4">
<h4><?php echo $judul ?> </h4>

	<div class="well">
		<div class="form-group">
			<label class="control-label">Username</label>
			<input class="form-control" type="text" name="" placeholder="Username...">

		</div>

		<div class="form-group">
			<label class="control-label">Password</label>
			<input class="form-control" type="password" name="" placeholder="Password...">
			<span id="pesan"></span>
		</div>

		<div class="form-group">
			<button class="btn btn-info" type="submit">
			<span class="glyphicon glyhicon-log-in"></span> Login </button>

			<button class="btn btn-default" type="reset">Batal</button>

		</div>

	</div>
</div>
</div>
</div>
</body>
</html>