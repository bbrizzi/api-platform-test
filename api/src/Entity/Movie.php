<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;

/**
 * @ApiResource(
 *      collectionOperations={},
 *      itemOperations={"get"={"method"="GET"}})
 */
class Movie
{

    /**
     * @ApiProperty(identifier=true)
     */
    private $id;

    private $title;
    private $imdb_id;
    private $poster_path;
    private $vote_average;
    private $vote_count;
    private $release_year;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getImdbId(): ?string
    {
        return $this->imdb_id;
    }

    public function setImdbId($imdb_id): self
    {
        $this->imdb_id = $imdb_id;

        return $this;
    }

    public function getPosterPath(): ?string
    {
        return $this->poster_path;
    }

    public function setPosterPath($poster_path): self
    {
        $this->poster_path = $poster_path;

        return $this;
    }

    public function getVoteAverage(): ?string
    {
        return $this->vote_average;
    }

    public function setVoteAverage($vote_average): self
    {
        $this->vote_average = $vote_average;

        return $this;
    }

    public function getVoteCount(): ?int
    {
        return $this->vote_count;
    }

    public function setVoteCount($vote_count): self
    {
        $this->vote_count = $vote_count;

        return $this;
    }

    public function getReleaseYear(): ?string
    {
        return $this->release_year;
    }

    public function setReleaseYear($release_year): self
    {
        $this->release_year = $release_year;

        return $this;
    }

}
