<?php
require_once 'error_reporting.php';
interface Factory
{
    public function getProduct();
}
interface Product
{
    public function getName();
}
class FirstFactory implements Factory
{
    public function getProduct()
    {
        return new FirstProduct();
    }
}
class SecondFactory implements Factory
{
    public function getProduct()
    {
        return new SecondProduct();
    }
}
class FirstProduct implements Product
{
    public function getName()
    {
        return 'This is first product';
    }
}
class SecondProduct implements Product
{
    public function getName()
    {
        return 'This is second product';
    }
}
$factory = new FirstFactory();
$firstProduct = $factory->getProduct();
$factory = new SecondFactory();
$secondProduct = $factory->getProduct();
/* The first product */
echo $firstProduct->getName() . "<br/>";
/* Second product */
echo $secondProduct->getName() . "<br/>";


