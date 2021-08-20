<?php
session_start(); ob_start(); ob_clean();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include('link.php');?>
	<title>Instructor Courses</title>
</head>

<body>
	<!-- Page content -->
	<?php include('../nav.php');?>

	<div class="pt-5 pb-5">
		<div class="container">
			<div class="row align-items-center">
				<!-- User info -->
				<?php include('head.php');?>
			</div>

	<!-- Content -->

	<div class="row mt-0 mt-md-4">
				<div class="col-lg-3 col-md-4 col-12">
					<!-- Side navabar -->
					<nav class="navbar navbar-expand-md navbar-light shadow-sm mb-4 mb-lg-0 sidenav">
						<!-- Menu -->
						<a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="#">Menu</a>
						<!-- Button -->
						<button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light" type="button"
							data-bs-toggle="collapse" data-bs-target="#sidenav" aria-controls="sidenav" aria-expanded="false"
							aria-label="Toggle navigation">
							<span class="fe fe-menu"></span>
						</button>
						<!-- Navbar Collapse -->
						<div class="collapse navbar-collapse" id="sidenav">
							<?php include('sidebar.php');?>
						</div>
					</nav>
				</div>
				<div class="col-lg-9 col-md-8 col-12">
					<!-- Card -->
					<div class="card mb-4">
						<!-- Card header -->
						<div class="card-header">
							<h3 class="mb-0">Courses</h3>
							<span>Manage your courses and its update like live, draft and
								insight.</span>
						</div>
						<!-- Card body -->
						<div class="card-body">
							<!-- Form -->
							<form class="row">
								<div class="col-lg-9 col-md-7 col-12 mb-lg-0 mb-2">
									<input type="search" class="form-control" placeholder="Search Your Courses" />
								</div>
								<div class="col-lg-3 col-md-5 col-12">
									<select class="selectpicker" data-width="100%">
										<option value="">Date Created</option>
										<option value="Newest">Newest</option>
										<option value="High Rated">High Rated</option>
										<option value="Law Rated">Law Rated</option>
										<option value="High Earned">High Earned</option>
									</select>
								</div>
							</form>
						</div>
						<!-- Table -->
						<div class="table-responsive border-0 overflow-y-hidden">
							<table class="table mb-0 text-nowrap">
								<thead class="table-light">
									<tr>
										<th scope="col" class="border-0">Courses</th>
										<th scope="col" class="border-0">Students</th>
										<th scope="col" class="border-0">Rating</th>
										<th scope="col" class="border-0">Status</th>
										<th scope="col" class="border-0"></th>
									</tr>
								</thead>
								<tbody>
                                <?php
                                    $sql = $db->query("SELECT * FROM courses ORDER BY  sn DESC LIMIT 20 ");
                                    while ($row = mysqli_fetch_array($sql)) {
                                    ?>
									<tr>
										<td>
											<div class="d-lg-flex">
												<div>
													<a href="#">
														<img src="../assets/images/course/<?=$row['image'] ?? 'noimage.png' ?>" alt="" class="rounded img-4by3-lg" /></a>
												</div>
												<div class="ms-lg-3 mt-2 mt-lg-0">
													<h4 class="mb-1 h5">
														<a href="course-details.php?slug=<?= $row['slug'];?>" class="text-inherit">
															<?= ucwords($row['title']);?>
														</a>
													</h4>
													<ul class="list-inline fs-6 mb-0">
														<li class="list-inline-item">
															<i class="far fa-clock me-1"></i>3h 40m
														</li>
														<li class="list-inline-item">
															<svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none"
																xmlns="http://www.w3.org/2000/svg">
																<rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>
																<rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE"></rect>
																<rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE"></rect>
															</svg>
															<?= $row['difficulty']?>
														</li>
													</ul>
												</div>
											</div>
										</td>
										<td>3200</td>
										<td>
											<span class="text-warning">4.5<i class="mdi mdi-star"></i></span>(6,380)
										</td>
										<td>
											<span class="badge bg-success">Live</span>
										</td>
										<td class="text-muted">
											<span class="dropdown dropstart">
												<a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown2"
													data-bs-toggle="dropdown"  data-bs-offset="-20,20" aria-expanded="false">
													<i class="fe fe-more-vertical"></i>
												</a>

												<span class="dropdown-menu" aria-labelledby="courseDropdown2">
													<span class="dropdown-header">Setting </span>
													<a class="dropdown-item" href="#"><i class="fe fe-edit dropdown-item-icon"></i>Edit</a>
													<a class="dropdown-item" href="#"><i class="fe fe-trash dropdown-item-icon"></i>Remove</a>
												</span>
											</span>
										</td>
									</tr>
                                    <?php } ?>									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
   <!-- Footer -->
	<?php include('../footer.php');?>

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