<?php

namespace BiblioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="accueil")
     */
    public function indexAction()
    {
        return $this->redirectToRoute( 'liste', [ 'type' => 'eleve'] );
    }

    public function menuAction()
    {
        $requestStack = $this->get( 'request_stack' );
        $masterRequest = $requestStack->getMasterRequest();

        $type = null;
        if( $masterRequest )
        {
            $type = $masterRequest->attributes->get( 'type' );
        }

        return $this->render( '@Biblio/Home/menu.html.twig', [ 'type' => $type ]);
    }

    /**
     * @Route("/liste/{type}", name="liste")
     */
    public function listeAction( $type )
    {
        $repo = sprintf("BiblioBundle:%s", \ucfirst($type));

        $data = $this->getDoctrine()->getRepository( $repo )->findAll();

        $view = sprintf('@Biblio/%s/list.html.twig', \ucFirst($type));

        return $this->render( $view, [ "{$type}s" => $data ]);
    }

    /**
     * @Route("/nouveau/{type}", name="nouveau") 
     */
    public function createAction( Request $request, $type)
    {
        $class = sprintf('\\BiblioBundle\\Entity\\%s', \ucfirst($type));
        $obj = new $class();

        $formName = sprintf('\\BiblioBundle\\Form\\%sType', \ucfirst($type));
        $formClass = get_class(new $formName());

        $form = $this->createForm( $formClass, $obj );

        $form->handleRequest( $request );
        if( $form->isSubmitted() )
        {
            if( $form->isValid() )
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist( $obj );
                $em->flush();

                return $this->redirectToRoute( 'liste', [ 'type' => $type ]);
            }
        }

        return $this->render('@Biblio/Home/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("voir/{type}/{id}", name="voir")
     */
    public function showAction( $type, $id )
    {   
        $repo = "BiblioBundle:" . ucfirst($type);
        $data = $this->getDoctrine()->getRepository($repo)->find($id);

        return $this->render( '@Biblio/Eleve/show.html.twig', [ 'var' => $data ]);
    }

    /**
     * @Route("/modifier/{type}/{id}", name="modifier")
     */
    public function modifyAction( Request $request, $id, $type )
    {
        $repo = "BiblioBundle:" . ucfirst($type);
        $data = $this->getDoctrine()->getRepository($repo)->find($id);

        $formName = sprintf('\\BiblioBundle\\Form\\%sType', \ucfirst($type));
        $formClass = get_class(new $formName());

        $form = $this->createForm( $formClass, $data );

        $form->handleRequest( $request );
        if( $form->isSubmitted() )
        {
            if( $form->isValid() )
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist( $data );
                $em->flush();

                return $this->redirectToRoute( 'liste', [
                    'type' => $type
                ]);
            }
        }

        return $this->render('@Biblio/Home/create.html.twig', [
            'form' => $form->createView()
        ]);
        
    }

    /**
     * @Route("/supprimer/{type}/{id}", name="supprimer")
     */
    public function deleteAction( $type, $id )
    {
        $repo = sprintf("BiblioBundle:%s", ucfirst($type));

        $data = $this->getDoctrine()->getRepository($repo)->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove( $data );
        $em->flush();

        return $this->redirectToRoute( 'liste', [ 'type' => $type ]);
    }

}