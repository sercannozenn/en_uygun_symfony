<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProviderListRepository")
 */
class ProviderList
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
    private $provider_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $provider_address;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProviderName(): ?string
    {
        return $this->provider_name;
    }

    public function setProviderName(string $provider_name): self
    {
        $this->provider_name = $provider_name;

        return $this;
    }

    public function getProviderAddress(): ?string
    {
        return $this->provider_address;
    }

    public function setProviderAddress(string $provider_address): self
    {
        $this->provider_address = $provider_address;

        return $this;
    }
}
