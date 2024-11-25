<?php

namespace App\Entity;

use App\Repository\SessionFormationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionFormationRepository::class)]
class SessionFormation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idSession = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDebut = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $inscrits = [];

    #[ORM\ManyToOne(inversedBy: 'sessionFormations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Formation $Formation = null;

    #[ORM\ManyToOne(inversedBy: 'SessionFormation')]
    private ?Formateur $formateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdSession(): ?int
    {
        return $this->idSession;
    }

    public function setIdSession(int $idSession): static
    {
        $this->idSession = $idSession;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): static
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getInscrits(): array
    {
        return $this->inscrits;
    }

    public function setInscrits(array $inscrits): static
    {
        $this->inscrits = $inscrits;

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->Formation;
    }

    public function setFormation(?Formation $Formation): static
    {
        $this->Formation = $Formation;

        return $this;
    }

    public function getFormateur(): ?Formateur
    {
        return $this->formateur;
    }

    public function setFormateur(?Formateur $formateur): static
    {
        $this->formateur = $formateur;

        return $this;
    }
}
