<?php
include "db_connect.php";

$connect = mysql_connect("localhost","ohty","1231");
mysql_select_db("oty_db",$connect);

$bno = $_POST['B_Num'];
$bwriter = $_POST[B_writer];
$bpassword = $_POST[B_pw];
$btitle = $_POST[B_title];
$bcontent = $_POST[B_content];
//$bgenre = $_POST[B_genre]; 장르 안씀
$bscore = $_POST[B_score];
$bwdate = date("Y-m-d H:i:s");
$sql = "update gesipan set Board_writer='$bwriter',Board_password ='$bpassword',Board_title='$btitle',Board_contents = '$bcontent', Board_score = '$bscore', Board_wdate = '$bwdate' where Board_Num=($bno)";
//$sql = "update gesipan set Board_writer='modified',Board_password = 9999,Board_title='modified',Board_contents = 'modified' where Board_Num=($bno)";
$result = mysql_query($sql,$connect);
?>



<!--    //",Board_image = ".$_POST['file'].-->
<script type="text/javascript">alert("수정되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=/DB_test(teamproject)/read.php?Board_Num=<?php echo $bno; ?>">
<!--절대좌표 썼음-->