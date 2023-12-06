<!DOCTYPE html>
<!-- test_get.php -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>A PHP Script for Testing the GET Protocol</title>
  </head>
  <body>
    <?php
    $server = "localhost";
    $server = "127.0.0.1";
    $user   = "root";
    $pass   = "";
    $db     = "tec";
    
    // Create connection with DBMS
    $conn = mysqli_connect($server, $user, $pass, $db);
    
    // Check whether connection succeeded
    if(mysqli_connect_errno()){
      echo "Failed to connect to Database: " . mysqli_connect_errno();    
    }

    echo "<h2>You sent me the values $_GET[value1]";
    echo "</h2>";

    // Create variable for MSCT_NAME column and set it as $_GET['value1']
    $candidateName = mysqli_real_escape_string($conn, $_GET['value1']);

    // Send the SQL query to the database
    $result = mysqli_query($conn, $query);

    // Second SQL query to pull the data from the database
    $query = "SELECT JH.START_DATE AS 'Start Date', JH.END_DATE AS 'End Date', C.FIRST_NAME AS 'First Name', C.LAST_NAME AS 'Last Name', Q.QUALIFICATION_DESC AS 'Qualification'
    FROM JOB_HISTORY AS JH
    LEFT JOIN CANDIDATE AS C ON JH.CANDIDATE_ID = C.CANDIDATE_ID
    LEFT JOIN QUALIFICATION_STATUS AS QS ON QS.CANDIDATE_ID = JH.CANDIDATE_ID
    LEFT JOIN QUALIFICATIONS AS Q ON Q.QUALIFICATION_ID = QS.QUALIFICATION_ID
    WHERE '%$candidateName%' ;";

    // Sends the result of the SQL query to $result variable
    $result = $conn->query($query);

    // Displays the result of the SQL query to the webpage if the table contains data
    // Displays "0 results" if the table is empty
    if ($result->num_rows > 0) {
      // Output data of each row
      while($row = $result->fetch_assoc()) {
        echo "----------------------------------------------------------------------------------------------<br>";
        echo "| Start Date: " . $row["START_DATE"]. " | End Date: " . $row["END_DATE"]. " | First Name: " . $row["FIRST_NAME"]. " | Last Name: " . 
        $row["LAST_NAME"]. " | Qualification: " . $row["QUALIFICATION_DESC"]. " |<br>";
        echo "----------------------------------------------------------------------------------------------<br>";
      }
    } else {
      echo "0 results";
    }
    ?>
  </body>
</html>
