<?php
ob_start();
    session_start();
    include_once "includes/conn.php";
    include_once "includes/loginsession.php";
    include_once "includes/dash-sidebar.php";
    $querychart = mysqli_query($conn, "SELECT sum(rating_num) y,full_name label 
    FROM  sys_rating join sys_task on task=task_id join sys_users on assigned_to=id 
    WHERE rating_date BETWEEN  DATE_SUB(CURRENT_DATE(), INTERVAL 30 DAY) AND CURRENT_DATE()
    GROUP BY full_name") or die(mysqli_error($conn));
    $result = [];
    while($rowchart = mysqli_fetch_array($querychart)){
        $result[] = $rowchart;
    }

$dataPoints = $result;
 
?>
<!DOCTYPE HTML>
<html>

    <head>
        <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Ratings/Month"
                },
                axisY: {
                    title: "Ratings (in points)"
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0.## POINTS",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
        </script>
    </head>

    <body>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <br><br>
        <div>
            <a href="staffchart.php"><button type="button" class="btn btn-danger">Month View</button></a>
            <a href="yearchart.php"><button type="button" class="btn btn-primary">Year view</button></a>
        </div>
    </body>

</html>