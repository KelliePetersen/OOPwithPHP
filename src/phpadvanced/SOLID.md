# SOLID
The Open/Closed Principle is one of five design principles for object-oriented software development described by Robert C. Martin. They are best known as the SOLID principles:

* Single Responsibility Principle
* Open/Closed Principle
* Liskov Substitution Principle
* Interface Segregation Principle
* Dependency Inversion

## SUMMARY
**Open/Closed** - Software entities allow their behaviour to be extended without modifying their source code  

## Single Responsibility Principle
*A class should have one, and only one, reason to change.*  
Each class should have a single responsibility, so that software is easier to implement and side-effects are less likely.
You need to change your class as soon as one of its responsibilities changes. That is obviously more often than you would need to change it if it had only one responsibility.

An example can be found in the [Open/Closed Example](https://github.com/KelliePetersen/phpsqlbook/blob/master/src/phpadvanced/SOLID/openclosed.php)  

## Open/Closed Principle
*Software entities (classes, modules, functions, etc.) should be open for extension, but closed for modification.*  
This means that an entity can allow its behaviour to be extended without modifying its source code.  

The modern approach is polymorphic open/closed principle - use interfaces instead of superclasses to allow
different implementations which you can easily substitute without changing the code that uses them. The interfaces 
are closed for modifications, and you can provide new implementations to extend the functionality of your software.  

The main benefit of this approach is that an interface introduces an additional level of abstraction which enables 
loose coupling. The implementations of an interface are independent of each other and don’t need to share any code.  

An example can be found in the [SOLID folder](https://github.com/KelliePetersen/phpsqlbook/blob/master/src/phpadvanced/SOLID/openclosed.php)  