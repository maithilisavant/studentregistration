<?php
    //$servername = "localhost";
    //$username = "root";
    //$password = "3103";
    //$dbname = "phpdb";

    $conn = new mysqli('localhost', 'root', '3103', 'phpdb');
        if(mysqli_connect_error())
        {
            die("Connection Failed: " .mysqli_connect_error());
        }

        if(isset($_POST["submit"]))
        {
            //student details
            $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
            $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
            $cno = mysqli_real_escape_string($conn, $_POST["cno"]);
            $emailid = mysqli_real_escape_string($conn, $_POST["emailid"]);
            $password = mysqli_real_escape_string($conn, $_POST["password"]);

            $sql = "INSERT INTO register(fname, lname, email, contact, passord) values('$fname', '$lname', '$emailid', '$cno', '$password')";
            
            if($conn->query($sql) === TRUE){
                echo " Registered Successfully";
            ?>
            
                <html>
                <a href="student_registration.html">Login</a>
                </html>

            <?php
            }
            else
            {
                echo "Error: ".$sql. "<br>" .$conn->error;
            }
        }
        $conn->close();
?>
