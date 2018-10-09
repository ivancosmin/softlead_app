<?php
include ("DatabaseConfig.php");
class Connection
{
    private static $conn = null;

    static function getConnection(){

        $database = DatabaseConfig::getConfigFile();
        if (self::$conn == null) {

            try {
                self::$conn = new PDO("mysql:host=" . $database['hostname'] . ";dbname=" . $database['database'], $database['username'], $database['password']);

            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
        }
        return self::$conn;
    }

    static function loginUser($email, $password){
        $sql = "SELECT * FROM users WHERE ";
        $stmt_email = self::$conn->prepare($sql . "email='" . $email . "'");
        $stmt_email->execute();
        $pass = $stmt_email->fetch();

        if(isset($pass['password']) || isset($pass['temp_password']) ){
            if ($pass['password'] == $password){
                $data = Connection::selectData("users", "email", $_SESSION['email']);
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['permission'] = $data[0]['permision'];
                $_SESSION['id_user'] = $data[0]['id_users'];
                $_SESSION['uid'] = $data[0]['uid'];
                return $pass['email'];
            }
            elseif($pass['temp_password'] == $password){
                $data = Connection::selectData("users", "email", $_SESSION['email']);
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['permission'] = $data[0]['permision'];
                $_SESSION['id_user'] = $data[0]['id_users'];
                $_SESSION['uid'] = $data[0]['uid'];
                return $pass['email'];
            }
            else{
                return 0;
            }
        }
    }

    static function insertMultipleValues($table, $val ,$value=array()){
        $n = count($value);
        for ($i = 0; $i < $n; $i++){
            $stmt = self::$conn->prepare("INSERT INTO ".$table."(users_id_users, benefits_id_benefits) VALUES ('". $val. "','".$value[$i]."')");
            $stmt->execute();
        }
    }

    static function insertData($table, $value=array()){ //AddOrUpdate sau //Add
        $columns = implode(", ",array_keys($value));

        $values = array_values($value);
        $new_values = array();
        foreach ($values as $value)
            array_push($new_values, "'" . $value . "'");

        $escaped_values = implode(", ", array_values($new_values));

        $stmt = self::$conn->prepare("INSERT INTO ".$table." (".$columns.") VALUES (".$escaped_values.")");
        return $stmt->execute();
    }

    static function selectData($table, $id=false, $id_use=false, $order=false, $start=false, $finish=false){ //List all
        if($id && $id_use && !$order){
            $stmt = self::$conn->prepare("SELECT * FROM " . $table . " WHERE " . $id . "='" . $id_use . "'");
        }
        else if($start && $finish){
            $stmt = self::$conn->prepare("SELECT * FROM " . $table . " LIMIT " . $start . ", " . $finish );
        }
        elseif($id && $id_use && $order){
            $stmt = self::$conn->prepare("SELECT * FROM " . $table . " WHERE " . $id . "='" . $id_use . "' ORDER BY id_requirements ". $order);
        }
        elseif ($order) {
            $stmt = self::$conn->prepare("SELECT * FROM ". $table ." ORDER BY id_requirements ". $order);
        }
        else{
            $stmt = self::$conn->prepare("SELECT * FROM " . $table);
        }
        $stmt->execute();

        $list = $stmt->fetchAll();

        return $list;
    }

    static function selectMultiple($table, $id1, $id_use1, $id2, $id_use2){
        $stmt = self::$conn->prepare("SELECT * FROM " . $table . " WHERE " . $id1 . "='" . $id_use1 . "' AND ". $id2 . "='" . $id_use2 . "'");
        $stmt->execute();
        $list = $stmt->fetchAll();
        return $list;
    }

    static function updateData($table, $value=array(), $id, $id_use){
        $field = "";
        foreach ($value as $key=>$val){
            $field .= $key . "='" . $val . "',";
        }
        $field = substr($field, 0, -1);
        $stmt = self::$conn->prepare("UPDATE ". $table . " SET ". $field . " WHERE ". $id ."='". $id_use . "'");
        return $stmt->execute();

    }

    static function deleteData($table, $id , $id_use){
        $stmt = self::$conn->prepare("DELETE FROM " . $table . " WHERE " . $id . "='" . $id_use . "'");
        $stmt->execute();
    }



    /**
     * @return PDO
     */
    public function getConn()
    {
        return self::$conn;
    }

    /**
     * @param PDO $conn
     */
    public function setConn($conn)
    {
        self::$conn = $conn;
    }

    static function printArray($in){
        echo "<pre>";
        var_dump($in);
        echo "</pre>";
    }

}
?>