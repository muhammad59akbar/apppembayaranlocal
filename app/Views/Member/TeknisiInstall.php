<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#install-<?= $m['id_pelanggan'] ?>">
    <i class="bi bi-gear-wide-connected"></i>
</button>


<div class="modal fade" id="install-<?= $m['id_pelanggan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">

                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <label for="namalengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control <?= session('errors.namalengkap') ? 'is-invalid' : '' ?>" id="namalengkap" aria-describedby="namalengkap" name="namalengkap" value="<?= old('namalengkap') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.namalengkap') ?>
                        </div>

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