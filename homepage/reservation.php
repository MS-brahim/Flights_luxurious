<?php include_once 'dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Airprice Company</title>
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
            <a class="navbar-brand" href="index.html"><img src="assets/logo.png" width=100></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Reservation</a>
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
    
    <?php
        $id = $_GET['id_vol'];
        $sql2 = "SELECT * FROM vols WHERE id_vol= " .$_GET['id_vol'];
        $result = $con->query($sql2);
        
        while($row = $result->fetch_assoc()){
            echo"
                <div class='container'>
                    <div class='jumbotron text-center'>
                        <div class='row'>
                            <h2 class='col text-primary'>" .$row['departure']. " <img src='assets/depart.png' width=80></h2>
                            <h3 class='col'>To</h3>
                            <h2 class='col text-primary'>" .$row['arrival']. " <img src='assets/arrival.png' width=80></h2>
                        </div>
                    </div>
                    <div class='jumbotron'>
                        <div class='text-center' style='margin-bottom:30px;'>
                            <a type='button' class='btn btn-danger text-white' href='index.html'>Cancel <i class='fa fa-window-close' aria-hidden='true'></i></a>
                            <a type='button' class='btn btn-primary text-white' data-toggle='modal' data-target='#modelId' >Reservation <img src='assets/depart.png' width=20></a>
                        </div>
                        <div style='margin:0 100px;'>
                        <div class='row'>
                            <h5> Flight : </h5><h5 class='text-primary'> &nbsp;" .$row['nom_vol']. "</h5>
                        </div>
                        <hr>
                        <div class='row'>
                            <h5> Departure : </h5><h5 class='text-primary'> &nbsp;" .$row['d_depart']. "</h5>
                        </div>
                        <hr>
                        <div class='row'>
                            <h5> Arrival : </h5><h5 class='text-primary'> &nbsp;" .$row['d_arrival']. "</h5>
                        </div>
                        <hr>
                        <div class='row'>
                            <h5> Price : </h5><h5 class='text-primary'> &nbsp;" .$row['prix']. "</h5>
                        </div>
                        <hr>
                        <div class='row'>
                            <h5> Place : </h5><h5 class='text-primary'> &nbsp;" .$row['place']. "</h5>
                        </div>
                        </div>
                    </div>
                </div>
            ";
        }
    ?>

    <!-- Modal -->
    <div class='modal fade' id='modelId' tabindex='-1' role='dialog' aria-labelledby='modelTitleId' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                    <div class='modal-header'>
                            <h5 class='modal-title'>Modal title</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                        </div>
                <form action="" method="post">
                    <div class='modal-body'>
                        <div class='container-fluid'>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <span class='form-label'>First name</span>
                                        <input class='form-control' type='firstname' placeholder='first name' name='First_name'>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <span class='form-label'>Last name</span>
                                        <input class='form-control' type='lastname' placeholder='last name' name='Last_name'>
                                    </div>
                                </div>
                                
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <span class='form-label'>mail</span>
                                        <input class='form-control' type='email' placeholder='name' name='mail'>
                                    </div>
                                </div>
                                
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <span class='form-label'>Phone</span>
                                        <input class='form-control' type='tel' placeholder='Phone' name='Phone'>
                                    </div>
                                </div>
                                
                                <div class='col-md-6'>
                                    <div class='form-group'>
                                        <span class='form-label'>passport number</span>
                                        <input class='form-control' type='text' placeholder='passport number' name='passportnumber'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <input type="submit" class="btn btn-primary" name='submit' value='reserve'>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php


        if(isset($_POST['submit'])){
            $First_name = $_POST['First_name'];
            $Last_name = $_POST['Last_name'];
            $Phone = $_POST['Phone'];
            $mail = $_POST['mail'];
            $passportnumber =  $_POST['passportnumber'];

            //QUERY
            $query = mysqli_query($con , "INSERT INTO client (nom ,prenom ,phone ,  email, num_passport  ) VALUES('$First_name','$Last_name','$Phone','$mail','$passportnumber')");
            if($query){
            $_SESSION['success'] = 'your reservation has been submitted';
            $_SESSION['id'] = $con->insert_id;

            }else{
                $_SESSION['error'] = 'sorry , check your inputs for error';
            }
        
        }
    ?>
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

<!-- 
    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM
            
        });
    </script> -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>