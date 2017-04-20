<?php
/**
 * Created by IntelliJ IDEA.
 * User: rfezr
 * Date: 20/04/2017
 * Time: 21:02
 */

namespace ProjetWebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ProjetWebBundle\Entity\Comment;
use ProjetWebBundle\Form\CommentType;
use ProjetWebBundle\Form\EditActivityType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session;

class CommentController extends Controller
{
    /**
     * @Route("/activity/comment/{photoId}", name="add_comment", requirements={"photoId": "\d+"})
     */
    public function addCommentAction(Request $request, $photoId){


        $photo2 = $this->getDoctrine()->getRepository("ProjetWebBundle:Photos") ->find($photoId);
        
        $photo = $this->getDoctrine()->getRepository("ProjetWebBundle:Comment") ->findBy(['photo' => $photo2]);

        
        if($photo2  == null) {

            throw new NotFoundHttpException("activity id ".$photo2." not found");
        }

        $comment = new Comment();

        $form = $this->get('form.factory')->create(CommentType::class, $comment);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $username = $this->getUser();
            $comment->setUser($username);
            $comment->setPhoto($photo2);
//

            $photo2->addComment($comment);




            $em->persist($photo2);
            $em->flush();

            return $this->redirectToRoute('add_comment', array('photoId' => $photo2->getId()) );
            //$this->getFlashBag()->add('success', 'Le détail a bien été enregistré');
        }


        return $this->render('ProjetWebBundle:Activity:addComment.html.twig', ['photo' => $photo2, 'comments' => $photo, 'form' => $form->createView()]);
    }

    
}