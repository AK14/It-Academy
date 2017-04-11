<?php
namespace Classes;
use App\config\db_connect;
use PDO;
use PDOException;


class DataBase
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = db_connect::getInstance();
    }


//  получение количества строк в таблице
    public function rowsCount($tableName)
    {
        $query =  'SELECT COUNT(*) FROM '.$tableName;
        $result = $this->pdo->query($query);
        $row = $result->fetch(PDO::FETCH_NUM);
        return $row[0];
    }

//  получение данных для условия WHERE
    public function where(array $where, $operator = 'AND')
    {
        foreach($where as $key => $value)
        {
            $conditions[] = '('. $key . '=' .$this->pdo->quote($value) .')';
        }
        return implode(' '.$operator . ' ', $conditions);
    }

//  добавление данных в БД
        public  function insert($tableName, array $params)
        {
            // получаем все ключи из $params, объединяем их через запятую
            $fields = implode(',',array_keys($params));
            // получаем все значения
            $values = array_values($params);

            $parameters = implode(',', array_fill(0,count($params),'?'));

            $query = 'INSERT INTO ' .$tableName. '(' .$fields. ')VALUES(' .$parameters. ')';
            $stmt = $this->pdo->prepare($query);
                for($i = 0;$i< count($values);$i++)
                {
                    $stmt->bindParam($i+1, $values[$i]);
                }
                $result = $stmt->execute();
                if($result){
                    return $this->pdo->lastInsertId();
                }else{
                    return false;
                }
        }

//  обновить данные в БД
    public function update($tableName,array $params, $whereString){
        // получаем поля таблицы, добавляем в конец знаки ?, создаем строку для запроса
        $items = [];
        foreach (array_keys($params) as $val)
        {
            $val .= ' = ? ';
            array_push($items,$val);
        }
        $fields = implode(',',$items);

        // получаем значения
        $data = array_values($params);

        // формируем запрос
        $query =  'UPDATE ' . $tableName . ' SET ' .$fields . 'where id_' . $tableName . "="  . $whereString;
        $stmt = $this->pdo->prepare($query);

        for($i =0;$i < count($data) ;$i++)
        {
            $stmt->bindParam($i+1,$data[$i]);
        }
        $stmt->execute();
    }

//  удаление данных из таблицы
    public  function delete($tableName,$whereString)
    {
        $query = 'DELETE FROM '.$tableName;
        if($whereString)
        {
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
        return $result->fetchAll(db_connect::FETCH_ASSOC);
    }

    //получение подготовленных для параметров для PDO prepare
    public function prepareParameters($parameters)
    {
        if(is_integer($parameters))
        {
            return PDO::PARAM_INT;
        }
        elseif (is_string($parameters))
        {
            return PDO::PARAM_STR;
        }
        else
        {
            return PDO::PARAM_BOOL;
        }

    }

}


