<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idEvenement = null;

    #[ORM\Column(length: 255)]
    private ?string $nomEvenement = null;

    #[ORM\Column(length: 255)]
    private ?string $typeEvenement = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateEvenement = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $particepon = [];

    /**
     * @var Collection<int, Etudiant>
     */
    #[ORM\ManyToMany(targetEntity: Etudiant::class, mappedBy: 'Evenement')]
    private Collection $etudiants;

    /**
     * @var Collection<int, Formateur>
     */
    #[ORM\ManyToMany(targetEntity: Formateur::class, mappedBy: 'Evenement')]
    private Collection $formateurs;

    #[ORM\ManyToOne(inversedBy: 'Evenement')]
    private ?Administrareur $administrareur = null;

    public function __construct()
    {
        $this->etudiants = new ArrayCollection();
        $this->formateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEvenement(): ?int
    {
        return $this->idEvenement;
    }

    public function setIdEvenement(int $idEvenement): static
    {
        $this->idEvenement = $idEvenement;

        return $this;
    }

    public function getNomEvenement(): ?string
    {
        return $this->nomEvenement;
    }

    public function setNomEvenement(string $nomEvenement): static
    {
        $this->nomEvenement = $nomEvenement;

        return $this;
    }

    public function getTypeEvenement(): ?string
    {
        return $this->typeEvenement;
    }

    public function setTypeEvenement(string $typeEvenement): static
    {
        $this->typeEvenement = $typeEvenement;

        return $this;
    }

    public function getDateEvenement(): ?\DateTimeInterface
    {
        return $this->dateEvenement;
    }

    public function setDateEvenement(\DateTimeInterface $dateEvenement): static
    {
        $this->dateEvenement = $dateEvenement;

        return $this;
    }

    public function getParticepon(): array
    {
        return $this->particepon;
    }

    public function setParticepon(array $particepon): static
    {
        $this->particepon = $particepon;

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
            $etudiant->addEvenement($this);
        }

        return $this;
    }

    public function removeEtudiant(Etudiant $etudiant): static
    {
        if ($this->etudiants->removeElement($etudiant)) {
            $etudiant->removeEvenement($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Formateur>
     */
    public function getFormateurs(): Collection
    {
        return $this->formateurs;
    }

    public function addFormateur(Formateur $formateur): static
    {
        if (!$this->formateurs->contains($formateur)) {
            $this->formateurs->add($formateur);
            $formateur->addEvenement($this);
        }

        return $this;
    }

    public function removeFormateur(Formateur $formateur): static
    {
        if ($this->formateurs->removeElement($formateur)) {
            $formateur->removeEvenement($this);
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
