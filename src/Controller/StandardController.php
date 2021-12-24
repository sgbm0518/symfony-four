<?php

namespace App\Controller;


use App\Entity\Producto;
use App\Entity\Categoria;
use App\Controller\Productos;
use App\Form\ProductoType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
// use App\Repository\ProductoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StandardController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request)
    {
    
            $producto = new Producto(); //Objeto producto
            $form = $this->createForm(ProductoType::class,$producto); // Lo estamos asociando al controlador con el formulario
            $Num1 = 1;
            $Num2 = 100;
            $Suma = $Num1+$Num2;
            $nombres = "sergio, giovanni, julian, david, MAGOLA";
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
                $em=$this->getDoctrine()->getManager();
                $producto = $form->getdata(); 
                $em->persist($producto);
                $em->flush();
            }
            return $this->render('standard/index.html.twig', 
                array(
                'SumaEntreNumeroUnoYNumero2'=>$Suma,
                'Num1'=>$Num1,
                'Num2'=>$Num2,
                "nombres"=>$nombres,
                'form'=> $form->createView()   
            )
        
        );
        
        [ 
            
            // 'controller_name' => 'Sergio Madrid',
        ];
    }

    /**
     * @Route("/pagina2/{nombre}/", name="pagina2")
     */

    public function pagina2(Request $request, $nombre){
        $form = $this->createFormBuilder()
            ->add('nombre') // estos campos son tipo de texto
            ->add('codigo')
            ->add('categoria',EntityType::class, [ // ojo la categoria es el objeto de una entidad
                'class' => Categoria::class,
                'choice_label' =>'nombre'
            ])    
            ->add('Enviar',SubmitType::class)
            ->getForm();
        // $form->handleRequest($request);    
        // if($form->isSubmitted() && $form->isValid()){// si el formulario es enviado y el formulario es valido, entonces que haga
        // 1. Obtener lo datos, lo tengo del formulario y los almaceno en un arreglo que sea data
        // $em = $this->getDoctrine()->getManager();
        // $data = $form->getData();
        // $producto = new Producto($data['nombre'],$date['codigo']);      // ESTO QUE ESTA OCULTO, LO DEJE ASI PORQUE ME SALIA UN ERROR Y NO PUDE SOLUCIONARLO
        // $producto->setCategoria($data['categoria']);
        // $em->persist($producto);
        // $em->flush();
        // return $this->redirectToRoute('pagina2',['nombre'=>'Guardado exitoso']);

   
    return $this->render('standard/pagina2.html.twig',array("parametro1"=>$nombre, 'form'=>$form->createView()));
}

    /**
     * @Route("/PersistirDatos/", name="Persistir")
     */
     public function PersistirDatos(){
        $entityManager = $this->getDoctrine()->getManager();
        $categoria = new Categoria("tecnologia");
        $producto = new Producto("pantalla", "raton");
        // $producto->setNombre('chancletas');
        // $producto->setCodigo('t-13');
        $producto->setCategoria($categoria);
        $entityManager->persist($producto);
        // $entityManager->flush();
        return $this->render('standard/success.html.twig');
     }

    /**
     * @Route("/Busquedas/{idProducto}", name="Busquedas")
     */

     public function Busquedas($idProducto){
        $em = $this->getDoctrine()->getManager();
        $producto = $em->getRepository(Producto::class)->find(1);// Este trae un registro y lo busca por el id.
        //$producto -> esto que esta aqui es un objeto
        $producto2 = $em->getRepository(Producto::class)->findOneBy(['codigo'=>'t-01','nombre'=>'Hola']); // Este trae un registro y lo busca por el codigo y el nombre
        $productos3 = $em->getRepository(Producto::class)->findBy(['categoria'=>16]); // este me trae varios registros que coincidan con los parametros que le estoy pasando a la funcion
        $productos = $em->getRepository(Producto::class)->findAll(); // Este me trae todos lsos registros de mi tabla
        //=========================================================
        // $productoRepository = $em->getRepository(Producto::class)->BuscarProductoPorId($idProducto);
        return $this->render('standard/busqueda.html.twig', array(
            'find'=>$producto, // find -> es mi palabra clave, esta clave esta apuntando a mi objeto producto, que es el resultado de mi busqueda find
            'findOneBy'=>$producto2,
            'findBy'=>$productos3,
            'findAll'=>$productos
            // 'BuscarProductoPorId'=>$productoRepository// Pasar el resultado de la busqueda a mi twig
        ));
}
}

