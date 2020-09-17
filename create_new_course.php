<!DOCTYPE html>

<?php 

session_start();

include 'dbconfig.php'; 



$sql="DELETE FROM temp_lecture_title WHERE cc_id IN(SELECT id FROM temp_course_content WHERE
			 t_id=".$_SESSION['id'].")";
$sql2="DELETE FROM temp_course_content WHERE t_id=".$_SESSION['id'];
mysqli_query($con, $sql);
mysqli_query($con, $sql2);


?>

<html lang="en">
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=9">
		<meta name="description" content="Gambolthemes">
		<meta name="author" content="Gambolthemes">		
		<title>Cursus - Create New Course</title>
		
		
		<link rel="icon" type="image/png" href="images/fav.png">
		
		
		<link href='../../../fonts.googleapis.com/cssccc8.css?family=Roboto:400,700,500' rel='stylesheet'>
		<link href='vendor/unicons-2.0.1/css/unicons.css' rel='stylesheet'>
		<link href="css/vertical-responsive-menu1.min.css" rel="stylesheet">
		<link href="css/instructor-dashboard.css" rel="stylesheet">
		<link href="css/instructor-responsive.css" rel="stylesheet">
		<link href="css/night-mode.css" rel="stylesheet">
		<link href="css/jquery-steps.css" rel="stylesheet">
		
		
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
		<link href="vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
		<link href="vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="vendor/semantic/semantic.min.css">		
		<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script>

		$(document).ready(function(){


		  $("#category").change(function(){
		    $.ajax({
		    	url:'ajax/courses.php?',
		    	type:'POST',
		    	data:'id='+$("#category").val()+'&sub_cat=Y',
		    	success:function(data){
		    		$("#sub_category").html(data);
		    	},
		    	error:function(data){
		    		alert(data);
		    	}
		    });
		  });
		  $("#sub_category").change(function(){
		    $.ajax({
		    	url:'ajax/courses.php?',
		    	type:'POST',
		    	data:'id='+$("#sub_category").val()+'&course=Y',
		    	success:function(data){
		    		$("#course").html(data);
		    	},
		    	error:function(data){
		    		alert(data);
		    	}
		    });
		  });


		  if(main_title1.length==0 || sub_title.length==0 ||sub_title.isEmpty()|| description.length==0)
		  {
		  	 $("#next").prop('disabled', true); 
		  	 return false;

		  }
		  else
		  {
		  	 $("#next").prop('disabled', false); 
		  	 return true;
		  }
		});
		function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#coverImg').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        	}
    		}

    	function readVideoURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#coverVideo').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        	}
    		}
		</script>
		
	</head>

