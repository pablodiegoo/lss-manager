<?php

namespace App\Controller;

use App\Entity\Base;
use App\Entity\BaseResource;
use App\Entity\Resource;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/api/building-day") */
class BuildingDayController extends AbstractController
{
    const DEFAULT_STORAGE_LIMIT = 500000;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/")
     */
    public function getData()
    {
        /** @var Resource[] $resources */
        $resources = $this->em->getRepository(Resource::class)->findBy([], ['name' => 'ASC']);

        $resourcesArray = [];
        foreach ($resources as $resource) {
            $resourcesArray[] = [
                'id' => $resource->getId(),
                'name' => $resource->getName(),
            ];
        }

        /** @var Base[] $bases */
        $orderBy = ['type' => 'DESC', 'level' => 'DESC', 'name' => 'ASC'];
        $bases = $this->em->getRepository(Base::class)->findBy([], $orderBy);

        $basesArray = [];
        foreach ($bases as $base) {
            $baseResources = [];
            foreach ($resources as $resource) {
                /** @var BaseResource $baseResource */
                $baseResource = $this->em->getRepository(BaseResource::class)->findOneBy([
                    'base' => $base,
                    'resource' => $resource,
                ]);

                if (is_null($baseResource)) {
                    $baseResources[$resource->getName()] = [
                        'storage' => 0,
                        'box' => 0,
                        'productionRate' => 0,
                        'consumptionRate' => 0,
                        'storageLimit' => self::DEFAULT_STORAGE_LIMIT,
                        'storageProtection' => 0,
                        'storageAmountTimestamp' => null,
                    ];
                    continue;
                }

                $baseResources[$resource->getName()] = [
                    'storage' => $baseResource->getStorageAmount(),
                    'box' => $baseResource->getStorageAmount(),
                    'productionRate' => $baseResource->getProductionRate(),
                    'consumptionRate' => $baseResource->getConsumptionRate(),
                    'storageLimit' => $baseResource->getStorageLimit(),
                    'storageProtection' => $baseResource->getStorageProtection(),
                    'storageAmountTimestamp' => $baseResource->getStorageAmountTimestamp(),
                ];
            }

            $basesArray[] = [
                'id' => $base->getId(),
                'name' => $base->getName(),
                'level' => $base->getLevel(),
                'type' => $base->getType(),
                'baseResources' => $baseResources,
            ];
        }

        $result = [
            'bases' => $basesArray,
            'resources' => $resourcesArray,
        ];
        return $this->json($result);
    }
}
