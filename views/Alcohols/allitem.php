
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://static.thenounproject.com/png/2050059-200.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .main {
            position: relative;
            display: flex;
            height: auto;
            width: auto;
            padding-left: 50px;
        }

        .loc {
            width: 200px;
            height: auto;
        }

        .con {
            width: 100%;
            height: 52px;
            position: relative;
            align-items: center;
            display: flex;
        }

        .tit {
            background: transparent;
            color: rgba(98, 0, 0, 0.76);
            font-weight: 400;
            font-size: 16px;
            text-transform: uppercase;
            padding: 10px 26px;
            border: 3px solid rgba(98, 0, 0, 0.76);
            border-radius: 15px;
            transform: translate(0);
            overflow: hidden;
            cursor: pointer;
            width: 200px;
            height: 52px;
            position: relative;
            left: 20px;
        }

        .tit:hover {
            background: rgba(98, 0, 0, 0.76);
            color: #fff;
            border-radius: 30px;
            box-shadow: 0 0 5px rgba(98, 0, 0, 0.76),
                0 0 10px rgba(98, 0, 0, 0.76),
                0 0 15px rgba(98, 0, 0, 0.76),
                0 0 20px rgba(98, 0, 0, 0.76);
        }


        .search {
            width: 500px;
            position: relative;
            display: flex;
        }

        .search input {
            position: relative;
            top: 50%;
            left: 170px;
            text-transform: translate(-50%, -50%);
            color: rgba(98, 0, 0, 0.76);
            font-style: 16px;
            background: transparent;
            width: 250px;
            height: 30px;
            padding: 10px;
            border: solid 2.5px rgba(98, 0, 0, 0.76);
            border-radius: 35px;
            transition: all 0.5s;
        }

        .search input::-webkit-input-placeholder {
            color: rgba(98, 0, 0, 0.76);
            opacity: .7;
            transition: opacity 150ms ease-out;
        }

        .search input:hover {
            box-shadow: 0 6px 20px 0 rgba(98, 0, 0, 0.76);
        }

        .search datalist {
            color: rgba(98, 0, 0, 0.76);
        }

        .search label {
            position: relative;
            top: 50%;
            left: 200px;
        }

        .ani {
            position: relative;
            text-decoration: none;
            left: 50px;
        }

        .ani label {
            width: 150px;
            height: auto;
            padding: 10px 20px;
            background-color: rgba(98, 0, 0, 0.76);
            color: rgb(255, 255, 255);
            border-radius: 25px;
        }

        .ani label:hover{
            background-color: linear-gradient(45deg, #fff, rgba(98, 0, 0, 0.76));
            color: linear-gradient(45deg, rgb(255, 178, 85, #fff));
        }

        .trap {
            position: relative;
            width: auto;
            height: auto;
            left: 15%;
        }

        .fil {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
            justify-content: center;
            list-style: none;
            padding: 0 20px;
        }

        .fil h3 {
            color: rgb(40, 83, 135);
            font-size: 18px;
            font-family: Arial, sans-serif;
            position: relative;
            justify-content: center;
            text-align: center;
            opacity: .8;
        }

        .fil p {
            display: inline;
            margin: 0;
        }

        .fil p label {
            color: rgba(98, 0, 0, 0.76);
            display: flex;
            background-color: rgb(255, 255, 255);
            border-radius: 25px;
            margin: 3px 0;
            transition: all 0.2s;
            padding: 8px 12px;
        }

        .fil p label:hover {
            border: 1px solid rgba(98, 0, 0, 0.76);
        }

        .fil p input[type="checkbox"]:checked+label {
            border: 1px solid rgba(98, 0, 0, 0.76);
            background-color: rgba(98, 0, 0, 0.76);
            color: #fff;
            transition: all 0.2s;
            opacity: .9;
        }

        .fil p input[type="radio"]:checked+label {
            border: 1px solid rgba(98, 0, 0, 0.76);
            background-color: rgba(98, 0, 0, 0.76);
            color: #fff;
            transition: all 0.2s;
            opacity: .9;
        }

        .fil p input[type="checkbox"] {
            display: absolute;
            position: absolute;
            opacity: 0;
        }

        .fil p input[type="radio"] {
            display: absolute;
            position: absolute;
            opacity: 0;
        }



        .line {
            background-color: rgba(98, 0, 0, 0.76);
            border-radius: 5px;
            width: 3px;
            height: 1000px;
        }

        .ver {
            width: 95%;
            height: 1px;
            background-color: #fff;
            border-radius: 15px;
            position: relative;
            left: 2.5%;
            margin: 10px 0;
        }

        .sp {
            position: relative;
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            width: auto;
            height: fit-content;
            gap: 10px;
            left: 7%;
        }

        .sp a {
            text-decoration: none;
        }

        .item {
            display: grid;
            width: 200px;
            height: 320px;
            border: 1px solid;
            border-color: antiquewhite;
            border-radius: 15px;
        }

        .picitem {
            width: 200px;
            height: 200px;
        }

        .picitem img {
            width: 200px;
            height: 200px;
            border-radius: 15px 15px 0 0;
        }

        .t {
            color: transparent;
        }

        .center {
            width: 200px;
            height: 40px;
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: rgb(12, 13, 13);
            opacity: .6;
        }

        .inf {
            width: 150px;
            height: 40px;
            margin: 0;
            font-size: 12px;
            overflow: hidden;
            padding: 10px 0 0 10px;
        }

        .pri {
            width: 50px;
            height: 40px;
            padding: 10px 5px 0 0;
            color: rgb(26, 24, 24);
            font-size: 14px;
            font-family: cursive;
            position: relative;
            justify-content: center;
            align-items: center;
        }

        .inff {
            height: 40px;
            width: 100%;
            overflow: hidden;
            padding: 0 10px;
            font-size: 12px;
            color: black;
            opacity: 0.6;
        }

        .addcart {
            height: 40px;
            display: flex;
            position: relative;
            width: 100%;
            justify-content: center;
            padding: 0 10px;
            gap: 10px;
            top: 5px;
        }

        .buted,
        .butde {
            position: relative;
            width: 90%;
            height: 25px;
            background-color: rgba(98, 0, 0, 0.76);
            color: rgb(255, 255, 255);
            font-size: 14px;
            border: 0 solid;
            text-align: center;
            border-radius: 15px;
        }

        .buted:hover, 
        .butde:hover {
            background: #fff;
            color: rgba(98, 0, 0, 0.76);
            border: 2px solid rgba(98, 0, 0, 0.76);
            padding-top: 0;
        }


        .buted a {
            text-decoration: none;
            color: #fff;
        }

        .buted:hover a{
            color: rgba(98, 0, 0, 0.76);
        }
        .bt {
            position: relative;
            width: 400px;
            height: auto;
            margin: 50px 0 50px 670px;
        }
    </style>
    <title>All Item</title>
</head>
<body>
    <?php include 'header.php'; ?>
    &nbsp;
    <div class="con">
        <button class="tit" type="button">Genre Filter</button>
        <div class="search">
            <input type="text" list="search" placeholder="search . . . " reuired>
            <datalist id="search">
                <option>Gin Bombay Shaphire</option>
                <option>Rum Captain Morgan</option>
                <option>Tequila Classic 1800</option>
                <option>CA'BIANCA BRACHETTO</option>
                <option>MOET & CHANDON ROSE IMPERIAL</option>
            </datalist>
            <label for="search">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </label>
        </div>
        <div class="ani">
            <a class="ani" href="addproduct.html">
                <label>Add New Item</label>
            </a>
        </div>
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
        <?php if ($Alcohols){
            foreach ($Alcohols as $i) {
                echo '<div class="item">
                <a href="/info?id='. $i->ID . '" type="button">
                    <div class="picitem">
                        <img src="'. $i->Poster . '" alt="product">
                    </div>
                    <div class="center">
                        <div class="inf">'. $i->Description  .' </div>
                        <div class="pri">'.  $i->Price . ' $</div>
                    </div>
                </a>
                <div class="addcart">
                    <a href="addproduct.html" class="butde">Edit</a>
                    <a href="#" class="butde">Delete</a>
                </div>
            </div>';
            }} else { echo ' error ';}?>
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
    <?php include 'footer.php'; ?>
</body>

</html>