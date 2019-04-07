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
    
    //사용자가 검색한 값을 $_POST[search] boardz 테이블에서 찾는 코드
    $sql="select image_url, title, contents from boardz where title like '%$_POST[search]%';"; 
    
    
    $result=mysql_query($sql);  
    
    $count = 1;         // 출력 횟수
    echo("<ul>");
    while($row=mysql_fetch_array($result))
    {
        $count++;
        echo("                   
            <li>
                <h1>$row[title]</h1>    // 테이블에서 가져온 title을 출력
                $row[contents]          // 테이블에서 가져온 contents 출력
                <img src=$row[image_url] alt=\"demo image\"/> // 테이블에서 이미지 경로를 가져와 이미지를 출력
            </li>        
            ");
    
    
        //count가 3으로 나누어 떨어질때마다 열을 바꾸어준다.
        if($count%3 == 0){
            echo("</ul><ul>");
        }
    }
    echo("</ul>");

cmd창에서 계정으로 로그인 하는것과 동시에 < boardz.sql 을 입력하여 해당  sql파일에 적혀있는 구문을 실행하도록 하였다.
