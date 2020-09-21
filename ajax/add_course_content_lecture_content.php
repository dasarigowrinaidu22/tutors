<?php 
include '../dbconfig.php';
session_start();

 $t_id=$_SESSION['id'];
 $type=$_POST['type'];
if($type=="course"){
$cTitile=$_POST['ctitle'];
$sql = "INSERT INTO temp_course_content (t_id,des) VALUES (".$t_id.", '".$cTitile."')";
$result=mysqli_query($con, $sql);
		if ($result) {
		  $table="";
		 $table=" <table class='table ucp-table '>
					<thead class='thead-s'>
						<tr>
							<th class='text-center' scope='col'>Sl.no</th>
							<th class='cell-ta'>Course Cotent Title</th>
							<th class='text-center' scope='col'>Action</th>
						</tr>
					</thead>
				<tbody>";

				$sql="SELECT * FROM  temp_course_content WHERE t_id=".$t_id;
				$result=mysqli_query($con, $sql);
				$i=0;

				while($row=mysqli_fetch_assoc($result))
				{		
					$table.="<tr>";
					$table.="<td class='text-center'>".++$i."</td>";
					$table.="<td class='cell-ta'>".$row['des']."</td>";
					$table.="<td class='text-center'><a href='#' onClick='addLectureTitle(".$row['id'].");' title='Edit'class='gray-s' id='addLectureTitle'><i class='uil uil-edit-alt'></i></a>";
					$table.="<a href='#' onClick='delteCourseContent(".$row['id'].");'  title='Delete' class='gray-s'><i class='uil uil-trash-alt'></i></a>
							</td>
					</tr>";
				}
				$table.="</tbody></table>";
				echo $table;

		} 
		else {
		  echo 'fail...!!';
		}
	}

	if($type=="lecture"){
		$sql = "INSERT INTO temp_lecture_title (cc_id,des) VALUES (".$_POST['cc_id'].", '".$_POST['ltitle']."')";
		$result=mysqli_query($con, $sql);
		if ($result) {
		  $table="";
		 $table=" <table class='table ucp-table '>
					<thead class='thead-s'>
						<tr>
							<th class='text-center' scope='col'>Sl.no</th>
							<th class='cell-ta'>Course Cotent Title</th>
							<th class='text-center' scope='col'>Action</th>
						</tr>
					</thead>
				<tbody>";

				$sql="SELECT * FROM  temp_lecture_title WHERE cc_id=".$_POST['cc_id'];
				$result=mysqli_query($con, $sql);
				$i=0;

				while($row=mysqli_fetch_assoc($result))
				{		
					$table.="<tr>";
					$table.="<td class='text-center'>".++$i."</td>";
					$table.="<td class='cell-ta'>".$row['des']."</td>";
					$table.="<td class='text-center'><a href='#' onClick='editLectureTitle(".$row['id'].");' title='Edit'class='gray-s' id='addLectureTitle'><i class='uil uil-edit-alt'></i></a>";
					$table.="<a href='#' onClick='delteLectureContent(".$row['id'].");'  title='Delete' class='gray-s'><i class='uil uil-trash-alt'></i></a>
							</td>
					</tr>";
				}
				$table.="</tbody></table>";
				echo $table;

		} 
		else {
		  echo 'fail...!!';
		}
	}
 ?>

 <script>
$(document).ready(function(){
  $("#addLectureTitle").click(function(){
    $("#myModal").modal();
  });
});
</script>

