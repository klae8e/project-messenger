<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="styles/mainstyle.css" rel="stylesheet" type="text/css" >
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title>Sign up</title>
	<link rel="shortcut icon" href="images/favicon.ico">
</head>
<body style="background-color:#B4D3D6;">
	  <?php
    include "connect.php";

    if (isset($_SESSION['user'])) {
      header("Location: mainpage.php");exit();
    }
    else{
	        ?>	
	        <div id="" class="container-fluid">
              <div id="" class="container-fluid">
              		<h1 id="plable3" class="text-center my-5">MESSENGER</h1>
									

                <div id="" class="container bgcl2r">
                  <div id="" class="row text-center">
										
										<div class="col-sm-3"></div>
										<div class="col-sm-6 my-2">
											<h6 id="plable4" class="text-center">REGISTRATION</h6>
											<form method="POST" action="signup.php" class="col-sm-12 py-3">

												<div class="text-center col-sm-12">
													<input minlength="4" class="inpts form-control text-center py-3 my-3" style="font-size: 1.8em;" type="text" name="login" id="login" placeholder="Enter login:" pattern="[a-zA-Z]{1,}" required>
												</div>

												<div>
													<input minlength="6" class="inpts form-control text-center py-3 my-3" style="font-size: 1.8em;" type="password" name="pass" id="pass" placeholder="Enter password:" required>
												</div>
												
												<div>
													<input minlength="6" class="inpts form-control text-center py-3 my-3" style="font-size: 1.8em;" type="password" name="pass2" id="pass2" placeholder="Enter password again:" required>
												</div>

												<div>
													<input minlength="6" class="inpts form-control text-center py-3 my-3" style="font-size: 1.8em;" type="text" name="email" id="email" type="submit" placeholder="Enter email:" required>
												</div>

												<div class=""><button id="sigtn" class="text-center my-3" type="submit">Sign up!</button></div>
											</form>

										<div class=" col-sm-12 text-center">
											<a id="plable5" href="index.php">Already registered?</a>
										</div>

										</div>
										<div class="col-sm-3"></div>
							<div>
								<p id="plable6" class="py-3 my-3">
									<?php
										if (isset($_SESSION['message'])) {
											echo $_SESSION['message'];
										}
										unset($_SESSION['message']);
									?>
								</p>
							</div>
							
						</div>
					</div>

				</div>
			</div>

	        <?php
	  }
	?>

</body>
</html>