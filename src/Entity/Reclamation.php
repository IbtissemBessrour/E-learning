<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReclamationRepository::class)]
class Reclamation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idReclametion = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    /**
     * @var Collection<int, Etudiant>
     */
    #[ORM\ManyToMany(targetEntity: Etudiant::class, mappedBy: 'Reclamation')]
    private Collection $etudiants;

    #[ORM\ManyToOne(inversedBy: 'Reclamation')]
    private ?Administrareur $administrareur = null;

    public function __construct()
    {
        $this->etudiants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdReclametion(): ?int
    {
        return $this->idReclametion;
    }

    public function setIdReclametion(int $idReclametion): static
    {
        $this->idReclametion = $idReclametion;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Etudiant>
     */
    public function getEtudiants(): Collection
    {
        return $this->etudiants;
    }

    public function addEtudiant(Etudiant $etudiant): static
    {
        if (!$this->etudiants->contains($etudiant)) {
            $this->etudiants->add($etudiant);
            $etudiant->addReclamation($this);
        }

        return $this;
    }

    public function removeEtudiant(Etudiant $etudiant): static
    {
        if ($this->etudiants->removeElement($etudiant)) {
            $etudiant->removeReclamation($this);
        }

        return $this;
    }

    public function getAdministrareur(): ?Administrareur
    {
        return $this->administrareur;
    }

    public function setAdministrareur(?Administrareur $administrareur): static
    {
        $this->administrareur = $administrareur;

        return $this;
    }
}
