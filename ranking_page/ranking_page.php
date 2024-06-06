 <?php

session_start();
require '../db_connect/db_connection.php'; 






$id= $_SESSION["user_id"];
    $query = "SELECT * FROM userinfo WHERE user_id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $country = $row['country'];
    $region = $row['region'];
    mysqli_free_result($result); 

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
  <link rel="stylesheet" href="ranking_styles.css">
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
            <a href="../trading_page/trading_page.php" class="navbar-link" data-nav-link>Trading</a>
          </li>

          <li class="navbar-item">
            <a href="../expert_page/expert_page.php" class="navbar-link" data-nav-link>Experts</a>
          </li>

          <li class="navbar-item">
            <a href="../blog_page/blog_page.php" class="navbar-link" data-nav-link>Blog</a>
          </li>

          <li class="navbar-item">
            <a href="#" class="navbar-link" data-nav-link>Seminar</a>
          </li>
          <li class="navbar-item">
            <a href="../ranking_page/ranking_page.php" class="navbar-link" data-nav-link>Rankings</a>
          </li>
        </ul>
      </nav>

      <button class="nav-toggle-btn" aria-label="Toggle menu" data-nav-toggler>
        <span class="line line-1"></span>
        <span class="line line-2"></span>
        <span class="line line-3"></span>
      </button>

      <a href="#" class="btn btn-outline" id="bt1">Wallet</a>
      <a href="../chat/index.php" class="btn btn-outline" id="bt2">Message</a>
      <a href="../logout.php" class="logo1">
        <img src="log-out.svg" width="32" height="32" alt="Cryptex logo">
      </a>
      

    </div>
  </header>
  
  <main>

  

  <!--Ranking-->


  <section class="section market" aria-label="market update" data-section>
    <form method="post">
    <div class="container">

      <div class="title-wrapper">
        
        <h2 class="h2 section-title">Ranking Update</h2>
        <div class="button-group">
          <button class="Tbutton btn-outline" name="Overall" onclick="setActiveButton(this)">Overall</button>
          <button class="Tbutton btn-outline" name="regional" onclick="setActiveButton(this)">Regional</button>
          <button class="Tbutton btn-outline" name="country" onclick="setActiveButton(this)">Country</button>
        </div>
      </div>
    </form>  

      <div class="market-tab">

        <table class="market-table">

          <thead class="table-head">

            <tr class="table-row table-title">

              <th class="table-heading"></th>

              <th class="table-heading" scope="col">#</th>

              <th class="table-heading" scope="col">Name</th>

              <th class="table-heading" scope="col">Region</th>
              
              <th class="table-heading">Country</th>

              <th class="table-heading" scope="col">Last 7 days Profit</th>

              <th class="table-heading">Chart</th>

              <th class="table-heading">Conversation</th>


            </tr>

          </thead>

          <tbody class="table-body">



<?php

$_POST['overall']=true;

  if(isset($_POST['overall'])){ 
    $sql="SELECT u.name, u.country, u.region,u.user_id, u.img,
    SUM(CASE 
        WHEN t.buy_sell = 'buy' THEN t.price
        WHEN t.buy_sell = 'sell' THEN t.price
        ELSE 0 END) AS total_profit
    FROM userinfo u
    JOIN trade_transection t ON u.user_id = t.user_id
    WHERE t.date_time >= DATE_SUB(NOW(), INTERVAL 7 DAY) 
    GROUP BY u.user_id
    ORDER BY total_profit DESC";
}
  if(isset($_POST['regional'])) { 
      $sql="SELECT u.name, u.country, u.region,u.user_id, u.img,
    SUM(CASE WHEN t.buy_sell = 'buy' THEN t.price 
             WHEN t.buy_sell = 'sell' THEN t.price  ELSE 0 END) AS total_profit
    FROM userinfo AS u
    JOIN trade_transection AS t ON u.user_id = t.user_id
    WHERE u.region = '$region' AND t.date_time >= DATE_SUB(NOW(), INTERVAL 7 DAY)  
    GROUP BY u.user_id
    ORDER BY total_profit DESC";
}
  if(isset($_POST['country'])) { 
      $sql="SELECT u.name, u.country, u.region,u.user_id, u.img,
    SUM(CASE WHEN t.buy_sell = 'buy' THEN t.price 
             WHEN t.buy_sell = 'sell' THEN t.price  ELSE 0 END) AS total_profit
    FROM userinfo AS u
    JOIN trade_transection AS t ON u.user_id = t.user_id
    WHERE u.country = '$country' AND t.date_time >= DATE_SUB(NOW(), INTERVAL 7 DAY)  
    GROUP BY u.user_id
    ORDER BY total_profit DESC";
}  

$count=1;
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
  $Chat_id=$row['user_id']; 
  $img=$row['img']; 
?>



            <tr class="table-row">

              <td class="table-data">
                <button class="add-to-fav" aria-label="Add to favourite" data-add-to-fav>
                  <ion-icon name="star-outline" aria-hidden="true" class="icon-outline"></ion-icon>
                  <ion-icon name="star" aria-hidden="true" class="icon-fill"></ion-icon>
                </button>
              </td>

              <th class="table-data rank" scope="row"><?php echo htmlspecialchars($count)?></th>

              <td class="table-data">
                <div class="wrapper">
                  <img src="../admin/assets/img/<?php echo htmlspecialchars($img) ?>" width="20" height="20" alt="Bitcoin logo" class="img">

                  <h3>
                    <a href="#" class="coin-name"><?php echo htmlspecialchars($row['name'])?></a>
                  </h3>
                </div>
              </td>

              <td class="table-data last-price"><?php echo htmlspecialchars($row['region'])?></td>

              <td class="table-data last-update green"><?php echo htmlspecialchars($row['country'])?></td>

              <td class="table-data market-cap"><?php echo htmlspecialchars($row['total_profit'])?></td>

              <td class="table-data">
                <img src="chart-1.svg" width="100" height="40" alt="profit chart" class="chart">
              </td>
              <form action="../OneToOneChat/index.php"  method="POST"> 
              <td class="table-data">

                <button class="btn btn-outline1" name="Chat_id" value="<?php echo htmlspecialchars($Chat_id)?>">Message</button>
              </td>
              </form>

            </tr>

<?php
$count++;
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

          <a href="tel: +8801747700962" class="footer-contact-link">+880 174 770 0962</a>

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

  <script src="ranking.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>