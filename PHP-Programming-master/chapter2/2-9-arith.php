﻿<?PHP
/* 연산자
 * 대입 연산자 & 산술 연산자
 */

$a = 7;
$b = 8;

$txt = sprintf("%d <br>",++$a);
echo $txt;

$txt = sprintf("%d <br>",$a++);
echo $txt;

// --연산 위치

$a++;	// 7 + 1 = 8
$b--;	// 8 - 1 = 7

$b = $a * $b + 2;	// 8 * 7 + 2 = 58

$c = $a + $b;	// 58 + 8 = 66

echo "a : $a, b : $b, c : $c<br>";

$c = $a % $b;	// 8 % 58 = 8

$b = $a + 2;	// 8 + 2 = 10

$a = $a * 3;	// 8 * 3 = 24

echo "a : $a, b : $b, c : $c";
?>
