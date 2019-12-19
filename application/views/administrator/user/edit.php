<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/administrator">Home</a></li>
              <li class="breadcrumb-item"><a href="/administrator/users">Users</a></li>
              <li class="breadcrumb-item active">Edit</li>               
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-default color-palette-box">
              <img class="profile-user-img img-responsive img-circle mt-2" src="<?php echo base_url('assets/img/avatar.png'); ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?= $user["first_name"] . ' ' . $user["last_name"] ?></h3>

              <p class="text-muted text-center"><?= ucfirst($user["role_name"]) ?></p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Content Created:</b> <a class="pull-right"><?= $content_count ?></a>
                </li>                
              </ul>      
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">         
            <div class="card card-default color-palette-box p-2">
              <?php if($this->session->flashdata('success_msg')): ?>
                 <div class="alert alert-success alert-dismissible m-2">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Alert!</h4>
                  <?= $this->session->flashdata('success_msg') ?>
                </div> 
              <?php endif; ?>
              <form action="" method="post" class="form-horizontal">
                <?= form_error('first_name') ?>

                <div class="form-group">
                  <label class="col-sm-2 control-label">First Name:</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="first_name" placeholder="First Name" value="<?= $user['first_name'] ?>" required>
                  </div>
                </div>
                <?= form_error('last_name') ?>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Last Name:</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?= $user['last_name'] ?>" required>
                  </div>
                </div>
                <div class="form-group">

                  <label class="col-sm-2 control-label">Email:</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control" placeholder="Email" value="<?= $user['email'] ?>" disabled>
                  </div>
                </div>
                  <?= form_error('role_id') ?>

                <div class="form-group">

                  <label class="col-sm-2 control-label">Role:</label>

                  <div class="col-sm-10">
                    <select name="role_id" class="form-control" required>
                      <option value="">Select Role</option>
                      <?php foreach($roles AS $role): ?>
                        <option value="<?= $role->id ?>" <?= $role->id == $user['role_id'] ? 'selected' : '' ?>>
                          <?= ucfirst($role->name) ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                  <?= form_error('status') ?>
                
                 <div class="form-group">

                  <label class="col-sm-2 control-label">Status:</label>

                  <div class="col-sm-10">
                    <select name="status" class="form-control" required>
                      <option value="">Select Status</option>
                      <?php foreach($user_status AS $key => $value): ?>
                        <option value="<?= $key ?>" <?= $key == $user['status'] ? 'selected' : '' ?>>
                          <?= $value ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <a href="/administrator/users/change-password/<?= $user['id'] ?>" class="btn btn-success">Change default password</a>
                    <button name="update_user" type="submit" class="btn btn-primary">Update User</button>
                    <a href="/administrator/users" class="btn btn-danger">Cancel</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.row -->
    </section>
 </div>
<!-- /.content-wrapper -->