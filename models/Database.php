<?php
/**
 * Undocumented class
 */
class Database {
   private  $connection;
   /**
    * Undocumented function
    *
    * @param string $hostname
    * @param string $username
    * @param string $password
    * @param string $databasename
    */
   function __construct(private $hostname = 'localhost', private $username = 'root', private $password = '', private $databasename = 'e_smsdb'){
    $this->hostname = $hostname;
    $this->username = $username;
    $this->password = $password;
    $this->databasename = $databasename;

    try{
        $this->connection = new mysqli($this->hostname, $this->username, $this->password, $this->databasename);
    }
    catch(exception $e){
        die("Connection failed- " . $e->getMessage());
   }

}
/**
 * 
 * @return mysqli
 */
public function getConnection(){
    return $this->connection;
}

public function add_login_history($user_id, $user_email, $login_status){
    $sql = "INSERT INTO login_history(user_id, user_email,  status) VALUES(?, ?, ?)";
    return $this->connection->execute_query(query: $sql, params: [$user_id, $user_email, $login_status]);
}
public function get_login_history($user_id){
    $sql = "SELECT * FROM login_history WHERE user_id = ? ORDER BY login_time DESC";
    return $this->connection->execute_query(query: $sql, params: [$user_id])->fetch_all(MYSQLI_ASSOC);
}
public function clear_login_history($user_id){
    $sql = "DELETE FROM login_history WHERE user_id = ?";
    return $this->connection->execute_query(query: $sql, params: [$user_id]);
}

}
