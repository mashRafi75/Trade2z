<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade2z - wallet</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body class="bg-content">
    <main class="dashboard d-flex">

        <!-- start sidebar -->
        <?php 
            include "component/sidebar.php";
        ?>
        <!-- end sidebar -->

        <!-- start content page -->
        <div class="container-fluid px-4">
        <?php 
            include "component/header.php";
        ?>
          
        
        <!-- start Wallet table -->
            <div class="student-list-header d-flex justify-content-between align-items-center py-2">
                <div class="title h6 fw-bold">Wallet</div>
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
                            <th>Wallet ID</th>
                            <th>User Name</th>  
                            <th>Invest Amount</th>
                            <th>Current Balance</th>
                            <th class="opacity-0">list</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          include 'connection.php';
                          $result = $con -> query("SELECT * FROM wallet");
                          foreach($result as $value):
                        ?>
                        <tr class="bg-white align-middle">
                                <td><?php echo $value['wallet_id'] ?></td>

                                <?php
                             $stmt = $con->prepare("SELECT userinfo.name 
                                                    FROM wallet INNER JOIN userinfo 
                                                    ON wallet.user_id = userinfo.user_id 
                                                    WHERE wallet.user_id = :user_id");
                              $stmt->bindParam(':user_id', $value['user_id']);
                               $stmt->execute();
                            $user = $stmt->fetch(PDO::FETCH_ASSOC);
                               echo "<td>" . $user['name'] . "</td>";
                               ?>

                                <td><?php echo $value['invest'] ?></td>
                                <td><?php echo $value['cur_balance'] ?></td>
                            <!--
                                <td class="d-md-flex gap-3 mt-3">
                                   <a href="walletmodifier.php?wallet_id=<?php echo $value['wallet_id'] ?>">
                                     <button type="button">Update</button> </a>
                                </td>
                            -->
                            </td>
                        </tr> 

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- end wallet table -->
        </div>
        <!-- end content page -->

    </main>
    <script src="../js/script.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>