<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMDB</title>
    <?php 
    require('movie.php');

    $api_url = 'https://imdb-api.com/en/API/Top250Movies/k_9ap8u82u';
    // Read JSON file
    $json_data = file_get_contents($api_url);
    // Decode JSON data into PHP array
    $response_data = json_decode($json_data);
    $array = array();

    foreach ($response_data->items as $key => $value) {
           $class = new Movie($response_data->items[$key]->title);
           $array[$key] = $class;
    }

    ?>
</head>
<body>
    <h1>Top 250 Movies</h1>
    <ul>
    <?php foreach($array as $key=>$value){ ?>
        <li><?php echo $value->title; ?></li>
    <?php } ?>
    </ul>
</body>
</html>