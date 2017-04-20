<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Ecommerce\EcommerceBundle\EcommerceBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ecommerce\EcommerceBundle\Entity\Produits;
use Ecommerce\EcommerceBundle\Form\testType;

class TestController extends Controller
{

    public function testFormulaireAction()
    {
        $form = $this->createForm(testType::class);

        return $this->render('EcommerceBundle:Default:test.html.twig', array('form' => $form->createView(),));

    }


    public function ajoutAction()
    {

        $em = $this->getDoctrine()->getManager();
        /*
        $produit = new Produits();
        $produit->setCategorie('Legume');
        $produit->setDescription('La tomate se mange');
        $produit->setDisponible( '1' );
        $produit->setImage('http://www.lesfruitsetlegumesfrais.com/_upload/cache/ressources/produits/tomate/tomate_-_copie_346_346_filled.jpg');
        $produit->setNom('Tomate');
        $produit->setPrix('0.99');
        $produit->setTva('20');

        $em->persist($produit);


        $produit2 = new Produits();
        $produit2->setCategorie('Legume');
        $produit2->setDescription('La haricot se mange');
        $produit2->setDisponible( '1' );
        $produit2->setImage('http://www.lesfruitsetlegumesfrais.com/_upload/cache/ressources/produits/tomate/tomate_-_copie_346_346_filled.jpg');
        $produit2->setNom('Haricot');
        $produit2->setPrix('0.97');
        $produit2->setTva('20');

        $em->persist($produit2);

        $em->flush();
*/

       $produits = $em->getRepository('EcommerceBundle:Produits')->findAll();
        return $this->render('EcommerceBundle:Default:test.html.twig', array('produits' => $produits));
    }

}