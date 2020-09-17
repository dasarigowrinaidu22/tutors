<?php 
include '../dbconfig.php';
session_start();

 $cTitile=$_POST['ctitle'];
 $t_id=$_SESSION['id'];
 $type=$_POST['type'];
if($type=="course"){
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





 $model="";
 $model=" <div class='modal fade' id='myModal' role='dialog'>";
 $model.=" <div class='modal-dialog'>";
    
 $model="     <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
          <h4 class='modal-title'>Modal Header</h4>
        </div>
        <div class='modal-body'>
          <p>Some text in the modal.</p>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        </div>
      </div>
      
    </div>
  </div>";


  


















 ?>

 <script>
$(document).ready(function(){
  $("#addLectureTitle").click(function(){
    $("#myModal").modal();
  });
});
</script>

