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
                            <a type='button' class='btn btn-danger text-white' href='../index.html'>Cancel <i class='fa fa-window-close' aria-hidden='true'></i></a>
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