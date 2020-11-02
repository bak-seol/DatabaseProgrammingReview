<?php
  $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
  $query = "SELECT * FROM customer  ORDER BY customer_id DESC";
  $result = mysqli_query($link, $query);
  //print_r($result);  
  //$row = mysqli_fetch_array($result);
  //print_r($row);
  $emp_info = '';
  while($row = mysqli_fetch_array($result)) {
    $emp_info .= '<tr>';
    $emp_info .= '<td>'.$row['customer_id'].'</td>';
    $emp_info .= '<td>'.$row['first_name'].'</td>';
    $emp_info .= '<td>'.$row['last_name'].'</td>';
    $emp_info .= '<td>'.$row['store_id'].'</td>';
    $emp_info .= '<td>'.$row['email'].'</td>';
    $emp_info .= '<td>'.$row['active'].'</td>';  
    $emp_info .= '<td>'.$row['last_update'].'</td>';

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
    <h2><a href="index.php">영화 대여 시스템</a> | 고객 정보 조회</h2>
    <table border="1">
        <tr>
            <th>customer_id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>store_id</th>
            <th>email</th>
            <th>active</th>
            <th>last_update</th>
        </tr>
        <?= $emp_info ?>
    </table>
</body>
</html>