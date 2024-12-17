<?php

class Product
{

    public $id;
    public $category_id;
    public $name;
    public $stock;
    public $status_stock = 'habis';
    public $in_stock = 0;
    public $price;

    private $warningStock = 10;


    public function cekStock()
    {

        $data = getConn()->query("SELECT * FROM product WHERE status_stock='habis'")->fetch_all(MYSQLI_ASSOC);
        foreach ($data as $item) {
            getConn()->query("UPDATE product SET in_stock='0' WHERE id='{$item['id']}'");
        }

        $warningStock = getConn()->query("SELECT * FROM product WHERE stock<={$this->warningStock}")->fetch_all(MYSQLI_ASSOC);
        foreach ($warningStock as $item) {
            getConn()->query("UPDATE product SET status_stock='hampir habis' WHERE id='{$item['id']}'");
        }

        $stockHabis = getConn()->query("SELECT * FROM product WHERE stock <=0")
            ->fetch_all(MYSQLI_ASSOC);
        foreach ($stockHabis as $item) {
            getConn()->query("UPDATE product SET status_stock='habis' WHERE id='{$item['id']}'");
        }

        $stockTersedia = getConn()->query("SELECT * FROM product WHERE stock >{$this->warningStock}")->fetch_all(MYSQLI_ASSOC);
        foreach ($stockTersedia as $item) {
            getConn()->query("UPDATE product SET status_stock='tersedia' WHERE id='{$item['id']}'");
        }
    }

    public function all()
    {

        $this->cekStock();
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
        (category_id,name,stock,in_stock,status_stock,price)
        VALUES
        (
        '{$this->category_id}',
        '{$this->name}',
        '{$this->stock}',
        '{$this->in_stock}',
        '{$this->status_stock}',
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
        status_stock='{$this->status_stock}',
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
