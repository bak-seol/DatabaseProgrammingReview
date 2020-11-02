<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
    if(isset($_GET['payment_id'])){
        $filtered_id = mysqli_real_escape_string($link, $_GET['payment_id']);
    } else {
        $filtered_id = mysqli_real_escape_string($link, $_POST['payment_id']);        
    }

    $query = "SELECT payment_id FROM payment ORDER BY payment_id DESC LIMIT 1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $next_payment_num = strval((int)$row['payment_id'] + 1);

    if((int)$filtered_id >= (int)$next_payment_num) {
        echo '해당하는 payment가 없습니다. payment 번호를 다시 입력해 주십시오. <br><a href="index.php">돌아가기</a>' ;
        exit();
    }
    else{
        $query = " SELECT * FROM payment WHERE payment_id='{$filtered_id}' "; 
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
<h2><a href="index.php">영화 대여 시스템</a> | payment 정보 검색</h2>
    <form action="payment_select.php" method="POST">
        <label>payment_id:</label>
        <input type="text" name="payment_id" value="<?=$row['payment_id']?>" placeholder="payment_id" readonly><br>
        <label>customer_id:</label>
        <input type="text" name="customer_id" value="<?=$row['customer_id']?>" placeholder="customer_id" readonly><br>
        <label>staff_id:</label>
        <input type="text" name="staff_id" value="<?=$row['staff_id']?>" placeholder="staff_id" readonly><br>
        <label>amount:</label>
        <input type="text" name="amount" value="<?=$row['amount']?>" placeholder="amount" readonly><br>
        <label>payment_date:</label>
        <input type="text" name="payment_date" value="<?=$row['payment_date']?>" placeholder="payment_date" readonly><br>
       
    </form>
</body>
</html>