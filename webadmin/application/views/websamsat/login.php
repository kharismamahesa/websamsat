<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - Web Admin Samsat</title>
    <link href="<?= base_url('assets/sbadmin2/vendor/') ?>fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/sbadmin2/css/') ?>sb-admin-2.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row justify-content-md-center">

                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h3><img src="<?= base_url("assets/"); ?>logo_bapenda.png" width="50%"></h3>
                                        <h1 class="h5 text-gray-900 mb-4">
                                            Web Admin Samsat</h1>
                                    </div>

                                    <form class="user" action="<?= base_url('login/login') ?>" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user" placeholder="Masukkan Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Masukkan Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block"><i class="fas fa-unlock"></i> Masuk</button>
                                    </form>
                                    <hr>
                                    <?php if (validation_errors() || $this->session->flashdata('result_login')) { ?>
                                        <div class="card bg-danger text-white shadow">
                                            <div class="card-body">
                                                Peringatan!
                                                <div class="text-white-50 small"><?= $this->session->flashdata('result_login') ?></div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="<?= base_url('assets/sbadmin2/vendor/') ?>jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/sbadmin2/vendor/') ?>bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/sbadmin2/vendor/') ?>jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('assets/sbadmin2/js/') ?>sb-admin-2.min.js"></script>

</body>

</html>