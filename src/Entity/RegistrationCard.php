<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;
use App\Repository\RegistrationCardRepository;

#[ORM\Entity(repositoryClass: RegistrationCardRepository::class)]
class RegistrationCard
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["driving_license:read"])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["registration_card:read"])]
    private ?string $owner_first_name = null;


    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["registration_card:read"])]
    private ?string $owner_last_name = null;

    #[ORM\Column(length: 255)]
    #[Groups(["registration_card:read"])]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    #[Groups(["registration_card:read"])]
    private ?string $profession = null;

    #[ORM\Column(length: 255)]
    #[Groups(["registration_card:read"])]
    private ?string $gender = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["registration_card:read"])]
    private ?string $vehicle_model = null;

    #[ORM\Column(length: 255, nullable: true)]  
    #[Groups(["registration_card:read"])]
    private ?string $vehicle_make = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["registration_card:read"])]
    private ?string $energy_source = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["registration_card:read"])]
    private ?int $seating_capacity = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["registration_card:read"])]
    private ?int $administrative_power = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["registration_card:read"])]
    private ?int $empty_weight = null;

    #[ORM\Column(length: 255)]
    #[Groups(["registration_card:read"])]
    private ?string $payload = null;

    #[ORM\Column(length: 255)]
    #[Groups(["registration_card:read"])]
    private ?string $authorized_weight = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(["registration_card:read"])]
    private ?\DateTimeInterface $issue_date = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["registration_card:read"])]
    private ?string $plate_number = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["registration_card:read"])]
    private ?string $vin = null;

    #[ORM\Column(length: 255)]
    #[Groups(["registration_card:read"])]
    private ?string $status = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(["driving_license:read"])]
    private ?\DateTimeInterface $created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(["driving_license:read"])]
    private ?\DateTimeInterface $updated_at = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["registration_card:read"])]
    private ?string $operation_type = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["registration_card:read"])]
    private ?string $previous_registration_number = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Groups(["registration_card:read"])]
    private ?\DateTimeInterface $previous_receipt_date = null;

    #[ORM\Column(length: 255)]
    #[Groups(["registration_card:read"])]
    private ?string $registration_number = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    #[Groups(["registration_card:read"])]
    private ?\DateTimeInterface $first_circulation_date = null;

    #[ORM\Column(nullable: true, type: "text", options: ["default" => "Tout contrat de vente à crédit ou de prêt destiné à l'achat de véhicule automobile, de tracteurs agricoles, des cycles à moteur et remorques tractées ou semi-portées sont assujettis à la déclaration de mise en circulation et à l'article 2074 du code civil. L'enregistrement de cet acte sera fait à un taux fixé conformément à la réglementation en vigueur en matière fiscale."])]
    private ?string $article_1 = "Tout contrat de vente à crédit ou de prêt destiné à l'achat de véhicule automobile, de tracteurs agricoles, des cycles à moteur et remorques tractées ou semi-portées sont assujettis à la déclaration de mise en circulation et à l'article 2074 du code civil. L'enregistrement de cet acte sera fait à un taux fixé conformément à la réglementation en vigueur en matière fiscale.";

    #[ORM\Column(nullable: true, type: "text", options: ["default" => "Les vendeurs cessionnaires de créances, escompteurs et prêteurs de derniers pour l'achat des véhicules ou engins visés à l'article 1er devront pour conserver leur gage en faire mention sur un registre spécial à souche qui sera ouvert à cet effet dans toutes les préfectures. Cette mention rappellera la construction du gage dont le véhicule ou engin est l'objet, le nom de l'acheteur et du créancier et date de l'enregistrement du contact. La déclaration sera faite au créancier gagiste et ce reçu répétera littéralement la mention portée à la souche. Par la délivrance de reçu, le créancier gagiste sera réputé avoir conservé la marchandise en sa possession. Le créancier sera seul responsable de l'insuffisance ou de l'irrégularité de la déclaration."])]
    private ?string $article_2 = "Les vendeurs cessionnaires de créances, escompteurs et prêteurs de derniers pour l'achat des véhicules ou engins visés à l'article 1er devront pour conserver leur gage en faire mention sur un registre spécial à souche qui sera ouvert à cet effet dans toutes les préfectures. Cette mention rappellera la construction du gage dont le véhicule ou engin est l'objet, le nom de l'acheteur et du créancier et date de l'enregistrement du contact. La déclaration sera faite au créancier gagiste et ce reçu répétera littéralement la mention portée à la souche. Par la délivrance de reçu, le créancier gagiste sera réputé avoir conservé la marchandise en sa possession. Le créancier sera seul responsable de l'insuffisance ou de l'irrégularité de la déclaration.";

    #[ORM\Column(nullable: true, type: "text", options: ["default" => "La résiliation du gage se fera quelle que soit la qualité du débiteur, conformément aux dispositions de l'article 93 du code de commerce."])]
    private ?string $article_3 = "La résiliation du gage se fera quelle que soit la qualité du débiteur, conformément aux dispositions de l'article 93 du code de commerce.";

    #[ORM\Column(length: 255, nullable: true, options: ["default" => "REFERENCE – ARRÊTÉ N° 2011-106 DU 11 FÉVRIER 2011"])]
    private ?string $reference = "REFERENCE – ARRÊTÉ N° 2011-106 DU 11 FÉVRIER 2011";

    #[ORM\Column(length: 255, nullable: true, options: ["default" => "Le délai imparti au créancier gagiste pour... est fixé à 3 mois."])]
    private ?string $reference_delai = "Le délai imparti au créancier gagiste pour... est fixé à 3 mois.";

    public function __construct() {
        $this->article_1 = 'Tout contrat de vente à crédit ou de prêt destiné à l\'achat de véhicule automobile, de tracteurs agricoles, des cycles à moteur et remorques tractées ou semi-portées sont assujettis à la déclaration de mise en circulation et à l\'article 2074 du code civil. L\'enregistrement de cet acte sera fait à un taux fixé conformément à la réglementation en vigueur en matière fiscale.';
        $this->article_2 = 'Les vendeurs cessionnaires de créances, escompteurs et prêteurs de derniers pour l\'achat des véhicules ou engins visés à l\'article 1er devront pour conserver leur gage en faire mention sur un registre spécial à souche qui sera ouvert à cet effet dans toutes les préfectures. Cette mention rappellera la construction du gage dont le véhicule ou engin est l\'objet, le nom de l\'acheteur et du créancier et date de l\'enregistrement du contact. La déclaration sera faite au créancier gagiste et ce reçu répétera littéralement la mention portée à la souche. Par la délivrance de reçu, le créancier gagiste sera réputé avoir conservé la marchandise en sa possession. Le créancier sera seul responsable de l\'insuffisance ou de l\'irrégularité de la déclaration.';
        $this->article_3 = 'La résiliation du gage se fera quelle que soit la qualité du débiteur, conformément aux dispositions de l\'article 93 du code de commerce.';
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOwnerFirstName(): ?string
    {
        return $this->owner_first_name;
    }

    public function setOwnerFirstName(string $owner_first_name): static
    {
        $this->owner_first_name = $owner_first_name;

        return $this;
    }

    public function getOwnerLastName(): ?string
    {
        return $this->owner_last_name;
    }

    public function setOwnerLastName(?string $owner_last_name): static
    {
        $this->owner_last_name = $owner_last_name;

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

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): static
    {
        $this->profession = $profession;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getVehicleModel(): ?string
    {
        return $this->vehicle_model;
    }

    public function setVehicleModel(?string $vehicle_model): static
    {
        $this->vehicle_model = $vehicle_model;

        return $this;
    }

    public function getVehicleMake(): ?string
    {
        return $this->vehicle_make;
    }

    public function setVehicleMake(?string $vehicle_make): static
    {
        $this->vehicle_make = $vehicle_make;

        return $this;
    }

    public function getEnergySource(): ?string
    {
        return $this->energy_source;
    }

    public function setEnergySource(?string $energy_source): static
    {
        $this->energy_source = $energy_source;

        return $this;
    }

    public function getSeatingCapacity(): ?int
    {
        return $this->seating_capacity;
    }

    public function setSeatingCapacity(?int $seating_capacity): static
    {
        $this->seating_capacity = $seating_capacity;

        return $this;
    }

    public function getAdministrativePower(): ?int
    {
        return $this->administrative_power;
    }

    public function setAdministrativePower(?int $administrative_power): static
    {
        $this->administrative_power = $administrative_power;

        return $this;
    }

    public function getEmptyWeight(): ?int
    {
        return $this->empty_weight;
    }

    public function setEmptyWeight(?int $empty_weight): static
    {
        $this->empty_weight = $empty_weight;

        return $this;
    }

    public function getPayload(): ?string
    {
        return $this->payload;
    }

    public function setPayload(string $payload): static
    {
        $this->payload = $payload;

        return $this;
    }

    public function getAuthorizedWeight(): ?string
    {
        return $this->authorized_weight;
    }

    public function setAuthorizedWeight(string $authorized_weight): static
    {
        $this->authorized_weight = $authorized_weight;

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

    public function getPlateNumber(): ?string
    {
        return $this->plate_number;
    }

    public function setPlateNumber(?string $plate_number): static
    {
        $this->plate_number = $plate_number;
        return $this;
    }

    public function getVin(): ?string
    {
        return $this->vin;
    }

    public function setVin(?string $vin): static
    {
        $this->vin = $vin;
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

    public function getOperationType(): ?string
    {
        return $this->operation_type;
    }

    public function setOperationType(?string $operation_type): static
    {
        $this->operation_type = $operation_type;
        return $this;
    }

    public function getPreviousRegistrationNumber(): ?string
    {
        return $this->previous_registration_number;
    }

    public function setPreviousRegistrationNumber(?string $previous_registration_number): static
    {
        $this->previous_registration_number = $previous_registration_number;
        return $this;
    }

    public function getPreviousReceiptDate(): ?\DateTimeInterface
    {
        return $this->previous_receipt_date;
    }

    public function setPreviousReceiptDate(?\DateTimeInterface $previous_receipt_date): static
    {
        $this->previous_receipt_date = $previous_receipt_date;

        return $this;
    }

    public function getRegistrationNumber(): ?string
    {
        return $this->registration_number;
    }

    public function setRegistrationNumber(string $registration_number): static
    {
        $this->registration_number = $registration_number;

        return $this;
    }

    public function getFirstCirculationDate(): ?\DateTimeInterface
    {
        return $this->first_circulation_date;
    }

    public function setFirstCirculationDate(?\DateTimeInterface $first_circulation_date): static
    {
        $this->first_circulation_date = $first_circulation_date;
        return $this;
    }

    // Getters and Setters for article_1
    public function getArticle1(): ?string
    {
        return $this->article_1;
    }

    public function setArticle1(?string $article_1): static
    {
        $this->article_1 = $article_1;
        return $this;
    }

    // Getters and Setters for article_2
    public function getArticle2(): ?string
    {
        return $this->article_2;
    }

    public function setArticle2(?string $article_2): static
    {
        $this->article_2 = $article_2;
        return $this;
    }

    // Getters and Setters for article_3
    public function getArticle3(): ?string
    {
        return $this->article_3;
    }

    public function setArticle3(?string $article_3): static
    {
        $this->article_3 = $article_3;
        return $this;
    }

    // Getters and Setters for reference
    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): static
    {
        $this->reference = $reference;
        return $this;
    }

    // Getters and Setters for reference_delai
    public function getReferenceDelai(): ?string
    {
        return $this->reference_delai;
    }

    public function setReferenceDelai(?string $reference_delai): static
    {
        $this->reference = $reference_delai;
        return $this;
    }
}
