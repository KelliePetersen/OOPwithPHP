# Design Patterns
A design pattern provides a general reusable solution for common problems in software design. The patterns typically show relationships and interactions between classes or objects. 
The idea is to speed up the development process by providing well tested, proven development/design paradigm. Design pattern represents an idea, not a particular implementation. 
By using design patterns you can make your code more flexible, reusable and maintainable.

## Types of Design Patterns
**Creational** - Class instantiation or object creation. Class-creation patterns use inheritance in the instantiation process, object-creation patterns use delegation. 
Creational patterns are the Singleton, Factory Method, Abstract Factory, Prototype, Builder, and Object Pool.  

**Structural** - Organizing different classes and objects to form larger structures and provide new functionality.
Structural patterns are Adapter, Bridge, Composite, Decorator, Facade, Flyweight, Private Class Data, and Proxy.  

**Behavioral** - Identifying common communication patterns between objects and realize these patterns. 
Behavioral patterns are Chain of responsibility, Command, Interpreter, Iterator, Mediator, Memento, Null Object, Observer, State, Strategy, Template method, and Visitor.  

## Summary
•	 **Strategy** - Uses composition to delegate strategy to a strategy class, who is in charge of logic  
•	 **Singleton** - A special class that generates one, and only one, object instance  
•	 **Factory Method** - Building an inheritance hierarchy of creator classes  
•	 **Abstract Factory** - Grouping the creation of functionally related products  
•	 **Prototype** - Using clone to generate objects, uses composition  
•	 **Service Locator** - Asking your system for objects  
•	 **Dependency Injection** - Letting your system give you objects  
•	 **Composite** - Composing structures in which groups of objects can be used as if they were individual objects  
•	 **Decorator** - A flexible mechanism for combining objects at runtime to extend functionality  
•	 **Facade** - Creating a simple interface to complex or variable systems  
•	 **Interpreter** - Building a mini-language interpreter that can be used to create scriptable applications
•	 **Observer** - Creating hooks for alerting disparate objects about system events
•	 **Visitor** - Applying an operation to all the nodes in a tree of objects
•	 **Command** - Creating command objects that can be saved and passed around
•	 **Null Object** - Using non-operational objects in place of null values

## Strategy Pattern

### Intent
Capture the abstraction in an interface, bury implementation details in derived classes.  

### Description
The Strategy pattern uses composition - which is calling instances' of other
classes instead of relying on inheritance. For example, Class A may accept parameters and delegate to class B via a
method in Class A, and Class B decides the behavior.  

The Strategy Pattern enables selecting an algorithm at runtime. Instead of implementing a single algorithm directly, 
code receives run-time instructions as to which in a family of algorithms to use.  

Clients can then couple themselves to an interface, and not be impacted by changes to the derived classes, or by
additional derived classes being added.  

![Strategy](/images/Strategy.png)

This minimizes coupling. The client is coupled only to an abstraction, which is known as "abstract coupling" - 
"Program to an interface, not an implementation".

### Example
1. A TransportationToAirport class where the travel strategy is delegated to Strategy. The
strategy class handles all the possible options and varying factors.

![Strategy_Example](/images/Strategy_Example.png)

2. A class that performs validation on data selects a validation 
algorithm depending on the type of data, the source, and other factors. These 
factors are not known until run-time and may require radically different validation to be performed. The validation 
algorithms (strategies), encapsulated separately from the validating object, may be used by other validating objects 
in different areas of the system (or even different systems) without code duplication.  

3. Refer to the [Composition folder](composition) for a code example.  

### Implementation
1. Identify an algorithm (i.e. a behavior) that the client would prefer to access through a "flex point".
2. Specify the signature for that algorithm in an interface.
3. Bury the alternative implementation details in derived classes.
4. Clients of the algorithm couple themselves to the interface.


## Singleton Pattern

### Intent
* Ensure a class has only one instance, and provide a global point of access to it.
* Encapsulated "just-in-time initialization" or "initialization on first use".

### Description
Singletons should be globally accessible and have only ONE instance. Only one instance of the class is created 
in the complete execution of a program or project. It is used where only a single instance of a class is required to 
control the action throughout the execution. A singleton class should never have multiple instances. 
Singleton classes are used for logging, driver objects, caching and thread pool, database connections.

### Disadvantages
Because Singletons can be accessed from anywhere in a system, they can create dependencies that are hard to debug. 
Change a Singleton, and classes that use it may be affected. Dependencies are not a problem in themselves. 
But when a Singleton is used, the dependency is hidden away inside a method and not declared in its signature. 
This can make it harder to trace the relationships within a system. Singleton classes should be deployed sparingly.

### Example
The office of the President of the United States is a Singleton. The United States Constitution specifies the means by which a president is elected, 
limits the term of office, and defines the order of succession. As a result, there can be at most one active president at any given time. Regardless 
of the personal identity of the active president, the title, "The President of the United States" is a global point of access that identifies the person in the office.

![Singleton_Example](/images/Singleton_Example.png)

Refer to the [Singleton folder](singleton) for a code example.  

