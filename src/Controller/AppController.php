<?php
namespace App\Controller;

use App\Services\Toolkit;
use App\Services\MicroServiceDgtt;
use App\Entity\Second\DrivingLicense;
use App\Entity\Second\RegistrationCard;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Default\CategorieVehicule;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\Default\DrivingLicenseRepository;
use Symfony\Component\Serializer\SerializerInterface;
use App\Repository\Default\RegistrationCardRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[Route('/api/v1/main')]
class AppController extends AbstractController
{

    private $toolkit;
    private $defaultEntityManager;
    private $secondEntityManager;
    private $serializer;
    private $microServiceDgtt;
    private $drivingLicense;
    private $registrationCard;
    private $httpClient;
    private string $firstApiUrl;

    public function __construct(EntityManagerInterface $defaultEntityManager, EntityManagerInterface $secondEntityManager, SerializerInterface $serializer)
    {
        // $this->toolkit = $toolKit;
        $this->defaultEntityManager = $defaultEntityManager;
        $this->secondEntityManager = $secondEntityManager;
        $this->serializer = $serializer;
        $this->httpClient = HttpClient::create();
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
    #[Route('/api/import-drivingLicense', name: 'import_data', methods: ['POST'])]
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

        if (!$data || !isset($data['driving_license'])) {
            return $this->json(['message' => 'Données manquantes ou format invalide'], 400);
        }

        // Traitement des données du permis de conduire
        $drivingLicenseData = $data['driving_license'];
        $drivingLicense = new DrivingLicense();
        $drivingLicense->setFirstName($drivingLicenseData['nom']);
        $drivingLicense->setLastName($drivingLicenseData['prenom']);
        $drivingLicense->setBirthDate(new \DateTime($drivingLicenseData['birth_date']));
        $drivingLicense->setBirthPlace($drivingLicenseData['lieu_naissance']);
        $drivingLicense->setAddress($drivingLicenseData['adresse']);
        $drivingLicense->setPhone($drivingLicenseData['telephone']);
        $drivingLicense->setPhotoUrl($drivingLicenseData['photo_url']);
        $drivingLicense->setIssueDate($drivingLicenseData['date_delivrance']);
        $drivingLicense->setCashierShortCode($drivingLicenseData['short_code']);
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
        if (isset($data['categories']) && is_array($data['categories'])) {
            foreach ($data['categories'] as $categoryData) {
                $category = new CategorieVehicule();
                $category->setClasse($categoryData['classe']);
                $category->setDescription($tab_classes[$categoryData['classe']] ?? 'Description non définie');
                $category->setValableDu(new \DateTime($categoryData['valable_du']));
                
                // Définir la date jusqu'à laquelle la catégorie est valide (10 ans après la date de validité)
                $validUntil = new \DateTime($categoryData['valable_du']);
                $validUntil->modify('+10 years');
                $category->setJusquAu($validUntil);
                
                $entityManager->persist($category);
            }
            $entityManager->flush(); // Sauvegarde des catégories
        }

        return $this->json(['message' => 'Données importées avec succès'], 201);
    }

    #[Route('/api/import-registrationCard', name: 'import_registration_card', methods: ['POST'])]
    public function importData1(Request $request, EntityManagerInterface $entityManager)
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
        $entityManager->persist($registrationCard);
        $entityManager->flush(); // Sauvegarde de la carte grise

    }

      
}

