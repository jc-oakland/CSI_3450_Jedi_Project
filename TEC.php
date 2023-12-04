<?php

// test_conn.php
// Update $user and $pass varibles according to your credentials
$server = "localhost";
$server = "127.0.0.1";
$user   = "root";
$pass   = "";
$db     = "mysql";
$dbupdated = "tec";

// Create connection with DBMS
// $conn = mysqli_connect($server, $user, $pass, $db);



$conn = mysqli_connect($server, $user, $pass, $db);

$create_db = "CREATE DATABASE IF NOT EXISTS tec";

$result = mysqli_query($conn, $create_db);

mysqli_close($conn);




$conn = mysqli_connect($server, $user, $pass, $dbupdated);

$create_table = "CREATE TABLE IF NOT EXISTS CANDIDATE (
                    CANDIDATE_ID VARCHAR(10) NOT NULL,
                    FIRST_NAME VARCHAR(20) NOT NULL,
                    LAST_NAME VARCHAR(25) NOT NULL
                    )";

$result = mysqli_query($conn, $create_table);

mysqli_close($conn);




$conn = mysqli_connect($server, $user, $pass, $dbupdated);

$create_table = "CREATE TABLE IF NOT EXISTS COURSE (
                    COURSE_ID VARCHAR(10) NOT NULL,
                    COURSE_NAME VARCHAR(50) NOT NULL,
                    QUALIFICATION_ID VARCHAR(11) NOT NULL,
                    FEE VARCHAR(6) NOT NULL
                    )";

$result = mysqli_query($conn, $create_table);

mysqli_close($conn);




$conn = mysqli_connect($server, $user, $pass, $dbupdated);

$create_table = "CREATE TABLE IF NOT EXISTS SESSION (
                    CANDIDATE_ID VARCHAR(10) NOT NULL,
                    SESSION_ID VARCHAR(10) NOT NULL
                    )";

$result = mysqli_query($conn, $create_table);

mysqli_close($conn);




$conn = mysqli_connect($server, $user, $pass, $dbupdated);

$create_table = "CREATE TABLE IF NOT EXISTS ENROLLMENT (
                    CANDIDATE_ID VARCHAR(10) NOT NULL,
                    SESSION_ID VARCHAR(10) NOT NULL
                    )";

$result = mysqli_query($conn, $create_table);

mysqli_close($conn);




$conn = mysqli_connect($server, $user, $pass, $dbupdated);

$create_table = "CREATE TABLE IF NOT EXISTS COMPANY (
                    COMPANY_ID VARCHAR(10) NOT NULL,
                    COMPANY_NAME VARCHAR(20) NOT NULL
                    )";

$result = mysqli_query($conn, $create_table);

mysqli_close($conn);




$conn = mysqli_connect($server, $user, $pass, $dbupdated);

$create_table = "CREATE TABLE IF NOT EXISTS QUALIFICATIONS (
                    QUALIFICATION_ID VARCHAR(11) NOT NULL
                    )";

$result = mysqli_query($conn, $create_table);

mysqli_close($conn);




$conn = mysqli_connect($server, $user, $pass, $dbupdated);

$create_table = "CREATE TABLE IF NOT EXISTS QUALIFICATION_STATUS (
                    QUALIFICATION_ID VARCHAR(11) NOT NULL,
                    CANDIDATE_ID VARCHAR(10) NOT NULL
                    )";

$result = mysqli_query($conn, $create_table);

mysqli_close($conn);




$conn = mysqli_connect($server, $user, $pass, $dbupdated);

$create_table = "CREATE TABLE IF NOT EXISTS PREREQUISITE (
                    COURSE_ID VARCHAR(10) NOT NULL,
                    QUALIFICATION_ID VARCHAR(10) NOT NULL
                    )";

$result = mysqli_query($conn, $create_table);

mysqli_close($conn);



$conn = mysqli_connect($server, $user, $pass, $dbupdated);

$create_table = "CREATE TABLE IF NOT EXISTS OPENING (
                    OPENING_ID VARCHAR(10) NOT NULL,
                    COMPANY_ID VARCHAR(20) NOT NULL,
                    QUALIFICATION_ID VARCHAR(25) NOT NULL,
                    ST_DATE DATE NOT NULL,
                    END_DATE DATE NOT NULL,
                    HOURLY_PAY VARCHAR(9) NOT NULL
                    )";

$result = mysqli_query($conn, $create_table);

mysqli_close($conn);




$conn = mysqli_connect($server, $user, $pass, $dbupdated);

$create_table = "CREATE TABLE IF NOT EXISTS PLACEMENT (
                    PLACEMENT_ID VARCHAR(10) NOT NULL,
                    CANDIDATE_ID VARCHAR(10) NOT NULL,
                    OPENING_ID VARCHAR(10) NOT NULL,
                    HOURS_WORKED INT NOT NULL
                    )";

$result = mysqli_query($conn, $create_table);

mysqli_close($conn);




$conn = mysqli_connect($server, $user, $pass, $dbupdated);

$create_table = "CREATE TABLE IF NOT EXISTS JOB_HISTORY (
                    OPENING_ID VARCHAR(10) NOT NULL,
                    CANDIDATE_ID VARCHAR(10) NOT NULL
                    )";

$result = mysqli_query($conn, $create_table);

mysqli_close($conn);

?>
    
