<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="./table_student.css">
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
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="dropdown_target" href="#">
                        <i class="fas fa-user" style="margin-right: 5px;"></i>USER - MENU
                        <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdown_target">
                        <a class="dropdown-item text-dark" href="../Edit/table_student.html">Student Management</a>
                        <a class="dropdown-item text-dark" href="#">Statistical</a>
                        <a class="dropdown-item text-dark" href="#">Personal Information</a>
                         
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container m-md-auto mt-">
        <table class="table table-striped table-bordered" style="width: 100%; margin: 20px auto; "> 
            <tr class="table-primary">
                <td>No</td>
                <td>FullName</td>               
                <td>StudentCode</td>
                <td>Time</td>
            </tr>
            <?php
                require_once ('../../mySQL/connectMySQL.php');
                $sql = 'select * from TABLE_SYSTEM';
                $studentList= executeResult($sql);
                foreach ($studentList as $std){
                    echo '<tr>
                            <td>'.$std['ID'].'</td>
                            <td>'.$std['FULL_NAME'].'</td>                              
                            <td>'.$std['STUDENT_CODE'].'</td>
                            <td>'.$std['TIME'].'</td>
                        </tr>';
                }
            ?>
        </table>
    </div>
</body>
</html>