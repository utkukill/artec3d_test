<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParserRepository")
 */
class Parser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $c1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $c2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $c3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $c4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $c5;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $c6;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $c7;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $c8;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $c9;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getC1(): ?string
    {
        return $this->c1;
    }

    public function setC1(?string $c1): self
    {
        $this->c1 = $c1;

        return $this;
    }

    public function getC2(): ?string
    {
        return $this->c2;
    }

    public function setC2(?string $c2): self
    {
        $this->c2 = $c2;

        return $this;
    }

    public function getC3(): ?string
    {
        return $this->c3;
    }

    public function setC3(?string $c3): self
    {
        $this->c3 = $c3;

        return $this;
    }

    public function getC4(): ?string
    {
        return $this->c4;
    }

    public function setC4(?string $c4): self
    {
        $this->c4 = $c4;

        return $this;
    }

    public function getC5(): ?string
    {
        return $this->c5;
    }

    public function setC5(?string $c5): self
    {
        $this->c5 = $c5;

        return $this;
    }

    public function getC6(): ?string
    {
        return $this->c6;
    }

    public function setC6(?string $c6): self
    {
        $this->c6 = $c6;

        return $this;
    }

    public function getC7(): ?string
    {
        return $this->c7;
    }

    public function setC7(?string $c7): self
    {
        $this->c7 = $c7;

        return $this;
    }

    public function getC8(): ?string
    {
        return $this->c8;
    }

    public function setC8(?string $c8): self
    {
        $this->c8 = $c8;

        return $this;
    }

    public function getC9(): ?string
    {
        return $this->c9;
    }

    public function setC9(?string $c9): self
    {
        $this->c9 = $c9;

        return $this;
    }
}
