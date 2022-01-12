<?php
    require_once ('../../mySQL/connectMySQL.php');
    if (isset($_GET['IDCard'])) {
        $w_ID = $_GET['IDCard'];
        $sqldb = "DELETE  FROM users WHERE IDCard = '$w_ID'";
        execute($sqldb);
        header('location: ../interface/admin_student_management.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="../../css/interface/Edit/display_list.css">
        <title>Admin-Student Management</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapse_target">
                <span style="font-size: 20px;" class="navbar-text navbar text-monospace">
                    PTIT-ELECTRONICS
                </span>

                <ul class="navbar-nav">

                    <li style="margin-left: 20px;" class="nav-item dropdown">                  
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="dropdown_target" href="">
                            <i class="fas fa-user" style="margin-right: 5px;"></i>Admin
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown_target">
                            <a class="dropdown-item text-dark" href="../interface/admin_student_management.php">Student Management</a>
                            <a class="dropdown-item text-dark" href="../interface/admin_statistical.php">Statistical</a>
                            <a class="dropdown-item text-dark" href="#">Personal Information</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- container col-lg-12 mt-7 container-fluid bg table-responsive -->
        <div style="margin-top: 50px;" class="container col-lg-6 mt-7 bg table-responsive">
            <table class="table table-lg table-striped  table-hover  table-bordered"> 
                <thead class="thread-defaultinverse">
                    <tr class="table-success" style="text-align: center">
                        <td class="text-nowrap"style="width: 100px">IDCard</td>
                        <td class="text-nowrap">FullName</td>               
                         <td class="text-nowrap" style="width: 50px">Gender</td>
                        <td class="text-nowrap">StudentCode</td>
                        <td class="text-nowrap" style="width: 50px">Option</td>
                    </tr>
                </thead>
                
                    <?php
                        require_once ('../../mySQL/connectMySQL.php');
                        $sql = 'select * from users';
                        $studentList = executeResult($sql);
                        foreach ($studentList as $std) {    
                            echo '<tr class="row_user">
                                <td style="text-align: center">'.$std['IDCard'].'</td>
                                <td class="text-nowrap" >'.$std['FullName'].'</td>     
                                 <td>'.$std['Gender'].'</td>   
                                <td>'.$std['StudentCode'].'</td>
                                <td class="text-nowrap" >
                                    <a href="../interface/admin_edit_student.php?Information&IDCard='.$std['IDCard'].'"><i class="fas fa-bars" style="margin-left: 5px;"></i></a> 
                                    <a href="../interface/admin_edit_student.php?Update&IDCard='.$std['IDCard'].'"><i class="fas fa-edit" style="margin-left: 5px;"></i></a>
                                    <a onclick="return delete_user()" href="../interface/admin_student_management.php?Delete&IDCard='.$std['IDCard'].'"><i class="fas fa-trash" style="margin-right: 5px;"></i></a>                           
                            </tr>';                            
                    }?>
            </table>
        </div>

        <div class="form-field col-lg-12">
            <input class="submit-btn" onclick="window.open('admin_add_student.php', '__self')" type="button" name="" value="ADD Student">                  
        </div>
        <script type="text/javascript">
            function delete_user() {
                return confirm('Bạn có muốn xóa sinh viên này không?');
                  
            }
        </script>
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</html>