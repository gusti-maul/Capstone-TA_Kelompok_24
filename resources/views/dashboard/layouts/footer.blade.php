   <footer class="footer">
       <div class="container-fluid">
           <nav class="pull-left">
               <ul class="nav">
                   <li class="nav-item">
                       <a class="nav-link" href="#">
                           Help
                       </a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="#">
                           Licenses
                       </a>
                   </li>
               </ul>
           </nav>
           <div class="copyright ml-auto">
               2018, made with <i class="#"></i> by <a href="https://www.themekita.com">ThemeKita</a>
           </div>
       </div>
   </footer>
   </div>
   </div>
   <!--   Core JS Files   -->
   <script src="{{asset('assets/js/core/jquery.3.2.1.min.js')}}"></script>
   <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
   <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>

   <!-- jQuery UI -->
   <script src="{{asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
   <script src="{{asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

   <!-- jQuery Scrollbar -->
   <script src="{{asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


   <!-- Chart JS -->
   <script src="{{asset('assets/js/plugin/chart.js/chart.min.js')}}"></script>

   <!-- jQuery Sparkline -->
   <script src="{{asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

   <!-- Chart Circle -->
   <script src="{{asset('assets/js/plugin/chart-circle/circles.min.js')}}"></script>

   <!-- Datatables -->
   <script src="{{asset('assets/js/plugin/datatables/datatables.min.js')}}"></script>

   <!-- Bootstrap Notify -->
   <script src="{{asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

   <!-- jQuery Vector Maps -->
   <script src="{{asset('assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
   <script src="{{asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

   <!-- Sweet Alert -->
   <!-- <script src="{{asset('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script> -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




   <!-- Atlantis JS -->
   <script src="{{asset('assets/js/atlantis.min.js')}}"></script>
   <!-- type="text/javascriprt" -->
   <!-- <script>
       $(function() {
           $(document).on('click', '#delete',
               function(e) {
                   e.preventDefault();
                   var link = $(this).attr("href")
                   
                   Swal.fire({
                       title: 'Are you sure?',
                       text: "You won't be able to revert this!",
                       icon: 'warning',
                       showCancelButton: true,
                       confirmButtonColor: '#3085d6',
                       cancelButtonColor: '#d33',
                       confirmButtonText: 'Yes, delete it!'
                   }).then((result) => {
                       if (result.isConfirmed) {
                           Swal.fire(
                               'Deleted!',
                               'Your file has been deleted.',
                               'success'
                           )
                       }
                   })

               });
       }); -->
   </script>
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
   </script>
   

   <!-- widget di dashboard -->
   <script>
       var doughnutChart = document.getElementById('doughnutChart').getContext('2d');
       var myDoughnutChart = new Chart(doughnutChart, {
           type: 'doughnut',
           data: {
               datasets: [{
                   data: [10, 20, 30],
                   backgroundColor: ['#f3545d', '#fdaf4b', '#1d7af3']
               }],

               labels: [
                   'Red',
                   'Yellow',
                   'Blue'
               ]
           },
           options: {
               responsive: true,
               maintainAspectRatio: false,
               legend: {
                   position: 'bottom'
               },
               layout: {
                   padding: {
                       left: 20,
                       right: 20,
                       top: 20,
                       bottom: 20
                   }
               }
           }
       });
   </script>

   @yield('footer')
   </body>

   </html>