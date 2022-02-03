<?php
class Movie
{
	public string $title;
	public string $studio;
	public string $rating;
	public function __construct( string $title, string $studio, string $rating){
		$this->title = $title;
		$this->studio = $studio;
		$this->rating = $rating;
	}
}
class Movies
{
	private array $movies = [];
	public function addMovie(Movie $movie){
		$this->movies[] = $movie;
	}
	public function getMovie(): mixed{
		$movie = '';
		foreach ($this->movies as $movie){
			$movie = "Title: {$this->title} |Studio:{$this->studio} [PG:{$this->rating}]";
		}
		return $movie;
	}
	public function getPG(string $find): array{
		$result = [];
		foreach ($this->movies as $movie) {
			if ($movie->rating == $find) {
				$result[] = $movie;
			}
		}
	return $result;
	}
}
$movies = new Movies();
$casino = new Movie("Casino Royale", "Eon Productions", "PG13");
$movies->addMovie($casino);
$glass = new Movie("Glass", "Buena Vista International", "PG13");
$movies->addMovie($glass);
$spider = new Movie("Spider-Man: Into the Spider-Verse", "Columbia Pictures", "PG");
$movies->addMovie($spider);
$godfather = new Movie("The Godfather", "Paramount", "R");
$movies->addMovie($godfather);
$darkKnight = new Movie("The Dark Knight", "Pinewood Studios", "PG13");
$movies->addMovie($darkKnight);
$intouchables = new Movie("The Intouchables", "Gaumont TF1 Films", "R");
$movies->addMovie($intouchables);
echo "\nAvailable searches: PG13, PG, R\n";
$find = readline('Find: ');
echo "Search results for [{$find}]: \n";
$i = 1;
foreach ($movies->getPG($find) as $movie) {
	echo "  [$i] Title: {$movie->title}, Studio:{$movie->studio}]\n";
	$i++;
}
//“Casino Royale”, “Eon Productions” - “PG13”;
//“Glass”, “Buena Vista International” - “PG13”;
//“Spider-Man: Into the Spider-Verse”, “Columbia Pictures” - “PG”.
