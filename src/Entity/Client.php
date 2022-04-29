<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $name_society;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activity_type;

    /**
     * @ORM\OneToMany(targetEntity=JobOffer::class, mappedBy="id_client" )
     */
    private $jobOffers;

    public function __construct()
    {
        $this->infoAdminClients = new ArrayCollection();
        $this->jobOffers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameSociety(): ?string
    {
        return $this->name_society;
    }

    public function setNameSociety(string $name_society): self
    {
        $this->name_society = $name_society;

        return $this;
    }

    public function getActivityType(): ?string
    {
        return $this->activity_type;
    }

    public function setActivityType(string $activity_type): self
    {
        $this->activity_type = $activity_type;

        return $this;
    }

    /**
     * @return Collection|InfoAdminClient[]
     */
    public function getInfoAdminClients(): Collection
    {
        return $this->infoAdminClients;
    }

    public function addInfoAdminClient(InfoAdminClient $infoAdminClient): self
    {
        if (!$this->infoAdminClients->contains($infoAdminClient)) {
            $this->infoAdminClients[] = $infoAdminClient;
            $infoAdminClient->setIdClient($this);
        }

        return $this;
    }

    public function removeInfoAdminClient(InfoAdminClient $infoAdminClient): self
    {
        if ($this->infoAdminClients->removeElement($infoAdminClient)) {
            // set the owning side to null (unless already changed)
            if ($infoAdminClient->getIdClient() === $this) {
                $infoAdminClient->setIdClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|JobOffer[]
     */
    public function getJobOffers(): Collection
    {
        return $this->jobOffers;
    }

    public function addJobOffer(JobOffer $jobOffer): self
    {
        if (!$this->jobOffers->contains($jobOffer)) {
            $this->jobOffers[] = $jobOffer;
            $jobOffer->setClient($this);
        }

        return $this;
    }

    public function removeJobOffer(JobOffer $jobOffer): self
    {
        if ($this->jobOffers->removeElement($jobOffer)) {
            // set the owning side to null (unless already changed)
            if ($jobOffer->getClient() === $this) {
                $jobOffer->setClient(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getNameSociety();
    }
}
