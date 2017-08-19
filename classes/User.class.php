<?php
include_once "classes/Db.class.php";

class User {
    private $email;
    private $username;
    private $firstname;
    private $lastname;
    private $password;
    private $fullname;

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        if (empty($email)) {
            throw new Exception("Email cannot be empty");
        } else {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->email = $email;
            } else {
                throw new Exception("Email is not valid");
            }
        }
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        if (empty($username)) {
            throw new Exception("Username cannot be empty");
        } else {
            $this->username = $username;
        }
    }
    
    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname($firstname) {
        if (empty($firstname)) {
            throw new Exception("Username cannot be empty");
        } else {
            $this->firstname = $firstname;
        }
    }
    
    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname($lastname) {
        if (empty($lastname)) {
            throw new Exception("Username cannot be empty");
        } else {
            $this->lastname = $lastname;
        }
    }
    
 public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        if (empty($password)) {
            throw new Exception("Password cannot be empty");
        } else {
            $this->password = $password;
        }
    }

    public function setFullname() {
        $this->fullname = $this->getFirstName(). "".$this->getLastname();
    }
    public function getFullName() {
        return $this->fullname;
    }
    
    public function canLogin(){
        $pdo = Db::getInstance();
        $stmt= $pdo->prepare("SELECT * FROM user WHERE username = :username LIMIT 0,1");
        $stmt->bindValue(":username", $this->username);
        $stmt->execute();
            $result = $stmt->fetchAll();
       
       if(count($result) > 0){
			//password comparisation
			$hash = $result[0]['password'];
			$password = $this->password;

			if( password_verify($password, $hash)) {
				//passwords match
                $this->setUsername($result[0]['username']);
                $this->setEmail($result[0]['email']);
                $this->setFirstname($result[0]['firstname']);
                $this->setLastname($result[0]['lastname']);
                $this->setFullname();
				return true;
			}else{
				//wrong password
				return false;
		    }
        }else{
            return false;
        }
    }
    
    public function getDetails(){
        $user_data['username'] = $this->getUsername();
        $user_data['email'] = $this->getEmail();
        $user_data['fullname'] = $this->getFullName();
        
        return $user_data;
    }
    
    public function register() {
        //session_start();
        $pdo = Db::getInstance();
        $stmt = $pdo->prepare("INSERT INTO user (username, firstname, lastname, email, password) VALUES (:username, :firstname, :lastname, :email, :password)");
        $stmt->bindValue(":username", $this->username);
        $stmt->bindValue(":firstname", $this->firstname);
        $stmt->bindValue(":lastname", $this->lastname);
        $stmt->bindValue(":email", $this->email);
        $options = [
            "cost" => 11
        ];
        $hash = password_hash($this->password, PASSWORD_DEFAULT, $options);
        $stmt->bindValue(":password", $hash);
        $result = $stmt->execute();
        if($result){
            return "toegoevoegd";
        }else{
            return "mislukt";
        }
    }

}
?>