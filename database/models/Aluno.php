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

    // ✅ MÉTODO CORRIGIDO PARA EXCLUIR O ALUNO SEM ERRO DE CHAVE ESTRANGEIRA
    public function delete($id) {
        try {
            // Verifica se o aluno existe antes de excluir
            $stmtCheck = $this->conn->prepare("SELECT id FROM aluno WHERE id = ?");
            $stmtCheck->execute([$id]);
            if ($stmtCheck->rowCount() === 0) {
                throw new Exception("Aluno não encontrado!");
            }

            // Remove referências da tabela 'kids'
            $stmtKids = $this->conn->prepare("DELETE FROM kids WHERE aluno_id = ?");
            $stmtKids->execute([$id]);

            // Remove referências da tabela 'turma_mista'
            $stmtTurmaMista = $this->conn->prepare("DELETE FROM turma_mista WHERE aluno_id = ?");
            $stmtTurmaMista->execute([$id]);

            // Agora, exclui o aluno
            $stmtAluno = $this->conn->prepare("DELETE FROM aluno WHERE id = ?");
            if ($stmtAluno->execute([$id])) {
                return true;
            } else {
                throw new Exception("Erro ao excluir aluno.");
            }
        } catch (PDOException $e) {
            die("Erro ao excluir: " . $e->getMessage());
        }
    }
}
