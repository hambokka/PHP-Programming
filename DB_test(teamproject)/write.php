<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>게시판</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />

    <!-- 부트스트랩 -->
    <link href="css/bootstrap.css" rel="stylesheet">

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
<body>
<div class="container" id="board_write">
    <h1><a href="gesipan.php">자유게시판</a></h1>
    <h4>글을 작성하는 공간입니다.</h4>
    <div id="write_area">
        <form action="write_upload.php" method="post" enctype="multipart/form-data">
            <div id="in_title">
                <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
            </div>
            <div class="wi_line"></div>
            <div id="in_name">
                <textarea name="writer" id="uname" rows="1" cols="55" placeholder="글쓴이" maxlength="100" required></textarea>
            </div>
            <select name="genre">
                <option value="">장르 선택</option>
                <option value="PC/VR">PC/VR</option>
                <option value="PS3/PS4">PS3/PS4</option>
                <option value="Nintendo">Nintendo</option>
                <option value="Xbox">Xbox</option>
            </select>
            <div class="wi_line"></div>
            <div id="in_content">
                <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
            </div>
            <div id="in_pw">
                <input type="password" name="pw" id="upw"  placeholder="비밀번호" />
            </div>
<!--            <div id="in_file">-->
<!--                <input type="file" value="1" name="b_file" />-->
<!--            </div>-->
<!--파일업로드미완성-->
            <div class="bt_se">
                <button type="submit">글 작성</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>