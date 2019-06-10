<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>게시판</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />

    <!-- 부트스트랩 -->
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="B_select/dist/css/bootstrap-select.css" rel="stylesheet"/>

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

    <!--썸머노트-->
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">-->
<!--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>-->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>-->
<!--    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>-->
    <?php
    $target_dir = "upload/";
    $target_file = $target_dir.basename($_FILES["uploadfile"]["title"]);
    $filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    ?>
</head>
<body style="background-color: #000000">
<div style="background-color: #000000" class="container" id="board_write">
    <h1><a href="gesipan.php">자유게시판</a></h1>
    <h4 style="color: #ffffff">글을 작성하는 공간입니다.</h4>
    <div id="write_area">
        <form action="write_upload.php" method="post" enctype="multipart/form-data">
            <div class="row">
            <div class ="col-md-6">
            <div class="form-group">
                <input class="styling_input" name="title" id="utitle"  placeholder="제목" maxlength="30" required/>
            </div>
            </div>
            </div>
<!--            <div class="wi_line"></div>-->
            <div class="row">
            <div class ="col-md-6">
            <div class="form-group">
                <input class="styling_input" name="writer" id="uname"  placeholder="작성자" maxlength="30" required/>
            </div>
            </div>
            </div>
<!--            <select name="genre">-->
<!--                <option value="">장르 선택</option>-->
<!--                <option value="PC/VR">PC/VR</option>-->
<!--                <option value="PS3/PS4">PS3/PS4</option>-->
<!--                <option value="Nintendo">Nintendo</option>-->
<!--                <option value="Xbox">Xbox</option>-->
<!--            </select>-->
<!--            <div class="wi_line"></div>-->
            <select name="score">
                <option value="">점수 선택</option>
                <?php
                $sc = 0;
                for($sc=0;$sc<=99;$sc++) {
                    echo "<option value=$sc>$sc</option>";
                }
                echo "<option>$sc</option>";
                ?>
            </select>
            <div>
                <textarea class="styling" name="content" id="ucontent" placeholder="내용" required></textarea>
            </div>



            <div class="row">
            <div class ="col-md-6">
            <div class="form-group">
                <input class="styling_input" type="password" name="pw" id="upw" placeholder="비밀번호" />
            </div>
            </div>
            </div>
<!--            <div id="in_file">-->
<!--                <input type="file" value="1" name="b_file" />-->
<!--            </div>-->
            <div class="bt_se">
                <button type="submit"class="btn btn-primary">글 작성</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>