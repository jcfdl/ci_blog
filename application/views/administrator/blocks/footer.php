  <footer class="main-footer">
    <strong>Copyright &copy; 2019.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/plugins/chart.js/Chart.min.js'); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/plugins/sparklines/sparkline.js'); ?>"></script>
<!-- JQVMap -->
<script src="<?php echo base_url('assets/plugins/jqvmap/jquery.vmap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jqvmap/maps/jquery.vmap.usa.js'); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/plugins/jquery-knob/jquery.knob.min.js'); ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/plugins/moment/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/plugins/summernote/summernote-bs4.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/administrator/js/adminlte.js'); ?>"></script>
<!-- TOASTER -->
<script src="<?php echo base_url('assets/plugins/toastr/toastr.min.js'); ?>"></script>
<script>  
  $('.content_add').summernote({
    height: 600, focus: true,
    callbacks: {
      onImageUpload: function(files, editor, welEditable) {
        sendFile(files[0], this);
      }
    }    
  });
  $('#addContent').submit(function(e) {
    var textarea = $('.content_add');
    textarea.val($('.content_add').summernote('code'));
  });
  function sendFile(file, el) {
    data = new FormData();
    data.append("userfile", file);
    $.ajax({
      data: data,
      type: "POST",
      url: '/files/addImageSummernote',
      cache: false,
      contentType: false,
      processData: false,
      dataType: 'JSON',
      success: function(data) {    
        if(data.success) {
          $(el).summernote('editor.insertImage', data.file);
          toastr.success(data.msg);
        } else {
          toastr.error(data.msg);
        }
      }
    });
  }
  // ajax search
  function searchFilter(page_num){
    page_num = page_num?page_num:0;
    var search = $('#search').val();
    var status = $('#status').val();
    $.ajax({
        type: 'POST',
        url: '/administrator/users/search/'+page_num,
        data:'page='+page_num+'&search='+search+'&status='+status,
        // beforeSend: function(){
        //     $('.loading').show();
        // },
        success: function(html){
            $('#datalist').html(html);
            $('.loading').fadeOut("slow");
        }
    });
  }
</script>
</body>
</html>