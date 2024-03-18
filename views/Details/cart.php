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
    <link rel="stylesheet" href="views/CSS/cart.css?v=4">
    <title>Cart</title>

</head>

<?php include 'views/header.php'; ?>

<body>
    <form class="search" action="index.php?controller=Order&action=search" method="post">
        <div class="inform">Find yours Order !</div>
        <input type="text" class="search-box" name="key" placeholder="Search . . . ">
        <button type="submit" name="submit" class="butsearch" ">
            <label for="search">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </label>
        </button>
    </form>
    <div class="mainpro">
        <div class="proleft">
            <h4> Cart </h4>
            <?php
            $total = 0;
            if ($details && $alcohols) {
                for ($i = 0; $i < count($alcohols); $i++) {
                    $total += $details[$i]->TotalPD; ?>
                    <div class="spp">
                        <img src="<?= $alcohols[$i]->Poster ?>" alt="product">
                        <div class="infsp">
                            <div class="nsp">
                                <div class="n"><?= $alcohols[$i]->Name ?></div>
                                <div class="pp"><?= $details[$i]->PricePD ?> $</div>
                            </div>
                            <div class="infpro"><?= $alcohols[$i]->Description . $result["message"] ?></div>
                            <div class="quan">One quality
                                <div class="tity">Quantity :
                                    <div class="detailre">
                                        <form action="index.php?controller=Detail&action=remove1" method="POST" class="mt-3">
                                            <input type="hidden" name="IDDT" value="<?= $details[$i]->IDDT ?>">
                                            <input type="hidden" name="AM" value="<?= $details[$i]->AM ?>">
                                            <input type="hidden" name="PricePD" value="<?= $details[$i]->PricePD ?>">
                                            <button name="submit" type="submit" class="butadd">-</button>
                                        </form>
                                    </div>
                                    <input list="Quantity" value="<?= $details[$i]->AM ?>">
                                    <datalist id="Quantity">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </datalist>
                                    <div class="detailad">
                                        <form action="index.php?controller=Detail&action=add1" method="POST" class="mt-3">
                                            <input type="hidden" name="IDDT" value="<?= $details[$i]->IDDT ?>">
                                            <input type="hidden" name="AM" value="<?= $details[$i]->AM ?>">
                                            <input type="hidden" name="PricePD" value="<?= $details[$i]->PricePD ?>">
                                            <button name="submit" type="submit" class="butadd">+</button>
                                        </form>
                                    </div>
                                    <div class="mess">
                                        <?php if ($results['message'] == false && $IDDT == $details[$i]->IDDT) : ?>
                                            <?= "Sorry, there is only " . $alcohols[$i]->Amountleft . " left !" ?>
                                        <?php else : ?>
                                            <?= " " ?>
                                        <?php endif; ?>
                                    </div>
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
                                    <div class="trash">
                                        <input type="checkbox" id="<?= $details[$i]->IDDT ?>">
                                        <label for="<?= $details[$i]->IDDT ?>">
                                            <a href="index.php?controller=Detail&action=delete&id=<?= $details[$i]->IDDT ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                </svg>
                                            </a>
                                        </label>
                                        <!-- <div class="modal fade" id="exampleModal tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">DELETE</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                        </div>
                                                        <div class="modal-body"> Do you want to delete this? </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                                            <a class="btn btn-primary" href="index.php?controller=details&action=delete&id=<?= $details[$i]->IDDT ?>">YES</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                        <!-- <form action="index.php?controller=Detail&action=delete" method="POST" class="mt-3">
                                                <input type="checkbox" id="pro1">
                                                <input type="hidden" name="IDDT" value="<?= $details[$i]->IDDT ?>">
                                                <button name="submit" type="submit" class="butadd">
                                                    <label for="pro1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                        </svg>
                                                    </label>
                                                </button>
                                            </form> -->
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
            <h3>Summany</h3>
            <div class="sub">
                Subtotal
                <div class="pric"><?= $total ?> $</div>
            </div>
            <div class="en">
                Estimated Shipping
                <div class="pric">2 $</div>
            </div>
            <br>
            <hr>
            <div class="total">
                Total <?php $alltotal = $total + 2; ?>
                <div class="tal"><?= $alltotal ?> $</div>
            </div>
            <hr>
            <a href="index.php?controller=Order&action=make">
                <button id="pay" type="submit">Check Out</button>
            </a>
        </div>
    </div>
</body>

</html>