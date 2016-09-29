<?php

declare (strict_types=1);

namespace AppBundle\Utils\Game\Card;


interface CardContract
{
    /**
     * @const SPADES
     */
    public const SPADES = 0;

    /**
     * @const HEARTS
     */
    public const HEARTS = 1;

    /**
     * @const DIAMONDS
     */
    public const DIAMONDS = 2;

    /**
     *  @const CLUBS
     */
    public const CLUBS = 3;

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