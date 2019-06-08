<?php
include"db_connect.php";
$connect = mysql_connect("localhost","ohty","1231");
mysql_select_db("oty_db", $connect);
?>

<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>게시판</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body style="background-color: #000000">
<?php
//echo ($_GET['Board_Num']);
$result = mysql_query("update gesipan set Board_views = Board_views + 1 where Board_Num = '$_GET[Board_Num]'", $connect);

$tql = mq("select * from gesipan where Board_Num = '$_GET[Board_Num]'");
$gesipan = $tql->fetch_array();


//echo $_POST[Test];
//echo "테스트용";
//echo $_POST[Test2];
//if($result)
//    echo"
//    <script>
//    alert($_GET[Board_Num])
//    </script>
//    ";
?>

<?php
//echo "$_GET[Board_Num]";
//echo ("$HTTP_GET_VARS[Board_Num]");
//?>
<!-- 글 불러오기 -->
<form method="post" action="modify.php">
<div style="background-color: #000000" id="board_read">
    <h2 style="margin-top: 80px ;color: #cce5ff"><?php echo $gesipan[Board_title]; ?></h2>
    <div style="color: #cce5ff" id="user_info">
        작성자 : <?php echo $gesipan[Board_writer]; ?> / 작성일 : <?php echo $gesipan[Board_wdate]; ?> <!--/ 점수 : <?php echo $gesipan[Board_score];?>--> / 조회수 : <?php echo $gesipan[Board_views]; ?>
        <font size="7"><span style="float: right;" class="label label-default">점수 : <?php echo $gesipan[Board_score];?></span></font>
        <div id="bo_line"></div> <!--줄-->
    </div>
    <div style="color: #cce5ff" id="bo_content">
        <?php echo $gesipan[Board_contents]; ?>
    </div>
<!--    <div>-->
<!--        파일 : <a href="upload/--><?php //echo $gesipan[Board_image];?><!--" download>--><?php //echo $gesipan[Board_image]; ?><!--</a>-->
<!--    </div>-->
<!--파일업로드미완성부분-->
    <!-- 목록, 수정, 삭제 -->
    <div id="bo_ser">
        <ul style="padding-top: 300px">
            <li class="btn btn-default"><a href="/DB_test(teamproject)/gesipan.php">목록으로</a></li>
            <li class="btn btn-default"><a href="/DB_test(teamproject)/modify.php?Board_Num=<?php echo $_GET[Board_Num]; ?>">수정</a></li>
            <li class="btn btn-default"><a href="/DB_test(teamproject)/delete.php?Board_Num=<?php echo $_GET[Board_Num]; ?>">삭제</a></li>
<!--            <a href="write.php"><button type="button" class="btn btn-default">글쓰기</button></a>-->
        </ul>
    </div>
</div>
</form>
</body>
</html>