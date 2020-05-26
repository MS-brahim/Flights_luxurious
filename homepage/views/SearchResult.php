<!DOCTYPE html>
<html lang="en">
<head>
  
	  <title>Search | AirLux</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  	<link rel="stylesheet" href="assets/css/style.css">
	

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

	<!-- start content  -->
	<div class="container-fluid">
		<div class="position-relative">
			<!-- start carousel slides  -->
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" >
				<div class="carousel-inner" style="max-height:500px;">
					<div class="carousel-item active">
						<img class="d-block w-100" src="assets/airplanee.jpg" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="assets/airplane.jpg" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="assets/airplane2.jpg" alt="Third slide">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" style="width:5%;">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" style="width:5%;" >
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<!-- end carusel slides  -->

			<!-- start search from  -->
			<div class="position-absolute"  id="cntfrom">

				<div class="contentform" id="homepage">
					<div class="btn-group btn-group-justified" style="width:100%;" >			
						<div class="btn-group">
							<button id="button1" type="button" href="#SearchResult" class="btn btn-primary">Search by city</button>
						</div>
						<div class="btn-group">
							<button id="button2" type="button" href="#all" class="btn btn-primary">Search all flights</button>
						</div>
					</div>
					<hr />
					<!-- Start search Search Result  -->
					<div id="SearchResult">
						<form role="form" action="SearchResult.php" method="post">
							<div class="row">
								<div class="col-sm-6">
									<label for="from">From:</label>
									<input type="text" class="form-control" id="from" name="from" placeholder="From ..." required>
								</div>
								<div class="col-sm-6">
									<label for="to">To:</label>
									<input type="text" class="form-control" id="to" name="to" placeholder="To ..." required>
								</div>
							</div>
							<br>
							<div class="btn-group btn-group-justified">	
									<div class="btn-group">
										<button type="submit" class="btn btn-success">Submit</button>
									</div>
									<div class="btn-group">
										<button type="reset"  class="btn btn-info" value="Reset">Reset</button>
									</div>
							</div>
						</form>
					</div>
					<!-- end search Search Result  -->
				
					<!-- end search Search Result All  -->
					<div id="all">
						<form role="form" action="SearchResultAll.php" method="post">
							<div class="row"> 
								<div class="col-sm-6">
									<label for="selectdate">Select a date:</label>
									<input type="date" class="form-control" id="selectdate" name="selectdate" required>
								</div>
							</div>
							<br>
							<div class="row">   
								<div class="col-sm-6">
									<button type="submit" class="btn btn-primary">Show ALL</button>
								</div>
							</div> 
						</form>
					</div>	
					<!-- end search Search Result All  -->
				</div>	
			</div>
			<!-- end search from  -->
		</div>
	</div>


	<div class="container" id="rslt">    
		
		<h1>Search Result</h1>
		
		<?php include_once '../controllers/searchResult-controller.php' ?>

		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Flight</th>
						<th>Departure</th>
						<th>Arrival</th>
						<th>Departure Time</th>
						<th>Arrival Time</th>
						<th>Price</th>
						<th>Place Rest</th>
						<th> Reservation </th>
					</tr>
				</thead>
				<tbody>
				<?php while ($row = $result->fetch_assoc()) { ?>
					<tr>
						<td><?= $row['nom_vol'] ;?></td>
						<td><?= $row['departure'] ;?></td>
						<td><?= $row['arrival'] ;?></td>
						<td><?= $row['d_depart'] ;?></td>
						<td><?= $row['d_arrival'] ;?></td>
						<td><?= $row['prix'] ;?></td>
						<td><?= $row['place'] ;?></td>
						<td>
							<a class="btn btn-primary " href="reservation.php?id_vol=<?= $row['id_vol']; ?>">Show more</i></a>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
		
	</div>
	<!-- end content  -->

	<!-- start footer  -->
	<footer>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm">
					<img src="../views/assets/logo.png" width="100" alt="logo">
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


	<script src="assets/js/search.js"> </script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>