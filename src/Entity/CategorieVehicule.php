<?php

namespace App\Entity\Default;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Second\DrivingLicense;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\Default\CategorieVehiculeRepository;

#[ORM\Entity(repositoryClass: CategorieVehiculeRepository::class)]
class CategorieVehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[Groups(['categorie_vehicule:read'])]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['categorie_vehicule:read'])]
    private ?string $classe = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['categorie_vehicule:read'])]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    #[Groups(['categorie_vehicule:read'])]
    private ?string $codification_code = null;

    #[ORM\Column(length: 255)]
    #[Groups(['categorie_vehicule:read'])]
    private ?string $ville = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['categorie_vehicule:read'])]
    private ?\DateTimeInterface $valable_du = null;

    #[ORM\Column(type: Types::DATE_MUTABLE,nullable: true)]
    #[Groups(['categorie_vehicule:read'])]
    private ?\DateTimeInterface $jusqu_au = null;

    #[ORM\ManyToOne(inversedBy: 'categorie_vehicule')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DrivingLicense $driving_license_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClasse(): ?string
    {
        return $this->classe;
    }

    public function setClasse(string $classe): static
    {
        $this->classe = $classe;

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

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodificationCode(): ?string
    {
        return $this->codification_code;
    }

    public function setCodificationCode(string $codification_code): static
    {
        $this->codification_code = $codification_code;

        return $this;
    }

    public function getValableDu(): ?\DateTimeInterface
    {
        return $this->valable_du;
    }

    public function setValableDu(\DateTimeInterface $valable_du): static
    {
        $this->valable_du = $valable_du;

        return $this;
    }

    public function getJusquAu(): ?\DateTimeInterface
    {
        return $this->jusqu_au;
    }

    public function setJusquAu(\DateTimeInterface $jusqu_au): static
    {
        $this->jusqu_au = $jusqu_au;

        return $this;
    }

    public function getDrivingLicenseId(): ?DrivingLicense
    {
        return $this->driving_license_id;
    }

    public function setDrivingLicenseId(?DrivingLicense $driving_license_id): static
    {
        $this->driving_license_id = $driving_license_id;

        return $this;
    }
}
