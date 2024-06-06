<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-content">
    <main class="dashboard d-flex">
        <!-- start sidebar -->
        <?php 
            include "component/sidebar.php";
            include 'connection.php';
            $nbr_users = $con->query("SELECT * FROM userinfo");
            $nbr_users = $nbr_users->rowCount();

            $nbr_crypto = $con->query("SELECT * FROM crypto_info");
            $nbr_crypto = $nbr_crypto->rowCount();

            $nbr_expert = $con->query("SELECT * FROM expert");
            $nbr_expert = $nbr_expert->rowCount();

            $nbr_blogs = $con->query("SELECT * FROM blogs");
            $nbr_blogs = $nbr_blogs->rowCount();
        ?>
        <!-- end sidebar -->
        <!-- start content page -->
        <div class="container-fluid px">
            <?php 
                include "component/header.php";
            ?>
            <div class="cards row gap-3 justify-content-center mt-5">
                <div class="card__items card__items--blue col-md-3 position-relative">
                    <div class="card__students d-flex flex-column gap-2 mt-3">
                        <i class="fal fa-users h3"></i><span>Users</span>
                    </div>
                    <div class="card__nbr-students">
                        <span class="h5 fw-bold nbr"style="color:orange;"><?php echo $nbr_users; ?></span>
                    </div>
                </div>

                <div class="card__items card__items col-md-3 position-relative" style="background-color: #9dc5c3;">
                    <div class="card__Course d-flex flex-column gap-2 mt-3">
                        <i class="fab fa-bitcoin h3"></i><span>Currency</span>
                    </div>
                    <div class="card__nbr-course">
                        <span class="h5 fw-bold nbr"style="color:orange;"><?php echo $nbr_crypto; ?></span>
                    </div>
                </div>

                <div class="card__items card__items--blue col-md-3 position-relative">
                    <div class="card__students d-flex flex-column gap-2 mt-3">
                        <i class="fas fa-user-tie me-2 h3"></i><span>Experts</span>
                    </div>
                    <div class="card__nbr-students">
                        <span class="h5 fw-bold nbr"style="color:orange;"><?php echo $nbr_expert; ?></span>
                    </div>
                </div>

                <div class="card__items card__items--yellow col-md-3 position-relative">
                    <div class="card__payments d-flex flex-column gap-2 mt-3">
                        <i class="fal fa-blog h3"></i><span>Blogs</span>
                    </div>
                    <div class="card__nbr-students">
                        <span class="h5 fw-bold nbr"style="color:orange;"><?php echo $nbr_blogs; ?></span>
                    </div>
                </div>

                <div class="card__items card__items--blue col-md-3 position-relative">
                    <div class="card__users d-flex flex-column gap-2 mt-3">
                        <i class="fal fa-calendar-alt h3"></i><span>Seminar</span>
                    </div>
                    <!-- Instant Meeting Button -->
                    <span class="h6 fw-bold nbr "style="display: inline-block; color:orange; ">
                        <button id="instantMeetingBtn" type="button" class="btn btn-primary" onclick="startInstantMeeting()">Instant Meeting</button>
                    </span>
                </div>
            </div>

            <?php
            function generateMeetingURL() {
                $meetURL = "https://meet.google.com/";
                return $meetURL;
            }

            $meetingURL = generateMeetingURL();
            ?>

            <script>
                function startInstantMeeting() {
                    var meetURL = "<?php echo $meetingURL; ?>";
                    window.open(meetURL, "_blank"); //Open new tab
                }
            </script>

            <!-- Start Crypto Currency -->
            <div class="cards row gap-3 justify-content-center mt-5">
                <!-- fetching data from database -->
                <?php
                    include 'connection.php';
                    $crypto_query = $con->query("SELECT c_name, c_price, c_img FROM crypto_info");
                    // Check data is retrieved successfully
                    if ($crypto_query) {
                        // Loop through each row 
                        while ($row = $crypto_query->fetch(PDO::FETCH_ASSOC)) {
                            $image_url = "../assets/crypto/" . $row['c_img'];
                ?>
                            <div class="card__items card__items--gradient col-md-3 position-relative">
                                <div class="card__users d-flex flex-column gap-2 mt-3">
                                    <!-- Output the crypto image  -->
                                    <img src="<?php echo $image_url; ?>" alt="<?php echo $row['c_name']; ?>" width="40">
                                    <!-- Output the crypto name -->
                                    <span class="h4 fw-bold"><?php echo $row['c_name']; ?></span>
                                </div>
                                <!-- Output the crypto price -->
                                <span class="h4 fw-bold nbr"style="color:orange;"><?php echo $row['c_price']; ?></span>
                            </div>
                <?php
                        }
                    } else {
                        echo "Error: Unable to fetch crypto data";
                    }
                ?>
            </div>
            <!-- End Crypto Currency -->

            <!-- start Crypto graph -->
<canvas id="cryptoChart" width="300" height="100"></canvas>
<?php
    include 'connection.php';
    $crypto_data = array();
    $crypto_query = $con->query("SELECT c_name, c_price FROM crypto_info");
    if ($crypto_query) {
        while ($row = $crypto_query->fetch(PDO::FETCH_ASSOC)) {
            $crypto_data[$row['c_name']] = $row['c_price'];
        }
    } else {
        echo "Error: Unable to fetch crypto data";
    }
?>

<script>
    var cryptoData = <?php echo json_encode($crypto_data); ?>;
    var ctx = document.getElementById('cryptoChart').getContext('2d');
    var cryptoChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: Object.keys(cryptoData),
            datasets: [{
                label: 'Crypto Prices',
                data: Object.values(cryptoData),
                borderColor: 'rgba(75, 192, 192, 1)', // Set the line color
                borderWidth: 2, 
                fill: false 
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

        </div>
    </main>
    <script src="../js/script.js"></script>
    <script src="/js/bootstrap.bundle.js"></script>
</body>
</html>