<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://static.thenounproject.com/png/2050059-200.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="views/CSS/allitem.css?v=2">
    <title>All Item</title>
</head>

<body>
    <?php include 'views/adbar.php' ; ?>
    &nbsp;
    <div class="con">
        <button class="tit" type="button">Genre Filter</button>
        <form class="search" action="" method="GET">
            <input type="hidden" name="controller" value="posts">
            <input type="hidden" name="action" value="search">
            <input type="text" class="search-box" id="myInput" name="input" placeholder="Search . . . ">
            <datalist id="myInput">
                <option>Gin Bombay Shaphire</option>
                <option>Rum Captain Morgan</option>
                <option>Tequila Classic 1800</option>
                <option>CA'BIANCA BRACHETTO</option>
                <option>MOET & CHANDON ROSE IMPERIAL</option>
            </datalist>
            <button type="submit" class="butsearch" onclick="handleClick();">
                <label for="search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </label>
            </button>
        </form>
        <div class="trap">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">1</a>
                    </li>
                    <li class="page-item"><a class="page-link" style="color:rgba(98, 0, 0, 0.76); " href="#">2</a></li>
                    <li class="page-item"><a class="page-link" style="color:rgba(98, 0, 0, 0.76); " href="#">3</a></li>
                    <li class="page-item"><a class="page-link" style="color:rgba(98, 0, 0, 0.76); " href="#">4</a></li>
                    <li class="page-item"><a class="page-link" style="color:rgba(98, 0, 0, 0.76); " href="#">...</a></li>
                    <li class="page-item"><a class="page-link" style="color:rgba(98, 0, 0, 0.76); " href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
    &nbsp;
    <div class="main">
        <div class="loc">
            <ul class="fil">
                <h3>Genre</h3>
                <p>
                    <input type="checkbox" id="genre1" name="genre">
                    <label for="genre1">Gin</label>
                </p>
                <p>
                    <input type="checkbox" id="genre2" name="genre">
                    <label for="genre2">Tequila</label>
                </p>
                <p>
                    <input type="checkbox" id="genre3" name="genre">
                    <label for="genre3">Whisky</label>
                </p>
                <p>
                    <input type="checkbox" id="genre4" name="genre">
                    <label for="genre4">Rum</label>
                </p>
                <p>
                    <input type="checkbox" id="genre5" name="genre">
                    <label for="genre5">Volka</label>
                </p>
                <p>
                    <input type="checkbox" id="genre6" name="genre">
                    <label for="genre6">Conac</label>
                </p>
                <p>
                    <input type="checkbox" id="genre7" name="genre">
                    <label for="genre7">Red Wine</label>
                </p>
                <p>
                    <input type="checkbox" id="genre8" name="genre">
                    <label for="genre8">White Wine</label>
                </p>
                <p>
                    <input type="checkbox" id="genre9" name="genre">
                    <label for="genre9">Brandy</label>
                </p>
                <p>
                    <input type="checkbox" id="genre10" name="genre">
                    <label for="genre10">Champagne</label>
                </p>
                <p>
                    <input type="checkbox" id="genre11" name="genre">
                    <label for="genre11">Jängemater</label>
                </p>
                <p>
                    <input type="checkbox" id="genre12" name="genre">
                    <label for="genre12">Rosé Wine</label>
                </p>
                <p>
                    <input type="checkbox" id="genre13" name="genre">
                    <label for="genre13">Scotch Whiskey</label>
                </p>
                <p>
                    <input type="checkbox" id="genre14" name="genre">
                    <label for="genre14">Isrish Whiskey</label>
                </p>
            </ul>
            &nbsp;
            <ul class="fil">
                <h3>Country</h3>
                <p>
                    <input type="checkbox" id="ct1" name="ct">
                    <label for="ct1">France</label>
                </p>
                <p>
                    <input type="checkbox" id="ct2" name="ct">
                    <label for="ct2">Russian</label>
                </p>

                <p>
                    <input type="checkbox" id="ct3" name="ct">
                    <label for="ct3">Spain</label>
                </p>
                <p>
                    <input type="checkbox" id="ct4" name="ct">
                    <label for="ct4">Italy</label>
                </p>
                <p>
                    <input type="checkbox" id="cr5" name="ct">
                    <label for="cr5">Australasia</label>
                </p>
                <p>
                    <input type="checkbox" id="ct6" name="ct">
                    <label for="ct6">Germany</label>
                </p>
                <p>
                    <input type="checkbox" id="ct7" name="ct">
                    <label for="ct7">USA</label>
                </p>
            </ul>
            &nbsp;
            <div class="vibe"></div>
        </div>
        <div class="line"></div>
        <div class="sp">
            <?php if ($Alcohols) {
                foreach ($Alcohols as $i) { ?>
                    <div class="item">
                        <a href="index.php?controller=Alcohol&action=info&id=<?= $i->ID ?>">
                            <div class="picitem">
                                <img src="<?= $i->Poster ?>" alt="product">
                            </div>
                            <div class="center">
                                <div class="inf"><?= $i->Country ?></div>
                                <div class="pri"><?= $i->Price ?> $</div>
                            </div>
                            <div class="inff"><?= $i->Description ?></div>
                        </a>
                        <div class="addcart" >
                            <a href="index.php?controller=Alcohol&action=edit&id=<?= $i->ID ?>" class="butde">Edit</a>
                            <?php if($i->Status == 1) 
                                    echo '<div class="butde" style="background-color: #fff;">Hided</div>';
                                else 
                                    echo '<div id="delete'. $i->ID .'" class="butde" >Delete</div>'; 
                            ?>
                        </div>

                        <div class="cdel" id="warn<?= $i->ID ?>">
                            <div class="warn">Are You sure!</div>
                            <div class="conf">
                                <div class="butde" id="cancel<?= $i->ID ?>">Cancel</div>
                                <a class="butde" href="index.php?controller=Alcohol&action=delete&id=<?= $i->ID ?>">Confirm</a>
                            </div>
                        </div>

                        <script>
                            var cancel = document.getElementById("cancel<?= $i->ID ?>");
                            var del = document.getElementById("delete<?= $i->ID ?>");
                            var warn<?= $i->ID ?> = document.getElementById("warn<?= $i->ID ?>");

                            del.onclick = function() {
                                warn<?= $i->ID ?>.style.display = "block";
                            }
                            cancel.onclick = function() {
                                warn<?= $i->ID ?>.style.display = "none";
                            }
                        </script>

                    </div>
                    <?php
                    if (isset($_GET['message'])) {
                        $message = $_GET['message'];
                        echo '<p>' . htmlspecialchars($message) . '</p>';
                    }
                }
            } else {
                echo ' error ';
            } ?>
        </div>
    </div>
    <div class="bt">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">1</a>
                </li>
                <li class="page-item"><a class="page-link" style="color:rgba(98, 0, 0, 0.76); " href="#">2</a></li>
                <li class="page-item"><a class="page-link" style="color:rgba(98, 0, 0, 0.76); " href="#">3</a></li>
                <li class="page-item"><a class="page-link" style="color:rgba(98, 0, 0, 0.76); " href="#">4</a></li>
                <li class="page-item"><a class="page-link" style="color:rgba(98, 0, 0, 0.76); " href="#">...</a></li>
                <li class="page-item"><a class="page-link" style="color:rgba(98, 0, 0, 0.76); " href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</body>

</html>