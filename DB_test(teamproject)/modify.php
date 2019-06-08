<?php
	include "db_connect.php";

	$bno = $_GET['Board_Num'];
	$sql = mq("select * from gesipan where Board_Num='$bno';");
	$gesipan = $sql->fetch_array();
 ?>
<?php
//echo $gesipan['Board_Num'];
//echo  $gesipan['Board_title'];
//?>
<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>게시판</title>
    <link rel="stylesheet" href="css/style.css" />
    <!-- 부트스트랩 -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="B_select/dist/css/bootstrap-select.css" rel="stylesheet">

    <!-- IE8 에서 HTML5 요소와 미디어 쿼리를 위한 HTML5 shim 와 Respond.js -->
    <!-- WARNING: Respond.js 는 당신이 file:// 을 통해 페이지를 볼 때는 동작하지 않습니다. -->
    <!--[if lt IE 9]-->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요합니다) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!--<script src="js/jquery.min.js"></script> 위 js를 다운받아 폴더에 참조하였습니다. 이렇게 하는게 더 좋겠죠? -->
    <!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->
    <script src="js/bootstrap.min.js"></script>
</head>
<body style="background-color: #000000">
    <div style="background-color: #000000" class="container" id="board_write">
        <h1><a href="gesipan.php">자유게시판</a></h1>
        <h4 style="color: #cce5ff">글을 수정합니다.</h4>
            <div id="write_area">
                <form action="modify_upload.php/<?php echo $gesipan['Board_Num']; ?>" method="post">
                    <!---->
                    <input type="hidden" name="B_Num" value="<?=$bno?>" />
                    <div class="row">
                    <div class ="col-md-6">
                    <div class="form-group">
                        <input class="form-control" name="B_title" id="utitle" placeholder="제목" maxlength="30" required value=" <?php echo $gesipan['Board_title']; ?>"></input>
                    </div>
                    </div>
                    </div>
<!--                    <div class="wi_line"></div>-->
                    <div class="row">
                    <div class ="col-md-6">
                    <div class="form-group">
                        <input class="form-control" name="B_writer" id="uname" placeholder="작성자" maxlength="300" required value=" <?php echo $gesipan['Board_writer']; ?>"></input>
                    </div>
                    </div>
                    </div>
                    <select name="B_score">
                        <option value="">점수 선택</option>
                        <?php
                        $sc = 0;
                        for($sc=0;$sc<=99;$sc++) {
                            echo "<option value=$sc>$sc</option>";
                        }
                        echo "<option>$sc</option>";
                        ?>
                    </select>
<!--                    <select name="B_genre">-->
<!--                        <option value="">장르 선택</option>-->
<!--                        <option value="PC/VR">PC/VR</option>-->
<!--                        <option value="PS3/PS4">PS3/PS4</option>-->
<!--                        <option value="Nintendo">Nintendo</option>-->
<!--                        <option value="Xbox">Xbox</option>-->
<!--                    </select>-->
<!--                    <div class="wi_line"></div>-->
                    <div id="in_content">
                        <textarea class="form-control" name="B_content" id="ucontent" placeholder="내용" required><?php echo $gesipan['Board_contents']; ?></textarea>
                    </div>
                    <div class="row">
                    <div class ="col-md-6">
                    <div class="form-group">
                        <input class="form-control" type="password" name="B_pw" id="upw"  placeholder="비밀번호"/>
                    </div>
                    </div>
                    </div>
<!--                    <div id="in_file">-->
<!--                        <input type="file" value="1" name="file" />-->
<!--                    </div>-->
<!--파일업로드미완성-->
                    <div class="bt_se">
                        <button type="submit" class="btn btn-primary" >글 수정</button>
                    </div>
                </form>
            </div>
        </div>
    <!--버튼의 종류
    <button type="button" class="btn">Basic</button>
    <button type="button" class="btn btn-default">Default</button>
    <button type="button" class="btn btn-primary">Primary</button>
    <button type="button" class="btn btn-success">Success</button>
    <button type="button" class="btn btn-info">Info</button>
    <button type="button" class="btn btn-warning">Warning</button>
    <button type="button" class="btn btn-danger">Danger</button>
    <button type="button" class="btn btn-link">Link</button>

    버튼의 크기
    <button type="button" class="btn btn-default btn-lg">Large</button>
    <button type="button" class="btn btn-default btn-md">Medium</button>
    <button type="button" class="btn btn-default btn-sm">Small</button>
    <button type="button" class="btn btn-default btn-xs">XSmall</button>-->
    </body>
</html>