
 
<?php
    require_once ('../../mySQL/connectMySQL.php');
    if(isset($_GET['IDCard'])){
        $w_ID = $_GET['IDCard'];
        $sqldb = "SELECT * FROM users";
        $number_user = executeResult($sqldb);
        $row = getMember_id($w_ID);        
    }
    else{
        echo "error";
        header('location: ../interface/admin_student_management.php');
    }
    
    if(!empty($_POST)){
        
//        if(isset($_POST['idcard'])){
//            $w_idcard = $_POST['idcard'];
//        } 
        if(isset($_POST['fullname'])){
            $w_fullname = $_POST['fullname'];
        }
        if(isset($_POST['gender'])){
            $w_gender = $_POST['gender'];
        }
        if(isset($_POST['birth'])){
            $w_birth = $_POST['birth'];
        }
        if(isset($_POST['stdcode'])){
            $w_stdcode = $_POST['stdcode'];
        }
        if(isset($_POST['class'])){
            $w_class = $_POST['class'];
        }
        if(isset($_POST['depart'])){
            $w_depart = $_POST['depart'];
        }
        if(isset($_POST['univer'])){
            $w_univer = $_POST['univer'];
        }
        if(isset($_POST['phone'])){
            $w_phone = $_POST['phone'];
        }
        if(isset($_POST['email'])){
            $w_email = $_POST['email'];
        }
        if(isset($_POST['address'])){
            $w_address = $_POST['address'];
        }
        if(isset($_POST['posi'])){
            $w_posi = $_POST['posi'];
        }

        $w_fullname= str_replace('\'','\\\'',$w_fullname);
        $w_stdcode= str_replace('\'','\\\'',$w_stdcode);
        //$w_idcard= str_replace('\'','\\\'',$w_idcard);
        $w_gender= str_replace('\'','\\\'',$w_gender);
        $w_email= str_replace('\'','\\\'',$w_email);
        $w_phone= str_replace('\'','\\\'',$w_phone);
        $w_univer= str_replace('\'','\\\'',$w_univer);
        $w_address= str_replace('\'','\\\'',$w_address);
        
        //require_once ('../../mySQL/connectMySQL.php');
        //$sql = "INSERT INTO list_student(FULL_NAME,STUDENT_CODE,ID_CARD,GENDER,DATE_OF_BIRTH,DEPARTMENT,UNIVERSITY,PHONE_NUMBER,EMAIL,ADDRESS) VALUE('$w_fullname', '$w_stdcode', '$w_idcard', '$w_gender', '$w_birth','$w_depart','$w_univer', '$w_phone', '$w_email', '$w_address')";
        //$sql = "INSERT INTO list_student(FULL_NAME,STUDENT_CODE,ID_CARD,GENDER,DATE_OF_BIRTH,DEPARTMENT,UNIVERSITY,PHONE_NUMBER,EMAIL,ADDRESS) VALUES('".$w_fullname."', '".$w_stdcode."', '".$w_idcard."', '".$w_gender."', '".$w_birth."', '".$w_depart."','".$w_univer."','".$w_phone."','".$w_email."','".$w_address."')";
        $sql ="UPDATE users SET FullName = '".$w_fullname."',Gender = '".$w_gender."',DateOfBirth = '".$w_birth."',
                StudentCode = '".$w_stdcode."',Class = '".$w_class."',Department = '".$w_depart."',University = '".$w_univer."',
                PhoneNumber = '".$w_phone."',Email = '".$w_email."',Address = '".$w_address."',Position = '".$w_posi."' WHERE IDCard = '".$w_ID."'";
        execute($sql);      
        header('location: ../interface/admin_student_management.php');
    }
//    if(($w_fullname != "") && ($w_idcard != "") && ($w_stdcode != "") && ($w_email != "") && ($w_phone != "") && ($w_birth != "") && ($w_depart != "") && ($w_univer != "") ){
//        header('location: ../interface/admin_display_list.php');
//    }
    
   //  header('location: ../interface/admin_display_list.php');
