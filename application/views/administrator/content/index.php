<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Content</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/administrator">Home</a></li>
              <li class="breadcrumb-item active">Content</li>
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
            <div class="row">
              <a href="/administrator/content/add" class="btn btn-success">Add Content</a>              
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
            <table class="table table-center">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Created</th>
                  <th>Modified</th>
                  <th><i class="fas fa-cog"></i></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($contents AS $content): ?>
                  <tr>
                    <td>
                      <?php if($content->status == 1): ?>
                        yes
                      <?php elseif($content->status == 2): ?>
                        yesyyes
                      <?php else: ?>
                        123
                      <?php endif; ?>
                      <?= $content->title ?>                        
                    </td>
                    <td><?= $content->created ?></td>
                    <td><?= $content->modified ?></td>
                    <td>
                      <a href="/administrator/content/edit/<?= $content->id; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                      <a href="/administrator/content/delete/<?= $content->id; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>

                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <?php if($links): ?>
            <div class="card-footer">
              <div class="card-tools">
                <?php echo $links; ?>
              </div>
            </div>
          <?php endif; ?>
          <!-- /.card-body -->
        </div>          
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->