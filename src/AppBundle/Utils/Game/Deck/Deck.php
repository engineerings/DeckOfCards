<?php

declare (strict_types=1);

namespace AppBundle\Utils\Game\Deck;


use AppBundle\Utils\Game\Card\Card;
use AppBundle\Utils\Game\Card\CardContract;

class Deck implements \Iterator
{

    /**
     * @var array
     */
    protected $myCardList;

    /**
     * @var int
     */
    protected $myIndex = 0;

    /**
     * Deck constructor.
     * @throws \InvalidArgumentException
     */
    public function __construct()
    {
        $this->myCardList = array();


        for( $suit = CardContract::SPADES; $suit <= CardContract::HEARTS; $suit++ ) {

            for( $rank = 0; $rank <= 11; $rank++ ) {

                $this->myCardList[] = new Card( $suit, $rank );
            }
        }

        shuffle( $this->myCardList );
    }

    /**
     * Get the current element.
     *
     * @return CardContract
     */
    public function current() : CardContract
    {
        return $this->myCardList[ $this->myIndex ];
    }

    public function hasNext() : bool
    {
        return $this->myIndex < count( $this->myCardList );
    }

    /**
     * Get the next element if exist, if not return null.
     *
     * @return CardContract
     */
    public function next() : CardContract
    {
        if( $this->hasNext() ) {
            return $this->myCardList[ ++$this->myIndex ];
        }
        return NULL;
    }

    /**
     * Get the key of the current element.
     *
     * @return int
     */
    public function key() : int
    {
        return $this->myIndex;
    }

    /**
     * Checks if current position is valid
     *
     * @return bool|true on success or false on failure.
     */
    public function valid() : bool
    {
        return isset( $this->myCardList[ $this->key() ] );
    }

    /**
     * Rewind the Iterator to the first element
     *
     * @return int myIndex.
     */
    public function rewind() : int
    {
        return $this->myIndex = 0;
    }

    /**
     * Get myCardList
     *
     * @return array
     */
    public function getMyCardList() : array
    {
        return $this->myCardList;
    }

}