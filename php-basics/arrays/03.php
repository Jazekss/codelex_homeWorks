<?php
echo "Exercise 3: \n";
$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];
echo "Enter the value to search for: ";
$search = readline('');
if(in_array($search, $numbers)){
	echo "Match found\n";
}else{
	echo "Can't find match\n";
}
