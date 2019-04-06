<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

# TODO: MySQL DB에서, POST로 받아온 내용 입력하기!
// MySQL 데이터베이스 연결
$connect = mysql_connect("localhost","ohty","1231");
// DB 선택
mysql_select_db("oty_db", $connect);
// sql 쿼리 string 생성

$sql = "insert into tableboard_shop (date, order_id, name, price, quantity) values('$_POST[date]', '$_POST[order_id]', '$_POST[name]', '$_POST[price]', '$_POST[quantity]')";

$result = mysql_query($sql, $connect);


# 참고 : 에러 메시지 출력 방법
echo "<script> alert('insert - error message') </script>"

?>

<script>
    location.replace('../index.php');
</script>
