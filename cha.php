<?php

$pattern= "# \w?[aeiou]{2}\w? #";

$string = "There's a lion loose in the Maister park";

$matches= array();

$lol =  preg_match_all($pattern, $string, $matches);

print_r($matches);