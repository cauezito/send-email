<?php 
	$code = null;
	$message = null;
	if(isset($_GET['code'])){
		$code = $_GET['code'];
		$message = $_GET['message'];
	}
?>

<html>
	<head>
		<meta charset="utf-8" />
    	<title>Send email</title>

    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	</head>

	<body>

		<div class="container bg-light">  

			<div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="img/logo.png" alt="" width="72" height="72">
				<h2>Send email</h2>
				<p class="lead">
					Simple email sending
				</p>
			</div>

      		<div class="row">
      			<div class="col-md-12">
				  <?php if($code != null && $code == '1'){ ?>
					<div class="alert alert-success" role="alert">
				  		<?php echo($message);?>	
				  	</div>
					<?php } elseif($code != null && $code == '2'){ ?> 
						<div class="alert alert-danger" role="alert">
				  		<?php echo($message);?>	
				  	</div>
					<?php } ?>
				  
				  
					<div class="card-body font-weight-bold">
						<form action="email_processing.php" method="POST">
							<div class="form-group">
								<label for="to">To</label>
								<input type="text" name="to" class="form-control" id="to" placeholder="name@domain.com.br">
							</div>

							<div class="form-group">
								<label for="subject">Subject</label>
								<input type="text" name="subject" class="form-control" id="subject">
							</div>

							<div class="form-group">
								<label for="msg">Message</label>
								<textarea class="form-control"  name="message" id="msg"></textarea>
							</div>

							<button type="submit" class="btn btn-primary btn-lg">Go!</button>
						</form>
					</div>
				</div>
      		</div>
      	</div>

	</body>
</html>