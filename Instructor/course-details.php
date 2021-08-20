<?php
session_start(); ob_start(); ob_clean();
if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
} else {
    header("location: instructor-courses.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include('link.php') ?>


    <title>Instructor</title>

    <script src="../assets/ckeditor/ckeditor.js"></script>
</head>


<body>
    <!-- Page Content -->
    <?php include('../nav.php') ?>

    <!-- Page header -->
    <div class="pt-lg-8 pb-lg-16 pt-8 pb-12 bg-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-7 col-md-12">
                    <div>
                        <?php


                        $sql = $db->query("SELECT * FROM courses WHERE slug='$slug'") or die('Cannot connect to database');
                        $row = mysqli_fetch_array($sql);
                        $title = $row['title'];
                        $description = $row['description'];
                        $level = $row['difficulty'];
                        $price = $row['price'];
                        $false_price = $row['false_price'];
                        $courseId = $row['sn'];


                        $sqlq = $db->query("SELECT * FROM course_introductions WHERE course_id='$courseId'") or die('Cannot connect to database');
                        $intro = mysqli_fetch_array($sqlq);
                        ?>
                        <h1 class="text-white display-4 fw-semi-bold"><?= ucwords($title) ?></h1>
                        <p class="text-white mb-6 lead">
                            <?= $description ?>
                        </p>
                        <div class="d-flex align-items-center">
                            <a href="#" class="bookmark text-white text-decoration-none">
                                <i class="fe fe-bookmark text-white-50 me-2"></i>Bookmark
                            </a>

                            <span class="text-white ms-3"><i class="fe fe-user text-white-50"></i> 1200 Enrolled </span>
                            <span class="ms-4">
                                <i class="mdi mdi-star me-n1 text-warning"></i>
                                <i class="mdi mdi-star me-n1 text-warning"></i>
                                <i class="mdi mdi-star me-n1 text-warning"></i>
                                <i class="mdi mdi-star me-n1 text-warning"></i>
                                <i class="mdi mdi-star me-n1-half text-warning"></i>
                                <span class="text-white">(140)</span>
                            </span>
                            <span class="text-white ms-4 d-none d-md-block">
                                <svg width="16" height="16" viewBox="0 0 16
                              16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="3" y="8" width="2" height="6" rx="1" fill="#DBD8E9"></rect>
                                    <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                                    <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                                </svg>
                                <span class="align-middle">
                                    <?= $level ?>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 mt-n8 mb-4 mb-lg-0">
                    <!-- Card -->
                    <div class="card rounded-3">
                        <!-- Card header -->
                        <div class="card-header border-bottom-0 p-0">
                            <div>
                                <!-- Nav -->
                                <ul class="nav nav-lb-tab" id="tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="table-tab" data-bs-toggle="pill" href="#table" role="tab" aria-controls="table" aria-selected="true">Contents</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="description-tab" data-bs-toggle="pill" href="#description" role="tab" aria-controls="description" aria-selected="false">Introduction</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="review-tab" data-bs-toggle="pill" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="transcript-tab" data-bs-toggle="pill" href="#transcript" role="tab" aria-controls="transcript" aria-selected="false">Transcript</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="faq-tab" data-bs-toggle="pill" href="#faq" role="tab" aria-controls="faq" aria-selected="false">FAQ</a>
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
                                            <div>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#newModule" class="btn btn-primary btn-sm mb-2">Add Module</a>
                                                <a href="course-preview.php?slug=<?= $slug ?>" target="_blank" class="btn btn-success btn-sm mb-2">Preview Course</a>
                                            </div>
                                            <!-- List group -->
                                            <ul class="list-group list-group-flush">
                                                <?php
                                                $sql = $db->query("SELECT * FROM course_modules WHERE course_id = $courseId ");
                                                $i = 0;
                                                while ($row = mysqli_fetch_array($sql)) {
                                                    $moduleId = $row['sn'];
                                                    $i++;
                                                ?>
                                                    <li class="list-group-item px-0 pt-2">
                                                        <!-- Toggle -->
                                                        <div class=" h4 mb-0 d-flex align-items-center text-inherit text-decoration-none active" data-bs-toggle="collapse" href="#courseTwo<?= $row['sn'] ?>" aria-expanded="true" aria-controls="courseTwo">
                                                            <div class="me-auto">
                                                                <a href="" class="text-inherit">
                                                                    <?= ucwords($row['title']) ?>&nbsp;
                                                                </a>
                                                                <a href="" class="text-inherit" data-bs-toggle="modal" data-bs-target="#editModule">
                                                                    <i class="fe fe-edit"></i>
                                                                </a>
                                                            </div>
                                                            <!-- Chevron -->
                                                            <span class="chevron-arrow ms-4">
                                                                <i class="fe fe-chevron-down fs-4"></i>
                                                            </span>
                                                        </div>
                                                        <!-- Row -->
                                                        <!-- Collapse -->
                                                        <div class="collapse <?= $i == 1 ? 'show' : ''; ?> " id="courseTwo<?= $row['sn'] ?>" data-bs-parent="#courseAccordion">
                                                            <div class="pt-1 pb-2">
                                                                <small class="text-muted mb-2"><?= $row['description'] ?></small>
                                                                <div class="text-right">
                                                                    <button type="button" class="btn btn-primary btn-xs addContent mt-1 mb-2" data-sn="<?= $row['sn'] ?>" data-title="<?= $row['title'] ?>">Add Topics</button>
                                                                </div>
                                                                <?php
                                                                $sql2 = $db->query("SELECT * FROM course_topics WHERE module_id = $moduleId ");
                                                                while ($row = mysqli_fetch_array($sql2)) {
                                                                ?>
                                                                    <div class="mb-2 d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                                                                        <div class="text-truncate">

                                                                            <a href="javascript:;" class="text-inherit">
                                                                                <span class="icon-shape bg-light text-primary icon-sm rounded-circle me-2"><i class="mdi mdi-play fs-4"></i></span>
                                                                                <span><?= $row['title'] ?></span>
                                                                            </a>&nbsp;


                                                                        </div>
                                                                        <div class="text-truncate">
                                                                            <a href="#" class="text-inherit editContent" data-sn="<?= $row['sn'] ?>" data-title="<?= $row['title'] ?>" data-video_url="<?= $row['video_url'] ?>" data-notes='<?= htmlspecialchars(($row['notes'])) ?>' data-resources="<?= $row['resources'] ?>">
                                                                                <i class="fe fe-edit"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>

                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php } ?>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                                    <!-- Description -->
                                    <div class="mb-4">
                                        <?php
                                        $sql = $db->query("SELECT * FROM course_introductions ");

                                        $row = mysqli_fetch_array($sql)
                                        ?>

                                        <div>
                                            <h3 class="mb-2">Course Introduction
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#editIntro"><i class="fe fe-edit"></i></a>

                                            </h3>

                                        </div>
                                        <p>
                                            <?= $intro['body'] ?>
                                        </p>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <!-- Reviews -->
                                    <div class="mb-3">
                                        <h3 class="mb-4">How students rated this courses</h3>
                                        <div class="row align-items-center">
                                            <div class="col-auto text-center">
                                                <h3 class="display-2 fw-bold">4.5</h3>
                                                <i class="mdi mdi-star me-n1 text-warning"></i>
                                                <i class="mdi mdi-star me-n1 text-warning"></i>
                                                <i class="mdi mdi-star me-n1 text-warning"></i>
                                                <i class="mdi mdi-star me-n1 text-warning"></i>
                                                <i class="mdi mdi-star me-n1-half text-warning"></i>
                                                <p class="mb-0 fs-6">(Based on 27 reviews)</p>
                                            </div>
                                            <!-- Progress bar -->
                                            <div class="col pt-3 order-3 order-md-2">
                                                <div class="progress mb-3" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-3" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-3" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-3" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="progress mb-0" style="height: 6px;">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-auto col-6 order-2 order-md-3">
                                                <!-- Rating -->
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <span class="ms-1">53%</span>
                                                </div>
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <span class="ms-1">36%</span>
                                                </div>
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <span class="ms-1">9%</span>
                                                </div>
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <span class="ms-1">3%</span>
                                                </div>
                                                <div>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <i class="mdi mdi-star me-n1 text-light"></i>
                                                    <span class="ms-1">2%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- hr -->
                                    <hr class="my-5" />
                                    <div class="mb-3">
                                        <div class="d-lg-flex align-items-center justify-content-between mb-5">
                                            <!-- Reviews -->
                                            <div class="mb-3 mb-lg-0">
                                                <h3 class="mb-0">Reviews</h3>
                                            </div>
                                            <div>
                                                <!-- Form -->
                                                <form class="form-inline">
                                                    <div class="d-flex align-items-center me-2">
                                                        <span class="position-absolute ps-3">
                                                            <i class="fe fe-search"></i>
                                                        </span>
                                                        <input type="search" class="form-control ps-6" placeholder="Search Review" />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Rating -->
                                        <div class="d-flex border-bottom pb-4 mb-4">
                                            <img src="../assets/images/avatar/avatar-2.jpg" alt="" class="rounded-circle avatar-lg" />
                                            <div class=" ms-3">
                                                <h4 class="mb-1">
                                                    Max Hawkins
                                                    <span class="ms-1 fs-6 text-muted">2 Days ago</span>
                                                </h4>
                                                <div class="fs-6 mb-2">
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                </div>
                                                <p>Lectures were at a really good pace and I never felt lost. The instructor was well informed and allowed me to learn and navigate Figma easily.</p>
                                                <div class="d-lg-flex">
                                                    <p class="mb-0">Was this review helpful?</p>
                                                    <a href="#" class="btn btn-xs btn-primary ms-lg-3">Yes</a>
                                                    <a href="#" class="btn btn-xs btn-outline-white ms-1">No</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Rating -->
                                        <div class="d-flex border-bottom pb-4 mb-4">
                                            <img src="../assets/images/avatar/avatar-3.jpg" alt="" class="rounded-circle avatar-lg" />
                                            <div class=" ms-3">
                                                <h4 class="mb-1">Arthur Williamson <span class="ms-1 fs-6 text-muted">3 Days ago</span>
                                                </h4>
                                                <div class="fs-6 mb-2">
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                </div>
                                                <p>Its pretty good.Just a reminder that there are also students with Windows, meaning Figma its a bit different of yours. Thank you!</p>
                                                <div class="d-lg-flex">
                                                    <p class="mb-0">Was this review helpful?</p>
                                                    <a href="#" class="btn btn-xs btn-primary ms-lg-3">Yes</a>
                                                    <a href="#" class="btn btn-xs btn-outline-white ms-1">No</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Rating -->
                                        <div class="d-flex border-bottom pb-4 mb-4">
                                            <img src="../assets/images/avatar/avatar-4.jpg" alt="" class="rounded-circle avatar-lg" />
                                            <div class=" ms-3">
                                                <h4 class="mb-1">Claire Jones <span class="ms-1 fs-6 text-muted">4 Days ago</span></h4>
                                                <div class="fs-6 mb-2">
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                </div>
                                                <p>
                                                    Great course for learning Figma, the only bad detail would be that some icons are not included in the assets. But 90% of the icons needed are included, and the voice of the instructor was very clear and easy to understood.
                                                </p>
                                                <div class="d-lg-flex">
                                                    <p class="mb-0">Was this review helpful?</p>
                                                    <a href="#" class="btn btn-xs btn-primary ms-lg-3">Yes</a>
                                                    <a href="#" class="btn btn-xs btn-outline-white ms-1">No</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Rating -->
                                        <div class="d-flex">
                                            <img src="../assets/images/avatar/avatar-5.jpg" alt="" class="rounded-circle avatar-lg" />
                                            <div class=" ms-3">
                                                <h4 class="mb-1">
                                                    Bessie Pena
                                                    <span class="ms-1 fs-6 text-muted">5 Days ago</span>
                                                </h4>
                                                <div class="fs-6 mb-2">
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                    <i class="mdi mdi-star me-n1 text-warning"></i>
                                                </div>
                                                <p>
                                                    I have really enjoyed this class and learned a lot, found it very inspiring and helpful, thank you!
                                                    <i class="em em-heart_eyes ms-2 fs-6"></i>
                                                </p>
                                                <div class="d-lg-flex">
                                                    <p class="mb-0">Was this review helpful?</p>
                                                    <a href="#" class="btn btn-xs btn-primary ms-lg-3">Yes</a>
                                                    <a href="#" class="btn btn-xs btn-outline-white ms-1">No</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="transcript" role="tabpanel" aria-labelledby="transcript-tab">
                                    <!-- Description -->
                                    <div>
                                        <h3 class="mb-3">Transcript from the "Introduction" Lesson</h3>
                                        <div class="mb-4">
                                            <h4>Course Overview <a href="#" class="text-primary ms-2 h4">[00:00:00]</a></h4>
                                            <p class="mb-0">
                                                My name is John Deo and I work as human duct tape at Gatsby, that means that I do a lot of different things. Everything from dev roll to writing content to writing code. And I used to work as an architect at IBM. I live in Portland, Oregon.
                                            </p>
                                        </div>
                                        <div class="mb-4">
                                            <h4>Introduction <a href="#" class="text-primary ms-2 h4">[00:00:16]</a></h4>
                                            <p>
                                                We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or the language specifics. We're also gonna get into MDX. MDX is a way
                                                to write React components in your markdown.
                                            </p>
                                        </div>
                                        <div class="mb-4">
                                            <h4>Why Take This Course? <a href="#" class="text-primary ms-2 h4">[00:00:37]</a></h4>
                                            <p>
                                                We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or the language specifics. We're also gonna get into MDX. MDX is a way
                                                to write React components in your markdown.
                                            </p>
                                        </div>
                                        <div class="mb-4">
                                            <h4>A Look at the Demo Application <a href="#" class="text-primary ms-2 h4">[00:00:54]</a></h4>
                                            <p>
                                                We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or the language specifics. We're also gonna get into MDX. MDX is a way
                                                to write React components in your markdown.
                                            </p>
                                            <p>
                                                We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or the language specifics. We're also gonna get into MDX. MDX is a way
                                                to write React components in your markdown.
                                            </p>
                                        </div>
                                        <div class="mb-4">
                                            <h4>Summary <a href="#" class="text-primary ms-2 h4">[00:01:31]</a></h4>
                                            <p>
                                                We'll dive into GraphQL, the fundamentals of GraphQL. We're only gonna use the pieces of it that we need to build in Gatsby. We're not gonna be doing a deep dive into what GraphQL is or the language specifics. We're also gonna get into MDX. MDX is a way
                                                to write React components in your markdown.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tab pane -->
                                <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                                    <!-- FAQ -->

                                    <div>
                                        <h3 class="mb-3">Course - Frequently Asked Questions</h3>


                                        <div>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#newFaq" class="btn btn-primary btn-sm mb-2">Add FAQ</a>
                                        </div>
                                        <?php
                                        $sql3 = $db->query("SELECT * FROM course_faq WHERE course_id = $courseId ");
                                        while ($row3 = mysqli_fetch_array($sql3)) {
                                        ?>
                                            <div class="mb-4">
                                                <h4><?= $row3['questions'] ?></h4>
                                                <p>
                                                    <?= $row3['answers'] ?>
                                                </p>
                                            </div>

                                        <?php } ?>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 mt-lg-n22">
                    <!-- Card -->
                    <div class="card mb-3 mb-4">
                        <div class="p-1">

                            <div class="d-flex justify-content-center position-relative rounded py-10 border-white border rounded-3 bg-cover" style="background-image: url(../assets/images/course/<?= $intro['image_url'] ?>" );">
                                <a class="popup-youtube icon-shape rounded-circle btn-play icon-xl text-decoration-none" href="https://www.youtube.com/watch?v=JRzWRZahOVU">
                                    <i class="fe fe-play"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Price single page -->
                            <div class="mb-3">
                                <span class="text-dark fw-bold h2"><?= money($price) ?></span>
                                <del class="fs-4 text-muted"><?= money($false_price) ?></del>

                                <a href="#" data-bs-toggle="modal" data-bs-target="#editPrice"><i class="fe fe-edit"></i></a>
                            </div>
                            <div class="d-grid">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editMedia" class="btn btn-primary mb-2">Edit Media</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="card mb-4">
                        <div>
                            <!-- Card header -->
                            <div class="card-header">
                                <h4 class="mb-0">What’s included</h4>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-transparent"><i class="fe fe-play-circle align-middle me-2 text-primary"></i>12 hours video</li>
                                <li class="list-group-item bg-transparent"><i class="fe fe-award me-2 align-middle text-success"></i>Certificate</li>
                                <li class="list-group-item bg-transparent"><i class="fe fe-calendar align-middle me-2 text-info"></i>12 Article
                                </li>
                                <li class="list-group-item bg-transparent"><i class="fe fe-video align-middle me-2 text-secondary"></i>Watch Offline</li>
                                <li class="list-group-item bg-transparent border-bottom-0"><i class="fe fe-clock align-middle me-2 text-warning"></i>Lifetime access</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Card -->

                </div>
            </div>
            <!-- Card -->
            <div class="pt-12 pb-3">
                <div class="row d-md-flex align-items-center mb-4">
                    <div class="col-12">
                        <h2 class="mb-0">Related Courses</h2>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $sql4 = $db->query("SELECT * FROM courses ORDER BY updated_at DESC LIMIT 4");
                    while ($row4 = mysqli_fetch_array($sql4)) {

                    ?>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Card -->
                            <div class="card mb-4 card-hover">
                                <a href="course-single.html" class="card-img-top"><img src="../assets/images/course/<?= $row4['image'] ?? 'noimage.png'  ?>" alt="" class="card-img-top rounded-top-md" /></a>
                                <!-- Card body -->
                                <div class="card-body">
                                    <h4 class="mb-2 text-truncate-line-2"><a href="course-single.html" class="text-inherit"><?= ucwords($row4['title']) ?></a></h4>
                                    <ul class="mb-3 list-inline">
                                        <li class="list-inline-item"><i class="far fa-clock me-1"></i>3h 56m</li>
                                        <li class="list-inline-item">
                                            <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE" />
                                                <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9" />
                                                <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9" />
                                            </svg> <?= $row4['difficulty'] ?>
                                        </li>
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
                                        <span class="fs-6 text-muted">(7,700)</span>
                                    </div>
                                </div>
                                <!-- Card footer -->
                                <div class="card-footer">
                                    <div class="row align-items-center g-0">
                                        <div class="col-auto">
                                            <img src="../assets/images/avatar/avatar-1.jpg" class="rounded-circle avatar-xs" alt="" />
                                        </div>
                                        <div class="col ms-2">
                                            <span>Morris Mccoy</span>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="text-muted bookmark">
                                                <i class="fe fe-bookmark  "></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>


                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <!-- Footer -->
    <?php include('../footer.php') ?>
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
    <script src="../cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>


    <!-- Theme JS -->
    <script src="../assets/js/theme.min.js"></script>
    <script src="../Instructor/instructors.js"></script>

    <script>
        CKEDITOR.replace('intro')
        CKEDITOR.replace('notes')
    </script>

    <script>
        $(function() {
            $('body').on('click', '.addContent', function() {
                title = $(this).data('title')
                sn = $(this).data('sn')
                $('#addContent').modal('show');
                $('.contentTitle').html(`Add Content For ${title}`);
                $('.add_content_topic_id').val(sn);
            })




            $('body').on('click', '.editContent', function() {
                title = $(this).data('title')
                sn = $(this).data('sn');
                res = $(this).data('resources');
                vid = $(this).data('video_url');
                note = $(this).data('notes');
                $('.edit_topic_video_url').val(vid);
                $('.edit_topic_res').val(res);
                $('.edit_topic_id').val(sn);
                $('.edit_topic_title').val(title);
                $('.edit_topic_notes').html(note);
                $('#editContent').modal('show');
                $('.editContentTitle').html(`Edit Content For ${title}`);

            })


        })
    </script>

    <script>
        function parseUrl(val) {
            var vimeoRegex = /(?:vimeo)\.com.*(?:videos|video|channels|)\/([\d]+)/i;
            var parsed = val.match(vimeoRegex);

            return "https://player.vimeo.com/video/" + parsed[1];
        };

        vimeoUrl = document.getElementById('video_url')
        vimeoUrl.onkeyup = function() {
            val = vimeoUrl.value
            vim = parseUrl(val)

            console.log(vim)
            document.getElementById('vimeo_embed_url').value = vim

        }
    </script>

</body>


</html>