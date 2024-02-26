<!DOCTYPE html>
<html lang="en">
    
    <head>
       <title>Sample school district</title> 
    </head>

    <body>
        <h1>Welcome to Sample School district</h1>
    
        <h2>student List</h2>

        <p>

            filter by last name starting with
            <a href ="student-list.php?">All</a>

<?php
for ($i=0; $i<26; $i++)
{
    $letter=chr($i+ord("A"));
   echo "<a href ='student-list.php?last_name=$letter'>$letter</a> ";
}
?>
        <br>
        filter by first name contain
        <form action="student-list.php">
        <input type='text' name="first_name"/>
        <input type='submit' value="Filter"/>
        </form>



        </p>

        <table border="1">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>YOG</th>
            </tr>
<?php

$servername="localhost";
$username="root";
$password= "Indians2016!";
$dbname="sis";
//connect to check if successful
$connection= new mysqli($servername, $username, $password, $dbname);
if($connection->connect_error)
{
    die("connection failed". $connection->connect_error);
}
extract($_REQUEST);
//access to $last_name and $first_name variable


$sql = "SELECT stu_first_name, stu_last_name,stu_yog FROM students ";

if(isset($first_name))
{
    $sql .= "WHERE stu_first_name LIKE '%$first_name%' ";

}

if(isset($last_name))
{
$sql .= "WHERE stu_last_name LIKE '$last_name%' ";
}

$sql .= "ORDER BY stu_last_name, stu_first_name ";

//echo $sql;

$result=$connection->query($sql);
while($row=$result->fetch_assoc())
{
    
    echo"<tr>";
    echo"<td>".$row["stu_first_name"]."</td>";
    echo"<td>".$row["stu_last_name"]."</td>";
    echo"<td>".$row["stu_yog"]."</td>";
    echo"</tr>";

}
?>
        </table>
        
    

    </body>
      
      </html>