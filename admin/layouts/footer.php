    <!-- BEGIN: JS ../assets-->
    <!-- <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script> -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script> -->
    <script src="../assets/dist/js/markerclusterer.js"></script>
    <script src="../assets/dist/jquery/jquery.min.js"></script>
    <script src="../assets/dist/js/app.js"></script>
    <script src="../assets/dist/js/sweetalert/sweetalert2.all.min.js"></script>
    <script src="../assets/dist/js/myscript.js"></script>
    
    
    <script src="../assets/dist/dataTables/jquery-3.7.0.js"></script>
    <script src="../assets/dist/dataTables/jquery.dataTables.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> -->

<script>
  new DataTable('#example');
</script>

    <!-- END: JS ../assets-->
<script>
   // Success notification 
   $("#success-notification-toggle").on("click", function () { Toastify({ node: $("#success-notification-content") .clone() .removeClass("hidden")[0], duration: -1, newWindow: true, close: true, gravity: "top", position: "right", stopOnFocus: true, }).showToast(); }); 
</script>
    </body>

    </html>