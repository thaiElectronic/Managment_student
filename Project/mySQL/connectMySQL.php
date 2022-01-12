<?php 
    const HOST      = "localhost";
    const USERNAME  = "root";
    const PASSWORD  = "";
    const DATABASE  = "qtdatabase";
    const TABLE_SYSTEM = "users";
  
        $connect = new mysqli(HOST,USERNAME,PASSWORD,DATABASE);
        mysqli_set_charset($connect,"utf8");

        if($connect->connect_error){
            var_dump($connect->connect_error);
            die();
        }
    //    else{
    //        echo "successfull.";
    //    }
    /*
     * insert, update, delete -> sử dụng function
     */
        function execute($sql){
            // create connect to database
            $connect = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
            
            mysqli_set_charset($connect,"utf8");

            if($connect->connect_error){
                var_dump($connect->connect_error);
                die();
            }
            
            // query
            mysqli_query($connect, $sql);
            
            // close connect
            $connect->close(); 
        }
        
        function executeResult($sql){
            // create connect to database
            $connect = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
            
            // query
            $resultset = mysqli_query($connect, $sql);   
            
            $data = array();
            while ($row = mysqli_fetch_array($resultset,1)){
                $data[] = $row;
            }
                    
            // close connect
            $connect->close();
            
            return $data;
        }
        
        function getMember_id($id){
            global $connect;
            $connect = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
            $sql = "SELECT *FROM users WHERE IDCard = '$id'";
            // query         
            $query = mysqli_query($connect, $sql);
            $connect->close();
            return mysqli_fetch_assoc($query);
        }
   
?>

