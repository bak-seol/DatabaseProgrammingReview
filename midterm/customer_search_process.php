<?php
$link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
$filtered_id = mysqli_real_escape_string($link, $_POST['customer_id']);

$query = "
        DELETE FROM customer
        WHERE customer_id = '{$filtered_id}'            
        ";

$result = mysqli_query($link, $query);
if ($result == false) {
    echo '삭제하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요. <a href="index.php">돌아가기</a>';
    error_log(mysqli_error($link));
} else {
    echo '성공하였습니다. <a href="customer_select.php">돌아가기</a>';
}