<?php
  session_start();
  require './db_connect/db_connection.php'; 

   $id= $_SESSION["user_id"];

    if(isset($_POST['chat'])) { 
        header("Location: ./chat/index.php");
    } 

    if(isset($_POST["add"])){
      $q = $q = "UPDATE `wallet` 
      SET `invest` = `invest` + 1000,
          `cur_balance` = `cur_balance` + 1000
      WHERE `user_id` = '$id'";
      $rq = mysqli_query($conn, $q);      
      echo "<script> alert('1000$ successfully added!'); </script>";
    }


  if(isset($_POST["redeem"])){
    $result=mysqli_query($conn,"SELECT `cur_balance` FROM `wallet` WHERE `user_id` = '$id'");
    $row=mysqli_fetch_assoc($result);
    $cur_balance=$row['cur_balance'];

  if ($cur_balance >= 1000) {
    $q = "UPDATE `wallet` SET `cur_balance` = `cur_balance` - 1000 WHERE `user_id` = '$id'";
    $rq = mysqli_query($conn, $q);   
    echo "<script>alert('1000$ Redeemed Successfully!');</script>";
  } 
  else {
    echo "<script>alert('Insufficient balance!');</script>";
  }

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
  <link rel="stylesheet" href="landing_styles.css">
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

      <a href="./landing_page.php" class="logo">
        <img src="bitcoin.png" width="32" height="32" alt="Cryptex logo">
        Trade2z
      </a>

      <nav class="navbar" data-navbar>
        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="./trading_page/trading_page.php" class="navbar-link" data-nav-link>Trading</a>
          </li>

          <li class="navbar-item">
            <a href="./expert_page/expert_page.php" class="navbar-link" data-nav-link>Experts</a>
          </li>

          <li class="navbar-item">
            <a href="./blog_page/blog_page.php" class="navbar-link" data-nav-link>Blog</a>
          </li>

          <li class="navbar-item">
            <a href="seminar_page/seminar_page.php" class="navbar-link" data-nav-link>Seminar</a>
          </li>
          <li class="navbar-item">
            <a href="./ranking_page/ranking_page.php" class="navbar-link" data-nav-link>Rankings</a>
          </li>
          <li class="navbar-item">
            <a href="./profit_page/profit_page.php" class="navbar-link" data-nav-link>Profit</a>
          </li>          
        </ul>
      </nav>

      <button class="nav-toggle-btn" aria-label="Toggle menu" data-nav-toggler>
        <span class="line line-1"></span>
        <span class="line line-2"></span>
        <span class="line line-3"></span>
      </button>

      <a href="#" class="btn btn-outline" id="bt1" onclick="togglePopup()">Wallet</a>
      <a href="./profile/profile.php" class="btn btn-outline" id="bt1" >Profile</a>
      
      <form method="post">
        <input type="submit" class="btn btn-outline" name="chat" value="Message"/>
      </form>
      <a href="./logout.php" class="logo1">
        <img src="log-out.svg" width="32" height="32" alt="Cryptex logo">
      </a>
      

    </div>
  </header>
  
  <main>
    <section class="hero gridSection">
      <div class="sectionDesc">
          <h1 class="headline">
            <span>Your Gateway to Seamless<span class="cryptoText">Crypto Trading</span>Experiences.</span>
          </h1>
          <p class="sub-headline">
            Explore our range of tools and expert guidance to unlock your full potential in the exciting world of digital assets. Join us today and elevate your crypto trading journey like never before
          </p>
          <div class="btnContainer">
              <button class="btn btn-outline">Contact Now</button>
          </div>
      </div>
      <div class="sectionPic bouncepic" id="sectionPic">
          <img src="hero.png" alt="">
      </div>
      
    </section>

<?php
    $qr = "SELECT cur_balance,invest,profit FROM wallet WHERE `user_id` = $id";
    $res = mysqli_query($conn, $qr);
    $row = mysqli_fetch_assoc($res);
    $scaleVal = 4;  
    $invest = bcadd($row['invest'],0, $scaleVal);
    $cur_balance = bcadd($row['cur_balance'],0, $scaleVal);
    mysqli_free_result($res);

?>
    <div class="popup1" id="popup-1">
      <div class="overlay"></div>
        <div class="content" style="height: 580px;">
          <div class="closebtn" onclick="togglePopup()">&times;</div>
          
          <H1>Your Wallet</H1> 
          <p>
            <div class="inv">
              <h2>Total Investment: <b><?php echo htmlspecialchars($invest)?></b></h2>
            </div>
            <div class="cur">
              <h2>Current Balance: <b><?php echo htmlspecialchars($cur_balance)?></b></h2>
            </div>
            <div>
              <h2 class="pro">Total Profit: <?php echo htmlspecialchars($row['profit'])?></h2>
            </div>
          </p>
          <small class="tips"><b><i>Tips:</i></b> Invest More </small> 
          
          <div class="coin-container" style=" margin-top: 30px; padding-top: 10px; border-top: 2px solid black;">
            <div class="coinlist" style="display: flex; justify-content: space-between; margin-bottom: 15px;">
              <h2 style="text-decoration: underline;">Coin Name</h2>
              <h2>#</h2>
            </div>


<?php
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
$c_name=$row['crypto_name'];
$net_crypto_count=$row['net_crypto_count'];    
?>

            <div class="coinlist" style="display: flex; justify-content: space-between; margin-bottom: 15px;">
              <h3><?php echo htmlspecialchars($c_name) ?></h3>
              <h3><?php echo htmlspecialchars($net_crypto_count) ?></h3>
            </div>
<?php
}
?>
          </div>


          <form method="POST">
          <button name="add"  style="  position: absolute;bottom: 20px;left: 20px;width: 60px;height: 30px;
          border-radius: 20px;color: var(--blue-crayola);transition: var(--transition-1);" >Add</button>
          <button name="redeem"  style="  position: absolute;bottom: 20px;left: 100px;width: 60px;height: 30px;
          border-radius: 20px;color: var(--blue-crayola);transition: var(--transition-1);">Redeem</button>
          </form> 

          <button class="transbtn" onclick="togglePopup(),togglePopup2()">Transactions</button>
        </div>
        
    </div>
  
    <div class="popup2" id="popup-2">
      <div class="overlay"></div>
        <div class="content">
          <div class="closebtn" onclick="togglePopup2()">&times;</div>
          
          <section class="section market" aria-label="market update" data-section>
            <div class="container">

              <div class="title-wrapper">
                <h2 class="h2 section-title">Transactions(7 Days)</h2>
              </div>
              <div class="market-tab">
        
                <table class="market-table">
        
                  <thead class="table-head">
        
                    <tr class="table-row table-title">
        
                      <th class="table-heading"></th>
        
                      <th class="table-heading" scope="col">Coin Id</th>
        
                      <th class="table-heading" scope="col">   Coin Name   </th>
        
                      <th class="table-heading" scope="col">   Buy/Sell   </th>
                      <th class="table-heading">Price</th>

                      <th class="table-heading">Profit <small>(After Transaction)</small></th>
        
                      
        
                      <th class="table-heading">Growth Chart</th>
                      <th class="table-heading">Date of Transations</th>
        
                    </tr>
        
                  </thead>
        
                  
                  <tbody class="table-body">
