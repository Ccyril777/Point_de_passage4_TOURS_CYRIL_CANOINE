<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JobRepository")
 */
class Job
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $artist_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $show_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArtistId(): ?int
    {
        return $this->artist_id;
    }

    public function setArtistId(int $artist_id): self
    {
        $this->artist_id = $artist_id;

        return $this;
    }

    public function getShowId(): ?int
    {
        return $this->show_id;
    }

    public function setShowId(int $show_id): self
    {
        $this->show_id = $show_id;

        return $this;
    }
}
