<?php

namespace App\Entity;

use App\Repository\OptAdRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OptAdRepository::class)
 */
class OptAd
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
    private $currency;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $urls;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Tags;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $estimated_revenue;

    /**
     * @ORM\Column(type="integer")
     */
    private $ad_impressions;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $ad_ecpm;

    /**
     * @ORM\Column(type="integer")
     */
    private $clicks;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $ad_ctr;

    /**
     * @ORM\Column(type="datetime")
     */
    private $requested_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getUrls(): ?string
    {
        return $this->urls;
    }

    public function setUrls(string $urls): self
    {
        $this->urls = $urls;

        return $this;
    }

    public function getTags(): ?string
    {
        return $this->Tags;
    }

    public function setTags(string $Tags): self
    {
        $this->Tags = $Tags;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getEstimatedRevenue(): ?string
    {
        return $this->estimated_revenue;
    }

    public function setEstimatedRevenue(string $estimated_revenue): self
    {
        $this->estimated_revenue = $estimated_revenue;

        return $this;
    }

    public function getAdImpressions(): ?int
    {
        return $this->ad_impressions;
    }

    public function setAdImpressions(int $ad_impressions): self
    {
        $this->ad_impressions = $ad_impressions;

        return $this;
    }

    public function getAdEcpm(): ?string
    {
        return $this->ad_ecpm;
    }

    public function setAdEcpm(string $ad_ecpm): self
    {
        $this->ad_ecpm = $ad_ecpm;

        return $this;
    }

    public function getClicks(): ?int
    {
        return $this->clicks;
    }

    public function setClicks(int $clicks): self
    {
        $this->clicks = $clicks;

        return $this;
    }

    public function getAdCtr(): ?string
    {
        return $this->ad_ctr;
    }

    public function setAdCtr(string $ad_ctr): self
    {
        $this->ad_ctr = $ad_ctr;

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
}
