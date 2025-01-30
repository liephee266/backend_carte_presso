<?php
namespace App\Controller;


use App\Entity\Second\DrivingLicense;
use App\Entity\Second\RegistrationCard;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Default\CategorieVehicule;
use App\Services\Toolkit;
use App\Services\GenericEntityManager;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[Route('/api/v1/main')]
class AppController extends AbstractController
{

    private $toolkit;
    private $entityManager;
    private $genericEntityManager;


    public function __construct(EntityManagerInterface $entityManager, Toolkit $toolKit, GenericEntityManager $genericEntityManager)
    {
        $this->toolkit = $toolKit;
        $this->entityManager = $entityManager;
        $this->genericEntityManager = $genericEntityManager;
        
        // $this->microServiceDgtt = $microServiceDgtt;
        // $this->drivingLicense = $drivingLicense;
        // $this->registrationCard = $registrationCard;
    }

    /**
     * Recherche des données select pour les entite
     * 
     * @param Request $request
     * @return JsonResponse
     * 
     * @author Orphée Lié <lieloumloum@gmail.com>
     */
    #[Route('/import-drivingLicense', name: 'import_data', methods: ['POST'])]
    public function importData(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {

        // Les catégories possibles
        $tab_classes = [
            "A1" => "Vélomoteur et motocyclettes de cylindres n'excédant pas 125 cm³",
            "A" => "Motocycles avec ou sans side-car",
            "B" => "Véhicules max 10 places n'excédant pas 3500 kgs",
            "C" => "Véhicules à marchandises de plus de 3500 kgs",
            "D" => "Véhicules de transport en commun de plus de 8 places",
            "E" => "Remorques de plus de 750 kg pour les cat B, C, D",
            "F" => "Véhicules de plus de cat B sp totalement aménagés",
            "G" => "Véhicules et engins travaux publics et agricoles",
        ];

        // Récupérer les données envoyées dans la requête
        $data = json_decode($request->getContent(), true);
        // dd($data);
        if (!$data || !isset($data['drivingLicense'])) {
            return $this->json(['message' => 'Données manquantes ou format invalide'], 400);
        }

        // Traitement des données du permis de conduire
        $drivingLicenseData = $data['drivingLicense'];
        $drivingLicense = new DrivingLicense();
        $drivingLicense->setFirstName($drivingLicenseData['first_name']);
        $drivingLicense->setLastName($drivingLicenseData['last_name']);
        $drivingLicense->setBirthDate($drivingLicenseData['birth_date']);
        $drivingLicense->setBirthPlace($drivingLicenseData['birth_place']);
        $drivingLicense->setAddress($drivingLicenseData['address']);
        $drivingLicense->setPhone($drivingLicenseData['phone']);
        $drivingLicense->setPhotoUrl($drivingLicenseData['photo_url']);
        $drivingLicense->setIssueDate($drivingLicenseData['issue_date']);
        $drivingLicense->setCashierShortCode($drivingLicenseData['cashier_short_code']);
        $drivingLicense->setStatus($drivingLicenseData['status']);
        $drivingLicense->setCodificationCode($drivingLicenseData['codification_code']);
        
        // // Récupération de l'operation_type et de son designation
        // $operationType = $entityManager->getRepository(OperationType::class)
        //                             ->find($drivingLicenseData['operation_type_id'] ?? 1);
        // $drivingLicense->setOperationType($operationType ? $operationType->getDesignation() : 'Unknown');

        // Persister l'entité DrivingLicense
        $entityManager->persist($drivingLicense);
        $entityManager->flush(); // Sauvegarde du permis de conduire
        // Gestion des catégories associées

        $this->genericEntityManager->updateFinalDrivingLicenseWithDataCategory($drivingLicense, $data['categories']);
        return $this->json(['message' => 'Données importées avec succès'], 201);
    }

    #[Route('/api/import-registrationCard', name: 'import_registration_card', methods: ['POST'])]
    public function importData1(Request $request)
    {
        
        // Récupérer les données envoyées dans la requête
        $data = json_decode($request->getContent(), true);

        if (!$data || !isset($data['registration_card'])) {
            return $this->json(['message' => 'Données manquantes ou format invalide'], 400);
        }

        // Traitement des données de la carte grise (RegistrationCard)
        $registrationCardData = $data['registration_card'];
        $registrationCard = new RegistrationCard();
        $registrationCard->setOwnerFirstName($registrationCardData['owner_first_name']);
        $registrationCard->setOwnerLastName($registrationCardData['owner_last_name']);
        $registrationCard->setAddress($registrationCardData['address']);
        $registrationCard->setProfession($registrationCardData['profession']);
        $registrationCard->setGender($registrationCardData['gender']);
        $registrationCard->setVehicleModel($registrationCardData['vehicle_model']);
        $registrationCard->setVehicleMake($registrationCardData['vehicle_make']);
        $registrationCard->setEnergySource($registrationCardData['energy_source']);
        $registrationCard->setSeatingCapacity($registrationCardData['seating_capacity']);
        $registrationCard->setAdministrativePower($registrationCardData['administrative_power']);
        $registrationCard->setEmptyWeight($registrationCardData['empty_weight']);
        $registrationCard->setPayload($registrationCardData['payload']);
        $registrationCard->setAuthorizedWeight($registrationCardData['authorized_weight']);
        $registrationCard->setIssueDate($registrationCardData['issue_date']);
        $registrationCard->setEmptyWeight($registrationCardData['empty_weight']);
        $registrationCard->setPlateNumber($registrationCardData['plate_number']);
        $registrationCard->setVin($registrationCardData['vin']);
        $registrationCard->setStatus($registrationCardData['status']);

        // Persister l'entité RegistrationCard
        $this->entityManager->persist($registrationCard);
        $this->entityManager->flush(); // Sauvegarde de la carte grise
    }      
}

