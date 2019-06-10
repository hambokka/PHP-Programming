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




/*$file_name = $_FILES['file']['name'];                // 업로드한 파일명
echo $file_name;
$file_tmp_name = $_FILES['file']['tmp_name'];   // 임시 디렉토리에 저장된 파일명
echo $file_tmp_name;
echo "<br>";
$file_size = $_FILES['file']['size'];                 // 업로드한 파일의 크기
$mimeType = $_FILES['file']['type'];                 // 업로드한 파일의 MIME Type
echo $mimeType;

// 첨부 파일이 저장될 서버 디렉토리 지정(원하는 경로에 맞게 수정하세요)
$save_dir = 'C:\APM_Setup\htdocs\DB_test(teamproject)\upload\\';

if($mimeType=="html" ||
    $mimeType=="htm" ||
    $mimeType=="php" ||
    $mimeType=="php3" ||
    $mimeType=="inc" ||
    $mimeType=="pl" ||
    $mimeType=="cgi" ||
    $mimeType=="txt" ||
    $mimeType=="TXT" ||
    $mimeType=="asp" ||
    $mimeType=="jsp" ||
    $mimeType=="phtml" ||
    $mimeType=="js" ||
    $mimeType==""||
    $mimeType=="text/plain") {
    echo("<script> 
		alert('업로드를 할 수 없는 파일형식입니다.'); 
		document.location.href = '/DB_test(teamproject)/gesipan.php';    
		</script>");
    exit;
}
//// 파일명 변경 (업로드되는 파일명을 별도로 생성하고 원래 파일명을 별도의 변수에 지정하여 DB에 기록할 수 있습니다.)
//$real_name = $file_name;     // 원래 파일명(업로드 하기 전 실제 파일명)
//$arr = explode(".", $real_name);	 // 원래 파일의 확장자명을 가져와서 그대로 적용 $file_exe
//$arr1 = $arr[0];
//$arr2 = $arr[1];
//$arr3 = $arr[2];
//$arr4 = $arr[3];
//if($arr4) {
//    $file_exe = $arr4;
//} else if($arr3 && !$arr4) {
//    $file_exe = $arr3;
//} else if($arr2 && !$arr3) {
//    $file_exe = $arr2;
//}

$file_Name = date("Y-m-d H:i:s");	 // 실제 업로드 될 파일명 생성	(본인이 원하는 파일명 지정 가능)
$change_file_name = $file_Name;			 // 변경된 파일명을 변수에 지정
//$real_name = addslashes($real_name);		// 업로드 되는 원래 파일명(업로드 하기 전 실제 파일명)
$real_size = $file_size;                         // 업로드 되는 파일 크기 (byte)



//파일을 저장할 디렉토리 및 파일명 전체 경로
$dest_url = $save_dir . $file_name;

//파일을 지정한 디렉토리에 업로드
if (file_exists($dest_url)) {
    die("파일과 동일한 이름의 파일이 존재합니다. 파일명을 변경하세요.");
}
elseif(!move_uploaded_file($file_tmp_name, $dest_url))
{
    die("파일을 지정한 디렉토리에 업로드하는데 실패했습니다.");
}*/
$sql = "update gesipan set Board_writer='$bwriter',Board_password ='$bpassword',Board_title='$btitle',Board_contents = '$bcontent', Board_score = '$bscore', Board_wdate = '$bwdate', Board_image = '$dest_url' where Board_Num=($bno)";
//$sql = "update gesipan set Board_writer='modified',Board_password = 9999,Board_title='modified',Board_contents = 'modified' where Board_Num=($bno)";
$result = mysql_query($sql,$connect);


?>



<!--    //",Board_image = ".$_POST['file'].-->
<script type="text/javascript">alert("수정되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=/DB_test(teamproject)/read.php?Board_Num=<?php echo $bno; ?>">
<!--절대좌표 썼음-->