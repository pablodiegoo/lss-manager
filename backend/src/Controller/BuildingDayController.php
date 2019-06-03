<?php

namespace App\Controller;

use App\Entity\Base;
use App\Entity\Resource;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/api/building-day") */
class BuildingDayController extends AbstractController
{
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
        /** @var Base[] $bases */
        $orderBy = ['type' => 'DESC', 'level' => 'DESC', 'name' => 'ASC'];
        $bases = $this->em->getRepository(Base::class)->findBy([], $orderBy);

        $basesArray = [];
        foreach ($bases as $base) {
            $basesArray[] = [
                'id' => $base->getId(),
                'name' => $base->getName(),
                'level' => $base->getLevel(),
                'type' => $base->getType(),
            ];
        }

        /** @var Resource[] $resources */
        $resources = $this->em->getRepository(Resource::class)->findBy([], ['name' => 'ASC']);

        $resourcesArray = [];
        foreach ($resources as $resource) {
            $resourcesArray[] = [
                'id' => $resource->getId(),
                'name' => $resource->getName(),
            ];
        }

        $result = [
            'bases' => $basesArray,
            'resources' => $resourcesArray,
        ];
        return $this->json($result);
    }
}
