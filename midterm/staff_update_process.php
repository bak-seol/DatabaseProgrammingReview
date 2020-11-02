<?php
$link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
$filtered = array(
    'staff_id' => mysqli_real_escape_string($link, $_POST['staff_id']),
    'first_name' => mysqli_real_escape_string($link, $_POST['first_name']),
    'last_name' => mysqli_real_escape_string($link, $_POST['last_name']),
    'store_id' => mysqli_real_escape_string($link, $_POST['store_id']),
    'email' => mysqli_real_escape_string($link, $_POST['email']),
    'username' => mysqli_real_escape_string($link, $_POST['username']),
    'password' => mysqli_real_escape_string($link, $_POST['password'])
);

if( empty($_POST['staff_id']))  echo '이미 존재하는 직원 번호가 있습니다. <a href = "index.php">돌아가기</a>';
else{
    $query = "
            UPDATE staff
            SET
                first_name = '{$filtered['first_name']}',
                last_name = '{$filtered['last_name']}',
                store_id = '{$filtered['store_id']}',
                email = '{$filtered['email']}',
                username = '{$filtered['username']}',
                password = '{$filtered['password']}'
            WHERE
                staff_id = '{$filtered['staff_id']}'
        ";
}
$result = mysqli_query($link, $query);
if ($result == false) {
    echo '수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
    error_log(mysqli_error($link));
} else {
    echo '성공하였습니다. <a href="staff_select.php">돌아가기</a>';
}