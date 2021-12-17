<?php
include "db.php";

$api_url = 'https://reqres.in/api/users?page=2';

// Read JSON file
$json_data = file_get_contents($api_url);
if ($json_data) {
    // Decode JSON data into PHP array
    $response_data = json_decode($json_data);

    // All user data exists in 'data' object
    $user_data = $response_data->data;
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
<body class="container border border mt-4 p-3">
<!--<div class="row p-3">-->

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="submit" value="Save data" class="btn-primary btn">
    </form>
<!--</div>-->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db->saveData($user_data, "data");
}
?>
</body>
</html>