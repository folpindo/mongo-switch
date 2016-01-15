<?php

require_once "vendor/autoload.php";

/**
 * There are two types here:
 *     1. Legacy  -  This is the adaptee for the legacy mongo extension.
 *     2. MongoDB -  This is the adaptee for the new MongoDB extension.
 */
$m = new \MongoSwitch\MongoAdapter();
$type = 'Legacy';
$m->setType($type);
$m->initializeDriver();

$m = new \MongoSwitch\MongoAdapter();
$type = 'MongoDB';
$m->setType($type);
$m->initializeDriver();
$driver = $m->getDriver();

$params = array(
    'host' => 'alphard',
    'port' => '27017'
);

$driver->setParams($params);
$connStr = $m->getDriver()->getConnectionString();
$client = new \MongoDB\Client($connStr);
$methods = (new \ReflectionClass(get_class($client)))->getMethods();

//foreach ($methods as $method) {
//    echo $method->name . "\n";
//}

$databases = $client->listDatabases();
$dbs = array();
foreach($databases as $db){
//    var_dump($db['info']);exit;
    $dbs[] = $db->getName();
//    var_dump(get_class_methods(get_class($db)));exit;
}
//var_dump($dbs);
//$db = $dbs[array_rand($dbs)]->name;
//echo $db;
$mongodb = $client->selectDatabase("toolchain");
$colls = $mongodb->listCollections();
//foreach($colls as $col){
//    var_dump($col->getName());
//}
//var_dump(get_class_methods(get_class($colls)));exit;
//$mongodb->selectCollection()
//var_dump($colls);
//$row1 = $colls->findOne();

//var_dump($row1);exit;
$collection = $client->selectCollection("toolchain", "projects");
var_dump(get_class_methods(get_class($collection)));
/*
 *  string(9) "aggregate"
  [4]=>
  string(9) "bulkWrite"
  [5]=>
  string(5) "count"
  [6]=>
  string(11) "createIndex"
  [7]=>
  string(13) "createIndexes"
  [8]=>
  string(10) "deleteMany"
  [9]=>
  string(9) "deleteOne"
  [10]=>
  string(8) "distinct"
  [11]=>
  string(4) "drop"
  [12]=>
  string(9) "dropIndex"
  [13]=>
  string(11) "dropIndexes"
  [14]=>
  string(4) "find"
  [15]=>
  string(7) "findOne"
  [16]=>
  string(16) "findOneAndDelete"
  [17]=>
  string(17) "findOneAndReplace"
  [18]=>
  string(16) "findOneAndUpdate"
  [19]=>
  string(17) "getCollectionName"
  [20]=>
  string(15) "getDatabaseName"
  [21]=>
  string(12) "getNamespace"
  [22]=>
  string(10) "insertMany"
  [23]=>
  string(9) "insertOne"
  [24]=>
  string(11) "listIndexes"
  [25]=>
  string(10) "replaceOne"
  [26]=>
  string(10) "updateMany"
  [27]=>
  string(9) "updateOne"
  [28]=>
  string(11) "withOptions"

 */
$indexes = $collection->listIndexes();
var_dump($indexes);
foreach($indexes as $index){
    var_dump($index);exit;
}