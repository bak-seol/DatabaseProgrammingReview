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
        echo '해당하는 직원이 없습니다. 직원번호를 다시 입력해 주십시오. <br> <a href="index.php">돌아가기</a>' ;
        exit();
    }
    else{
        $query = " SELECT * FROM customer WHERE customer_id='{$filtered_id}' ";    
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        //print_r($row);
    }

  
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>영화 대여 시스템</title>
</head>
<body>
<h2><a href="index.php">영화 대여 시스템</a> | 고객 정보 수정</h2>
    <form action="customer_update_process.php" method="POST">
    <label>customer_id : </label>
        <input type="text" name="customer_id" placeholder="고객번호" value="<?=$row['customer_id']?>" readonly ><br>
        <label>first_name : </label>
        <input type="text" name="first_name" placeholder="성(이름)" value="<?=$row['first_name']?>" ><br>
        <label>last_name : </label>
        <input type="text" name="last_name" placeholder="이름" value="<?=$row['last_name']?>" ><br>
        <label>store_id : </label>
        <input type="text" name="store_id" placeholder="상점 번호" value="<?=$row['store_id']?>" ><br>
        <label>email : </label>
        <input type="text" name="email" placeholder="이메일 주소" value="<?=$row['email']?>" ><br>
        <label>active : </label>
        <input type="text" name="active" placeholder="활성화 상태" value="<?=$row['active']?>" ><br>
        <label>last_update : </label>
        <input type="text" name="last_update" placeholder="마지막 수정일" value="<?=$row['last_update']?>"  ><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>