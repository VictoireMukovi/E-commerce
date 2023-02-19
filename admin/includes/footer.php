<footer class="footer pt-5">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-12">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">A propos</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">Service</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">Contact</a>
              </li> 
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">A propos de</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    </main>
    <script src="assets/js/jquery-3.6.3.min.js"></script>
    <script src="assets/js/material-dashboard.min.js"></script>
    <script src="assets/js/perfect-scrollbar.min.js"></script>
    <script src="assets/js/smooth-scrollbar.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/customer.js"></script>
  
    
    <!-- Sweet Alert-->
    <script src="assets/js/sweetalertcdn.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Alertify JavaScript -->
    <script src="assets/alertify.js"></script>
    
    <script src="assets/alertify.min.js"></script>

    <script>
            /*alertify.set('notifier','position', 'top-right');
            alertify.success("Bonjour le monde");*/
            <?php
                  session_start();
                  if (isset($_SESSION['message'])) {
                    ?>
                      alertify.set('notifier','position', 'top-right');
                      alertify.success(<?=$_SESSION['message']?>);
                    <?php
                    unset($_SESSION['message']);
                  }
          ?>
           
       
    </script>
</body>
