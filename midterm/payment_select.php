<?php
  $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
  $query = "SELECT * FROM payment  ORDER BY payment_id DESC";
  $result = mysqli_query($link, $query);
  //print_r($result);  
  //$row = mysqli_fetch_array($result);
  //print_r($row);
  $emp_info = '';
  while($row = mysqli_fetch_array($result)) {
    $emp_info .= '<tr>';
    $emp_info .= '<td>'.$row['payment_id'].'</td>';
    $emp_info .= '<td>'.$row['customer_id'].'</td>';
    $emp_info .= '<td>'.$row['staff_id'].'</td>';
    $emp_info .= '<td>'.$row['amount'].'</td>';
    $emp_info .= '<td>'.$row['payment_date'].'</td>';
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
    <h2><a href="index.php">영화 대여 시스템</a> | payment 정보 전체 조회</h2>
    <table border="1">
        <tr>
            <th>payment_id</th>
            <th>customer_id</th>
            <th>staff_id</th>
            <th>amount</th>
            <th>payment_date</th>
        </tr>
        <?= $emp_info ?>
    </table>
</body>
</html>