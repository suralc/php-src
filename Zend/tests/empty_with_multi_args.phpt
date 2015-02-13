--TEST--
empty() with multiple arguments
--FILE--
<?php

function foo() { return "str"; }

var_dump(empty($var1, $var2, $var3, $var4)); // true
var_dump(empty("exp", 12)); // false
$fish = true;
var_dump(empty($fish)); // false
var_dump(empty($fish, $var2)); // true
$tiger = 12;
var_dump(empty($tiger, $fish)); // false
var_dump(empty($tiger, foo())); // false
var_dump(empty(foo(), $emptyVar5)); // true
--EXPECT--
bool(true)
bool(false)
bool(false)
bool(true)
bool(false)
bool(false)
bool(true)
