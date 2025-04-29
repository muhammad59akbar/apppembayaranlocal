<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahuser">
    <i class="bi bi-person-add"></i> Tambah Data User
</button>


<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success mt-2" role="alert">
        <?= session()->getFlashdata('message') ?>
    </div>
<?php endif; ?>

<div class="modal fade" id="tambahuser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('billing/Admin/tambahUser') ?>" method="post">
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <label for="namalengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control <?= session('errors.namalengkap') ? 'is-invalid' : '' ?>" id="namalengkap" aria-describedby="namalengkap" name="namalengkap" value="<?= old('namalengkap') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.namalengkap') ?>
                        </div>

                    </div>
                    <div class="d-flex flex-column mt-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>" id="email" aria-describedby="email" name="email" value="<?= old('email') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.email') ?>
                        </div>
                    </div>
                    <div class="d-flex flex-column mt-2">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control <?= session('errors.username') ? 'is-invalid' : '' ?>" id="username" aria-describedby="username" name="username" value="<?= old('username') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.username') ?>
                        </div>
                    </div>
                    <div class="d-flex flex-column mt-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>" id="password" aria-describedby="password" name="password">
                        <div class="invalid-feedback">
                            <?= session('errors.password') ?>
                        </div>
                    </div>
                    <div class="d-flex flex-column mt-2">
                        <label for="confpass" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control <?= session('errors.confpass') ? 'is-invalid' : '' ?>" id="confpass" aria-describedby="confpass" name="confpass">
                        <div class="invalid-feedback">
                            <?= session('errors.confpass') ?>
                        </div>
                    </div>
                    <div class="mb-3 mt-2">
                        <label class="form-label">Role</label>
                        <select class="form-select" aria-label="Default select example" name="role">
                            <option value="1">Direktur</option>
                            <option value="2">Finance</option>
                            <option value="3">Admin</option>
                            <option value="4">Teknisi</option>
                            <option value="5" selected>Customer</option>
                        </select>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>