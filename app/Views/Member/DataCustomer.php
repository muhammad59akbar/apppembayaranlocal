<?= $this->extend('Layout/Templates'); ?>
<?= $this->section('content'); ?>
<div class="pt-2">
    <h1><?= in_groups(['Admin', 'Direktur']) ? 'Data Customer' : 'Data Pemasangan' ?></h1>

    <hr>
    <?= $this->include('Member/TambahCustomer'); ?>



    <?php

    use Faker\Provider\Base;

    if (!empty($memberku)) : ?>
        <div class="table-responsive mt-2">
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <?php if (in_groups(['Admin', 'Direktur'])) : ?>
                            <th scope="col">No Pel</th>
                            <th scope="col">Username</th>
                        <?php endif; ?>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Nama Paket</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>

                    <?php foreach ($memberku as $m) : ?>


                        <tr class="text-center">
                            <th><?= $no++ ?></th>
                            <?php if (in_groups(['Admin', 'Direktur'])) : ?>
                                <td><?= $m['no_pelanggan'] ?></td>
                                <td><?= $m['username'] ?></td>
                            <?php endif; ?>
                            <td class="text-capitalize"><?= $m['nama_member'] ?></td>
                            <td class="text-capitalize"><?= $m['alamat_cust'] ?></td>
                            <td><?= $m['no_telp_cust'] ?></td>
                            <td><?= $m['nama_paket'] ?></td>
                            <td><?= $m['status'] ?></td>
                            <td class="d-flex justify-content-center align-items-center flex-nowrap">
                                <?= view('Member/TeknisiInstall', ['m' => $m]) ?>
                                <?php if ($m['teknisi'] !== null) : ?>
                                    <a href="<?= base_url('billing/customer/SuratJalan/' . $m['no_pelanggan']) ?>" class="btn btn-success mx-1">
                                        <i class="bi bi-postcard"></i>
                                    </a>
                                <?php endif; ?>

                            </td>
                        </tr>
                    <?php endforeach ?>


                </tbody>
            </table>
        </div>
    <?php else : ?>
        <p class="mt-1">Data Pemasangan Tidak Tersedia !!!</p>

    <?php endif ?>
</div>


<script>
    $(document).ready(function() {
        <?php if (session('errors')) : ?>

            $('#tambahCustomer').modal('show');

        <?php endif; ?>
    });
</script>




<?= $this->endSection(); ?>