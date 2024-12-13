<?php 

namespace App\Entity;

use App\Validator\Constraints as AppAssert;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Reservation
{
    #[ORM\Column]
    #[Assert\NotBlank]
    #[Assert\DateTime]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    #[AppAssert\UniqueTimeSlot]
    private ?string $timeSlot = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $eventName = null;

    // Getter and Setter for each property
}
