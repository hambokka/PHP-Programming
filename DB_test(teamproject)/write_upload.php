<?php


include "db_connect.php";
$date = date('Y-m-d');
$sql = mq("insert into gesipan(Board_title,Board_writer,Board_contents,Board_password,Board_image)
 values('" . $_POST['title'] . "','" . $_POST['writer'] . "','" . $_POST['content'] . "','" . $_POST['password'] . "','" . $_POST['image'] . "')"); ?>
<script type="text/javascript">alert("글쓰기 완료되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=gesipan.php"/>

<?php
//$connect = mysqli_connect("localhost", "ohty", "1231", "oty_db") or die("fail");
//
//$id = $_POST[name];                      //Writer
//$pw = $_POST[pw];                        //Password
//$title = $_POST[title];                  //Title
//$content = $_POST[content];              //Content
//$date = date('Y-m-d H:i:s');            //Date
//
//$URL = 'webt.php';                   //return URL
//
//
//$query = "insert into board (number,title, content, date, hit, id, password)
//                        values(null,'$_POST[title]', '$_POST[content]', '$date',0, '$_POST[name]', '$_POST[pw]')";
//
//
//$result = $connect->query($query);
//if($result){
//    ?><!--                  <script>-->
<!--        alert("--><?php //echo "글이 등록되었습니다."?>//");
//        location.replace("<?php //echo $URL?>//");
//    </script>
//    <?php
//}
//else{
//    echo "FAIL";
//}
//
//mysqli_close($connect);
//?>
