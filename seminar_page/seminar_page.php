<?php

session_start();
require '../db_connect/db_connection.php'; 


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trade2z</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="session-styles.css">
  <link rel="stylesheet" href="commonStyle.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/aa7454d09f.js" crossorigin="anonymous"></script>
</head>

<body>

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <a href="../landing_page.php" class="logo">
        <img src="bitcoin.png" width="32" height="32" alt="Cryptex logo">
        Trade2z
      </a>

      <nav class="navbar" data-navbar>
        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="#" class="navbar-link" data-nav-link>Trading</a>
          </li>

          <li class="navbar-item">
            <a href="#" class="navbar-link" data-nav-link>Experts</a>
          </li>

          <li class="navbar-item">
            <a href="#" class="navbar-link" data-nav-link>Blog</a>
          </li>

          <li class="navbar-item">
            <a href="#" class="navbar-link" data-nav-link>Seminar</a>
          </li>
          <li class="navbar-item">
            <a href="#" class="navbar-link" data-nav-link>Rankings</a>
          </li>
        </ul>
      </nav>

      <button class="nav-toggle-btn" aria-label="Toggle menu" data-nav-toggler>
        <span class="line line-1"></span>
        <span class="line line-2"></span>
        <span class="line line-3"></span>
      </button>

      <a href="#" class="btn btn-outline" id="bt1">Wallet</a>
      <a href="#" class="btn btn-outline" id="bt2">Profile</a>
      <a href="#" class="btn btn-outline" id="bt2">Message</a>
      <a href="#" class="logo1">
        <img src="log-out.svg" width="32" height="32" alt="Cryptex logo">
      </a>
      

    </div>
  </header>
  
  <main>


  <!--Ranking-->


  <section class="section market" aria-label="market update" data-section>
    <div class="container">

      <div class="title-wrapper">
        
        <h2 class="h2 section-title">Session/Seminar</h2>

      </div>

      <div class="market-tab">

        <table class="market-table">

          <thead class="table-head">

            <tr class="table-row table-title">

              <th class="table-heading"></th>


              <th class="table-heading" scope="col">Session Title</th>

              <th class="table-heading" scope="col">Session Date & Time</th>



              <th class="table-heading">Session Hour</th>
              
              <th class="table-heading">Expert Name</th>
              
              <th class="table-heading">Session Link</th>

            </tr>

          </thead>

          <tbody class="table-body">


<?php
    $sql="SELECT seminar.title, seminar.date_time, seminar.s_link,userinfo.name,seminar.s_img
    FROM seminar
    INNER JOIN expert ON expert.user_id = seminar.host_id
    INNER JOIN userinfo ON userinfo.user_id = expert.user_id";
 

$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
  $title=$row['title'];
  $date_time=$row['date_time']; 
  $s_link=$row['s_link']; 
  $name=$row['name']; 
  $img=$row['s_img']; 
?>



            <tr class="table-row">

              <td class="table-data">
                <button class="add-to-fav" aria-label="Add to favourite" data-add-to-fav>
                  <ion-icon name="star-outline" aria-hidden="true" class="icon-outline"></ion-icon>
                  <ion-icon name="star" aria-hidden="true" class="icon-fill"></ion-icon>
                </button>
              </td>


              <td class="table-data">
                <img src="../admin/assets/seminar/<?php echo htmlspecialchars($img) ?>" width="120" height="150">
                <b><?php echo htmlspecialchars($title)?></b>
              </td>

              <td class="table-data last-price"><?php echo htmlspecialchars($date_time)?></td>


              <td class="table-data market-cap">2 Hr</td>

              <td class="table-data">
              <?php echo htmlspecialchars($name)?>
              </td> 
              <td class="table-data">
                <a href="<?php echo htmlspecialchars($s_link)?>">Join
                </a> 
                
              </td> 

            </tr>

<?php
}
?>            


          </tbody>

        </table>

      </div>

    </div>
  </section>

  <!-- Footer -->

  <footer class="footer">

    <div class="footer-top" data-section>
      <div class="container">

        <div class="footer-brand">

          <a href="#" class="logo">
            <img src="bitcoin.png" width="50" height="50" alt="Cryptex logo">
            Trade2z
          </a>

          <h2 class="footer-title">Let's talk!</h2>

          <a href="tel: +8801747700962 class="footer-contact-link">+880 174 770 0962</a>

          <a href="mailto:hello.cryptex@gmail.com" class="footer-contact-link">hello.Trade2z@gmail.com</a>

          <address class="footer-contact-link">
            United International University
          </address>

        </div>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Products</p>
          </li>

          <li>
            <a href="#" class="footer-link">Spot</a>
          </li>

          <li>
            <a href="#" class="footer-link">Inverse Perpetual</a>
          </li>

          <li>
            <a href="#" class="footer-link">USDT Perpetual</a>
          </li>

          <li>
            <a href="#" class="footer-link">Exchange</a>
          </li>

          <li>
            <a href="#" class="footer-link">Launchpad</a>
          </li>

          <li>
            <a href="#" class="footer-link">Binance Pay</a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Services</p>
          </li>

          <li>
            <a href="#" class="footer-link">Buy Crypto</a>
          </li>

          <li>
            <a href="#" class="footer-link">Markets</a>
          </li>

          <li>
            <a href="#" class="footer-link">Tranding Fee</a>
          </li>

          <li>
            <a href="#" class="footer-link">Affiliate Program</a>
          </li>

          <li>
            <a href="#" class="footer-link">Referral Program</a>
          </li>

          <li>
            <a href="#" class="footer-link">API</a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Support</p>
          </li>

          <li>
            <a href="#" class="footer-link">Bybit Learn</a>
          </li>

          <li>
            <a href="#" class="footer-link">Help Center</a>
          </li>

          <li>
            <a href="#" class="footer-link">User Feedback</a>
          </li>

          <li>
            <a href="#" class="footer-link">Submit a request</a>
          </li>

          <li>
            <a href="#" class="footer-link">API Documentation</a>
          </li>

          <li>
            <a href="#" class="footer-link">Trading Rules</a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">About Us</p>
          </li>

          <li>
            <a href="#" class="footer-link">About Bybit</a>
          </li>

          <li>
            <a href="#" class="footer-link">Authenticity Check</a>
          </li>

          <li>
            <a href="#" class="footer-link">Careers</a>
          </li>

          <li>
            <a href="#" class="footer-link">Business Contacts</a>
          </li>

          <li>
            <a href="#" class="footer-link">Blog</a>
          </li>

        </ul>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2024 Trade2z All Rights Reserved by <a href="#" class="copyright-link">Team TrioBot</a>
        </p>

        <ul class="social-list">

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>

        </ul>

      </div>
    </div>

  </footer>


  </main>

  <script src="session.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>