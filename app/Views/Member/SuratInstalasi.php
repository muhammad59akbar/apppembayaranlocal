<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Jalan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
    @page {
        size: auto;
        margin: 0mm;
    }
</style>

<body>

    <div class="container my-4">

        <div class="row align-items-center border-bottom pb-3 mb-4">
            <div class="col-2">
                <img src="https://www.isolir.jaringanku.my.id/images/logo-jsn.png" alt="Logo Perusahaan" width="100">
            </div>
            <div class="col-10 text-center">
                <h4 class="mb-0">PT. Jaringanku Nusantara</h4>
                <p class="mb-0">Jl. Lapangan Pors VIII No.18A, RT.10/RW.4, Serdang, Kec. Kemayoran, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10650</p>
            </div>
        </div>


        <div class="text-center mb-4">
            <h5 class="text-decoration-underline">SURAT JALAN</h5>
            <p class="mb-0">No: 00<?= $memberku['id_pelanggan'] ?>/SJ/IV/2025</p>
        </div>


        <div class="row mb-2">
            <div class="col-3"><strong>Kepada Yth</strong></div>
            <div class="col-8 text-capitalize">: <?= $memberku['nama_member'] ?></div>
        </div>
        <div class="row mb-2">
            <div class="col-3"><strong>Alamat</strong></div>
            <div class="col-8 text-capitalize">: <?= $memberku['alamat_cust'] ?></div>
        </div>

        <table class="table table-bordered">
            <thead class="table-light">
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>1</td>
                    <td>Router ZTE RB750 / <?= $memberku['nama_paket'] ?></td>
                    <td>1 Unit</td>
                    <td>Untuk Instalasi Internet</td>
                </tr>

            </tbody>
        </table>

        <!-- Tanda Tangan -->
        <div class="row mt-5">
            <div class="col text-center">
                <p>Jakarta, 29 April 2025</p>
                <p><strong>Teknisi</strong></p>
                <br><br>
                <p>( <span class="text-capitalize text-decoration-underline"><?= $memberku['teknisi'] ?></span> )</p>
            </div>
            <div class="col text-center">
                <p>&nbsp;</p>
                <p><strong>Penerima</strong></p>
                <br><br>
                <p>( <span class="text-capitalize text-decoration-underline"><?= $memberku['nama_member'] ?></span> )</p>
            </div>
        </div>
    </div>

</body>

</html>