### Implementation
Singleton should be considered only if all three of the following criteria are satisfied:
* Ownership of the single instance cannot be reasonably assigned
* Lazy initialization is desirable
* Global access is not otherwise provided for

Make the class of the single instance object responsible for creation, initialization, access, and enforcement. Declare the instance as a private static data member. 
Provide a public static member function that encapsulates all initialization code, and provides access to the instance. 
The client calls the accessor function (using the class name and scope resolution operator) whenever a reference to the single instance is required.
1. Define a private static attribute in the "single instance" class.
2. Define a public static accessor function in the class.
3. Do "lazy initialization" (creation on first use) in the accessor function.
4. Define all constructors to be protected or private.
5. Clients may only use the accessor function to manipulate the Singleton.


## Factory Method Pattern

### Intent
* Define an interface for creating an object, but let subclasses decide which class to instantiate. Factory Method lets a class defer instantiation to subclasses.
* Defining a "virtual" constructor.
* The new operator considered harmful.

### Description
A framework needs to standardize the architectural model for a range of applications, but allow for individual applications to define their own domain objects and provide for their instantiation.
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

### Example
The Factory Method defines an interface for creating objects, but lets subclasses decide which classes to instantiate. Injection molding presses demonstrate this pattern. Manufacturers of plastic toys process plastic molding powder, and inject the plastic into molds of the desired shapes. The class of toy (car, action figure, etc.) is determined by the mold.

![Factory_Example](/images/Factory_Example.png)

Refer to the [factory folder](factory) for a code example.  

### Implementation
1. If you have an inheritance hierarchy that exercises polymorphism, consider adding a polymorphic creation capability by defining a static factory method in the base class.
2. Design the arguments to the factory method. What qualities or characteristics are necessary and sufficient to identify the correct derived class to instantiate?
3. Consider designing an internal "object pool" that will allow objects to be reused instead of created from scratch.
4. Consider making all constructors private or protected.


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


## Prototype Pattern

### Intent
* Specify the kinds of objects to create using a prototypical instance, and create new objects by copying this prototype.
* Co-opt one instance of a class for use as a breeder of all future instances.
* The new operator considered harmful.

### Description
The emergence of parallel inheritance hierarchies can be a problem with the Factory Method pattern.
This is a kind of coupling that makes some programmers uncomfortable. Every time you add a product
family, you are forced to create an associated concrete creator (the BloggsCal encoders are matched by
BloggsCommsManager, for example). In a system that grows fast enough to encompass many products,
maintaining this kind of relationship can quickly become tiresome.  

One way of avoiding this dependency is to use PHP’s clone keyword to duplicate existing concrete
products. The concrete product classes themselves then become the basis of their own generation. This is
the Prototype pattern. It enables you to replace inheritance with *composition*. This in turn promotes runtime
flexibility and reduces the number of classes you must create.


## Service Locator Pattern
The service locator pattern encapsulates the processes involved in obtaining a service with a strong abstraction layer. 
This pattern uses a central registry (service locator) which on request returns the information necessary to perform a certain task.
The ServiceLocator is responsible for returning instances of services when they are requested for by the service consumers or the service clients. 

![Service Locator](/images/Service_Locator.jpg)


## Dependency Injection Pattern
Much of our code (so far) calls out to factories. This model is known as the Service Locator pattern. 
A method delegates responsibility to a provider which it trusts to find and serve up an instance
of the desired type.  
The Prototype example inverts this; it simply expects the instantiating code to
provide implementations at call time. This is simply a matter of requiring types in a
constructor’s signature, instead of creating them directly within the method. A variation on this is to provide
setter methods, so that clients can pass in objects before invoking a method that uses them.  

Dependency Injection offers purity, but it requires another kind of embedding. You must buy in to the
magic of the assembler. If you are already working within a framework which offers this functionality, there is
no reason not to avail yourself of it. On the other hand, if you are rolling your own, or using components from various
frameworks, you may wish to keep things simple and use the Service Locator pattern at the cost of some elegance.


## Composite Pattern

### Intent
Compose objects into tree structures to represent whole-part hierarchies. Composite lets clients treat individual objects and compositions of objects uniformly.

### Problem
Application needs to manipulate a hierarchical collection of "primitive" and "composite" objects. Processing of a primitive object is handled one way, and processing of a composite object is handled differently. Having to query the "type" of each object before attempting to process it is not desirable.

### Description
The Composite pattern is a simple way of aggregating and then managing groups of similar objects so
that an individual object is indistinguishable to a client from a collection of objects. 
Single entities can be treated in the same way as collections of things.

The Composite pattern defines a single inheritance hierarchy that lays down two distinct sets of
responsibilities.Classes in the pattern must support a common set of operations as their primary responsibility. 
Classes must also support methods for adding and removing child objects.

![Composite](/images/Composite.png)

The Composite pattern is useful when you need to treat a collection of things in the same way as you
would an individual. Composites are arranged in trees, so an operation on the whole can affect the parts, and data from
the parts is transparently available via the whole. The Composite pattern makes such operations and queries
transparent to the client. Trees are easy to traverse. It is easy to add new
component types to Composite structures.

