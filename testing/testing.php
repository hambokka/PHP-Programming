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
</body>
</html> 