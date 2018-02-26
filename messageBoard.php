<?php
include_once 'item.php';
class MessageBoard extends DB {
	var $messages = array();
	function __construct() {
		parent::__construct();
		echo "$_POST[content]" . "$POST_[userName]" . "<br>";
		$this->receiveMessage();
		$this->loadData();
		$this->showAllMessages();
		$this->showForm();
	}
	function receiveMessage() {
		if (count($_POST) != 0) {
			$this->saveData($_POST[userName], date("Y-m-d h:i:s", time()), $_POST[content]);
		}
	}
	function saveData($u, $t, $c) {
		$query = "INSERT INTO `all_message`( `name`, `time`, `content`) VALUES ('" . $u . "','" . $t . "','" . $c . "');";
		mysql_query($query);
	}
	function loadData() {
		$query = "SELECT * FROM `all_message`;";
		$result = mysql_query($query);
		while ($row = mysql_fetch_array($result)) {
			$temp = new Message($row['name'], $row['time'], $row['content']);
			array_push($this->messages, $temp);
		}
	}
	function showAllMessages() {
		foreach ($this->messages as $m) {
			$m->show();
		}
	}
	function showForm() {
		echo "<form action='' method='POST'>";
		echo "Name:" . "<input type='text' name='userName'>" . "<br>";
		echo "Content:" . "<input type='text' name='content'>";
		echo "<input type='submit'>";
		echo "</form>";
	}
}
$dd = new MessageBoard();
?>