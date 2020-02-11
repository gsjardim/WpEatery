<?php

class WebsiteUser{
    /* Host address for the database */
    protected static $DB_HOST = "localhost";
    /* Database username */
    protected static $DB_USERNAME = "root";
    /* Database password */
    protected static $DB_PASSWORD = "password";
    /* Name of database */
    protected static $DB_DATABASE = "wp_eatery";
    
    private $userID;
    private $username;
    private $password;
    private $mysqli;
    private $dbError;
    private $lastlogin;
    private $authenticated = false;
    
    function __construct() {
        $this->mysqli = new mysqli(self::$DB_HOST, self::$DB_USERNAME, 
                self::$DB_PASSWORD, self::$DB_DATABASE);
        if($this->mysqli->errno){
            $this->dbError = true;
        }else{
            $this->dbError = false;
        }
    }
    public function authenticate($username, $password){
        $loginQuery = "SELECT * FROM adminusers WHERE username = ? AND password = ?";
        $stmt = $this->mysqli->prepare($loginQuery);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $this->userID = $row["adminID"];
            $this->username = $username;
            $this->password = $password;
            $this->lastlogin = $row["lastLogin"];
            $this->authenticated = true;
        }
        $stmt->free_result();
    }
    public function isAuthenticated(){
        return $this->authenticated;
    }
    public function hasDbError(){
        return $this->dbError;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getLastLogin(){
        
        return date('m/d/Y', strtotime($this->lastlogin));
        
    }
    
    public function getUserID(){
        return $this->userID;
    }
    public function saveLastLogin($username){
        $lastlogin = date("Y-m-d");
        $query = "UPDATE adminusers SET lastLogin = ? WHERE username = ?";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('ss', $lastlogin, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
    }
}
?>
