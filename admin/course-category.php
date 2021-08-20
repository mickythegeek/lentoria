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

    <!-- Favicon icon-->

    <title>Dashboard</title>
</head>

<body>
    <!-- Wrapper -->
    <div id="db-wrapper">
        <!-- navbar vertical -->
        <!-- Sidebar -->
        <?php include('sidebar.php') ?>
        <!-- Page Content -->
        <div id="page-content">

            <?php include('header.php') ?>

            <!-- Page Header -->
            <!-- Container fluid -->
            <div class="container-fluid p-4">
                <div class="row">
                    <!-- Page Header -->
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="border-bottom pb-4 mb-4 d-md-flex align-items-center justify-content-between">
                            <div class="mb-3 mb-md-0">

                                <h1 class="mb-1 h2 fw-bold">Courses Category</h1>
                                <!-- Breadcrumb -->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="admin-dashboard.html">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="#">Courses</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Courses Category
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newCatgory">Add New
                                    Category</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card header -->
                            <div class="card-header border-bottom-0">
                                <!-- Form -->
                                <form class="d-flex align-items-center">
                                    <span class="position-absolute ps-3 search-icon">
                                        <i class="fe fe-search"></i>
                                    </span>
                                    <input type="search" class="form-control ps-6" placeholder="Search Course Category" />
                                </form>
                            </div>
                            <!-- Table -->
                            <div class="table-responsive border-0 overflow-y-hidden">
                                <table class="table mb-0 text-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="border-0 font-size-inherit">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="checkAll" />
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th class="border-0">CATEGORY</th>
                                            <!-- <th class="border-0">Course</th> -->
                                            <th class="border-0">DATE CREATED</th>
                                            <th class="border-0">DATE UPDATED</th>
                                            <th class="border-0">STATUS</th>
                                            <th class="border-0"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = $db->query("SELECT * FROM course_categories ORDER BY  sn DESC LIMIT 20 ");
                                        while ($row = mysqli_fetch_array($sql)) {
                                        ?>
                                            <tr>
                                                <td class="align-middle">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="categoryCheck3" />
                                                        <label class="form-check-label" for="categoryCheck3"></label>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="sub-category.php?slug=<?= $row['slug'] ?>" class="text-inherit">
                                                        <h5 class="mb-0 text-primary-hover"><?= $row['title']  ?></h5>
                                                    </a>
                                                </td>
                                                <!-- <td class="align-middle">6</td> -->
                                                <td class="align-middle"><?= $row['created_at']  ?></td>
                                                <td class="align-middle"><?= $row['updated_at']  ?></td>
                                                <td class="align-middle">
                                                    <span class="badge-dot bg-success"></span>
                                                </td>
                                                <td class="text-muted align-middle">
                                                    <span class="dropdown dropstart">
                                                        <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown3" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                                            <i class="fe fe-more-vertical"></i>
                                                        </a>
                                                        <span class="dropdown-menu" aria-labelledby="courseDropdown3">
                                                            <span class="dropdown-header">Action</span>
                                                            <!-- <a class="dropdown-item" href="#"><i class="fe fe-send dropdown-item-icon"></i>Publish</a> -->
                                                            <a class="dropdown-item editCategoryBtn" href="javascript:;" data-title="<?= $row['title'] ?>" data-sn="<?= $row['sn'] ?>" data-description="<?= $row['description'] ?>"><i class="fe fe-send dropdown-item-icon"></i>Edit</a>                                    
                                                            <!-- <a class="dropdown-item" href="#"><i class="fe fe-inbox dropdown-item-icon"></i>Moved
                                                            Draft</a> -->
                                                            <a class="dropdown-item" href="#"><i class="fe fe-inbox dropdown-item-icon"></i>Activate</a>
                                                            <a class="dropdown-item" href="#"><i class="fe fe-trash dropdown-item-icon"></i>Deactivate</a>
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
    </div>



    <div class="modal fade" id="newCatgory" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0" id="newCatgoryLabel">
                        Create New Category
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="mb-3 mb-2">
                            <label class="form-label" for="title">Title<span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="Write a Category" id="title" required>
                            <small>Field must contain a unique value</small>
                        </div>
                        <div class="mb-3 mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Status</label>
                            <div class="form-check form-switch">
                                <input type="checkbox" name="status" value="1" class="form-check-input" id="customSwitch1" checked>
                                <label class="form-check-label" for="customSwitch1"></label>
                            </div>
                        </div>
                        <div>
                            <button type="submit" name="addCategory" class="btn btn-primary">Add New Category</button>
                            <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="editCatgory" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0 edit_category_head" id="newCatgoryLabel">
                        Edit Category
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="mb-3 mb-2">
                            <label class="form-label" for="title">Title<span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control edit_category_title" placeholder="Write a Category" id="title" required>
                            <input type="hidden" class="edit_category_sn" name="sn">
                            <small>Field must contain a unique value</small>
                        </div>
                        <div class="mb-3 mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control edit_category_des" rows="5"></textarea>
                        </div>
                        <div>
                            <button type="submit" name="editCategory" class="btn btn-primary">Edit Category</button>
                            <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Script -->
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
        $(function() {
            $('body').on('click', '.editCategoryBtn', function() {
                sn = $(this).data('sn');
                title = $(this).data('title');
                des = $(this).data('description');
                $('#editCatgory').modal('show');
                $('.edit_category_head').html('Edit Category');
                $('.edit_category_title').val(title);
                $('.edit_category_sn').val(sn);
                $('.edit_category_des').val(des);
            })

        })
    </script>

</body>
</html>