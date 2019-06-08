<?php
	include "db_connect.php";

	$bno = $_GET['Board_Num'];
	$sql = mq("select * from gesipan where Board_Num='$bno';");
	$gesipan = $sql->fetch_array();
 ?>
<?php
echo $gesipan['Board_Num'];
echo "씨발";
echo  $gesipan['Board_title'];
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <div id="board_write">
        <h1><a href="/">자유게시판</a></h1>
        <h4>글을 수정합니다.</h4>
            <div id="write_area">
                <form action="modify_upload.php/<?php echo $gesipan['Board_Num']; ?>" method="post">
                    <!---->
                    <input type="hidden" name="B_Num" value="<?=$bno?>" />
                    <div id="in_title">
                        <textarea name="B_title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $gesipan['Board_title']; ?></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_name">
                        <textarea name="B_writer" id="uname" rows="1" cols="55" placeholder="글쓴이" maxlength="100" required><?php echo $gesipan['Board_writer']; ?></textarea>
                    </div>
                    <select name="B_genre">
                        <option value="">장르 선택</option>
                        <option value="PC/VR">PC/VR</option>
                        <option value="PS3/PS4">PS3/PS4</option>
                        <option value="Nintendo">Nintendo</option>
                        <option value="Xbox">Xbox</option>
                    </select>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="B_content" id="ucontent" placeholder="내용" required><?php echo $gesipan['Board_contents']; ?></textarea>
                    </div>
                    <div id="in_pw">
                        <input type="password" name="B_pw" id="upw"  placeholder="비밀번호"/>
                    </div>
<!--                    <div id="in_file">-->
<!--                        <input type="file" value="1" name="file" />-->
<!--                    </div>-->
<!--파일업로드미완성-->
                    <div class="bt_se">
                        <input type="submit">글 작성</input>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>