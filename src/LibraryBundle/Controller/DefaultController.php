<?php

namespace LibraryBundle\Controller;

use LibraryBundle\Entity\Comments;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
     
         $liste = file_get_contents("http://black_books.my/books");
         $liste = json_decode($liste, true);
        return $this->render('LibraryBundle:Default:index.html.twig' ,array(
            'liste' => $liste,
        ));
        
    }
    
     /**
     * @Route("/comment/{id}")
     */
    public function ajoutAction()
    {
        $comment = new Comments();
        $form = $this->createForm('LibraryBundle\Form\CommentsType', $comment);
         $livre = file_get_contents("http://black_books.my/book/".$id);
         $livre = json_decode($liste, true);
        return $this->render('LibraryBundle:Default:ajout.html.twig' ,array(
            'livre' => $livre,
            'form' => $form,
        ));
        
    }
}
