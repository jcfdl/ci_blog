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
              <div class="col-md-1">
                <a href="/administrator/content/add" class="btn btn-block btn-success">Add Content</a>
              </div>               
            </div>             
          </div>
          <div class="card-body p-0">
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
                    <td>Edit</td>
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