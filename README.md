Test Hash Item
=========================

A collection o’ helper functions for testing properties o’ a hash item.

There are 2 main types o’ functions:
* those that just test a boolean true / false for a condition, which all take in the arguments: $list, $key. All test if value exists ( if $list[ $key ] is set ).
* those that return $list[ $key ] if the condition is true & return given fallback if not, which all take in arguments: $list, $key, $fallback. $fallback can be any type o’ value & defaults to null if nothing is given for it.

Boolean functions:
* exists: only tests if value exists.
* isString
* isArray
* isNumeric
* isBool
* isObject
* isClass: this takes in $class, $list, $key as arguments ’stead. $class is the specific name o’ the class testing for, as opposed to isObject, which accepts any object type.

Getter functions: ( these are use the previous tests for determining whether to return $list[ $key ] or $fallback )
* getExists
* getString
* getArray
* getBool
* getObject
* getClass

Finally, there are generic test & testIs methods, which have a callable as the 1st argument.

## Changelog

### 2.0.0
* Refactor to make class with static functions ’stead o’ just functions to make working with namespace easier.

### 1.1.0
* Add TestHashItemIsTrue Function

### 1.0.0
* Initial Stable Version
