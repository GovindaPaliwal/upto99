<footer class="main-footer">
    <div class="pull-right hidden-xs">
    
    </div>
    <strong>Copyright &copy; 2019-2020 <a href="http://digitrixsolutions.com">Digitrix Solutions</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
 
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

<!-- Ajax -->
<script src="dist/ajax.js"></script>
<script src="bower_components/sweet/sweetalert.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->

<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>

<!-- Tinymce -->
<script type="text/javascript" src="bower_components/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="bower_components/tinymce/init-tinymce.js"></script>

<!-- DataTables -->
<!--<script src="bower_components/datatable/js/jquery.dataTables.min.js"></script>-->
<script src="bower_components/datatable/jquery.dataTables.min.js"></script>
<!--<script src="bower_components/datatable/js/dataTables.bootstrap.min.js"></script>-->

<!-- IconPicker -->
<script src="bower_components/iconpicker/js/fontawesome-iconpicker.js"></script>

<script>

$(".imgDel").click(function(){
  
  
  var form_data = $(this).attr('id');
  var image = $(this).attr('value');

  if(confirm("Are You Sure You Want To Delete This Image?")){
          $.ajax({
          url: "Function/Insert.php?form=slider",
          type: "POST",
          data: {'id':form_data,'img':image},
          success: function (msg) {
              var a = JSON.parse(msg);
              if(a == "1"){
                location.reload();
              }
              else{
                swal("Error","Error While Deleting Image","error");
              }
      }
  });
  }

});

$('.now').change(function() {

  if(this.value == "Enable"){
    $("#scheduleDate").removeAttr("required");
    $("#dateBox").hide(1000);
  }
  else if(this.value == "Disable"){
    $("#dateBox").slideToggle(1000);
  }

});

  $(function () {

    $("#image").on("change", function() {
    if ($("#image")[0].files.length > 3) {
        $("#image").val("");
        swal("Error","Only 3 Images Allow For Upload","error")
    }
});

    $('#csvBoxOpen').click(function() {

      $('#csvBox').slideToggle(1000);
      $('#csvBoxOpen').css('display','none');

    });

    $('#csvBoxClose').click(function() {

      $('#csvBox').slideToggle(1000);
      $('#csvBoxOpen').css('display','');

      });

    $('#couponsel').on('change', function() {

    var sel = $( "#couponsel option:selected" ).text();
    if(sel == "Coupon"){
      $('#coupon').show(1000);
      $('#ctext').attr("required", "required");
    }
    else{
      $('#coupon').css('display','none');
    }

    });

//Initialize Icon Picker
    $('.social-icon').iconpicker();

//Initialize Select2 Elements
$('.select2').select2()

    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })

    $('#example3').DataTable({
      dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
      });

  })

</script>

</body>
</html>
