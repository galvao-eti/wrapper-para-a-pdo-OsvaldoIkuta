<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Osvaldo
 * Date: 13/08/2018
 * Time: 15:17
 */

namespace Turma3;

class Base
{
    protected $config;
    public $dbc;

    public function __construct(array $config) {
        $this->config = $config;
        $this->conexao();
    }

    public function desconectar(){
        $this->dbc = NULL;
    }

    private function conexao() {
        if ($this->dbc == NULL) {
            // Create the connection
            $dsn = "" .
                $this->config['driver'] .
                ":host=" . $this->config['host'] .
                ";dbname=" . $this->config['dbname'];
            try {
                $db = new \PDO( $dsn, $this->config[ 'username' ], $this->config[ 'password' ] );
            } catch( \PDOException $e ) {
                echo __LINE__.$e->getMessage();
            }
            $this->dbc = $db;
        }
    }

    public function preparar( $sql ) {
        try {
            $count = $this->dbc->exec($sql) or print_r($this->dbc->errorInfo());
        } catch(\PDOException $e) {
            echo __LINE__.$e->getMessage();
        }
        return $count;
    }

    public function buscarTodos( $sql ) {
        $stmt = $this->dbc->query( $sql );
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt;
    }

    /*

    public function cadastrarCategoria($nome) {
        $sql = 'INSERT INTO categoria (nome) values (:nome)';
        $sth = $this->dbc->prepare($sql);
        $sth->bindParam(':nome', $nome, \PDO::PARAM_STR );
        try {
            $sth->execute();
            $resultado = $this->dbc->lastInsertId();
        } catch (PDOException $exception){
            die($exception->getMessage());
        }
        return $resultado;
    }

    public function listarTodasCategorias() {
        $sql = 'select * from categoria order by id';
        $stmt = $this->dbc->prepare($sql);
        $stmt->execute();
        $array = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $array;
    }

    public function atualizarCategoria(string $nome, int $id) {
        $sql = 'update categoria set nome = :nome where id=:id';
        $sth = $this->dbc->prepare($sql);
        $sth->bindParam(':nome', $nome, \PDO::PARAM_STR);
        $sth->bindParam(':id', $id, \PDO::PARAM_INT);
        try {
            $resultado = $sth->execute();
            //$resultado = $this->dbc->rowCount();
        } catch (PDOException $exception){
            die($exception->getMessage());
        }
        return $resultado;
    }

    public function deletarCategoria(int $id) {
        $sql = 'delete from categoria where id=:id';
        $sth = $this->dbc->prepare($sql);
        $sth->bindParam(':id', $id, \PDO::PARAM_INT);
        try {
            $resultado = $sth->execute();
            //$resultado = $this->dbc->rowCount();
        } catch (PDOException $exception){
            die($exception->getMessage());
        }
        return $resultado;
    }


*/



}