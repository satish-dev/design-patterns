# Factory &  Abstract Factory
## Factory Design pattern
It acts exactly as it sounds: this is class that does as the real factory of object instances. In other words , assume that we know that there are factories that produce some kind of a product. We do not care how a factory makes this product, but we know that any factory has one universal way to ask for it.
```
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
```
## Abstract Factory
Abstract Factory patterns work around a super-factory which create other factories. This factory is also called as factory of factories. It comes under the *creational pattern* as this pattern provides one of the best ways to create an object.
In this pattern an interface is responsible for creating a factory of related objects without explicitly specifying their classes. Each generated factory can give the objects as per the Factory pattern.\
```
<?php
require_once('error_reporting.php');
use ErrorReportingModule\ErrorReporting as ErrorReporting;
class Config extends ErrorReporting
{
    public static $factory = 1;
}
interface Product
{
    public function getName();
}
abstract class AbstractFactory
{
    public static function getFactory()
    {
        switch (Config::$factory) {
            case 1:
                return new FirstFactory();
                break;
            case 2:
                return new SecondFactory();
                break;
        }
        throw new Exception('Bad config');
    }
    abstract public function getProduct();
}
class FirstFactory extends AbstractFactory 
{
    public function getProduct()
    {
        return new FirstProduct();
    }
}
class FirstProduct implements Product
{
    public function getName()
    {
        return 'The product from the first factory';
    }
}
class SecondFactory extends AbstractFactory 
{
    public function getProduct()
    {
        return new SecondProduct();
    }
}
class SecondProduct implements Product
{
    public function getName()
    {
        return 'The product from second factory';
    }
}
$firstProduct = AbstractFactory::getFactory()->getProduct();
Config::$factory = 2;
$secondProduct = AbstractFactory::getFactory()->getProduct();
/* First product from the first factory */
print_r($firstProduct->getName());
/* Second product from the second factory */
echo "<br/>";
print_r($secondProduct->getName());
```
<div>	
  <span><a href ="https://github.com/satish-dev/design-patterns/blob/master/documentation/StrategyDecorator.md" >Previous (Strategy & Decorator Patterns)</a></span>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;
	<span><a href ="https://github.com/satish-dev/design-patterns/blob/master/documentation/RegistryFactory.md" >Next (Registry and Factory) 
</div>