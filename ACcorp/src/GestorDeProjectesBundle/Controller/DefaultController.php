<?php

namespace GestorDeProjectesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use GestorDeProjectesBundle\Form\UserType;
use GestorDeProjectesBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
         $authenticationUtils = $this->get('security.authentication_utils');

	    // get the login error if there is one
	    $error = $authenticationUtils->getLastAuthenticationError();

	    // last username entered by the user
	    $lastUsername = $authenticationUtils->getLastUsername();

	    return $this->render('GestorDeProjectesBundle:Default:login.html.twig', array(
	        'last_username' => $lastUsername,
	        'error'         => $error,
	    ));
    }

    public function registreAction(Request $request)
    {
    	// 1) build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            $rol = $user->getRole();
            $rol = [$rol];
            $user->setRoles($rol);
            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            
            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return new Response("Usuari registrat");
            //$nPila = "Usuari registrat";
            //return $this->render('GestorDeProjectesBundle:Default:respostaformUser.html.twig',array('nPila' => $nPila));
        }

        return $this->render('GestorDeProjectesBundle:Default:register.html.twig',array('form' => $form->createView()));
    }

    public function  loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils'); //mostra per pantalla si hi ha un error

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();//recull error

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();//recull l'ultim ususername

        return $this->render('GestorDeProjectesBundle:Default:login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }
    
    public function loguedAction()
    {
        return $this->render('GestorDeProjectesBundle:Default:logued.html.twig');
    }
    public function adminAction()
    {
        return $this->render('GestorDeProjectesBundle:Default:admin.html.twig');
    }
    

}
