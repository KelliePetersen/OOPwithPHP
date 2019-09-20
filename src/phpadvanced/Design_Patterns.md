## Summary
•	 Singleton - A special class that generates one, and only one, object instance  
•	 Factory Method - Building an inheritance hierarchy of creator classes  
•	 Abstract Factory - Grouping the creation of functionally related products  
•	 Prototype - Using clone to generate objects  
•	 Service Locator - Asking your system for objects  
•	 Dependency Injection - Letting your system give you objects  

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
The Factory Method pattern addresses the problem of how to create object instances when your code focuses on abstract types.
Its intent is to define an interface for creating an object, but let subclasses decide which class to instantiate.
Factory Method lets a class defer instantiation to subclasses.

The Factory Method pattern splits creator classes from the products they are designed to generate. The
creator is a factory class that defines a method for generating a product object. If no default implementation
is provided, it is left to creator child classes to perform the instantiation. Typically, each creator subclass
instantiates a parallel product child class.

![Factory Method](/images/Factory_Method.png)

Notice that the creator classes mirror the product hierarchy. This is a common consequence of the Factory
Method pattern and disliked by some as a special kind of code duplication. Another issue is the possibility
that the pattern could encourage unnecessary subclassing. If your only reason for subclassing a creator is
to deploy the Factory Method pattern, you may need to think again.

## Abstract Factory Pattern
In large applications, you may need factories that produce related sets of classes. The Abstract Factory
pattern addresses this problem.

Rather than create separate methods for each Factory Method, you can create a single make() method
that uses a flag argument to determine which object to return.
In using a factory method, I define a clear interface and force all concrete factory objects to honor it.
In using a single make() method, I must remember to support all product objects in all the concrete creators.
I also introduce parallel conditionals, as each concrete creator must implement the same flag tests. A client
class cannot be certain that concrete creators generate all the products because the internals of make() are a
matter of choice in each case.
On the other hand, I can build more flexible creators. The base creator class can provide a make()
method that guarantees a default implementation of each product family. Concrete children could then
modify this behavior selectively. It would be up to implementing creator classes to call the default make()
method after providing their own implementation.

![Abstract Factory](/images/Abstract_Factory.png)