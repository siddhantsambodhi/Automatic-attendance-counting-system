<?php

$servername='localhost';
$username='root';
$password='';
$database='presenty';

$conn = new mysqli($servername,$username,$password,$database);

if ($conn->connect_error){
	echo "error";
}


if(isset($_REQUEST['btn'])){
	$ID = $_REQUEST['ID'];
	
	
// printing the attdance 

$result= mysqli_query($conn,"SELECT * FROM students WHERE ID='$ID'");
	$row=mysqli_fetch_array($result);

	$pres=$row["present"];
	// echo "$pres";

	$absent=$row['absent'];
	// echo " ";
	// echo "$absent";
}

// end of printing



 ?>


 <!DOCTYPE html>
 <html>
 <head>

 	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

 	<title>
 		Admin
 	</title>


<!-- style -->




<style type="text/css">
body{
	background-color: #ffffff;
background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='1440' height='800' preserveAspectRatio='none' viewBox='0 0 1440 800'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1117%26quot%3b)' fill='none'%3e%3crect width='1440' height='800' x='0' y='0' fill='rgba(253%2c 245%2c 255%2c 1)'%3e%3c/rect%3e%3cpath d='M 0%2c501 C 57.6%2c444.6 172.8%2c227.4 288%2c219 C 403.2%2c210.6 460.8%2c502.8 576%2c459 C 691.2%2c415.2 748.8%2c-59.2 864%2c0 C 979.2%2c59.2 1036.8%2c741.6 1152%2c755 C 1267.2%2c768.4 1382.4%2c204.6 1440%2c67L1440 800L0 800z' fill='%23881c89'%3e%3c/path%3e%3cpath d='M 0%2c164 C 96%2c258.8 288%2c619.8 480%2c638 C 672%2c656.2 768%2c263.4 960%2c255 C 1152%2c246.6 1344%2c527.8 1440%2c596L1440 800L0 800z' fill='rgba(229%2c 177%2c 255%2c 1)'%3e%3c/path%3e%3cpath d='M 0%2c182 C 144%2c286.2 432%2c706 720%2c703 C 1008%2c700 1296%2c274.2 1440%2c167L1440 800L0 800z' fill='rgba(255%2c 201%2c 248%2c 1)'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1117'%3e%3crect width='1440' height='800' fill='white'%3e%3c/rect%3e%3c/mask%3e%3c/defs%3e%3c/svg%3e");
background-attachment: fixed;
</style>

























<!-- end of style -->









<!-- pie.....................................................................js -->

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
      	var pres = <?php echo json_encode($pres); ?>;//get presenty
      	var pres= pres*100/10;
      	var abse = <?php echo json_encode($absent); ?>;
      	var abse= abse*100/10;
        var data = google.visualization.arrayToDataTable([
          ['ID', 'Hours per Day'],
          ['Present',     pres],
          ['Absent',      abse],
          ]);
        var Id = <?php echo json_encode($ID); ?>;
        var options = {
          title: Id
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>




<!-- pie.....................................................................js -->
 </head>
 <body>

 	
 
<!-- <input type="text" name="ID">
<button name="btn">press</button> -->
<div style="width: 40%;background-color: #F0EBFF;margin-top: 10px;margin-left: 14.8%;border-radius:  5px;">
	<h1>Profile</h1>
<form class="form-inline" method="REQUESTE">
  
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Password</label>
    <input type="text" name="ID" class="form-control" id="inputPassword2" placeholder="ID">
  </div>
  <button type="submit" name="btn" class="btn btn-primary mb-2">Check</button>
</form>
</div>
<!-- pie......................................................................... -->

<center>
 	<div id="piechart" style="width: 900px; height: 500px;"></div>
</center>















<!-- end of pip............................................................ -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


 </body>
 </html>