<?php 

namespace App\Controller; 
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method; 
use Symfony\Component\HttpFoundation\JsonResponse; 
use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\Routing\Annotation\Route; 
use Symfony\Bundle\FrameworkBundle\Controller\Controller; 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends  AbstractController
{ 
    /** 
    * @Route("/", name="homepage") 
    * @Route("/{route}", name="vue_pages", requirements={"route"="^(?!.*api).+"}) 
    * @Method("GET") 
    */
    public function indexAction(Request $request) { 
        
        $words = ['sky', 'cloud', 'wood', 'rock', 'forest',
        'mountain', 'breeze','rouget sall'];

        
        return $this->render('home/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'controller_name' => 'DefaultController',
            'words' => $words
        ]);
    }
    /**
     * @Route("/api/colors", name="colors_route")
     */
    public function colorsAction()
    {
        return  new JsonResponse(array('colors' => ['red', 'green','blue', 'yellow'], "success" => true));
    }
}