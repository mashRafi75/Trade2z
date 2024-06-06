<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade2z - Currency</title>
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
          
        
            <!-- start crypto_info table -->
            <div class="student-list-header d-flex justify-content-between align-items-center py-2">
                <div class="title h6 fw-bold">Crypto list</div>
                <div class="btn-add d-flex gap-3 align-items-center">
                    <div class="short">
                        <i class="far fa-sort"></i>
                    </div>
                    <?php include 'cryptopopupadd.php'; ?>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table student_list table-borderless"> 
                    <thead>
                        <tr class="align-middle">
                            <th>Currency ID</th>
                            <th>Image</th>  
                            <th>Name</th>
                            <th>Value</th>
                            <th>Graph</th>
                            <th class="opacity-0">list</th>
                        </tr>
                        </thead>
                        <tbody> 
                        <?php include 'connection.php'; 
                                $requete = "SELECT * FROM crypto_info";
                                $result = $con -> query($requete);

                                foreach($result as $value):
                            ?>
                             <tr class="bg-white align-middle">
        <td><?php echo $value['c_id'] ?></td>
        <td><img src="../assets/crypto/<?php echo $value['c_img'] ?>" alt="img" height="50" with="50"></td>
        <td><?php echo $value['c_name'] ?></td>
        <td><?php echo $value['c_price'] ?></td>
        <td><?php echo $value['graph'] ?></td>
        <td style="vertical-align: middle;">
            <button onclick="window.location.href='cryptomodifier.php?c_id=<?php echo $value['c_id']; ?>'" class="btn btn-primary"><i class="fas fa-edit"></i></button>
            <button onclick="confirmDelete(<?php echo $value['c_id']; ?>)" class="btn btn-danger"><i class="far fa-trash"></i></button>
            <script>
                function confirmDelete(c_id) {
                    if (confirm("Are you sure you want to delete this Crypto?")) {
                        window.location.href = 'cryptoremove.php?c_id=' + c_id;
                    }
                }
            </script>                      
        </td>
    
    

                          <!--      <td class="d-md-flex gap-3 mt-3">
                                  <a href="cryptomodifier.php?c_id=<?php echo $value['c_id']?>"><i class="fas fa-edit"></i></a>
                                
                                 <a href="cryptoremove.php?c_id=<?php echo $value['c_id']?>" onclick="return confirmDelete();"><i class="far fa-trash"></i></a>
                                 </td>
                                 <script>
                                 function confirmDelete() {
                                 return confirm("Do you want to delete this Currency?");
                                  }
                                 </script>
                            </td> -->
                        </tr>  
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            
            </div>
               
        </div>
        <!-- end content page -->
    </main>

    <script src="../js/script.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>