?>




<html lang="en">
<head>
  <title>Admin-Add Student</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <script src="https://ajax.googleapis.com/ajaxs/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link href="http://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../css/interface/Edit/add_student.css">
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
                
                <li style="margin-left: 20px;" class="nav-item dropdown">                  
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="dropdown_target" href="../interface/admin_student_management.php">
                        <i class="fas fa-user" style="margin-right: 5px;"></i>Admin
                        <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdown_target">
                        <a class="dropdown-item text-dark" href="../interface/admin_student_management.php">Student Management</a>
                        <a class="dropdown-item text-dark" href="#">Statistical</a>
                        <a class="dropdown-item text-dark" href="#">Personal Information</a>
                         
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <section class="get_in_touch">
        <h1 class="title">UPDATE STUDENT</h1>
        <div class="container">
            <form action="" method="POST" class="contact-form row">
                
                <div class="form-field col-lg-6">
                    <input id="idcard" class="input-text" type="text" name="idcard" value="<?php echo $row['IDCard']; ?>">
                    <label for="idcard" class="label">ID Card</label>
                </div>
                
                <div class="form-field col-lg-6">
                    <input id="name" class="input-text" type="text"  name="fullname" value="<?php echo $row['FullName']; ?>">
                    <label for="name" class="label">Full Name</label>
                </div>
                
                <div class="form-field col-lg-6">
                    <input id="gender" class="input-text" type="text" name="gender" value="<?php echo $row['Gender']; ?>">
                    <label for="gender" class="label">Gender</label>
                </div>

                <div class="form-field col-lg-6">
                    <input id="birthday" class="input-text" type="text" name="birth" value="<?php echo $row['DateOfBirth']; ?>">
                    <label for="birthday" class="label">Date Of Birth</label>
                </div> 
 
                <div class="form-field col-lg-6">
                    <input id="studentcode" class="input-text" type="text" name="stdcode" value="<?php echo $row['StudentCode']; ?>">
                    <label for="studentcode" class="label">Student Code</label>
                </div>

                <div class="form-field col-lg-6">
                    <input id="class" class="input-text" type="text" name="class" value="<?php echo $row['Class']; ?>">
                    <label for="class" class="label">Class</label>
                </div>
             
                <div class="form-field col-lg-6">
                    <input id="department" class="input-text" type="text" name="depart" value="<?php echo $row['Department']; ?>">
                    <label for="department" class="label">Department</label>
                </div>

                <div class="form-field col-lg-6">
                    <input id="university" class="input-text" type="text" name="univer" value="<?php echo $row['University']; ?>">
                    <label for="university" class="label">University</label>
                </div>

                <div class="form-field col-lg-6">
                    <input id="phone" class="input-text" type="text" name="phone" value="<?php echo $row['PhoneNumber']; ?>">
                    <label for="phone" class="label">Phone Number</label>
                </div>

                <div class="form-field col-lg-6">
                    <input id="email" class="input-text" type="email" name="email" value="<?php echo $row['Email']; ?>">
                    <label for="email" class="label">Email</label>
                </div>

                <div class="form-field col-lg-6">
                    <input id="address" class="input-text" type="text" name="address" value="<?php echo $row['Address']; ?>">
                    <label for="address" class="label">Address</label>
                </div>
                
                <div class="form-field col-lg-6">
                    <input id="posi" class="input-text" type="text" name="posi" value="<?php echo $row['Position']; ?>">
                    <label for="posi" class="label">Position</label>
                </div>
                
                <div class="form-field col-lg-12">
                    <button class="submit-btn" onclick="update()" >UPDATE</button>          
                </div>         
            </form>
        </div>
    </section>
    <script type="text/javascript">

        function update(){

//                                header('location: ../interface/admin_display_list.php');
            alert('Update Successfull!');
            header('location: ../interface/admin_student_management.php');
        }

    }
</script>
            
    </script>
</body>
</html>
