<?php 
namespace Models;

class ClassCrud extends ClassConexao
{
    private $crud;
    private $cont;

    //preparação sql
    private function prepareSql($sql, $param)
    {
        $this->countParam($param);
        $this->crud = $this->conectaDB("127.0.0.1","crud","root","")->prepare($sql);
        // if
        if($this->cont > 0){
            for($i=1; $i <= $this->cont; $i++){
                $this->crud->bindValue($i,$param[$i-1]);
            }
        }
        $this->crud->execute();
    }

    //contador de parametros
    private function countParam($param)
    {
        $this->cont = count($param);
    }

    //insert no banco de dados
    public function insertDB($table,$where,$param)
    {
        $this->prepareSql("INSERT INTO {$table} VALUES ({$where})",$param);
        return $this->crud;
    }

    //select no banco de dados
    public function selectDB($fields,$table,$where,$param)
    {
        $this->prepareSql("SELECT {$fields} FROM {$table} {$where}",$param);
        return $this->crud;
    }

    //delete no banco de dados
    public function deleteDB($table,$where,$param)
    {
        $this->prepareSql("DELETE FROM {$table} {$where}",$param);
        return $this->crud;
    }

    //update no banco de dados
    public function updateDB($table,$set,$where,$param)
    {
        $this->prepareSql("UPDATE {$table} SET {$set} where {$where}",$param);
        return $this->crud;
    }
}

?>