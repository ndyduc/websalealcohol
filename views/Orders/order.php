<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="views/CSS/order.css?v=5">
    <title>The Order</title>
</head>

<?php
if ($_SESSION['position'] === 0 || $_SESSION['position'] === 1)
    include 'views/adbar.php';
else
    include 'views/header.php' ?>

<body>
    <div class="mainpro">
        <div class="proleft">
            <h4> The Order </h4>
            <?php
            $total = 0;
            if ($details && $alcohols) {
                for ($i = 0; $i < count($alcohols); $i++) {
                    $total += $details[$i]->TotalPD; ?>
                    <div class="spp">
                        <img src="<?= $alcohols[$i]->Poster ?>" alt="product">
                        <div class="infsp">
                            <div class="nsp">
                                <div class="n">
                                    <?= $alcohols[$i]->Name ?>
                                </div>
                                <div class="pp">
                                    <?= $details[$i]->TotalPD ?> $
                                </div>
                            </div>
                            <div class="infpro">
                                <?= $alcohols[$i]->Description . $result["message"] ?>
                            </div>
                            <div class="quan">One quality
                                <div class="tity">Quantity : <?= $details[$i]->AM ?>
                                </div>
                                <div class="edit">
                                    <div class="fav">
                                        <input type="checkbox" id="love">
                                        <label for="love">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                            </svg>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<h1> There is nothing in yours cart ! </h1> ';
            } ?>
            <p>Pick up appointment</p>
            <a href="#">Find a Store</a>
            <hr>
            <h3>Favorites</h3>
        </div>
        <div class="proright">
            <h3>Information</h3>
            <?php if ($Order) { ?>
                <div class="sub">
                    Order's
                    <div class="pric"><?= $Order->CusName ?></div>
                </div>
                <div class="en">
                    Total
                    <div class="pric"><?= $Order->Total ?> $</div>
                </div>
                <div class="en">
                    Location
                    <div class="pric"><?= $Order->CusAddr ?></div>
                </div>
                <div class="en">
                    Phone Number
                    <div class="pric">0<?= $Order->CusPhone ?></div>
                </div>
                <div class="payment">
                    <?php if ($Order->Status == 'Cash' || $Order->Status == 'Cash-process' || $Order->Status == 'Cash-delivery')
                        echo '<label class="pay cas">Pay later</label>';
                    elseif ($Order->Status == 'Cancel')
                        echo '<label class="pay can"></label>';
                    else
                        echo '<label class="pay car">Had pay</label>';
                    ?>
                </div>
                <hr>
                <div class="total">
                    Order's ID
                    <div class="tal"># <?= $Order->CartID ?></div>
                </div>
                <div class="total">
                    Day created
                    <div class="tal"><?= $Order->Date ?></div>
                </div>
                <hr>
                <?php if ($_SESSION['position'] === 0 || $_SESSION['position'] === 1) { ?>
                    <form id="Status" action="index.php?controller=Order&action=status" method="post">
                        <input type="hidden" name="CartID" value="<?= $Order->CartID ?>">
                        <label>Status :</label>
                        <select name="Status" onchange="submitForm()">
                            <option value="Cash" <?php echo ($Order->Status == 'Cash') ? 'selected' : ''; ?>>Cash</option>
                            <option value="Cash-process" <?php echo ($Order->Status == 'Cash-process') ? 'selected' : ''; ?>>Cash-process</option>
                            <option value="Cash-delivery" <?php echo ($Order->Status == 'Cash-delivery') ? 'selected' : ''; ?>>Cash-delivery</option>
                            <option value="Cash-done" <?php echo ($Order->Status == 'Cash-done') ? 'selected' : ''; ?>>Cash-done</option>
                            <option value="Card" <?php echo ($Order->Status == 'Card') ? 'selected' : ''; ?>>Card</option>
                            <option value="Card-process" <?php echo ($Order->Status == 'Card-process') ? 'selected' : ''; ?>>Card-process</option>
                            <option value="Card-delivery" <?php echo ($Order->Status == 'Card-delivery') ? 'selected' : ''; ?>>Card-delivery</option>
                            <option value="Card-done" <?php echo ($Order->Status == 'Card-done') ? 'selected' : ''; ?>>Card-done</option>
                            <option value="Cancel" <?php echo ($Order->Status == 'Cancel') ? 'selected' : ''; ?>>Cancel</option>
                        </select>
                    </form>

                    <script>
                        function submitForm() {
                            document.getElementById("Status").submit();
                        }
                    </script>

                <?php } else { ?>
                    <div class="total">
                        Status :
                        <div class="stat"><?= $Order->Status ?></div>
                    </div>
                <?php }
                // Check if the 'message' parameter is set in the URL
                if (isset($_GET['message'])) {
                    $message = $_GET['message'];
                    echo '<p>' . htmlspecialchars($message) . '</p>';
                }
            } else {
                echo ' error ';
            }

            if ($_SESSION['position'] === 0 || $_SESSION['position'] == 1) { ?>
                <!-- <a href="index.php?controller=Order&action=cancel&cartid=<?= $details->CartID ?>">
                    <button id="pay" type="submit">Submit</button>
                </a> -->
            <?php } elseif ($Order->Status == 'Cash' || $Order->Status == 'Card' || $Order->Status == 'Cash-process' || $Order->Status == 'Card-process') { ?>
                <hr>
                <a id="confirm1">
                    <button>Cancel</button>
                </a>
                <div style="position: absolute; display: none; width: 100%; text-align: center; font-size: 22px; ">
                    Are you sure to cancel this order !
                    <div id="confirm2" style="width: 100%; display: flex; justify-content: space-around;">
                        <a style="width:40%;"><button>No</button></a>
                        <a style="width:40%;" href="index.php?controller=Order&action=cancel&cartid=<?= $Order->CartID ?>">
                            <button>Yes</button>
                        </a>
                    </div>
                </div>
                <script>
                    document.getElementById("confirm1").addEventListener("click", function() {
                        document.getElementById("confirm1").style.display = "none";
                        document.querySelector("#confirm1 + div").style.display = "block";
                    });

                    document.querySelector("#confirm2 button:nth-child(1)").addEventListener("click", function() {
                        document.getElementById("confirm1").style.display = "block";
                        document.querySelector("#confirm1 + div").style.display = "none";
                    });

                    document.querySelector("#confirm2 button:nth-child(2)").addEventListener("click", function() {
                        window.location.href = "index.php?controller=Order&action=cancel&cartid=<?= $Order->CartID ?>";
                    });
                </script>

            <?php } ?>
        </div>
    </div>
</body>

</html>