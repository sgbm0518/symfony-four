<?php

namespace App\Entity;

use App\Repository\ProductoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductoRepository::class)
 */
class Producto
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
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codigo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categoria", inversedBy="productos",cascade={"persist"})
     */


    private $categoria;

     /**
     * Producto contructor.
     * @param $nombre
     * @param $codigo
     */

    public function __construct($nombre=null, $codigo=null)
    {
        $this->nombre = $nombre;
        $this->codigo = $codigo;
    }



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
    
    /**
     * @return mixed
     */
    public function getCodigo(){
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

     /**
     * @return mixed
     */

    public function getCategoria($codigo){
        return $this->categoria;
    }

     /**
     * @param mixed $categoria
     */

    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }


    
}
