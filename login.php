<html>
    <head>
        <title>User Login</title>
</head>

<body>
<table>
<tr>
<th>Id</th>
<th>First name</th>
<th>Last name</th>
<th>Contact Number </th>
<th>Email</th>
<th>Time</th>
</tr>

<?php
    $conn = new mysqli('localhost', 'root', '3103', 'phpdb');
    if(!$conn)
    {
        die("Connection Failed: " .mysqli_connect_error());
    }

    if(isset($_POST["submit"]))
    {
        $email = mysqli_real_escape_string($conn, $_POST['emailid']);  
        $password = mysqli_real_escape_string($conn, $_POST['password']); 

        $sql = "SELECT * FROM register WHERE email = '$email' and passord = '$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["userid"]. "</td><td>" . $row["fname"] . "</td><td>"
            . $row["lname"]. "</td><td>" . $row["contact"]. "</td><td>" . $row["email"]. "</td><td>" . $row["timestamp"] . "</td></tr>" ;
            }
            echo "</table>";
            } 
            else { 
                echo "0 results"; 
            }

    $conn->close();
?>
