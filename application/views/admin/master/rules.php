  <!-- Page-body start -->
  <div class="page-body">
      <!-- Basic table card start -->
      <div class="card">
          <div class="card-header">
              <?= $this->session->flashdata('pesan'); ?>
              <!-- button modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addRules">
                  <i class="fas fa-plus mr-3"> Add Rules</i>
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
                              <th>Nama Penyakit</th>
                              <th>Nama Gejala</th>
                              <th>Solusi</th>
                              <!-- <th>tgl buat</th> -->
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $no = 1;
                            foreach ($rules as $r) : ?>
                              <tr>
                                  <th scope="row"><?= $no++; ?></th>
                                  <td><?= $r['nama_penyakit']; ?></td>
                                  <td><?= $r['nama_gejala']; ?></td>
                                  <td><?= $r['solusi']; ?></td>
                                  <td>
                                      <a href="" class="text-success" data-toggle="modal" data-target="#editRules<?= $r['id']; ?>"><i class="fas fa-edit"></i></a>
                                      <a href="<?= base_url('admin/rules/hapusrules/') . $r['id']; ?>?>" class="text-danger" onclick="return confirm('yakin menghapus ?');"><i class="fas fa-trash-alt ml-2"></i></a>
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
  <div class="modal fade" id="addRules" tabindex="-1" aria-labelledby="addRulesLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="addRulesLabel"><?= $judul; ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form method="post" action="">
                      <div class="form-group">
                          <label for="id_penyakit">Nama Penyakit</label>
                          <select class="form-control" id="id_penyakit" name="id_penyakit">
                              <option>Please select</option>
                              <?php foreach ($penyakit as $p) : ?>
                                  <option value="<?= $p->id; ?>"><?= $p->nama_penyakit; ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="id_gejala">Nama gejala</label>
                          <select class="form-control" id="id_gejala" name="id_gejala">
                              <option>Please select</option>
                              <?php foreach ($gejala as $g) : ?>
                                  <option value="<?= $g->id; ?>"><?= $g->nama_gejala; ?></option>
                              <?php endforeach; ?>
                          </select>
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
    foreach ($rules as $r) : $no++ ?>
      <div class="modal fade" id="editRules<?= $r['id']; ?>" tabindex="-1" aria-labelledby="editRulesLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="editRulesLabel"><?= $judul; ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form method="post" action=<?= base_url('admin/rules/editrules/') . $r['id']; ?>">
                          <input type="hidden" name="id" value="<?= $r['id']; ?>">
                          <div class="form-group">
                              <label for="id_penyakit">Nama penyakit</label>
                              <select class="form-control" id="id_penyakit" name="id_penyakit">
                                  <?php foreach ($penyakit as $p) : ?>
                                      <?php if ($p->id == $r->id_penyakit) : ?>
                                          <option value="<?= $p->id; ?>" selected><?= $p->nama_penyakit; ?></option>
                                      <?php else : ?>
                                          <option value="<?= $p->id; ?>"><?= $p->nama_penyakit; ?></option>
                                      <?php endif; ?>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="id_gejala">Nama gejala</label>
                              <select class="form-control" id="id_gejala" name="id_gejala">
                                  <?php foreach ($gejala as $g) : ?>
                                      <?php if ($g->id == $g->id_gejala) : ?>
                                          <option value="<?= $g->id; ?>" selected><?= $g->nama_gejala; ?></option>
                                      <?php else : ?>
                                          <option value="<?= $g->id; ?>"><?= $g->nama_gejala; ?></option>
                                      <?php endif; ?>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <!-- <div class="form-group">
                              <label for="nama_penyakit">Nama penyakit</label>
                              <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" value="<?= $py['nama_penyakit']; ?>">
                          </div> -->
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