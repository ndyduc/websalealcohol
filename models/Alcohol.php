<?php
class Alcohol
{
    public $Name;
    public $ID;
    public $Status;
    public $Description;
    public $Poster;
    public $Genre;
    public $Country;
    public $Preprice;
    public $Price;
    public $Amount;
    public $Amountleft;

    public function __construct($Name, $ID, $Status, $Description, $Poster, $Genre, $Country, $Preprice, $Price, $Amount, $Amountleft)
    {
        $this->Name = $Name;
        $this->ID = $ID;
        $this->Status = $Status;
        $this->Description = $Description;
        $this->Poster = $Poster;
        $this->Genre = $Genre;
        $this->Country = $Country;
        $this->Preprice = $Preprice;
        $this->Price = $Price;
        $this->Amount = $Amount;
        $this->Amountleft = $Amountleft;
    }

    public static function info()
    {
        try {
            $db = DB::getInstance();
            $red = $db->query('SELECT `Name`,`ID`, `Description`, `Poster`, `Price`  FROM Alcohol WHERE Status = 0');
            foreach ($red->fetchAll() as $i) {
                $list[] = new Alcohol($i['Name'], $i['ID'], -1, $i['Description'], $i['Poster'], -1, -1, -1, $i['Price'], -1, -1);
            }
            return $list;
        } catch (Exception $e) {
            print("Error: " + $e);
        }
    }
    public static function allinfor()
    {
        try {
            $db = DB::getInstance();
            $red = $db->query('SELECT * FROM Alcohol ORDER BY Status ASC;');
            foreach ($red->fetchAll() as $i) {
                $list[] = new Alcohol($i['Name'], $i['ID'], $i['Status'], $i['Description'], $i['Poster'], $i['Genre'], $i['Country'], $i['Preprice'], $i['Price'], $i['Amount'], $i['Amountleft']);
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
            $check = self::findByName($i->Name);

            if ($check == null) {
                $s = $db->prepare("INSERT INTO Alcohol (`Name`, `Status`, `Description`, `Poster`, `Genre`, `Country`, `Preprice`, `Price`, `Amount`, `Amountleft`)
                VALUES (:name, :status, :description, :poster, :genre, :country, :preprice, :price, :amount, :amountleft)");
                $s->bindValue(':name', $i->Name, PDO::PARAM_STR);
                $s->bindValue(':status', $i->Status, PDO::PARAM_INT);
                $s->bindValue(':description', $i->Description, PDO::PARAM_STR);
                $s->bindValue(':poster', $i->Poster, PDO::PARAM_STR);
                $s->bindValue(':genre', $i->Genre, PDO::PARAM_STR);
                $s->bindValue(':country', $i->Country, PDO::PARAM_STR);
                $s->bindValue(':preprice', $i->Preprice, PDO::PARAM_INT);
                $s->bindValue(':price', $i->Price, PDO::PARAM_INT);
                $s->bindValue(':amount', $i->Amount, PDO::PARAM_INT);
                $s->bindValue(':amountleft', $i->Amountleft, PDO::PARAM_INT);
                if ($s->execute()) {
                    $result['status'] = true;
                    $result['message'] = 'Add Alcohol successfully!';
                } else {
                    $result['status'] = false;
                    $result['message'] = 'Something went wrong! Fuck U';
                }
            } else {
                $result['status'] = false;
                $result['message'] = 'Alcohol already exists !';
            }
        } catch (Exception $e) {
            $result['status'] = false;
            $result['message'] = var_dump($e->getMessage());
        }
        return $result;
    }


    public static function delete($Alcohol)
{
    try {
        $db = DB::getInstance();
        $check = "SELECT * FROM detail WHERE IDPD =" . $Alcohol->ID . ";";
        $checkResult = $db->query($check);

        if ($checkResult->rowCount() > 0) {
            $result['status'] = false;
            $result['message'] = "Can't delete this product! It has related details in the 'detail' table.";
        } else {
            $query = "DELETE FROM Alcohol WHERE ID = " . $Alcohol->ID . ";";
            if ($db->exec($query) !== false) {
                $result['status'] = true;
                $result['message'] = "Delete success";
            } else {
                $result['status'] = false;
                $result['message'] = "Something wrong!";
            }
        }
    } catch (Exception $e) {
        $result['status'] = false;
        $result['message'] = $e->getMessage();
    }
    return $result;
}


    public static function update($Alcohol)
    {
        $result = array('status', 'message');
        try {
            $db = DB::getInstance();
            $query = "UPDATE Alcohol SET
            `Name`=:Name,
            `Status`=:Status,
            `Poster`=:Poster,
            `Description`=:Description,
            `Preprice`=:Preprice,
            `Genre`=:Genre,
            `Country`=:Country,
            `Price`=:Price,
            `Amount`=:Amount,
            `Amountleft`=:Amountleft
            WHERE ID=:ID";

            $stmt = $db->prepare($query);
            $stmt->bindValue(':Name', $Alcohol->Name, PDO::PARAM_STR);
            $stmt->bindValue(':Status', $Alcohol->Status, PDO::PARAM_INT);
            $stmt->bindValue(':Poster', $Alcohol->Poster, PDO::PARAM_STR);
            $stmt->bindValue(':Description', $Alcohol->Description, PDO::PARAM_STR);
            $stmt->bindValue(':Preprice', $Alcohol->Preprice, PDO::PARAM_STR);
            $stmt->bindValue(':Genre', $Alcohol->Genre, PDO::PARAM_STR);
            $stmt->bindValue(':Country', $Alcohol->Country, PDO::PARAM_STR);
            $stmt->bindValue(':Price', $Alcohol->Price, PDO::PARAM_INT);
            $stmt->bindValue(':Amount', $Alcohol->Amount, PDO::PARAM_INT);
            $stmt->bindValue(':Amountleft', $Alcohol->Amountleft, PDO::PARAM_INT);
            $stmt->bindValue(':ID', $Alcohol->ID, PDO::PARAM_INT);

            if ($stmt->execute()) {
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
    public static function sold($cartId)
    {
        $result = array('status', 'message');
        try {
            $db = DB::getInstance();
            $detail = $db->prepare('SELECT * FROM detail WHERE CartID = :cartId');
            $detail->bindValue(':cartId', $cartId, PDO::PARAM_STR);
            $detail->execute();
            foreach ($detail->fetchAll() as $i) {
                $queryCheck = "SELECT Amountleft FROM Alcohol WHERE ID = :ID";
                $stmtCheck = $db->prepare($queryCheck);
                $stmtCheck->bindValue(':ID', $i['IDPD'], PDO::PARAM_INT);
                $stmtCheck->execute();
                $amountleftAlcohol = $stmtCheck->fetchColumn();
                if ($amountleftAlcohol - $i['AM'] < 0) {
                    $result['status'] = false;
                    $result['message'] = "Not enough amount left for product with ID {$i['IDPD']}";
                    return $result;
                }
                $queryUpdate = "UPDATE Alcohol SET
                `Amountleft` = `Amountleft` - :amount
                WHERE ID = :ID";
                $stmtUpdate = $db->prepare($queryUpdate);
                $stmtUpdate->bindValue(':amount', $i['AM'], PDO::PARAM_INT);
                $stmtUpdate->bindValue(':ID', $i['IDPD'], PDO::PARAM_INT);
                if (!$stmtUpdate->execute()) {
                    $result['status'] = false;
                    $result['message'] = "Something wrong";
                    return $result;
                }
            }
            $result['status'] = true;
            $result['message'] = "Update success";
        } catch (Exception $e) {
            $result['status'] = false;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }


    public static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM Alcohol WHERE ID = :id');
        $req->execute(array('id' => $id));
        $i = $req->fetch();
        if (isset($i['ID'])) {
            return new Alcohol($i['Name'], $i['ID'], $i['Status'], $i['Description'], $i['Poster'], $i['Genre'], $i['Country'], $i['Preprice'], $i['Price'], $i['Amount'], $i['Amountleft']);
        } else {
            header('Location: index.php?controller=&action=error');
        }
        return null;
    }

    public static function search($i)
    {
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM Alcohol WHERE 'Name' LIKE '%" . $i . "%' OR Genre LIKE '%" . $i . "%' OR Country LIKE '%" . $i . "%' OR Description LIKE '%" . $i . "%' ; ");
        foreach ($req->fetchAll() as $row) {
            $list[] =  new Alcohol($row['Name'], $row['ID'], $row['Status'], $row['Description'], $row['Poster'], $row['Genre'], $row['Country'], $row['Preprice'], $row['Price'], $row['Amount'], $row['Amountleft']);
        }
        return $list;
    }

    public static function findByGenre($genre)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM Alcohol WHERE Genre = :genre');
        $req->execute(array('genre' => $genre));
        $Alcohols = [];
        while ($i = $req->fetch()) {
            $Alcohols[] = new Alcohol($i['Name'], $i['ID'], $i['Status'], $i['Description'], $i['Poster'], $i['Genre'], $i['Country'], $i['Preprice'], $i['Price'], $i['Amount'], $i['Amountleft']);
        }
        return $Alcohols;
    }

    public static function findByName($name)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM Alcohol WHERE Name = :name');
        $req->execute(array('name' => $name));
        $i = $req->fetch();
        if ($i) {
            $Alcohol = new Alcohol($i['Name'], $i['ID'], $i['Status'], $i['Description'], $i['Poster'], $i['Genre'], $i['Country'], $i['Preprice'], $i['Price'], $i['Amount'], $i['Amountleft']);
            return $Alcohol;
        } else {
            return null;
        }
    }
    public static function findid($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM Alcohol WHERE ID = :id');
        $req->execute(array('id' => $id));
        $i = $req->fetch();
        $Alcohol = new Alcohol($i['Name'], $i['ID'], $i['Status'], $i['Description'], $i['Poster'], $i['Genre'], $i['Country'], $i['Preprice'], $i['Price'], $i['Amount'], $i['Amountleft']);
        return $Alcohol;
    }
}
