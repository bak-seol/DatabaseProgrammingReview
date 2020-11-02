<?php
$link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
$filtered = array(
    'staff_id' => mysqli_real_escape_string($link, $_POST['staff_id']),
    'first_name' => mysqli_real_escape_string($link, $_POST['first_name']),
    'last_name' => mysqli_real_escape_string($link, $_POST['last_name']),
    'address_id' => mysqli_real_escape_string($link, $_POST['address_id']),
    'email' => mysqli_real_escape_string($link, $_POST['email']),
    'store_id' => mysqli_real_escape_string($link, $_POST['store_id']),
    'active' => mysqli_real_escape_string($link, $_POST['active']),
    'username' => mysqli_real_escape_string($link, $_POST['username']),
    'password' => mysqli_real_escape_string($link, $_POST['password'])
   
);

$staff_num_sql="select * from staff where staff_id='{$filtered['staff_id']}'";
$staff_num_result = mysqli_query( $link, $staff_num_sql);
$staff_num_exist=mysqli_num_rows($staff_num_result);
if($staff_num_exist > 0) {
    echo '이미 존재하는 고객 번호가 있습니다. <a href = "index.php">돌아가기</a>';
    exit();
} else {
        $query = "
                INSERT INTO staff (
                    staff_id, first_name, last_name, address_id, email, store_id, active, username, password, last_update
                ) VALUES (
                    '{$filtered['staff_id']}', '{$filtered['first_name']}',
                    '{$filtered['last_name']}', '{$filtered['address_id']}',
                    '{$filtered['email']}', '{$filtered['store_id']}', '{$filtered['active']}' ,
                    '{$filtered['username']}', '{$filtered['password']}'   
                )
            ";
 }
//print_r($query);
$result = mysqli_query($link, $query);
if ($result == false) {
    echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.  <a href="index.php">돌아가기</a>';
    error_log(mysqli_error($link));
} else {
    echo '성공하였습니다. <a href="index.php">돌아가기</a>';
}