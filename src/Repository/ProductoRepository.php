<?php

namespace App\Repository;

use App\Entity\Producto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Producto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Producto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Producto[]    findAll()
 * @method Producto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Producto::class);
    }

    // Para crear un repositorio lo primero que debemos hacer identificar a que tabla vamos hacerle la consulta
    // 1. Vamos hacer la consulta a mi tabla producto en la base de datos, nos dirigimos a ProductoRepository y creamos una funcion


    // public function BuscarProductoPorId($id){ 
    //     return $this->getEntityManager() // Retornar el resultado de una busqueda. $this-> obtener el entityManager
    //             // Para realizar la busqueda lo primero que se necesita es de un Query, el mismo esta
    //             // dentro de entityManager, accedemos al mismo 
    //             // el dql-> es una sixtansis similar muy parecida al sql
    //             // dentro del dql -> se hara una consulta con SELECT y vamos a consultar los datos que tenemos
    //             // en la base de datos, esto es como una consulta orientada a objetos, en la consulta nos estamos
    //             // orientando por la entidad producto
    //             // SELECT producto.id, producto.nombre, producto.codigo -> Esto es lo que se va a traer. (producto no esta definido todavia)
    //             // FROM -> App\Entity\Producto producto   --- se veria asi --- ->De donde los voy a traer App\Entity -> namespace\entidad -> Producto producto
    //             // WHERE -> producto.id = 1
    //             // getResult -> retorna un arreglo de objetos --------- sin el getResult la funcion no va a retornar nada, solo nos retornaria una cadena de texto
    //             // por ende debemos colocarla.
    //             // getSingleResult -> me retorna solo un objeto
    //         ->createQuery(           
    //         '                            
    //             SELECT producto.id, producto.nombre, producto.codigo 
    //             FROM App\Entity\Producto producto 
    //             WHERE producto.id =:identificacion

    //         '
    //         )
    //         ->setParameter('identificacion',$id)
    //         ->getResult()
    //         ;
    //         // Para llamar a esta funcion que esta en el repositorio BuscarProductoPorId, 
    //         // simplemente se copia el nombre de la funcion y nos vamos al controlador. debajo de $productos = $em->getRepository


    // }
    // /**
    //  * @return Producto[] Returns an array of Producto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */ 

    /*
    public function findOneBySomeField($value): ?Producto
    { 
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
