 <!-- Pre-loader end -->
 <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
     <!-- Container-fluid starts -->
     <div class="container-fluid">
         <div class="row">
             <div class="col-sm-12">
                 <!-- Authentication card start -->
                 <div class="signup-card card-block auth-body mr-auto ml-auto">
                     <!-- <form class="md-float-material"> -->
                     <div class="text-center">
                         <img src="assets/images/auth/logo-dark.png" alt="logo.png">
                     </div>
                     <div class="auth-box">
                         <div class="row m-b-20">
                             <div class="col-md-12">
                                 <h3 class="text-center txt-primary">Sign up. It is fast and easy.</h3>
                             </div>
                         </div>
                         <hr />
                         <form method="post" action="<?= base_url('auth/register'); ?>">
                             <div class="form-group">
                                 <input type="text" class="form-control" placeholder="Choose Username" name="username" value="<?= set_value('username'); ?>">
                                 <?= form_error('username', '<small class="text-danger float-left mb-3 ">', '</small>'); ?>
                             </div>
                             <div class="form-group">
                                 <input type="text" class="form-control" placeholder="Your Email Address" name="email" value="<?= set_value('email'); ?>">
                                 <?= form_error('email', '<small class="text-danger float-left mb-3  ">', '</small>'); ?>
                             </div>
                             <div class="form-group">
                                 <input type="password" class="form-control" placeholder="Choose Password" name="password">
                                 <?= form_error('password', '<small class="text-danger float-left mb-3  ">', '</small>'); ?>
                             </div>
                             <div class="form-group">
                                 <input type="password" class="form-control" placeholder="Confirm Password" name="password1">

                             </div>
                             <div class="form-group">
                                 <select id="id_role" class="form-control" name="id_role">
                                     <option value="">Choose Role user</option>
                                     <?php foreach ($id_role as $role) : ?>
                                         <option value="<?= $role->id; ?>"><?= $role->role; ?></option>
                                     <?php endforeach; ?>
                                 </select>

                             </div>
                             <div class="row m-t-30">
                                 <div class="col-md-12">
                                     <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign up now.</button>
                                 </div>
                             </div>
                         </form>
                         <hr />
                         <div class="row">
                             <div class="col-md-10">
                                 <p class="text-inverse text-left m-b-0">Thank you and enjoy our website.</p>
                                 <p class="text-inverse text-left"><b>Your Authentication Team</b></p>
                             </div>
                             <div class="col-md-2">
                                 <img src="assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
                             </div>
                         </div>
                     </div>
                     <!-- </form> -->
                     <!-- end of form -->
                 </div>
                 <!-- Authentication card end -->
             </div>
             <!-- end of col-sm-12 -->
         </div>
         <!-- end of row -->
     </div>
     <!-- end of container-fluid -->
 </section>