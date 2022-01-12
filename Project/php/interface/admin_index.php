

<?php

    require_once ('../../mySQL/connectMySQL.php');
    
    // create connect to database
    $connect = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);

    mysqli_set_charset($connect,"utf8");

    if($connect->connect_error){
        var_dump($connect->connect_error);
        die();
    }    
    
    if(!empty($_POST)){
        $account_user="";
        $password_user="";
        if(isset($_POST['user']) && isset($_POST['pwd'])){
            $account_user = $_POST['user']; //mã sinh viên
            $password_user =$_POST['pwd'];// mã thẻ
        } 
        //login_admin
        if(($account_user == "admin") && ($password_user=="lab@123")){ 

            header("location: ../interface/admin_student_management.php");
        }
        else{  // login-user
            $sql = "SELECT * FROM users WHERE IDCard = '".$account_user. "' AND StudentCode = '".$password_user."'";
            $resul = mysqli_query($connect, $sql);   

            $data = array();
            while ($row = mysqli_fetch_array($resul,1)){
                $data[] = $row;
            }
           // var_dump($data);    
            if($data!=NULL && count($data)>0){
                header("location:../interface/admin_student_management.php");
            }
//            else{
//                echo "ERROR";
//            }
        }
    }
?>

<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/interface/login/login_user.css">
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
                <a class="nav-link" href="../interface/admin_index.php">
                    <i class="fas fa-user" style="margin-right: 5px;"></i>Admin
                    <span class="caret"></span>
                </a>
                <li class="nav-item">
                    <a class="nav-link" href="../interface/admin_index.php">User</a>
                </li>
            </ul>
        </div>
    </nav>

    <section style="width: 300px; margin-top: 100px;" class="container-fluid bg">
        <section class="row justify-content-between">
            <section class="col-12 col-sm-6 col-md-12">
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="input">Account:</label>
                        <input type="input" class="form-control" placeholder="ID Card" name="user">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" placeholder="Student Code" name="pwd">
                    </div>
                    <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Remember me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </section>
        </section>
    </section>

</body>
</html>

