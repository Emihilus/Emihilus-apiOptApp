<?php

namespace App\Entity;

use App\Repository\SavedLanguageRecognitionDetectionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SavedLanguageRecognitionDetectionRepository::class)
 */
class SavedLanguageRecognitionDetection
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $recognized_lang;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isReliable;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $confidence_score;

    /**
     * @ORM\ManyToOne(targetEntity=SavedLanguageRecognitionRequest::class, inversedBy="recognitions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $savedLanguageRecognitionRequest;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRecognizedLang(): ?string
    {
        return $this->recognized_lang;
    }

    public function setRecognizedLang(string $recognized_lang): self
    {
        $this->recognized_lang = $recognized_lang;

        return $this;
    }

    public function getIsReliable(): ?bool
    {
        return $this->isReliable;
    }

    public function setIsReliable(bool $isReliable): self
    {
        $this->isReliable = $isReliable;

        return $this;
    }

    public function getConfidenceScore(): ?string
    {
        return $this->confidence_score;
    }

    public function setConfidenceScore(string $confidence_score): self
    {
        $this->confidence_score = $confidence_score;

        return $this;
    }

    public function getSavedLanguageRecognitionRequest(): ?SavedLanguageRecognitionRequest
    {
        return $this->savedLanguageRecognitionRequest;
    }

    public function setSavedLanguageRecognitionRequest(?SavedLanguageRecognitionRequest $savedLanguageRecognitionRequest): self
    {
        $this->savedLanguageRecognitionRequest = $savedLanguageRecognitionRequest;

        return $this;
    }
}
