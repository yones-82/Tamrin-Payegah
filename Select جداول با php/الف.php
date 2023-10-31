<?php
class Product {
    public $id;
    public $name;
    public $description;
    public $price;

    function __construct($id, $name, $description, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    function displayProduct() {
        echo "ID: " . $this->id . "<br>";
        echo "Name: " . $this->name . "<br>";
        echo "Description: " . $this->description . "<br>";
        echo "Price: " . $this->price . "<br>";
    }
}

$products = array(
    new Product(1, 'Product 1', 'This is product 1', 100),
    new Product(2, 'Product 2', 'This is product 2', 200),
    new Product(3, 'Product 3', 'This is product 3', 300)
);

foreach ($products as $product) {
    $product->displayProduct();
}
?>
