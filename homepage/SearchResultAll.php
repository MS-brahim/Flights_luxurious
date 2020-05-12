<!DOCTYPE html>
<html lang="en">
<head>
	<title>Airprice Company</title>
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
            <a class="navbar-brand" href="#"><img src="assets/logo.png" width= 120 alt="Flights Luxurious"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Confirmation</a>
                    </li>
                </ul>
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
							<button id="button1" type="button" href="#oneway" class="btn btn-primary">One-way</button>
						</div>
						<div class="btn-group">
							<button id="button2" type="button" href="#all" class="btn btn-primary">Search all flights</button>
						</div>
					</div>
					<hr />
					<!-- Start search Search Result One way -->
					<div id="oneway">
						<form role="form" action="SearchResultOneway.php" method="post">
							<div class="row">
								<div class="col-sm-6">
									<label for="from">From:</label>
									<input type="text" class="form-control" id="from" name="from" placeholder="City or Code" required>
								</div>
								<div class="col-sm-6">
									<label for="to">To:</label>
									<input type="text" class="form-control" id="to" name="to" placeholder="City or Code" required>
								</div>
							</div>
							<hr >
							<div class="row">
								<div class="col-sm">
									<label for="class">Class:</label>
									<select class="form-control" name="class">
										<option value="Economy">Economy</option>
										<option value="Business">Business</option>   
									</select>
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
					<!-- end search Search Result One way  -->
				
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
        <h1>Search Results</h1>

        <?php
        include_once 'dbconnect2.php';



        $selectdate = $_POST["selectdate"];


        global $sql, $availableNumber;

            $sql = "SELECT * 
                    FROM flight FL,  class C, airplane AP 
                    WHERE (FL.number = C.number) AND (FL.airplane_id = AP.ID) 
                    
                    ORDER BY FL.number";


        $result = mysqli_query($con,$sql);
        $rowcount = mysqli_num_rows($result);


        if($rowcount == 0){
            echo "<div class='alert alert-info'><strong>Search Result: </strong>".$rowcount." result</div>";
        }
        else{
        echo "<div class='alert alert-info'><strong>Search Result: </strong>".$rowcount." results</div>";

        echo "<div class='table-responsive'><table class='table table-hover'>
            <thead>
            <tr>
                <th>Flight</th>
                <th>Aircraft</th>
                <th width=120px;>Date</th>
                <th>Departure</th>
                <th>Departure Time</th>
                <th>Arrival</th>
                <th>Arrival Time</th>
                <th>Class</th>
                <th>Capacity</th>
                <th>Price</th>
                <th>Remain Seats</th>
                <th>Reservation</th>
            </tr>
            </thead>";
        while($row = mysqli_fetch_array($result)) {
            echo "<tbody><tr>";
            echo "<td>" . $row['number'] . "</td>";
            echo "<td>" . $row['company']." ".$row['type']. "</td>";
            echo "<td>" . $selectdate . "</td>";
            echo "<td>" . $row['departure'] . "</td>";
            echo "<td>" . $row['d_time'] . "</td>";
            echo "<td>" . $row['arrival'] . "</td>";
            echo "<td>" . $row['a_time'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['capacity'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            
        
                //calculate number of remain seats
                $seatreserved = "SELECT flightno, classtype, COUNT(*)
                            FROM book B
                            WHERE B.date = '".$selectdate."' AND B.flightno = '".$row['number']."'AND B.classtype ='".$row['name']."' AND paid=1
                            GROUP BY flightno, classtype";
                $reserved = mysqli_query($con, $seatreserved);   
                $reservedNumber = mysqli_fetch_array($reserved);
                
                $capacity = mysqli_query($con, "SELECT capacity FROM class C WHERE C.number='".$row['number']."' AND C.name= '".$row['name']."'");
                $capacityNumber = mysqli_fetch_array($capacity);


                if(mysqli_num_rows($reserved)>0){            
                    $availableNumber = $capacityNumber['capacity'] - $reservedNumber['COUNT(*)'];
                }else{
                    $availableNumber = $capacityNumber['capacity'];
                }
            
                echo "<td>".$availableNumber."</td>";
            
            if($availableNumber>0){
            echo '<td>
                <form action="shoppingcart.php" method="post">
                <input type="hidden" name="flightno" value="'.$row['number'].'">
                <input type="hidden" name="classtype" value="'.$row['name'].'">
                <input type="hidden" name="price" value="'.$row['price'].'">
                <input type="hidden" name="date" value="'.$selectdate.'">
                <input type="hidden" name="type" value="all">
                <button type="submit" class="btn btn-success">Add</button>
                </form>
                </td>';
            }else{
                echo "<td><button type='button' class='btn btn-warning' onclick='myFunction()'>Not Available</button></td>";
            }
            
            echo "</tr>";
        }
        echo " </tbody></table></div>";

        }


        //mysqli_free_result($result);

        mysqli_close($con);
        ?>  
    </div>
    <!-- end content   -->

    <!-- start footer  -->
    
    <!-- end footer  -->


    <!-- <script src="login.js"> </script> -->
    <script src="assets/js/search.js"> </script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>