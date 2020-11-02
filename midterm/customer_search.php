<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
    if(isset($_GET['customer_id'])){
        $filtered_id = mysqli_real_escape_string($link, $_GET['customer_id']);
    } else {
        $filtered_id = mysqli_real_escape_string($link, $_POST['customer_id']);        
    }

    $query = "SELECT customer_id FROM customer ORDER BY customer_id DESC LIMIT 1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $next_customer_num = strval((int)$row['customer_id'] + 1);

    if((int)$filtered_id >= (int)$next_customer_num) {
        echo '해당하는 고객이 없습니다. 고객번호를 다시 입력해 주십시오. <br><a href="index.php">돌아가기</a>' ;
        exit();
    }
    else{
        $query = " SELECT * FROM customer WHERE customer_id='{$filtered_id}' "; 
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        //print_r($row);}
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>영화 대여 시스템</title>
</head>
<body>
<h2><a href="index.php">영화 대여 시스템</a> | 고객 정보 검색</h2>
    <form action="customer_search_process.php" method="POST">
        <label>customer_id:</label>
        <input type="text" name="customer_id" value="<?=$row['customer_id']?>" placeholder="customer_id" readonly><br>
        <label>first_name:</label>
        <input type="text" name="first_name" value="<?=$row['first_name']?>" placeholder="first_name" readonly><br>
        <label>last_name:</label>
        <input type="text" name="last_name" value="<?=$row['last_name']?>" placeholder="last_name" readonly><br>
        <label>store_id:</label>
        <input type="text" name="store_id" value="<?=$row['store_id']?>" placeholder="store_id" readonly><br>
        <label>email:</label>
        <input type="text" name="email" value="<?=$row['email']?>" placeholder="email" readonly><br>
        <label>active:</label>
        <input type="text" name="active" value="<?=$row['active']?>" placeholder="active" readonly><br>
        <label>last_update:</label>
        <input type="text" name="last_update" value="<?=$row['last_update']?>" placeholder="last_update" readonly><br>
       
    </form>
</body>
</html>