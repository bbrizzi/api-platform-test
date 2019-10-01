<?php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\Movie;
use GuzzleHttp;

final class MovieItemDataProvider implements ItemDataProviderInterface, RestrictedDataProviderInterface
{

	private $apiKey;

	function __construct($apiKey)
	{
		$this->apiKey = $apiKey;
		$this->request_url_root = 'https://api.themoviedb.org/3/movie/';
		$this->client = new GuzzleHttp\Client();
	}

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Movie::class === $resourceClass;
    }

    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = []): ?Movie
    {
        $request_url = $this->request_url_root . $id . '?api_key=' . $this->apiKey;
        $response = $this->client->request('GET', $request_url);

        if($response->getStatusCode() !== 200){
            return null;
        }

        $api_response_json = $response->getBody();
        $api_response_object = json_decode($api_response_json);

        $movie = new Movie();
        $movie->setId( $id );
        $movie->setTitle( $api_response_object->title );
        $movie->setImdbId( $api_response_object->imdb_id );
        $movie->setPosterPath( $api_response_object->poster_path );
        $movie->setVoteAverage( $api_response_object->vote_average );
        $movie->setVoteCount( (int) $api_response_object->vote_count );
        $movie->setReleaseYear( (int) substr($api_response_object->release_date,0,4) );

        return $movie;
    }
}