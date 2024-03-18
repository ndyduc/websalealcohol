<?php
require_once 'controllers/base_controller.php';
require_once 'models/Detail.php';
class DetailController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'Details';
    }
    public function error()
    {
        $this->render('error');
    }
    public function add()
    {
        if (isset($_POST['submit'])) {
            if ($_POST['IDPD']) {
                $cartid = $_POST['CartID'];
                $IDPD = $_POST['IDPD'];
                $PricePD = $_POST['PricePD'];

            }
            if ($_GET['id']) {
                $cartid = $_SESSION['id'];
                $IDPD = $_GET['id'];
                $PricePD = $_GET['Price'];
            }

            $detail = Detail::findDT($cartid, $IDPD);
            if ($detail instanceof Detail) {
                $newdetail = new Detail($detail->IDDT, $detail->CartID, $detail->IDPD, $detail->AM + 1, $detail->PricePD, $detail->TotalPD + $detail->PricePD);
                $result = Detail::update($newdetail);
                echo 
            '<div style="padding: 15px; border-radius: 30px; text-align: center; background-color: #9bf9b9; color: rgba(98, 0, 0, 0.76);; display: block;" id="myAlert">
            <span onclick="closeAlert()" style="margin-left: 15px; color: white; font-weight: bold; float: right;
                    font-size: 22px; line-height: 20px; cursor: pointer; transition: 0.3s;">&times;</span>
            <strong>'.$result[0]['message'].'</strong>
        </div>
        <script>
            function closeAlert() {
                var alertDiv = document.getElementById("myAlert");
                alertDiv.style.display = "none";
            }
        </script>';
            } else {
                $details = new Detail(-1, $cartid, $IDPD, 1, $PricePD, $PricePD);
                $result = Detail::add($details);
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
            }
            require_once 'models/Alcohol.php';
            $this->folder = 'Alcohols';
            $Alcohols = Alcohol::info();
            $data = array('Alcohols' => $Alcohols);
            $this->render('index', $data);
        } else {
            $this->render('error');
        }
    }
    public function takeDTC()
    {
        $details = Detail::takeDT($_SESSION['id']);
        $data = array('details' => $details[0], 'alcohols' => $details[1],);
        $this->render('cart', $data);
    }
    public function add1()
    {
        if (isset($_POST['submit'])) {
            $IDDT = $_POST['IDDT'];
            $AM = $_POST['AM'] + 1;
            $PricePD = $_POST['PricePD'];
            $TotalPD = $PricePD * $AM;
            $detail = new Detail($IDDT, 1, 1, $AM, 1, $TotalPD);
            $result = Detail::update($detail);
            echo 
            '<div style="padding: 15px; border-radius: 30px; text-align: center; background-color: #9bf9b9; color: rgba(98, 0, 0, 0.76);; display: block;" id="myAlert">
            <span onclick="closeAlert()" style="margin-left: 15px; color: white; font-weight: bold; float: right;
                    font-size: 22px; line-height: 20px; cursor: pointer; transition: 0.3s;">&times;</span>
            <strong>'.$result[0]['message'].'</strong>
        </div>
        <script>
            function closeAlert() {
                var alertDiv = document.getElementById("myAlert");
                alertDiv.style.display = "none";
            }
        </script>';
            $details = Detail::takeDT($_SESSION['id']);
            $data = array('details' => $details[0], 'alcohols' => $details[1], 'results' => $result[0], 'IDDT' => $result[1]);
            $this->render('cart', $data);
        } else {
            $detail = Detail::find($_GET['IDDT']);
            $data = array('detail' => $detail);
            $this->render('cart', $data);
        }
    }
    public function remove1()
    {
        if (isset($_POST['submit'])) {
            $IDDT = $_POST['IDDT'];
            $AM = $_POST['AM'] - 1;
            $PricePD = $_POST['PricePD'];
            $TotalPD = $PricePD * $AM;
            $detail = new Detail($IDDT, 1, 1, $AM, $PricePD, $TotalPD);
            if ($AM < 1) {
                $result = Detail::delete($detail);
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
            } else {
                $result = Detail::update($detail);
                echo 
            '<div style="padding: 15px; border-radius: 30px; text-align: center; background-color: #9bf9b9; color: rgba(98, 0, 0, 0.76);; display: block;" id="myAlert">
            <span onclick="closeAlert()" style="margin-left: 15px; color: white; font-weight: bold; float: right;
                    font-size: 22px; line-height: 20px; cursor: pointer; transition: 0.3s;">&times;</span>
            <strong>'.$result[0]['message'].'</strong>
        </div>
        <script>
            function closeAlert() {
                var alertDiv = document.getElementById("myAlert");
                alertDiv.style.display = "none";
            }
        </script>';
            }
            self::takeDTC();
        } else {
            $detail = Detail::find($_GET['IDDT']);
            $data = array('detail' => $detail);
            $this->render('cart', $data);
        }
    }
    public function delete()
    {
        $detail = Detail::find($_GET['id']);
        $result = Detail::delete($detail);
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
        self::takeDTC();
    }
}
