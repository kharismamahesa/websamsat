<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Admin - Website Samsat</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/sbadmin2/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/sbadmin2/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <style>
        body, input, button, select, textarea {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
        }
    </style>
</head>

<body class="bg-gradient-success">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center" style="margin-top: 10%;">
            <div class="col-xl-5 col-lg-6 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <div class="mb-4">
                                            <i class="fas fa-user-shield fa-3x text-success"></i>
                                        </div>
                                        <h1 class="h4 text-gray-900 mb-2 font-weight-bold">Dasbor Admin</h1>
                                        <p class="text-muted small mb-4">Website Samsat</p>
                                    </div>

                                    <div id="alert-message" class="alert d-none text-center small py-2"></div>

                                    <form class="user" id="login-form">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="username" name="username" placeholder="Masukkan Username..." required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Password" required>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-user btn-block font-weight-bold" id="btn-submit">
                                            <span class="spinner-border spinner-border-sm d-none mr-2" role="status" aria-hidden="true" id="submit-spinner"></span>
                                            Masuk
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/sbadmin2/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/sbadmin2/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/sbadmin2/js/sb-admin-2.min.js') ?>"></script>

    <script>
        $(document).ready(function() {
            $('#login-form').on('submit', function(e) {
                e.preventDefault();

                const alertBox = $('#alert-message');
                const spinner = $('#submit-spinner');
                const btnSubmit = $('#btn-submit');

                alertBox.addClass('d-none').removeClass('alert-danger alert-success');
                spinner.removeClass('d-none');
                btnSubmit.prop('disabled', true);

                $.ajax({
                    url: "<?= base_url('adminauth/login') ?>",
                    type: "POST",
                    dataType: "JSON",
                    data: $(this).serialize(),
                    success: function(response) {
                        spinner.addClass('d-none');
                        btnSubmit.prop('disabled', false);

                        if (response.status === 'success') {
                            alertBox.removeClass('d-none').addClass('alert-success').html('<i class="fas fa-check-circle mr-2"></i>' + response.message);
                            setTimeout(function() {
                                window.location.href = "<?= base_url('admin') ?>";
                            }, 1000);
                        } else {
                            alertBox.removeClass('d-none').addClass('alert-danger').html('<i class="fas fa-exclamation-circle mr-2"></i>' + response.message);
                        }
                    },
                    error: function() {
                        spinner.addClass('d-none');
                        btnSubmit.prop('disabled', false);
                        alertBox.removeClass('d-none').addClass('alert-danger').html('<i class="fas fa-exclamation-circle mr-2"></i>Terjadi kesalahan sistem. Coba lagi.');
                    }
                });
            });
        });
    </script>
</body>
</html>
