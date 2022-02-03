<?php
class Movie
{
	public string $title;
	public string $studio;
	public string $rating;
	public function __constructor(string $title, string $studio, string $rating){
		$this->title = $title;
		$this->studio = $studio;
		$this->rating = $rating;
	}
	public function GetPG(): void {

	}
}
class Movies
{
	public array $movies = [];
	public function addMovie(Movie $movie): void{
		$this->movies[] = $movie;
	}
	public function GetPG(){
		return $this->movies;
	}
}
$a = new Movie('','','');
$movies = new Movies();
$casino = new Movie('Casino Royale', 'Eon Productions', 'PG­13');
$movies->addMovie($casino);
$glass = new Movie('Glass', 'Buena Vista International', 'PG­13');
$movies = new Movies($glass);
$spider = new Movie('Spider-Man: Into the Spider-Verse', 'Columbia Pictures', 'PG');
$movies = new Movies($spider);

var_dump($movies->GetPG());




//Write a method GetPG, which takes an array of base type Movie as its argument,
//	and returns a new array of only those movies in the input array with a rating of "PG".
//	You may assume the input array is full of Movie instances. The returned array may be empty.

//“Casino Royale”, “Eon Productions” - “PG­13”;
//“Glass”, “Buena Vista International” - “PG­13”;
//“Spider-Man: Into the Spider-Verse”, “Columbia Pictures” - “PG”.