<?= $this->extend('Layout/Templates'); ?>
<?= $this->section('content'); ?>
<div class="pt-2">
    <h1>Data User</h1>
    <hr>
    <?= $this->include('Member/TambahUser'); ?>

    <div class="table-responsive mt-2">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                <?php foreach ($all_member as $member) : ?>
                    <tr class="text-center">
                        <th><?= $no++ ?></th>
                        <td><?= $member['email'] ?></td>
                        <td><?= $member['username'] ?></td>
                        <td><?= $member['nama_lengkap'] ?></td>
                        <td><?= $member['roles'] ?></td>
                        <td>
                            <a href="<?= base_url('billing/Admin/detailMember/' . url_title($member['nama_lengkap'], '-', true)); ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                            <form class="d-inline" method="post" action="<?= base_url('billing/Admin/deleteMember/' . $member['id']) ?>">

                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus Pengguna ini ???')"><i class="bi bi-archive-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>
    </div>
</div>


<script>
    $(document).ready(function() {
        <?php if (session('errors')) : ?>

            $('#tambahuser').modal('show');

        <?php endif; ?>
    });
</script>




<?= $this->endSection(); ?>