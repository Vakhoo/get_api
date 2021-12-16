<?php
require "db.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "api_data";
$db = new db($servername, $username, $password, $dbname);

$api_url = 'https://reqres.in/api/users?page=2';

// Read JSON file
$json_data = file_get_contents($api_url);
echo "<pre>";
//print_r(json_decode($json_data));
if ($json_data) {
    // Decode JSON data into PHP array
    $response_data = json_decode($json_data);
//    echo $response_data;
//    print_r($response_data);

    // All user data exists in 'data' object
    $user_data = $response_data->data;

    // Cut long data into small & select only first 10 records
    $user_data = array_slice($user_data, 0, 9);
//    print_r($user_data);

    // Print data if need to debug
    //print_r($user_data);

    // Traverse array and display user data
    foreach ($user_data as $user) {
//        echo $user;
        echo "<br />";
//        echo "name: " . $user->employee_age;
    }
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>News Rss</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="container border border- mt-4 align-items-center">
<div class="row p-3">

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="col-3" method="post">
        <input type="hidden" name="action" value="create_db">
        <input type="submit" class="btn-primary m-2 btn" value="Create Db">
    </form>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="col-3" method="post">
        <input type="hidden" name="action" value="create_table">
        <input type="submit" class="btn-primary m-2 btn" value="Create Table" ">
    </form>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="col-3" method="post">
        <input type="hidden" name="action" value="save_data">
        <input type="submit" class="btn-primary m-2 btn" value="Save data">
    </form>
</div>
<?php
$link = "https://makitweb.com/feed";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['action'];
    switch ($name) {
        case "create_db":
            $db->createDb();
            break;
        case "create_table":
            $db->createTable("data");

    }
}
?>

</body>
</html>