<!-- 구글 검색 : galley board css => CSS Only Pinterest-like Responsive Board Layout - Boardz.css | CSS ... -->
<!-- 출처 : https://www.cssscript.com/css-pinterest-like-responsive-board-layout-boardz-css/ -->

<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8"> 

    <title>Boardz Demo</title>
    <meta name="description" content="Create Pinterest-like boards with pure CSS, in less than 1kB.">
    <meta name="author" content="Burak Karakan">
    <meta name="viewport" content="width=device-width; initial-scale = 1.0; maximum-scale=1.0; user-scalable=no" />
    <link rel="stylesheet" href="src/boardz.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/wingcss/0.1.8/wing.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="seventyfive-percent  centered-block">
        <!-- Sample code block -->
        <div-->
            <hr class="seperator">

            <!-- Example header and explanation -->
            <div class="text-center">
                <h2>Beautiful <strong>Boardz</strong></h2>
                <div style="display: block; width: 50%; margin-right: auto; margin-left: auto; position: relative;">
                    <form class="example" action="board.php" method="POST">
                        <input type="text" placeholder="Search.." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>

            <!--<hr class="seperator fifty-percent">-->
            <div class="boardz centered-block beautiful">
            <?php
            $connect = mysql_connect("localhost","ohty","1231");    // MySQL 데이터베이스 연결
            mysql_select_db("oty_db", $connect);         // DB 선택


            $sql="select image_url, title, contents from boardz where title like '%$_POST[search]%';";
            $result=mysql_query($sql,$connect);
            /**/
            $count = 0;
            $j = 0;
            $scale = 0;
            /*while($row = mysql_fetch_array($result)) {
                $scale++;               // 검색된 사진들의 총 개수를 저장한다.
            }*/

            echo("<ul>");
            while($row=mysql_fetch_array($result))
            {
                $count++;
                $j++;
                echo("<li>");
                    if($row[title] != NULL){
                    echo("<h1>$row[title]</h1>");
                    }
                    echo("$row[contents]<br>");
                    echo("<img src=$row[image_url] alt=\"demo image\"/>");
                echo("</li>");

                if($count%2 == 0){
                    if($j != 6) {
                        echo("</ul><ul>");
                    }
                }
            }
            echo("</ul>");
            /*
            $count = 1;
            echo("<li>");
            while($row = mysql_fetch_array($result))
            {
                $count++;
                echo("
                <ul>
                    <h1>$row[title]</h1>
                    $row[contents]
                    <img src = $row[image_url] alt = \"demo image\"/>
                    </ul>
                    ");
                if($count%3 == 0)
                {
                    echo("</li><li>");
                }
            }
            echo("</li>");
*/

            ?>
        </div-->
        <hr class="seperator">
    </div>
</body>
</html>