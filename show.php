<?php

// typecast the value as an integer to prevent SQL injection
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// 1. Create a database connection
$db = mysqli_connect("127.0.0.1", "root", "", "ivy", 3306);

// Test if connection succeeded (recommended)
if (mysqli_connect_errno()) {
  $msg = "Database connection failed: ";
  $msg .= mysqli_connect_error();
  $msg .= " (" . mysqli_connect_errno() . ")";
  exit($msg);
}

// 2. Perform database query
$sql = "SELECT * FROM customers ";
$sql .= "WHERE id = {$id} ";
$sql .= "LIMIT 1";
$result = mysqli_query($db, $sql);

// Test if query succeeded (recommended)
if (!$result) {
  exit("Database query failed.");
}

// 3. Use returned data (if any)
$task = mysqli_fetch_assoc($result);

if (is_null($task)) {
  exit("No task found.");
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Task Manager: Show Task</title>

  <link href="style1.css" type="text/css" rel="stylesheet" />
<link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="style2.css" rel="stylesheet">
</head>

<body>
<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+1 5589 55488 55</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sun: 7AM - 4PM</span></i>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.html">Luca's Loaves</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="#chefs">Careers</a></li>
        
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="login.php" class="book-a-table-btn scrollto d-none d-lg-flex">login</a>


    </div>
  </header><!-- End Header -->
  <div class="war1">
  <header>
    <h1>Task Manager</h1>
  </header>

  <nav>
    <a href="index1.php">Task List</a>
  </nav>

  <section>

    <h1>Show Task</h1>

    <dl>
      <dt>ID</dt>
      <dd><?php echo $task['id']; ?></dd>
    </dl>
    <dl>
      <dt>Username</dt>
      <dd><?php echo $task['username']; ?></dd>
    </dl>
    <dl>
      <dt>Password</dt>
      <dd><?php echo $task['password']; ?></dd>
    </dl>
    <dl>
      <dt>Firstname</dt>
      <dd><?php echo $task['Firstname']; ?></dd>
    </dl>
    <dl>
      <dt>Lastname</dt>
      <dd><?php echo $task['Lastname']; ?></dd>
    </dl>
    <dl>
      <dt>Phone</dt>
      <dd><?php echo $task['phone']; ?></dd>
    </dl>
    <dl>
      <dt>Address</dt>
      <dd><?php echo $task['address']; ?></dd>
    </dl>
    <dl>
      <dt>city</dt>
      <dd><?php echo $task['city']; ?></dd>
    </dl><dl>
      <dt>Email</dt>
      <dd><?php echo $task['email']; ?></dd>
    </dl><dl>
      <dt>Create_date</dt>
      <dd><?php echo $task['create_date']; ?></dd>
    </dl>
  </section>

  <hr />

  <form action="delete.php?id=<?php echo $task['id']; ?>" method="post" onsubmit="return confirm('Delete this task?');">
    <input type="submit" value="Delete Task" />
  </form>

  </div>
  <div>
<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Ivy</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
        Designed by <a href="https://bootstrapmade.com/">21IT1 Ivy (LiuJiayuan)</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</div> 
</body>

</html>

<?php
// 4. Release returned data
mysqli_free_result($result);

// 5. Close database connection
mysqli_close($db);
?>