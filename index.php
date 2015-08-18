<?php

session_start();

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

function resetSession() {
	$_SESSION['correct_count'] = 0;
	$_SESSION['num'] = 0;
}

function redirect() {
	header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['reset']) && $_POST['reset'] === '1') {
		resetSession();
		redirect();
	}
	if ($_POST['answer'] === $quizList[$_POST['qnum']]['a'][0]) {
		// echo "正解！";
		// exit;
		$_SESSION['correct_count']++;
	}
	$_SESSION['num']++;
	redirect();
}

// var_dump($quizList);

if (empty($_SESSION)) {
	resetSession();
}

$qnum = mt_rand(0, count($quizList) - 1);
$quiz = $quizList[$qnum];

$_SESSION['qnum'] = (string)$qnum;

shuffle($quiz['a']);

?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<title>簡単クイズ</title>
	</head>
	<body>
		<div style="padding:7px;background:#eee;border:#ccc";>
			<?php echo h($_SESSION['num']); ?> 問中、
			<?php echo h($_SESSION['correct_count']); ?>問正解！
		</div>
		<h1>簡単クイズ</h1>
		<p>Q. <?php echo h($quiz['q']); ?></p>
		<?php foreach ($quiz['a'] as $answer) : ?>
			<form action="" method="post">
				<input type="submit" name="answer" value="<?php echo h($answer); ?>">
				<input type="hidden" name="qnum" value="<?php echo h($_SESSION['qnum']); ?>">
			</form>
		<?php endforeach; ?>
		<hr>
		<form action="" method="post">
			<input type="submit" value="リセット">
			<input type="hidden" name="reset" value="1">
		</form>
	</body>
</html>