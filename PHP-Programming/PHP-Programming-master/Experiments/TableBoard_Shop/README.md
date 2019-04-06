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
while($row = mysql_fetch_array($result))
    {
        echo("<tr align = 'center'>
            <td>$row[date]</td>
            <td>$row[order_id]</td>
            <td>$row[name]</td>
            <td>$row[price]</td>
            <td>$row[quantity]</td>
            <td>$row[quantity]*$row[price]</td>
            </tr>
            ");
    }
$row에 값이 더이상 들어오지 않을 때까지(모든 값을 가져오도록) 반복해서 row의 필드값들을 출력시킨다.

## board_form.php 수정
[여기에 board_form.php 를 어떻게 수정했는지, 설명을 작성하세요.]

## function
### insert.php 수정
[여기에 insert.php 를 어떻게 수정했는지, 설명을 작성하세요.]

### update.php 수정
[여기에 update.php 를 어떻게 수정했는지, 설명을 작성하세요.]

### delete.php 수정
[여기에 delete.php 를 어떻게 수정했는지, 설명을 작성하세요.]