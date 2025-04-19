<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/jaringanku.css') ?>" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color:rgb(216, 101, 72);">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="d-flex justify-content-between w-100 align-items-center">
                <div class="d-flex align-items-center ">
                    <h4 class="mt-2 mx-3 ">
                        <a class="navbar-brand" href="<?= base_url('/') ?>">PT. Jaringanku</a>
                    </h4>


                    <div class="mt-1 icon-nav">
                        <i class="bi bi-list fs-3" id="toggle-icon"></i>
                    </div>


                </div>







                <h6 class="p-2 mt-1 font-weight-light">Logged as : <span class="font-weight-bold">tester</span></h6>
            </div>
        </div>
    </nav>

    <div class="sidebar" id="sidebar" style="z-index: 100;">

        <ul class="nav flex-column mt-lg-0">
            <li class="nav-item mt-3 d-flex">
                <a class=" d-flex align-items-center gap-3 text-white mx-2 text-decoration-none" href="">
                    <i class="bi bi-speedometer fs-4 icon-list-nav"></i>
                    <span class="menuname-nav">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mt-3 d-flex">
                <a class=" d-flex align-items-center gap-3 text-white mx-2 text-decoration-none" href="">
                    <i class="bi bi-people fs-4 icon-list-nav"></i>
                    <span class="menuname-nav">Customer</span>
                </a>
            </li>
            <li class="nav-item mt-3 d-flex">
                <a class=" d-flex align-items-center gap-3 text-white mx-2 text-decoration-none" href="">
                    <i class="bi bi-credit-card fs-4 icon-list-nav"></i>
                    <span class="menuname-nav">Pembayaran</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <a class=" text-white d-flex align-items-center gap-3 mx-2 text-decoration-none" href="">
                    <i class="bi bi-box-arrow-right fs-4 icon-list-nav"></i>
                    <span class="menuname-nav">Logout</span>
                </a>
            </li>
        </ul>

    </div>

    <?= $this->renderSection('content'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.navbar-toggler').click(function() {
                $('#sidebar').toggleClass('active');
            });
        });
        $(document).ready(function() {

            $('.icon-nav').click(function() {

                $('#sidebar').toggleClass('fullmenu-active');
                $('.main-content').toggleClass('fullmenu-desktop-active');
                $('#toggle-icon').toggleClass('bi-list bi-x');
            });
        });
    </script>
</body>

</html>