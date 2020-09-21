<?php 
include '../dbconfig.php';
session_start();
$t_id=$_SESSION['id']; 

if (isset($_POST['wdel']) && $_POST['wdel']=="c_l") {
	$sql="DELETE FROM temp_lecture_title WHERE cc_id =".$_POST['id'];
	$sql2="DELETE FROM temp_course_content WHERE id=".$_POST['id'];
	$result=mysqli_query($con, $sql);
	$result2=mysqli_query($con, $sql2);
	if ($result2) {
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
}
elseif (isset($_POST['wdel']) && $_POST['wdel']=="lecture_content") {
	$sql="DELETE FROM temp_lecture_title WHERE id =".$_POST['id'];
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
					$table.="<a href='#' onClick='deleteLectureContent(".$row['id'].");'  title='Delete' class='gray-s'><i class='uil uil-trash-alt'></i></a>
							</td>
					</tr>";
				}
				$table.="</tbody></table>";
				echo $table;
	}
}
?>