### Advantages
**Flexibility**: Because everything in the Composite pattern shares a common
supertype, it is very easy to add new composite or leaf objects to the design without
changing a program’s wider context.  

**Simplicity**: A client using a Composite structure has a straightforward interface.
There is no need for a client to distinguish between an object that is composed
of others and a leaf object (except when adding new components).

**Implicit reach**: Objects in the Composite pattern are organized in a tree. Each
composite holds references to its children. An operation on a particular part of the
tree, therefore, can have a wide effect. We might remove a single Army object from its
Army parent and add it to another. This simple act is wrought on one object, but it has
the effect of changing the status of the Army object’s referenced Unit objects and of
their own children.

**Explicit reach**: Tree structures are easy to traverse. They can be iterated in order
to gain information or to perform transformations. 

### Example
Given broadly irreducible ingredients such as cereals and meat, we can make a food
product — a sausage, for example. We then act on the result as a single entity. Just as we eat, cook, buy, or sell
meat, we can eat, cook, buy, or sell the sausage that the meat in part composes. We might take the sausage
and combine it with the other composite ingredients to make a pie, thereby rolling a composite into a larger
composite. We behave in the same way to the collection as we do to the parts. 

![Composite_Example](/images/Composite_Example.png)

As you can see, all the units in this model extend the Unit class. A client can be sure, then, that any Unit
object will support the bombardStrength() method. So, an Army can be treated in exactly the same way as an
Archer. The Army and TroopCarrier classes are composites: they are designed to hold Unit objects. The Archer
and LaserCannon classes are leaves, designed to support unit operations, but not to hold other Unit objects.
The CompositeUnit gives the composites the ability to add/remove units. 

Refer to the [composite folder](composite) for a code example.  

## Decorator Pattern

### Intent
* Attach additional responsibilities to an object dynamically. Decorators provide a flexible alternative to subclassing for extending functionality.

### Problem
You want to add behavior or state to individual objects at run-time. Inheritance is not feasible because it is static and applies to an entire class.

### Description
While the Composite pattern helps us to create a flexible representation of aggregated components, the
Decorator pattern uses a similar structure to help us to modify the functionality of concrete components.
Once again, the key to this pattern lies in the importance of composition at runtime. Inheritance is a neat
way of building on characteristics laid down by a parent class. This neatness can lead you to hard-code
variation into your inheritance hierarchies, often causing inflexibility.

Rather than use only inheritance to solve the problem of varying functionality, the Decorator pattern uses
composition and delegation. In essence, Decorator classes hold an instance of another class of their own
type. A Decorator will implement an operation so that it calls the same operation on the object to which it
has a reference before (or after) performing its own actions. In this way, it is possible to build a pipeline of
Decorator objects at runtime.

Like the Composite pattern, Decorator can be confusing. It is important to remember that both composition
and inheritance are coming into play at the same time. Because a decorator object forms a wrapper around a child object, it helps to keep the interface as
sparse as possible. If you build a heavily featured base class, then decorators are forced to delegate to
all public methods in their contained object. This can be done in the abstract decorator class, but it still
introduces the kind of coupling that can lead to bugs.

### Example
![Decorator_Example](/images/Decorator_Example.png)

This model is very extensible. You can add new decorators and components very easily. With lots of
decorators, you can build very flexible structures at runtime. The component class, Plains in this case,
can be significantly modified in many ways without the need to build the totality of the modifications into
the class hierarchy. In plain English, this means you can have a polluted Plains object that has diamonds,
without having to create a PollutedDiamondPlains object.

Refer to the [decorator folder](decorator) for a code example.  

## Facade Pattern

### Intent
* Provide a unified interface to a set of interfaces in a subsystem. Facade defines a higher-level interface that makes the subsystem easier to use.

### Description
As you work with subsystems (like web forums or gallery applications), you may find yourself making
calls deep into the logic of the code. If the subsystem code is subject to change over time, and your code
interacts with it at many different points, you may find yourself with a serious maintenance problem as the
subsystem evolves.

Similarly, when you build your own systems, it is a good idea to organize distinct parts into separate
tiers. Typically, you may have a tier responsible for application logic, another for database interaction,
another for presentation, and so on. You should aspire to keep these tiers as independent of one another as
you can, so that a change in one area of your project will have minimal repercussions elsewhere. If code from
one tier is tightly integrated into code from another, then this objective is hard to meet.

A Facade is really a very simple concept. It is just a matter of creating a single point of entry for a tier or
subsystem. This has a number of benefits. It helps to decouple distinct areas in a project from one another.
It is useful and convenient for client coders to have access to simple methods that achieve clear ends. It
reduces errors by focusing the use of a subsystem in one place; changes to the subsystem should cause
failure in a predictable location. Errors are also minimized by Facade classes in complex subsystems where
client code might otherwise use internal functions incorrectly.

### Example
Facade takes a "riddle wrapped in an enigma shrouded in mystery", and interjects a wrapper that tames the amorphous and inscrutable mass of software.
![Facade](/images/Facade.png)
![Facade_Example](/images/Facade_Example.png)