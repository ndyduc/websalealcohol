<?php
require_once 'controllers/base_controller.php';
require_once 'models/Employee.php';

class EmployeeController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'Employees';
    }
    public function error()
    {
        $this->render('error');
    }
    public function login()
    {
        $this->render('login');
    }
    public function changepass()
    {
        $this->render('pass');
    }
    public function add() {
        $this->render('add');
    }

    public function listacc()
    {
        $position = isset($_GET['position']) ? $_GET['position'] : -1;
        if ($position != -1) {
            $em = Employee::findem($position);
            // if ($position == 0) {
            //     header('Content-Type: application/json');
            //     echo json_encode(['Employees' => $em]);
            //     exit();
            // }
        } else {
            $em = Employee::all();
        }

        $data = array('Employees' => $em, 'Position' => $position);
        // if ($position === null) {
        $this->render('listacc', $data);
        // } else {
        //     // Return JSON response for Ajax request
        //     header('Content-Type: application/json');
        //     echo json_encode($data);
        //     exit();
        // }
    }
    public function listor()
    {
        if ($_GET['status']) {
            if ($_GET['status'] == 1){
                $key1 = 10;
                $cart = Employee::takeor();
            } elseif ($_GET['status'] == 2) {
                $key1 = 'Cash';
                $key2 = 'Card';
                $cart = Employee::searchor($key1, $key2);
            } elseif ($_GET['status'] == 3) {
                $key1 = 'Cash-process';
                $key2 = 'Card-process';
                $cart = Employee::searchor($key1, $key2);
            } elseif ($_GET['status'] == 4) {
                $key1 = 'Cash-delivery';
                $key2 = 'Card-delivery';
                $cart = Employee::searchor($key1, $key2);
            } elseif ($_GET['status'] == 5) {
                $key1 = 'Cash-done';
                $key2 = 'Card-done';
                $cart = Employee::searchor($key1, $key2);
            } elseif ($_GET['status'] == 6) {
                $key1 = 'Cancel';
                $cart = Employee::searchor($key1,$key1);
            }
        } else {
            $key1 = 'Cash';
            $key2 = 'Card';
            $cart = Employee::searchor($key1, $key2);
        }
        unset($_SESSION['key']);
        $_SESSION['key'] = $key1;
        $data = array('Employees' => $cart);
        $this->render('Listorder', $data);
    }

    public function pass()
    {
        $pass = $_POST['pass'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];

        if ($pass !== $_SESSION['empass']) {
            echo 'Your current password is incorrect!';
            $this->render('pass');
        }
        if ($pass1 !== $pass2 || !preg_match('/^[a-zA-Z0-9]+$/', $pass1)) {
            echo 'Your new password is either not the same or invalid!';
            $this->render('pass');
        }

        $result = Employee::changepass($pass1, $_SESSION['emid']);
        echo 
            '<div style="padding: 15px; border-radius: 30px; text-align: center; background-color: #9bf9b9; color: rgba(98, 0, 0, 0.76);; display: block;" id="myAlert">
            <span onclick="closeAlert()" style="margin-left: 15px; color: white; font-weight: bold; float: right;
                    font-size: 22px; line-height: 20px; cursor: pointer; transition: 0.3s;">&times;</span>
            <strong>'.$result['message'].'</strong>
        </div>
        <script>
            function closeAlert() {
                var alertDiv = document.getElementById("myAlert");
                alertDiv.style.display = "none";
            }
        </script>';
        self::backhome();
    }
    public function update()
    {
        if (isset($_POST['submit'])) {
            $Name = $_POST['name'];
            $Description = $_POST['description'];
            $Poster = $_POST['poster'];
            $Genre = $_POST['genre'];
            $Country = $_POST['country'];
            $Preprice = $_POST['preprice'];
            $Price = $_POST['price'];
            $Amount = $_POST['amount'];
            $Amountleft = $_POST['amountleft'];
            if (isset($_POST['status'])) {
                $Status = ($_POST['status'] == 'on') ? 1 : 0;
            } else {
                $Status = 0;;
            }
            $Alcohol = new Alcohol($Name, -1, $Status, $Description, $Poster, $Genre, $Country, $Preprice, $Price, $Amount, $Amountleft);
            require_once 'models/Alcohol.php';
            $result = Alcohol::update($Alcohol);
            echo 
            '<div style="padding: 15px; border-radius: 30px; text-align: center; background-color: #9bf9b9; color: rgba(98, 0, 0, 0.76);; display: block;" id="myAlert">
            <span onclick="closeAlert()" style="margin-left: 15px; color: white; font-weight: bold; float: right;
                    font-size: 22px; line-height: 20px; cursor: pointer; transition: 0.3s;">&times;</span>
            <strong>'.$result['message'].'</strong>
        </div>
        <script>
            function closeAlert() {
                var alertDiv = document.getElementById("myAlert");
                alertDiv.style.display = "none";
            }
        </script>';
            $result = array('result' => $result);
            $this->render('update', $result);
        } else {
            $Alcohol = Alcohol::find($_GET['ID']);
            $data = array('Alcohol' => $Alcohol);
            $this->render('update', $data);
        }
    }
    public function backhome()
    {
        require_once 'models/Alcohol.php';
        $Alcohols = Alcohol::allinfor();
        $data = array('Alcohols' => $Alcohols);
        $this->render('admin', $data);
    }
    public function log()
    {
        if (isset($_POST['submit'])) {
            $phone = $_POST['phone'];
            $pass = $_POST['password'];
            $result = Employee::Check($phone, $pass);
            echo 
            '<div style="padding: 15px; border-radius: 30px; text-align: center; background-color: #9bf9b9; color: rgba(98, 0, 0, 0.76);; display: block;" id="myAlert">
            <span onclick="closeAlert()" style="margin-left: 15px; color: white; font-weight: bold; float: right;
                    font-size: 22px; line-height: 20px; cursor: pointer; transition: 0.3s;">&times;</span>
            <strong>'.$result['message'].'</strong>
        </div>
        <script>
            function closeAlert() {
                var alertDiv = document.getElementById("myAlert");
                alertDiv.style.display = "none";
            }
        </script>';
            if ($result['status'] == false) {
                $this->render('login');
            } else {
                unset($_SESSION['position']);
                $_SESSION['position'] = $result['employee']->Position;
                $_SESSION['emid'] = $result['employee']->IDU;
                $_SESSION['empass'] = $pass;
                require_once 'models/Alcohol.php';
                $Alcohols = Alcohol::allinfor();
                $data = array('Alcohols' => $Alcohols);
                $this->render('admin', $data);
            }
        } else {
            $this->render('login');
        }
    }

    public function logout()
    {
        unset($_SESSION['position']);
        unset($_SESSION['emid']);
        unset($_SESSION['empass']);
        $this->folder = 'Alcohols';
        require_once 'models/Alcohol.php';
        $Alcohols = Alcohol::info();
        $data = array('Alcohols' => $Alcohols);
        $this->render('index', $data);
    }
    public function addem()
    {
        if (isset($_POST['submit'])) {
            $Name = $_POST['name'];
            $Pass = $_POST['pass'];
            $Phone = $_POST['phone'];
            $IDE = $_POST['IDE'];
            $Position = $_POST['position'];
            $employee = new Employee(-1, $Name, $Pass, $Phone, $IDE, $Position);
            $em = Employee::add($employee);
            echo 
            '<div style="padding: 15px; border-radius: 30px; text-align: center; background-color: #9bf9b9; color: rgba(98, 0, 0, 0.76);; display: block;" id="myAlert">
            <span onclick="closeAlert()" style="margin-left: 15px; color: white; font-weight: bold; float: right;
                    font-size: 22px; line-height: 20px; cursor: pointer; transition: 0.3s;">&times;</span>
            <strong>'.$em['message'].'</strong>
        </div>
        <script>
            function closeAlert() {
                var alertDiv = document.getElementById("myAlert");
                alertDiv.style.display = "none";
            }
        </script>';
            self::listacc();
        } else {
            echo '?';
        }
    }

    public function delete()
    {
        $employee = Employee::find($_GET['IDU']);
        $result = Employee::delete($employee);
        echo 
            '<div style="padding: 15px; border-radius: 30px; text-align: center; background-color: #9bf9b9; color: rgba(98, 0, 0, 0.76);; display: block;" id="myAlert">
            <span onclick="closeAlert()" style="margin-left: 15px; color: white; font-weight: bold; float: right;
                    font-size: 22px; line-height: 20px; cursor: pointer; transition: 0.3s;">&times;</span>
            <strong>'.$result['message'].'</strong>
        </div>
        <script>
            function closeAlert() {
                var alertDiv = document.getElementById("myAlert");
                alertDiv.style.display = "none";
            }
        </script>';
        self::listacc();
    }

    public function editem()
    {
        if (isset($_POST['submit'])) {
            $Namee = $_POST['name'];
            $Pass = $_POST['Pass'];
            $Phonee = $_POST['Phone'];
            $IDU = $_POST['IDU'];
            $IDE = $_POST['IDE'];
            $Position = $_POST['Position'];
            $employee = new Employee($IDU, $Namee, $Pass, $Phonee, $IDE, $Position);
            $result = Employee::update($employee);
            echo 
            '<div style="padding: 15px; border-radius: 30px; text-align: center; background-color: #9bf9b9; color: rgba(98, 0, 0, 0.76);; display: block;" id="myAlert">
            <span onclick="closeAlert()" style="margin-left: 15px; color: white; font-weight: bold; float: right;
                    font-size: 22px; line-height: 20px; cursor: pointer; transition: 0.3s;">&times;</span>
            <strong>'.$result['message'].'</strong>
        </div>
        <script>
            function closeAlert() {
                var alertDiv = document.getElementById("myAlert");
                alertDiv.style.display = "none";
            }
        </script>';
            self::listacc();
        } else {
            self::listacc();
        }
    }
    public function search()
    {
        if (isset($_POST['input'])) {
            $i = $_POST['input'];
            $status = Employee::search($i);
            echo json_encode($status);
            die();
        }
        if (isset($_POST['input'])) {
            # get i from url
            $i = $_POST['input'];
            $status = Employee::search($i);
            echo json_encode($status);
            die();
        }
        if (isset($_GET['input'])) {
            $input = $_GET['input'];
        }
        $employees = Employee::search($input);
        $data = array('discs' => $employees);
        $this->render('search', $data);
    }

    public function searchAjax()
    {
        if (isset($_POST['IDU'])) {
            $i = $_POST['IDU'];
            $status = Employee::search($i);
            echo json_encode($status);
            die();
        }
    }
}
