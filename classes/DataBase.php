<?php
namespace Classes;
use PDO;


class DataBase
{
    protected static $instance;
    protected $pdo;

    protected function __construct(){

    }

// создание подключения к БД по принципу паттерна Singleton
    public function getInstance(){
        if(!self::$instance){
            self::$instance = new DataBase();
            self::$instance->pdo = new PDO(DB_DSN_MYSQL,DB_USER,DB_PASSWORD);
            self::$instance->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }

//  получение количества строк в таблице
    public function rowsCount($tableName){
        $query =  'SELECT COUNT(*) FROM '.$tableName;
        $result = $this->pdo->query($query);
        $row = $result->fetch(PDO::FETCH_NUM);
        return $row[0];
    }

//  получение данных для условия WHERE
    public function where(array $where, $operator = 'AND'){
        foreach($where as $key => $value){
            $conditions[] = '('. $key . '=' .$this->pdo->quote($value) .')';
        }
        return implode(' '.$operator . ' ', $conditions);
    }

//  добавление данных в БД
        public  function insert($tableName, array $params){
        // получаем все ключи из $params, объединяем их через запятую
        $fields = implode(',',array_keys($params));
        // получаем все значения
        $values = array_values($params);
        // в цикле передаем их по ссылке (&) и заключаем их в кавычки
        foreach($values as &$val){
            $val = $this->pdo->quote($val);
        }
        // объединяем значения через " , "
        $values = implode(', ', $values);
        $query = 'INSERT INTO ' .$tableName. '(' .$fields. ')VALUES(' .$values. ')';
        $this->pdo->exec($query);
        return $this->pdo->lastInsertID();
    }

//  обновить данные в БД
    public  function update($tableName,array $params, $whereString){
        foreach($params as $key => $value){
            $setValues[] = $key . '=' .$this->pdo->quote($value);
        }
        $setValues = implode(', ', $setValues);

        $query = 'UPDATE '.$tableName.' SET ' . $setValues;
        if($whereString){
            $query .= 'WHERE '. $whereString;
        }
//        var_dump($query);

        return $this->pdo->exec($query);
    }

//  удаление данных из таблицы
    public  function delete($tableName,$whereString){
        $query = 'DELETE FROM '.$tableName;
        if($whereString){
            $query .= ' WHERE '. $whereString;
        }

        return $this->pdo->exec($query);

    }
//  выборка данных из таблицы
    public  function select($tableName, array $fields,$whereString = '',$orderString = '', $limit = 0){
        $fields = implode(", ", $fields);
        $query = 'SELECT '. $fields .' FROM '. $tableName;
        // исли заданы условия доюавляем их в запрос
        if($whereString){
            $query .= ' WHERE '. $whereString;
        }
        if($orderString){
            $query .= ' ORDER BY'. $orderString;
        }
        if($limit){
            // если limit состоит из двух чисел
            if(is_array($limit)){
                $query .= ' LIMIT ' .$limit[0] .', '. $limit[1];
            }else{
                $query .= ' LIMIT ' .$limit;
            }
        }

        $result = $this->pdo->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

}