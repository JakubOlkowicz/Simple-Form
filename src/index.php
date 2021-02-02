<?php

    include('config/db_connect.php');

    $sql = 'SELECT * FROM quiz ORDER BY id_quiz DESC';
    $result = mysqli_query($conn, $sql);

    $allQuiz = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head> 
<body>
    <main class="form">
        <form name="simple"
            target="_blank" 
            action="thanks.php" 
            method="POST" 
            onsubmit="validateForm()"  
            enctype="multipart/form-data"
            >
            <div class="inputs">
                <div class="details">
                    <h3 class="title">Your quiz details:</h3>
                    <div class="input-box">
                        <label for="input-title">Quiz title</label>
                        <input name="title" 
                            type="text" 
                            id="input-title" 
                            placeholder="Enter quiz title"
                            minlength="5" 
                            maxlength="50"/>
                        <label for="input-title">The title can't be longer than 50 chars.</label>
                        <p class='valid' id='valid-title'>Sorry, but your quiz title is shorter than 5 chars</p>
                    </div>
                    <div class="input-box">
                        <label for="input-title">Quiz logo</label>
                        <div class="files">
                            <input type="file" 
                                name="image"  
                                id="img" 
                                accept="image/jpeg, image/png" >
                            <label class="custom-file-input" id="pseudo-img" for="img"></label>
                        </div>
                        <label for="img">only .JPG .PNG</label>
                        <p class='upload'>Already uploaded logo</p>                    
                        <p class='valid' id='valid-img'>Please upload a logo for your quiz</p>
                    </div>
                </div>
                <div class="topic">
                    <h3 class="title">Select your quiz topic:</h3>
                    <div class="input-box">
                        <label for="category">Category</label>
                        <div class="custom-select">
                            <select name="category" id="category">
                                <option value="">Choose category</option>
                                <option value="knowledge">Knowledge</option>
                                <option value="movie">Movie</option>
                                <option value="game">Game</option>
                                <option value="book">Book</option>
                            </select>
                        </div>
                        <p class='valid' id='valid-category'>Please provide a category for your quiz</p>
                    </div>
                    <div class="input-box">
                        <label for="money">Quiz entry fee</label>
                        <input 
                            type="text" 
                            name="money" 
                            id="money" 
                            value="£5.00" 
                            data-type="currency"
                            placeholder="£5.00"
                            maxlength="8"
                        />
                        <label for="money">Min entry fee is £5.00.</label>
                        <p class='valid' id='valid-money'>Please provide a money for your quiz</p>
                    </div>
                </div>
            </div>
            <button name="submit" class="procced" type="submit">Proceed</button>
        </form>
        <section class="all-quiz">
            <div class="quiz-wrapper">
            <?php foreach($allQuiz as $quiz):?>
                <div class="quiz">
                    <img src="<?php echo htmlspecialchars($quiz['zdjecie'])?>" alt="">
                    <h2>Title: <b><?php echo htmlspecialchars($quiz['nazwa'])?></b></h2>
                    <p>Category: <b><?php echo htmlspecialchars($quiz['kategoria'])?></b></p>
                    <p>Price: <b><?php echo htmlspecialchars($quiz['cena'])?></b></p>
                </div>
            <?php endforeach ?>
            </div>
        </section>
    </main>
<script src="./js/inputFile.js"></script>   
<script src="./js/inputSelect.js"></script>
<script src="./js/inputMoney.js"></script>
<script src="./js/formsValidate.js"></script>
</body>
</html>