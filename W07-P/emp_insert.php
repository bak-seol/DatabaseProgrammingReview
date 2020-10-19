<?php 
    $link = mysqli_connect('localhost', 'admin', 'admin', 'employees');
    $query = "SELECT emp_no FROM employees ORDER BY emp_no DESC LIMIT 1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $next_emp_num = strval((int)$row['emp_no'] + 1);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>직원 관리 시스템</title>
</head>
<body>
    <h2><a href="index.php">직원 관리 시스템</a> | 신규 직원 등록</h2>
    <form action="emp_insert_process.php" method="POST">
        <label>emp_no:</label>
        <input type="text" name="emp_no" placeholder="직원번호" value="<?=$next_emp_num?>" ><br>
        <label>birth_date:(0000-00-00)</label>
        <input type="text" name="birth_date" placeholder="생년월일"><br>
        <label>first_name:</label>
        <input type="text" name="first_name" placeholder="이름"><br>
        <label>last_name:</label>
        <input type="text" name="last_name" placeholder="성(이름)"><br>
        <label>gender:(M or F)</label>
        <input type="text" name="gender" placeholder="성별"><br>
        <label>hire_date:(0000-00-00)</label>
        <input type="text" name="hire_date" placeholder="입사날짜"><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>

