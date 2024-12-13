<?php

namespace App\Validator;

use App\Entity\Reservation;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Doctrine\ORM\EntityManagerInterface;

class ReservationValidator extends ConstraintValidator
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function validate($value, Constraint $constraint)
    {
        if (!$value instanceof Reservation) {
            return;
        }

        $existingReservation = $this->entityManager->getRepository(Reservation::class)
            ->findOneBy([
                'date' => $value->getDate(),
                'timeSlot' => $value->getTimeSlot()
            ]);

        if ($existingReservation) {
            $this->context->buildViolation($constraint->message)
                ->atPath('timeSlot')
                ->addViolation();
        }
    }
}
