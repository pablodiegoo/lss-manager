<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BaseRepository")
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(columns={"user_id", "name"})})
 */
class Base
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="bases")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $class;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BaseResource", mappedBy="base", orphanRemoval=true)
     */
    private $baseResources;

    public function __construct()
    {
        $this->baseResources = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
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

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(string $class): self
    {
        $this->class = $class;
        return $this;
    }

    /**
     * @return Collection|BaseResource[]
     */
    public function getBaseResources(): Collection
    {
        return $this->baseResources;
    }

    public function addBaseResource(BaseResource $baseResource): self
    {
        if (!$this->baseResources->contains($baseResource)) {
            $this->baseResources[] = $baseResource;
            $baseResource->setBase($this);
        }

        return $this;
    }

    public function removeBaseResource(BaseResource $baseResource): self
    {
        if ($this->baseResources->contains($baseResource)) {
            $this->baseResources->removeElement($baseResource);
            // set the owning side to null (unless already changed)
            if ($baseResource->getBase() === $this) {
                $baseResource->setBase(null);
            }
        }

        return $this;
    }
}
