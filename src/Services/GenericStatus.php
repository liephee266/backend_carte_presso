<?php
namespace App\Services;

use App\Entity\Default\StatusHistory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


//cette fonction va permettre de retourner le nouveau status d'un ancien status
class GenericStatus 
{

    private $entityManager;
    private $toolkit;

    public function __construct(EntityManagerInterface $entityManager, Toolkit $toolkit)
    {
        $this->entityManager = $entityManager;
        $this->toolkit = $toolkit;
    }

    public function updateStatus($typeRessource, $id, $actualStatus, Request $request)
    {
        // dd($typeRessource);
        $ressource = $this->entityManager->getRepository($typeRessource)->find($id);
        // dd($ressource,$id);
        $oldStatus = $ressource->getStatusId();
        if (is_object($oldStatus)) {
            $oldStatus = $oldStatus->getId();
        }
        // dd($oldStatus);
        switch ($actualStatus) {
            case '1':
                # code...
                // $oldStatus = null;
                break;
            case '2':
                $ressource->setStatusId($this->entityManager->getRepository("App\Entity\Default\Status")->find($id));
            
                break;
            case '3':
                # code...
                if ($oldStatus == 2) {
                    # code...
                    $ressource->setStatusId($this->entityManager->getRepository("App\Entity\Default\Status")->find(5));

                }
                if ($oldStatus == 1) {
                    # code...
                    $ressource->setStatusId($this->entityManager->getRepository("App\Entity\Default\Status")->find(2));
                }
                
                break;
            case '4':
                if ($oldStatus == 2) {
                    # code...
                    $ressource->setStatusId($this->entityManager->getRepository("App\Entity\Default\Status")->find(3));
                }
                if ($oldStatus == 1) {
                    # code...
                    $ressource->setStatusId($this->entityManager->getRepository("App\Entity\Default\Status")->find(2));
                }
                break;
            case '5':
                # code...
                $ressource->setStatusId($this->entityManager->getRepository("App\Entity\Default\Status")->find(6));
                break;
            case '6':
                # code...
                $ressource->setStatusId($this->entityManager->getRepository("App\Entity\Default\Status")->find(7));
                break;
            case '7':
                # code...
                $ressource->setStatusId($this->entityManager->getRepository("App\Entity\Default\Status")->find(8));
                break;
            default:
                # code...
                break;
        }
        $statusHistory = new StatusHistory();
        $statusHistory->setStatusId($this->entityManager->getRepository("App\Entity\Default\Status")->find($actualStatus));
        $statusHistory->setNewStatus($actualStatus);
        // dd($oldStatus);
        $statusHistory->setOldStatus($this->entityManager->getRepository("App\Entity\Default\Status")->find($oldStatus)->getNom());
        $statusHistory->setDocument($ressource->getId());
        // $statusHistory->setDocumentType($this->entityManager->getRepository("App\Entity\Default\TypeDocument")->findOneBy(['entity_name' => (string) $typeRessource])); 
        $statusHistory->setChangedBy($this->toolkit->getUser($request));
        $this->entityManager->persist($statusHistory);
        $this->entityManager->flush();
        return $ressource;
    }

    public function updateStatus2($data, Request $request)
    {
        $data_status = $this->entityManager->getRepository("App\Entity\Default\Status")->findOneBy(['nom' => $data['status']])->getId();
        $data['status_id'] = $data_status;
        $data['created_by'] = $this->toolkit->getUser($request)->getId();
        return $data;
    }

}