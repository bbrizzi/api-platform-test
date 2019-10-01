<?php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\Movie;
use GuzzleHttp;

final class MovieItemDataProvider //extends MoviedbApiElementItemDataProvider
	implements ItemDataProviderInterface, RestrictedDataProviderInterface
{

	private $apiKey;

	function __construct($apiKey)
	{
		$this->apiKey = $apiKey;
		$this->request_url = 'https://api.themoviedb.org/3/movie/550?api_key=' . $this->apiKey;
		$this->image_prefix = 'https://image.tmdb.org/t/p/original/';
		$this->client = new GuzzleHttp\Client();
	}

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Movie::class === $resourceClass;
    }

    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = []): ?Movie
    {
    	$res = $this->client->request('GET', $this->request_url);
    	// TODO : composer require symfony/serializer
    	// TODO : https://symfony.com/doc/current/components/serializer.html

    	$movie = new Movie();
    	$movie->setId(1);
    	$movie->setDirector("This body : " . $res->getBody());
    	$movie->setYear('1990');
    	$movie->setTitle('Toto');
        // Retrieve the movie item from somewhere then return it or null if not found
        return $movie;
    }
}