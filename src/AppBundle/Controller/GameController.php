<?php

declare (strict_types=1);

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class GameController extends Controller
{
    /**
     * @Route("/game", name="game_homepage")
     * @throws \RuntimeException
     */
    public function indexAction()
    {
        /**
         * @var $session
         */
        if( !isset( $session ) ) {
            $session = new Session();
        }


        if(!$this->get( 'session' )->isStarted() ) {
            $session->start();
        }

        /**
         * @var array
         */
        $cards_list = $this->get('game.deck')->getMyCardList();


        $session->set( 'cards_list', $cards_list );


        return $this->render( 'game/index.html.twig' );
    }

}