<?php include_once '../models/dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Price | AirLux</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/style.css">
	<script src="https://kit.fontawesome.com/8f45faa16b.js" crossorigin="anonymous"></script>
    
	

</head>
<body>
	<!-- start navbar  -->
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="../index.html"><img src="assets/logo.png" width=100></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Promotion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Voyage</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a href="" class="btn btn-light">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        Log in
                    </a>
                    &nbsp;
                    <div style="width:1px;background:black; height:25px;"></div>
                    &nbsp;
                    <a href="" class="btn btn-light">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                        Sign in
                    </a>
                </form>
            </div>
        </nav>
	</header>
    <!-- end navbar  -->

    <!-- start content reservation -->
    
    <?php include_once '../controllers/reservation-controller.php' ?>

    <!-- Modal -->
    <!-- <div class='modal fade' id='modelId' tabindex='-1' role='dialog' aria-labelledby='modelTitleId' aria-hidden='true'> -->
        <div class='container' id="infoForm" role='document'>
            <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>Enter your information</h5>
                    </div>
                <form action="" method="post">
                    <div class='modal-body'>
                    <?php
                    if(isset($_POST['submit'])){
                        $fname = htmlspecialchars(trim($_POST['fname'])); 
                        $lname = htmlspecialchars(trim($_POST['lname']));
                        $email = htmlspecialchars(trim($_POST['email']));
                        $phone = htmlspecialchars(trim($_POST['phone']));
                        $passport = htmlspecialchars(trim($_POST['num_passport']));
                        $errors = array();

                        if(strlen($fname)== 0){
                            $errors[] = "enter your firstname.";
                        }
                        if(strlen($lname)==0){
                            $errors[] = "enter your lasname.";
                        }
                        if(empty($email)){
                            $errors[] = "enter your email.";
                        }
                        if(strlen($phone)<= 8){
                            $errors[] = "enter your phone number.";
                        }
                        if(strlen($passport)<= 1){
                            $errors[] = "enter your passport.";
                        }
                    
                        if(count($errors) == 0){

                            $sql = "INSERT INTO client (nom, prenom, email, phone, num_passport) VALUE ('$fname', '$lname','$email' ,'$phone', '$passport')";
                            if(mysqli_query($con, $sql)){
                                echo "<p class='text-success'>The Request Was Successful.</p>";
                                
                            } 
                        }else{
                            echo "<p class='text-danger'> Please Complete Your Information *.</p>";
                        }
                        
                    }
                    ?>
                        <div class='container-fluid'>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <label for="">First name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="fname" placeholder='enter your firstname'>
                                        <small class="form-text text-danger"></small>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label class='form-label'>Last name <span class="text-danger">*</span></label>
                                        <input class='form-control' type='lastname' placeholder='enter your lastname' name='lname'>
                                    </div>
                                </div>
                                
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label class='form-label'>email <span class="text-danger">*</span></label>
                                        <input class='form-control' type='email' placeholder='enter your email' name='email'>
                                    </div>
                                </div>
                                
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label class='form-label'>Phone <span class="text-danger">*</span></label>
                                        <input class='form-control' type='tel' placeholder='your phone number' name='phone'>
                                    </div>
                                </div>
                                
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <label class='form-label'>passport number <span class="text-danger">*</span></label>
                                        <input class='form-control' type='text' placeholder='your passport number' name='num_passport'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <input type="submit" name="submit" class="btn btn-primary" value='reserver' >
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- end content reservatin  -->
    
    <!-- start footer  -->
	<footer>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm">
					<img src="assets/logo.png" width="100" alt="logo">
					<h3>About us</h3>
					<p> Dolores deleniti esse sit fuga sunt fugit numquam, unde soluta quae autem natus quam asperiores minima consequuntur repellendus similique? Eligendi, facere quod!</p>

				</div>
				<div class="col-sm">
					<label for="comment">Comment:</label>
					<textarea class="form-control" rows="5" id="comment"></textarea>
					<input type="submit" class="btn btn-info" value="Send Your Message" style="margin-top: 10px;">
				</div>
				<div class="col-sm">
					<div class="mu-footer-widget">
						<h4>Business Offers</h4>
						<ul class="list-group">
							<a href="" class="listOffers">Business trip</a><br>
							<a href="" class="listOffers">Beyond Business</a><br>
							<a href="" class="listOffers">Meetings and conferences</a>
						</ul>
						
						
					  </div>
				</div>
				<div class="col-sm-2">
					<h3>Follow us</h3>
					<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, et cumque iure cum sint accusantium praesentium recusandae </p>
					<div class="row justify-content-around">
						<i class="fa fa-whatsapp" aria-hidden="true"></i>
						<i class="fa fa-linkedin" aria-hidden="true"></i>
						<i class="fa fa-twitter" aria-hidden="true"></i>
						<i class="fa fa-facebook" aria-hidden="true"></i>
						<i class="fa fa-instagram" aria-hidden="true"></i>
					</div>
				</div>
			</div>
			
		</div>
		<div class="col" style="margin-top: 40px;background-color: gainsboro;">
			<p>Copyright-2020 ©  By : You<span style="color:blue">code</span> Safi</p>
		</div>
	</footer>
	<!-- end footer  -->


    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            
            
        });
    </script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>