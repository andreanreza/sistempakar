<div class="row">
    <div class="col-md-10">
        <form action="<?= base_url('user/user/proseshasil'); ?>" method="post">
            <input type="hidden" name="id_user" value="<?= $user['id']; ?>">
            <div class="form-group">
                <label for="id_gejala">Silahkan pilih gejala anda</label>
                <select multiple class="form-control" id="id_gejala" name="id_gejala[]">
                    <?php foreach ($gejala as $gj) : ?>
                        <option value="<?= $gj->id; ?>"><?= $gj->nama_gejala; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>