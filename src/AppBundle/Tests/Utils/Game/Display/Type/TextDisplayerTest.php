<?php

declare (strict_types=1);

namespace AppBundle\Utils\Game\Display\Type;


use AppBundle\Utils\Game\Card\Card;
use AppBundle\Utils\Game\Display\Type\TextDisplayer;

class TextDisplayerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function correctly_show_card_to_string()
    {

        $card_obj = new Card( 1, 1 ); // three of clubs
        $text_displayer_obj = new TextDisplayer();

        $this->assertEquals(
            'three of clubs',
            $text_displayer_obj->show( $card_obj ),
            'TextDisplayer show does not correctly print cart name'
        );

    }
}