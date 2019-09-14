<?php 

  /*  
  NAMESPACES are a way of grouping together a set of classes and/or functions. They can be used to collate a set of related pieces into a library. 
  Their grouping helps you avoid name collisions. 

  The code below is in orders.php:
  namespace orders;
  class order {};
  class orderItem {};
  */
  include 'orders.php';
  $myOrder = new orders\order();


  /*
  SUBNAMESPACES are a hierarchy like directories and files.
  namespace bob\html\page;
  class Page {};
  */
  $services = new bob\html\page\Page();
  /*  
  If you're inside one of these folders, you can use a relative path. 
  e.g. if you're in bob, then it's just html\page\Page(); 
  */

  /*
  GLOBAL NAMESPACE - This is any code not declared in a namespace. 
  */
?>