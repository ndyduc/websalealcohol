<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://static.thenounproject.com/png/2050059-200.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="views/CSS/header.css?v=10">
</head>

<body>
    <nav class="linkk">
        <div>
            <div class="barr">
                <?php
                $turnback = $_SERVER['HTTP_REFERER'];
                ?>
                <a href="<?= $turnback ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                    </svg>
                </a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg>
                </a>
            </div>
            <a href="index.php?controller=Employee&action=backhome" class="home">
                <ul>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-playstation" viewBox="0 0 16 16">
                        <path d="M15.858 11.451c-.313.395-1.079.676-1.079.676l-5.696 2.046v-1.509l4.192-1.493c.476-.17.549-.412.162-.538-.386-.127-1.085-.09-1.56.08l-2.794.984v-1.566l.161-.054s.807-.286 1.942-.412c1.135-.125 2.525.017 3.616.43 1.23.39 1.368.962 1.056 1.356ZM9.625 8.883v-3.86c0-.453-.083-.87-.508-.988-.326-.105-.528.198-.528.65v9.664l-2.606-.827V2c1.108.206 2.722.692 3.59.985 2.207.757 2.955 1.7 2.955 3.825 0 2.071-1.278 2.856-2.903 2.072Zm-8.424 3.625C-.061 12.15-.271 11.41.304 10.984c.532-.394 1.436-.69 1.436-.69l3.737-1.33v1.515l-2.69.963c-.474.17-.547.411-.161.538.386.126 1.085.09 1.56-.08l1.29-.469v1.356l-.257.043a8.454 8.454 0 0 1-4.018-.323Z" />
                    </svg>
                </ul>
                <div class="a">Cheers & Spirits</div>
            </a>
        </div>
        <div class="b">Enjoy UR life B4 U Die ..</div>
        <div class="rightt">
            <div class="log">
                <a><?php if ($_SESSION['position'] == 0) {
                        echo 'Admin';
                    } else echo 'Employee';
                    ?>
                </a>
            </div>
            <div class="profile" id="profile">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
            </div>
        </div>
    </nav>
    <div id="sidebar">
        <label id="closed">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
            </svg>
        </label>
        <ul>
            <a href="index.php?controller=Employee&action=backhome">
                <li>Home</li>
            </a>
            <?php if ($_SESSION['position'] == 0) { ?>
                <a href="index.php?controller=Employee&action=listacc">
                    <li>List Employees</li>
                </a>
                <a>
                    <li id="open">Add Employee</li>
                </a>
            <?php } ?>
            <a href="index.php?controller=Employee&action=listor">
                <li>List Orders</li>
            </a>
            <a href="index.php?controller=Employee&action=add">
                <li>Add Product</li>
            </a>
            <a href="index.php?controller=Employee&action=changepass">
                <li>Change Password</li>
            </a>
            
            <a href="index.php?controller=Employee&action=logout">
                <li class="logout">Logout</li>
            </a>
        </ul>
    </div>
    <form id="formadd" action="index.php?controller=Employee&action=addem" method="post" class="addem">
        <div class="form">
            <div class="addin">
                <p>Name</p>
                <input type="text" name="name" placeholder="Name ..." required>
            </div>
            <div class="infor">
                <div class="addin">
                    <p>Personal's ID</p>
                    <input name="IDE" type="number" placeholder="Personal's ID ..." required>
                </div>
                <div class="addin">
                    <p>Phone Number</p>
                    <input name="phone" type="number" placeholder="Phone Number ..." required>
                </div>
            </div>
            <div class="infor">
                <div class="addin">
                    <p>Password</p>
                    <input name="pass" type="text" placeholder="Password ..." required>
                </div>
                <div class="addin">
                    <p>Position</p>
                    <input name="position" type="number" placeholder="0:Admin - 1:Employee" required>
                </div>
            </div>
            <div class="confirm">
                <div id="cancel">Cancel</div>
                <button name="submit" type="submit">Submit</button>
            </div>
        </div>
    </form>
    <script>
        var profile = document.getElementById('profile');
        var sidebar = document.getElementById('sidebar');
        var close = document.getElementById('closed');

        sidebar.style.right = '0';
        sidebar.style.display = 'none';
        profile.onclick = function() {
            if (sidebar.style.display == 'none') {
                sidebar.style.display = 'block';
            } else {
                sidebar.style.display = 'none';
            }
        }

        close.onclick = function() {
            if (sidebar.style.display == 'none') {
                sidebar.style.display = 'block';
            } else {
                sidebar.style.display = 'none';
            }
        }

        var add = document.getElementById('formadd');
        var open = document.getElementById('open');
        var closeadd = document.getElementById('cancel');

        open.onclick = function() {
            if (add.style.display == 'none') {
                add.style.display = 'block';
            } else {
                add.style.display = 'none';
            }
        }
        closeadd.onclick = function() {
            if (add.style.display == 'none') {
                add.style.display = 'block';
            } else {
                add.style.display = 'none';
            }
        }
    </script>
</body>

</html>