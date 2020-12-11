<?php
  $link = mysqli_connect("localhost","dbpt08","ssfinal8!","dbpt08");
  $query = "SELECT 지역, count(연번) as 인원수 FROM covidseoul GROUP BY 지역 ASC";
  $result = mysqli_query($link, $query);

  $covid_info .= '';
  while($row = $row = mysqli_fetch_array($result)) {
    $covid_info .= '<tr>';
    $covid_info .= '<td>'.$row['지역'].'</td>';
    $covid_info .= '<td>'.$row['인원수'].'</td>';
    $covid_info .= '</tr>';
  }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>구별 누적 확진자</title>
</head>
<body>
  <h1><a href="gu_sum.php">서울시 구별 누적 확진자 수</a></h1>
  <p><a href="index.php">서울시 코로나19 확진자 현황</a></p>
  <table border="1">
    <tr>
      <th>지역</th>
      <th>인원수</th>
    </tr>
    <?=$covid_info ?>
  </table>
</body>
</html>
