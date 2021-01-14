  <!-- Page-body start -->
  <div class="page-body">
      <!-- Basic table card start -->
      <div class="card">
          <div class="card-header">
              <?= $this->session->flashdata('pesan'); ?>
              <!-- button modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMenuList">
                  <i class="fas fa-plus mr-3"> Add Menu List</i>
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
                              <th>Nama Menu</th>
                              <th>Url</th>
                              <th>icons</th>
                              <th>Action menu</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $no = 1;
                            foreach ($menulist as $ml) : ?>
                              <tr>
                                  <th scope="row"><?= $no++; ?></th>
                                  <td><?= $ml['nama_menu']; ?></td>
                                  <td><?= $ml['url']; ?></td>
                                  <td><?= $ml['icon']; ?></td>
                                  <td><?= $ml['menu']; ?></td>
                                  <td>
                                      <a href="" class="text-success" data-toggle="modal" data-target="#editMenuList<?= $ml['id']; ?>"><i class="fas fa-edit"></i></a>
                                      <a href="<?= base_url('admin/menu/hapusmenulist/') . $ml['id']; ?>?>" class="text-danger" onclick="return confirm('yakin menghapus ?');"><i class="fas fa-trash-alt ml-2"></i></a>
                                  </td>
                              </tr>
                          <?php endforeach; ?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>

  <?php
    $menu = $this->db->get('tb_menu')->result_array();
    ?>


  <!-- Modal -->
  <div class="modal fade" id="addMenuList" tabindex="-1" aria-labelledby="addMenuListLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="addMenuListLabel"><?= $judul; ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form method="post" action="">
                      <div class="form-group">
                          <label for="nama_menu">Nama menu</label>
                          <input type="text" class="form-control" id="nama_menu" name="nama_menu">
                      </div>
                      <div class="form-group">
                          <label for="url">Url</label>
                          <input type="text" class="form-control" id="url" name="url">
                      </div>
                      <div class="form-group">
                          <label for="icon">icon</label>
                          <input type="text" class="form-control" id="icon" name="icon">
                      </div>
                      <div class="form-group">
                          <label for="id_menu">Action Menu</label>
                          <select class="form-control" id="id_menu" name="id_menu">
                              <option>Please select</option>
                              <?php foreach ($menu as $m) : ?>
                                  <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
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
    foreach ($menulist as $ml) : $no++ ?>
      <div class="modal fade" id="editMenuList<?= $ml['id']; ?>" tabindex="-1" aria-labelledby="editMenuListLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="editMenuListLabel"><?= $judul; ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form method="post" action=<?= base_url('admin/menu/editmenulist/') . $ml['id']; ?>">
                          <input type="hidden" name="id" value="<?= $ml['id']; ?>">
                          <div class="form-group">
                              <label for="nama_menu">Nama menu</label>
                              <input type="text" class="form-control" id="nama_menu" name="nama_menu" value="<?= $ml['nama_menu']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="url">Url</label>
                              <input type="text" class="form-control" id="url" name="url" value="<?= $ml['url']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="icon">icon</label>
                              <input type="text" class="form-control" id="icon" name="icon" value="<?= $ml['icon']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="id_menu">Action Menu</label>
                              <select class="form-control" id="id_menu" name="id_menu">
                                  <?php foreach ($menu as $m) : ?>
                                      <?php if ($m['id'] == $ml['id_menu']) : ?>
                                          <option value="<?= $m['id']; ?>" selected><?= $m['menu']; ?></option>
                                      <?php else : ?>
                                          <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                      <?php endif; ?>
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
  <?php endforeach; ?>