<?php

namespace App\Entity;

use App\Repository\CandidatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CandidatRepository::class)
 */
class Candidat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cv;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $current_location;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nationality;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $availability;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $short_description;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $active;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $passport;

    /**
     * @ORM\ManyToOne(targetEntity=Gender::class , inversedBy="candidat")
     */
    private $gender;

    /**
     * @ORM\ManyToOne(targetEntity=JobCategory::class , inversedBy="candidat")
     * @ORM\JoinColumn(nullable=true , onDelete="SET NULL")
     */
    private $job_cat;

    /**
     * @ORM\ManyToOne(targetEntity=Experience::class , inversedBy="candidat")
     * @ORM\JoinColumn(nullable=true)
     */
    private $experience;

    /**
     * @ORM\OneToMany(targetEntity=Candidature::class, mappedBy="candidat")
     */
    private $candidatures;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $birth_location;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $birth_date;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="candidat", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=InfoAdminCandidat::class, mappedBy="candidat")
     */
    private $infoAdminCandidat;

    public function __construct()
    {
        $this->candidatures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(string $cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getCurrentLocation(): ?string
    {
        return $this->current_location;
    }

    public function setCurrentLocation(string $current_location): self
    {
        $this->current_location = $current_location;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getAvailability(): ?bool
    {
        return $this->availability;
    }

    public function setAvailability(bool $availability): self
    {
        $this->availability = $availability;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->short_description;
    }

    public function setShortDescription(string $short_description): self
    {
        $this->short_description = $short_description;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getPassport(): ?string
    {
        return $this->passport;
    }

    public function setPassport(string $passport): self
    {
        $this->passport = $passport;

        return $this;
    }

    public function getGender(): ?Gender
    {
        return $this->gender;
    }

    public function setGender(Gender $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getJobCat(): ?JobCategory
    {
        return $this->job_cat;
    }

    public function setJobCat(JobCategory $job_cat): self
    {
        $this->job_cat = $job_cat;

        return $this;
    }

    public function getExperience(): ?Experience
    {
        return $this->experience;
    }

    public function setExperience(Experience $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * @return Collection|Candidature[]
     */
    public function getCandidatures(): Collection
    {
        return $this->candidatures;
    }

    public function addCandidature(Candidature $candidature): self
    {
        if (!$this->candidatures->contains($candidature)) {
            $this->candidatures[] = $candidature;
            $candidature->setCandidat($this);
        }

        return $this;
    }

    public function removeCandidature(Candidature $candidature): self
    {
        if ($this->candidatures->removeElement($candidature)) {
            // set the owning side to null (unless already changed)
            if ($candidature->getCandidat() === $this) {
                $candidature->setCandidat(null);
            }
        }

        return $this;
    }

    public function getBirthLocation(): ?string
    {
        return $this->birth_location;
    }

    public function setBirthLocation(?string $birth_location): self
    {
        $this->birth_location = $birth_location;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birth_date;
    }

    public function setBirthDate(?\DateTimeInterface $birth_date): self
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    public function toArray(){
        return ['gender'=>$this->getGender(),
                'firstname'=>$this->getFirstName(), 
                'lastname'=>$this->getLastName(), 
                'adress' => $this->getAdress(), 
                'country' => $this->getCountry(),
                'nationality' => $this->getNationality(),
                'curriculumVitae' => $this->getCv(),
                'profilPicture' => $this->getPicture(),
                'currentLocation' => $this->getCurrentLocation(),
                'dateOfBirth' => $this->getBirthDate(),
                'placeOfBirth' => $this->getBirthLocation(),
                'shortDescription' => $this->getShortDescription(),
                'experience' => $this->getExperience(),
                'jobCategory' => $this->getJobCat(),
                'passportFile' => $this->getPassport()];
    }
    
    public function profilIsCompleted()
    {
        return $this->getProfilCompletionPercent() === 100;
    }

    public function getProfilCompletionPercent()
    {
        $filledFieldCount = 0;
        $fields = $this -> toArray();

        foreach ($fields as $field){
            if (!empty($field)){
                $filledFieldCount ++ ;
            }
        }

       return $filledFieldCount * 100 / count($fields);
    
    }
}
