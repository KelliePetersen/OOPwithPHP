<?php

namespace phpbox\phpadvanced\composition;
require __DIR__."/../../../vendor/autoload.php";

/*
COMPOSITION EXAMPLE (ch08)

Seminars and Lectures calculate cost differently, and they both offer classes that are priced by duration, 
and classes that have a fixed price. How this is handled is that Seminar and Lecture objects (which are
children of Lesson) are created, and "new <Type>CostStrategy()" is put in as a parameter. The Lesson class
uses this parameter to create a $costStrategy object of the <type>CostStrategy class, and runs that class'
methods instead. 

Lesson::cost() invokes CostStrategy::cost(), and Lesson::chargeType() invokes CostStrategy::chargeType(). 
This explicit invocation of another object’s method in order to fulfill a request is known as delegation. 
The CostStrategy object is the delegate of Lesson. 

I can change the way that any Lesson object calculates cost by passing it a different CostStrategy object
at runtime. This approach then makes for highly flexible code. Rather than building functionality into my
code structures statically, I can combine and recombine objects dynamically.

One effect of this structure is focused responsibilities of classes.
CostStrategy objects are for calculating cost, and Lesson objects manage lesson data.
*/

$lessons[] = new Seminar(4, new TimedCostStrategy());
$lessons[] = new Lecture(4, new FixedCostStrategy());
foreach ($lessons as $lesson) {
  print "lesson charge {$lesson->cost()}. ";
  print "Charge type: {$lesson->chargeType()}\n";
}

/*
DECOUPLING EXAMPLE (ch08)

The Lesson system must incorporate a registration component to add new lessons to the system. 
An administrator should be notified when a lesson is added, but they can't agree on email, text, or
some other compromise. They want to be notified of all sorts of things, so that a change to
the notification mode in one place will mean a similar alteration in many other places.

Refer to RegistrationMgr.php
The knowledge of which Notifier should be used has been focused in the Notifier::getNotifier() method.
I could send notifier messages from a hundred different parts of my
system, and a change in Notifier would only have to be made in that one method.
*/

$lessons1 = new Seminar(4, new TimedCostStrategy());
$lessons2 = new Lecture(4, new FixedCostStrategy());
$mgr = new RegistrationMgr();
$mgr->register($lessons1);
$mgr->register($lessons2);

?>