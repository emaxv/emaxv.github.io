<?php
class Connection {
	public static $user;
	public static $pass;
	public static $host;
	public static $dbname;
	private static $connection = null;
	private $dbh = null;
	private function __construct () { }
	private function __clone () { }
	private function __wakeup () { }
	public static function getInstance(){
		if (empty(self::$connection)) {
			self::$connection = new self();
			return self::$connection;
		}
	}
	public function connect() {
		$dsn = self::$host.  ";" . self::$dbname;
		if (!(self::$connection->dbh instanceof PDO)) {
			try {
				
				self::$connection->dbh = new PDO($dsn, self::$user, self::$pass);
				self::$connection->dbh->exec("SET CHARACTER SET utf8");
				self::$connection->dbh->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::FETCH_ASSOC);
				return self::$connection->dbh;
			}
			catch (PDOException $e) {
				echo '<br>Не удалось установить соединения с базой данных: ' . $e->getMessage(). '<br>';
			}
		}
		else {
			return self::$connection->dbh;
		}
	}
}
?>