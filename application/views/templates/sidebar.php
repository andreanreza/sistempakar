<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
            <div class="pcoded-inner-navbar main-menu">
                <div class="">
                    <div class="main-menu-header">
                        <img class="img-40 img-radius" src="<?= base_url('assets/img/') . $user['image']; ?>" alt="User-Profile-Image">
                        <div class="user-details">
                            <span><?= $user['username']; ?></span>
                            <span id="more-details"><?= $user['role']; ?><i class="ti-angle-down"></i></span>
                        </div>
                    </div>

                    <div class="main-menu-content">
                        <ul>
                            <li class="more-details">
                                <a href="<?= base_url('profile'); ?>"><i class="ti-user"></i>View Profile</a>
                                <a href="#!"><i class="ti-settings"></i>Settings</a>
                                <a href="<?= base_url('auth/logout'); ?>"><i class="ti-layout-sidebar-left"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="pcoded-search">
                    <span class="searchbar-toggle"> </span>
                    <div class="pcoded-search-box ">
                        <input type="text" placeholder="Search">
                        <span class="search-icon"><i class="ti-search" aria-hidden="true"></i></span>
                    </div>
                </div>

                <!-- menu dinamis -->
                <?php
                $role = $this->session->userdata('id_role');
                $qureymenu = "SELECT `tb_menu`.`id`, `menu`
                                FROM `tb_menu` JOIN `tb_access_menu`
                                  ON `tb_menu`.`id` = `tb_access_menu`.`id_menu`
                               WHERE `tb_access_menu`.`id_role` = $role
                            ORDER BY `tb_access_menu`.`id_menu` ASC
                             ";

                $menu = $this->db->query($qureymenu)->result_array();
                ?>

                <?php foreach ($menu as $m) : ?>
                    <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation"><?= $m['menu']; ?></div>

                    <!-- query menu list -->
                    <?php
                    $menu_id = $m['id'];
                    $id_menu = $m['id'];
                    $this->db->select('tb_menu.*, tb_menu_list.*');
                    $this->db->from('tb_menu_list');
                    $this->db->join('tb_menu', 'tb_menu.id = tb_menu_list.id_menu');
                    $this->db->where('tb_menu_list.id_menu', $id_menu);
                    $menulist = $this->db->get()->result_array();
                    ?>

                    <!-- looping menu list and cek apakah menu list mempunyai submenu -->
                    <ul class="pcoded-item pcoded-left-item">
                        <?php foreach ($menulist as $ml) : ?>
                            <?php if ($ml['url'] != '#') : ?>
                                <?php if ($judul == $ml['nama_menu']) : ?>
                                    <li class="active">
                                    <?php else : ?>
                                    <li class=" ">
                                    <?php endif; ?>
                                    <a href="<?= base_url($ml['url']); ?>">
                                        <span class="pcoded-micon"><i class="<?= $ml['icon']; ?>"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main"><?= $ml['nama_menu']; ?></span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    </li>
                                <?php else : ?>
                                    <li class="pcoded-hasmenu">
                                        <a href="<?= $ml['url']; ?>">
                                            <span class="pcoded-micon"><i class="<?= $ml['icon']; ?>"></i></span>
                                            <span class="pcoded-mtext" data-i18n="nav.basic-components.main"><?= $ml['nama_menu']; ?></span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <!-- query submenu dari menu list -->
                                            <?php
                                            $id_menu_list = $ml['id'];
                                            $this->db->select('tb_menu_list.*, tb_submenu.*');
                                            $this->db->from('tb_submenu');
                                            $this->db->join('tb_menu_list', 'tb_menu_list.id = tb_submenu.id_menu_list');
                                            $this->db->where('tb_submenu.id_menu_list', $id_menu_list);
                                            $this->db->order_by('tb_submenu.order_by', 'asc');
                                            $submenu = $this->db->get()->result_array();
                                            ?>
                                            <!-- lopping submenu -->
                                            <?php foreach ($submenu as $sm) : ?>
                                                <?php if ($judul == $sm['submenu']) : ?>
                                                    <li class="active">
                                                    <?php else : ?>
                                                    <li class=" ">
                                                    <?php endif; ?>
                                                    <a href="<?= base_url($sm['url_sub']); ?>">
                                                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                        <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><?= $sm['submenu']; ?></span>
                                                        <span class="pcoded-mcaret"></span>
                                                    </a>
                                                    </li>
                                                <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                    </ul>
            </div>
        </nav>


        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">