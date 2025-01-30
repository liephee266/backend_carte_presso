<?php

namespace App\Entity\Second;

use App\Repository\Second\DrivingLicenseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: DrivingLicenseRepository::class)]
class DrivingLicense
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['driving_license:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['driving_license:read'])]
    private ?string $first_name = null;

    #[ORM\Column(length: 255)]
    #[Groups(['driving_license:read'])]
    private ?string $last_name = null;

    #[ORM\Column(type: 'date')]
    private $birth_date;

    #[ORM\Column(length: 255)]
    #[Groups(['driving_license:read'])]
    private ?string $birth_place = null;

    #[ORM\Column(length: 255)]
    #[Groups(['driving_license:read'])]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    #[Groups(['driving_license:read'])]
    private ?string $phone = null;

    #[ORM\Column(length: 255)]
    #[Groups(['driving_license:read'])]
    private ?string $issuance_place = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['driving_license:read'])]
    private ?string $photo_url = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(['driving_license:read'])]
    private ?\DateTimeInterface $issue_date = null;

    #[ORM\Column(length: 255)]
    #[Groups(['driving_license:read'])]
    private ?string $cashier_short_code = null;

    #[ORM\Column(length: 255)]
    #[Groups(['driving_license:read'])]
    private ?string $status = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(['driving_license:read'])]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(['driving_license:read'])]
    private ?\DateTimeInterface $updated_at = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['driving_license:read'])]
    private ?string $codification_code = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $A1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $A = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $B = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $C = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $D = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $E = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $F = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $G = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description_A1 = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $valable_du_A1 = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $jusqu_au_A1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description_A = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $valable_du_A = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $jusqu_au_A = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description_B = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $valable_du_B = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $jusqu_au_B = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description_C = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $valable_du_C = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $jusqu_au_C = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description_D = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $valable_du_D = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $jusqu_au_D = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description_E = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $valable_du_E = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $jusqu_au_E = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description_F = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $valable_du_F = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $jusqu_au_F = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description_G = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $valable_du_G = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $jusqu_au_G = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ville_G = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ville_F = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ville_E = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ville_D = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ville_C = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ville_B = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ville_A = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ville_A1 = null;

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): static
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): static
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birth_date;
    }

    public function setBirthDate(\DateTimeInterface $birth_date): self
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    public function getBirthPlace(): ?string
    {
        return $this->birth_place;
    }

    public function setBirthPlace(string $birth_place): static
    {
        $this->birth_place = $birth_place;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getIssuancePlace(): ?string
    {
        return $this->issuance_place;
    }

    public function setIssuancePlace(string $issuance_place): static
    {
        $this->issuance_place = $issuance_place;

        return $this;
    }

    public function getPhotoUrl(): ?string
    {
        return $this->photo_url;
    }

    public function setPhotoUrl(?string $photo_url): static
    {
        $this->photo_url = $photo_url;

        return $this;
    }

    public function getIssueDate(): ?\DateTimeInterface
    {
        return $this->issue_date;
    }

    public function setIssueDate(?\DateTimeInterface $issue_date): static
    {
        $this->issue_date = $issue_date;

        return $this;
    }

    public function getCashierShortCode(): ?string
    {
        return $this->cashier_short_code;
    }

    public function setCashierShortCode(string $cashier_short_code): static
    {
        $this->cashier_short_code = $cashier_short_code;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    // Getters and Setters for A1
    public function getA1(): ?string
    {
        return $this->A1;
    }

    public function setA1(string $A1): static
    {
        $this->A1 = $A1;

        return $this;
    }

    // Getters and Setters for A
    public function getA(): ?string
    {
        return $this->A;
    }

    public function setA(string $A): static
    {
        $this->A = $A;

        return $this;
    }

    // Getters and Setters for B
    public function getB(): ?string
    {
        return $this->B;
    }

    public function setB(string $B): static
    {
        $this->B = $B;

        return $this;
    }

    // Getters and Setters for C
    public function getC(): ?string
    {
        return $this->C;
    }

    public function setC(string $C): static
    {
        $this->C = $C;

        return $this;
    }

    // Getters and Setters for D
    public function getD(): ?string
    {
        return $this->D;
    }

    public function setD(string $D): static
    {
        $this->D = $D;

        return $this;
    }

    // Getters and Setters for E
    public function getE(): ?string
    {
        return $this->E;
    }

    public function setE(string $E): static
    {
        $this->E = $E;

        return $this;
    }

    // Getters and Setters for F
    public function getF(): ?string
    {
        return $this->F;
    }

    public function setF(string $F): static
    {
        $this->F = $F;

        return $this;
    }

    // Getters and Setters for G
    public function getG(): ?string
    {
        return $this->G;
    }

    public function setG(string $G): static
    {
        $this->G = $G;

        return $this;
    }

    // Getters and Setters for description_A1
    public function getDescriptionA1(): ?string
    {
        return $this->description_A1;
    }

    public function setDescriptionA1(string $description_A1): static
    {
        $this->description_A1 = $description_A1;

        return $this;
    }

    // Getters and Setters for valable_du_A1
    public function getValableDuA1(): ?\DateTimeInterface
    {
        return $this->valable_du_A1;
    }

    public function setValableDuA1(\DateTimeInterface $valable_du_A1): static
    {
        $this->valable_du_A1 = $valable_du_A1;

        return $this;
    }

    // Getters and Setters for jusqu_au_A1
    public function getJusquAuA1(): ?\DateTimeInterface
    {
        return $this->jusqu_au_A1;
    }

    public function setJusquAuA1(\DateTimeInterface $jusqu_au_A1): static
    {
        $this->jusqu_au_A1 = $jusqu_au_A1;

        return $this;
    }

    // Getters and Setters for ville_A1
    public function getVilleA1(): ?string
    {
        return $this->ville_A1;
    }

    public function setVilleA1(string $ville_A1): static
    {
        $this->ville_A1 = $ville_A1;

        return $this;
    }

    // Getters and Setters for description_A
    public function getDescriptionA(): ?string
    {
        return $this->description_A;
    }

    public function setDescriptionA(string $description_A): static
    {
        $this->description_A = $description_A;

        return $this;
    }

    // Getters and Setters for valable_du_A
    public function getValableDuA(): ?\DateTimeInterface
    {
        return $this->valable_du_A;
    }

    public function setValableDuA(\DateTimeInterface $valable_du_A): static
    {
        $this->valable_du_A = $valable_du_A;

        return $this;
    }

    // Getters and Setters for jusqu_au_A
    public function getJusquAuA(): ?\DateTimeInterface
    {
        return $this->jusqu_au_A;
    }

    public function setJusquAuA(\DateTimeInterface $jusqu_au_A): static
    {
        $this->jusqu_au_A = $jusqu_au_A;

        return $this;
    }

    // Getters and Setters for ville_A
    public function getVilleA(): ?string
    {
        return $this->ville_A;
    }

    public function setVilleA(string $ville_A): static
    {
        $this->ville_A = $ville_A;

        return $this;
    }

    // Getters and Setters for description_B
    public function getDescriptionB(): ?string
    {
        return $this->description_B;
    }

    public function setDescriptionB(string $description_B): static
    {
        $this->description_B = $description_B;

        return $this;
    }

    // Getters and Setters for valable_du_B
    public function getValableDuB(): ?\DateTimeInterface
    {
        return $this->valable_du_B;
    }

    public function setValableDuB(\DateTimeInterface $valable_du_B): static
    {
        $this->valable_du_B = $valable_du_B;

        return $this;
    }

    // Getters and Setters for jusqu_au_B
    public function getJusquAuB(): ?\DateTimeInterface
    {
        return $this->jusqu_au_B;
    }

    public function setJusquAuB(\DateTimeInterface $jusqu_au_B): static
    {
        $this->jusqu_au_B = $jusqu_au_B;

        return $this;
    }

    // Getters and Setters for ville_B
    public function getVilleB(): ?string
    {
        return $this->ville_B;
    }

    public function setVilleB(string $ville_B): static
    {
        $this->ville_B = $ville_B;

        return $this;
    }

    // Getters and Setters for description_C
    public function getDescriptionC(): ?string
    {
        return $this->description_C;
    }

    public function setDescriptionC(string $description_C): static
    {
        $this->description_C = $description_C;

        return $this;
    }

    // Getters and Setters for valable_du_C
    public function getValableDuC(): ?\DateTimeInterface
    {
        return $this->valable_du_C;
    }

    public function setValableDuC(\DateTimeInterface $valable_du_C): static
    {
        $this->valable_du_C = $valable_du_C;

        return $this;
    }

    // Getters and Setters for jusqu_au_C
    public function getJusquAuC(): ?\DateTimeInterface
    {
        return $this->jusqu_au_C;
    }

    public function setJusquAuC(\DateTimeInterface $jusqu_au_C): static
    {
        $this->jusqu_au_C = $jusqu_au_C;

        return $this;
    }

    // Getters and Setters for ville_C
    public function getVilleC(): ?string
    {
        return $this->ville_C;
    }

    public function setVilleC(string $ville_C): static
    {
        $this->ville_C = $ville_C;

        return $this;
    }

    // Getters and Setters for description_D
    public function getDescriptionD(): ?string
    {
        return $this->description_D;
    }

    public function setDescriptionD(string $description_D): static
    {
        $this->description_D = $description_D;

        return $this;
    }

    // Getters and Setters for valable_du_D
    public function getValableDuD(): ?\DateTimeInterface
    {
        return $this->valable_du_D;
    }

    public function setValableDuD(\DateTimeInterface $valable_du_D): static
    {
        $this->valable_du_D = $valable_du_D;

        return $this;
    }

    // Getters and Setters for jusqu_au_D
    public function getJusquAuD(): ?\DateTimeInterface
    {
        return $this->jusqu_au_D;
    }

    public function setJusquAuD(\DateTimeInterface $jusqu_au_D): static
    {
        $this->jusqu_au_D = $jusqu_au_D;

        return $this;
    }

    // Getters and Setters for ville_D
    public function getVilleD(): ?string
    {
        return $this->ville_D;
    }

    public function setVilleD(string $ville_D): static
    {
        $this->ville_D = $ville_D;

        return $this;
    }

    // Getters and Setters for description_E
    public function getDescriptionE(): ?string
    {
        return $this->description_E;
    }

    public function setDescriptionE(string $description_E): static
    {
        $this->description_E = $description_E;

        return $this;
    }

    // Getters and Setters for valable_du_E
    public function getValableDuE(): ?\DateTimeInterface
    {
        return $this->valable_du_E;
    }

    public function setValableDuE(\DateTimeInterface $valable_du_E): static
    {
        $this->valable_du_E = $valable_du_E;

        return $this;
    }

    // Getters and Setters for jusqu_au_E
    public function getJusquAuE(): ?\DateTimeInterface
    {
        return $this->jusqu_au_E;
    }

    public function setJusquAuE(\DateTimeInterface $jusqu_au_E): static
    {
        $this->jusqu_au_E = $jusqu_au_E;

        return $this;
    }

    // Getters and Setters for ville_E
    public function getVilleE(): ?string
    {
        return $this->ville_E;
    }

    public function setVilleE(string $ville_E): static
    {
        $this->ville_E = $ville_E;

        return $this;
    }

    // Getters and Setters for description_F
    public function getDescriptionF(): ?string
    {
        return $this->description_F;
    }

    public function setDescriptionF(string $description_F): static
    {
        $this->description_F = $description_F;

        return $this;
    }

    // Getters and Setters for valable_du_F
    public function getValableDuF(): ?\DateTimeInterface
    {
        return $this->valable_du_F;
    }

    public function setValableDuF(\DateTimeInterface $valable_du_F): static
    {
        $this->valable_du_F = $valable_du_F;

        return $this;
    }

    // Getters and Setters for jusqu_au_F
    public function getJusquAuF(): ?\DateTimeInterface
    {
        return $this->jusqu_au_F;
    }

    public function setJusquAuF(\DateTimeInterface $jusqu_au_F): static
    {
        $this->jusqu_au_F = $jusqu_au_F;

        return $this;
    }

    // Getters and Setters for ville_F
    public function getVilleF(): ?string
    {
        return $this->ville_F;
    }

    public function setVilleF(string $ville_F): static
    {
        $this->ville_F = $ville_F;

        return $this;
    }

    // Getters and Setters for description_G
    public function getDescriptionG(): ?string
    {
        return $this->description_G;
    }

    public function setDescriptionG(string $description_G): static
    {
        $this->description_G = $description_G;

        return $this;
    }

    // Getters and Setters for valable_du_G
    public function getValableDuG(): ?\DateTimeInterface
    {
        return $this->valable_du_G;
    }

    public function setValableDuG(\DateTimeInterface $valable_du_G): static
    {
        $this->valable_du_G = $valable_du_G;

        return $this;
    }

    // Getters and Setters for jusqu_au_G
    public function getJusquAuG(): ?\DateTimeInterface
    {
        return $this->jusqu_au_G;
    }

    public function setJusquAuG(\DateTimeInterface $jusqu_au_G): static
    {
        $this->jusqu_au_G = $jusqu_au_G;

        return $this;
    }

    // Getters and Setters for ville_G
    public function getVilleG(): ?string
    {
        return $this->ville_G;
    }

    public function setVilleG(string $ville_G): static
    {
        $this->ville_G = $ville_G;

        return $this;
    }
}
