<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>게시판</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />

    <!-- 부트스트랩 -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="B_select/dist/css/bootstrap-select.css" rel="stylesheet">
    <link href="B_select/dist/js/bootstrap-select.js" rel="stylesheet">

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
<link href="B_select/dist/css/bootstrap-select.css" rel="stylesheet">
<?
$str="here!";
function getfile(){
    global $str;
    return $str;
}
?>
<html>
<head>
    <title>test</title>
</head>
<body>
<input type="button" value="click me" onclick=<? echo("<tr onclick=\"location.href = ('read.php/Board_Num=$gesipan[Board_Num]')\"> ");?>/>
<? echo("<tr onclick=\"location.href = ('read.php/Board_Num=$gesipan[Board_Num]')\"> ");?>
<select class="selectpicker" >
    <option >장르 선택</option>
    <option >PC/VR</option>
    <option >PS3/PS4</option>
    <option >Nintendo</option>
    <option >Xbox</option>
</select>
</body>
</html> 