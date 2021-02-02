<?php
    include('config/db_connect.php');

    if (isset($_POST['submit'])) {
        $title =  $_POST["title"];
        $category =  $_POST["category"];
        $money =  $_POST["money"];

        $imageName = $_FILES["image"]['name'];
        $target_dir = "./images ";
        $file_name = basename($_FILES['image']['name']);
        $targetFilePath = $target_dir . $file_name;
        $file_tmp = $_FILES['image']['tmp_name'];

        $title = mysqli_real_escape_string($conn, $title);
        $category = mysqli_real_escape_string($conn, $category);
        $money = mysqli_real_escape_string($conn, $money);
        $image =  mysqli_real_escape_string($conn, $targetFilePath);
        echo $money;
        $sql = "INSERT INTO quiz (nazwa, zdjecie, kategoria, cena) VALUES ('$title', '$image', '$category', '$money')";
        
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
        if(mysqli_query($conn, $sql)){

        }else{
            echo 'query error: ' .mysqli_error($conn);
        }
    }else{
        header("Location: ./");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanks You!</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="thanks">
        <h1 class="text">
            Quiz created, thank you!
        </h1>
        <main class="quiz">
            <div class="left">
                <img src="./images/<?php echo $imageName; ?>" alt="Logo">
                <div class="info">
                    <h3 class="title"><?php echo $title?></h3>
                    <p>Entry Fee: <span class="money"><?php echo $money?></span></p>
                </div>
            </div>
            <div class="right">
                <p>Quiz category: <span class="category"><?php echo $category?></span></p>
            </div>
        </main>
        <a class="procced" href="./">
            Create another one!
        </a>
    </div>
</body> 