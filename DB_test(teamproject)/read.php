<?php
include"db_connect.php";
?>

<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>게시판</title>
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<body>
<?php
$bno = $_GET['Board_Num']; /* bno함수에 idx값을 받아와 넣음*/
$Board_views = mysqli_fetch_array(mq("select * from board where Board_Num ='".$bno."'"));
$Board_views = $Board_views['Board_views'] + 1;
$fet = mq("update gesipan set Board_views = '".$Board_views"' where Board_Num = '".$bno."'");
$sql = mq("select * from gesipan where Board_Num ='".$bno."'"); /* 받아온 idx값을 선택 */
$gesipan = $sql->fetch_array();
?>
<!-- 글 불러오기 -->
<div id="board_read">
    <h2><?php echo $gesipan['Board_title']; ?></h2>
    <div id="user_info">
        <?php echo $gesipan['Board_writer']; ?> <?php echo $gesipan['date']; ?> 조회:<?php echo $gesipan['Board_views']; ?>
        <div id="bo_line"></div>
    </div>
    <div id="bo_content">
        <?php echo nl2br("$gesipan[Board_contents]"); ?>
    </div>
    <!-- 목록, 수정, 삭제 -->
    <div id="bo_ser">
        <ul>
            <li><a href="/">[목록으로]</a></li>
            <li><a href="modify.php?idx=<?php echo $gesipan['Board_Num']; ?>">[수정]</a></li>
            <li><a href="delete.php?idx=<?php echo $gesipan['Board_Num']; ?>">[삭제]</a></li>
        </ul>
    </div>
</div>
</body>
</html>