<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\PaymentRepository;

#[ApiResource]
#[ORM\Entity(repositoryClass: PaymentRepository::class)]
class Payment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'payment')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Income $income = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIncome(): ?Income
    {
        return $this->income;
    }

    public function setIncome(?Income $income): static
    {
        $this->income = $income;

        return $this;
    }
}
