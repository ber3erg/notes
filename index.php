<?php 

$file = fopen("bd.txt", 'r');
$bd = [];
while($i = fgets($file)){
    $id = number_format(substr($i, 4, -1));
    $name = substr(fgets($file), 6);
    $text = substr(fgets($file), 6);
    $bd[$id] = array(
        'id' => $id,
        'name' => $name,
        'text' => $text
        );
        
        fgets($file); // для выборки из файла всех строк "---"
}


fclose($file);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Заметки для МРК</title>
    <script src="menu.js" defer></script>
</head>
<body>

<header>
    <div class="inner">
        <img id="menu" src="images/menu.png" alt="меню">
    </div>
</header>

<main>
    <div class="wrapper">
        <div id="inner" class="inner">
            <div id="notes">

                <?php 
                    for($i = 1; $i <= count($bd); $i++){
                        echo '<div onclick="make_active_or_dis('.$bd[$i]["id"].')" id="'.$bd[$i]["id"].'" class="note">
                                <div class="block_note">
                                    <div class="circle">
                                        <img src="images/close.png" alt="закрыть">
                                    </div>
                                    <article>
                                        <h2>'.$bd[$i]["name"].'</h2>
                                        <p class="description">'
                                            .mb_substr($bd[$i]["text"], 0, 50) . '..'.
                                        '</p>
                                        <p class="text_note">'
                                            .$bd[$i]["text"].
                                        '</p>
                                    </article>
                                </div>
                            </div>';
                    }
                ?>
                
            </div>
        </div>
    </div>
</main>

<footer>
    <div class="inner">
        13 сентября 2023г
    </div>
</footer>
</body>
</html>