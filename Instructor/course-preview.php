<?php
session_start(); ob_start(); ob_clean();
if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
} else {
    header('location: course-details.php');
}

$vimeoEmbedCode = "<div style='padding:56.25% 0 0 0;position:relative;>
                <iframe src='https://player.vimeo.com/video/245921641?h=be79b91a46' 
                style='position:absolute;top:0;left:0;width:100%;height:100%;' 
                frameborder='0' allow='autoplay; fullscreen; picture-in-picture' 
                allowfullscreen></iframe></div><script src='https://player.vimeo.com/api/player.js'></script>
                <p><a href='https://vimeo.com/245921641'>Gus Dapperton &quot;Prune, You Talk Funny&quot;</a> 
                from <a href='https://vimeo.com/itsbongoboy'>Itsbongoboy</a> on <a href='https://vimeo.com'>Vimeo</a>.</p>";


?>

<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <?php include('link.php') ?>
    <title>Course Resume | Geeks - Bootstrap 5 Template</title>

    <script src="../assets/ckeditor/ckeditor.js"></script>

    <style>
        div.scroll {
            width: auto;
            height: 500px;
            overflow-x: hidden;
            overflow-y: auto;
            text-align: justify;
        }

        div.scrollS {
            height: 500px;
            overflow-x: hidden;
            overflow-y: auto;
            text-align: justify;
        }
    </style>

</head>

