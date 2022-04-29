<?php

namespace App\Entity;

use App\Repository\ExperienceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExperienceRepository::class)
 */
class Experience
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $experiences;

    /**
     * @ORM\OneToMany(targetEntity=Candidat::class, mappedBy="experience")
     */
    private $candidats;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExperiences(): ?string
    {
        return $this->experiences;
    }

    public function setExperiences(string $experiences): self
    {
        $this->experiences = $experiences;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getExperiences();
    }
}
