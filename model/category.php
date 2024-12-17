<?php


class Category
{
    public $id;
    public $name;

    public function create()
    {
        return getConn()->query("INSERT INTO category (name) VALUES ('{$this->name}')");
    }
}
