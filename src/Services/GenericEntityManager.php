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
    public function persistEntity(string $entityClass, array $data, bool $update = false): array
    {
        // Normalise les clés du JSON en camelCase
        // $data = $this->normalizeKeysToCamelCase($data);
        // Crée une nouvelle instance de l'entité
        $entity = "";
        if ($update==false) {
            $entity = new $entityClass();
        }else {
            $entity = $this->entityManager->getRepository($entityClass)->find($data['id']);
        }
        unset($data['id']);
        // Récupère les métadonnées de l'entité
        $metadata = $this->entityManager->getClassMetadata($entityClass);
        foreach ($data as $field => $value) {
            // Vérifie si le champ est mappé dans l'entité
            if ($metadata->hasField($field)) {
                if ($field == "password" and $entity instanceof User) {
                    $hashedPassword = $this->passwordHasher->hashPassword($entity, $data['password']);
                    $value = $hashedPassword;
                }
                $this->propertyAccessor->setValue($entity, $field, $value);
            }
            // Gestion des associations (relations Doctrine)
            if ($metadata->hasAssociation($field)) {
                $associationMetadata = $metadata->getAssociationMapping($field);
                // dd($associationMetadata);
                // Si l'association est une relation "to-one"
                if ($associationMetadata['type'] & ClassMetadata::TO_ONE) {
                    $relatedEntity = $this->entityManager
                        ->getRepository($associationMetadata['targetEntity'])
                        ->find($value['id'] ?? $value);
                    if ($relatedEntity) {
                        $this->propertyAccessor->setValue($entity, $field, $relatedEntity);
                    }
                }
            }
        }
        // Valide l'entité
        $errors = $this->validator->validate($entity);
        if (count($errors) > 0) {
            $errorMessages = [];
            foreach ($errors as $error) {
                $errorMessages[] = $error->getPropertyPath() . ': ' . $error->getMessage();
            }
            return $errorMessages; // Retourne les erreurs
        }
        // Persiste l'entité
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
        return ["entity" => $entity]; // Aucune erreur
    }
    
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
            switch ($value->getClasse()) {
                case 'A1':
                    $final_driving_license->setA1($value->getClasse());
                    $final_driving_license->setDescriptionA1($value->getDescription());
                    $final_driving_license->setValableDuA1($value->getValableDu());
                    $final_driving_license->setJusquAuA1($value->getJusquAu());
                    $final_driving_license->setVilleA1($value->getVille());
                    break;
                case 'A':
                    $final_driving_license->setA($value->getClasse());
                    $final_driving_license->setDescriptionA($value->getDescription());
                    $final_driving_license->setValableDuA($value->getValableDu());
                    $final_driving_license->setJusquAuA($value->getJusquAu());
                    $final_driving_license->setVilleA($value->getVille());
                    break;
                case 'B':
                    $final_driving_license->setB($value->getClasse());
                    $final_driving_license->setDescriptionB($value->getDescription());
                    $final_driving_license->setValableDuB($value->getValableDu());
                    $final_driving_license->setJusquAuB($value->getJusquAu());
                    $final_driving_license->setVilleB($value->getVille());
                    break;
                case 'C':
                    $final_driving_license->setC($value->getClasse());
                    $final_driving_license->setDescriptionC($value->getDescription());
                    $final_driving_license->setValableDuC($value->getValableDu());
                    $final_driving_license->setJusquAuC($value->getJusquAu());
                    $final_driving_license->setVilleC($value->getVille());
                    break;
                case 'D':
                    $final_driving_license->setD($value->getClasse());
                    $final_driving_license->setDescriptionD($value->getDescription());
                    $final_driving_license->setValableDuD($value->getValableDu());
                    $final_driving_license->setJusquAuD($value->getJusquAu());
                    $final_driving_license->setVilleD($value->getVille());
                    break;
                case'E':
                    $final_driving_license->setE($value->getClasse());
                    $final_driving_license->setDescriptionE($value->getDescription());
                    $final_driving_license->setValableDuE($value->getValableDu());
                    $final_driving_license->setJusquAuE($value->getJusquAu());
                    $final_driving_license->setVilleE($value->getVille());
                    break;
                case 'F':
                    $final_driving_license->setF($value->getClasse());
                    $final_driving_license->setDescriptionF($value->getDescription());
                    $final_driving_license->setValableDuF($value->getValableDu());
                    $final_driving_license->setJusquAuF($value->getJusquAu());
                    $final_driving_license->setVilleF($value->getVille());
                    break;
                case 'G':
                    $final_driving_license->setG($value->getClasse());
                    $final_driving_license->setDescriptionG($value->getDescription());
                    $final_driving_license->setValableDuG($value->getValableDu());
                    $final_driving_license->setJusquAuG($value->getJusquAu());
                    $final_driving_license->setVilleG($value->getVille());
                    break;
            }
        }
        return $final_driving_license;
    }

}
