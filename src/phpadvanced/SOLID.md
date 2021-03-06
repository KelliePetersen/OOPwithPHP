# SOLID
The Open/Closed Principle is one of five design principles for object-oriented software development described by Robert C. Martin. They are best known as the SOLID principles:

* Single Responsibility Principle
* Open/Closed Principle
* Liskov Substitution Principle
* Interface Segregation Principle
* Dependency Inversion

## SUMMARY
**Single Responsibility** - Each class has a single responsibility.  
**Open/Closed** - Software entities allow their behaviour to be extended without modifying their source code.  
**Liskov Substitution** - Objects of a superclass shall be replaceable with objects of its subclasses.  
**Interface Segregation** - Code should not be forced to depend on methods that it doesn't use.  

## Single Responsibility Principle
*A class should have one, and only one, reason to change.*  
Each class should have a single responsibility, so that software is easier to implement and side-effects are less likely.
You need to change your class as soon as one of its responsibilities changes. That is obviously more often than you would need to change it if it had only one responsibility.

An example can be found in the [Open/Closed Example](SOLID/openclosed.php)  

## Open/Closed Principle
*Software entities (classes, modules, functions, etc.) should be open for extension, but closed for modification.*  
This means that an entity can allow its behaviour to be extended without modifying its source code.  

The modern approach is polymorphic open/closed principle - use interfaces instead of superclasses to allow
different implementations which you can easily substitute without changing the code that uses them. The interfaces 
are closed for modifications, and you can provide new implementations to extend the functionality of your software.  

The main benefit of this approach is that an interface introduces an additional level of abstraction which enables 
loose coupling. The implementations of an interface are independent of each other and don’t need to share any code.  

An example can be found in the [SOLID folder](SOLID/openclosed.php)  

## Liskov Substitution Principle
It extends the Open/Closed Principle by focusing on the behavior of a superclass and its subtypes. 
Objects of a superclass shall be replaceable with objects of its subclasses without causing negative side effects.
That requires the objects of your subclasses to behave in the same way as the objects of your superclass.  

This can be achieved with a few rules:
* An overridden method of a subclass needs to accept the same input parameter values as the method of the superclass.
  * You can implement less restrictive validation rules, but not stricter rules, as this could result in an exception.
* The return value of an overridden method needs to comply with the same rules as the return value of the method of the superclass. 
  * You can implement less restrictive validation rules, but only implement stricter rules by returning a specific subclass of the defined return value, or by returning a subset of the valid return values of the superclass.
* Implement your own checks via code reviews and test cases. 

An example can be found in the [SOLID folder](SOLID/liskovsubstitution.php)  

## Interface Segregation Principle
*Clients should not be forced to depend upon interfaces that they do not use.*  
Code should not be forced to depend on methods that it doesn't use. 
The goal is to reduce the side effects and frequency of required changes by splitting the software into multiple, independent parts.  

Some examples of code that violate this principle are:
* Children that inherit methods from parents that they don't need
* Classes that implement interfaces they don't use

Some ways to avoid violating this principle are:
* If a class needs to access *some* methods/attributes of another class, do it via other methods such as composition, delegation, interfaces or traits. 

## Dependency Inversion Principle
High-level modules, which provide complex logic, should be easily reusable and unaffected by changes in low-level modules, which provide utility features. 
To achieve that, you need to introduce an abstraction that decouples the high-level and low-level modules from each other.  

Robert C. Martin’s definition of the Dependency Inversion Principle consists of two parts:
* High-level modules should not depend on low-level modules. **Both** should depend on abstractions.
* Abstractions should not depend on details. Details should depend on abstractions.

