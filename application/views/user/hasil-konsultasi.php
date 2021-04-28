<div class="row">
    <div class="col-md-4">
        <img src="<?= base_url('assets/img/') . $user['image']; ?>" alt="gambar user" class="img-thumbnail" width="200">
        <h5 class="mt-2 text-muted"><?= $user['username']; ?></h5>
        <p><a href="<?= base_url('user/user/konsultasi'); ?>">
                <button type="reset" class="btn btn-danger"><i class="ti-arrow-left"></i></button>
    </div>
    <?php
    $user = $user['id'];

    $this->db->select('tb_hasil.id_h, tb_gejala.*, tb_penyakit.nama_penyakit');
    $this->db->from('tb_hasil');
    $this->db->join('tb_gejala', 'tb_gejala.id = tb_hasil.id_gejala');
    $this->db->join('tb_penyakit', 'tb_penyakit.id = tb_hasil.id_penyakit');
    $this->db->where('tb_hasil.id_user', $user);
    // $this->db->order_by('tb_submenu.order_by', 'asc');
    $gejala = $this->db->get()->result_array();
    ?>
    <div class="col-md-8">
        <!-- <div class="alert alert-secondary" style="position: fixed;" role="alert"> -->
        <div class="card">
            <div class=" card-header" style="font-weight: bold;">
                Daftar gejala yang anda pilih ....
            </div>

            <ul class="list-group list-group-flush">
                <?php if (!$gejala) : ?>
                    <li class="list-group-item">Gejala masih kosong <i class="ti-hand-point-right"></i> <a href="<?= base_url('user/user/konsultasi'); ?>" class="badge badge-primary">konsultasi</a></li>
                <?php else : ?>
                    <?php foreach ($gejala as $gj) : ?>
                        <li class="list-group-item"><?= $gj['nama_gejala']; ?>
                            <a href="<?= base_url('user/user/hapusgejala/') . $gj['id_h']; ?>" class="badge badge-danger ms-auto">hapus</a>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <!-- </div> -->
</div>


<div class="row">
    <div class="col-md-12">
        <?php if ($gejala) : ?>
            <div class="alert alert-primary" role="alert">
                Anda terkena penyakit <span style="font-weight: bold;"><?= $gj['nama_penyakit']; ?></span>
            </div>
            <div class="alert alert-primary" role="alert">
                solusinya yaitu <span style="font-weight: bold;"><?= $gj['solusi']; ?></span>
            </div>
        <?php endif; ?>
    </div>
</div>

<!--  -->