--TEST--
empty() with multiple arguments
--FILE--
<?php

function foo() { return "str"; }
function sideeffect() {	echo 'in_sideeffect', PHP_EOL; return 'non_empty'; }

var_dump(empty($var1, $var2, $var3, $var4)); // true
var_dump(empty("exp", 12)); // false
$fish = true;
var_dump(empty($fish)); // false
var_dump(empty($fish, $var2)); // true
$tiger = 12;
var_dump(empty($tiger, $fish)); // false
var_dump(empty($tiger, foo())); // false
var_dump(empty(foo(), $emptyVar5)); // true
var_dump(empty(sideeffect(), [])); // true + msg
var_dump(empty([], sideeffect(), sideeffect(), $tiger)); // true
--EXPECT--
bool(true)
bool(false)
bool(false)
bool(true)
bool(false)
bool(false)
bool(true)
in_sideeffect
bool(true)
bool(true)
