<?php

namespace App\Entity;

use App\Repository\SavedLanguageRecognitionRequestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SavedLanguageRecognitionRequestRepository::class)
 */
class SavedLanguageRecognitionRequest
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $souce_text;

    /**
     * @ORM\Column(type="datetime")
     */
    private $requested_at;

    /**
     * @ORM\OneToMany(targetEntity=SavedLanguageRecognitionDetection::class, mappedBy="savedLanguageRecognitionRequest")
     */
    private $recognitions;

    public function __construct()
    {
        $this->recognitions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSouceText(): ?string
    {
        return $this->souce_text;
    }

    public function setSouceText(string $souce_text): self
    {
        $this->souce_text = $souce_text;

        return $this;
    }

    public function getRequestedAt(): ?\DateTimeInterface
    {
        return $this->requested_at;
    }

    public function setRequestedAt(\DateTimeInterface $requested_at): self
    {
        $this->requested_at = $requested_at;

        return $this;
    }

    /**
     * @return Collection|SavedLanguageRecognitionDetection[]
     */
    public function getRecognitions(): Collection
    {
        return $this->recognitions;
    }

    public function addRecognition(SavedLanguageRecognitionDetection $recognition): self
    {
        if (!$this->recognitions->contains($recognition)) {
            $this->recognitions[] = $recognition;
            $recognition->setSavedLanguageRecognitionRequest($this);
        }

        return $this;
    }

    public function removeRecognition(SavedLanguageRecognitionDetection $recognition): self
    {
        if ($this->recognitions->removeElement($recognition)) {
            // set the owning side to null (unless already changed)
            if ($recognition->getSavedLanguageRecognitionRequest() === $this) {
                $recognition->setSavedLanguageRecognitionRequest(null);
            }
        }

        return $this;
    }
}
