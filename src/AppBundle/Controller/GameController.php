<?php

declare (strict_types=1);

namespace AppBundle\Controller;

use AppBundle\Utils\Game\{
    Card\Card,
    Deck\Deck
};
use Symfony\Component\HttpFoundation\{
    Session\Session,
    Request
};
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class GameController extends Controller
{
    /**
     * @Route(
     *     "/game",
     *     name="game_homepage"
     * )
     */
    public function indexAction()
    {
        if( ! $this->get( 'session' )->isStarted() )
        {
            $this->get( 'session' )->start();
            $this->get( 'session' )->set( 'points', 0 );
            $this->get( 'session' )->set(
                'deck',
                $this->get( 'game.deck' )
            );
        }

        return $this->render( 'game/index.html.twig' );
    }

    /**
     * @Route(
     *     "/check/{guess}",
     *     name = "game_check"
     * )
     *
     * @param String $guess
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function checkAction( $guess )
    {
        /**
         * @var Deck
         */
        $deck = $this->get( 'session' )->get( 'deck' );

        /**
         * @var Card
         */
        $current   = $deck->current();

        /**
         * @var Card
         */
        $next_card = $deck->next();

        /**
         * @var int
         */
        $compare_cards = $current->compareTo( $next_card );


        if( ( $guess === 'smaller' && $compare_cards > 0 )
            ||
            ( $guess === 'bigger'  && $compare_cards < 0 )
        ) {
            $this->get( 'session' )->set(
                'points',
                $this->get( 'session' )->get( 'points' ) + 1
            );

            $this->get( 'session' )->remove( 'deck' );

            $this->get( 'session' )->set(
                'deck',
                $deck
            );

            return $this->redirect( $this->generateUrl( 'game_homepage' ));
        }
        else {

            return $this->redirect( $this->generateUrl( 'game_over' ));
        }

    }

    /**
     * @Route(
     *     "/over",
     *     name = "game_over"
     * )
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function gameOverAction( Request $request )
    {
        /**
         * @var Request request
         */
        $request->getSession()->invalidate(1);

        return $this->render( 'game/game_over.html.twig' );

    }

}