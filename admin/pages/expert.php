<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade2z - expert</title>
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
        
        <!--  start expert table  -->
            <div class="student-list-header d-flex justify-content-between align-items-center py-2">
                <div class="title h6 fw-bold">Expert list</div>
                <div class="btn-add d-flex gap-3 align-items-center">
                    <div class="short">
                        <i class="far fa-sort"></i>
                    </div>
                    <?php include 'expertpopupadd.php'; ?>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table student_list table-borderless">
                    <thead>
                        <tr class="align-middle">
                            <th style="text-align: center; vertical-align: middle;">Expert ID</th>
                            <th class="opacity-0">vide</th>
                            <th style="text-align: center; vertical-align: middle;">Expert Name</th>
                            <th style="text-align: center; vertical-align: middle;">Email</th>
                            <th style="text-align: center; vertical-align: middle;">Total Blogs</th>  
                            <th style="text-align: center; vertical-align: middle;">Personal Session</th>
                            <th style="text-align: center; vertical-align: middle;">Seminar</th>
                           <th style="text-align: center; vertical-align: middle;">Payment (Hour)</th>
                            <th class="opacity-0">list</th>
                        </tr>
                    </thead>
                    <tbody>
     <?php
                            include 'connection.php';

                            
                            $result = $con->query("SELECT * FROM expert");
                            foreach ($result as $value):
                        ?>
                        <tr class="bg-white align-middle">
                            <td><?php echo $value['exp_id']; ?></td>
                            <?php
                                $stmt = $con->prepare("SELECT userinfo.img, userinfo.name, userinfo.email, 
                            COUNT(DISTINCT blogs.b_id) AS total_blogs, 
                            COUNT(DISTINCT es.s_id) AS total_sessions, 
                            COUNT(DISTINCT s.s_id) AS total_seminars, 
                            expert.exp_payment 
                        FROM expert 
                        INNER JOIN userinfo ON expert.user_id = userinfo.user_id 
                        LEFT JOIN blogs ON expert.exp_id = blogs.writer_id
                        LEFT JOIN expert_sessions es ON expert.exp_id = es.exp_id 
                        LEFT JOIN seminar s ON expert.exp_id = s.host_id 
                        WHERE expert.exp_id = :exp_id");
                       $stmt->bindParam(':exp_id', $value['exp_id']);
                       $stmt->execute();
                       $user_info = $stmt->fetch(PDO::FETCH_ASSOC);

                                // Check if user info exists
                                if ($user_info) {
                                    echo '<td><img src="../assets/img/' . $user_info['img'] . '" alt="img" height="50" width="50"></td>';
                                    echo '<td style="text-align: center; vertical-align: middle;">' . $user_info['name'] . '</td>';
                                    echo '<td style="text-align: center; vertical-align: middle;">' . $user_info['email'] . '</td>';
                                    echo '<td style="text-align: center; vertical-align: middle;">' . $user_info['total_blogs'] . '</td>'; 
                                    echo '<td style="text-align: center; vertical-align: middle;">' . $user_info['total_sessions'] . '</td>'; 
                                    echo '<td style="text-align: center; vertical-align: middle;">' . $user_info['total_seminars'] . '</td>'; 
                                    echo '<td style="text-align: center; vertical-align: middle;">' . $user_info['exp_payment'] . '</td>'; 
                                } else {
                                    echo '<td colspan="6">User info not found</td>';
                                }
                            ?>

                                <td style="vertical-align: middle;">
                                <button onclick="window.location.href='expertmodifier.php?exp_id=<?php echo $value['exp_id']; ?>'" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                             </td>

                             <td style="vertical-align: middle;">
                             <button onclick="confirmDelete(<?php echo $value['exp_id']; ?>)" class="btn btn-danger"><i class="far fa-trash"></i></button>

                             <script>
                              function confirmDelete(exp_id) {
                                 if (confirm("Are you sure you want to delete this Expert?")) {
                                      window.location.href = 'expertremove.php?exp_id=' + exp_id;
                                      }
                                }
                            </script>                      
                            </td>

  <!--  <td class="d-md-flex gap-3 mt-3">
        <a href="expertmodifier.php?exp_id=<?php echo $value['exp_id'] ?>"><i class="fas fa-edit"></i></a>
        <a href="expertremove.php?exp_id=<?php echo $value['exp_id'] ?>" onclick="return confirmDelete();"><i class="far fa-trash"></i></a>
    </td>

    <script>
        function confirmDelete() {
            return confirm("Do you want to delete this user?");
        }
    </script> -->
</tr>

    <?php endforeach; ?>
</tbody>

                </table>
            </div>

            <!-- end student list table -->
        </div>
        <!-- end content page -->

    </main>
    <script src="../js/script.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>