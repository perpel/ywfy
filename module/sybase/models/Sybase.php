<?php

namespace app\models;
use yii\base\Model;

class Sybase extends Model{
    
    public $link;
    public $db;
    public $result;

    public function open($name, $username, $password, $db, $charset){
        $this->link = @sybase_connect($name, $username, $password, $charset) or die("sybase link defail");
        $this->db = @sybase_select_db($db, $this->link) or die("数据库没有选择");  
    }

    public function query($sql){
        $this->result = sybase_query($sql,$this->link);
    }

    public function echoJsonStr(){
        $json = [];
        $i = 0;
        while($row = sybase_fetch_row($this->result)){
            foreach($row as $_v){
                $json[$i][] = iconv("cp936", "utf-8", $_v);
            }
            $i++;
        }
        
        echo json_encode($json);
    }

    public function asArray(){
        $json = [];
        $i = 0;
        while($row = sybase_fetch_row($this->result)){
            foreach($row as $_v){
                $json[$i][] = iconv("cp936", "utf-8", $_v);
            }
            $i++;
        }
        
        echo "<pre>";
        var_dump($json);
        echo "</pre>";
    }

    public function close(){
    
        sybase_free_result($this->result);
        sybase_close($this->link);
    }
}