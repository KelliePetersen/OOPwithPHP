## Inheritance
You should avoid giving the parent class any special knowledge about their children.  

## Abstract Classes
Abstract classes serve as a blueprint/contract. A class that inherits from an abstract class
MUST implement its own version of all of its abstract methods. 
`abstract class MyAbstract {};`

## Static
Static methods and properties can be accessed without instantiating an object of the class.
`MyClass::staticMethod();`

## Interfaces
Interfaces are pure templates. It can contain properties and method declarations but not method bodies.
Classes that implement interfaces must also implement all of the interfaces' methods, or it must be declared abstract. 
Interfaces help you manage the fact that PHP does not support multiple inheritance.
`interface MyInterface { public function myFunction(); }`

A class can both extend a superclass and implement multiple interfaces:
`class Consultancy extends TimedService implements Bookable, Chargeable {}`

## Traits
Traits are used to copy and paste specific methods between multiple unrelated classes. You can use multiple traits.
Static methods and abstract methods can be declared in traits.

```
trait MyTrait {
  private $traitAttribute;
  private function $traitMethod($param) : float {}
}
class usesTraits {
  use trait1, trait2, trait3;
}
```

### insteadof
If you have multiple traits with the same method name, you can choose which one to use and/or add alias names to them.
```
class UtilityService extends Service {
  use PriceUtilities, TaxTools {
    TaxTools::calculateTax insteadof PriceUtilities;
    PriceUtilities::calculateTax as basicTax;
  }
}
```

## Late Static Bindings
while $this refers to the calling context, `self` refers to the context of the resolution. This means that if subclasses
inherit a function that uses `self`, it won't apply to the subclass calling it, but the parent it inherited from.
Late Static Bindings let us get around this by using `static` in the place of `self`.

```
abstract class DomainObject {
  public static function create(): DomainObject {
    return new static();
  }
}
print_r(Document::create());
```

## Final
If you don't want a class to be subclassed, or a method to be overridden, use `final`. Use with care.  
`final class MyFinalClass {}`
`final public function myFinalMethod() {};`


## Interceptors (Overloading)
PHP provides built-in interceptor methods that intercept messages sent to undefined methods and properties.  
__get($property)                    Invoked when an undefined property is accessed  
__set($property,                    $value) Invoked when a value is assigned to an undefined property  
__isset($property)                  Invoked when isset() is called on an undefined property  
__unset($property)                  Invoked when unset() is called on an undefined property  
__call($method, $arg_array)         Invoked when an undefined non-static method is called  
__callStatic($method, $arg_array)   Invoked when an undefined static method is called  

When a client attempts to access an undefined property, the __get() method is invoked.  
```
public function __get(string $property) {
  $method = "get{$property}";
  if (method_exists($this, $method)) {
    return $this->$method();
  }
}
```