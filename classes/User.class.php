<?php
class User {
    private $email;
    private $username;
    private $firstname;
    private $lastname;
    private $password;

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

    public function setFirstname($lastname) {
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

    public function register() {
        $pdo = Db::getInstance();
        $stmt = $pdo->prepare("INSERT INTO user (username, firstname, lastname, email, password) VALUES (:username, :fullname, :email, :password)");
        $stmt->bindValue("username", $this->username);
        $stmt->bindValue("firstname", $this->firstname);
        $stmt->bindValue("lastname", $this->lastname);
        $stmt->bindValue("email", $this->email);
        $options = [
            "cost" => 11
        ];
        $hash = password_hash($this->password, PASSWORD_DEFAULT, $options);
        $stmt->bindValue("password", $hash);
        return $stmt->execute();
    }

}
?>