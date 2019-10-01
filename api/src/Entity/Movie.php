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
    // Title
    // Link to the poster image
    // Year of release
    // Rating value and count
    // XXXXXXXXXXXX
    // Do manually OR :
    // `php bin/console make:entity`
    // XXXXXXXXXXXXX
    private $title;
    private $poster_image;
    private $rating_value;
    private $rating_count;
    private $release_year;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDirector(): ?string
    {
        return $this->director;
    }

    public function setDirector(?string $director): self
    {
        $this->director = $director;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(?int $year): self
    {
        $this->year = $year;

        return $this;
    }
}
