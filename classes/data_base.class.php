data_base.class.php
<?php
/**
 * 
 */
class data_base implements \Iterator 
{
	static private $db_enable;
	static private $connection = NULL;

	static private $query = NULL;
	function connect_to_db() {
		$db = new \PDO('mysql:host=localhost;dbname=people;charset=utf8','root', '');
		return $db;
	}

	function __construct(){
		if(!self::$connection)
		{self::$connection = static::connect_to_db();
		self::$db_enable++;}

	}

	function __destruct(){
		self::$db_enable--;
		if(self::$db_enable == 0 ){self::$connection = NULL;}

	}

	function insert($fields){
		$s1 = 'INSERT INTO ';
	}

	function select() {

	}


	function current() {
        return 0;
    }

    function key() {
        return 0;
    }

    function next() {
        return 0;
    }

    function rewind() {
        return 0;
    }

    function valid() {
        return 0;
    }
}
