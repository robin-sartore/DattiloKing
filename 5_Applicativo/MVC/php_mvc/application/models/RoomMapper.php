<?php

class RoomMapper {
    private $db;

    public function __construct() {
        require_once __DIR__ . '/Database.php'; // Aggiorna il percorso per includere Database.php dalla directory models
        $this->db = Database::getConnection();
    }

    public function creaStanza($codice, $creatore, $rounds) {
        $stmt = $this->db->prepare("INSERT INTO rooms (code, creator, rounds) VALUES (?, ?, ?)");
        $stmt->execute([$codice, $creatore, $rounds]);
        return $this->db->lastInsertId(); // restituisce l'id della stanza appena creata
    }

    public function aggiungiPartecipante($room_code, $username) {
        $stmt = $this->db->prepare("INSERT INTO room_players (room_code, username) VALUES (?, ?)");
        $stmt->execute([$room_code, $username]);
    }

    public function getPlayersInRoom($roomCode) {
        $stmt = $this->db->prepare("SELECT username FROM room_players WHERE room_code = ?");
        $stmt->execute([$roomCode]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getCreator($roomCode) {
        $stmt = $this->db->prepare("SELECT creator FROM rooms WHERE code = ?");
        $stmt->execute([$roomCode]);
        return $stmt->fetchColumn();
    }

    public function roomExists($code) {
        $stmt = $this->db->prepare("SELECT * FROM rooms WHERE code = ?");
        $stmt->execute([$code]);
        return $stmt->fetch() !== false;
    }

    public function aggiornaRound($codice, $rounds) {
        $stmt = $this->db->prepare("UPDATE rooms SET rounds = ? WHERE code = ?");
        $stmt->execute([$rounds, $codice]);
    }
}
