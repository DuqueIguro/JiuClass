<?php

require_once __DIR__ . '/../config/db.php';

class Aluno {
    private $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM aluno");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM aluno WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO aluno (nome, data_nascimento, cpf, contato, graduacao, data_graduacao) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['nome'],
            $data['data_nascimento'],
            $data['cpf'],
            $data['contato'],
            $data['graduacao'],
            $data['data_graduacao']
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE aluno SET nome = ?, data_nascimento = ?, cpf = ?, contato = ?, graduacao = ?, data_graduacao = ? WHERE id = ?");
        return $stmt->execute([
            $data['nome'],
            $data['data_nascimento'],
            $data['cpf'],
            $data['contato'],
            $data['graduacao'],
            $data['data_graduacao'],
            $id
        ]);
    }
 //CONFIGURADO PARA DELETAR O ALUNO
    public function delete($id) {
        try {
            $stmt1 = $this->conn->prepare("DELETE FROM turma_mista WHERE aluno_id = ?");
            $stmt1->execute([$id]);

            $stmt2 = $this->conn->prepare("DELETE FROM aluno WHERE id = ?");
            return $stmt2->execute([$id]);
        } catch (PDOException $e) {
            return false;
        }
    }
}