   <footer class="footer">
       <div class="container-fluid">
           <nav class="pull-left">
               <ul class="nav">
                   <li class="nav-item">
                           Created by <a> Tim 24 Capstone Teknik Komputer Universitas Diponegoro</a>

                   </li>
               </ul>
           </nav>
           <div class="copyright ml-auto">
               &copy; Copyright <strong><span>SMAN1SOKARAJA</span></strong>. All Rights Reserved
           </div>
       </div>
   </footer>
   </div>
   </div>
   <!--   Core JS Files   -->
   <script src="{{asset('assetss/js/core/jquery.3.2.1.min.js')}}"></script>
   <script src="{{asset('assetss/js/core/popper.min.js')}}"></script>
   <script src="{{asset('assetss/js/core/bootstrap.min.js')}}"></script>

   <!-- jQuery UI -->
   <script src="{{asset('assetss/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
   <script src="{{asset('assetss/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

   <!-- jQuery Scrollbar -->
   <script src="{{asset('assetss/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


   <!-- Chart JS -->
   <script src="{{asset('assetss/js/plugin/chart.js/chart.min.js')}}"></script>

   <!-- jQuery Sparkline -->
   <script src="{{asset('assetss/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

   <!-- Chart Circle -->
   <script src="{{asset('assetss/js/plugin/chart-circle/circles.min.js')}}"></script>

   <!-- Datatables -->
   <script src="{{asset('assetss/js/plugin/datatables/datatables.min.js')}}"></script>

   <!-- Bootstrap Notify -->
   <script src="{{asset('assetss/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

   <!-- jQuery Vector Maps -->
   <script src="{{asset('assetss/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
   <script src="{{asset('assetss/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

   <!-- Sweet Alert -->
   <!-- <script src="{{asset('assetss/js/plugin/sweetalert/sweetalert.min.js')}}"></script> -->
   <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

   <!-- toas -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

   <!-- Atlantis JS -->
   <script src="{{asset('assetss/js/atlantis.min.js')}}"></script>

   <!-- data table -->
   <script>
       $(document).ready(function() {
           $('#basic-datatables').DataTable({});

           $('#multi-filter-select').DataTable({
               "pageLength": 5,
               initComplete: function() {
                   this.api().columns().every(function() {
                       var column = this;
                       var select = $('<select class="form-control"><option value=""></option></select>')
                           .appendTo($(column.footer()).empty())
                           .on('change', function() {
                               var val = $.fn.dataTable.util.escapeRegex(
                                   $(this).val()
                               );

                               column
                                   .search(val ? '^' + val + '$' : '', true, false)
                                   .draw();
                           });

                       column.data().unique().sort().each(function(d, j) {
                           select.append('<option value="' + d + '">' + d + '</option>')
                       });
                   });
               }
           });

           // Add Row
           $('#add-row').DataTable({
               "pageLength": 5,
           });

           var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

           $('#addRowButton').click(function() {
               $('#add-row').dataTable().fnAddData([
                   $("#addName").val(),
                   $("#addPosition").val(),
                   $("#addOffice").val(),
                   action
               ]);
               $('#addRowModal').modal('hide');

           });
       });
       $.fn.dataTable.ext.errMode = 'none';
   </script>


   <!-- widget di dashboard -->


   <script>
       @if(Session::has('success'))
       toastr.success("{{ Session::get('success') }}", 'Success')
       @endif

       @if(Session::has('error'))
       toastr.error("{{ Session::get('error') }}", 'Error')
       @endif
   </script>

   <!-- active menu -->
   <script src="{{asset('assets/js/misc.js')}}"></script>


   @yield('footer')
   </body>

   </html>