<body>
    <!-- Page content -->
    <?php include('../nav.php');



    $slug = $_GET['slug'];

    $course_info = getCourse($slug);
    $course_id = $course_info['sn'];


    $pin = $db->query("SELECT * FROM course_introductions WHERE course_id='$course_id' ") or die('nonsense code');
    $intro = mysqli_fetch_array($pin);
    ?>


    <div class="mt-5 course-container">
        <div class="container-fluid scroll">
            <div class="row">
                <div class="col-12">
                    <!-- Tab content -->
                    <div class="tab-content content" id="course-tabContent">
                        <div class="tab-pane fade show active" id="course-intro" role="tabpanel" aria-labelledby="course-intro-tab">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div>
                                    <h4 class=" mb-0  text-truncate-line-3 contentTitle"><?= ucwords($course_info['title']) ?></h4>

                                </div>
                            </div>
                            <!-- Video -->
                            <div class="embed-responsive  position-relative w-100 d-block overflow-hidden p-0 contentFrame" style="height: 600px;">
                                <iframe class="position-absolute top-0 end-0 start-0 end-0 bottom-0 h-100 w-100" src="<?= $intro['video_url'] ?>"></iframe>
                            </div>
                            <br>




                            
                            <div class="card rounded-3">
                                <!-- Card header -->
                                <div class="card-header border-bottom-0 p-0">
                                    <div>
                                        <!-- Nav -->
                                        <ul class="nav nav-lb-tab" id="tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="table-tab" data-bs-toggle="pill" href="#table" role="tab" aria-controls="table" aria-selected="true">Notes</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="description-tab" data-bs-toggle="pill" href="#description" role="tab" aria-controls="description" aria-selected="false">Resources</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="tab-content" id="tabContent">
                                        <div class="tab-pane fade show active" id="table" role="tabpanel" aria-labelledby="table-tab">
                                            <!-- Card -->
                                            <div class="accordion" id="courseAccordion">
                                                <div>
                                                    <div class="contentNotes">
                                                        <?= $intro['body'] ?>
                                                    </div>
                                                    <!-- List group -->
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item px-0 pt-2">
                                                            <!-- Toggle -->
                                                            <div class=" h4 mb-0 d-flex align-items-center text-inherit text-decoration-none active" data-bs-toggle="collapse" href="#courseTwo" aria-expanded="true" aria-controls="courseTwo">
                                                                <div class="me-auto">
                                                                    <a href="" class="text-inherit">
                                                                    </a>

                                                                </div>
                                                                <!-- Row -->
                                                                <!-- Collapse -->
                                                                <div class="collapse" id="courseTwo" data-bs-parent="#courseAccordion">
                                                                </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                                            <!-- Description -->
                                            <div class="mb-4 contentRes">
                                            
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
    <!-- Card -->
    <div class="card course-sidebar scrollS" id="courseAccordion">
        <!-- List group -->
        <ul class="list-group list-group-flush course-list ">
            <li class="list-group-item">
                <h4 class="mb-0">
                    <a href="course-preview.php?slug=<?= $slug ?>" class="text-inherit">
                        <?= strtoupper($course_info['title']) ?>
                    </a>
                </h4>
            </li>
            <?php
            $i = 0;
            $sql = $db->query("SELECT * FROM course_modules WHERE course_id = '$course_id'");
            while ($row = mysqli_fetch_array($sql)) {
                $i++;
            ?>
                <!-- List group item -->
                <li class="list-group-item">
                    <!-- Toggle -->
                    <a class="d-flex align-items-center text-inherit text-decoration-none h4 mb-0" data-bs-toggle="collapse" href="#courseTwo<?= $row['sn'] ?>" role="button" aria-expanded="false" aria-controls="courseTwo">
                        <div class="me-auto" style="font-size: 13px;">
                            <?= ucwords($row['title'])  ?>
                        </div>
                        <!-- Chevron -->
                        <span class="chevron-arrow  ms-4">
                            <i class="fe fe-chevron-down fs-4"></i>
                        </span>
                    </a>
                    <!-- Row -->
                    <!-- Collapse -->
                    <div class="collapse <?= ($i == 1) ? 'show' : '';  ?> " id="courseTwo<?= $row['sn'] ?>" data-bs-parent="#courseAccordion">
                        <div class="py-4 nav" id="course-tabOne" role="tablist" aria-orientation="vertical" style="display: inherit;">
                            <?php
                            $module_id = $row['sn'];
                            $sqlr = $db->query("SELECT * FROM course_topics WHERE module_id = '$module_id'");




                            if (mysqli_num_rows($sqlr) == 0) {
                                echo "<div class = 'alert alert-danger'>No Topics Found</div>";
                            } else {


                                while ($res = mysqli_fetch_array($sqlr)) {

                            ?>
                                    <a class="mb-2 d-flex justify-content-between align-items-center text-decoration-none pickContent" data-sn="<?= $res['sn'] ?>" data-title="<?= $res['title'] ?>" data-video="<?= $res['video_url'] ?>" data-module_title="<?= $row['title'] ?>" data-notes="<?= htmlspecialchars($res['notes']) ?>" data-resources="<?= $res['resources'] ?>" href="javascript:;">
                                        <div class="text-truncate">
                                            <span class="icon-shape bg-light text-primary icon-sm  rounded-circle me-2"><i class="fe fe-play  fs-6"></i></span>
                                            <span><?= $res['title'] ?></span>
                                        </div>
                                        <div class="text-truncate">
                                            <span>1m 7s</span>
                                        </div>
                                    </a>



                            <?php }
                            } ?>

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
            $('body').on('click', '.pickContent', function() {
                sn = $(this).data('sn');
                title = $(this).data('title');
                res = $(this).data('resources');
                video = $(this).data('video');
                notes = $(this).data('notes');
                module_title = $(this).data('module_title');
                $('.contentTitle').html(`${module_title} <ion-icon name="arrow-forward-outline"></ion-icon> ${title}`);
                //document.getElementsByClassName('contentFrame')[0].src = video;

                body = document.getElementsByClassName('contentFrame')[0];
                body.innerHTML = '';

                son = document.createElement('div');
                son.classList.add('idontknow');


                body.append(son);

                iner = `<iframe class="position-absolute top-0 end-0 start-0 end-0 bottom-0 h-100 w-100 " 
                src="${video}"></iframe>`

                son.innerHTML = iner;

                $('.courseDes').html(``);
                not = $('.contentNotes');
                not.html(``);

                
                Res = $('.contentRes');
                Res.html(``);


                not.append(notes);
                Res.append(`<div><a href='${res}'>${res}</a></div>`);
                console.log(res);

                window.scroll(0);

            })
        })
    </script>





    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>



</html>