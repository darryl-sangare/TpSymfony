<?php 

/**
 * @ORM\Entity()
 */
class Reservation
{
    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="time")
     */
    private $timeSlot;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="reservations")
     */
    private $user;

    public function isUniqueTimeSlotForDate(): bool
    {
        // Logique métier pour vérifier si la plage horaire est unique pour une date.
    }
}
