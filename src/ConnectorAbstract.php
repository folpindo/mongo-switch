<?php

namespace MongoSwitch;

abstract class ConnectorAbstract
{
    protected $_connection_string;
    protected $_params;
    
    public function setParams($params){
        $this->_params = $params;
    }
    
    public function getConnectionString(){
        if(!isset($this->_connection_string)){
            $params = $this->_params;
            $host = $params['host'];
            $port = $params['port'];
            $connStr = "mongodb://$host:$port";
            $this->_connection_string = $connStr;
        }
        return $this->_connection_string;
    }
    
    public function setConnectionString($connStr){
        $this->_connection_string = $connStr;
    }

}