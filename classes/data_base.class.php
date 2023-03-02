<?php
class data_base implements \Iterator 
{
	protected const TABLE_NAME = 'person';
    protected const DEFAULT_ORDER = '';
    protected const RELATIONS = [];
	static private $db_enable;
	static private $connection = NULL;
	private $record = FALSE;
	private $query = NULL;

	function connect_to_db() {
		try {
			$db = new \PDO('mysql:host=localhost;
			dbname=people;charset=utf8','root', '');
			return $db;
		} catch (\PDOException $e) {
			throw $e;
		}
		
	}

	function __construct(){ // enable db -----------
		if(!self::$connection)
		{self::$connection = self::connect_to_db(); self::$db_enable++;}
	}

	function __destruct(){ //disable db ------------
		self::$db_enable--;
		if(self::$db_enable == 0 ){self::$connection = NULL;}
	}

	function run($sql, $params = null){ // run a sql query ------------- 
		if($this->query)
			$this->query->closeCursor();//close a query --------------
		$this->query = static::$connection->prepare($sql);
		if ($params) {
			foreach ($params as $key => $value) {
				$k =(is_integer($key)) ? $key+ 1 : $key ;
				switch (gettype($value)) {
                    case 'integer':
                        $t = \PDO::PARAM_INT;
                        break;
                    case 'boolean':
                        $t = \PDO::PARAM_BOOL;
                       break;
                    case 'NULL':
                        $t = \PDO::PARAM_NULL;
                        break;
                    default:
                        $t = \PDO::PARAM_STR;
                }
				$this->query->bindValue($k, $value, $t);	
			}
		}
		$this->query->execute();
			
	}

	function insert($fields){
		$sql = 'INSERT INTO '. static::TABLE_NAME;
		$s2 = $s1 = '';
		foreach ($fields as $field => $zero) {
				if ($s1) {
					$s1 .=', ';
					$s2 .=', ';
				}
			$s1 .= $field;
			$s2 .= ':' . $field;
		}
		$sql .= '(' . $s1 . ') VALUES (' . $s2 . ')';
		$this -> run($sql, $fields);
	}

	function select() {

	}


	function current() {
        return $this->record;
    }

    function key() {
        return 0;
    }

    function next() {
        $this->record = $this->query->fetch(\PDO::FETCH_ASSOC);
    }

    function rewind() {
        $this->record = $this->query->fetch(\PDO::FETCH_ASSOC);
    }

    function valid() {
        return $this->record !== FALSE;
    }
}
