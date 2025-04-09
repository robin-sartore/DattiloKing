<?php

class RoomMapper {
    private $db;

    public function __construct() {
        require_once 'application/libs/Database.php';
        $this->db = Database::getConnection();
    }

    public function creaStanza($codice, $creatore) {
        $stmt = $this->db->prepare("INSERT INTO stanza (codice, creatore) VALUES (?, ?)");
        $stmt->execute([$codice, $creatore]);
        return $this->db->lastInsertId(); // restituisce l'id della stanza appena creata
    }

    public function aggiungiPartecipante($stanza_id, $nome) {
        $stmt = $this->db->prepare("INSERT INTO partecipante (stanza_id, nome) VALUES (?, ?)");
        $stmt->execute([$stanza_id, $nome]);
    }
    public function getPlayersInRoom($roomCode) {
        $stmt = $this->conn->prepare("SELECT username FROM room_players WHERE room_code = ?");
        $stmt->execute([$roomCode]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
    public function roomExists($code) {
        $stmt = $this->conn->prepare("SELECT * FROM rooms WHERE code = ?");
        $stmt->execute([$code]);
        return $stmt->fetch() !== false;
    }
}
