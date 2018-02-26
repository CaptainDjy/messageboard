<?php
class Message {
	public $name;
	public $time;
	public $content;
	function __construct($n, $t, $c) {
		$this->name = $n;
		$this->time = $t;
		$this->content = $c;
	}
	function show() {
		echo "Name:" . $this->name . "<br>";
		echo "Time:" . $this->time . "<br>";
		echo "Content:" . $this->content . "<br>";
		echo "================================" . "<br>";
	}
}
class DB {
	var $database = null;
	function __construct() {
		$dbhost = "127.0.0.1";
		$account = "root";
		$password = "djy1994"; //此处用自己的密码
		$this->database = mysql_connect($dbhost, $account, $password);
		if ($this->database) {
			//echo "DB connected." . "<br>";
		} else {
			//echo "DB connected fail" . "<br>";
		}
		$result = mysql_select_db("db_messages", $this->database);
		if ($result) {
			//echo "DB select success." . "<br>";
		} else {
			//echo "DB select fail." . "<br>";
		}
	}
	function __destruct() {
		mysql_close($this->database);
	}
}
//$m = new Message('1', '2', '3');
//$m->show();
//$d = new DB;
//var_dump($m);
?>