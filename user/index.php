<?php
session_start(); ob_start(); ob_clean();
if (isset($_GET['course_id'])) {
    $id = $_GET['course_id'];

	
	print_r($id); exit;

	
}
// } else {
//     header("location: index.php");
// }
?>

<!DOCTYPE html>
<html lang="en">



<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php include('link.php') ?>
	<title>Student Dashboard</title>
</head>

<body>
	<?php include('../nav.php') ?>

	<!-- Page Content -->
	<div class="pt-5">
		<div class="container">
			<?php include('header.php') ?>
		</div>
	</div>
	<!-- Content -->
	<div class="pb-5 py-md-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- Side Navbar -->
					<ul class="nav nav-lb-tab mb-6" id="tab" role="tablist">
						<li class="nav-item ms-0" role="presentation">
							<a class="nav-link active " id="bookmarked-tab" data-bs-toggle="pill" href="#bookmarked" role="tab" aria-controls="bookmarked" aria-selected="true">My Courses </a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link" id="currentlyLearning-tab" data-bs-toggle="pill" href="#currentlyLearning" role="tab" aria-controls="currentlyLearning" aria-selected="false">Bookmarked</a>
						</li>
					</ul>
					<!-- Tab content -->
					<div class="tab-content" id="tabContent">
						<div class="tab-pane fade show active" id="bookmarked" role="tabpanel" aria-labelledby="bookmarked-tab">
							<div class="row">
								<?php 
								$sql = $db->query("SELECT * FROM course_subscribers WHERE user_id = '$uid' ORDER BY sn DESC");
								while ($row = mysqli_fetch_array($sql)){

									$courseInfo = getCourse($row['course_id']);

									
								?>
								<div class="col-lg-3 col-md-6 col-12">
									<!-- Card -->
									<div class="card  mb-4 card-hover">
										<a href="course-preview.php?slug=<?= $courseInfo['slug'] ?>" class="card-img-top"><img src="../assets/images/course/<?= $courseInfo['image'] ?? 'noimage.png'  ?>" alt="" class="card-img-top rounded-top-md"></a>
										<!-- Card body -->
										<div class="card-body">
											<h3 class="h4 mb-2 text-truncate-line-2 "><a href="course-preview.php?slug=<?= $courseInfo['slug'] ?>" class="text-inherit"><?= $courseInfo['title'] ?></a>
											</h3>
											<!-- List inline -->
											<ul class="mb-3  list-inline">
												<li class="list-inline-item"><i class="far fa-clock me-1"></i>3h 56m
												</li>
												<li class="list-inline-item"><svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
														<rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE">
														</rect>
														<rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9">
														</rect>
														<rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9">
														</rect>
													</svg><?= $courseInfo['difficulty'] ?></li>
											</ul>
											<div class="lh-1">
												<span>
													<i class="mdi mdi-star text-warning me-n1"></i>
													<i class="mdi mdi-star text-warning me-n1"></i>
													<i class="mdi mdi-star text-warning me-n1"></i>
													<i class="mdi mdi-star text-warning me-n1"></i>
													<i class="mdi mdi-star text-warning"></i>
												</span>
												<span class="text-warning">4.5</span>
												<span class="fs-6 text-muted">(9,300)</span>
											</div>
										</div>
										<!-- Card footer -->
										<div class="card-footer">
											<div class="row align-items-center g-0">
												<div class="col-auto">
													<img src="../assets/images/avatar/avatar-3.jpg" class="rounded-circle avatar-xs" alt="">
												</div>
												<div class="col ms-2">
													<span>Morris Mccoy</span>
												</div>
												<div class="col-auto">
													<a href="#" class="removeBookmark">
														<i class="fas fa-bookmark"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
							
							<div class="row">
								<div class="offset-lg-3 col-lg-6 col-md-12 col-12 text-center mt-5">
									<p>You’ve reached the end of the list</p>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="currentlyLearning" role="tabpanel" aria-labelledby="currentlyLearning-tab">
							<div class="row">
								<?php 
								$sql = $db->query("SELECT * FROM course_subscribers WHERE user_id = '$uid' ORDER BY sn DESC");
                                while ($row = mysqli_fetch_array($sql)) {
                                    $courseInfo = getCourse($row['course_id']); ?>
								<div class="col-lg-3 col-md-6 col-12">
									<!-- Card -->
									<div class="card  mb-4 card-hover">
										<a href="#" class="card-img-top"><img src="../assets/images/course/course-react.jpg" alt="" class="card-img-top rounded-top-md"></a>
										<!-- Card body -->
										<div class="card-body">
											<h3 class="h4 mb-2 text-truncate-line-2 "><a href="#" class="text-inherit"><?= $courseInfo['title'] ?></a>
											</h3>
											<!-- List inline -->
											<ul class="mb-3  list-inline">
												<li class="list-inline-item"><i class="far fa-clock me-1"></i>3h 56m
												</li>
												<li class="list-inline-item"><svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
														<rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE">
														</rect>
														<rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9">
														</rect>
														<rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9">
														</rect>
													</svg>Beginner </li>
											</ul>
											<div class="lh-1">
												<span>
													<i class="mdi mdi-star text-warning me-n1"></i>
													<i class="mdi mdi-star text-warning me-n1"></i>
													<i class="mdi mdi-star text-warning me-n1"></i>
													<i class="mdi mdi-star text-warning me-n1"></i>
													<i class="mdi mdi-star text-warning"></i>
												</span>
												<span class="text-warning">4.5</span>
												<span class="fs-6 text-muted">(6,300)</span>
											</div>
										</div>
										<!-- Card footer -->
										<div class="card-footer">
											<div class="row align-items-center g-0">
												<div class="col-auto">
													<img src="../assets/images/avatar/avatar-6.jpg" class="rounded-circle avatar-xs" alt="">
												</div>
												<div class="col ms-2">
													<span>Morris Mccoy</span>
												</div>
												<div class="col-auto">
													<a href="#" class="removeBookmark">
														<i class="fas fa-bookmark"></i>
													</a>
												</div>
											</div>
											<div class="progress mt-3" style="height: 5px;">
												<div class="progress-bar bg-success" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
							</div>
							<div class="row">
								<div class="offset-lg-3 col-lg-6 col-md-12 col-12 text-center mt-5">
									<p>You’ve reached the end of the list</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<!-- Footer -->
	<div class="footer">
		<div class="container">
			<div class="row align-items-center g-0 border-top py-2">
				<!-- Desc -->
				<div class="col-md-6 col-12 text-center text-md-start">
					<span>© 2021 Geeks. All Rights Reserved.</span>
				</div>
				<!-- Links -->
				<div class="col-12 col-md-6">
					<nav class="nav nav-footer justify-content-center justify-content-md-end">
						<a class="nav-link active ps-0" href="#">Privacy</a>
						<a class="nav-link" href="#">Terms </a>
						<a class="nav-link" href="#">Feedback</a>
						<a class="nav-link" href="#">Support</a>
					</nav>
				</div>
			</div>
		</div>
	</div>


	<!-- Scripts -->
	<!-- Libs JS -->
	<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
	<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/libs/odometer/odometer.min.js"></script>
	<script src="../assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
	<script src="../assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="../assets/libs/flatpickr/dist/flatpickr.min.js"></script>
	<script src="../assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
	<script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
	<script src="../assets/libs/quill/dist/quill.min.js"></script>
	<script src="../assets/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js"></script>
	<script src="../assets/libs/dragula/dist/dragula.min.js"></script>
	<script src="../assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
	<script src="../assets/libs/dropzone/dist/min/dropzone.min.js"></script>
	<script src="../assets/libs/jQuery.print/jQuery.print.js"></script>
	<script src="../assets/libs/prismjs/prism.js"></script>
	<script src="../assets/libs/prismjs/components/prism-scss.min.js"></script>
	<script src="../assets/libs/%40yaireo/tagify/dist/tagify.min.js"></script>
	<script src="../assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
	<script src="../assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
	<script src="../assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
	<script src="../assets/libs/typed.js/lib/typed.min.js"></script>
	<script src="../assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
	<script src="../assets/libs/jsvectormap/dist/maps/world.js"></script>
	<script src="../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="../assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
	<script src="../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="../assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>




	<!-- clipboard -->
	<script src="../../../cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>


	<!-- Theme JS -->
	<script src="../assets/js/theme.min.js"></script>

</body>
</html>