<?php
echo "Exercise 2: \n";
$numbers = [20, 30, 25, 35, -16, 60, -100];

//todo calculate an average value of the numbers
echo array_sum($numbers) / count(array_filter($numbers));
// array_sum($numbers) - saskaita visu masīvu
// count(array_filter($numbers) - saskaita cik masīvā ir elementu
// masīva kopējā summa tiek dalīta uz masīva elementu skaitu