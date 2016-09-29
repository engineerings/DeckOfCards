<?php

declare (strict_types=1);

namespace AppBundle\Tests\Utils\Game\Deck;


use AppBundle\Utils\Game\Deck\Deck;
use AppBundle\Utils\Game\Card\Card;

class DeckTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function correctly_return_current_card_from_deck()
    {
        $deck_obj = new Deck();
        $card_obj = $deck_obj->current();

        $this->assertInstanceOf(
            Card::class,
            $card_obj,
            'Object is not current instance of class Card'
        );

    }

    /**
     * @test
     */
    public function correctly_return_bool_if_deck_has_more_elem()
    {
        $deck_obj = new Deck();

        $this->assertTrue(
          true,
          $deck_obj->hasNext(),
          'Deck hasNext does not return correctly boolean'
        );
    }

    /**
     * @test
     */
    public function correctly_return_next_card_class_from_deck()
    {
        $deck_obj = new Deck();
        $card_obj = $deck_obj->next();

        $this->assertInstanceOf(
          Card::class,
          $card_obj,
          'Object is not instance of class Card'
        );

        $this->assertSame(
          $deck_obj->current(),
          $card_obj,
          'Deck object are not the same'
        );
    }

    /**
     * @test
     */
    public function correctly_return_key_position()
    {
        $deck_obj = new Deck();
        $deck_obj->rewind();

        $this->assertEquals(
            0,
            $deck_obj->key(),
            'Deck does not return correctly current index'
        );
    }

    /**
     * @test
     */
    public function correctly_return_valid_key()
    {
        $deck_obj = new Deck();
        $deck_obj->rewind();
        if( $deck_obj->hasNext() ) {
            $deck_obj->next();
        }

        $this->assertEquals(
            1,
            $deck_obj->key(),
            'Deck valid, current key is on bad position'
        );
    }

    /**
     * @test
     */
    public function correctly_rewind_index_to_zero()
    {
        $deck_obj = new Deck();
        if( $deck_obj->hasNext() ) {
            $deck_obj->next();
        }
        $deck_obj->rewind();

        $this->assertEquals(
          0,
          $deck_obj->key(),
          'Deck rewind does not reset correctly index to zero'
        );
    }

}