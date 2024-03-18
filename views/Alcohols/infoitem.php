<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="views/CSS/infor.css?v=3">
    <title>Item</title>
</head>

<body style="margin: 0;">
    <?php if ($Alcohols) { ?>
        <form method="post" action="index.php?controller=Detail&action=add&id=<?= $Alcohols->ID ?>&Price=<?= $Alcohols->Price ?>">

            <div class="top">
                <div class="topleft">
                    <div class="nameal"><?= $Alcohols->Name ?></div>
                    <img src="<?= $Alcohols->Poster ?>">
                </div>
                <div class="center">
                    <div class="top1">
                        <div class="line"></div>
                        <div class="content">Detail</div>
                        <div class="line"></div>
                    </div>
                    <div class="cenmain">
                        <img src="">
                        <div class="cenback">
                            <div class="descript">- <?= $Alcohols->Description ?></div>
                        </div>
                    </div>
                </div>
                <div class="topright">
                    <div class="top1">
                        <div class="line"></div>
                        <div class="content">Information</div>
                        <div class="line"></div>
                    </div>
                    <div class="top2">
                        <div class="top21">
                            <div class="top211">
                                <img src="views/CSS/type.png">
                                <div class="top2112">
                                    <div class="topcontent">Type of Product :</div>
                                    <div class="topinfor"><?= $Alcohols->Genre ?></div>
                                </div>
                            </div>
                            <div class="top211">
                                <img src="views/CSS/from.png">
                                <div class="top2112">
                                    <div class="topcontent">Country :</div>
                                    <div class="topinfor"><?= $Alcohols->Country ?></div>
                                </div>
                            </div>
                            <div class="top22">
                                <div class="top221">
                                    <p>Price :</p>
                                    <div class="price"><?= $Alcohols->Price ?> $</div>
                                </div>
                                <?php if($_SESSION['position'] === 0 || $_SESSION['position'] === 1){
                                    echo ' ';
                                } else {
                                    echo'<button name="submit" type="submit">Add to cart</button>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php // Check if the 'message' parameter is set in the URL
        if (isset($_GET['message'])) {
            $message = $_GET['message'];
            echo '<p>' . htmlspecialchars($message) . '</p>';
        }
    } else {
        echo ' error ';
    } ?>
    <div class="ads">
        <img src="views/CSS/image.png">
    </div>
</body>

</html>