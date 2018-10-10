Test Hash Item
=========================

A collection o' helper functions for testing properties o' a hash item.

All functions have 3 arguments: the hash map, the key, & the fallback. Each function carries out a particular test, & if the test is true, it returns the value o' the key in the hash map; if false, it returns the fallback. Thus, this is a simple way to handle default values without clunky if/then statements.

TestHashItemExists: Simply tests if the hash has something for the key.

TestHashItemString: Tests if the hash has something for the key & is a string.

TestHashItemArray: Tests if the hash has something for the key & is an array.

TestHashItemBool: Tests if the hash has something for the key & is a boolean.

TestHashItemNumeric: Tests if the hash has something for the key & is a #.

TestHashItemObject: Tests if the hash has something for the key & is an object.

Finally, TestHashItem has before the other 3 arguments a callable function argument to allow one to create a custom test to be run in addition to testing if the hash map contains the key.
