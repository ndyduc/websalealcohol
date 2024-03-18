<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://static.thenounproject.com/png/2050059-200.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="views/CSS/homepage.css?v=2">
    <title>Cheers & Spirits</title>
</head>

<?php include 'views/header.php'; ?>

<body>
    <div class="adv">
        <img class="m2" src="https://m.media-amazon.com/images/I/81klMqfNU0L._AC_SL1500_.jpg">
    </div>
    &nbsp;
    <div class="con">
        <button class="tit" type="button">Clear Filter</button>
        <form class="search" action="index.php?controller=Alcohol&action=search" method="post">
            <input type="text" class="search-box" id="myInput" name="key" placeholder="Search . . . ">
            <datalist id="myInput">
                <option>Jängemater</option>
                <option>Rum Captain Morgan</option>
                <option>Tequila Classic 1800</option>
                <option>CA'BIANCA BRACHETTO</option>
                <option>MOET & CHANDON ROSE IMPERIAL</option>
            </datalist>
            <button type="submit" name="submit" class="butsearch" onclick="handleClick();">
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
        <form action="index.php?controller=Alcohol&action=soft" method="post">

            <div class="loc">
                <ul class="fil">
                    <h3>Genre</h3>
                    <p>
                        <input type="checkbox" id="genre1" name="genre" value="gin">
                        <label for="genre1">Gin</label>
                    </p>
                    <p>
                        <input type="checkbox" id="genre2" name="genre" value='tequila'>
                        <label for="genre2">Tequila</label>
                    </p>
                    <p>
                        <input type="checkbox" id="genre3" name="genre" value="Whisky">
                        <label for="genre3">Whisky</label>
                    </p>
                    <p>
                        <input type="checkbox" id="genre4" name="genre" value="rum">
                        <label for="genre4">Rum</label>
                    </p>
                    <p>
                        <input type="checkbox" id="genre5" name="genre" value="Volka">
                        <label for="genre5">Volka</label>
                    </p>
                    <p>
                        <input type="checkbox" id="genre6" name="genre" value="Conac">
                        <label for="genre6">Conac</label>
                    </p>
                    <p>
                        <input type="checkbox" id="genre7" name="genre" value="redwine">
                        <label for="genre7">Red Wine</label>
                    </p>
                    <p>
                        <input type="checkbox" id="genre8" name="genre" value="whitewine">
                        <label for="genre8">White Wine</label>
                    </p>
                    <p>
                        <input type="checkbox" id="genre9" name="genre" value="brandy">
                        <label for="genre9">Brandy</label>
                    </p>
                    <p>
                        <input type="checkbox" id="genre10" name="genre" value="Champagne">
                        <label for="genre10">Champagne</label>
                    </p>
                    <p>
                        <input type="checkbox" id="genre12" name="genre" value="rosewine">
                        <label for="genre12">Rosé Wine</label>
                    </p>
                    <p>
                        <input type="checkbox" id="genre13" name="genre" value="calvados">
                        <label for="genre13">Calvados</label>
                    </p>
                </ul>
                &nbsp;
                <ul class="fil">
                    <h3>Country</h3>
                    <p>
                        <input type="checkbox" id="country1" name="country">
                        <label for="country1">France</label>
                    </p>
                    <p>
                        <input type="checkbox" id="country2" name="country">
                        <label for="country2">Russian</label>
                    </p>

                    <p>
                        <input type="checkbox" id="country3" name="country">
                        <label for="country3">Spain</label>
                    </p>
                    <p>
                        <input type="checkbox" id="country4" name="country">
                        <label for="country4">Italy</label>
                    </p>
                    <p>
                        <input type="checkbox" id="country5" name="country">
                        <label for="country5">Australasia</label>
                    </p>
                    <p>
                        <input type="checkbox" id="country6" name="country">
                        <label for="country6">Germany</label>
                    </p>
                    <p>
                        <input type="checkbox" id="country7" name="country">
                        <label for="country7">USA</label>
                    </p>
                </ul>
                &nbsp;
                <div class="vibe"></div>
            </div>
        </form>
        <div class="line"></div>
        <div class="sp">
            <?php if ($Alcohols) {
                foreach ($Alcohols as $i) { ?>
                    <script>
                        // Sử dụng thư viện jQuery để gửi yêu cầu Ajax
                        $(document).ready(function() {
                            $('#submit-button').click(function(e) {
                                e.preventDefault();
                                $.ajax({
                                    type: 'POST',
                                    url: '/DABA/controllers/Detail_controller.php',
                                    data: $('#your-form-id').serialize(),
                                    success: function(response) {
                                        if (response.result) {
                                            alert('Product added to cart successfully');
                                        } else {
                                            alert('Something went wrong!');
                                        }
                                    },
                                    error: function() {
                                        alert('An error occurred');
                                    }
                                });
                            });
                        });
                    </script>
                    <div class="item">
                        <a href="index.php?controller=Alcohol&action=info&id=<?= $i->ID ?>" type="button">
                            <div class="picitem">
                                <img src="<?= $i->Poster ?>" alt="product">
                            </div>
                            <div class="center">
                                <div class="inf"><?= $i->Description ?></div>
                                <div class="pri"><?= $i->Price ?> $</div>
                            </div>
                        </a>
                        <div class="addcart">
                            <form action="index.php?controller=Detail&action=add" method="POST" class="mt-3">
                                <input type="hidden" name="CartID" value="<?= $_SESSION['id'] ?>">
                                <input type="hidden" name="IDPD" value="<?= $i->ID ?>">
                                <input type="hidden" name="PricePD" value="<?= $i->Price ?>">
                                <button name="submit" type="submit" class="butadd">Add To Cart</button>
                            </form>
                            <div class="fa">
                                <input type="checkbox" id="<?= $i->ID ?>'">
                                <label for="<?= $i->ID ?>'">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                    </svg>
                                </label>
                            </div>
                        </div>
                    </div>
            <?php // Check if the 'message' parameter is set in the URL
                    if (isset($_GET['message'])) {
                        $message = $_GET['message'];
                        echo '<p>' . htmlspecialchars($message) . '</p>';
                    }
                }
            } else {
                echo  "Can't find something like yours key !";
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