<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade2z - users</title>
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
          
        
        <!-- start userinfo table -->
            <div class="student-list-header d-flex justify-content-between align-items-center py-2">
                <div class="title h6 fw-bold">Users list</div>
                <div class="btn-add d-flex gap-3 align-items-center">
                    <div class="short">
                        <i class="far fa-sort"></i>
                    </div>
                    <?php include 'userpopupadd.php'; ?>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table student_list table-borderless">
                    <thead>
                        <tr class="align-middle">
                            <th>User ID</th>
                            <th class="opacity-0">vide</th>
                            <th>Name</th>
                            <th>Email</th>  
                            <th>Country</th>
                            <th>Region</th>
                            <th class="opacity-0">list</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          include 'connection.php';
                          $result = $con -> query("SELECT * FROM userinfo");
                          foreach($result as $value):
                        ?>
                        <tr class="bg-white align-middle">
                            <td><?php echo $value['user_id'] ?></td>
                            <td><img src="../assets/img/<?php echo $value['img'] ?>" alt="img" height="50" with="50"></td>
                                <td><?php echo $value['name'] ?></td>
                                <td><?php echo $value['email'] ?></td>
                                <td><?php echo $value['country'] ?></td>
                                <td><?php echo $value['region'] ?></td>

                              <!--   <td class="d-md-flex gap-3 mt-3">
                                  <a href="usermodifier.php?user_id=<?php echo $value['user_id']?>"><i class="fas fa-edit"></i></a> 
                                
                                 <a href="userremove.php?user_id=<?php echo $value['user_id']?>" onclick="return confirmDelete();"><i class="far fa-trash"></i></a>
                                 </td>

                                 <script>
                                 function confirmDelete() {
                                 return confirm("Do you want to delete this user?");
                                  }
                                 </script>
 
                                  
                            </td> -->
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