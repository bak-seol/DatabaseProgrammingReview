<?php
  $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
  $query = "SELECT * FROM staff  ORDER BY staff_id DESC";
  $result = mysqli_query($link, $query);
  //print_r($result);  
  //$row = mysqli_fetch_array($result);
  //print_r($row);
  $emp_info = '';
  while($row = mysqli_fetch_array($result)) {
    $emp_info .= '<tr>';
    $emp_info .= '<td>'.$row['staff_id'].'</td>';
    $emp_info .= '<td>'.$row['first_name'].'</td>';
    $emp_info .= '<td>'.$row['last_name'].'</td>';
    $emp_info .= '<td>'.$row['store_id'].'</td>';
    $emp_info .= '<td>'.$row['email'].'</td>';
    $emp_info .= '<td>'.$row['username'].'</td>';  
    $emp_info .= '<td>'.$row['password'].'</td>';
    $emp_info .= '</tr>';
  }  
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>영화 대여 시스템</title>
</head>
<body>
    <h2><a href="index.php">영화 대여 시스템</a> | 직원 정보 조회</h2>
    <table border="1">
        <tr>
            <th>staff_id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>store_id</th>
            <th>email</th>
            <th>username</th>
            <th>password</th>
        </tr>
        <?= $emp_info ?>
    </table>
</body>
</html>