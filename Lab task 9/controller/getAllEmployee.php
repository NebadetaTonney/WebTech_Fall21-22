



<?php

    $con = mysqli_connect('localhost','root','','khaboi');
    if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con,"ajax_demo");
    $sql="SELECT * FROM `employee_info` ";
    $result = mysqli_query($con,$sql);



    echo '<table align="center" border="3px" style="padding: 15px;">
    <tr>
    <th>Name</th>
    <th>Email</th>
    <th>User Name</th>
    <th>Password</th>
    <th>DOB</th>
    <th>Gender</th>
    </tr>';

    while($row = mysqli_fetch_array($result)) {
        //echo "succes";
    echo "<tr>";

        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['User_Name'] . "</td>";
        echo "<td>" . $row['Password'] . "</td>";
        echo "<td>" . $row['Dob'] . "</td>";
        echo "<td>" . $row['Gender'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";


    mysqli_close($con);

  ?>
  