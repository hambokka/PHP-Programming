<?php

include "db_connect.php";

$bno = $_GET['Board_Num'];
$sql = mq("delete from gesipan where Board_Num='$bno';");
?>
<script type="text/javascript">alert("삭제되었습니다.<?echo $bno?>");</script>
<meta http-equiv="refresh" content="0 url=gesipan.php"/>