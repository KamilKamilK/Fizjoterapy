<?php

namespace App\Entity;

use App\Repository\FizjoterapyRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=FizjoterapyRepository::class)
 */
class Fizjoterapy
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="Nazwa", type="string", length=255)
     * @Assert\NotBlank()
     */
    public $name;

    /**
     * @ORM\Column(name="Opis", type="string", length=500)
     * @Assert\NotBlank()
     */
    private $text;

    /**
     * @ORM\Column(name="Typ", type="string", columnDefinition="enum('fizykoterapia', 'kinezyterapia', 'masaż')")
     * @Assert\NotBlank()
     */
    private $type;

    /**
     * @ORM\Column(name="Data", type="datetime")
     */
    private $time;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setHeader($name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text): void
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return mixed
     */
    public function setTime($time): void
    {
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }
}
