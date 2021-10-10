<?php

namespace App\Entity;

use App\Repository\SavedLanguageRecognitionRequestRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
// Fields with floating point variables are stored as string types to avoid possible problems with floating point precision number

/**
 * @ORM\Entity(repositoryClass=SavedLanguageRecognitionRequestRepository::class)
 * @ORM\HasLifecycleCallbacks()
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
    private $source_text;

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

    public function getSourceText(): ?string
    {
        return $this->source_text;
    }

    public function setSourceText(string $source_text): self
    {
        $this->source_text = $source_text;

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

    /**
     * @ORM\PrePersist
     */
    public function autoSetRequestedAt()
    {
        $this->requested_at = new \DateTime();
    }
}
