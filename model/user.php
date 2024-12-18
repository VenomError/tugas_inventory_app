<?php

class User
{

    public $id;
    public $name;
    public $email;
    public $password;

    public function register()
    {
        $this->validate();
        return getConn()->query("INSERT INTO user (name,email,password) VALUES (
        '{$this->name}',
        '{$this->email}',
        '{$this->password}'
        )");
    }

    public function getUser()
    {
        $result  = getConn()->query("SELECT * FROM user WHERE email='{$this->email}'");
        if ($result->num_rows > 0) {
            return $result->fetch_object();
        } else {
            throw new Exception("Failed to get User ");
        }
    }

    public function validate()
    {
        if (empty($this->name) || empty($this->email) || empty($this->password)) {
            throw new Exception('Name or Email or Password  Tidak Boleh Kosong');
        } else {
            return true;
        }
    }
}