<body>
	<!-- Header Start -->
	<header class="header clearfix">
		<button type="button" id="toggleMenu" class="toggle_menu">
		  <i class='uil uil-bars'></i>
		</button>
		<button id="collapse_menu" class="collapse_menu">
			<i class="uil uil-bars collapse_menu--icon "></i>
			<span class="collapse_menu--label"></span>
		</button>
		<div class="main_logo" id="logo">
			<a href="index.html"><img src="images/logo.svg" alt=""></a>
			<a href="index.html"><img class="logo-inverse" src="images/ct_logo.svg" alt=""></a>
		</div>
		<div class="search120">
			<div class="ui search">
			  <div class="ui left icon input swdh10">
				<input class="prompt srch10" type="text" placeholder="Search for Tuts Videos, Tutors, Tests and more..">
				<i class='uil uil-search-alt icon icon1'></i>
			  </div>
			</div>
		</div>
		<div class="header_right">
			<ul>
				<li>
					<a href="create_new_course.php" class="upload_btn">Create New Course</a>
				</li>
				<li>
					<a href="index.html" class="option_links"><i class='uil uil-home-alt'></i><span class="noti_count">9+</span></a>
				</li>
				<li class="ui dropdown">
					<a href="#" class="option_links"><i class='uil uil-envelope-alt'></i><span class="noti_count">3</span></a>
					<div class="menu dropdown_ms">
						<a href="#" class="channel_my item">
							<div class="profile_link">
								<img src="images/left-imgs/img-6.jpg" alt="">
								<div class="pd_content">
									<h6>Zoena Singh</h6>
									<p>Hi! Sir, How are you. I ask you one thing please explain it this video price.</p>
									<span class="nm_time">2 min ago</span>
								</div>							
							</div>							
						</a>
						<a href="#" class="channel_my item">
							<div class="profile_link">
								<img src="images/left-imgs/img-5.jpg" alt="">
								<div class="pd_content">
									<h6>Joy Dua</h6>
									<p>Hello, I paid you video tutorial but did not play error 404.</p>
									<span class="nm_time">10 min ago</span>
								</div>							
							</div>							
						</a>
						<a href="#" class="channel_my item">
							<div class="profile_link">
								<img src="images/left-imgs/img-8.jpg" alt="">
								<div class="pd_content">
									<h6>Jass</h6>
									<p>Thanks Sir, Such a nice video.</p>
									<span class="nm_time">25 min ago</span>
								</div>							
							</div>							
						</a>
						<a class="vbm_btn" href="instructor_messages.html">View All <i class='uil uil-arrow-right'></i></a>
					</div>
				</li>
				<li class="ui dropdown">
					<a href="#" class="option_links"><i class='uil uil-bell'></i><span class="noti_count">3</span></a>
					<div class="menu dropdown_mn">
						<a href="#" class="channel_my item">
							<div class="profile_link">
								<img src="images/left-imgs/img-1.jpg" alt="">
								<div class="pd_content">
									<h6>Rock William</h6>
									<p>Like Your Comment On Video <strong>How to create sidebar menu</strong>.</p>
									<span class="nm_time">2 min ago</span>
								</div>							
							</div>							
						</a>
						<a href="#" class="channel_my item">
							<div class="profile_link">
								<img src="images/left-imgs/img-2.jpg" alt="">
								<div class="pd_content">
									<h6>Jassica Smith</h6>
									<p>Added New Review In Video <strong>Full Stack PHP Developer</strong>.</p>
									<span class="nm_time">12 min ago</span>
								</div>							
							</div>							
						</a>
						<a href="#" class="channel_my item">
							<div class="profile_link">
								<img src="images/left-imgs/img-9.jpg" alt="">
								<div class="pd_content">
									<p> Your Membership Approved <strong>Upload Video</strong>.</p>
									<span class="nm_time">20 min ago</span>
								</div>							
							</div>							
						</a>
						<a class="vbm_btn" href="instructor_notifications.html">View All <i class='uil uil-arrow-right'></i></a>
					</div>
				</li>
				<li class="ui dropdown">
					<a href="#" class="opts_account">
						<img src="images/hd_dp.jpg" alt="">
					</a>
					<div class="menu dropdown_account">
						<div class="channel_my">
							<div class="profile_link">
								<img src="images/hd_dp.jpg" alt="">
								<div class="pd_content">
									<div class="rhte85">
										<h6>Joginder Singh</h6>
										<div class="mef78" title="Verify">
											<i class='uil uil-check-circle'></i>
										</div>
									</div>
									<span>gambol943@gmail.com</span>
								</div>							
							</div>
							<a href="my_instructor_profile_view.html" class="dp_link_12">View Instructor Profile</a>						
						</div>
						<div class="night_mode_switch__btn">
							<a href="#" id="night-mode" class="btn-night-mode">
								<i class="uil uil-moon"></i> Night mode
								<span class="btn-night-mode-switch">
									<span class="uk-switch-button"></span>
								</span>
							</a>
						</div>
						<a href="instructor_dashboard.html" class="item channel_item">Cursus Dashboard</a>						
						<a href="membership.html" class="item channel_item">Paid Memberships</a>
						<a href="setting.html" class="item channel_item">Setting</a>
						<a href="help.html" class="item channel_item">Help</a>
						<a href="feedback.html" class="item channel_item">Send Feedback</a>
						<a href="sign_in.html" class="item channel_item">Sign Out</a>
					</div>
				</li>
			</ul>
		</div>
	</header>
	<!-- Header End -->
	<!-- Left Sidebar Start -->
	<nav class="vertical_nav">
		<div class="left_section menu_left" id="js-menu" >
			<div class="left_section">
				<ul>
					<li class="menu--item">
						<a href="instructor_dashboard.html" class="menu--link" title="Dashboard">
							<i class="uil uil-apps menu--icon"></i>
							<span class="menu--label">Dashboard</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="instructor_courses.html" class="menu--link" title="Courses">
							<i class='uil uil-book-alt menu--icon'></i>
							<span class="menu--label">Courses</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="instructor_analyics.html" class="menu--link" title="Analyics">
							<i class='uil uil-analysis menu--icon'></i>
							<span class="menu--label">Analyics</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="create_new_course.php" class="menu--link active" title="Create Course">
							<i class='uil uil-plus-circle menu--icon'></i>
							<span class="menu--label">Create Course</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="instructor_messages.html" class="menu--link" title="Messages">
							<i class='uil uil-comments menu--icon'></i>
							<span class="menu--label">Messages</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="instructor_notifications.html" class="menu--link" title="Notifications">
						  <i class='uil uil-bell menu--icon'></i>
						  <span class="menu--label">Notifications</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="instructor_my_certificates.html" class="menu--link" title="My Certificates">
						  <i class='uil uil-award menu--icon'></i>
						  <span class="menu--label">My Certificates</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="instructor_all_reviews.html" class="menu--link" title="Reviews">
						  <i class='uil uil-star menu--icon'></i>
						  <span class="menu--label">Reviews</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="instructor_earning.html" class="menu--link" title="Earning">
						  <i class='uil uil-dollar-sign menu--icon'></i>
						  <span class="menu--label">Earning</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="instructor_payout.html" class="menu--link" title="Payout">
						  <i class='uil uil-wallet menu--icon'></i>
						  <span class="menu--label">Payout</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="instructor_statements.html" class="menu--link" title="Statements">
						  <i class='uil uil-file-alt menu--icon'></i>
						  <span class="menu--label">Statements</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="instructor_verification.html" class="menu--link" title="Verification">
						  <i class='uil uil-check-circle menu--icon'></i>
						  <span class="menu--label">Verification</span>
						</a>
					</li>
				</ul>
			</div>
			<div class="left_section pt-2">
				<ul>
					<li class="menu--item">
						<a href="setting.html" class="menu--link" title="Setting">
							<i class='uil uil-cog menu--icon'></i>
							<span class="menu--label">Setting</span>
						</a>
					</li>
					<li class="menu--item">
						<a href="feedback.html" class="menu--link" title="Send Feedback">
							<i class='uil uil-comment-alt-exclamation menu--icon'></i>
							<span class="menu--label">Send Feedback</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Left Sidebar End -->
	<!-- Body Start -->
	<div class="wrapper">
		<div class="sa4d25">
			<div class="container">
				<form id="newCourseForm" action="ajax/createNewCouerse.php" method="POST" role="msform"autocomplete="off">
				<div class="row">
					<div class="col-lg-12">	
						<h2 class="st_title"><i class="uil uil-analysis"></i> Create New Course</h2>
					</div>					
				</div>				
				<div class="row">
					<div class="col-12">
						<div class="course_tabs_1">
							<div id="add-course-tab" class="step-app">
								<ul class="step-steps">
									<li class="active">
										<a href="#tab_step1">
											<span class="number"></span>
											<span class="step-name">General Information</span>
										</a>
									</li>
									<li>
										<a href="#tab_step2">
											<span class="number"></span>
											<span class="step-name">View</span>
										</a>
									</li>
									<li>
										<a href="#tab_step3">
											<span class="number"></span>
											<span class="step-name">Course Content</span>
										</a>
									</li>
									<li>
										<a href="#tab_step4">
											<span class="number"></span>
											<span class="step-name">Extra Information</span>
										</a>
									</li>
								</ul>
								<div class="step-content">
									<div class="step-tab-panel step-tab-info active" id="tab_step1"> 
										<div class="tab-from-content">
											<div class="title-icon">
												<h3 class="title"><i class="uil uil-info-circle"></i>General Information</h3>
											</div>
											<div class="course__form">
												<div class="general_info10">
													<div class="row">
														<div class="col-lg-6 col-md-6">															
															<div class="ui search focus mt-30 lbel25">
																<label>Course Title*</label>
																<div class="ui left icon input swdh19">
																	<input class="prompt srch_explore" type="text" placeholder="Insert your course title." name="main_title" data-purpose="edit-course-title" maxlength="60" id=main_title value="" required>															
																	<div class="badge_num">60</div>
																</div>
																<div id=main_error_title style="color:red; margin-left: 50px;"></div>
															</div>									
														</div>
														
														<div class="col-lg-6 col-md-6">															
															<div class="ui search focus mt-30 lbel25">
																<label>Course Subtitle*</label>
																<div class="ui left icon input swdh19">
																	<input class="prompt srch_explore" type="text" placeholder="Insert your course Subtitle." name="sub_title" data-purpose="edit-course-title" maxlength="60" id="sub_title" value="" required>															
																	<div class="badge_num2">120</div>
																</div>
																<div id=sub_error_title style="color:red; margin-left: 50px;"></div>
															</div>									
														</div>
														<div class="col-lg-12 col-md-12">
															<div class="course_des_textarea mt-30 lbel25">
																<label>Course Description*</label>
																<div class="course_des_bg">
																	<ul class="course_des_ttle">
																		<li><a href="#"><i class="uil uil-bold"></i></a></li>
																		<li><a href="#"><i class="uil uil-italic"></i></a></li>
																		<li><a href="#"><i class="uil uil-list-ul"></i></a></li>
																		<li><a href="#"><i class="uil uil-left-to-right-text-direction"></i></a></li>
																		<li><a href="#"><i class="uil uil-right-to-left-text-direction"></i></a></li>
																		<li><a href="#"><i class="uil uil-list-ui-alt"></i></a></li>
																		<li><a href="#"><i class="uil uil-link"></i></a></li>
																		<li><a href="#"><i class="uil uil-text-size"></i></a></li>
																		<li><a href="#"><i class="uil uil-text"></i></a></li>
																	</ul>
																	<div class="textarea_dt">															
																		<div class="ui form swdh339">
																			<div class="field">
																				<textarea rows="5" name="description" id="description" placeholder="Insert your course description" required></textarea>
																			</div>
																		</div>						

																	</div>

																</div>
																	<div id="description_error" style="color:red; margin-left: 10px;" 	></div>
															</div>
														</div>
														<div class="col-lg-4 col-md-12">
															<div class="mt-30 lbel25">
																<label>Language*</label>
															</div>
															<select class="ui hj145 dropdown cntry152 prompt srch_explore" name="language" id="language" required>
																<option value="">Select Language</option>
																<option value="1">English</option>
																<option value="2">Español</option>
																<option value="3">Português</option>
																<option value="4">日本語</option>
																<option value="5">Deutsch</option>
																<option value="6">Français</option>
																<option value="7">Türkçe</option>
																<option value="8">हिन्दी</option>
																<option value="9">Italiano</option>
																<option value="10">Polski</option>
																<option value="11">ภาษาไทย</option>
																<option value="12">Română</option>
																<option value="13">Telugu</option>
																<option value="14">मराठी</option>
																<option value="15">ਪੰਜਾਬੀ</option>
															</select>
															<div id="language_error" style="color:red; margin-left: 10px;"></div>
														</div>
														<div class="col-lg-4 col-md-6">
															<div class="mt-30 lbel25">
																<label>Course Category*</label>
															</div>
															<select class="ui hj145 dropdown cntry152 prompt srch_explore" name="category" id="category" required>
																<option value="">Select Category</option>
																<?php 
																	$result=mysqli_query($con, "SELECT * FROM course_category");
																	while($row=mysqli_fetch_assoc($result))
																	{
																		echo "<option value='".$row['id']."'>".$row['category_name']."</option>";
																	}
																?>
															</select>
														</div>
														<div class="col-lg-4 col-md-6">
															<div class="mt-30 lbel25">
																<label>Course Subcategory*</label>
															</div>
															<select class="ui hj145 dropdown cntry152 prompt srch_explore" name="sub_category" id="sub_category" required>
																<option value="">Select Subcategory</option>
															</select>
														</div>
														<div class="col-lg-4 col-md-6">
															<div class="mt-30 lbel25">
																<label>Course*</label>
															</div>
															<select class="ui hj145 dropdown cntry152 prompt srch_explore" name="course" id="course" required>
																<option value="">Select Course</option>
															</select>
														</div>													
													</div>
												</div>
												<!-- <div class="price_course">
													<div class="row">
														<div class="col-lg-12">
															<div class="price_title">
																<h4><i class="uil uil-dollar-sign-alt"></i>Pricing</h4>
															</div>
														</div>
														<div class="col-lg-2 col-md-3 col-sm-6">
															<div class="mt-30 lbel25">
																<label>Currency*</label>
															</div>
															<select class="ui hj145 dropdown cntry152 prompt srch_explore">
																<option value="">USD</option>
																<option value="1">USD</option>
																<option value="2">CAD</option>
																<option value="3">BRL</option>
																<option value="4">EUR</option>
																<option value="5">GBP</option>
																<option value="6">INR</option>
															</select>
														</div>
														<div class="col-lg-3 col-md-4 col-sm-6">
															<div class="mt-30 lbel25">
																<label>Select*</label>
															</div>
															<select class="ui hj145 dropdown cntry152 prompt srch_explore">
																<option value="">Select</option>
																<option value="0">Free</option>
																<option value="1">$24.99 (tier 1)</option>
																<option value="2">$29.99 (tier 2)</option>
																<option value="3">$34.99 (tier 3)</option>
																<option value="4">$39.99 (tier 4)</option>
																<option value="5">$44.99 (tier 5)</option>
																<option value="6">$49.99 (tier 6)</option>
																<option value="7">$54.99 (tier 7)</option>
																<option value="8">$59.99 (tier 8)</option>
																<option value="9">$64.99 (tier 9)</option>
																<option value="10">$69.99 (tier 10)</option>
																<option value="11">$74.99 (tier 11)</option>
																<option value="12">$79.99 (tier 12)</option>
																<option value="13">$84.99 (tier 13)</option>
																<option value="14">$89.99 (tier 14)</option>
																<option value="15">$94.99 (tier 15)</option>
																<option value="16">$99.99 (tier 16)</option>
																<option value="17">$104.99 (tier 17)</option>
																<option value="18">$109.99 (tier 18)</option>
																<option value="19">$114.99 (tier 19)</option>
																<option value="20">$119.99 (tier 20)</option>
																<option value="21">$124.99 (tier 21)</option>
																<option value="22">$129.99 (tier 22)</option>
																<option value="23">$134.99 (tier 23)</option>
																<option value="24">$139.99 (tier 24)</option>
																<option value="25">$144.99 (tier 25)</option>
																<option value="26">$149.99 (tier 26)</option>
																<option value="27">$154.99 (tier 27)</option>
																<option value="28">$159.99 (tier 28)</option>
																<option value="29">$164.99 (tier 29)</option>
																<option value="30">$169.99 (tier 30)</option>
															</select>
														</div>
													</div>
												</div> -->
											</div>
										</div>
									</div>
									
									<div class="step-tab-panel step-tab-gallery" id="tab_step2">
										<div class="tab-from-content">
											<div class="title-icon">
												<h3 class="title"><i class="uil uil-image-upload"></i>View</h3>
											</div>
											<div class="course__form">
												<div class="view_info10">
													<div class="row">
														<div class="col-lg-12">	
															<div class="view_all_dt">	
																<div class="view_img_left">	
																	<div class="view__img">	
																		<img src="images/courses/add_img.jpg" alt="" id="coverImg" width=480 height=270>
																	</div>
																</div>
																<div class="view_img_right">	
																	<h4>Cover Image</h4>
																	<p>Upload your course image here. It must meet our course image quality standards to be accepted. Important guidelines: 750x422 pixels; .jpg, .jpeg,. gif, or .png. no text on the image.</p>
																	<div class="upload__input">
																		<div class="input-group">
																			<div class="custom-file">
																				<input type="file" class="custom-file-input" id="inputGroupFile04" onchange="readURL(this);" required  name="coverPhoto" accept="image/*">
																				<label class="custom-file-label" for="inputGroupFile04">No Choose file</label>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<input type="file" name="testFile">
															<div class="view_all_dt">	
																<div class="view_img_left">	
																	<div class="view__img">	
																		<!-- <img src="images/courses/add_video.jpg" alt="" id="coverVideo"> -->
																		<video controls src="images/courses/add_video.jpg" id="coverVideo" width=410 height=270>
																		  Your browser does not support the video tag.
																		</video>
																	</div>
																</div>
																<div class="view_img_right">	
																	<h4>Promotional Video</h4>
																	<p>Students who watch a well-made promo video are 5X more likely to enroll in your course. We've seen that statistic go up to 10X for exceptionally awesome videos. Learn how to make yours awesome!</p>
																	<div class="upload__input">
																		<div class="input-group">
																			<div class="custom-file">
																				<input type="file" class="custom-file-input" id="inputGroupFile05" onchange="readVideoURL(this);" required name="promotionVideo" accept="video/*">
																				<label class="custom-file-label" for="inputGroupFile05">No Choose file</label>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									 <div class="step-tab-panel step-tab-location" id="tab_step3">
										<div class="tab-from-content">
											<div class="title-icon">
												<h3 class="title"><i class="uil uil-film"></i>Course Content</h3>
											</div>
											<div class="course__form">
												<div class="row">
													<div class="col-lg-12">		
														<div class="extra_info">		
															<h4 class="part__title">New Course Content</h4>
														</div>
														<div class="view_info10">
															<div class="row">
																<div class="col-lg-12 col-md-12">															
																	<div class="ui search focus mt-30 lbel25">
																		<label>Course Content Title*</label>
																		<div class="ui left icon input swdh19">

																			<input class="prompt srch_explore" type="text" placeholder="Insert your course content title." name="cctitle" data-purpose="edit-course-title" maxlength="60" id="cctitle">															
																		</div>
																		<div id="CTITLE" style="color:red; margin-left: 5px;"></div>
																	</div>									
																</div>
															<!-- 	<div class="col-lg-12 col-md-12">	
																	<div class="lecture_title">
																		<h4>Add Lecture</h4>
																	</div>
																</div>
																<div class="col-lg-4 col-md-12">															
																	<div class="ui search focus mt-30 lbel25">
																		<label>Lecture Title*</label>
																		<div class="ui left icon input swdh19">
																			<input class="prompt srch_explore" type="text" placeholder="Insert your lecture title." name="ltitle" data-purpose="edit-course-title" maxlength="60" id="lecture[title]" value="">															
																		</div>
																	</div>									
																</div>
															 -->	<!-- <div class="col-lg-4 col-md-6">
																	<div class="part_input mt-30 lbel25">
																		<label>File*</label>
																		<div class="input-group">
																			<div class="custom-file">
																				<input type="file" class="custom-file-input" id="inputGroupFile06">
																				<label class="custom-file-label" for="inputGroupFile06">No Choose file - (Pdf, Video)</label>
																			</div>
																		</div>
																	</div>
																</div> -->
																<!-- <div class="col-lg-4 col-md-6">	
																	<div class="ui search focus mt-30 lbel25">
																		<label>Sort</label>
																		<div class="ui left icon input swdh19">
																			<input class="prompt srch_explore" type="number" name="sort" min="0" max="100" placeholder="0">															
																		</div>
																	</div>										
																</div> -->
														<!--		<div class="col-lg-12 col-md-12">	
																	<div class="course_des_textarea mt-30 lbel25">
																		<label>Description*</label>
																		<div class="course_des_bg">
																			<ul class="course_des_ttle">
																				<li><a href="#"><i class="uil uil-bold"></i></a></li>
																				<li><a href="#"><i class="uil uil-italic"></i></a></li>
																				<li><a href="#"><i class="uil uil-list-ul"></i></a></li>
																				<li><a href="#"><i class="uil uil-left-to-right-text-direction"></i></a></li>
																				<li><a href="#"><i class="uil uil-right-to-left-text-direction"></i></a></li>
																				<li><a href="#"><i class="uil uil-list-ui-alt"></i></a></li>
																				<li><a href="#"><i class="uil uil-link"></i></a></li>
																				<li><a href="#"><i class="uil uil-text-size"></i></a></li>
																				<li><a href="#"><i class="uil uil-text"></i></a></li>
																			</ul>
																			<div class="textarea_dt">															
																				<div class="ui form swdh339">
																					<div class="field">
																						<textarea rows="5" name="ldescription" id="id_part_description" placeholder="Insert your course part description"></textarea>
																					</div>
																				</div>										
																			</div>
																		</div>
																	</div>
																</div>
																<!-- <div class="col-lg-5 col-md-6">															
																	<div class="ui search focus mt-30 lbel25">
																		<label>Volume*</label>
																		<div class="ui left icon input swdh19 swdh95">
																			<input class="prompt srch_explore" type="number" min="0" name="size" required="" placeholder="0">															
																			<div class="badge_mb">MB</div>
																		</div>
																	</div>									
																</div> -->
																<!-- <div class="col-lg-5 col-md-6">															
																	<div class="ui search focus mt-30 lbel25">
																		<label>Duration*</label>
																		<div class="ui left icon input swdh19 swdh55">
																			<input class="prompt srch_explore" type="number" min="0" name="duration" required="" placeholder="0">															
																			<div class="badge_min">Minutes</div>
																		</div>
																	</div>									
																</div> -->
																 <div class="col-lg-2 col-md-12">
																	<button class="part_btn_save prt-sv" type="submit" id="save_btn">Save </button>
																</div> 

																


																 <div class="col-lg-12 col-md-12" id="course_content_table" style="display: none;">
																	<div class="table-responsive mt-50 mb-0" id="CCData">
																		<table class="table ucp-table " style="overflow: scroll;">
																			<thead class="thead-s">
																				<tr>
																					<th class="text-center" scope="col">Sl.no</th>
																					<th class="cell-ta">Course Cotent Title</th>
																				<!--	<th class="text-center" scope="col">Volume</th>
																					<th class="text-center" scope="col">Duration</th>
																					<th class="text-center" scope="col">Page</th>
																					<th class="text-center" scope="col">File</th> -->
																					<th class="text-center" scope="col">Action</th>
																				</tr>
																			</thead>
																			<tbody>
																	<!--			<tr>
																					<td class="text-center">1</td>
																					<td class="cell-ta">Lecture Content Title</td>
																					<!-- <td class="text-center">25</td>
																				<<td class="text-center">6</td>
																					<td class="text-center">0</td>
																					<td class="text-center"><a href="#">Video</a></td> 	
																					<td class="text-center">
																						<a href="#" title="Edit"
																					class="gray-s"><i class="uil uil-edit-alt"></i></a>
																						<a href="#" title="Delete" class="gray-s"><i class="uil uil-trash-alt"></i></a>
																					</td>
																				</tr>
																			<!--	<tr>
																					<td class="text-center">2</td>
																					<td class="cell-ta">Lecture Content Title</td>
																					<td class="text-center">25</td>
																					<td class="text-center">0</td>
																					<td class="text-center">3</td>		
																					<td class="text-center"><a href="#">File</a></td> 
																					<td class="text-center">
																						<a href="#" title="Edit" class="gray-s"><i class="uil uil-edit-alt"></i></a>
																						<a href="#" title="Delete" class="gray-s"><i class="uil uil-trash-alt"></i></a>
																					</td>-->
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div> 
																 <div class="col-lg-12 col-md-12">
																	<div class="save_content">
																		<button class="save_content_btn" type="Submit">Save Course Content</button>

																	</div>
																</div> 
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- <div class="table-responsive mt-30">
												<table class="table ucp-table" id="content-table">
													<thead class="thead-s">
														<tr>
															<th class="text-center" scope="col">Content</th>
															<th class="cell-ta">Title</th>
															<th class="text-center" scope="col">lectures</th>
															<th class="text-center" scope="col">Volume</th>
															<th class="text-center" scope="col">Duration</th>
															<th class="text-center" scope="col">Upload Date</th>
															<th class="text-center" scope="col">Files</th>
															<th class="text-center" scope="col">Controls</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td class="text-center">1</td>
															<td class="cell-ta">Course Content Title</td>
															<td class="text-center">5</td>
															<td class="text-center">50</td>
															<td class="text-center">15</td>
															<td class="text-center">6 April 2019</td>
															<td class="text-center"><a href="#">View</a></td>
															<td class="text-center">
																<a href="#" title="Edit" class="gray-s"><i class="uil uil-edit-alt"></i></a>
																<a href="#" title="Delete" class="gray-s"><i class="uil uil-trash-alt"></i></a>
															</td>
														</tr>
													</tbody>
												</table>
											</div> -->
										 </div>
									</div>
									
									<div class="step-tab-panel step-tab-amenities" id="tab_step4">
										<div class="tab-from-content">
											<div class="title-icon">
												<h3 class="title"><i class="uil uil-file-copy-alt"></i>Extra Information</h3>
											</div>
										   <div class="course__form">
												<div class="row">
													<div class="col-lg-12">		
														<div class="extra_info">		
															<h4 class="part__title">Captions</h4>
														</div>
														<div class="view_info10">
															<div class="row">
																<div class="col-md-4">
																	<div class="caption__check mt-30">
																		<div class="ui form">
																			<div class="grouped fields">										
																				<div class="ui form checkbox_sign cp_458">
																					<div class="inline field">
																						<div class="ui checkbox mncheck">
																							<input type="checkbox" tabindex="0" class="hidden">
																							<label>English<span class="filter__counter">(300)</span></label>
																						</div>
																					</div>
																				</div>
																				<div class="ui form checkbox_sign cp_458">
																					<div class="inline field">
																						<div class="ui checkbox mncheck">
																							<input type="checkbox" tabindex="0" class="hidden">
																							<label>Español<span class="filter__counter">(210)</span></label>
																						</div>
																					</div>
																				</div>
																				<div class="ui form checkbox_sign cp_458">
																					<div class="inline field">
																						<div class="ui checkbox mncheck">
																							<input type="checkbox" tabindex="0" class="hidden">
																							<label>Português<span class="filter__counter">(170)</span></label>
																						</div>
																					</div>
																				</div>
																				<div class="ui form checkbox_sign cp_458">
																					<div class="inline field">
																						<div class="ui checkbox mncheck">
																							<input type="checkbox" tabindex="0" class="hidden">
																							<label>Italiano<span class="filter__counter">(174)</span></label>
																						</div>
																					</div>
																				</div>
																				<div class="ui form checkbox_sign cp_458">
																					<div class="inline field">
																						<div class="ui checkbox mncheck">
																							<input type="checkbox" tabindex="0" class="hidden">
																							<label>Français<span class="filter__counter">(120)</span></label>
																						</div>
																					</div>
																				</div>
																				<div class="ui form checkbox_sign cp_458">
																					<div class="inline field">
																						<div class="ui checkbox mncheck">
																							<input type="checkbox" tabindex="0" class="hidden">
																							<label>Polski<span class="filter__counter">(130)</span></label>
																						</div>
																					</div>
																				</div>
																				<div class="ui form checkbox_sign cp_458">
																					<div class="inline field">
																						<div class="ui checkbox mncheck">
																							<input type="checkbox" tabindex="0" class="hidden">
																							<label>Deutsch<span class="filter__counter">(30)</span></label>
																						</div>
																					</div>
																				</div>
																				<div class="ui form checkbox_sign cp_458">
																					<div class="inline field">
																						<div class="ui checkbox mncheck">
																							<input type="checkbox" tabindex="0" class="hidden">
																							<label>Bahasa Indonesia<span class="filter__counter">(20)</span></label>
																						</div>
																					</div>
																				</div>
																				<div class="ui form checkbox_sign cp_458">
																					<div class="inline field">
																						<div class="ui checkbox mncheck">
																							<input type="checkbox" tabindex="0" class="hidden">
																							<label>ภาษาไทย<span class="filter__counter">(10)</span></label>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										 </div>
									</div>
								   
								</div>
								<div class="step-footer step-tab-pager">
									<button data-direction="prev" class="btn btn-default steps_btn">PREVIOUS</button>
