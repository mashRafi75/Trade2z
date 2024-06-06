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
                <div class="title h6 fw-bold">Seminar</div>
                <div class="btn-add d-flex gap-3 align-items-center">
                    <div class="short">
                        <i class="far fa-sort"></i>
                    </div>
                    <?php include 'seminarpopupadd.php'; ?>
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
                            <th style="text-align: center; vertical-align: middle;">Banner</th>
                            <th style="text-align: center; vertical-align: middle;">Title</th>
                            <th style="text-align: center; vertical-align: middle;">Host Image</th>
                            <th style="text-align: center; vertical-align: middle;">Host Name</th>
                            <th style="text-align: center; vertical-align: middle;">Host Email</th>  
                            <th style="text-align: center; vertical-align: middle;">Date & Time</th>
                           <!-- <th style="text-align: center; vertical-align: middle;">Link</th> -->
                            <th> </th>
                            <th class="opacity-0">list</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'connection.php';
                        $result = $con->query("SELECT seminar.*, expert.user_id, userinfo.img, userinfo.name, userinfo.email
                                                FROM seminar
                                                INNER JOIN expert ON seminar.host_id = expert.exp_id
                                                INNER JOIN userinfo ON expert.user_id = userinfo.user_id");
                        foreach ($result as $value):
                        ?>
                        <tr class="bg-white align-middle">
                            <td style="text-align: center; vertical-align: middle;"><img src="../assets/seminar/<?php echo $value['s_img'] ?>" alt="img" height="80" width="150"></td>
                            <td style="text-align: center; vertical-align: middle;"><?php echo $value['title']; ?></td>
                           <td style="text-align: center; vertical-align: middle;"><img src="../assets/img/<?php echo $value['img'] ?>" alt="img" height="70" width="70"></td> 
                            <td style="text-align: center; vertical-align: middle;"><?php echo $value['name']; ?></td>
                            <td style="text-align: center; vertical-align: middle;"><?php echo $value['email']; ?></td>
                            <td style="text-align: center; vertical-align: middle;"><?php echo $value['date_time']; ?></td>
                            <!-- <td style="text-align: center; vertical-align: middle;"><?php echo $value['s_link']; ?></td> -->

                            <td style="vertical-align: middle;">
                                <button onclick="window.open('<?php echo $value['s_link']; ?>', '_blank')" class="btn btn-primary"> Join </button>
                            </td>

                            <td style="vertical-align: middle;">
                                <button onclick="window.location.href='seminarmodifier.php?s_id=<?php echo $value['s_id']; ?>'" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                             </td>

                             <td style="vertical-align: middle;">
                             <button onclick="confirmDelete(<?php echo $value['s_id']; ?>)" class="btn btn-danger"><i class="far fa-trash"></i></button>

                             <script>
                              function confirmDelete(s_id) {
                                 if (confirm("Are you sure you want to delete this seminar?")) {
                                      window.location.href = 'seminarremove.php?s_id=' + s_id;
                                      }
                                }
                            </script>                      
                            </td>
                        </tr> 
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- end seminar table -->
        </div>
        <!-- end content page -->
    </main>
    <script src="../js/script.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>
