<?php
/**
 * Created by PhpStorm.
 * User: eike
 * Date: 25.08.16
 * Time: 10:01
 */
/**
 * Class to Manage Database connection and query
 * @name        config.php
 * @author      Eike Drost
 * @version     1.0
 * @category    Database Manage
 */
class Database
{
    protected $host="";
    protected $username="";
    protected $password="";
    protected $database="";

    /**
     * @var mysqli $myconn
     */
    protected $myconn;

    /**
     *
     * Function to manage the Connection Database
     *
     * @return string
     *
     */
    private function __construct()
    {
        $this->connectToDatabase();

    }

    private function connectToDatabase()
    {
        $conn = mysqli_connect($this->host,$this->username,$this->password,$this->database);
        if(!$conn)
        {
            die ("Cannot connect to the database");
        }
        else
        {
            $this->myconn = $conn;
        }
        return $this->myconn;
    }

    /*
     *
     * Function to manage the disconnect from Database
     *
     */
    private function closeConnection() {
        mysqli_close($this->myconn);
    }

    /*
     * @param $sql
     * @return bool|mysqli_result
     *
     */
    private function databaseQuery($sql) {
        if($sql){
            $result = $this->myconn->query($sql);
        }
        else
        {
            return FALSE;
        }
        return $result;
    }

    public function getDataFromDatabase($tableName, $sqlWhere) {
        $sql = "SELECT * FROM ".$tableName ." ". $sqlWhere;
        $queryResult = $this->databaseQuery($sql);

        if (!$queryResult) {
            return false;
        }
        return $queryResult;
    }

    public function insertDataIntoDatabase ($tableName, $rows, $values) {
        $sql = "INSERT INTO ".$tableName." (".$rows.") VALUES (".$values.")";
        $result = $this->databaseQuery($sql);

        return $result;
    }

    public function createTable($table, $rows) {
        $sql = " CREATE TABLE ".$table." (".$rows.")";
        $result = $this->databaseQuery($sql);

        return $result;
    }

    public function countItems($tableName) {
        $sql = "SELECT COUNT(*) FROM " .$tableName;
        $queryResult = $this->databaseQuery($sql);
        return $queryResult;
    }

    public function fetchFields($query) {
        if ($query) {
            return mysqli_fetch_field($query);
        } else {
            return FALSE;
        }
    }

    public function fetchRow($query) {
        if ($query) {
            return mysqli_fetch_row($query);
        } else {
            return FALSE;
        }
    }

    public function fetchOneArray($query) {
        if ($query) {
            return mysqli_fetch_array($query);
        } else {
            return FALSE;
        }
    }

    public function fetchAllArray($query) {
        if ($query) {
            return mysqli_fetch_array($query, MYSQLI_ASSOC);
        } else {
            return FALSE;
        }
    }

    public function fetchArrayItems($query) {
        $Item = array();
        while ($var = mysqli_fetch_array($query)) {
            $Item[] = $var;

        }
        return $Item;
    }

    public function escapeString($str) {
        return $this->myconn->real_escape_string($str);
    }

    public function fetchAssoc($query) {
        if ($query) {
             $row = mysqli_fetch_assoc($query);
             return $row['COUNT(*)'];
        } else {
            return FALSE;
        }
    }

    public function limitPage($tableName, $itemsPerPage) {
        $query = $this->countItems($tableName);
        $count = $this->fetchAssoc($query);

        $limit = $count / $itemsPerPage;
        $result = floor($limit);
        return $result;
    }
}
?>
