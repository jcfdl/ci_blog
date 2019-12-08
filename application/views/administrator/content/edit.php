<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Content</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/administrator">Home</a></li>
              <li class="breadcrumb-item"><a href="/administrator/content">Content</a></li>
              <li class="breadcrumb-item active">Add</li>               
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
          <form action="/administrator/content/add" method="post" enctype="multipart/form-data">
            <div class="card-header">
              <div class="row">
                <div class="col-md-1">
                  <button type="save" class="btn btn-block btn-primary"><i class="fas fa-save"></i> Save</button>
                </div>
                <div class="col-md-1">
                  <a href="/administrator/content" class="btn btn-block btn-danger"><i class="fas fa-times"></i> Close</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-8">
                  <label>Title:</label>
                  <?php echo form_error('title'); ?>
                  <input type="text" name="title" class="form-control mb-3" value="<?php echo $content->title; ?>" placeholder="Enter title" required>
                  <textarea name="body" class="content_add"><?php echo $content->body; ?></textarea>
                </div>
                <div class="col-md-4">
                  <label>Status:</label>
                  <?php echo form_error('status'); ?>                  
                  <select class="form-control mb-3" name="status" required>
                    <option value="">Select Status</option>
                    <?php foreach($status AS $key => $value) { ?>
                      <option value="<?php echo $key; ?>" <?php echo $content->status == $key ? 'selected' : ''; ?>>
                        <?php echo $value; ?>                          
                      </option>
                    <?php } ?>
                  </select>
                  <label>Intro Image:</label>                  
                  <input type="file" name="intro_img" class="form-control mb-3">
                  <label>Full Article Image:</label>
                  <input type="file" name="full_img" class="form-control mb-3">
                  <label>Meta Keywords:</label>
                  <textarea class="form-control mb-3" rows="3" placeholder="Enter meta title here" name="meta_kw"></textarea>
                  <label>Meta Description:</label>
                  <textarea class="form-control mb-3" rows="3" placeholder="Enter meta description here" name="meta_desc"></textarea>
                </div>
              </div>
            </div>
          </form>
          <!-- /.card-body -->
        </div>          
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
