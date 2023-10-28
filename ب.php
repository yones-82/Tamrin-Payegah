// افزودن محصول جدید

<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

// ایجاد اتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Products (product_name, product_info)
VALUES ('Product_1', 'Product Information')";

if ($conn->query($sql) === TRUE) {
  echo "New product created successfully!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

//ویرایش اطلاعات محصول

<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

// ایجاد اتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE Products SET product_info='New Product Information' WHERE id=1";

if ($conn->query($sql) === TRUE) {
  echo "Record  product updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>

// حذف به روش(نرم) سافت وار محصول 

<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

// ایجاد اتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE Products SET deleted_at=NOW() WHERE id=1";

if ($conn->query($sql) === TRUE) {
  echo "Record soft deleted successfully";
} else {
  echo "Error soft deleting record: " . $conn->error;
}

$conn->close();
?>
