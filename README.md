Implementation
-------

The project uses a Doctrine Entity named Movie annotated as an ApiRessource that can be accessed through the built in client.

Only the GET method on a single item is enabled for simplicity.

Since the data does not come from a database but from a 3rd party API a new DataProvider is defined which consumes the TMDB API instead of the default behavior of fetching the information in a database.

The API key is kept secret in the .env.local and .env.test.local files as to not be exposed on GitHub.

A simple test has been written which checks the availability of a single movie.

Installation
-------
~~~~
git clone https://github.com/bbrizzi/api-platform-test-worldia.git
docker-compose pull
docker-compose up -d
~~~~

Add the following information in your .env.local and .env.test.local files :

~~~~
###> service/moviedb-api-client ###
TMDB_API_KEY=ENTER_YOUR_API_KEY_HERE
###< service/moviedb-api-client ###
~~~~
Usage
-------
`curl -k https://localhost:8443/movies/550`

Testing
-------
`docker-compose exec php bin/phpunit`

Possible Evolutions
-------

- Additional endpoints for returning Movie collections through a CollectionDataProviderInterface
- Factorizing the 3rd party API code between the CollectionDataProviderInterface and the ItemDataProviderInterface using a parent class or a Trait
- Handling API errors and empty data gracefully
- Creating mock data for use in unit tests
- Writing additional unit tests
- Remove the Doctrine dependency as it is not used by the project. This may require to redefine the Movie class as a POPO.
