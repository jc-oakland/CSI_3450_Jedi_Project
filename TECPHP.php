<!DOCTYPE html>
<!-- test_get.php -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>TEC - Employee Job History and Qualificationsl</title>
  </head>
  <body style="
      font-family: Arial, Helvetica, sans-serif;
      background-color: #4682b4; /* steelblue */
      color: #f0ffff; /* azure */
    ">
    <div style="
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
      ">
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

    $name = $_POST['value1'];


    $candidateSql = "SELECT * FROM CANDIDATE WHERE FIRST_NAME = '$name'";
    $candidateResult = $conn->query($candidateSql);

    if ($candidateResult->num_rows > 0) {
      // Output candidate information
      $candidateRow = $candidateResult->fetch_assoc();
      $candidateId = $candidateRow["CANDIDATE_ID"];
  
      echo "<h1>Candidate Information</h1>";
      echo "<p>Name: " . $candidateRow["FIRST_NAME"] . " " . $candidateRow["LAST_NAME"] . "</p>";
  
      // SQL query to find job history
      $jobHistorySql = "SELECT * FROM job_history WHERE candidate_id = $candidateId";
      $jobHistoryResult = $conn->query($jobHistorySql);
  
      if ($jobHistoryResult->num_rows > 0) {
          echo "<h2>Job History</h2>";
          while ($jobHistoryRow = $jobHistoryResult->fetch_assoc()) {
              echo "<p>Job ID: " . $jobHistoryRow["OPENING_ID"] . "</p>";
              // Add more fields as needed
          }
      } else {
          echo "<p>No job history found for this candidate.</p>";
      }


    $qualificationsSql = "SELECT qualification_id FROM qualification_status WHERE candidate_id = $candidateId";
    $qualificationsResult = $conn->query($qualificationsSql);

    if ($qualificationsResult->num_rows > 0) {
        echo "<h2>Qualifications</h2>";
        while ($qualificationsRow = $qualificationsResult->fetch_assoc()) {
            echo "<p>Qualification: " . $qualificationsRow["qualification_id"] . "</p>";
            // Add more fields as needed
        }
    } else {
        echo "<p>No qualifications found for this candidate.</p>";
    }

} else {
    echo "Candidate not found";
}

mysqli_close($conn);
    ?>
    </div>
  </body>
</html>