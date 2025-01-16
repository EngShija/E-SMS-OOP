<?php
class Database {
   private  $connection;
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
public function getConnection(){
    return $this->connection;
}

}
