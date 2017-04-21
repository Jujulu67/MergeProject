<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ecommerce\EcommerceBundle\Entity\Products;
use Ecommerce\EcommerceBundle\Form\ProductType;

class ProduitsController extends Controller
{
    public function produitAction()
    {
        return $this->render('EcommerceBundle:Default:produits/layout/produits.html.twig');
    }

    public function presentationAction()
    {
        return $this->render('EcommerceBundle:Default:produits/layout/presentation.html.twig');
    }

    public function AjoutProduitAction(){
        $request = $this->get('request_stack')->getCurrentRequest();
        $product = new Product();
        $form = $this->get('form.factory')->create(ProductType::class, $product);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return $this->redirectToRoute('produits');
        }
        return $this->render('EcommerceBundle:Default:produits/layout/addProduct.html.twig', array(
            'form' => $form->createView(),));
    }


}