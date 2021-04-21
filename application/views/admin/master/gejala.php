  <!-- Page-body start -->
  <div class="page-body">
      <!-- Basic table card start -->
      <div class="card">
          <div class="card-header">
              <?= $this->session->flashdata('pesan'); ?>
              <!-- button modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addGejala">
                  <i class="fas fa-plus mr-3"> Add gejala</i>
              </button>

              <div class="card-header-right">
                  <ul class="list-unstyled card-option">
                      <li><i class="icofont icofont-simple-left "></i></li>
                      <li><i class="icofont icofont-maximize full-card"></i></li>
                      <li><i class="icofont icofont-minus minimize-card"></i></li>
                      <li><i class="icofont icofont-refresh reload-card"></i></li>
                      <li><i class="icofont icofont-error close-card"></i></li>
                  </ul>
              </div>
          </div>
          <div class="card-block table-border-style">
              <div class="table-responsive">
                  <table class="table">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Kode gejala</th>
                              <th>Nama gejala</th>
                              <th>Solusi</th>
                              <th>tgl buat</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $no = 1;
                            foreach ($gejala as $gj) : ?>
                              <tr>
                                  <th scope="row"><?= $no++; ?></th>
                                  <td><?= $gj['kode_gejala']; ?></td>
                                  <td><?= $gj['nama_gejala']; ?></td>
                                  <td><?= $gj['solusi']; ?></td>
                                  <td><?= date('d F Y', $gj['created_at']); ?></td>
                                  <td>
                                      <a href="" class="text-success" data-toggle="modal" data-target="#editGejala<?= $gj['id']; ?>"><i class="fas fa-edit"></i></a>
                                      <a href="<?= base_url('admin/gejala/hapusgejala/') . $gj['id']; ?>?>" class="text-danger" onclick="return confirm('yakin menghapus ?');"><i class="fas fa-trash-alt ml-2"></i></a>
                                  </td>
                              </tr>
                          <?php endforeach; ?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="addGejala" tabindex="-1" aria-labelledby="addGejalaLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="addGejalaLabel"><?= $judul; ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form method="post" action="">
                      <div class="form-group">
                          <label for="kode_gejala">Kode gejala</label>
                          <input type="text" class="form-control" id="kode_gejala" name="kode_gejala">
                      </div>
                      <div class="form-group">
                          <label for="nama_gejala">Nama gejala</label>
                          <input type="text" class="form-control" id="nama_gejala" name="nama_gejala">
                      </div>
                      <div class="form-group">
                          <label for="solusi">Solusi</label>
                          <input type="text" class="form-control" id="solusi" name="solusi">
                      </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <!-- end modal add -->

  <!-- modal edit menu list -->
  <?php
    $no = 1;
    foreach ($gejala as $gj) : $no++ ?>
      <div class="modal fade" id="editGejala<?= $gj['id']; ?>" tabindex="-1" aria-labelledby="editGejalaLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="editGejalaLabel"><?= $judul; ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form method="post" action=<?= base_url('admin/gejala/editgejala/') . $gj['id']; ?>">
                          <input type="hidden" name="id" value="<?= $gj['id']; ?>">
                          <div class="form-group">
                              <label for="kode_gejala">Kode gejala</label>
                              <input type="text" class="form-control" id="kode_gejala" name="kode_gejala" value="<?= $gj['kode_gejala']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="nama_gejala">Nama gejala</label>
                              <input type="text" class="form-control" id="nama_gejala" name="nama_gejala" value="<?= $gj['nama_gejala']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="solusi">Solusi</label>
                              <input type="text" class="form-control" id="solusi" name="solusi" value="<?= $gj['solusi']; ?>">
                          </div>


                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  <?php endforeach; ?>