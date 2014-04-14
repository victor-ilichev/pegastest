<?php

namespace Pegas\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pegas\TestBundle\Form\UserFormType;
use Pegas\TestBundle\Entity\UserForm;
use Symfony\Component\HttpFoundation\Request;

class FormController extends Controller {
	
	/**
     * @Route("/", name="_user_form_page")
     * @Template()
     */
	public function indexAction(Request $request) {
		$userform = new UserForm();
		$form = $this->createForm(new UserFormType(), $userform);
        if ($request->isMethod('POST')) {
			$form->bind($request);
			
			if ($form->isValid()) {
				$message = \Swift_Message::newInstance()
					->setSubject('Hello Email')
					->setFrom('pegas@example.com')
					->setTo($userform->getEmail())
					->setBody('fgfgdgggdgdg');//->setBody($this->renderView('AdaptiveSiteBundle:Default:email.txt.twig', array('name' => $data['name'], 'message' => $data['message'])))
				
				$this->get('mailer')->send($message);  
				return $this->redirect($this->generateUrl('_user_form_email_send_success'));
			}
        }
		
        return $this->render('PegasTestBundle:Form:index.html.twig', array('form' => $form->createView()));
    }
	
	/**
     * @Route("/success", name="_user_form_email_send_success")
     * @Template()
     */
    public function successAction() {
		return $this->render('PegasTestBundle:Form:success.html.twig');
    }
}
