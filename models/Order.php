<?php
class Order
{
    public $CartID;
    public $CusName;
    public $CusPhone;
    public $CusAddr;
    public $Total;
    public $Status;
    public $Date;

    public function __construct($CartID, $CusName, $CusPhone, $CusAddr, $Total, $Status, $Date)
    {
        $this->CartID = $CartID;
        $this->CusName = $CusName;
        $this->CusPhone = $CusPhone;
        $this->CusAddr = $CusAddr;
        $this->Total = $Total;
        $this->Status = $Status;
        $this->Date = $Date;
    }
    public static function takeOR($i)
    {
        try {
            $db = DB::getInstance();
            $s = $db->prepare('SELECT * FROM detail WHERE CartID = :cartId');
            $s->bindValue(':cartId', $i, PDO::PARAM_STR);
            $s->execute();
            $list = array();
            $lAn = array();
            require_once 'Alcohol.php';
            require_once 'Detail.php';
            foreach ($s->fetchAll(PDO::FETCH_ASSOC) as $r) {
                $sr = $db->prepare('SELECT * FROM Alcohol WHERE ID = :id');
                $sr->bindValue(':id', $r['IDPD'], PDO::PARAM_INT);
                $sr->execute();
                $sra = $sr->fetch(PDO::FETCH_ASSOC);
                $list[] = new Detail($r['IDDT'], $r['CartID'], $r['IDPD'], $r['AM'], $r['PricePD'], $r['TotalPD']);
                $lAn[] = new Alcohol($sra['Name'], $sra['ID'], $sra['Status'], $sra['Description'], $sra['Poster'], $sra['Genre'], $sra['Country'], $sra['Preprice'], $sra['Price'], $sra['Amount'], $sra['Amountleft']);
            }
            return array($list, $lAn);
        } catch (Exception $e) {
            print("Error: " . $e->getMessage());
        }
    }

    public static function all()
    {
        try {
            $db = DB::getInstance();
            $red = $db->query('SELECT * FROM Order');
            foreach ($red->fetchAll() as $r) {
                $list[] = new Order($r['CartID'], $r['CusName'], $r['CusPhone'], $r['CusAddr'], $r['Total'], $r['Status'], $r['Date']);
            }
            return $list;
        } catch (Exception $e) {
            print("Error: " + $e);
        }
    }

    public static function add($i)
    {
        $result = array('status', 'message');
        try {
            $db = DB::getInstance();
            $query = "INSERT INTO Cart (`CartID`) VALUES(:ID)";
            $insertStatement = $db->prepare($query);
            $insertStatement->bindParam(':ID', $i);

            if ($insertStatement->execute()) {
                $result['status'] = true;
                $result['message'] = 'Yours order have been created ! ';
            } else {
                $result['status'] = false;
                $result['message'] = "Something went wrong while adding the Order";
            }
        } catch (Exception $e) {
            $result['status'] = false;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }
    public static function updateOR($i)
    {
        $result = array('status', 'message');
        try {
            $db = DB::getInstance();
            $query1 = "UPDATE cart SET Cusname=:CusName, CusPhone=:CusPhone, CusAddr=:CusAddr, Total=:Total, Status=:Status, Daycreate=:Date WHERE CartID=:CartID";
            $s = $db->prepare($query1);
            $s->bindValue(':CusName', $i->CusName, PDO::PARAM_STR);
            $s->bindValue(':CusPhone', $i->CusPhone, PDO::PARAM_INT);
            $s->bindValue(':CusAddr', $i->CusAddr, PDO::PARAM_STR);
            $s->bindValue(':Total', $i->Total, PDO::PARAM_INT);
            $s->bindValue(':Status', $i->Status, PDO::PARAM_STR);
            $s->bindValue(':Date', $i->Date, PDO::PARAM_STR);
            $s->bindValue(':CartID', $i->CartID, PDO::PARAM_STR);

            if ($s->execute() !== false) {
                $result['status'] = true;
                $result['message'] = "Cancel successfully";
            } else {
                $result['status'] = false;
                $result['message'] = "Something wrong";
            }
        } catch (Exception $e) {
            $result['status'] = false;
            $result['message'] = var_dump($e->getMessage());
        }
        return $result;
    }
    public static function UpStatus($CartID,$Status)
    {
        $result = array('status', 'message');
        try {
            $db = DB::getInstance();
            $query1 = "UPDATE cart SET  Status=:Status WHERE CartID=:CartID";
            $s = $db->prepare($query1);
            $s->bindValue(':Status', $Status, PDO::PARAM_STR);
            $s->bindValue(':CartID', $CartID, PDO::PARAM_STR);

            if ($s->execute() !== false) {
                $result['status'] = true;
                $result['message'] = "Update success";
            } else {
                $result['status'] = false;
                $result['message'] = "Something wrong";
            }
        } catch (Exception $e) {
            $result['status'] = false;
            $result['message'] = var_dump($e->getMessage());
        }
        return $result;
    }

    public static function delete($i)
    {
        try {
            $db = DB::getInstance();
            $query = "DELETE FROM Order where CartID = " . $i->CartID . ";";
            if ($db->exec($query) !== false) {
                $result['status'] = true;
                $result['message'] = "Delete success";
            } else {
                $result['status'] = false;
                $result['message'] = "Something wrong !";
            }
        } catch (Exception $e) {
            $result['status'] = false;
            $result['message'] = var_dump($e->getMessage());
        }
        return $result;
    }
    public static function findOR($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM cart WHERE CartID = :id');
        $req->execute(array('id' => $id));
        $r = $req->fetch();
        if ($r != false) {
            return new Order($r['CartID'], $r['CusName'], $r['CusPhone'], $r['CusAddr'], $r['Total'], $r['Status'], $r['Daycreate']);
        } else {
            return NULL;
        }
    }
    public static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM cart WHERE CartID = :id');
        $req->execute(array('id' => $id));
        $r = $req->fetch();
        if ($r != false && $r['CusName'] != NULL) {
            return false;
        } elseif ($r != false && $r['CusName'] == NULL) {
            return true;
        } else {
            return NULL;
        }
    }
    public static function check($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM cart WHERE CartID = :id');
        $req->execute(array('id' => $id));
        $r = $req->fetch();
        if (isset($r['id'])) {
            return true;
        } else
            return false;
    }
    public static function search($i)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM cart WHERE CartID LIKE '%" . $i . "%' ; ");
        $i = $req->fetchAll();
        $list[] = new Order($i['CartID'], $i['CusName'], $i['CusPhone'], $i['CusAddr'], $i['Total'], $i['Status'], $i['Daycreate']);
        return $list;
    }
    public function searchAjax()
    {
        if (isset($_POST['IDE'])) {
            # Get id từ URL
            $id = $_POST['IDE'];
            $status = Employee::delete($id);
            echo json_encode($status);
            die();
        }
    }
}
