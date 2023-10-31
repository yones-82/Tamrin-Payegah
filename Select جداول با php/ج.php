//لیست پیام ها  تماس با ما برای نمایش به ادمین و جزییات یک پیام
<?php
// اتصال به دیتابیس
$db = new PDO('mysql:host=localhost;dbname=testdb;charset=utf8', 'username', 'password');

// دریافت لیست پیام‌ها
$query = $db->query("SELECT * FROM messages");
$messages = $query->fetchAll(PDO::FETCH_ASSOC);

echo "<h1>پیام‌های تماس با ما</h1>";

foreach ($messages as $message) {
    echo "ID: " . $message['id'] . "<br>";
    echo "Name: " . $message['name'] . "<br>";
    echo "Email: " . $message['email'] . "<br>";
    echo "Message: " . $message['message'] . "<br>";
    echo "<hr>";
}

// دریافت جزئیات یک پیام خاص
$message_id = 1; // شناسه پیام مورد نظر
$query = $db->prepare("SELECT * FROM messages WHERE id = :id");
$query->execute(['id' => $message_id]);
$message_details = $query->fetch(PDO::FETCH_ASSOC);

echo "Message Details:<br>";
echo "ID: " . $message_details['id'] . "<br>";
echo "Name: " . $message_details['name'] . "<br>";
echo "Email: " . $message_details['email'] . "<br>";
echo "Message: " . $message_details['message'] . "<br>";
?>
