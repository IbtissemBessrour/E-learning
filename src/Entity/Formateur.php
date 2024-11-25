<?php

namespace App\Entity;

use App\Repository\FormateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormateurRepository::class)]
class Formateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idFormateur = null;

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
    #[ORM\ManyToMany(targetEntity: Evenement::class, inversedBy: 'formateurs')]
    private Collection $Evenement;

    /**
     * @var Collection<int, Formation>
     */
    #[ORM\OneToMany(targetEntity: Formation::class, mappedBy: 'formateur')]
    private Collection $Formation;

    /**
     * @var Collection<int, SessionFormation>
     */
    #[ORM\OneToMany(targetEntity: SessionFormation::class, mappedBy: 'formateur')]
    private Collection $SessionFormation;

    public function __construct()
    {
        $this->Evenement = new ArrayCollection();
        $this->Formation = new ArrayCollection();
        $this->SessionFormation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdFormateur(): ?int
    {
        return $this->idFormateur;
    }

    public function setIdFormateur(int $idFormateur): static
    {
        $this->idFormateur = $idFormateur;

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
            $formation->setFormateur($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): static
    {
        if ($this->Formation->removeElement($formation)) {
            // set the owning side to null (unless already changed)
            if ($formation->getFormateur() === $this) {
                $formation->setFormateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SessionFormation>
     */
    public function getSessionFormation(): Collection
    {
        return $this->SessionFormation;
    }

    public function addSessionFormation(SessionFormation $sessionFormation): static
    {
        if (!$this->SessionFormation->contains($sessionFormation)) {
            $this->SessionFormation->add($sessionFormation);
            $sessionFormation->setFormateur($this);
        }

        return $this;
    }

    public function removeSessionFormation(SessionFormation $sessionFormation): static
    {
        if ($this->SessionFormation->removeElement($sessionFormation)) {
            // set the owning side to null (unless already changed)
            if ($sessionFormation->getFormateur() === $this) {
                $sessionFormation->setFormateur(null);
            }
        }

        return $this;
    }
}
