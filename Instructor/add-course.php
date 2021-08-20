<?php
session_start(); ob_start(); ob_clean();
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include('link.php') ?>



    <title>Instructor Dashboard</title>
</head>

<script src="../assets/ckeditor/ckeditor.js"></script>

<body>
    <!-- Page Content -->
    <?php include('../nav.php') ?>

    <div class="py-4 py-lg-6 bg-primary">
        <div class="container">
            <div class="row">
                <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                    <div class="d-lg-flex align-items-center justify-content-between">
                        <!-- Content -->
                        <div class="mb-4 mb-lg-0">
                            <h1 class="text-white mb-1">Add New Course</h1>
                            <p class="mb-0 text-white lead">
                                Just fill the form and create your courses.
                            </p>
                        </div>
                        <div>
                            <a href="instructor-courses.php" class="btn btn-white ">Back to Course</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <div class="pb-12">
        <div class="container">
            <div id="courseForm" class="bs-stepper">
                <div class="row">
                    <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                        <!-- Stepper Button -->
                        <div class="bs-stepper-header shadow-sm" role="tablist">
                            <div class="step" data-target="#test-l-1">
                                <button type="button" class="step-trigger" role="tab" id="courseFormtrigger1" aria-controls="test-l-1">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Basic Information</span>
                                </button>
                            </div>
                            <div class="bs-stepper-line"></div>
                            <div class="step" data-target="#test-l-2">
                                <button type="button" class="step-trigger" role="tab" id="courseFormtrigger2" aria-controls="test-l-2">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Courses Media</span>
                                </button>
                            </div>
                            <div class="bs-stepper-line"></div>
                            <div class="step" data-target="#test-l-4">
                                <button type="button" class="step-trigger" role="tab" id="courseFormtrigger4" aria-controls="test-l-4">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Settings</span>
                                </button>
                            </div>
                        </div>
                        <!-- Stepper content -->
                        <div class="bs-stepper-content mt-5">
                            <form method="POST" enctype="multipart/form-data">
                                <!-- Content one -->
                                <div id="test-l-1" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger1">
                                    <!-- Card -->
                                    <div class="card mb-3 ">
                                        <div class="card-header border-bottom px-4 py-3">
                                            <h4 class="mb-0">Basic Information</h4>
                                        </div>
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="courseTitle" class="form-label">Course Title</label>
                                                <input id="courseTitle" name="title" class="form-control" type="text" placeholder="Course Title" />
                                                <small>Write a 60 character course title.</small>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Category</label>


                                                <select name="courseCategory" id="courseCategory" class="selectpicker" data-width="100%">
                                                    <option value="">Select course category</option>
                                                    <?php
                                                    $sql = $db->query("SELECT * FROM course_categories") or die('Cannot connect to database');

                                                    while ($row = mysqli_fetch_array($sql)) {
                                                    ?>

                                                        <option value="<?= $row['sn'] ?>"><?= $row['title'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <div id="courseCategory_des"></div>
                                                <small>Help people find your courses by choosing
                                                    categories that represent your course.</small>
                                            </div>


                                            <div class="mb-3">
                                                <label class="form-label">Sub Category</label>
                                                <select name="courseSubCategory" id="courseSubCategory" class="form-control" data-width="100%">
                                                    <div></div>
                                                </select>
                                                <div id="courseSubCategory_des"></div>
                                                <small>Help people find your courses by choosing
                                                    categories that represent your course.</small>
                                            </div>


                                            <div class="mb-3">
                                                <label class="form-label">Level</label>
                                                <select name="courseLevel" class="selectpicker" data-width="100%">
                                                    <option value="">Select level</option>
                                                    <option value="Intermediate">Intermediate</option>
                                                    <option value="Beginners">Beginners</option>
                                                    <option value="Advanced">Advanced</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">False Price</label>
                                                <input type="number" class="form-control" name="false_price">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Price</label>
                                                <input type="number" class="form-control" name="price">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <textarea name="courseDescription" class="form-control" id=""></textarea>
                                                <small>A brief summary of your courses.</small>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Introduction</label>
                                                <textarea name="introduction" class="form-control" id="intro"></textarea>
                                                <small>A brief Introduction of your courses.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Button -->
                                    <button class="btn btn-primary" type="button" onclick="courseForm.next()">
                                        Next
                                    </button>
                                </div>
                                <!-- Content two -->
                                <div id="test-l-2" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger2">
                                    <!-- Card -->
                                    <div class="card mb-3  border-0">
                                        <div class="card-header border-bottom px-4 py-3">
                                            <h4 class="mb-0">Courses Media</h4>
                                        </div>
                                        <!-- Card body -->
                                        <div class="card-body">

                                            <div class="custom-file-container" data-upload-id="courseCoverImg" id="courseCoverImg">
                                                <label class="form-label">Project cover image
                                                    <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                                <label class="custom-file-container__custom-file">
                                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="coverimg" />
                                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                </label>
                                                <small class="mt-3 d-block">Upload your project image here. It must meet
                                                    our project image quality standards to be accepted. Important
                                                    guidelines: 750x440 pixels; .jpg, .jpeg, or .png. no text on the
                                                    image.</small>
                                                <div class="custom-file-container__image-preview"></div>
                                            </div>
                                            <div>
                                                <input type="url" class="form-control" placeholder="Video URL" name="videoUrl" />
                                            </div>
                                            <small class="mt-3 d-block">Enter a valid video URL. Students who watch a
                                                well-made promo video are 5X more likely to enroll in
                                                your Project.
                                            </small>
                                        </div>
                                    </div>
                                    <!-- Button -->
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-secondary" type="button" onclick="courseForm.previous()">
                                            Previous
                                        </button>
                                        <button class="btn btn-primary" type="button" onclick="courseForm.next()">
                                            Next
                                        </button>
                                    </div>
                                </div>
                                <!-- Content three -->

                                <!-- Content four -->
                                <div id="test-l-4" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="courseFormtrigger4">
                                    <!-- Card -->
                                    <div class="card mb-3  border-0">
                                        <div class="card-header border-bottom px-4 py-3">
                                            <h4 class="mb-0">Requirements</h4>
                                        </div>
                                        <!-- Card body -->
                                        <div class="card-body">
                                            <input name='tags' value='jquery, bootstrap' autofocus>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mb-22">
                                        <!-- Button -->
                                        <button class="btn btn-secondary mt-5" type="button" onclick="courseForm.previous()">
                                            Previous
                                        </button>
                                        <button type="submit" name="addCourse" class="btn btn-danger mt-5">
                                            Submit For Review
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('../footer.php') ?>

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
    <script src="../cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>


    <!-- Theme JS -->
    <script src="../assets/js/theme.min.js"></script>

    <script>
        CKEDITOR.replace('intro')
    </script>


    <script>
        $(function() {
            $('#courseCategory').on('change', function() {
                val = $('#courseCategory').val();
                $.ajax({
                    url: '../api.php?getCategoryTopics=' + val,
                    method: 'GET',
                    beforeSend: () => {
                        $('#courseSubCategory').html('<option selected disabled> --Loading Topics -- </option> ');
                        $('#courseSubCategory_des').attr('class', '');
                        $('#courseSubCategory_des').html(``);
                    }
                }).done(function(res) {
                    res = JSON.parse(res);
                    $('#courseCategory_des').addClass('alert alert-info mt-2');
                    $('#courseCategory_des').html(`${res.info.description}`);
                    topics = res.topics;
                    $('#courseSubCategory').html('<option selected disabled> --Select Topics -- </option> ');
                    topics.map((topic) => {
                        $('#courseSubCategory').append(`<option value="${topic.sn}">${ topic.title }</option> `);
                    })
                })
            })



            $('#courseSubCategory').on('change', function() {
                val = $('#courseSubCategory').val();
                $.ajax({
                    url: '../api.php?getTopicInfo=' + val,
                    method: 'GET'
                }).done(function(res) {
                    res = JSON.parse(res);
                    $('#courseSubCategory_des').addClass('alert alert-info mt-2');
                    $('#courseSubCategory_des').html(`${res.info.description}`);
                })
            })

        })
    </script>
</body>


<!-- Mirrored from codescandy.com/geeks-bootstrap-5/pages/dashboard-instructor.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Jul 2021 14:54:22 GMT -->

</html>