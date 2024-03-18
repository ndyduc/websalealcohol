<?php
require_once 'controllers/base_controller.php';
require_once 'models/Order.php';
class OrderController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'Orders';
    }
    public function error()
    {
        $this->render('error');
    }
    public function index()
    {
        $Orders = Order::all();
        $data = array('Orders' => $Orders);
        $this->render('Order', $data);
    }
    public function make()
    {
        $details = Order::takeOR($_SESSION['id']);
        $data = array('details' => $details[0], 'alcohols' => $details[1]);
        $this->render('pay', $data);
    }
    public function status() {
        $Status = $_POST['Status'];
        $CartID = $_POST['CartID'];

        $result = Order::UpStatus($CartID,$Status);
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
        $key = $CartID;
        $check = Order::findOR($key);
        require_once 'models/Detail.php';
        $details = Detail::takeDT($key);

        $data = array('details' => $details[0], 'alcohols' => $details[1], 'Order' => $check);
        $this->render('order', $data);
    }
    public function addOR()
    {
        if (isset($_POST['submit'])) {
            $CartID = $_SESSION['id'];
            $CusName = $_POST['CusName'];
            $CusPhone = $_POST['CusPhone'];
            $Total = $_POST['Total'];
            $Status = $_POST['pay'];
            $addr1 = $_POST['addr1'];
            $addr2 = $_POST['addr2'];
            $addr3 = $_POST['addr3'];
            $addr4 = $_POST['addr4'];
            $Date = date('Y-m-d');
            $CusAddr = $addr1 . ' ' . $addr2 . ' ' . $addr3;
            $check = Order::find($CartID);

            require_once 'models/Alcohol.php';
            $sold = Alcohol::sold($_SESSION['id']);

            $order = new Order($CartID, $CusName, $CusPhone, $CusAddr, $Total, $Status, $Date);
            if ($check == true && $sold['status'] == true) {
                Order::updateOR($order);
            } elseif ($check == NULL || $sold['status'] == false) {
                header('Location: index.php?controller=Alcohol&action=error');
                exit();
            }
            $orders = Order::findOR($CartID);
            require_once 'models/Detail.php';
            $details = Detail::takeDT($CartID);

            unset($_SESSION['id']);
            $length = random_int(10, 15);
            $randomBytes = random_bytes($length);
            $sessionId = bin2hex($randomBytes);
            $_SESSION['id'] = $sessionId;
            // echo 'New session: '.$_SESSION['id'];

            require_once('models/Order.php');
            // echo 'add new cart : ' . $_SESSION['id'];
            $result = Order::add($_SESSION['id']);
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

            $data = array('details' => $details[0], 'alcohols' => $details[1], 'Order' => $orders);
            $this->render('order', $data);
        } else {
            $this->render('error');
        }
    }
    public function cancel(){
        $CartID = $_GET['cartid'];
        $status = 'Cancel';
        $result= Order::UpStatus($CartID,$status);
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
        $check = Order::findOR($CartID);
        require_once 'models/Detail.php';
        $details = Detail::takeDT($CartID);

        $data = array('details' => $details[0], 'alcohols' => $details[1], 'Order' => $check);
        $this->render('order', $data);
    }
    public function search()
    {
        if (isset($_POST['key'])) {
            $key = $_POST['key'];
        } elseif (isset($_SESSION['position']) && isset($_GET['cartid'])) {
            $key = $_GET['cartid'];
        } else {
            $key = null;
        }
        $check = Order::findOR($key);
        require_once 'models/Detail.php';
        $details = Detail::takeDT($key);

        $data = array('details' => $details[0], 'alcohols' => $details[1], 'Order' => $check);
        $this->render('order', $data);
    }
}
