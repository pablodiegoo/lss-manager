<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BaseResourceRepository")
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(columns={"base_id", "resource_id"})})
 */
class BaseResource
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Base", inversedBy="baseResources")
     * @ORM\JoinColumn(nullable=false)
     */
    private $base;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Resource")
     * @ORM\JoinColumn(nullable=false)
     */
    private $resource;

    /**
     * @ORM\Column(type="bigint", options={"default": 0})
     */
    private $storageAmount = 0;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $storageAmountTimestamp;

    /**
     * @ORM\Column(type="bigint", options={"default": 0})
     */
    private $boxAmount = 0;

    /**
     * @ORM\Column(type="bigint", options={"default": 0})
     */
    private $storageLimit = 0;

    /**
     * @ORM\Column(type="bigint", options={"default": 0})
     */
    private $storageProtection = 0;

    /**
     * @ORM\Column(type="bigint", options={"default": 0})
     */
    private $productionRate = 0;

    /**
     * @ORM\Column(type="bigint", options={"default": 0})
     */
    private $consumptionRate = 0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBase(): ?Base
    {
        return $this->base;
    }

    public function setBase(?Base $base): self
    {
        $this->base = $base;
        return $this;
    }

    public function getResource(): ?Resource
    {
        return $this->resource;
    }

    public function setResource(?Resource $resource): self
    {
        $this->resource = $resource;
        return $this;
    }

    public function getStorageAmount(): ?int
    {
        return $this->storageAmount;
    }

    public function setStorageAmount(int $storageAmount): self
    {
        $this->storageAmount = $storageAmount;
        return $this;
    }

    public function getStorageAmountTimestamp(): ?int
    {
        return $this->storageAmountTimestamp;
    }

    public function setStorageAmountTimestamp(int $storageAmountTimestamp): self
    {
        $this->storageAmountTimestamp = $storageAmountTimestamp;
        return $this;
    }

    public function getBoxAmount(): ?int
    {
        return $this->boxAmount;
    }

    public function setBoxAmount(int $boxAmount): self
    {
        $this->boxAmount = $boxAmount;
        return $this;
    }

    public function getStorageLimit(): ?int
    {
        return $this->storageLimit;
    }

    public function setStorageLimit(int $storageLimit): self
    {
        $this->storageLimit = $storageLimit;
        return $this;
    }

    public function getStorageProtection(): ?int
    {
        return $this->storageProtection;
    }

    public function setStorageProtection(int $storageProtection): self
    {
        $this->storageProtection = $storageProtection;
        return $this;
    }

    public function getProductionRate(): ?int
    {
        return $this->productionRate;
    }

    public function setProductionRate(int $productionRate): self
    {
        $this->productionRate = $productionRate;
        return $this;
    }

    public function getConsumptionRate(): ?int
    {
        return $this->consumptionRate;
    }

    public function setConsumptionRate(int $consumptionRate): self
    {
        $this->consumptionRate = $consumptionRate;
        return $this;
    }
}
