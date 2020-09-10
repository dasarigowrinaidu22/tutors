<?php
	$filename   = date("dmYHis"); 
	$extension  = pathinfo( $_FILES["coverPhoto"]["name"], PATHINFO_EXTENSION ); 
	$img_name   = $filename . "." . $extension;
	$img_source_Path = $_FILES['coverPhoto']['tmp_name'];
	$img_Path = "../coverImages/{$img_name}";
	$extension1  = pathinfo( $_FILES["promotionVideo"]["name"], PATHINFO_EXTENSION );
	$video_name  = $filename . "." . $extension1; 
	$video_source_Path = $_FILES['promotionVideo']['tmp_name'];
	$video_path= "../promotionVideo/{$video_name}";
	echo $_POST['main_title'];
	if(move_uploaded_file($img_source_Path,$img_Path) &&  move_uploaded_file($video_source_Path,$video_path)) {
		echo 'success...!!!';
	}
	else
		echo 'fail';
?>