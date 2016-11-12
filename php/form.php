<html>
<head>
<title>FORM</title>
</head>
<body>

<?php

require_once('../../../mysqli_connect.php');   // Connect to MySQL.     AMPP

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $f_name = test_input($_POST['fname']);
    $f_email = test_input($_POST['femail']);
    $f_tel = test_input($_POST['ftel']);
    $f_comm = test_input($_POST['fcomment']);
}

function test_input($data) {   
    $data = trim($data);           // Strip unnecessary characters (extra space, tab, newline)
    $data = stripslashes($data);      // Remove backslashes (\)
    $data = htmlspecialchars($data);    // Converts special characters to HTML entities
    return $data;
}

$query = "INSERT INTO form_table (FirstName, Email, Telephone, Comment) 
VALUES (?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $query);                          // prepared statements
        
mysqli_stmt_bind_param($stmt, "ssis", $f_name, $f_email, $f_tel, $f_comm);
        
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

mysqli_close($conn);

// header('Location:/');
// exit;
    
?>

</body>
</html>