  <!-- Page-body start -->
  <div class="page-body">
      <!-- Basic table card start -->
      <div class="card">
          <div class="card-header">
              <?= $this->session->flashdata('pesan'); ?>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSubMenu">
                  <i class="fas fa-plus mr-3"> Add Sub Menu</i>
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
                              <th>Sub Menu</th>
                              <th>Url</th>
                              <th>Action menu list</th>
                              <th>Urutan</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                            $no = 1;
                            foreach ($submenu as $sm) : ?>
                              <tr>
                                  <th scope="row"><?= $no++; ?></th>
                                  <td><?= $sm['submenu']; ?></td>
                                  <td><?= $sm['url_sub']; ?></td>
                                  <td><?= $sm['nama_menu']; ?></td>
                                  <td><?= $sm['order_by']; ?></td>
                                  <td>
                                      <a href="" class="text-success" data-toggle="modal" data-target="#editSubMenu<?= $sm['id']; ?>"><i class="fas fa-edit"></i></a>
                                      <a href="<?= base_url('admin/menu/hapussubmenu/') . $sm['id']; ?>" class="text-danger" onclick="return confirm('yakin menghapus ?');"><i class="fas fa-trash-alt ml-2"></i></a>
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
    $menu_list = $this->db->get_where('tb_menu_list', ['url' => '#'])->result_array();
    $order_by = ['1', '2', '3', '4', '5', '6'];
    ?>


  <!-- Modal -->
  <div class="modal fade" id="addSubMenu" tabindex="-1" aria-labelledby="addSubMenuLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="addSubMenuLabel">Add Submenu</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form method="post" action="">
                      <div class="form-group">
                          <label for="submenu">Nama submenu</label>
                          <input type="text" class="form-control" id="submenu" name="submenu">
                      </div>
                      <div class="form-group">
                          <label for="url_sub">Url</label>
                          <input type="text" class="form-control" id="url_sub" name="url_sub">
                      </div>
                      <div class="form-group">
                          <label for="id_menu_list">Action Menu List</label>
                          <select class="form-control" id="id_menu_list" name="id_menu_list">
                              <option>Please select</option>
                              <?php foreach ($menu_list as $ml) : ?>
                                  <option value="<?= $ml['id']; ?>"><?= $ml['nama_menu']; ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="order_by">Urutan menu</label>
                          <select class="form-control" id="order_by" name="order_by">
                              <option>Please select</option>
                              <?php foreach ($order_by as $ob) : ?>
                                  <option value="<?= $ob; ?>"><?= $ob; ?></option>
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

  <!-- sub menu edit -->
  <?php
    $no = 1;
    foreach ($submenu as $sm) : $no++; ?>

      <div class="modal fade" id="editSubMenu<?= $sm['id']; ?>" tabindex="-1" aria-labelledby="editSubMenuLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="editSubMenuLabel">Update Submenu</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form method="post" action="<?= base_url('admin/menu/editsubmenu/') . $sm['id']; ?>">
                          <input type="hidden" name="id" value="<?= $sm['id']; ?>">
                          <div class="form-group">
                              <label for="submenu">Nama submenu</label>
                              <input type="text" class="form-control" id="submenu" name="submenu" value="<?= $sm['submenu']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="url_sub">Url</label>
                              <input type="text" class="form-control" id="url_sub" name="url_sub" value="<?= $sm['url_sub']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="id_menu_list">Action Menu List</label>
                              <select class="form-control" id="id_menu_list" name="id_menu_list">
                                  <?php foreach ($menu_list as $ml) : ?>
                                      <?php if ($ml['id'] == $sm['id_menu_list']) : ?>
                                          <option value="<?= $ml['id']; ?>" selected><?= $ml['nama_menu']; ?></option>
                                      <?php else : ?>
                                          <option value="<?= $ml['id']; ?>"><?= $ml['nama_menu']; ?></option>
                                      <?php endif; ?>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="order_by">Urutan menu</label>
                              <select class="form-control" id="order_by" name="order_by">
                                  <?php foreach ($order_by as $ob) : ?>
                                      <?php if ($ob == $sm['order_by']) : ?>
                                          <option value="<?= $ob; ?>" selected><?= $ob; ?></option>
                                      <?php else : ?>
                                          <option value="<?= $ob; ?>"><?= $ob; ?></option>
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