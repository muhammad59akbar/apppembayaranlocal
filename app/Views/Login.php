<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login Member Jaringanku</title>
</head>

<body>

    <div class="container py-5 mt-5">
        <div class="row align-items-center">

            <div class="col-md-5 mb-4 mb-md-0">
                <div class="container">
                    <h1 class="text-center text-md-start">Login Member</h1>
                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <form action="<?= url_to('login') ?>" method="post">
                        <?= csrf_field() ?>
                        <?php if ($config->validFields === ['email']) : ?>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="email" placeholder="email" name="login">
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                            </div>

                        <?php else : ?>



                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" id="username" placeholder="Username" name="login">
                                <div class="invalid-feedback">
                                    <?= session('errors.login') ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="password" placeholder="Password">
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>


            <div class="col-md-6 text-center">
                <img src="<?= base_url('assets/images/member.png') ?>" alt="M-Links" class="img-fluid" style="max-height: 400px;">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>