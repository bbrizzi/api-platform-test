<?php
namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Movie;

class MoviesTest extends ApiTestCase
{
	public function testGetItem()
	{
		$response = static::createClient()->request('GET', '/movies/550');

		$this->assertResponseIsSuccessful();
		$this->assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');
		$this->assertJsonContains([
  			"@context" => "/contexts/Movie",
  			"@id"  => "/movies/550",
  			"@type"  => "Movie",
  			"id"  => 550,
  			"title"  => "Fight Club",
  			"imdbId"  => "tt0137523",
  			"posterPath"  => "/adw6Lq9FiC9zjYEpOqfq03ituwp.jpg",
  			"releaseYear"  => "1999"
        ]);

	}
}