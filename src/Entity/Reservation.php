<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservationRepository")
 */
class Reservation
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
    private $show_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $date_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $spectator_id;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDateId(): ?int
    {
        return $this->date_id;
    }

    public function setDateId(int $date_id): self
    {
        $this->date_id = $date_id;

        return $this;
    }

    public function getSpectatorId(): ?int
    {
        return $this->spectator_id;
    }

    public function setSpectatorId(int $spectator_id): self
    {
        $this->spectator_id = $spectator_id;

        return $this;
    }
}
