<?php
/**
 * Created by PhpStorm.
 * User: Alexander
 * Date: 3/4/2017
 * Time: 1:26 PM
 */

namespace Classes;
use PDO;


class DataBase
{
    protected static $pdo;
    public function __construct(){
        if(!self::$pdo){
            self::$pdo = new PDO('mysql:host =' .DB_HOST .';dbname='.DB_DATABASE .';charset=' .DB_CHARSET, DB_USER, DB_PASSWORD);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }

    }

//  добавление данных в БД
    public  function insert($tableName, array $params){
        $fields = implode(',',array_keys($params));
        $values = implode("','",array_values($params));

        $query = 'INSERT INTO ' .$tableName.'(' .$fields. ")VALUES('" .$values. "')";
        $result = self::$pdo->exec($query);
    }

//  обновить данные в БД
    public  function update($tableName,array $params, $id){
        $where = array_key_exists('id_messages',$params);

        $fields = array_keys($params);
        $values = array_values($params);

        $f = array();
        for($i=0;$i<count($values);$i++){
                array_push($f, $fields[$i] ." = '".$values[$i]."' ");
            };

        $query = 'UPDATE '.$tableName.' SET ' . implode(',',$f). 'WHERE id_'.$tableName."='".$id."'" ;
        $result = self::$pdo->exec($query);
        return "Данные были успешно обновлены";
    }

//  удаление данных из таблицы
    public  function delete($tableName,$id){
        $query = 'DELETE FROM '.$tableName. ' WHERE id_'.$tableName."='".$id."'";
        $result = self::$pdo->exec($query);

    }
//  выборка данных из таблицы
    public  function select($query, array $params){
        $val = array_values($params);
        $result =  self::$pdo->query($query);
        foreach($result as $key => $value){
            echo $key ."=".$value;
        }


    }

}