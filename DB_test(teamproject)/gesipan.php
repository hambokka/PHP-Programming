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
<!--<form action="read.php" method="get">-->

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
                <th width="100">기종</th>
                <th width="100">조회수</th>
            </tr>
            </thead>
            <?php
            $connect = mysqli_connect("localhost","ohty","1231","oty_db");
//            $sql = mq("select * from gesipan order by Board_Num desc limit 0,10"); // board테이블에있는 idx를 기준으로 내림차순해서 5개까지 표시
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }
            $sql = mq("select * from gesipan");
            $row_num = mysqli_num_rows($sql); //게시판 총 레코드 수
            $list = 10; //한 페이지에 보여줄 개수
            $block_ct = 10; //블록당 보여줄 페이지 개수

            $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
            $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
            $block_end = $block_start + $block_ct - 1; //블록 마지막 번호

            $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
            if($block_end > $total_page) $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
            $total_block = ceil($total_page/$block_ct); //블럭 총 개수
            $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.

            $sql2 = mq("select * from gesipan order by Board_Num desc limit $start_num, $list");
//            echo $row_num;
            $num = 0; // 페이지네이션을 위한 변수
            while($gesipan = $sql2->fetch_array())
            {
                $Board_title=$gesipan["Board_title"];
                if(strlen($Board_title)>30)
                {
                    $Board_title=str_replace($gesipan["Board_title"],mb_substr($gesipan["Board_title"],0,30,"utf-8")."...",$gesipan["title"]); //title이 30을 넘어서면 ...표시
                }
                ?>
                <tbody>
                <!--<tr onclick="location.href = (<?/* echo "read.php/num=$gesipan[Board_Num]"*/?>//)">-->
                    <? echo("<tr onclick=\"location.href = ('read.php?Board_Num=$gesipan[Board_Num]')\"> ");?>
<!--                    --><?// echo $gesipan[Board_Num];?>
                    <td width="70"><?php
                        if ($_GET['page'] < 1)
                            echo $row_num-$num;
                        else
                            echo $row_num-$num-$list*($_GET['page']-1); ?></td>
<!--                    <td width="500" name = "B_Num" value = "--><?// echo $gesipan[Board_Num];?><!--"><a href="read.php">--><?php //echo $Board_title;?><!--</a></td>-->
                    <td width="500"><? echo $gesipan[Board_title]; ?>
<!--                        <input type="text" name ="Test2" value =--><?// echo $gesipan[Board_writer];?><!-- />-->



                    <td width="120"><?php echo $gesipan['Board_writer'];?></td>
                    <td width="100"><?php echo $gesipan['Board_genre'];?></td>
                    <td width="100"><?php echo $gesipan['Board_views'];?></td>
                    <?$num++;?>
                </tr>
                </tbody>
            <?php } ?>
<!--</form>-->
        </table>
        <div id="write_btn">
            <a href="write.php"><button type="button" class="btn btn-default">글쓰기</button></a>
        </div>
        <div id="page_num">
            <ul>
                <?php
                if($page <= 1)
                { //만약 page가 1보다 크거나 같다면
                    echo "<li style='float: left; margin-left: 10px; text-align: center'>처음</li>"; //처음이라는 글자에 빨간색 표시
                }else{
                    echo "<li style='float: left; margin-left: 10px; text-align: center'><a href='?page=1'>처음</a></li>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
                }
                if($page <= 1)
                { //만약 page가 1보다 크거나 같다면 빈값

                }else{
                    $pre = $page-1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
                    echo "<li style='float: left; margin-left: 10px; text-align: center'><a href='?page=$pre'>이전</a></li>"; //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
                }
                for($i=$block_start; $i<=$block_end; $i++){
                    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
                    if($page == $i){ //만약 page가 $i와 같다면
                        echo "<li style='float: left; margin-left: 10px; text-align: center'>[$i]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
                    }else{
                        echo "<li style='float: left; margin-left: 10px; text-align: center'><a href='?page=$i'>[$i]</a></li>"; //아니라면 $i
                    }
                }
                if($block_num >= $total_block){ //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
                }else{
                    $next = $page + 1; //next변수에 page + 1을 해준다.
                    echo "<li style='float: left; margin-left: 10px; text-align: center'><a href='?page=$next'>다음</a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
                }
                if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
                    echo "<li style='float: left; margin-left: 10px; text-align: center' >마지막</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
                }else{
                    echo "<li style='float: left; margin-left: 10px; text-align: center'><a href='?page=$total_page'>마지막</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
                }
                ?>
            </ul>
        </div>
        <div class="text-center">
        <ul class="pagination pagination-lg"> <!--부트스트랩에서 제공하는 페이징 마법사(?)-->
            <?php
/*            if($page <= 1) {
                echo "<li>처음</li>";
            }
            else {
                echo "<li><a href='?page=1'>처음</a></li>";
            }
            if($page <= 1){}
            else {
                $pre = $page-1;
                echo "<li><a href='?page=$pre'>이전</a></li>";
            }
            */?>
<!--            <li><a href="#">1</a></li>-->
<!--            <li><a href="#">2</a></li>-->
<!--            <li><a href="#">3</a></li>-->
        </ul>
    </div>
</div>































<!---->
<!--<h1 class="text-danger">이것은 게시판이다.</h1>-->
<!---->
<!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요합니다) -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
<!--<script src="js/jquery.min.js"></script> 위 js를 다운받아 폴더에 참조하였습니다. 이렇게 하는게 더 좋겠죠? -->
<!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->
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
<!--        --><?php
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
<!--        <ul class="pagination pagination-lg"> 부트스트랩에서 제공하는 페이징 마법사(?)-->
<!--            <li><a href="#">1</a></li>-->
<!--            <li><a href="#">2</a></li>-->
<!--            <li><a href="#">3</a></li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</div>-->
<!---->
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

