<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Entity\Utilisateur;



class AuthenticationController extends AbstractController
{
    /**
     * @Route("/authentication", name="app_authentication")
     */
    public function index(): Response
    {
        return $this->render('authentication/index.html.twig', [
            'controller_name' => 'AuthenticationController',
        ]);
    }

    /**
     * @Route("/authentification/{mail}/{mdp}", name="authentication", methods="POST")
     */
    public function authentification(string $mail, string $mdp, SessionInterface $session)
    {
        try{
            $utilisateur = $this->getDoctrine()
                ->getRepository(Utilisateur::class)
                ->findOneBy([
                    'mail' => $mail,
                ]);
                if($utilisateur != null && password_verify($mdp, $utilisateur->getPassword()))
                {   
                    $nom = $utilisateur->getNom();
                    $prenom= $utilisateur->getPrenom();
                    $adresse = $utilisateur->getAdresse();
                    $numero = $utilisateur->getNumero();
                    $mail = $utilisateur->getMail();
                    $ID = $utilisateur->getID();
        
                    // $session->set('ID', $ID);
                    // $session->set('nom', $nom); 
                    // $session->set('prenom', $prenom); 
                    // $session->set('mail', $mail); 
                    // $session->set('adresse', $adresse); 
                    // $session->set('numero', $numero); 
        
                    $response = new Response();

                    $response->setContent(json_encode(['ID'=> $ID,
                                                        'nom' => $nom,
                                                        'prenom' => $prenom,
                                                        'adresse' => $adresse,
                                                        'numero' => $numero,
                                                        'mail' => $mail,
                                                        ]));
        
        
                    $response->headers->set('Content-Type', 'application/json');
        
                    return $response;
                }
                else
                {
                    $response = new Response();

                    return $response->setStatusCode(500);
                }
        }
        catch (\Exception $err)
        {
            $response = new Response();
            return $response->setStatusCode(500);
        }
            
       
    }

    /**
     * @Route("/connexion", name="connexion", methods="POST")
    */
    
    // public function connexion(): Response
    // {
        
    // }
    
}
