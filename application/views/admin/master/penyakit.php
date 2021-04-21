  <!-- Page-body start -->
  <div class="page-body">
      <!-- Basic table card start -->
      <div class="card">
          <div class="card-header">
              <?= $this->session->flashdata('pesan'); ?>
              <!-- button modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPenyakit">
                  <i class="fas fa-plus mr-3"> Add Penyakit</i>
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
                              <th>Kode Penyakit</th>
                              <th>Nama Penyakit</th>
                              <th>tgl buat</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $no = 1;
                            foreach ($penyakit as $py) : ?>
                              <tr>
                                  <th scope="row"><?= $no++; ?></th>
                                  <td><?= $py['kode_penyakit']; ?></td>
                                  <td><?= $py['nama_penyakit']; ?></td>
                                  <td><?= date('d F Y', $py['created_at']); ?></td>
                                  <td>
                                      <a href="" class="text-success" data-toggle="modal" data-target="#editPenyakit<?= $py['id']; ?>"><i class="fas fa-edit"></i></a>
                                      <a href="<?= base_url('admin/penyakit/hapuspenyakit/') . $py['id']; ?>?>" class="text-danger" onclick="return confirm('yakin menghapus ?');"><i class="fas fa-trash-alt ml-2"></i></a>
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
  <div class="modal fade" id="addPenyakit" tabindex="-1" aria-labelledby="addPenyakitLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="addPenyakitLabel"><?= $judul; ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form method="post" action="">
                      <div class="form-group">
                          <label for="kode_penyakit">Kode penyakit</label>
                          <input type="text" class="form-control" id="kode_penyakit" name="kode_penyakit">
                      </div>
                      <div class="form-group">
                          <label for="nama_penyakit">Nama penyakit</label>
                          <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit">
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
    foreach ($penyakit as $py) : $no++ ?>
      <div class="modal fade" id="editPenyakit<?= $py['id']; ?>" tabindex="-1" aria-labelledby="editPenyakitLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="editPenyakitLabel"><?= $judul; ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form method="post" action=<?= base_url('admin/penyakit/editpenyakit/') . $py['id']; ?>">
                          <input type="hidden" name="id" value="<?= $py['id']; ?>">
                          <div class="form-group">
                              <label for="kode_penyakit">Kode penyakit</label>
                              <input type="text" class="form-control" id="kode_penyakit" name="kode_penyakit" value="<?= $py['kode_penyakit']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="nama_penyakit">Nama penyakit</label>
                              <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" value="<?= $py['nama_penyakit']; ?>">
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