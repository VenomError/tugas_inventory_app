<?php


class Category
{
    public $id;
    public $name;

    public function create()
    {
        return getConn()->query("INSERT INTO category (name) VALUES ('{$this->name}')");
    }

    public function all()
    {
        return getConn()->query("SELECT * FROM category")->fetch_all(MYSQLI_ASSOC);
    }

    public function delete()
    {
        return getConn()->query("DELETE FROM category WHERE id='{$this->id}'");
    }

    public function update()
    {
        return getConn()->query("UPDATE category SET name='{$this->name}' WHERE id='{$this->id}'");
    }
}
