<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CharacterRepository::class)
 * @ORM\Table(name="`character`")
 */
class Character
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("characters_get")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups("characters_get")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Groups("characters_get")
     */
    private $nickname;

    /**
     * @ORM\Column(type="text")
     * @Groups("characters_get")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=10)
     * @Groups("characters_get")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=100)
     * @Groups("characters_get")
     */
    private $actor;

    /**
     * @ORM\Column(type="datetime")
     * @Groups("characters_get")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups("characters_get")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Membership::class, inversedBy="characters")
     * @Groups("characters_get")
     */
    private $membership;

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

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(?string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getActor(): ?string
    {
        return $this->actor;
    }

    public function setActor(string $actor): self
    {
        $this->actor = $actor;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getMembership(): ?membership
    {
        return $this->membership;
    }

    public function setMembership(?membership $membership): self
    {
        $this->membership = $membership;

        return $this;
    }
}
