<?php
require_once 'controllers/base_controller.php';
require_once 'models/Alcohol.php';
class AlcoholController extends BaseController {
    public function __construct() {
        $this->folder = 'Alcohols';
    }
    public function error() {
        $this->render('error');
    }
    public function index() {
        $Alcohols = Alcohol::info();
        $data = array('Alcohols' => $Alcohols);
        $this->render('index', $data);
    }
    public function info() {
        if($_SESSION['position'] === 0 || $_SESSION['position'] === 1)
            include 'views/adbar.php';
        else
            include 'views/header.php';
        $alcohol = $_GET['id'];
        $Alcohols = Alcohol::findid($alcohol);
        $data = array('Alcohols' => $Alcohols);
        $this->render('infoitem', $data);
    }
    public function edit(){
        $Alcohol = Alcohol::find($_GET['id']);
        $this->folder = 'Employees';
        $name = 'Edit';
        $data = array('Alcohol' => $Alcohol,'Namepage' => $name,'ID' => $_GET['id']);
        $this->render('add', $data);
    }
    public function soft(){
        $key = $_POST['key'];

    }
    public function add() {
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
                $Status = 0;
            }
            if (!$Amountleft){
                $Amountleft = $Amount;
            } 
            $alcohol = new Alcohol($Name,-1,$Status,$Description,$Poster,
                                $Genre,$Country,$Preprice,$Price,$Amount,$Amountleft);
            $result = Alcohol::add($alcohol);
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
            $this->folder = 'Employees';
            $Alcohols = Alcohol::allinfor();
            $result = array('Alcohols' => $result);
            $data = array('Alcohols' => $Alcohols,'result' => $result);
            $this->render('admin', $data);
        } else {
            $this->render('error');
        }
    }
    public function delete() {
        $Alcohol = Alcohol::find($_GET['id']);
        $result = Alcohol::delete($Alcohol);
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
        $Alcohols = Alcohol::allinfor();
        $this->folder = 'Employees';
        $data = array('Alcohols' => $Alcohols);
        $this->render('admin', $data);
    }


    public function update() {
        if (isset($_POST['submit'])){
            $ID = $_POST['ID'];
            $Name = $_POST['name'];
            $Description = $_POST['description'];
            $Poster = $_POST['poster'];
            $Genre = $_POST['genre'];
            $Country = $_POST['country'];
            $Preprice = $_POST['preprice'];
            $Price = $_POST['price'];
            $Amount = $_POST['amount'];
            $Amountleft = $_POST['amountleft'];
            $Status = $_POST['status'];
            if(!$Status) $Status = 0;
            $Alcohol = new Alcohol($Name,$ID,$Status,$Description,$Poster,
                    $Genre,$Country,$Preprice,$Price,$Amount,$Amountleft);
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
            $this->folder = 'Employees';
            $Alcohols = Alcohol::allinfor();
            $result = array('Alcohols' => $result);
            $data = array('Alcohols' => $Alcohols,'result' => $result);
            $this->render('admin', $data);
        } else {
            $Alcohol = Alcohol::find($_GET['ID']);
            $data = array('Alcohol' => $Alcohol);
            $this->render('add', $data);
        }
    }

    public function search() {
        if(isset($_POST['submit'])) {
            # get i from url
            $input = $_POST['key'];
            // $status = Alcohol::search($input);
            // echo json_encode($status);
            // die();
        }
        if(isset($_GET['input'])) {
            $input = $_GET['key'];
        }
        $Alcohols = Alcohol::search($input);
        $data = array('Alcohols' => $Alcohols);
        $this->render('index', $data);
    }

    public function searchAjax() {
        if(isset($_POST['ID'])) {
            $i = $_POST['ID'];
            $status = Alcohol::search($i);
            echo json_encode($status);
            die();
        }
    }
}