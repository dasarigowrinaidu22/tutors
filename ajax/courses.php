<?php 
include '../dbconfig.php';
if (isset($_POST['sub_cat']))
{
	$result=mysqli_query($con, "SELECT * FROM course_sub_category WHERE category_id=".$_POST['id']);
	echo "<option value=''>Select Subcategory</option>";
	while($row=mysqli_fetch_assoc($result))
	{
		echo "<option value='".$row['id']."'>".$row['sub_category_name']."</option>";
	}
}
elseif (isset($_POST['course']))
{
	$result=mysqli_query($con, "SELECT * FROM course WHERE sub_category_id=".$_POST['id']);
	echo "<option value=''>Select Course</option>";
	while($row=mysqli_fetch_assoc($result))
	{
		echo "<option value='".$row['id']."'>".$row['course_name']."</option>";
	}
}
?>