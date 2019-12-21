<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/administrator">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default color-palette-box">
          <div class="card-header">
            <div class="row mb-2">
              <a href="/administrator/content/add" class="btn btn-success">Add User</a>              
            </div>      
            <div class="row">  
              <div class="input-group w-25 mr-1">
                <input id="search" class="form-control" type="search" placeholder="Search" aria-label="Search" onkeyup="searchFilter()">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="fas fa-search"></i>
                  </div>
                </div>
              </div>
              <select id="status" class="w-25 custom-select" onchange="searchFilter()">
                <option value="">Select Status</option>
                <option value="1">Active</option>
                <option value="2">Inactive</option>
              </select>
            </div>     
          </div>
          <div class="card-body p-0">
            <?php if($this->session->flashdata('error_msg')): ?>
              <div class="alert alert-danger alert-dismissible m-2">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                <?= $this->session->flashdata('error_msg') ?>
              </div>
            <?php elseif($this->session->flashdata('success_msg')): ?>
               <div class="alert alert-success alert-dismissible m-2">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                <?= $this->session->flashdata('success_msg') ?>
              </div> 
            <?php endif; ?>
            <div id="datalist">
              <table class="table table-center">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Created</th>
                    <th>Status</th>
                    <th><i class="fas fa-cog"></i></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($users AS $user): ?>
                    <tr>
                      <td><?= $user->first_name . ' ' . $user->last_name; ?></td>
                      <td><?= ucfirst($user->role_name) ?></td>
                      <td><?= $user->email ?></td>
                      <td><?= $user->modified ?></td>
                      <td>Live</td>
                      <td>
                        <a href="/administrator/users/edit/<?= $user->id; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="/administrator/users/delete/<?= $user->id; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <?php if($links): ?>
                <div class="card-footer">
                  <div class="card-tools">
                    <?php echo $links; ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>          
          <!-- /.card-body -->
        </div>          
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->