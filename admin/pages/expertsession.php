<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade2z - seminar</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body class="bg-content">
    <main class="dashboard d-flex">

        <!-- start sidebar -->
        <?php include "component/sidebar.php"; ?>
        <!-- end sidebar -->

        <!-- start content page -->
        <div class="container-fluid px-4">
            <?php include "component/header.php"; ?>

            <!-- start seminar table -->
            <div class="student-list-header d-flex justify-content-between align-items-center py-2">
                <div class="title h6 fw-bold">Session</div>
                <div class="btn-add d-flex gap-3 align-items-center">
                    <div class="short">
                        <i class="far fa-sort"></i>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table student_list table-borderless">
                    <thead>
                        <style>
                            .align-middle th {
                                font-weight: bold;
                                font-size: 1.0em;
                            }
                        </style>
                        <tr class="align-middle">
                            <th style="text-align: center; vertical-align: middle;">Session ID</th>
                            <th style="text-align: center; vertical-align: middle;">User Image</th>
                            <th style="text-align: center; vertical-align: middle;">User Name</th>
                            <th style="text-align: center; vertical-align: middle;">User Email</th>
                            <th style="text-align: center; vertical-align: middle;">Expert Image</th>
                            <th style="text-align: center; vertical-align: middle;">Expert Name</th>
                            <th style="text-align: center; vertical-align: middle;">Expert Email</th>
                            <th style="text-align: center; vertical-align: middle;">Date & Time</th>
                            <th style="text-align: center; vertical-align: middle;">Duration</th>
                            <th style="text-align: center; vertical-align: middle;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'connection.php';

                        try {
                            $query = "SELECT es.s_id, u1.img AS user_img, u1.name AS user_name, u1.email AS user_email, u2.img AS expert_img, u2.name AS expert_name, u2.email AS expert_email, es.date_time, es.s_hour, es.status 
                                      FROM expert_sessions es
                                      INNER JOIN userinfo u1 ON es.user_id = u1.user_id
                                      INNER JOIN expert e ON es.exp_id = e.exp_id
                                      INNER JOIN userinfo u2 ON e.user_id = u2.user_id";

                            $result = $con->query($query);

                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr class='bg-white align-middle'>";
                                echo "<td style='text-align: center; vertical-align: middle;'>" . $row['s_id'] . "</td>";
                                echo "<td style='text-align: center; vertical-align: middle;'><img src='../assets/img/" . $row['user_img'] . "' alt='User Image' height='70' width='70'></td>";
                                echo "<td style='text-align: center; vertical-align: middle;'>" . $row['user_name'] . "</td>";
                                echo "<td style='text-align: center; vertical-align: middle;'>" . $row['user_email'] . "</td>";
                                echo "<td style='text-align: center; vertical-align: middle;'><img src='../assets/img/" . $row['expert_img'] . "' alt='Expert Image' height='70' width='70'></td>";
                                echo "<td style='text-align: center; vertical-align: middle;'>" . $row['expert_name'] . "</td>";
                                echo "<td style='text-align: center; vertical-align: middle;'>" . $row['expert_email'] . "</td>";
                                echo "<td style='text-align: center; vertical-align: middle;'>" . $row['date_time'] . "</td>";
                                echo "<td style='text-align: center; vertical-align: middle;'>" . $row['s_hour'] . " hours</td>";
                                

                                 // Check if meeting time is in the future
                                if (strtotime($row['date_time']) > time()) {
                                    echo "<td style='text-align: center; vertical-align: middle;'>Pending</td>";
                                } elseif (strtotime($row['date_time']) == time() && $row['s_hour'] > 0) {
                                    echo "<td style='text-align: center; vertical-align: middle;'>Running</td>";
                                    // Decrease s_hour 
                                } else {
                                    echo "<td style='text-align: center; vertical-align: middle;'>Finished</td>";
                                }
                                echo "</tr>";
                            }
                        } catch (PDOException $e) {
                            echo "Error executing query: " . $e->getMessage();
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script src="../js/script.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
</body>

</html>
