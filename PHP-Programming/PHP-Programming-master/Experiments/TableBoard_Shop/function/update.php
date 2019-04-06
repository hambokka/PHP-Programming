<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

# TODO: MySQL DB에서, num에 해당하는 레코드를 POST로 받아온 내용으로 수정하기!

# 참고 : 에러 메시지 출력 방법
echo "<script> alert('update - error message') </script>";

$connect = mysql_connect("localhost","ohty","1231");
// DB 선택
mysql_select_db("oty_db", $connect);
// sql 쿼리 string 생성

$sql = "update tableboard_shop set  date = '$_POST[date]',  order_id = '$_POST[order_id]', name = '$_POST[name]', price = '$_POST[price]', quantity = '$_POST[quantity]' where num = $_GET[num] ";

$result = mysql_query($sql, $connect);

?>

<script>
    location.replace('../index.php');
</script>
