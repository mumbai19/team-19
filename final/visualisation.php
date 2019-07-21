<?php

include_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    </head>
    <body>
       
       <div id="wrapper">
    
            <!-- Navigation -->
   <?php include_once("sidebar.php"); ?>
           
   
            <!-- Page Content -->
            <div id="page-wrapper" style="width:100%;">
               <?php   include_once("navbar.php");  ?>
               <div class="container">
                  
                          <div id="chart-container" class="container">
                   <div class="container">
                       <div class="row">

                           <div class="col-lg-4 float-right" > 
                               <h2>Regional Analysis</h2>
                    <canvas id="graphCanvas"></canvas>
                           </div>
                       </div>
                   </div>
                </div>

          
                </div>


                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
       <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("ajaxreturner.php",
                function (data)
                {
                    console.log(data);
                    var array = JSON.parse(data);
                     var name = [];
                    var number = [];

                    for (var i in array) {
                        console.log(array[i]);
                        name.push(array[i].region);
                        number.push(array[i].products);
                    }
                    

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Regional Analysis',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: number
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
        </script>

       
<!--            <script src="hide.js"></script>-->
   
    </body>
</html>

