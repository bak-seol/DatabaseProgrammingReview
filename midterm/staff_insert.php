<?php 
    $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
    $query = "SELECT staff_id FROM staff ORDER BY staff_id DESC LIMIT 1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $next_staff_num = strval((int)$row['staff_id'] + 1);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>영화 대여 시스템</title>
</head>
<body>
    <h2><a href="index.php">영화 대여 시스템</a> | 신규 직원 등록</h2>
    <form action="staff_insert_process.php" method="POST">
        <label>staff_id : </label>
        <input type="text" name="staff_id" placeholder="직원번호" value="<?=$next_staff_num?>" ><br>
        <label>first_name : </label>
        <input type="text" name="first_name" placeholder="성(이름)"><br>
        <label>last_name : </label>
        <input type="text" name="last_name" placeholder="이름"><br>
        <label>address_id : </label>
        <input type="text" name="address_id" placeholder="주소 번호"><br>
        <label>email : </label>
        <input type="text" name="email" placeholder="이메일 주소"><br>
        <label>store_id : </label>
        <input type="text" name="store_id" placeholder="상점 번호"><br>
        <label>active : </label>
        <input type="text" name="active" placeholder="활성화 상태"><br>
        <label>username : </label>
        <input type="text" name="username" placeholder="유저 이름"><br>
        <label>password : </label>
        <input type="text" name="password" placeholder="유저 비번"><br>

        <input type="submit" value="Create">
    </form>
</body>
</html>