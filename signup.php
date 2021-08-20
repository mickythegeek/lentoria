<?php
session_start();
ob_start();
ob_clean();
include('lib/connect.inc.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon/favicon.ico">


    <!-- Libs CSS -->

    <link href="assets/fonts/feather/feather.css" rel="stylesheet" />
    <link href="assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/libs/dragula/dist/dragula.min.css" rel="stylesheet" />
    <link href="assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="assets/libs/prismjs/themes/prism.css" rel="stylesheet" />
    <link href="assets/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
    <link href="assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet" />
    <link href="assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="assets/libs/%40yaireo/tagify/dist/tagify.css" rel="stylesheet">
    <link href="assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
    <link href="assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">
    <link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">





    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/css/theme.min.css">
    <title>Register</title>
</head>

<body>
    <!-- Page content -->
    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center g-0 min-vh-100">
            <div class="col-lg-5 col-md-8 py-8 py-xl-0">
                <!-- Card -->
                <div class="card shadow ">
                    <!-- Card body -->
                    <div class="card-body p-6">
                        <div class="mb-4">
                            <a href="../index.html"><img src="assets/images/brand/logo/logo-icon.svg" class="mb-4" alt=""></a>
                            <h1 class="mb-1 fw-bold">Sign Up</h1>
                            <span>Already have an account? <a href="login.php" class="ms-1">Sign In</a></span>
                        </div>
                        <!-- Form -->

                        <form>
                            <div id="alert"></div>
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="Email address here" required>
                                <i id="email_err"></i>
                            </div>
                            <!-- Phone -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="phone" id="phone" class="form-control" name="phone" placeholder="Phone Number here" required>
                                <i id="phone_err"></i>
                            </div>
                            <!-- First Name -->
                            <div class="mb-3">
                                <label for="firstname" class="form-label">First Name</label>
                                <input type="firstname" id="firstname" class="form-control" name="firstname" placeholder="First Name here" required>
                                <i id="firstname_err"></i>
                            </div>
                            <!-- Last Name -->
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="lastname" id="lastname" class="form-control" name="lastname" placeholder="Last Name here" required>
                                <i id="lastname_err"></i>
                            </div>


                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" name="password" placeholder="**************" required>
                            </div>
                            <div>
                                <!-- Button -->
                                <div class="d-grid">
                                    <button type="submit" id="button" class="btn btn-primary ">Sign Up</button>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="mt-4 text-center">
                                <!--Facebook-->
                                <a href="#" class="btn-social btn-social-outline btn-facebook">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <!--Twitter-->
                                <a href="#" class="btn-social btn-social-outline btn-twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <!--LinkedIn-->
                                <a href="#" class="btn-social btn-social-outline btn-linkedin">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                                <!--GitHub-->
                                <a href="#" class="btn-social btn-social-outline btn-github">
                                    <i class="fab fa-github"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <!-- Libs JS -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/odometer/odometer.min.js"></script>
    <script src="assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <script src="assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
    <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="assets/libs/quill/dist/quill.min.js"></script>
    <script src="assets/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js"></script>
    <script src="assets/libs/dragula/dist/dragula.min.js"></script>
    <script src="assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="assets/libs/dropzone/dist/min/dropzone.min.js"></script>
    <script src="assets/libs/jQuery.print/jQuery.print.js"></script>
    <script src="assets/libs/prismjs/prism.js"></script>
    <script src="assets/libs/prismjs/components/prism-scss.min.js"></script>
    <script src="assets/libs/%40yaireo/tagify/dist/tagify.min.js"></script>
    <script src="assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
    <script src="assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
    <script src="assets/libs/typed.js/lib/typed.min.js"></script>
    <script src="assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
    <script src="assets/libs/jsvectormap/dist/maps/world.js"></script>
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>




    <!-- clipboard -->
    <script src="../cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>


    <!-- Theme JS -->
    <script src="assets/js/theme.min.js"></script>

    <script>
        button = $('#button');
        password = $('#password');
        alert = $('#alert');
        email = $('#email');
        phone = $('#phone');
        firstname = $('#firstname');
        lastname = $('#lastname');
        link = '<?= LINK ?>';


        function validateEmail(email) {
            const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }


        const fader = () => {

        }



        email.on('keyup', function() {
            console.log('Derin')
            val = $('#email').val();
            if (validateEmail(val)) {
                $.ajax({
                    method: 'GET',
                    url: link + '?emailChecker=' + val,
                }).done(function(res) {
                    console.log(res);
                    res = JSON.parse(res);

                    if (res.status == 5) {
                        $('#email_err').html(res.message);
                        $('#email_err').attr('class', 'text-danger');
                        button.attr('disabled', 'disabled');
                    } else {
                        $('#email_err').html(``);
                        button.removeAttr('disabled');
                    }
                })
            }

        })


        const performAuth = (email, phone, id, fname, lname, img) => {
            $.ajax({
                method: 'POST',
                url: 'api.php',
                data: {
                    signupDetails: '',
                    email: email,
                    firstname: fname,
                    lastname: lname,
                    phone: phone,
                    id: id,
                    img: img,

                }
            }).done(function(res) {
                return res;
            });

        }


        button.on('click', function() {
            event.preventDefault();
            email = $('#email').val();
            phone = $('#phone').val();
            firstname = $('#firstname').val();
            lastname = $('#lastname').val();
            password = $('#password').val();

            if (email == '' || password == '' || phone == '' || firstname == '' || lastname == '' || password == '') {
                alert.fadeIn(500);
                alert.html('All Fields are required!');
                alert.attr('class', 'alert alert-danger');
                setTimeout(function() {
                    alert.fadeOut(2000);
                }, 2000)
            } else {
                alert.fadeIn(500);
                $.ajax({
                    method: 'POST',
                    url: link,
                    data: {
                        signupDetails: '',
                        email: email,
                        phone: phone,
                        firstname: firstname,
                        lastname: lastname,
                        password: password,
                    },
                    beforeSend: () => {
                        button.html(`<i>Processing...</i>`);
                    }
                }).done(function(res) {
                    res = JSON.parse(res);
                    console.log(res);
                    data = res.data
                    if (res.success) {
                        alert.attr('class', 'alert alert-success');
                        alert.html(`Authenticating...`);
                        performAuth(data.email, data.phone, data.sn, data.firstname, data.lastname, data.photo);
                        alert.html(`Registration Sucessful! Redirecting...`);
                        setTimeout(function() {
                            window.location.href = 'user/';
                        }, 2000);
                    } else {
                        button.html(`Sign Up`);
                        alert.html(`${res.message}`);
                        alert.attr('class', 'alert alert-danger');
                        setTimeout(function() {
                            alert.fadeOut(2000);
                        }, 2000)

                    }
                })
            }

        })
    </script>
</body>


</html>