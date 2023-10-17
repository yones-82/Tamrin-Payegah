<?php
// اطلاعات اتصال به دیتابیس
$host = "localhost"; // آدرس سرور پایگاه داده 
$username = "root"; // نام کاربری برای ورود به دیتابیس
$password = ""; // رمز عبور کاربری
$dbname = "test"; // نام دیتابیس

// ارتباط با سرور پایگاه داده
$conn = mysqli_connect($host, $username, $password, $dbname);

// بررسی برقراری ارتبا
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// دریافت داده‌های فرم ثبت نام 
$name = $_POST['name']; // نام کاربر
$email = $_POST['email']; // ایمیل 

// SQL برای درج کاربر در جدول 
$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

// بررسی موفق بودن و اجرای دستور 
if (mysqli_query($conn, $sql)) {
    echo "User inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// قطع ارتباط با دیتابیس
mysqli_close($conn);
?>
