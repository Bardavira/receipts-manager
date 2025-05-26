<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\IncomeRepository;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ApiResource]
#[ORM\Entity(repositoryClass: IncomeRepository::class)]
class Income
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Payments>
     */
    #[ORM\OneToMany(targetEntity: Payment::class, mappedBy: 'income', orphanRemoval: true)]
    private Collection $payments;

    /**
     * @var Collection<int, Appointment>
     */
    #[ORM\OneToMany(targetEntity: Appointment::class, mappedBy: 'income', orphanRemoval: true)]
    private Collection $appointment;

    public function __construct()
    {
        $this->payments = new ArrayCollection();
        $this->appointment = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Payments>
     */
    public function getPayments(): Collection
    {
        return $this->payments;
    }

    public function addPayment(Payment $payment): static
    {
        if (!$this->payments->contains($payment)) {
            $this->payments->add($payment);
            $payment->setIncome($this);
        }

        return $this;
    }

    public function removePayment(Payment $payment): static
    {
        if ($this->payments->removeElement($payment)) {
            // set the owning side to null (unless already changed)
            if ($payment->getIncome() === $this) {
                $payment->setIncome(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Appointment>
     */
    public function getAppointment(): Collection
    {
        return $this->appointment;
    }

    public function addAppointment(Appointment $appointment): static
    {
        if (!$this->appointment->contains($appointment)) {
            $this->appointment->add($appointment);
            $appointment->setIncome($this);
        }

        return $this;
    }

    public function removeAppointment(Appointment $appointment): static
    {
        if ($this->appointment->removeElement($appointment)) {
            // set the owning side to null (unless already changed)
            if ($appointment->getIncome() === $this) {
                $appointment->setIncome(null);
            }
        }

        return $this;
    }
}