<?php
  
    $sql="SELECT crypto_name,price,date_time,buy_sell,profit,c_id
    FROM trade_transection
    WHERE user_id=$id AND (date_time >= DATE_SUB(NOW(), INTERVAL 7 DAY))";

    $result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {

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
                          <img src="coin-1.svg" width="20" height="20" alt="Bitcoin logo" class="img">
        
                          <h3>
                            <a href="#" class="coin-name"><?php echo htmlspecialchars($row['crypto_name'])?></a>
                          </h3>
                        </div>
                      </td>
        
                      <td class="table-data last-price"><?php echo htmlspecialchars($row['buy_sell'])?></td>
        
                      <td class="table-data last-update green">$<?php echo htmlspecialchars($row['price'])?>  </td>
        
                      <td class="table-data market-cap">$<?php echo htmlspecialchars($row['profit'])?></td> 
        <?php if($row['profit']>0){ ?>
              <td class="table-data">
              <img src="chart-1.svg" width="100" height="40" alt="profit chart" class="chart">
              </td>
        <?php } else { ?>
          <td class="table-data">
              <img src="chart-2.svg" width="100" height="40" alt="profit chart" class="chart">
              </td> 
        <?php } ?>
                      <td class="table-data">
                        <?php echo htmlspecialchars($row['date_time'])?>
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
        </div>
        
    </div>

    <!-- Carousel -->
    <section>
      <div class="carouselContainer">
          <div class="eachCarousel eachCarouselBorder">
              <img src="bitcoin-icon.png" alt="">
              <article class="carouselDesc">
                  <h1 class="carouselTitle">Bitcoin</h1>
                  <p class="carouselPara">Bitcoin is an innovative payment network</p>
                  <div class="carouselPrice">
                      <h3>$34,000</h3>
                      <span class="rect"></span>
                      <h3 class="carouselDiscount">15%</h3>
                  </div>
                  <button class="carouselBtn">Buy & Trade</button>
              </article>
          </div>
  
          <div class="eachCarousel">
              <img src="ethereum-icon.png" alt="">
              <article class="carouselDesc">
                  <h1 class="carouselTitle">Ethereum</h1>
                  <p class="carouselPara">Ethereum is open-source blockchain currency</p>
                  <div class="carouselPrice">
                      <h3>$25,600</h3>
                      <span class="rect"></span>
                      <h3 class="carouselDiscount">9%</h3>
                  </div>
                  <button class="carouselBtn">Buy & Trade</button>
              </article>
          </div>
  
          <div class="eachCarousel">
              <img src="tether-icon.png" alt="">
              <article class="carouselDesc">
                  <h1 class="carouselTitle">Tether</h1>
                  <p class="carouselPara">Tether is a stable coin cryptocurrency</p>
                  <div class="carouselPrice">
                      <h3>$7,000</h3>
                      <span class="rect"></span>
                      <h3 class="carouselDiscount">4%</h3>
                  </div>
                  <button class="carouselBtn">Buy & Trade</button>
              </article>
          </div>
  
          <div class="eachCarousel">
              <img src="bitcoin-icon.png" alt="">
              <article class="carouselDesc">
                  <h1 class="carouselTitle">Bitcoin</h1>
                  <p class="carouselPara">Bitcoin is an innovative payment network</p>
                  <div class="carouselPrice">
                      <h3>$34,000</h3>
                      <span class="rect"></span>
                      <h3 class="carouselDiscount">15%</h3>
                  </div>
                  <button class="carouselBtn">Buy & Trade</button>
              </article>
          </div>
  
          <div class="eachCarousel">
              <img src="ethereum-icon.png" alt="">
              <article class="carouselDesc">
                  <h1 class="carouselTitle">Ethereum</h1>
                  <p class="carouselPara">Ethereum is open-source blockchain currency</p>
                  <div class="carouselPrice">
                      <h3>$25,600</h3>
                      <span class="rect"></span>
                      <h3 class="carouselDiscount">9%</h3>
                  </div>
                  <button class="carouselBtn">Buy & Trade</button>
              </article>
          </div>
  
          <div class="eachCarousel">
              <img src="tether-icon.png" alt="">
              <article class="carouselDesc">
                  <h1 class="carouselTitle">Tether</h1>
                  <p class="carouselPara">Tether is a stable coin cryptocurrency</p>
                  <div class="carouselPrice">
                      <h3>$7,000</h3>
                      <span class="rect"></span>
                      <h3 class="carouselDiscount">4%</h3>
                  </div>
                  <button class="carouselBtn">Buy & Trade</button>
              </article>
          </div>
      </div>
      <div class="carouselIndicator">
          <div class="indicator activeIndicator" onclick="slideCarousel(0)"></div>
          <div class="indicator" onclick="slideCarousel(1)"></div>
          <div class="indicator" onclick="slideCarousel(2)"></div>
          <div class="indicator" onclick="slideCarousel(3)"></div>
          <div class="indicator" onclick="slideCarousel(4)"></div>
          <div class="indicator" onclick="slideCarousel(5)"></div>
      </div>
  </section>

  <!--Process-->
  <section class="gridSection">
    <div class="sectionDesc processessDesc">
        <h1 class="sectionHeader">Chain Process</h1>
        <p class="sectionPara">We do not charge any fees and we do not require 
          any registration. You keep your privacy and your 
          coins.
        </p>
        <div class="eachProcesses">
            <img src="handshake-icon-white-line.svg" alt="handshake">
            <div class="eachprocessesPara">
                <h1 class="processTitle">Trading</h1>
                <p>
                    The act of speculating on cryptocurrency price movements 
                    via a CFD trading account, or buying and selling.
                </p>
            </div>
        </div>
        <div class="eachProcesses">
            <img src="cart-icon-white-line.svg" alt="handshake">
            <div class="eachprocessesPara">
                <h1 class="processTitle">Buying</h1>
                <p>
                    Best cryptocurrency exchanges currently purchase Bitcoin, 
                    Ethereum, and Litecoin other coins and tokens on the platform.
                </p>
            </div>
        </div>
    </div>
    <div class="sectionPic bouncepic processesPic" id="sectionPic">
        <img src="chain-process-img.png" alt="">
    </div>
</section>

 <!-- Markets -->
 <section class="gridSection">
  <div class="sectionDesc marketDesc">
      <h1 class="sectionHeader">Markets at finger</h1>
      <p class="sectionPara">The Blockchain is a decentralized, 
          digital ledger of transactions that are recorded 
          confirmed
      </p>
      <div class="eachMarket">
          <img src="buy-icon-color.svg" alt="handshake">
          <div>
              <h1 class="marketTitle">Buying</h1>
              <p class="darkPara">
                  Best cryptocurrency exchanges currently purchase 
                  Bitcoin, Ethereum, and Litecoin other coins and tokens 
                  on the platform.
              </p>
          </div>
      </div>
      <div class="eachMarket">
          <img src="trading-icon-color.svg" alt="handshake">
          <div>
              <h1 class="marketTitle">Trading</h1>
              <p class="darkPara">
                  The act of speculating on cryptocurrency price movements 
                  via a CFD trading account, or buying and selling.
              </p>
          </div>
      </div>
      <div class="eachMarket">
          <img src="support-icon-color.svg" alt="handshake">
          <div>
              <h1 class="marketTitle">Supporting</h1>
              <p class="darkPara">
                  Don’t worry if you’re new to crypto and digital 
                  currencies – Skrill makes setting up a cryptocurrency 
                  wallet easy.
              </p>
          </div>
      </div>
      <div class="eachMarket">
          <img src="online-icon-color.svg" alt="handshake">
          <div>
              <h1 class="marketTitle">Online</h1>
              <p class="darkPara">
                  Cryptocurrency, especially Bitcoin, 
                  has proven to be a popular trading 
                  vehicle, even if legendary investors 
                  as good.
              </p>
          </div>
      </div>
  </div>
  <div class="sectionPic marketspicSection" id="sectionPic">
     <h1 class="marketspicHeader">CRYPTOCURRENCY</h1>
      <div class="marketsPicContainer">
          <div class="marketPic marketPic1">
              <img src="persent-icon-white.svg" alt="">
              <article class="marketTitle">Hot Sale</article>
          </div>

          <div class="marketPic marketPic2">
              <img src="bitcoin-icon-white.svg" alt="">
              <article class="marketTitle">Bit coin</article>
          </div>

          <div class="marketPic marketPic3">
              <img src="ethereum-white-icon.svg" alt="">
              <article class="marketTitle">ETHEREUM</article>
          </div>

          <div class="marketPic marketPic4">
              <img src="handshake-icon-white.svg" alt="">
              <article class="marketTitle">CONNECTING</article>
          </div>
      </div>
      </div>
</section>


       <!-- Carousel -->
       <section class="teamSection">
        <h1 class="sectionHeader">Our Creative Team</h1>
        <div class="carouselContainer">
            <div class="eachCarousel eachTeam">
                <div class="teamPic">
                    <img src="mashrafi.jpg" alt="">
                </div>
                <div class="teamDesc">
                    <h1 class="teamName">Mosaddek Mashrafi</h1>
                    <p class="position">UI UX Designer</p>
                </div>

            </div>
    
            <div class="eachCarousel eachTeam">
                <div class="teamPic">
                    <img src="Mostafiz.jpg" alt="">
                </div>
                <div class="teamDesc">
                    <h1 class="teamName">Mustafizur Rahman Emon</h1>
                    <p class="position">Developer</p>
                </div>
            </div>
    
            <div class="eachCarousel eachTeam">
                <div class="teamPic">
                    <img src="sakhawat.jpeg" alt="">
                </div>
                <div class="teamDesc">
                    <h1 class="teamName">Sakhawat Hossain</h1>
                    <p class="position">Content writer</p>
                </div>
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

  <script src="landing.js"></script>

</body>
</html>