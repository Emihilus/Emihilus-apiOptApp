<?php

namespace App\Entity;

use App\Repository\SavedIMGWMeasurementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SavedIMGWMeasurementRepository::class)
 */
class SavedIMGWMeasurement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $station_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $station;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $temp;

    /**
     * @ORM\Column(type="integer")
     */
    private $wind_dir;

    /**
     * @ORM\Column(type="integer")
     */
    private $wind_speed;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $relative_humidity;

    /**
     * @ORM\Column(type="integer")
     */
    private $drop_sum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pressure;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStationId(): ?int
    {
        return $this->station_id;
    }

    public function setStationId(int $station_id): self
    {
        $this->station_id = $station_id;

        return $this;
    }

    public function getStation(): ?string
    {
        return $this->station;
    }

    public function setStation(string $station): self
    {
        $this->station = $station;

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

    public function getTemp(): ?string
    {
        return $this->temp;
    }

    public function setTemp(string $temp): self
    {
        $this->temp = $temp;

        return $this;
    }

    public function getWindDir(): ?int
    {
        return $this->wind_dir;
    }

    public function setWindDir(int $wind_dir): self
    {
        $this->wind_dir = $wind_dir;

        return $this;
    }

    public function getWindSpeed(): ?int
    {
        return $this->wind_speed;
    }

    public function setWindSpeed(int $wind_speed): self
    {
        $this->wind_speed = $wind_speed;

        return $this;
    }

    public function getRelativeHumidity(): ?string
    {
        return $this->relative_humidity;
    }

    public function setRelativeHumidity(string $relative_humidity): self
    {
        $this->relative_humidity = $relative_humidity;

        return $this;
    }

    public function getDropSum(): ?int
    {
        return $this->drop_sum;
    }

    public function setDropSum(int $drop_sum): self
    {
        $this->drop_sum = $drop_sum;

        return $this;
    }

    public function getPressure(): ?string
    {
        return $this->pressure;
    }

    public function setPressure(string $pressure): self
    {
        $this->pressure = $pressure;

        return $this;
    }
}
