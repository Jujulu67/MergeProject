<?php
/**
 * Created by IntelliJ IDEA.
 * User: rfezr
 * Date: 20/04/2017
 * Time: 21:02
 */

namespace Utilisateurs\UtilisateursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Utilisateurs\UtilisateursBundle\Entity\Avatar;
use Utilisateurs\UtilisateursBundle\Form\AvatarType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session;

class AvatarController extends Controller
{
    /**
     * @Route("/activity/comment/{photoId}", name="add_comment", requirements={"photoId": "\d+"})
     */

    public function indexAction()
    {
        return $this->render('UtilisateursBundle:Default:addAvatar.html.twig');
    }


    public function addAvatarAction(Request $request)
    {
$avatar = new Avatar();
$form = $this->createForm(AvatarType::class, $avatar);
$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {

    $file = $avatar->getPictureFile();
    $fileName = md5(uniqid()).'.'.$file->guessExtension();
    $file->move(
        $this->getParameter('avatar_directory'),
        $fileName
    );

    $avatar->setPictureFile($fileName);

        return $this->redirect($this->generateUrl('avatar'));
}
return $this->render('UtilisateursBundle:Default:addAvatar.html.twig', array(
    'form' => $form->createView(),
));


    }
    
}