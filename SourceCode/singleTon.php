<?php
/**
 * Singleton class
 */
final class Product
{
    /** 
     * @var self 
     */
    private static $instance;
    /**
     * @var mixed
     */
    public $mix;
    /**
     * Return self instance
     * @return self
     */
    public static function getInstance() {
        if (! (self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    private function __construct() {
    }
    private function __clone() {
    }
}
$firstProduct = Product::getInstance();
$secondProduct = Product::getInstance();
// Initializing $mix value for first instance
$firstProduct->mix = 'test';
// Initializing $mix value for the second instance
$secondProduct->mix = 'example';
echo '$mix value for instance $firstProduct:- '.$firstProduct->mix."<br/>";
echo '$mix value for instance $secondProduct:- '.$secondProduct->mix."<br/>";
?>