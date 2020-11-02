<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>영화 대여 시스템</title>
    <style>
        p { background-color: yellow;}
    </style>
</head>
<body>
    <h1> 영화 대여 시스템</h1>
    <a href="film_select.php">- 영화 정보 전체 조회</a><br>
    <form action="film_search.php" method="POST">
        - 영화 정보 검색:
        <input type="text" name="film_id" placeholder="영화번호 입력">
        <input type="submit" value="Search">
    </form> 
    
    <hr />
    <a href="customer_select.php">- 고객 정보 전체 조회</a><br>
    <form action="customer_update.php" method="POST">
        - 고객 정보 수정:
        <input type="text" name="customer_id" placeholder="고객번호 입력">
        <input type="submit" value="Search">
    </form>
    <form action="customer_search.php" method="POST">
        - 고객 정보 검색:
        <input type="text" name="customer_id" placeholder="고객번호 입력">
        <input type="submit" value="Search">
    </form> 
    <hr />
    <a href="staff_select.php">- 직원 정보 전체 조회</a><br>
    <form action="staff_update.php" method="POST">
        - 직원 정보 수정:
        <input type="text" name="staff_id" placeholder="직원번호 입력">
        <input type="submit" value="Search">
    </form>
    <form action="staff_search.php" method="POST">
        - 직원 정보 검색:
        <input type="text" name="staff_id" placeholder="직원번호 입력">
        <input type="submit" value="Search">
    </form> 
    <hr />
    <a href="payment_select.php">- payment 정보 전체 조회</a><br>
    <form action="payment_search.php" method="GET">
        - payment 정보: 
        <input type="text" name="payment_id" placeholder="payment 번호">
        <input type="submit" value="Search">
    </form>

    </form>
</body> 
</html>