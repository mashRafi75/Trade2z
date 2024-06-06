<?php

session_start();
require '../db_connect/db_connection.php';  
      
$id= $_SESSION["user_id"];
if (isset($_POST['publish'])) {

$title=$_POST['title'];
$details=$_POST['details'];

$exp_id='';
$sql = "SELECT exp_id  FROM expert WHERE user_id = $id ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $exp_id=$row['exp_id']; 

    if($row['exp_id']){
        $q = "INSERT INTO `blogs`(`writer_id`,`title`, `content`) VALUES ($exp_id,'$title','$details')";
        $rq = mysqli_query($conn, $q); 
    }
    else{   
          echo "<script> alert('You are Not An Expert!'); </script>";
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
  <link rel="stylesheet" href="blog.css">
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
            <a href="#" class="navbar-link" data-nav-link>Experts</a>
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
      <a href="#" class="btn btn-outline" id="bt2" onclick="togglePopup2()">Publish</a>
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
        
        <h2 class="h2 section-title">Blogs</h2>
      </div>

      <div class="market-tab">

        <table class="market-table">



          <!--Popup-->
          <div class="popup1" id="popup-1">
            <div class="overlay"></div>
            <div class="content">


<?php

$b_id=1;

$sql = "SELECT * FROM blogs WHERE b_id = $b_id ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $title=$row['title'];
    $content=$row['content'];



?>



                <div class="closebtn" onclick="togglePopup()">&times;</div>
                <div class="inside-blog">
                    <img src="cryptocurrency-trading-guide.png" alt="">
                </div>
                <h1><?php echo htmlspecialchars($row['title']) ?></h1>
                <p class="main-blog"><?php echo htmlspecialchars($row['content']) ?></p>  
            </div>
          </div>



<form method="POST"> 

          <button onclick="togglePopup2()">publish</button>
          <div class="popup2" id="popup-2">
            <div class="overlay"></div>
            <div class="content">
                <div class="closebtn" onclick="togglePopup2()">&times;</div>
                <div class="popup-form">
                    <h2>Publish Blog</h2>
                    <form id="blog-form">
                        <label for="blog-tit"> Title:</label>
                        <input type="text" name='title' placeholder="Enter blog title" id="blog-tit"><br>
                        <label for="blog-cont"> Details:</label>
                        <textarea name='details' placeholder="Enter blog description" rows="4" id="blog-cont"></textarea><br>
                        <input type="file" accept="image/*"  id="image"><br>
                        <button type="submit" name='publish' onclick="togglePopup2()">Submit</button>
                    </form>
                </div> 
                
            </div>
          </div>


          <tbody class="table-body">

</form>

<?php
  
    $sql="SELECT * from blogs";

    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
    $b_id=$row['b_id']; 

    $text = $row["content"];
    $img = $row["b_img"];
    $words = str_word_count($text, 1);
    $first_20_words = array_slice($words, 0, 20);

?>





            <tr class="table-row">

              <td class="table-data">
                <button class="add-to-fav" aria-label="Add to favourite" data-add-to-fav>
                  
                  
                </button>
              </td>

              <div class="blog-list">
                <div class="image-container">
                    <img src="../admin/assets/blogs/<?php echo htmlspecialchars($img) ?>" alt="img" style=" margin-top: 10px;
  margin-left: 10px;
  margin-right: 10px;
  height:150px;
  width:180px;
  border-radius: 4px;">
                </div>
                <div class="blog-content">
                    <h1><?php echo htmlspecialchars($row['title']) ?></h1>
                    <p> <?php foreach ($first_20_words as $word){echo "$word ";}?> <button class="blog-btn" onclick="togglePopup('<?php echo htmlspecialchars($row['b_id']) ?>')">Read More</button>
                    </p>
                    
                </div>
            </div>

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

  <script src="blog.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>