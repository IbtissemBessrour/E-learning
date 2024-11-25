<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idFormation = null;

    #[ORM\Column(length: 255)]
    private ?string $nomFormation = null;

    #[ORM\Column(length: 255)]
    private ?string $discription = null;

    #[ORM\Column]
    private ?int $nombrePlace = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $session = [];

    /**
     * @var Collection<int, SessionFormation>
     */
    #[ORM\OneToMany(targetEntity: SessionFormation::class, mappedBy: 'Formation', orphanRemoval: true)]
    private Collection $sessionFormations;

    /**
     * @var Collection<int, Etudiant>
     */
    #[ORM\ManyToMany(targetEntity: Etudiant::class, mappedBy: 'Formation')]
    private Collection $etudiants;

    #[ORM\ManyToOne(inversedBy: 'Formation')]
    private ?Formateur $formateur = null;

    public function __construct()
    {
        $this->sessionFormations = new ArrayCollection();
        $this->etudiants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdFormation(): ?int
    {
        return $this->idFormation;
    }

    public function setIdFormation(int $idFormation): static
    {
        $this->idFormation = $idFormation;

        return $this;
    }

    public function getNomFormation(): ?string
    {
        return $this->nomFormation;
    }

    public function setNomFormation(string $nomFormation): static
    {
        $this->nomFormation = $nomFormation;

        return $this;
    }

    public function getDiscription(): ?string
    {
        return $this->discription;
    }

    public function setDiscription(string $discription): static
    {
        $this->discription = $discription;

        return $this;
    }

    public function getNombrePlace(): ?int
    {
        return $this->nombrePlace;
    }

    public function setNombrePlace(int $nombrePlace): static
    {
        $this->nombrePlace = $nombrePlace;

        return $this;
    }

    public function getSession(): array
    {
        return $this->session;
    }

    public function setSession(array $session): static
    {
        $this->session = $session;

        return $this;
    }

    /**
     * @return Collection<int, SessionFormation>
     */
    public function getSessionFormations(): Collection
    {
        return $this->sessionFormations;
    }

    public function addSessionFormation(SessionFormation $sessionFormation): static
    {
        if (!$this->sessionFormations->contains($sessionFormation)) {
            $this->sessionFormations->add($sessionFormation);
            $sessionFormation->setFormation($this);
        }

        return $this;
    }

    public function removeSessionFormation(SessionFormation $sessionFormation): static
    {
        if ($this->sessionFormations->removeElement($sessionFormation)) {
            // set the owning side to null (unless already changed)
            if ($sessionFormation->getFormation() === $this) {
                $sessionFormation->setFormation(null);
            }
        }

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
            $etudiant->addFormation($this);
        }

        return $this;
    }

    public function removeEtudiant(Etudiant $etudiant): static
    {
        if ($this->etudiants->removeElement($etudiant)) {
            $etudiant->removeFormation($this);
        }

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
