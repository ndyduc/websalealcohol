<?php
class Employee
{
    public $IDU;
    public $Namee;
    public $Pass;
    public $Phonee;
    public $IDE;
    public $Position;

    public function __construct($IDU, $Namee, $Pass, $Phonee, $IDE, $Position)
    {
        $this->IDU = $IDU;
        $this->Namee = $Namee;
        $this->Pass = $Pass;
        $this->Phonee = $Phonee;
        $this->IDE = $IDE;
        $this->Position = $Position;
    }

    public static function all()
    {
        try {
            $db = DB::getInstance();
            $red = $db->query('SELECT * FROM employee ORDER BY Position');
            foreach ($red->fetchAll() as $i) {
                $list[] = new Employee($i['IDU'], $i['Namee'], $i['Pass'], $i['Phonee'], $i['IDE'], $i['Position']);
            }
            return $list;
        } catch (Exception $e) {
            print("Error: " + $e);
        }
    }

    public static function Check($a, $b)
    {
        $result = array('status', 'message');
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM employee WHERE Phonee = :po AND Pass = :ps');
        $req->execute(array('po' => $a, 'ps' => $b));
        $i = $req->fetch();
        if (isset($i['Phonee']) && isset($i['Pass'])) {
            $result['status'] = true;
            $result['message'] = "Login sucessfully ! ";
            $employee = new Employee($i['IDU'], $i['Namee'], $i['Pass'], $i['Phonee'], $i['IDE'], $i['Position']);
            $result = array('status' => true, 'message' => 'Login successful', 'employee' => $employee);
            return $result;
        } else {
            $result['status'] = false;
            $result['message'] = "Can't find your account !";
            return $result;
        }
    }
    public static function findem($po)
    {
        try {
            $db = DB::getInstance();
            $red = $db->prepare('SELECT * FROM employee WHERE Position = :po');
            $red->execute(array('po' => $po));
            $list = array();

            foreach ($red->fetchAll() as $i) {
                $list[] = new Employee($i['IDU'], $i['Namee'], $i['Pass'], $i['Phonee'], $i['IDE'], $i['Position']);
            }

            return $list;
        } catch (Exception $e) {
            print 'Exception: ' . $e->getMessage();
        }
    }
    public static function findor($po)
    {
        try {
            $db = DB::getInstance();
            $red = $db->prepare('SELECT * FROM cart WHERE Status = :po');
            $red->execute(array('po' => $po));
            $list = array();

            foreach ($red->fetchAll() as $i) {
                $list[] = new Employee($i['IDU'], $i['Namee'], $i['Pass'], $i['Phonee'], $i['IDE'], $i['Position']);
            }

            return $list;
        } catch (Exception $e) {
            print 'Exception: ' . $e->getMessage();
        }
    }
    public static function searchor($i,$j)
    {
        try {
            $db = DB::getInstance();
            $red = $db->prepare("SELECT * FROM cart WHERE Status = :i OR Status = :j ORDER BY
            CASE Status
                WHEN 'Card' THEN 1
                WHEN 'Cash' THEN 2
                END;");
            $red->execute(array('i' => $i,'j' => $j));
            $list = array();
            require_once 'models/Order.php';
            require_once 'models/Alcohol.php';

            foreach ($red->fetchAll() as $r) {
                $a = $db->prepare('SELECT IDPD FROM detail WHERE CartID = :cartID');
                $a->bindParam(':cartID', $r['CartID']);
                $a->execute();
                $IDPD = $a->fetchColumn();

                $b = $db->prepare('SELECT Poster FROM Alcohol WHERE ID = :idPD');
                $b->bindParam(':idPD', $IDPD);
                $b->execute();
                $poster = $b->fetchColumn();

                $list[] = new Order($r['CartID'], $r['CusName'], $r['CusPhone'], $poster, $r['Total'], $r['Status'], $r['Daycreate']);
            }

            return $list;
        } catch (Exception $e) {
            print 'Exception: ' . $e->getMessage();
        }
    }
    public static function takeor()
    {
        try {
            $db = DB::getInstance();
            $red = $db->prepare("SELECT * FROM cart WHERE CusName IS NOT NULL ORDER BY
            CASE Status
                WHEN 'Card' THEN 1
                WHEN 'Cash' THEN 2
                WHEN 'Card-process' THEN 3
                WHEN 'Cash-process' THEN 4
                WHEN 'Card-delivery' THEN 5
                WHEN 'Cash-delivery' THEN 6
                WHEN 'Card-done' THEN 7
                WHEN 'Cash-done' THEN 8
                WHEN 'Cancel' THEN 9
                END;
            ");

            $red->execute();
            $list = array();
            require_once 'models/Order.php';
            require_once 'models/Alcohol.php';

            foreach ($red->fetchAll() as $r) {
                $a = $db->prepare('SELECT IDPD FROM detail WHERE CartID = :cartID');
                $a->bindParam(':cartID', $r['CartID']);
                $a->execute();
                $IDPD = $a->fetchColumn();

                $b = $db->prepare('SELECT Poster FROM Alcohol WHERE ID = :idPD');
                $b->bindParam(':idPD', $IDPD);
                $b->execute();
                $poster = $b->fetchColumn();

                $list[] = new Order($r['CartID'], $r['CusName'], $r['CusPhone'], $poster, $r['Total'], $r['Status'], $r['Daycreate']);
            }

            return $list;
        } catch (Exception $e) {
            print 'Exception: ' . $e->getMessage();
        }
    }


    public static function add($employee)
    {
        $result = array('status', 'message');
        try {
            $db = DB::getInstance();
            $query = "INSERT INTO employee (`Namee`, `Pass`, `Phonee`, `IDE`, `Position`)
            VALUES('" . $employee->Namee . "','" . $employee->Pass . "','" . $employee->Phonee . "','" . $employee->IDE . "'," . (int)$employee->Position . ")";

            if ($db->exec($query) !== false) {
                $result['status'] = true;
                $result['message'] = true;
            } else {
                $result['status'] = false;
                $result['message'] = "Something wrong ! Fuck U";
            }
        } catch (Exception $e) {
            $result['status'] = false;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }

    public static function delete($employee)
    {
        try {
            $db = DB::getInstance();
            $query = "DELETE FROM employee where IDU = " . $employee->IDU . ";";
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
    public static function changepass($i, $j)
    {
        $result = array('status', 'message');
        try {
            $db = DB::getInstance();
            $query = "UPDATE employee SET
            Pass = '" . $i . "' 
            WHERE IDU = " . $j . ";";
            if ($db->exec($query) !== false) {
                $result['status'] = true;
                $result['message'] = "Update Password success";
            } else {
                $result['status'] = false;
                $result['message'] = "Something wrong";
            }
        } catch (Exception $e) {
            $result['status'] = false;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }

    public static function update($i)
    {
        $result = array('status', 'message');
        try {
            $db = DB::getInstance();
            $query = "UPDATE employee SET
        Namee='" . $i->Namee . "',
        Pass='" . $i->Pass . "',
        Phonee='" . $i->Phonee . "',
        Position=" . (int)$i->Position . ",  -- Chuyển đổi giá trị thành kiểu INT
        IDE='" . $i->IDE . "' 
        WHERE IDU=" . $i->IDU . ";";

            if ($db->exec($query) !== false) {
                $result['status'] = true;
                $result['message'] = "Update success";
            } else {
                $result['status'] = false;
                $result['message'] = "Something wrong";
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
        $req = $db->prepare('SELECT * FROM employee WHERE IDU = :id');
        $req->execute(array('id' => $id));
        $i = $req->fetch();
        if (isset($i['IDU']))
            return new Employee($i['IDU'], $i['Namee'], $i['Phonee'], -1, $i['IDE'], $i['Position']);
        else
            header('Location: index.php?controller=employees&action=error');
        return null;
    }


    public static function search($input)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM employee WHERE Namee LIKE '%" . $input . "%' OR Phonee LIKE '%" . $input . "%'  OR IDU = '%" . $input . "%' OR IDE ='%" . $input . "%' ; ");
        foreach ($req->fetchAll() as $i)
            $list[] = new Employee($i['IDU'], $i['Name'], -1, $i['Phone'], $i['IDE'], $i['Position']);
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
