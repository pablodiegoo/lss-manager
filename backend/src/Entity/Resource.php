<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResourceRepository")
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(columns={"name"})})
 */
class Resource
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private $hasStorageLimit = false;

    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private $hasBoxStorage = false;

    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private $hasStorageProtection = false;

    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private $hasProductionRate = false;

    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private $hasConsumptionRate = false;

    /**
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private $canBeLooted = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getHasStorageLimit(): ?bool
    {
        return $this->hasStorageLimit;
    }

    public function setHasStorageLimit(bool $hasStorageLimit): self
    {
        $this->hasStorageLimit = $hasStorageLimit;
        return $this;
    }

    public function getHasBoxStorage(): ?bool
    {
        return $this->hasBoxStorage;
    }

    public function setHasBoxStorage(bool $hasBoxStorage): self
    {
        $this->hasBoxStorage = $hasBoxStorage;
        return $this;
    }

    public function getHasStorageProtection(): ?bool
    {
        return $this->hasStorageProtection;
    }

    public function setHasStorageProtection(bool $hasStorageProtection): self
    {
        $this->hasStorageProtection = $hasStorageProtection;
        return $this;
    }

    public function getHasProductionRate(): ?bool
    {
        return $this->hasProductionRate;
    }

    public function setHasProductionRate(bool $hasProductionRate): self
    {
        $this->hasProductionRate = $hasProductionRate;
        return $this;
    }

    public function getHasConsumptionRate(): ?bool
    {
        return $this->hasConsumptionRate;
    }

    public function setHasConsumptionRate(bool $hasConsumptionRate): self
    {
        $this->hasConsumptionRate = $hasConsumptionRate;
        return $this;
    }

    public function getCanBeLooted(): ?bool
    {
        return $this->canBeLooted;
    }

    public function setCanBeLooted(bool $canBeLooted): self
    {
        $this->canBeLooted = $canBeLooted;
        return $this;
    }
}
