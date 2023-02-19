
<!DOCTYPE html>
<html>
  <head>
       
  </head>
<body>
         <!-- Optional JavaScript; choose one of the two! -->
      <link rel="stylesheet" href="assets/css/custom.css"/>
      <script src="assets/js/jquery-3.6.0.min.js"></script>
      <script src="assets/js/jquery-3.6.3.min.js"></script>
      <script src="assets/js/bootstrap.bundle.min.js"></script>

      <script src="assets/js/sweetalertcdn.min.js"></script>
     
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
      <!-- Bootstrap theme -->
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
      <script src="assets/alertify.js"></script>
    <!-- Alertify JavaScript -->
    <script src="assets/alertify.min.js"></script>
      
      <script src="assets/js/customer.js"></script>

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
</html>