<<<<<<< HEAD
									<button data-direction="next" id="next" class="btn btn-default steps_btn">Next</button>
=======
									<button data-direction="next" class="btn btn-default steps_btn" id="next">Next</button>
>>>>>>> 13b96e187a55363cb5c5c8bf0065095847891759
									<button data-direction="finish" name="submit_btn" class="btn btn-default steps_btn" type="submit" id="shide">Submit</button>
									<input type="submit" value="Submit" style="display: none;" id="sshow">
								</div>
							</div>
                        </div>
                    </div>
				</div>
				<input type="submit" value="Submit" style="display: none;" id="sshow">
			</form>
			</div>
		</div>
		<footer class="footer mt-40">
			<div class="container-fluid">
				<div class="row">					
					<div class="col-lg-12">
						<div class="item_f1">
							<a href="terms_of_use.html">Copyright Policy</a>
							<a href="terms_of_use.html">Terms</a>
							<a href="terms_of_use.html">Privacy Policy</a>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="footer_bottm">
							<div class="row">
								<div class="col-md-6">
									<ul class="fotb_left">
										<li>
											<a href="index.html">
												<div class="footer_logo">
													<img src="images/logo1.svg" alt="">
												</div>
											</a>
										</li>
										<li>
											<p>© 2020 <strong>Cursus</strong>. All Rights Reserved.</p>
										</li>
									</ul>
								</div>
								<div class="col-md-6">
									<div class="edu_social_links">
										<a href="#"><i class="fab fa-facebook-f"></i></a>
										<a href="#"><i class="fab fa-twitter"></i></a>
										<a href="#"><i class="fab fa-google-plus-g"></i></a>
										<a href="#"><i class="fab fa-linkedin-in"></i></a>
										<a href="#"><i class="fab fa-instagram"></i></a>
										<a href="#"><i class="fab fa-youtube"></i></a>
										<a href="#"><i class="fab fa-pinterest-p"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<!-- Body End -->

	<script src="js/vertical-responsive-menu.min.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>

	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="vendor/OwlCarousel/owl.carousel.js"></script>
	<script src="vendor/semantic/semantic.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/night-mode.js"></script>
	<script src="js/jquery-steps.min.js"></script>
	<script>
		$('#add-course-tab').steps({
		  onFinish: function () {
		   // $("#shide").hide();
		   // $("#sshow").show();


		    $("#sshow").trigger('click');
		  }
		});

		// $("#next").click(function(){
  // 				alert("The paragraph was clicked.");
  				
		// });

		$(document).ready(function (e) {
	$("#newCourseForm").on('submit',(function(e) {
		e.preventDefault();

	
		     $.ajax({
		        	url: 'ajax/createNewCourse.php',
					type: "POST",
					data:  new FormData(this),
					contentType: false,
		    	    cache: false,
					processData:false,
					success: function(data){
						alert("success "+data);
				    },
				  	error: function(data){
			    		alert("error "+data);
			    	} 	        
		   			});
	}));
});

 $("#save_btn").click(function() {
               var ctitle= $("#cctitle").val();
             // alert(ctitle);
             if(ctitle.isEmpty||ctitle.length==0||ctitle==null)
             {
             	$("#CTITLE").html("please enter course content");
				return false;
             }
             else
             {
                $.ajax({
                    type: "POST",
                    url: "ajax/add_course_content_lecture_content.php?",

                    data: "ctitle=" + ctitle+"&type=course",
                    success: function(data) {
                      $("#CCData").html(data);
                      $("#course_content_table").show();
                    },
                    error:function(data){
                    	alert(data+"fail");
                    }

                });
            }
              


            });


function addLectureTitle(id)
{
alert(id);
}

	</script>
</body>
</html>