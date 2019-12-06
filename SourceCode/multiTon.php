<?php
require_once 'error_reporting.php';
abstract class FactoryAbstract 
{
    protected static $instances = array();
    public static function getInstance() 
    {
        $className = static::getClassName();
        if (!(self::$instances[$className] instanceof $className)) {
            self::$instances[$className] = new $className();
        }
        return self::$instances[$className];
    }
    public static function removeInstance()
    {
        $className = static::getClassName();
        if (array_key_exists($className, self::$instances)) {
            unset(self::$instances[$className]);
        }
    }
    final protected static function getClassName()
    {
        return get_called_class();
    }
    protected function __construct() { }
    final protected function __clone() { }
}
// using:
class FirstProduct extends FactoryAbstract {
    public $a = [];
}
class SecondProduct extends FirstProduct {
}
FirstProduct::getInstance()->a[] = 1;
SecondProduct::getInstance()->a[] = 2;
FirstProduct::getInstance()->a[] = 3;
SecondProduct::getInstance()->a[] = 4;
echo "Values for First Product:-<br/><pre>";
print_r(FirstProduct::getInstance()->a);
echo "<br/>Values for Second Product:-<br/>";
// array(1, 3)
print_r(SecondProduct::getInstance()->a);
// array(2, 4)