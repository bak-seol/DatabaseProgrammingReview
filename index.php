<?php
   $link = mysqli_connect('localhost:3307','root','rootroot','dbp');
   $query = "SELECT * FROM topic";
   $result = mysqli_query($link, $query);
   $list ='';
   while ($row = mysqli_fetch_array($result)) {
     $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
   }
   $query = "SELECT * FROM topic WHERE id={$_GET['id']}";
   $result = mysqli_query($link, $query);
   $row = mysqli_fetch_array($result);
   $article = array(
     'title' => $row['title'],
     'description' => $row['description']
   );
 ?>
<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
   <title>Puppy information</title>
 </head>
 <body>
   <h1>강아지</h1>
   <ol><?= $list ?></ol>
   <a href="create.php">create</a>
   <h2><?= $article['title'] ?></h2>
   <?= $article['description'] ?>
 </body>
</html>
