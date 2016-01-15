<?php

namespace MongoSwitch\Connectors;

class MongoDB extends \MongoSwitch\ConnectorAbstract
{
    protected $_manager;
    protected $_collection;
    
    
    public function __construct() {
        
    }

    public function insert(){}
    public function update(){}
    public function delete(){}
    
    public function init(){}
    public function getCollection(){}
    public function getManager(){}
    
}