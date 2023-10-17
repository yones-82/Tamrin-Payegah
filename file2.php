<?php
// اطلاعات اتصال به دیتابیس
$host = "localhost"; // آدرس سرور پایگاه داده
$username = "root"; // نام کاربری برای ورود به دیتابیس
$password = ""; // رمز عبور حساب کاربری
$dbname = "test"; // نام دیتابیس

// ارتباط با سرور پایگاه داده
$conn = mysqli_connect($host, $username, $password, $dbname);

// بررسی موفق بودن ارتباط
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// دریافت داده‌های فرم ارسال پیام
$user_id = $_POST['user_id']; // شناسه کاربر
$text = $_POST['text']; // متن پیام

/
//  SQL برای درج پیام جدید در جدول 
$sql = "INSERT INTO messages (user_id, text) VALUES ('$user_id', '$text')";

// اجرای دستور SQL و بررسی موفق بودن آن
if (mysqli_query($conn, $sql)) {
    echo "Message inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// قطع ارتباط با دیتابیس
mysqli_close($conn);
?>
