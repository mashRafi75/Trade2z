<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade2z - blogs</title>
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

            <!-- start blogs table -->
            <div class="student-list-header d-flex justify-content-between align-items-center py-2">
                <div class="title h6 fw-bold">Blogs</div>
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
                            <th style="text-align: center; vertical-align: middle;">Blog ID</th>
                            <th style="text-align: center; vertical-align: middle;">Title</th>
                            <th style="text-align: center; vertical-align: middle;">Writer Image</th>
                            <th style="text-align: center; vertical-align: middle;">Writer Name</th>
                            <th style="text-align: center; vertical-align: middle;">Writer Email</th>
                            <th style="text-align: center; vertical-align: middle;">Date & Time</th>
                            <th> </th>
                            <th class="opacity-0">list</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'connection.php';
                        $result = $con->query("SELECT blogs.*, expert.user_id, userinfo.img, userinfo.name, userinfo.email
                            FROM blogs
                            INNER JOIN expert ON blogs.writer_id = expert.exp_id
                            INNER JOIN userinfo ON expert.user_id = userinfo.user_id");
                        foreach ($result as $value):
                        ?>
                            <tr class="bg-white align-middle">
                                <td style="text-align: center; vertical-align: middle;"><?php echo $value['b_id']; ?></td>
                                <td style="text-align: center; vertical-align: middle;"><?php echo $value['title']; ?></td>
                                <td style="text-align: center; vertical-align: middle;"><img src="../assets/img/<?php echo $value['img'] ?>" alt="img" height="70" width="70"></td>
                                <td style="text-align: center; vertical-align: middle;"><?php echo $value['name']; ?></td>
                                <td style="text-align: center; vertical-align: middle;"><?php echo $value['email']; ?></td>
                                <td style="text-align: center; vertical-align: middle;"><?php echo $value['date_time']; ?></td>
                                <td style="vertical-align: middle;">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#blogContentModal_<?php echo $value['b_id'] ?>"><i class="fas fa-book-reader"></i></button>
                                </td>
                                <td style="vertical-align: middle;">
                                    <button onclick="confirmDelete(<?php echo $value['b_id']; ?>)" class="btn btn-danger"><i class="far fa-trash"></i></button>
                                    <script>
                                        function confirmDelete(b_id) {
                                            if (confirm("Are you sure you want to delete this seminar?")) {
                                                window.location.href = 'blogsremove.php?b_id=' + b_id;
                                            }
                                        }
                                    </script>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="blogContentModal_<?php echo $value['b_id'] ?>" tabindex="-1" aria-labelledby="blogContentModalLabel_<?php echo $value['b_id'] ?>" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="blogContentModalLabel_<?php echo $value['b_id'] ?>"><strong><?php echo $value['title']; ?></strong></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" style="white-space: pre-line;">
                                            <div class="row">
                                                <div class="col">
                                                    <img src="../assets/blogs/<?php echo $value['b_img'] ?>" alt="img" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <?php
                                                    // Include database connection
                                                    include 'connection.php';

                                                    // Sanitize input
                                                    $b_id = $value['b_id'];

                                                    try {
                                                        // Fetch content from the database
                                                        $query = "SELECT content FROM blogs WHERE b_id = ?";
                                                        $stmt = $con->prepare($query);
                                                        $stmt->execute([$b_id]);
                                                        $content = $stmt->fetchColumn();
                                                        echo $content;
                                                    } catch (PDOException $e) {
                                                        echo "Error: " . $e->getMessage();
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end content page -->
    </main>
    <script src="../js/script.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>
