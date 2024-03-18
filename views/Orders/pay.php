<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="views/CSS/pay.css?v=3">
    <title>Payment</title>
</head>

<?php include 'views/header.php'; ?>
<body>
    <form action="index.php?controller=Order&action=addOR" method="POST">
        <div class="head">Check Out</div>
        <div class="check" id="check">
            <div class="ccheck">
                <p>Confirm yours Information</p>
                <div class="option">
                    <div class="fcheck">
                        <input type="checkbox" onclick="change()" id="edit">
                        <label for="edit">change Information
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                            </svg>
                        </label>
                        <script>
                            function change() {
                                document.getElementById("check").style.display = "none";
                            }
                        </script>
                    </div>
                    <div class="confirm">
                        <button type="submit" name="submit" id="confirm">Confirm
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="bo">
            <div class="le">
                <div class="del">
                    <div class="namede">Delivery Information</div>
                    <div class="namecus">
                        <input type="text" name="CusName" placeholder="Name" required>
                        <input type="number" name="CusPhone" placeholder="Phone Number *" required>
                    </div>
                    <input type="text" name="addr1" class="addr" placeholder="Address *" required>
                    <div class="city">
                        <input type="text" name="addr2" placeholder="City *" required>
                        <input type="text" name="addr3" placeholder="State *" required>
                        <input type="number" name="addr4" min="100000" max="999999" placeholder="Postal Code *">
                    </div>
                    <input type="text" class="addr" placeholder="Take note">
                    <br>
                    <div class="warnn">* Must be filled</div>
                    <br>
                </div>
                <hr>
                <div class="pay">
                    <div class="namede">Payment</div>
                    <div class="opt">
                        <div class="cad">
                            <input id="card" type="radio" name="pay" value="Card" onclick="visa()" required>
                            <label for="card">Pay By Card
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-back" viewBox="0 0 16 16">
                                    <path d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1z" />
                                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm13 2v5H1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-1 9H2a1 1 0 0 1-1-1v-1h14v1a1 1 0 0 1-1 1z" />
                                </svg>
                            </label>
                            <script>
                                function visa() {
                                    document.getElementById("paycard").style.display = "grid";
                                }
                            </script>
                        </div>
                        <div class="cad">
                            <input id="cash" type="radio" value="Cash" name="pay" onclick="document.getElementById('paycard').style.display='none'">
                            <label for="cash">Pay By Cash
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                    <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                    <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                    <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                                </svg>
                            </label>
                        </div>
                    </div>
                    <div class="paycard" id="paycard">
                        <div class="row gy-3">
                            <div class="col-md-6">
                                <label for="cc-name" class="form-label">Name on card</label>
                                <input type="text" class="form-control" id="cc-name">
                                <small class="text-body-secondary">Full name as displayed on card</small>
                                <div class="invalid-feedback">
                                    Name on card is required
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="cc-number" class="form-label">Credit card number</label>
                                <input type="text" class="form-control" id="cc-number">
                                <div class="invalid-feedback">
                                    Credit card number is required
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="cc-expiration" class="form-label">Expiration</label>
                                <input type="text" class="form-control" id="cc-expiration">
                                <div class="invalid-feedback">
                                    Expiration date required
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="cc-cvv" class="form-label">CVV</label>
                                <input type="text" class="form-control" id="cc-cvv">
                                <div class="invalid-feedback">
                                    Security code required
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="forward">
                    <input type="checkbox" onclick="check()" id="forward">
                    <label for="forward">Finish
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                        </svg>
                    </label>
                    <script>
                        function check() {
                            document.getElementById("check").style.display = "block";
                        }
                    </script>
                </div>
            </div>
            <div class="ri">
                <?php
                $total = 0;
                for ($i = 0; $i < count($alcohols); $i++) {
                    $total += $details[$i]->TotalPD;
                } ?>
                <div class="namede">In Your Cart</div>
                <div class="su">
                    Cart's ID
                    <div class="pr"><?= $_SESSION['id'] ?></div>
                </div>
                <div class="su">
                    Subtotal
                    <div class="pr"><?= $total ?> $</div>
                </div>
                <div class="en">
                    Estimated Shipping
                    <div class="prc">2 $</div>
                </div>
                <br>
                <div class="tol">
                    Total
                    <div class="t l"><?= $total + 2 ?> $</div>
                    <input type="hidden" name="Total" value="<?= $total + 2 ?>">
                </div>
                <hr>
                <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true" class="scrollspy-example-2" tabindex="0">
                    <?php
                    $total = 0;
                    if ($details && $alcohols) {
                        for ($i = 0; $i < count($alcohols); $i++) { ?>
                            <div class="prod">
                                <img src="<?= $alcohols[$i]->Poster ?>" alt="product">
                                <div class="napr">
                                    <div class="namm"> <?= $alcohols[$i]->Name ?></div>
                                    <div class="qu">
                                        <div class="tity">Quantity : <?= $details[$i]->AM ?></div>
                                        <div class="price">Total : <?= $details[$i]->TotalPD ?> $</div>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } else {
                        echo '<h1> There is nothing in yours cart ! </h1> ';
                    } ?>
                </div>
            </div>
        </div>
    </form>
</body>

</html>