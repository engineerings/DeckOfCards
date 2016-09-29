<?php

declare (strict_types=1);

namespace AppBundle\Utils\Game\Card;


interface CardContract
{
    /**
     * @const SPADES
     */
    const SPADES = 0;

    /**
     *  @const CLUBS
     */
    const CLUBS = 1;

    /**
     * @const DIAMONDS
     */
    const DIAMONDS = 2;

    /**
     * @const HEARTS
     */
    const HEARTS = 3;

    /**
     * Get suit.
     *
     * @return int
     */
    public function getSuit() : int;

    /**
     * Get Rank.
     *
     * @return int
     */
    public function getRank() : int;

}