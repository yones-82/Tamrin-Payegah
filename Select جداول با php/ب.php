// لیست کاربران و پرفایل کاربر
<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// ایجاد اتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, username, profile FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // خروجی داده هر سطر
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["username"]. " - Profile: " . $row["profile"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

// پروفایل کاربر و تایید کردن کاربر 

<?php
session_start();

// بررسی آیا کاربر وارد شده است
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header('location: login.php');
    exit;
}

// اتصال به پایگاه داده
$conn = new mysqli($servername, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// دریافت اطلاعات پروفایل بر اساس شناسه کاربر
$sql = "SELECT profile FROM users WHERE id = ?";
if($stmt = $conn->prepare($sql)){
    // پیوست شناسه کاربر به پرس و جو
    $stmt->bind_param("i", $_SESSION['id']);
    
    // اجرای پرس و جو
    if($stmt->execute()){
        // ذخیره نتیجه
        $result = $stmt->get_result();
        
        if($result->num_rows == 1){
            // دریافت سطر نتیجه
            $row = $result->fetch_array(MYSQLI_ASSOC);
            
            // نمایش پروفایل
            echo "Profile: " . $row["profile"];
        } else{
            // نمایش خطا در صورت عدم وجود کاربر با شناسه مشخص
            echo "Error: Could not find a user with that ID.";
        }
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
}

// بستن اتصال
$conn->close();
?>

