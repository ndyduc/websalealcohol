<?php
class Detail
{
    public $IDDT;
    public $CartID;
    public $IDPD;
    public $AM;
    public $PricePD;
    public $TotalPD;

    public function __construct($IDDT, $CartID, $IDPD, $AM, $PricePD, $TotalPD)
    {
        $this->IDDT = $IDDT;
        $this->CartID = $CartID;
        $this->IDPD = $IDPD;
        $this->AM = $AM;
        $this->PricePD = $PricePD;
        $this->TotalPD = $TotalPD;
    }

    public static function takeDT($i)
    {
        try {
            $db = DB::getInstance();
            $s = $db->prepare('SELECT * FROM detail WHERE CartID = :cartId');
            $s->bindValue(':cartId', $i, PDO::PARAM_STR);
            $s->execute();
            $list = array();
            $lAn = array();
            require_once 'Alcohol.php';
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


    public static function add($i)
    {
        $result = array('status', 'message');
        try {
            $db = DB::getInstance();
            $query = "INSERT INTO detail (`CartID`,`IDPD`, `AM`, `PricePD`,`TotalPD` )
                VALUES('" . $_SESSION['id'] . "',' " . $i->IDPD . "',1,'" . $i->PricePD . "','" . $i->PricePD . "')";
            if ($db->exec($query) !== false) {
                $result['status'] = true;
                $result['message'] = "added to cart successfully ";
            } else {
                $result['status'] = false;
                $result['message'] = "Something wrong ! Fuck U ";
            }
        } catch (Exception $e) {
            $result['status'] = false;
            $result['message'] = "Error: " . $e->getMessage();
        }
        return $result;
    }

    public static function update($i)
    {
        $result = array('status', 'message');
        try {
            $db = DB::getInstance();
            $s = $db->prepare('SELECT Alcohol.Amountleft, detail.AM
            FROM Alcohol INNER JOIN detail ON Alcohol.ID = detail.IDPD
            WHERE detail.IDDT = :id');
            $s->bindValue(':id', $i->IDDT, PDO::PARAM_INT);
            $s->execute();

            $row = $s->fetch(PDO::FETCH_ASSOC);
            $amountleft = $row['Amountleft'];
            $am = $i->AM;
            if ($amountleft < $am) {
                $result['status'] = false;
                $result['message'] = false;
                return array($result, $i->IDDT);
            } else {
                $query1 = "UPDATE Detail SET AM='" . $i->AM . "',TotalPD='" . $i->TotalPD . "' WHERE IDDT=" . $i->IDDT . ";";
                if ($db->exec($query1) !== false) {
                    $result['status'] = true;
                    $result['message'] = "Update success ";
                } else {
                    $result['status'] = false;
                    $result['message'] = "Something wrong";
                }
            }
        } catch (Exception $e) {
            $result['status'] = false;
            $result['message'] = $e->getMessage();
        }
        return array($result,$i->IDDT);
    }
    public static function delete($i)
    {
        $result = array('status', 'message');
        try {
            $db = DB::getInstance();
            $query = "DELETE FROM detail where IDDT = " . $i->IDDT . ";";
            if ($db->exec($query) !== false) {
                $result['status'] = true;
                $result['message'] = "Delete success";
            } else {
                $result['status'] = false;
                $result['message'] = "Something wrong !";
            }
        } catch (Exception $e) {
            $result['status'] = false;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }

    public static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM detail WHERE IDDT = :id');
        $req->execute(array('id' => $id));
        $i = $req->fetch();
        if (isset($i['IDDT']))
            return new Detail($i['IDDT'], $i['CartIPD'], $i['IDPD'], $i['AM'], $i['PricePD'], $i['TotalPD']);
        else
            header('Location: Cart.php?controller=Carts&action=error');
        return null;
    }
    public static function findDT($i, $j)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM detail WHERE CartID = :id AND IDPD = :jd');
        $req->execute(array('id' => $i, 'jd' => $j));
        $i = $req->fetch();
        if (isset($i['CartID'], $i['IDPD'])) {
            return new Detail($i['IDDT'], $i['CartID'], $i['IDPD'], $i['AM'], $i['PricePD'], $i['TotalPD']);
        } else
            return null;
    }
}
