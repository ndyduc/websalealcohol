<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://static.thenounproject.com/png/2050059-200.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="views/CSS/addal.css?v=2">
    <title>Add Product</title>
</head>

<body>
    <?php include 'views/adbar.php'; ?>
    <div class="page">
        <?php
        if ($Namepage === 'Edit') {
            $key = 'update';
            // $con = 'Employee';
        } else {
            $key = 'add';
            // $con = 'Alcohol';
        }
        ?>
        <div class="namepage"><?= $Namepage ?> Product</div>
        <form action="index.php?controller=Alcohol&action=<?= $key ?>" method="POST">
            <?php if ($ID) { ?>
                <input type="hidden" name="ID" value="<?= $ID ?>" />
            <?php } ?>
            <div class="main">
                <div class="left">
                    <h4>Image</h4>
                    <img id="img" src="choose.png">
                    <input type="file" id="poster">
                    <input type="text" name="poster" id="imgLink" placeholder="Enter image URL" value="<?= $Alcohol->Poster ?>">
                    <div class="picture">
                        <img id="img2" src="choose.png">
                        <div class="info">
                            <h5 id="fileName" style="width: 95%; height: auto; white-space: normal; font-family: Arial, sans-serif; font-size: 18px;">
                                name</h5>
                            <h6 id="fileSize">size</h6>
                        </div>
                        <label>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                            </svg>
                        </label>
                    </div>
                    <script>
                        let img = document.getElementById('img');
                        let img2 = document.getElementById('img2');
                        let input = document.getElementById('poster');
                        let fileName = document.getElementById('fileName');
                        let fileSize = document.getElementById('fileSize');
                        let label = document.querySelector('label');
                        // Thêm input type link
                        let imgLinkInput = document.getElementById('imgLink');

                        input.onchange = (e) => {
                            if (input.files[0]) {
                                img.src = URL.createObjectURL(input.files[0]);
                                img2.src = URL.createObjectURL(input.files[0]);
                                fileName.innerText = input.files[0].name;
                                fileSize.innerText = (input.files[0].size / (1024 * 1024)).toFixed(2) + ' MB';
                            }
                        };

                        label.onclick = () => {
                            input.value = '';
                            img.src = 'choose.png';
                            img2.src = 'choose.png';
                            fileName.innerText = 'name';
                            fileSize.innerText = 'size';
                            imgLinkInput.value = '';
                        };

                        imgLinkInput.addEventListener('input', () => {
                            img.src = imgLinkInput.value;
                            img2.src = imgLinkInput.value;
                            fileName.innerText = 'name'; // Nếu có tên file, bạn có thể cập nhật tại đây
                            fileSize.innerText = 'size'; // Tương tự, bạn có thể cập nhật kích thước tại đây
                        });
                    </script>
                </div>
                <div class="right">
                    <div class="add">
                        <div class="addname">
                            <div class="content">Name</div>
                            <input type="text" name="name" placeholder="Name ..." value="<?= $Alcohol->Name ?>" required>
                        </div>
                        <div class="status">
                            <div class="content">Status</div>
                            <input type="checkbox" name="status" id="status" class="dninput" value="<?= $Alcohol->Status ?>" <?php if ($Alcohol->Status == 1) echo 'checked'; ?>>
                            <script>
                                var statusCheckbox = document.getElementById('status');
                                statusCheckbox.addEventListener('change', function() {
                                    statusCheckbox.value = this.checked ? 1 : 0;
                                    if (!this.checked) { this.value = 0;}
                                });
                            </script>

                            <label for="status" class="dnitem">
                                <div class="sun-moon"></div>
                                <div class="stars">
                                    <div class="star"></div>
                                </div>
                                <div class="clouds">
                                    <div class="cloud"></div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="add">
                        <div class="place">
                            <div class="content">Genre</div>
                            <input type="text" name="genre" id="" placeholder="Genre ..." value="<?= $Alcohol->Genre ?>" required>
                        </div>
                        <div class="place">
                            <div class="content">Country</div>
                            <input type="text" name="country" id="" placeholder="Country ..." value="<?= $Alcohol->Country ?>" required>
                        </div>
                    </div>
                    <div class="add">
                        <div class="place">
                            <div class="content">Pre-Price</div>
                            <input type="number" name="preprice" id="" placeholder="Pre-Price ..." value="<?= $Alcohol->Preprice ?>" required>
                        </div>
                        <div class="place">
                            <div class="content">Price</div>
                            <input type="number" name="price" id="" placeholder="Price ..." value="<?= $Alcohol->Price ?>" required>
                        </div>
                    </div>
                    <div class="add">
                        <div class="place">
                            <div class="content">Amount</div>
                            <input type="number" name="amount" id="" placeholder="Amount ..." value="<?= $Alcohol->Amount ?>" required>
                        </div>
                        <div class="place">
                            <div class="content">Amount-left</div>
                            <input type="number" name="amountleft" id="" placeholder="Amount-left ..." value="<?= $Alcohol->Amountleft ?>">
                        </div>
                    </div>
                    <div class="desc">
                        <div class="content">Description</div>
                        <textarea rows="12" cols="49" type="text" name="description" id="" placeholder=" Description ..." required><?= $Alcohol->Description ?></textarea>
                    </div>
                </div>
            </div>
            <div class="router">
                <?php
                $turnback = $_SERVER['HTTP_REFERER'];
                ?>
                <a href="<?= $turnback ?>">Cancel</a>
                <button name="submit" type="submit">Finish</button>
            </div>
        </form>
    </div>
</body>

</html>