<!-- ------------------ -->
<!-- Style -->
<!-- ------------------ -->

  <!-- daterange picker -->
  <link rel="stylesheet" href="../../assets/plugins_daterange/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../assets/plugins_daterange/datepicker/datepicker3.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../assets/plugins_daterange/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../assets/plugins_daterange/select2/select2.min.css">
   
  <!-- Include Date Range Picker -->
  <script type="text/javascript" src="../../assets/plugins_daterange/daterangepicker/daterangepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="../../assets/plugins_daterange/daterangepicker/daterangepicker.css" />


<!-- ------------------ -->
<!-- Script -->
<!-- ------------------ -->

  <!-- Select2 -->
  <script src="../../assets/plugins_daterange/select2/select2.full.min.js"></script>
  <!-- InputMask -->
  <script src="../../assets/plugins_daterange/input-mask/jquery.inputmask.js"></script>
  <script src="../../assets/plugins_daterange/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="../../assets/plugins_daterange/input-mask/jquery.inputmask.extensions.js"></script>
  <!-- date-range-picker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="../../assets/plugins_daterange/daterangepicker/daterangepicker.js"></script>
  <!-- bootstrap datepicker -->
  <script src="../../assets/plugins_daterange/datepicker/bootstrap-datepicker.js"></script>
  <!-- bootstrap time picker -->
  <script src="../../assets/plugins_daterange/timepicker/bootstrap-timepicker.min.js"></script>


  <script>
$(function () {
   //Initialize Select2 Elements
   $(".select2").select2();

   //Datemask dd/mm/yyyy
   $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
   //Datemask2 mm/dd/yyyy
   $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
   //Money Euro
   $("[data-mask]").inputmask();

   //Date range picker
   $('#reservation').daterangepicker();
   //Date range picker with time picker
   $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
   //Date range as a button
   $('#daterange-btn').daterangepicker({
      ranges: {
         'Today': [moment(), moment()],
         'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
         'Last 7 Days': [moment().subtract(6, 'days'), moment()],
         'Last 30 Days': [moment().subtract(29, 'days'), moment()],
         'This Month': [moment().startOf('month'), moment().endOf('month')],
         'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
         startDate: moment().subtract(29, 'days'),
         endDate: moment()
      },

   function (start, end) {
      $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
   });


      //Date picker
      $('#datepicker').datepicker({
         autoclose: true
      });
      
      //iCheck for checkbox and radio inputs
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
         checkboxClass: 'icheckbox_minimal-blue',
         radioClass: 'iradio_minimal-blue'
      });
      
      //Red color scheme for iCheck
      $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
         checkboxClass: 'icheckbox_minimal-red',
         radioClass: 'iradio_minimal-red'
      });
      
      //Flat red color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
         checkboxClass: 'icheckbox_flat-green',
         radioClass: 'iradio_flat-green'
      });

      //Colorpicker
      $(".my-colorpicker1").colorpicker();
      //color picker with addon
      $(".my-colorpicker2").colorpicker();

      //Timepicker
      $(".timepicker").timepicker({
         showInputs: false
      });
});
</script>


