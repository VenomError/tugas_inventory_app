<?php

class StockHistory
{

    public $id;
    public $product_id;
    public $quantity = 0;
    public $type;
    public $receipt_date;

    public function stockIn()
    {
        $this->type = "stock_in";

        $product = new Product();

        $beforeUpdate = $product->find($this->product_id);

        if ($product) {

            $beforeUpdate->stock += $this->quantity;
            (new Product)->stockIn($beforeUpdate->id, $beforeUpdate->stock);
        }

        return $this;
    }

    public function stockOut()
    {
        $this->type = "stock_out";

        $product = new Product();

        $beforeUpdate = $product->find($this->product_id);

        if ($product) {

            $beforeUpdate->stock -= $this->quantity;
            (new Product)->stockIn($beforeUpdate->id, $beforeUpdate->stock);
        }

        return $this;
    }

    public function create()
    {
        return getConn()->query("INSERT INTO stock_history 
        (
        product_id,
        quantity,
        type,
        receipt_date
        )
        VALUES
        (
        '{$this->product_id}',
        '{$this->quantity}',
        '{$this->type}',
        '{$this->receipt_date}'
        )
        ");
    }

    public function all()
    {
        return getConn()->query("SELECT stock_history.* ,product.name as product_name 
        FROM stock_history
        INNER JOIN product
        ON stock_history.product_id=product.id
        ")
            ->fetch_all(MYSQLI_ASSOC);
    }
}
