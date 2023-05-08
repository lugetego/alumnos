<?php

namespace App\Entity;

use App\Repository\AlumnosRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;



/**
 * @ORM\Entity(repositoryClass=AlumnosRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class Alumnos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     * @Gedmo\Slug(fields={"nombre", "apellidos"}, updatable=false)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apellidos;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $correo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $correoinst;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cubiculo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $asesor;

    /**
     * @ORM\Column(type="text", length=500, nullable=true)
     */
    private $areas;

    /**
     * @ORM\Column(type="text", length=5000, nullable=true)
     */
    private $intereses;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pagina;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $grado;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $semestre;

    /**
     * @ORM\Column(type="boolean")
     */
    private $aviso;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modified;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    public function getCorreoinst(): ?string
    {
        return $this->correoinst;
    }

    public function setCorreoinst(string $correoinst): self
    {
        $this->correoinst = $correoinst;

        return $this;
    }

    public function getCubiculo(): ?string
    {
        return $this->cubiculo;
    }

    public function setCubiculo(string $cubiculo): self
    {
        $this->cubiculo = $cubiculo;

        return $this;
    }

    public function getAsesor(): ?string
    {
        return $this->asesor;
    }

    public function setAsesor(string $asesor): self
    {
        $this->asesor = $asesor;

        return $this;
    }

    public function getAreas(): ?string
    {
        return $this->areas;
    }

    public function setAreas(string $areas): self
    {
        $this->areas = $areas;

        return $this;
    }

    public function getIntereses(): ?string
    {
        return $this->intereses;
    }

    public function setIntereses(string $intereses): self
    {
        $this->intereses = $intereses;

        return $this;
    }

    public function getPagina(): ?string
    {
        return $this->pagina;
    }

    public function setPagina(string $pagina): self
    {
        $this->pagina = $pagina;

        return $this;
    }

    public function getGrado(): ?string
    {
        return $this->grado;
    }

    public function setGrado(string $grado): self
    {
        $this->grado = $grado;

        return $this;
    }

    public function getSemestre(): ?string
    {
        return $this->semestre;
    }

    public function setSemestre(string $semestre): self
    {
        $this->semestre = $semestre;

        return $this;
    }

    public function isAviso(): ?bool
    {
        return $this->aviso;
    }

    public function setAviso(bool $aviso): self
    {
        $this->aviso = $aviso;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created): void
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param mixed $modified
     */
    public function setModified($modified): void
    {
        $this->modified = $modified;
    }


    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->setCreated(new \DateTime());
        $this->setModified(new \DateTime());
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->setModified(new \DateTime());
    }

}
