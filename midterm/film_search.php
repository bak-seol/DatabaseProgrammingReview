<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
    if(isset($_GET['film_id'])){
        $filtered_id = mysqli_real_escape_string($link, $_GET['film_id']);
    } else {
        $filtered_id = mysqli_real_escape_string($link, $_POST['film_id']);        
    }

    $query = "SELECT film_id FROM film ORDER BY film_id DESC LIMIT 1";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $next_film_num = strval((int)$row['film_id'] + 1);

    if((int)$filtered_id >= (int)$next_film_num) {
        echo '해당하는 영화가 없습니다. 영화번호를 다시 입력해 주십시오. <br><a href="index.php">돌아가기</a>' ;
        exit();
    }
    else{
        $query = " SELECT * FROM film WHERE film_id='{$filtered_id}' "; 
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
<h2><a href="index.php">영화 대여 시스템</a> | 영화 정보 검색</h2>
    <form action="customer_search.php" method="POST">
        <label>film_id:</label>
        <input type="text" name="film_id" value="<?=$row['film_id']?>" placeholder="film_id" readonly><br>
        <label>title:</label>
        <input type="text" name="title" value="<?=$row['title']?>" placeholder="title" readonly><br>
        <label>description:</label>
        <input type="text" name="description" value="<?=$row['description']?>" placeholder="description" readonly><br>
        <label>release_year:</label>
        <input type="text" name="release_year" value="<?=$row['release_year']?>" placeholder="release_year" readonly><br>
        <label>rental_duration:</label>
        <input type="text" name="rental_duration" value="<?=$row['rental_duration']?>" placeholder="rental_duration" readonly><br>
        <label>rental_rate:</label>
        <input type="text" name="rental_rate" value="<?=$row['rental_rate']?>" placeholder="rental_rate" readonly><br>
        <label>length:</label>
        <input type="text" name="length" value="<?=$row['length']?>" placeholder="length" readonly><br>
        <label>replacement_cost:</label>
        <input type="text" name="replacement_cost" value="<?=$row['replacement_cost']?>" placeholder="replacement_cost" readonly><br>
        <label>special_features:</label>
        <input type="text" name="special_features" value="<?=$row['special_features']?>" placeholder="special_features" readonly><br>

       
    </form>
</body>
</html>