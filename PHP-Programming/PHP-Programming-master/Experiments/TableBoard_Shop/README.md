# TableBoard_Shop
게시판-Shop 의 TODO 완성하기!

## 기존 파일
```
 .
├── css - board_form.php와 index.php 에서 사용하는 stylesheet
│   └── ...
├── fonts - 폰트
│   └── ...
├── images - 아이콘 이미지
│   └── ...
├── vender - 외부 라이브러리
│   └── ...
├── js - board_form.php와 index.php 에서 사용하는 javascript
│   └── ...
├── function
│   └── insert.php - 게시글 작성 기능 구현
│   └── update.php - 게시글 수정 기능 구현
│   └── delete.php - 게시글 삭제 기능 구현
├── board_form.php - 게시글 작성/수정 시 사용하는 form이 포함된 php 파일
├── index.php - 게시글 조회 기능 구현
```

## MySQL 테이블 생성!

[여기에 테이블 생성 시, 사용한 Query 를 작성하세요.]
Note: 
- table 이름은 tableboard_shop 으로 생성
- 기본키는 num 으로, 그 외의 속성은 board_form.php 의 input 태그 name 에 표시된 속성 이름으로 생성
- 각 속성의 type 은 자유롭게 설정 (단, 입력되는 값의 타입과 일치해야 함)
    - ex) price -> int
    - ex) name -> char or varchar
    
    create table tableboard_shop(
                  -> num int not null auto_increment,
                  -> date date,
                  -> order_id char(20),
                  -> name char(20),
                  -> price int,
                  -> quantity int,
                  -> primary key(num)
                  );
    
## index.php 수정
[여기에 index.php 를 어떻게 수정했는지, 설명을 작성하세요.]

$sql = "select * from tableboard_shop";
// sql 쿼리 실행
$result = mysql_query($sql,$connect);

mysql_connect를 사용하여 mysql에 접속한다.
mysql_select_db를 사용하여 oty_db에 연결한다.
$sql변수에 tableboard_shop 테이블의 모든 필드값을 가져오는 명령어를 저장한다.
$result를 해당 $sql을 mysql에 입력하는 명령어로 저장한다.
$row에 값이 더이상 들어오지 않을 때까지(모든 값을 가져오도록) 반복해서 row의 필드값들을 출력시킨다.

## board_form.php 수정
[여기에 board_form.php 를 어떻게 수정했는지, 설명을 작성하세요.]
mysql_connect를 사용하여 mysql에 접속한다.
mysql_select_db를 사용하여 oty_db에 연결한다.
$sql변수에 num번째 tableboard_shop 레코드를 가져오는 명령어를 저장한다.
$result를 해당 $sql을 mysql에 입력하는 명령어로 저장한다.
$row로 각 레코드를 순차적으로 가져오도록 한다.

php 코드 echo()를 사용하여 각$row에서 가져온 필드값을 출력할 수 있도록 한다. 

## function
### insert.php 수정
[여기에 insert.php 를 어떻게 수정했는지, 설명을 작성하세요.]
mysql_connect를 사용하여 mysql에 접속한다.
mysql_select_db를 사용하여 oty_db에 연결한다.
입력받은 값들을 $_POST로 받아와 새로운 레코드를 만드는 명령어를 $sql에 저장한다.
$result로 해당 명령어를 mysql에서 수행하도록 한다.

### update.php 수정
[여기에 update.php 를 어떻게 수정했는지, 설명을 작성하세요.]
mysql_connect를 사용하여 mysql에 접속한다.
mysql_select_db를 사용하여 oty_db에 연결한다.
입력받은 값들을 $_POST로 받아와 이미 있는 레코드를 수정하는 명령어를 $sql에 저장한다.
$result로 해당 명령어를 mysql에서 수행하도록 한다.

### delete.php 수정
[여기에 delete.php 를 어떻게 수정했는지, 설명을 작성하세요.]
mysql_connect를 사용하여 mysql에 접속한다.
mysql_select_db를 사용하여 oty_db에 연결한다.
삭제 버튼을 눌렀던 화면에서의 primary key에 해당하는 num값을 $_GET으로 받아와 해당 레코드를 삭제하는 명령어를 $sql에 저장한다.
$result로 해당 명령어를 mysql에서 수행하도록 한다.