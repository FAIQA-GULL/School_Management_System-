<?php
include('conn.php');
include('function.php');
include('district_navbar_home.php');
// include('footer.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Main Page</title>
	

  <!-- google fonts -->
    <!-- for labels -->
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,600;1,800;1,900&display=swap" rel="stylesheet">

   <!--  for heading -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ma+Shan+Zheng&display=swap" rel="stylesheet">

</head>

<style type="text/css">
	.fakeimg {
    height: 200px;
    /*background: #aaa;*/
  }
  .fakeimg img {
    height: 200px;
    /*background: #aaa;*/
  }
	
	/*.jumbotron{
 		background-image: url('image/books.jpg');

 	}
 	
 	.jumbotron h1{
 		font-size: 2.5rem;
 		color: white;
 		font-family: 'Fraunces', serif;
 	}*/

 	.form-control{
 		width: 50%;
 	}
 	h1,h3,p,thead,label{
 		font-family: 'Fraunces', serif;
 		color: white
 	}
 	.col{
 		color: white;
 	}
 	.row{
 		border-top-left-radius: 63px;
  border-bottom-right-radius: 63px;
  background-image: linear-gradient(27deg, #013A6B 50%,#004E95 50%);
 	}
 	td:hover{
 		background-color: #eee;
 		color: black;
 	}
 	td{
 		color: white;
 	}


</style>
<body>

<br><br>
<?php  
 
 $school_id=$_POST['school_id'];
 $section_id=$_POST['section_name'];

 $s = "SELECT * FROM schools WHERE sch_id =$school_id";
 
 $sch=mysqli_query($conn,$s);

$row = mysqli_fetch_assoc($sch);

$s_name = $row['sch_name'];
 
 ?>
<div class="container-fluid">

	<div class="row">
		
		<!-- <h4><?php echo  $section_id;?></h4> -->
	<center>
		<h2 style="color: white;"><?php echo $s_name;?></h2>
		<!-- <h3><?php echo $row['sch_name'];?></h3> -->
		<!-- <h4 style="color: white;"><?php echo $row['section_name'];?> Teacher Report</h4> -->

		<table class="table">
			<thead>
				<!-- <th>Sr.#</th> -->
				<th>Teacher ID</th>
				<th>Teacher Name</th>
				<th>Teacher Email</th>
				<th>Teacher NIC</th>
				<th>Section Name</th>
				<th>Attandance Report</th>
			</thead>
<?php 


$sql="SELECT * FROM  
      section JOIN user_info
      ON user_info.section_id=section.section_id
      WHERE user_type ='teacher'
      AND  section.section_id='$section_id' AND section.sch_id='$school_id'";
      // print_r($sql);

$info=mysqli_query($conn,$sql);
if (mysqli_num_rows($info) > 0)
	{
	 $sno = 1;
	 //OUTPUT DATA OF EACH ROW
	while($row = mysqli_fetch_assoc($info))
	   {
?>


			<tbody>
				<tr>
					<td><?php echo $row['user_id'];?></td>
					<td><?php echo $row['user_name'];?></td>
					<td><?php echo $row['user_email'];?></td>
					<td><?php echo $row['NIC'];?></td>
					<td><?php echo $row['section_name'];?></td>
					<td><a href="open_teacher_attendance_report.php?user_id=<?php echo $row['user_id'];?>" class="btn btn-success">Report</a></td>
					<!-- <td></td> -->

				</tr>
			</tbody>
			<?php }
}
?>
		</table>
		
		
		</center>
	
    </div>
	
</div>






</body>
</html>
