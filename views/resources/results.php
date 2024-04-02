<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <?php

    if ($validation->fails()) {
        // handling errors
        $errors = $validation->errors();
        echo "<pre>";
        print_r($errors->firstOfAll());
        echo "</pre>";
        exit;
    } else {
        // validation passes
        echo "Success!";
    }
    ?>

</body>

</html>