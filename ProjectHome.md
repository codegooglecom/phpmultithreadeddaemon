# Multithreaded Daemon #

MultiThreaded Daemon (_MTD_) is a kind of framework written in PHP5 that provide simple procedures to run background tasks in a multithreaded environnement.

Juste to be clear, I talk about multithreading in PHP but concurrent process should be more appropriate terms, because of the fork function used.

More precisely the framework is an abstract class that contains two abstract functions :

  * abstract public function _**getNext($slot)**_;
  * abstract public function _**run($next, $slot)**_;

and lots of others functions which deal with the inter-process synchronization.

## _getNext($slot)_ ##

This function will return the next element to process, or null if there is currently no job and the daemon should wait.

## _run($next, $slot)_ ##

This second function is run in a separated thread (after forking) and take as argument the element to process (given by _getNext_).

Both function get an additionnal parameter slot which indicates _where_ the thread will be executed

# Stable release #

2007-09-20 : [multithreaded daemon v.0.1](http://phpmultithreadeddaemon.googlecode.com/svn/tags/0.1/)