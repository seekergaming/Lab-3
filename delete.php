<?php
include "db_conn.php";

if(isset($_GET["id"])){//check id parameter is available inside url
    $id = $_GET["id"];//get the parameter id value
    $sql = "DELETE FROM students WHERE id=$id";//SQL query to select user data based on id
    $result = mysqli_query($conn, $sql);//fetch the result set into an associative array

    if($result){
        echo "<script>alert('User Deleted Successfully'); window.location='view.php'</script>";

    }else{
        echo "<script>alert('User Not deleted'); window.location='view.php'</script>";
    }

}
?>