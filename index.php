<?php

function h($s) {
	return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

$quizList = array(
	array(
		'q' => '最も可愛いのは？',
		'a' => array('大島優子', '猫', 'Ryoma', '犬')
	),
	array(
		'q' => '神に近いのは？',
		'a' => array('大島優子', 'おとんのいびき', '蚊', '工事現場')
	),
	array(
		'q' => '適度なボディは？',
		'a' => array('大島優子', 'おかん', 'ともだち', 'サザエさん')
	),
	array(
		'q' => '結婚するなら？',
		'a' => array('大島優子', '美空ひばり', '蒼井そら', '尼さん')
	)
);

var_dump($quizList);

?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>簡単クイズ</title>
	</head>
	<body>
		<h1>簡単クイズ</h1>
		
	</body>
</html>