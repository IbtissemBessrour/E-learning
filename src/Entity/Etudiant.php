<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtudiantRepository::class)]
class Etudiant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idEtudiant = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $motDepass = null;

    /**
     * @var Collection<int, Evenement>
     */
    #[ORM\ManyToMany(targetEntity: Evenement::class, inversedBy: 'etudiants')]
    private Collection $Evenement;

    /**
     * @var Collection<int, Reclamation>
     */
    #[ORM\ManyToMany(targetEntity: Reclamation::class, inversedBy: 'etudiants')]
    private Collection $Reclamation;

    /**
     * @var Collection<int, Formation>
     */
    #[ORM\ManyToMany(targetEntity: Formation::class, inversedBy: 'etudiants')]
    private Collection $Formation;

    public function __construct()
    {
        $this->Evenement = new ArrayCollection();
        $this->Reclamation = new ArrayCollection();
        $this->Formation = new ArrayCollection();
    }

    /**
     * @var Collection<int, Evenement>
     */
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEtudiant(): ?int
    {
        return $this->idEtudiant;
    }

    public function setIdEtudiant(int $idEtudiant): static
    {
        $this->idEtudiant = $idEtudiant;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMotDepass(): ?string
    {
        return $this->motDepass;
    }

    public function setMotDepass(string $motDepass): static
    {
        $this->motDepass = $motDepass;

        return $this;
    }

    /**
     * @return Collection<int, Evenement>
     */
    public function getEvenement(): Collection
    {
        return $this->Evenement;
    }

    public function addEvenement(Evenement $evenement): static
    {
        if (!$this->Evenement->contains($evenement)) {
            $this->Evenement->add($evenement);
        }

        return $this;
    }

    public function removeEvenement(Evenement $evenement): static
    {
        $this->Evenement->removeElement($evenement);

        return $this;
    }

    /**
     * @return Collection<int, Reclamation>
     */
    public function getReclamation(): Collection
    {
        return $this->Reclamation;
    }

    public function addReclamation(Reclamation $reclamation): static
    {
        if (!$this->Reclamation->contains($reclamation)) {
            $this->Reclamation->add($reclamation);
        }

        return $this;
    }

    public function removeReclamation(Reclamation $reclamation): static
    {
        $this->Reclamation->removeElement($reclamation);

        return $this;
    }

    /**
     * @return Collection<int, Formation>
     */
    public function getFormation(): Collection
    {
        return $this->Formation;
    }

    public function addFormation(Formation $formation): static
    {
        if (!$this->Formation->contains($formation)) {
            $this->Formation->add($formation);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): static
    {
        $this->Formation->removeElement($formation);

        return $this;
    }
}
