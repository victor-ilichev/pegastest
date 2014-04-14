<?php

namespace Pegas\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller {
	
	public function indexAction() {
        return $this->render('PegasTestBundle:Main:index.html.twig');
    }
}
