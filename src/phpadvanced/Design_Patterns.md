## Important Notes
•	 A factory is a class or method with responsibility for generating objects.

## Summary
•	 The Singleton pattern: A special class that generates one—and only one—object instance  
•	 The Factory Method pattern: Building an inheritance hierarchy of creator classes  
•	 The Abstract Factory pattern: Grouping the creation of functionally related products  
•	 The Prototype pattern: Using clone to generate objects  
•	 The Service Locator pattern: Asking your system for objects  
•	 The Dependency Injection pattern: Letting your system give you objects  

## Strategy Pattern
The Strategy pattern was used in the Composition example. The Strategy Pattern is a behavioral software design pattern 
that enables selecting an algorithm at runtime. Instead of implementing a single algorithm directly, code receives 
run-time instructions as to which in a family of algorithms to use.  

For instance, a class that performs validation on incoming data may use the strategy pattern to select a validation 
algorithm depending on the type of data, the source of the data, user choice, or other discriminating factors. These 
factors are not known until run-time and may require radically different validation to be performed. The validation 
algorithms (strategies), encapsulated separately from the validating object, may be used by other validating objects 
in different areas of the system (or even different systems) without code duplication.  

## Singleton Pattern
Singletons should be globally accessible and have only ONE instance.
Only one instance of the class is created 
in the complete execution of a program or project. It is used where only a single instance of a class is required to 
control the action throughout the execution. A singleton class should never have multiple instances. 
Singleton classes are used for logging, driver objects, caching and thread pool, database connections.

Because Singletons can be accessed from anywhere in a system, they can create dependencies that are hard to debug. 
Change a Singleton, and classes that use it may be affected. Dependencies are not a problem in themselves. 
But when a Singleton is used, the dependency is hidden away inside a method and not declared in its signature. 
This can make it harder to trace the relationships within a system. Singleton classes should be deployed sparingly.

## Factory Method Pattern
