<?php
  $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
  $query = "SELECT * FROM film  ORDER BY film_id ";
  $result = mysqli_query($link, $query);
  //print_r($result);  
  //$row = mysqli_fetch_array($result);
  //print_r($row);
  $emp_info = '';
  while($row = mysqli_fetch_array($result)) {
    $emp_info .= '<tr>';
    $emp_info .= '<td>'.$row['film_id'].'</td>';
    $emp_info .= '<td>'.$row['title'].'</td>';
    $emp_info .= '<td>'.$row['description'].'</td>';
    $emp_info .= '<td>'.$row['release_year'].'</td>';
    $emp_info .= '<td>'.$row['rental_duration'].'</td>';
    $emp_info .= '<td>'.$row['rental_rate'].'</td>';  
    $emp_info .= '<td>'.$row['length'].'</td>';
    $emp_info .= '<td>'.$row['replacement_cost'].'</td>';
    $emp_info .= '<td>'.$row['special_features'].'</td>';  
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
    <h2><a href="index.php">영화 대여 시스템</a> | 영화 정보 조회</h2>
    <table border="1">
        <tr>
            <th>film_id</th>
            <th>title</th>
            <th>description</th>
            <th>release_year</th>
            <th>rental_duration</th>
            <th>rental_rate</th>
            <th>length</th>
            <th>replacement_cost</th>
            <th>special_features</th>
            
        </tr>
        <?= $emp_info ?>
    </table>
</body>
</html>