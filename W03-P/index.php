<?php
  $link = mysqli_connect('localhost', 'root', 'ghd1006', 'fav');
  $query = "SELECT * FROM film";
  $result = mysqli_query($link, $query);
  $list = '';
  while ($row = mysqli_fetch_array($result)) {
      $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }

  $article = array(
    'title' => 'Welcome',
    'mainactors' => 'I love 90s movie because of the mood. Let me introduce my favorite 90s high-teen film!<br>
    The order is meaningless, I love these equally♡'
  );
  $update_link = '';
  $delete_link = '';

  if (isset($_GET['id'])) {
      $query = "SELECT * FROM film WHERE id={$_GET['id']}";
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);
      $article = array(
      'title' => $row['title'],
      'mainactors' => $row['mainactors']
    );
      $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
      $delete_link = '
    <form action="process_delete.php" method="POST">
      <input type="hidden" name="id" value="'.$_GET['id'].'">
      <input type="submit" value="delete">
    </form>
    ';
  }
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> 90s High-Teen Film </title>
</head>
<body>
  <h1><a href="index.php">Favorite 90s High-Teen Film</h1>
  <ul> <?= $list ?> </ul>
  <a href="create.php">create</a>
  <?=$update_link ?>
  <?=$delete_link ?>
  <h2> <?= $article['title']?> </h2>
   <?= $article['mainactors'] ?>
</body>
</html>
