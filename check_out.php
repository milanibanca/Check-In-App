<?php      
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select * from user where email = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        $result -> free_result(); 

       
        
        if($count == 1)
        {
            if($result = $con -> query($sql))
            {
                while ($row = $result -> fetch_row())
                {
                    $name = $row[2];
                    $surname = $row[3];
                }
                $result -> free_result();

            }
            
            $query = "UPDATE attendance
            SET attendance.checkOut = NOW()
            WHERE DATE(attendance.checkIn) = DATE(CURRENT_DATE())
            AND attendance.user_email = '$username'";

            $x =  mysqli_query($con,$query);
            echo "<h1><center> Check Out Successful. <br> Good afternoon:  $name $surname </center></h1>"; 
             
         }
        else
         {          
             echo "<script>alert('Check in unsuccessful please enter correct username and password');
                 window.location.href='index.html';</script>";  
        }   
        $con -> close();
?>  