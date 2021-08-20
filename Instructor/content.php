<?php
session_start();
ob_start();
ob_clean();
if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
} else {
    header('location: course-details.php');
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <?php include('link.php') ?>
    <title>Course Resume</title>

    <script src="../assets/ckeditor/ckeditor.js"></script>
</head>

<body>
    <!-- Page content -->
    <?php include('../nav.php')
    ?>

    <?php
    $sqll = $db->query("SELECT * FROM course_topics WHERE slug = '$slug'") or die("Cannot Connect to Database");
    $topic = mysqli_fetch_array($sqll);
    ?>

    <div class="mt-5 course-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Tab content -->
                    <div class="tab-content content" id="course-tabContent">
                        <div class="tab-pane fade show active" id="course-intro" role="tabpanel" aria-labelledby="course-intro-tab">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div>
                                    <h3 class=" mb-0  text-truncate-line-2">Introduction </h3>
                                </div>
                                <div>
                                    <!-- Dropdown -->
                                    <span class="dropdown">
                                        <a href="#" class="ms-2 text-muted" id="dropdownInfo" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fe fe-help-circle"></i>
                                        </a>
                                        <span class="dropdown-menu dropdown-menu-lg p-3 dropdown-menu-end" aria-labelledby="dropdownInfo">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            cupiditate consequatur rerum eius ad ut officiis
                                        </span>
                                    </span>
                                    <!-- Dropdown -->
                                    <span class="dropdown">
                                        <a class="text-muted text-decoration-none" href="#" role="button" id="shareDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fe fe-more-vertical"></i>
                                        </a>
                                        <span class="dropdown-menu dropdown-menu-end" aria-labelledby="shareDropdown1">
                                            <span class="dropdown-header">Share</span>
                                            <a class="dropdown-item" href="#"><i class="fab fa-facebook dropdown-item-icon"></i>Facebook</a>
                                            <a class="dropdown-item" href="#"><i class="fab fa-twitter dropdown-item-icon"></i>Twitter</a>
                                            <a class="dropdown-item" href="#"><i class="fab fa-linkedin dropdown-item-icon"></i>Linked In</a>
                                            <a class="dropdown-item" href="#"><i class="fas fa-copy dropdown-item-icon"></i>Copy Link</a>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <!-- Video -->
                            <div class="embed-responsive  position-relative w-100 d-block overflow-hidden p-0" style="height: 600px;">
                                <iframe class="position-absolute top-0 end-0 start-0 end-0 bottom-0 h-100 w-100" src="https://www.youtube.com/embed/PkZNo7MFNFg"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Card -->

    <div class="card course-sidebar " id="courseAccordion">
        <!-- List group -->
        <ul class="list-group list-group-flush course-list" style="overflow:scroll;">
            <li class="list-group-item">
                <h4 class="mb-0">Content For: <?= $topic['title'] ?></h4>
            </li>

            <?php
            $sn = $topic['sn'];
            $sql = $db->query("SELECT * FROM course_content WHERE topic_id = '$sn' ") or die("Cannot Connect to Database");
            while ($row = mysqli_fetch_array($sql)) {
            ?>
                <!-- List group item -->
                <li class="list-group-item">
                    <!-- Toggle -->

                    <!-- Row -->
                    <!-- Collapse -->
                    <div class="" id="courseTwo<?= $row['sn'] ?>" data-bs-parent="">
                        <div class=" " id="course-tabOne" role="tablist" aria-orientation="vertical" style="display: inherit;">
                            <a class="mb-2 d-flex justify-content-between align-items-center  text-inherit text-decoration-none" id="course-intro-tab" data-bs-toggle="pill" href="#course-intro" role="tab" aria-controls="course-intro" aria-selected="true">
                                <div class="text-truncate">
                                    <span class="icon-shape bg-light text-primary icon-sm  rounded-circle me-2"><i class="fe fe-play  fs-6"></i></span>
                                    <span><?= $row['title'] ?></span>
                                </div>
                                <div class="text-truncate">
                                    <span>1m 7s</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>

            <?php  } ?>

        </ul>
    </div>


    <?php include('modals.php') ?>
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

    <script>
        $(function() {
            $()
        })
    </script>
</body>
</html>