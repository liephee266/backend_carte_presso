<?php
namespace App\Services;

use App\Entity\Default\User;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class GenericEntityManager
{
    private EntityManagerInterface $entityManager;
    private ValidatorInterface $validator;
    private PropertyAccessorInterface $propertyAccessor;
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(
        EntityManagerInterface $entityManager,
        ValidatorInterface $validator,
        PropertyAccessorInterface $propertyAccessor,
        UserPasswordHasherInterface $passwordHasher
    ) {
        $this->entityManager = $entityManager;
        $this->validator = $validator;
        $this->propertyAccessor = $propertyAccessor;
        $this->passwordHasher = $passwordHasher;
    }

    /**
     * Insère une entité basée sur des données dynamiques.
     *
     * @param string $entityClass Nom complet de l'entité (e.g., App\Entity\User)
     * @param array $data Données à mapper sur l'entité
     * @return array Liste des erreurs ou un tableau vide si succès
     */
    // public function persistEntity(string $entityClass, array $data, bool $update = false): array
    // {
    //     // Normalise les clés du JSON en camelCase
    //     // $data = $this->normalizeKeysToCamelCase($data);
    //     // Crée une nouvelle instance de l'entité
    //     $entity = "";
    //     if ($update==false) {
    //         $entity = new $entityClass();
    //     }else {
    //         $entity = $this->entityManager->getRepository($entityClass)->find($data['id']);
    //     }
    //     unset($data['id']);
    //     // Récupère les métadonnées de l'entité
    //     $metadata = $this->entityManager->getClassMetadata($entityClass);
    //     foreach ($data as $field => $value) {
    //         // Vérifie si le champ est mappé dans l'entité
    //         if ($metadata->hasField($field)) {
    //             if ($field == "password" and $entity instanceof User) {
    //                 $hashedPassword = $this->passwordHasher->hashPassword($entity, $data['password']);
    //                 $value = $hashedPassword;
    //             }
    //             $this->propertyAccessor->setValue($entity, $field, $value);
    //         }
    //         // Gestion des associations (relations Doctrine)
    //         if ($metadata->hasAssociation($field)) {
    //             $associationMetadata = $metadata->getAssociationMapping($field);
    //             // dd($associationMetadata);
    //             // Si l'association est une relation "to-one"
    //             if ($associationMetadata['type'] & ClassMetadata::TO_ONE) {
    //                 $relatedEntity = $this->entityManager
    //                     ->getRepository($associationMetadata['targetEntity'])
    //                     ->find($value['id'] ?? $value);
    //                 if ($relatedEntity) {
    //                     $this->propertyAccessor->setValue($entity, $field, $relatedEntity);
    //                 }
    //             }
    //         }
    //     }
    //     // Valide l'entité
    //     $errors = $this->validator->validate($entity);
    //     if (count($errors) > 0) {
    //         $errorMessages = [];
    //         foreach ($errors as $error) {
    //             $errorMessages[] = $error->getPropertyPath() . ': ' . $error->getMessage();
    //         }
    //         return $errorMessages; // Retourne les erreurs
    //     }
    //     // Persiste l'entité
    //     $this->entityManager->persist($entity);
    //     $this->entityManager->flush();
    //     return ["entity" => $entity]; // Aucune erreur
    // }
    
    function normalizeKeysToCamelCase(array $data): array
    {
        $normalized = [];
        foreach ($data as $key => $value) {
            $camelCaseKey = lcfirst(str_replace('_', '', ucwords($key, '_')));
            $normalized[$camelCaseKey] = is_array($value) ? $this->normalizeKeysToCamelCase($value) : $value;
        }
        return $normalized;
    }

    public function updateFinalDrivingLicenseWithDataCategory($final_driving_license, array $data_categories)
    {
        
        foreach ($data_categories as $key => $value) {
            // dd($value);
            switch ($value['classe']) {
                case 'A1':
                    $final_driving_license->setA1($value['classe']);
                    $final_driving_license->setDescriptionA1($value['description']);
                    $final_driving_license->setValableDuA1(new \DateTime($value['valableDu']));
                    $final_driving_license->setJusquAuA1(new \DateTime($value['jusquAu']));
                    $final_driving_license->setVilleA1($value['ville']);
                    break;
                case 'A':
                    $final_driving_license->setA($value['classe']);
                    $final_driving_license->setDescriptionA($value['description']);
                    $final_driving_license->setValableDuA(new \DateTime($value['valableDu']));
                    $final_driving_license->setJusquAuA(new \DateTime($value['jusquAu']));
                    $final_driving_license->setVilleA($value['ville']);
                    break;
                case 'B':
                    $final_driving_license->setB($value['classe']);
                    $final_driving_license->setDescriptionB($value['description']);
                    $final_driving_license->setValableDuB(new \DateTime($value['valableDu']));
                    $final_driving_license->setJusquAuB(new \DateTime($value['jusquAu']));
                    $final_driving_license->setVilleB($value['ville']);
                    break;
                case 'C':
                    $final_driving_license->setC($value['classe']);
                    $final_driving_license->setDescriptionC($value['description']);
                    $final_driving_license->setValableDuC(new \DateTime($value['valableDu']));
                    $final_driving_license->setJusquAuC(new \DateTime($value['jusquAu']));
                    $final_driving_license->setVilleC($value['ville']);
                    break;
                case 'D':
                    $final_driving_license->setD($value['classe']);
                    $final_driving_license->setDescriptionD($value['description']);
                    $final_driving_license->setValableDuD(new \DateTime($value['valableDu']));
                    $final_driving_license->setJusquAuD(new \DateTime($value['jusquAu']));
                    $final_driving_license->setVilleD($value['ville']);
                    break;
                case'E':
                    $final_driving_license->setE($value['classe']);
                    $final_driving_license->setDescriptionE($value['description']);
                    $final_driving_license->setValableDuE(new \DateTime($value['valableDu']));
                    $final_driving_license->setJusquAuE(new \DateTime($value['jusquAu']));
                    $final_driving_license->setVilleE($value['ville']);
                    break;
                case 'F':
                    $final_driving_license->setF($value['classe']);
                    $final_driving_license->setDescriptionF($value['description']);
                    $final_driving_license->setValableDuF(new \DateTime($value['valableDu']));
                    $final_driving_license->setJusquAuF(new \DateTime($value['jusquAu']));
                    $final_driving_license->setVilleF($value['ville']);
                    break;
                case 'G':
                    $final_driving_license->setG($value['classe']);
                    $final_driving_license->setDescriptionG($value['description']);
                    $final_driving_license->setValableDuG(new \DateTime($value['valableDu']));
                    $final_driving_license->setJusquAuG(new \DateTime($value['jusquAu']));
                    $final_driving_license->setVilleG($value['ville']);
                    break;
            }
        }
        // dd($final_driving_license);
        return $final_driving_license;
    }

}
