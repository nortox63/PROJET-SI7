<?php

class PdoBD {

    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=suivisio';
    private static $user = 'root';
    private static $mdp = '';
    private $pdo = null;
    private static $pdoBd = null;

    private function __construct() {
        $this->pdo = new PDO(PdoBD::$serveur . ';' . PdoBD::$bdd, PdoBD::$user, PdoBD::$mdp);
        $this->pdo->query("SET CHARACTER SET utf8");
    }

    public function _destruct() {
        PdoBD::$pdo = null;
    }

    public static function getPdoBD() {
        if (PdoBD::$pdoBd == null) {
            PdoBD::$pdoBd = new PdoBD();
        }
        return PdoBD::$pdoBd;
    }

    public function getTrucs() {
        $req = "select * from truc";
        $st = $this->pdo->prepare($req);
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTruc($libTruc) {
        
       
        $req = "insert into truc(libTruc) values(?)";
        $st = $this->pdo->prepare($req);
        $st->bindParam(1, $libTruc);
        return $st->execute();
    }

    public function delTruc($idTruc) {
        $req = "delete from truc where idTruc=?";
        $st = $this->pdo->prepare($req);
        $st->bindParam(1, $idTruc);
        return $st->execute();
    }

    public function updateTruc($idTruc, $libTruc) {
        $req = "update truc set libTruc=? where idTruc = ?";
        $st = $this->pdo->prepare($req);
        $st->bindParam(1, $libTruc);
        $st->bindParam(2, $idTruc);
        return $st->execute();
    }

}

?>