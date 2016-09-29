<?php

declare (strict_types=1);

namespace AppBundle\Tests\Utils\Game\Card;


use AppBundle\Utils\Game\Card\Card;
use \ReflectionClass;

class CardTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function correctly_create_class_card()
    {
        $cardObj = new Card( 1, 1 );
        $card = 'Card';

        $this->assertEquals(
            $card,
            (new ReflectionClass($cardObj))->getShortName(),
            'Instance does not return correct class name'
        );

    }

    /**
     * @test
     */
    public function correctly_return_suit_number()
    {
        // phpunit -c app src/AppBundle/Tests/Utils/Game/Card
        $cardObj = new Card( 1, 1 );

        $this->assertEquals(
          1,
          $cardObj->getRank(),
          'Card does not return correct suit value'
        );
    }

    /**
     * @test
     */
    public function correctly_return_rank_number()
    {
        $cardObj = new Card( 1, 1 );

        $this->assertEquals(
          1,
          $cardObj->getRank(),
          'Card does not return correct rank number'
        );
    }

    /**
     * @test
     */
    public function correctly_return_card_name()
    {
        $cardObj = new Card( 0, 0 );
        $card_name = 'two of spades';

        $this->assertEquals(
          $card_name,
          $cardObj->toString(),
          'Card does not return correct name'
        );
    }

    /**
     * @test
     */
    public function correctly_compare_cards()
    {

        $card_one = new Card( 0, 0 );
        $card_two = new Card( 0, 0 );

        $this->assertEquals(
          0,
          $card_one->compareTo($card_two),
          'Card does not compare correctly two objects'
        );

    }





}