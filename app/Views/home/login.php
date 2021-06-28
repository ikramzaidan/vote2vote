<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>Login</title>

	<link href="<?=$bootstrap?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?=$css?>/sb-admin-2.css" rel="stylesheet" type="text/css">

</head>

<body>
	<div class="container">
		<div class="row justify-content-center">
		<div class="card my-5 col-lg-5">
			<div class="card-body">
				<?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                <?php endif;?>
				<form action="/login/auth" method="post">
					<div class="form-group">
						<input type="text" class="form-control" name="username" placeholder="Username">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<div class="form-group">
						<button type="submit" class="form-control btn btn-primary">Login</button>
					</div>
				</form>
			</div>
		</div>
		</div>
	</div>
</body>

</html>