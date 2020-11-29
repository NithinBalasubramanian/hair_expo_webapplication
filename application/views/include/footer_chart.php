 <!-- Footer -->
 <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <?php echo date("Y"); ?>  Software Technologies</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <script>
  function disp_profile(){
    document.getElementById('profile').style.display='block';
  }
  function undisp_profile(){
    document.getElementById('profile').style.display='none';
  }
  </script>
  

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url();?>assets/js/sb-admin-2.js"></script>
  <script src="<?php echo base_url();?>assets/js/typeahead.min.js"></script>
  <!-- table search-->
  <script src="<?php echo base_url();?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url();?>assets/js/demo/datatables-demo.js"></script>


  <!-- Page level plugins -->
  <script src="<?php echo base_url();?>assets/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url();?>assets/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url();?>assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>
