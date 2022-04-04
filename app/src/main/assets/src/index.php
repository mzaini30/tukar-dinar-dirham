<?php ob_start() ?>
	<h1>Hello World</h1>
<?php $body = ob_get_clean() ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/layout.php' ?>