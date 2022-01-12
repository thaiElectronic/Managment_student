<?php
    require_once ('../../mySQL/connectMySQL.php');
    if (isset($_GET['IDCard'])) {
        $w_ID = $_GET['IDCard'];
        $sqldb = "DELETE  FROM users WHERE IDCard = '$w_ID'";
        execute($sqldb);
        header('location: ../interface/admin_student_management.php');
    }
?>