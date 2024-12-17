<?php

class Product
{

    public $id;
    public $category_id;
    public $name;
    public $stock;
    public $in_stock = 0;
    public $price;

    public function all()
    {

        return getConn()
            ->query("SELECT product.* , category.name as category_name 
         FROM product
         INNER JOIN category
         ON product.category_id=category.id
         ")
            ->fetch_all(MYSQLI_ASSOC);
    }

    public function create()
    {

        $query = "INSERT INTO product
        (category_id,name,stock,in_stock,price)
        VALUES
        (
        '{$this->category_id}',
        '{$this->name}',
        '{$this->stock}',
        '{$this->in_stock}',
        '{$this->price}'
        )
        ";

        return getConn()->query($query);
    }

    public function update()
    {
        return getConn()->query("UPDATE product SET
        category_id='{$this->category_id}',
        name='{$this->name}',
        stock='{$this->stock}',
        price='{$this->price}'
        WHERE id='{$this->id}'
        ");
    }


    public function validate()
    {
        if (empty($this->category_id) || empty($this->name)) {
            throw new Exception('Category dan Nama Product Tidak Boleh Kosong');
        } else {
            return true;
        }
    }

    public function updateInStock()
    {
        return getConn()->query("UPDATE product SET in_stock='{$this->in_stock}' WHERE id='{$this->id}'");
    }

    public function delete()
    {
        return getConn()->query("DELETE FROM product WHERE id='{$this->id}'");
    }
}
