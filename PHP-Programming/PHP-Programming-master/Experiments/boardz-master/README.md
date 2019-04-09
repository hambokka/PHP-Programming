# boardz
게시판 검색 기능 완성하기

## 기존 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.html
```

## 추가 및 수정된 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.php (수정)
[만약 추가한 파일이 있으면, 내용 추가! 없으면 이 문구 삭제!]
```
## board.php (수정)

    $connect = mysql_connect("localhost","ohty","1231");    // MySQL 데이터베이스 연결
    mysql_select_db("oty_db", $connect);         // DB 선택
    
* $_POST가 포함되어 있는 title값이 존재하는 레코드를 boardz 테이블에서 찾아오는 코드를 $sql에 저장한다.
    
     
    $sql="select image_url, title, contents from boardz where title like '%$_POST[search]%';"; 
    $result=mysql_query($sql);  
    
    $count = 1;
    echo("<ul>");
    while($row=mysql_fetch_array($result))
    {
        $count++;
        if($_POST[search] == NULL) {
            echo("<li>");
            if ($row[title] != NULL) {
                echo("<h1>$row[title]</h1>");
            }
            echo("$row[contents]<br>");
            echo("<img src=$row[image_url] alt=\"demo image\"/>");
            echo("</li>");

            if ($count % 2 == 0) {
                if ($count != 6) {
                    echo("</ul><ul>");
                }
            }
        }
        else{
            echo("<li>");
            if ($row[title] != NULL) {
                echo("<h1>$row[title]</h1>");
            }
            echo("$row[contents]<br>");
            echo("<img src=$row[image_url] alt=\"demo image\"/>");
            echo("</li>");
            echo("</ul>");
            if($row[title] != "sumo" && $row[title] != "summo")
                break;
            if($count != 3) {
                echo("<ul>");
            }
        }
    }
    echo("</ul>");

cmd창에서 계정으로 로그인 하는것과 동시에 < boardz.sql 을 입력하여 해당  sql파일에 적혀있는 구문을 실행하도록 하였다.
count 변수를 만들어 사진이 일정 개수만큼 추가되면 다음으로 넘어가 레코드를 화면에 출력하도록 하였다.
검색창에 입력된 문자가 없을 경우에는 PPT파일에서 보여주는 형태로 출력이 이루어진다.
검색창에 입력된 문자가 있을 경우에, 하나의 레코드만 출력되는 경우는 break을 이용하여 탈출한다.
검색창에 입력된 문자가 있고, 다수의 레코드가 출력되는 경우 오른쪽으로 한칸씩 옮겨가며 출력된다.




 