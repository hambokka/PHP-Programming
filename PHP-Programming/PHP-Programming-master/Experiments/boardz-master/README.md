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
        echo("                   
            <li>
                <h1>$row[title]</h1>
                $row[contents]
                <img src=$row[image_url] alt=\"demo image\"/>
            </li>        
            ");
        if($count%3 == 0){
            echo("</ul><ul>");
        }
    }
    echo("</ul>");

cmd창에서 계정으로 로그인 하는것과 동시에 < boardz.sql 을 입력하여 해당  sql파일에 적혀있는 구문을 실행하도록 하였다.
count 변수를 만들어 사진이 일정 개수만큼 추가되면 다음으로 넘어가 추가하도록 하였다.


검색했을 때에 나오는 사진묶음의 개수파악
그 후에 그 값을 3으로 나누고 그 나머지도 파악
ex) 7 -> 몫 2, 나머지 1 -> [3,2,2]개씩 존재하게됨
 4 -> 몫 1, 나머지 1 -> [2,1,1]개씩 존재
 2 -> 몫 0, 나머지 2 -> [1,1,0]개씩 존재
 5 -> 몫 1, 나머지 2 -> [2,2,1]개씩 존재
 6 -> 몫 2, 나머지 0 -> [2,2,2]개씩 존재
 