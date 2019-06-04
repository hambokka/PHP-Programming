<?php
include "db_connect.php"
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>부트스트랩 게시판테스트</title>

    <!-- 부트스트랩 -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- IE8 에서 HTML5 요소와 미디어 쿼리를 위한 HTML5 shim 와 Respond.js -->
    <!-- WARNING: Respond.js 는 당신이 file:// 을 통해 페이지를 볼 때는 동작하지 않습니다. -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel = "stylesheet" type="text/css" href="css/style.css"/>

</head>
<body>

<!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요합니다) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!--<script src="js/jquery.min.js"></script> 위 js를 다운받아 폴더에 참조하였습니다. 이렇게 하는게 더 좋겠죠? -->
<!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->
<script src="js/bootstrap.min.js"></script>

<div id="board_area">
    <h1>THIS IS 게시판</h1>
    <h4>자유롭게 글을 쓸 수 있는 게시판입니다.</h4>
    <table class = "table table-striped table-bordered table-hover">
        <thead>
        <tr class = "text-success bg-danger">
            <th width="70">번호</th>
            <th width="500">제목</th>
            <th width="120">글쓴이</th>
            <th width="100">장르</th>
            <th width="100">조회수</th>
        </tr>
        </thead>
        <?php
        $connect = mysqli_connect("localhost","ohty","1231","oty_db");
        $sql = mq("select * from gesipan order by Board_Num desc limit 0,5"); // board테이블에있는 idx를 기준으로 내림차순해서 5개까지 표시
        while($gesipan = $sql->fetch_array())
        {
            $Board_title=$gesipan["Board_title"];
            if(strlen($Board_title)>30)
            {
                $Board_title=str_replace($gesipan["Board_title"],mb_substr($gesipan["Board_title"],0,30,"utf-8")."...",$gesipan["title"]); //title이 30을 넘어서면 ...표시
            }
            ?>
            <tbody>
            <tr>
                <td width="70"><?php echo $gesipan['Board_Num']; ?></td>
                <td width="500"><a href=""><?php echo $Board_title;?></a></td>
                <td width="120"><?php echo $gesipan['Board_writer']?></td>
                <td width="100"><?php echo $gesipan['Board_genre']?></td>
                <td width="100"><?php echo $gesipan['Board_views']; ?></td>
            </tr>
            </tbody>
        <?php } ?>
    </table>
    <div id="write_btn">
        <a href="write.php"><button>글쓰기</button></a>
    </div>
    <div class="text-center">-->
        <ul class="pagination pagination-lg"> <!--부트스트랩에서 제공하는 페이징 마법사(?)-->
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
        </ul>
    </div>
</div>































<!---->
<!--<h1 class="text-danger">이것은 게시판이다.</h1>-->
<!---->
<!--<!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요합니다) -->-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
<!--<!--<script src="js/jquery.min.js"></script> 위 js를 다운받아 폴더에 참조하였습니다. 이렇게 하는게 더 좋겠죠? -->-->
<!--<!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->-->
<!--<script src="js/bootstrap.min.js"></script>-->
<!---->
<!--<div class = "container">[게시판]-->
<!---->
<!--    <Table class = "table table-striped table-bordered table-hover">-->
<!---->
<!--        <thead>-->
<!--        <tr class = "text-success bg-danger">-->
<!--            <Td width="70">번호</Td>-->
<!--            <Td width="500">제목</Td>-->
<!--            <Td width="120">글쓴이</Td>-->
<!--            <Td width="100">조회수</Td>-->
<!--        </tr>-->
<!--        </thead>-->
<!--<!--        -->--><?php
//        $connect = mysqli_connect("localhost","ohty","1231","oty_db");
////        $select_query = "select * from gesipan";
////        $result_set = mysqli_query($connect, $select_query);
////
////        $row = mysqli_fetch_array($result_set);
////
////        while($row = mysqli_fetch_array($result_set)){
////            print_r($row);
////            echo '<br>';
////        }
////        mysqli_close($connect);
////
////        while($gesipan = $sql -> fetch_array()){
////            $Board_title = $gesipan["Board_title"];
////            if(strlen($Board_title)>30){
////                $Board_title = str_replace($gesipan["Board_title"], mb_substr($gesipan["Board_title"],0,30,"utf-8")."...",$gesipan["Board_title"]);
////            }
////        }
////        ?>
<!--        <tbody>-->
<!--        <tr class = "text-left bg-info">-->
<!--            <Td>1</Td>-->
<!--            <td>-->
<!--                --><?php
//
//                $connect = mysqli_connect("localhost","ohty","1231","oty_db");
//                $select_query = "select Board_title from gesipan where Board_Num = 4";
//                $result_set = mysqli_query($connect, $select_query);
//
//                $row = mysqli_fetch_row($result_set);
//
//                while($row = mysqli_fetch_row($result_set)){
//                    print_r($row);
//                    echo '<br>';
//                }
//                mysqli_close($connect); ?>
<!--                </Td>-->
<!--            <Td>김태형</Td>-->
<!--            <Td class = "text-right">[조회수가 들어갈 자리]</Td>-->
<!--        </tr>-->
<!--        <tr class="text-success bg-danger">-->
<!--            <Td>2</Td>-->
<!--            <Td>훈련소가서 싸다구맞은썰.txt</Td>-->
<!--            <Td>김동연</Td>-->
<!--            <Td class = "text-right">[조회수가 들어갈 자리]</Td>-->
<!--        </tr>-->
<!--        <tr class="text-left bg-info">-->
<!--            <Td>3</Td>-->
<!--            <Td>체스할사람 3/8</Td>-->
<!--            <Td>정윤구</Td>-->
<!--            <Td class="text-right">[조회수가 들어갈 자리]</Td>-->
<!--        </tr>-->
<!---->
<!--        </tbody>-->
<!--    </Table>-->
<!--    <a href="write.php"> <button class = "btn btn-primary pull-right">글쓰기</button></a>-->
<!--    <div class="text-center">-->
<!--        <ul class="pagination pagination-lg"> <!--부트스트랩에서 제공하는 페이징 마법사(?)-->-->
<!--            <li><a href="#">1</a></li>-->
<!--            <li><a href="#">2</a></li>-->
<!--            <li><a href="#">3</a></li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!--버튼의 종류-->
<!--<button type="button" class="btn">Basic</button>-->
<!--<button type="button" class="btn btn-default">Default</button>-->
<!--<button type="button" class="btn btn-primary">Primary</button>-->
<!--<button type="button" class="btn btn-success">Success</button>-->
<!--<button type="button" class="btn btn-info">Info</button>-->
<!--<button type="button" class="btn btn-warning">Warning</button>-->
<!--<button type="button" class="btn btn-danger">Danger</button>-->
<!--<button type="button" class="btn btn-link">Link</button>-->
<!---->
<!--버튼의 크기-->
<!--<button type="button" class="btn btn-default btn-lg">Large</button>-->
<!--<button type="button" class="btn btn-default btn-md">Medium</button>-->
<!--<button type="button" class="btn btn-default btn-sm">Small</button>-->
<!--<button type="button" class="btn btn-default btn-xs">XSmall</button>-->


</body>
</html>

