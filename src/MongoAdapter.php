<?php

namespace MongoSwitch;

class MongoAdapter
{
    /**
     *
     * @var type 
     */
    protected $_driver;
    /**
     *
     * @var string
     */
    protected $_type;
    /**
     * 
     */
    public function __construct() {

    }
    
    public function setType($type){
        $this->_type = $type;
    }
    
    public function getType(){
        return $this->_type;
    }
    public function initializeDriver(){
        $type = $this->_type;
        $driverStr = "\\MongoSwitch\\Connectors\\$type";
        $driver = new $driverStr;
        $this->_driver = $driver;
        return $this;
    }
    /**
     * 
     * @param type $driver
     */
    public function setDriver($driver){
        $this->_driver = $driver;
    }
    
    public function getDriver(){
        return $this->_driver;
    }
    public function insert(){}
    public function update(){}
    public function delete(){}
}