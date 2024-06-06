<?php

session_start();
require '../db_connect/db_connection.php';  
      
  if(isset($_POST['chat'])) { 
      header("Location: ../chat/index.php");
  }

  //$c_id="";
  if(isset($_POST['buy'])){

    $id= $_SESSION["user_id"];
    $c_id=$_POST['buy'];

    $query = "SELECT c_name,c_price FROM crypto_info WHERE c_id = $c_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $c_price = $row['c_price'];
    $c_name = $row['c_name'];
    mysqli_free_result($result);    

    $qr = "SELECT cur_balance,invest,profit FROM wallet WHERE `user_id` = $id";
    $res = mysqli_query($conn, $qr);
    $row = mysqli_fetch_assoc($res);
    $cur_balance = $row['cur_balance'];
    $invest = $row['invest'];
    mysqli_free_result($res);

    if($cur_balance>=$c_price){

      $scaleVal = 4;  
      $new_value = bcsub($cur_balance, $c_price, $scaleVal);
      $prof = bcsub($new_value, $invest, $scaleVal);
      $query = "UPDATE wallet SET cur_balance = $new_value WHERE `user_id` = $id";
      $stmt = mysqli_query($conn, $query);

      $query = "UPDATE wallet SET profit = $prof WHERE `user_id` = $id";
      $stmt = mysqli_query($conn, $query);

      $q = "INSERT INTO `trade_transection`(`user_id`, `buy_sell`,`crypto_name`,`price`,`profit`,`c_id`) VALUES ('$id','buy','$c_name','$c_price','$prof','$c_id')";
      $rq = mysqli_query($conn, $q);      

      echo "<script> alert('Buy confirm!'); </script>";
    }
    else{
      echo "<script> alert('Not Enough Balance!'); </script>";
    }
//    header("Location: ../trading_page/trading_page.php");
  }

  if(isset($_POST['sell'])){

    $id= $_SESSION["user_id"];
    $c_id=$_POST['sell'];

    $query = "SELECT c_name,c_price FROM crypto_info WHERE c_id = $c_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $c_price = $row['c_price'];
    $c_name = $row['c_name'];
    mysqli_free_result($result);    

    $qr = "SELECT cur_balance,invest,profit FROM wallet WHERE `user_id` = $id";
    $res = mysqli_query($conn, $qr);
    $row = mysqli_fetch_assoc($res);
    $cur_balance = $row['cur_balance'];
    $invest = $row['invest'];
    mysqli_free_result($res);

    $cnt=0;
    $sql = "SELECT u.user_id, u.name AS user_name, c.c_name AS crypto_name,t.net_crypto_count
    FROM userinfo u
    JOIN (SELECT user_id,c_id,
            GREATEST(
                (SUM(CASE WHEN buy_sell = 'buy' THEN 1 ELSE 0 END) -
                SUM(CASE WHEN buy_sell = 'sell' THEN 1 ELSE 0 END)),0) AS net_crypto_count
        FROM trade_transection
        WHERE user_id = $id
        GROUP BY user_id, c_id
        HAVING 
            GREATEST(
                (SUM(CASE WHEN buy_sell = 'buy' THEN 1 ELSE 0 END) -
                SUM(CASE WHEN buy_sell = 'sell' THEN 1 ELSE 0 END)), 0) > 0) t ON u.user_id = t.user_id
                JOIN crypto_info c ON t.c_id = c.c_id
                ORDER BY u.user_id, c.c_name";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
    $cryp_name=$row['crypto_name'];
    $net_crypto_count=$row['net_crypto_count'];

    if($c_name==$cryp_name){
      $cnt=$net_crypto_count;
      break;
    }

    }
    
    if($cnt>0){

      $scaleVal = 4;  
      $new_value = bcadd($cur_balance, $c_price, $scaleVal);
      $prof = bcsub($new_value, $invest, $scaleVal);
      $query = "UPDATE wallet SET cur_balance = $new_value WHERE `user_id` = $id";
      $stmt = mysqli_query($conn, $query);

      $query = "UPDATE wallet SET profit = $prof WHERE `user_id` = $id";
      $stmt = mysqli_query($conn, $query);
      $q = "INSERT INTO `trade_transection`(`user_id`, `buy_sell`,`crypto_name`,`price`,`profit`,`c_id`) VALUES ('$id','sell','$c_name','$c_price','$prof','$c_id')";
      $rq = mysqli_query($conn, $q);

      echo "<script> alert('Sell confirm!'); </script>";
   }
    else{
      echo "<script> alert('Not Enough Currency!'); </script>";
    } 
//      header("Location: ../trading_page/trading_page.php");
  }

 

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
  <link rel="stylesheet" href="trading_styles.css">
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
<!-------------------------------------------------------------------- a-->
    <form method="POST">
        <input type="submit" class="btn btn-outline" name="chat" value="Message"/>
    </form>
      <a href="../logout.php" class="logo1">
        <img src="log-out.svg" width="32" height="32" alt="Cryptex logo">
      </a>

    </div>
  </header>
  
  <main>
  <!--Market-->
  <section class="section market" aria-label="market update" data-section>
    <div class="container">

      <div class="title-wrapper">
        <h2 class="h2 section-title">Market Update</h2>
      </div>

      <div class="market-tab">

        <table class="market-table">

          <thead class="table-head">

            <tr class="table-row table-title">

              <th class="table-heading"></th>

              <th class="table-heading" scope="col">#</th>

              <th class="table-heading" scope="col">Name</th>

              <th class="table-heading" scope="col">Last Price</th>


              <th class="table-heading" scope="col">Last 7 Days</th>

              <th class="table-heading"></th>

            </tr>

          </thead>

          <tbody class="table-body">

<?php
$sql = "SELECT * FROM crypto_info ORDER BY c_price DESC";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
$c_id=$row['c_id'];  
$img=$row['c_img']; 
$graph=$row['graph']; 
?>


            <tr class="table-row">

              <td class="table-data">
                <button class="add-to-fav" aria-label="Add to favourite" data-add-to-fav>
                  <ion-icon name="star-outline" aria-hidden="true" class="icon-outline"></ion-icon>
                  <ion-icon name="star" aria-hidden="true" class="icon-fill"></ion-icon>
                </button>
              </td>

              <th class="table-data rank" scope="row"><?php echo htmlspecialchars($row['c_id'])?></th>

              <td class="table-data">
                <div class="wrapper">
                  <img src="../admin/assets/crypto/<?php echo htmlspecialchars($img) ?>" width="20" height="20" alt="Bitcoin logo" class="img">

                  <h3>
                    <a href="#" class="coin-name"><?php echo htmlspecialchars($row['c_name'])?><span class="span">CRYPT</span></a>
                  </h3>
                </div>
              </td>
              <td class="table-data last-price"><?php echo htmlspecialchars('$'.$row['c_price']) ?></td>


        <?php if($graph=="up"){ ?>
              <td class="table-data">
              <img src="chart-1.svg" width="100" height="40" alt="profit chart" class="chart">
              </td>
        <?php } else { ?>
          <td class="table-data">
              <img src="chart-2.svg" width="100" height="40" alt="profit chart" class="chart">
              </td> 
        <?php } ?>

            <form method="POST">
              <td class="table-data">
                <button class="btn btn-outline" name="buy" value="<?php echo htmlspecialchars($c_id) ?>">Buy</button>
              </td>

              <td class="table-data">
                <button class="btn btn-outline1" name="sell" value="<?php echo htmlspecialchars($c_id) ?>">Sell</button>
              </td>
            </form> 
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

  <script src="trading.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>