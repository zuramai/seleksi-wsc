<?php

$img = imagecreatefrompng("image.png");
$total = [];

for($x = 0; $x < imagesx($img); $x++) {
    for($y = 0; $y < imagesy($img); $y++) {
        $color = imagecolorat($img, $x, $y);
        if(isset($total[$color])) $total[$color]++;
        else $total[$color] = 0;
    }
}
arsort($total);
$total = array_slice($total,0,3,true);
print_r($total);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D6</title>
    <style>
    body {
        background-color: black;
    }
    .boxes {
        display: flex;
    }
    .box {
        width: 100px;
        height: 100px;
    }
    </style>
</head>
<body>
    <div class='boxes'>
        <?php  foreach($total as $key => $value): 
                $color = imagecolorsforindex($img, $key);?>
            <div class="box" style="background: rgb(<?= $color['red'] ?>, <?= $color['green'] ?>,<?= $color['blue'] ?>)"></div>
        <?php endforeach  ?>
    </div>
</body>
</html>