## Strategy Pattern
The Strategy pattern was used in the Composition example. The Strategy Pattern is a behavioral software design pattern 
that enables selecting an algorithm at runtime. Instead of implementing a single algorithm directly, code receives 
run-time instructions as to which in a family of algorithms to use.  

For instance, a class that performs validation on incoming data may use the strategy pattern to select a validation 
algorithm depending on the type of data, the source of the data, user choice, or other discriminating factors. These 
factors are not known until run-time and may require radically different validation to be performed. The validation 
algorithms (strategies), encapsulated separately from the validating object, may be used by other validating objects 
in different areas of the system (or even different systems) without code duplication.  