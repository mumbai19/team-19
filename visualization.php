<!DOCTYPE html>
<html>
<head>
<title>Creating Dynamic Data Graph using PHP and Chart.js</title>
<style type="text/css">
BODY {
    width: 550PX;
}

#chart-container {
    width: 100%;
    height: auto;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>


</head>
<body>
    <div id="chart-container" class="container">
       <div class="container">
           <div class="row">
              
               <div style="min-height:400px;min-width:400px;padding-left:400px;"> 
                   <h2>Regional Analysis</h2>
        <canvas id="graphCanvas"></canvas>
               </div>
           </div>
       </div>
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

</body>
</html>