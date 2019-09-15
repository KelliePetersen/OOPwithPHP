## SUMMARY
Cohesion = classes with a single purpose  
Coupling = objects don't effect other objects  
Orthogonality = changing a does not change b  
Polymorphism = overriding methods from parents, or multiples of the same method with different parameters  
Encapsulation = hiding data and functionality from a client  
Abstraction = hide the internal implementation details  
Encapsulation vs Abstraction = Abstraction is about design (e.g. what the object does, not how it does it), 
while Encapsulation is about hiding internal details for the purpose of code.  

## Cohesion
Cohesion is the extent to which proximate procedures are related to one another.  
Basically, a class should be designed with a single purpose. This is called high cohesion.  
For example, if you're managing email, you should have separate classes for validating email and sending it. 

## Coupling
Coupling is the principle of "separation of concerns". This means that one object doesn't directly change or 
modify the state or behavior of another object. Independent objects are called loosely coupled, while objects
that rely on other objects or can modify the states of other objects are said to be tightly coupled. 

## Orthogonality
Orthogonality is the property that means "Changing A does not change B". An example of an orthogonal system 
would be a radio, where changing the station does not change the volume and vice-versa.
A non-orthogonal system would be like a helicopter where changing the speed can change the direction.
In programming languages this means that when you execute an instruction, nothing but that instruction happens.

## Polymorphism
There are two forms of polymorphism. The first is where you implement multiple methods within the same class 
that use the same name but a different set of parameters. That is called method overloading and represents a 
static form of polymorphism.  
Dynamic polymorphism is where a subclass overrides a method of its superclass. 

## Encapsulation
Encapsulation simply means the hiding of data and functionality from a client.
Encapsulation hides details at the implementation level. The code is hidden to protect the data from the
outside world. 

## Abstraction
Abstraction is like encapsulation; both hide complexity, but the difference is *intent*.  
Abstraction is design-focused. For example, when you're talking about what an object will and won't do, you
are focusing on the object's design, not it's code. Abstraction hides code so that you focus on what the object 
does instead of how it does it. 
