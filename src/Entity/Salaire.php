<?php
namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\SalaireRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SalaireRepository::class)]
class Salaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
   



    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_salaire = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"le champs mois est manquant ")]
    private ?string $mois = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"le champs montant est manquant")]
    #[Assert\Positive(message:"le champs mois doit etre positive ")]
   // #[Assert\Type( type="integer",message:"The value {{ value }} is not a valid {{ type }}")]
    private ?string $montant = null;

    #[ORM\Column]
    private ?int $heures_travail = null;
    #[Assert\NotBlank(message:"le champs heures_travail est manquant")]

    #[ORM\ManyToOne(inversedBy: 'salaires')]
    private ?User $User = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateSalaire(): ?\DateTimeInterface
    {
        return $this->date_salaire;
    }

    public function setDateSalaire(\DateTimeInterface $date_salaire): self
    {
        $this->date_salaire = $date_salaire;

        return $this;
    }

    public function getMois(): ?string
    {
        return $this->mois;
    }

    public function setMois(string $mois): self
    {
        $this->mois = $mois;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getHeuresTravail(): ?int
    {
        return $this->heures_travail;
    }

    public function setHeuresTravail(int $heures_travail): self
    {
        $this->heures_travail = $heures_travail;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }
}
