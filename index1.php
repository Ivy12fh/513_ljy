<?php

// regulate input with an allow list to prevent SQL injection
$allowed = array("0", "1");
if (isset($_GET['completed']) && in_array($_GET['completed'], $allowed)) {
  $completed = $_GET['completed'];
}

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
if (isset($completed)) {
  $sql .= "WHERE completed = {$completed} ";
}
$sql .= "ORDER BY username";
$result = mysqli_query($db, $sql);

// Test if query succeeded (recommended)
if (!$result) {
  exit("Database query failed.");
}

// 3. Use returned data (if any)

?>

<!doctype html>
<html lang="en">

<head>
  <title>Task Manager: Task List</title>


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
  <div class="war">
  <header>
    <h1>Task Manager</h1>
  </header>

  <nav>
    <a href="new.php">+ New Task</a>
  </nav>

  <section>

    <h1>Task List</h1>
    <table>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Ivy</th>
        <th>Phone</th>
        <th>Address</th>
        <th>City</th>
        <th>Email</th>
        <th>Create_date</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php while ($task = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?php echo $task['id']; ?></td>
          <td><?php echo $task['username']; ?></td>
          <td><?php echo $task['password']; ?></td>
          <td><?php echo $task['Firstname'] ; ?></td>
          <td><?php echo $task['Lastname'] ; ?></td>
          <td><?php echo $task['Ivy615'] ; ?></td>
          <td><?php echo $task['phone'] ; ?></td>
          <td><?php echo $task['address'] ; ?></td>
          <td><?php echo $task['city']; ?></td>
          <td><?php echo $task['email']; ?></td>
          <td><a href="show.php?id=<?php echo $task['id']; ?>">View</a></td>
          <td><a href="edit.php?id=<?php echo $task['id']; ?>">Edit</a></td>
        </tr>
      <?php } ?>
    </table>

  </section>
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
        Designed by <a href="https://bootstrapmade.com/">21IT1 Ivy (Liu LiuJiayuan)</a>
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