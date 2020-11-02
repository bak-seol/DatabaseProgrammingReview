<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
    if(isset($_GET['staff_id'])){
        $filtered_id = mysqli_real_escape_string($link, $_GET['staff_id']);
    } else {
        $filtered_id = mysqli_real_escape_string($link, $_POST['staff_id']);        
    }

    $query = "SELECT staff_id FROM staff ORDER BY staff_id DESC LIMIT 1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $next_staff_num = strval((int)$row['staff_id'] + 1);

    if((int)$filtered_id >= (int)$next_staff_num) {
        echo '해당하는 직원이 없습니다. 직원번호를 다시 입력해 주십시오. <br> <a href="index.php">돌아가기</a>' ;
        exit();
    }
    else{
        $query = " SELECT * FROM staff WHERE staff_id='{$filtered_id}' ";    
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
<h2><a href="index.php">영화 대여 시스템</a> | 직원 정보 수정</h2>
    <form action="staff_update_process.php" method="POST">
    <label>staff_id : </label>
        <input type="text" name="staff_id" placeholder="고객번호" value="<?=$row['staff_id']?>" readonly ><br>
        <label>first_name : </label>
        <input type="text" name="first_name" placeholder="성(이름)" value="<?=$row['first_name']?>" ><br>
        <label>last_name : </label>
        <input type="text" name="last_name" placeholder="이름" value="<?=$row['last_name']?>" ><br>
        <label>store_id : </label>
        <input type="text" name="store_id" placeholder="상점 번호" value="<?=$row['store_id']?>" ><br>
        <label>email : </label>
        <input type="text" name="email" placeholder="이메일 주소" value="<?=$row['email']?>" ><br>
        <label>username : </label>
        <input type="text" name="username" placeholder="유저이름" value="<?=$row['username']?>" ><br>
        <label>password : </label>
        <input type="text" name="password" placeholder="유저비번" value="<?=$row['password']?>"  ><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>