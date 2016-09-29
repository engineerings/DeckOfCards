<?php

declare (strict_types=1);

namespace AppBundle\Utils\Game\Card;


class Card implements CardContract
{
    /**
     * @var int
     */
    private $mySuit;

    /**
     * @var int
     */
    private $myRank;

    /**
     * @var String
     */
    private $myName;

    /**
     * @const array RANKSTRINGS
     */
    const RANKSTRINGS = array(
        'two','three','four','five',
        'six','seven','eight','nine','ten',
        'jack','queen','king'
    );

    /**
     * @const array SUITSTRINGS
     */
    const SUITSTRINGS = array(
        'spades', 'clubs', 'diamonds', 'hearts'
    );

    /**
     * Card constructor.
     *
     * @param int $suit
     * @param int $rank
     * @throws \InvalidArgumentException
     */
    public function __construct( int $suit, int $rank )
    {
        if (!in_array($suit, array(self::SPADES, self::CLUBS, self::DIAMONDS, self::HEARTS))) {
            throw new \InvalidArgumentException('Bad Card Suit');
        }

        if( $rank < 0 || $rank > 11)
        {
            throw new \InvalidArgumentException('Bad Card Rank, enter from 0 to 11');
        }

        $this->mySuit = $suit;
        $this->myRank = $rank;
        $this->myName =
            self::RANKSTRINGS[ $this->getRank() ]
            . ' of ' .
            self::SUITSTRINGS[ $this->getSuit() ];

    }

    /**
     * Get suit.
     *
     * @return int
     */
    public function getSuit() : int
    {
        return $this->mySuit;
    }

    /**
     * Get Rank.
     *
     * @return int
     */
    public function getRank() : int
    {
        return $this->myRank;
    }

    /**
     * Get myName.
     *
     * @return string
     */
    public function toString() : string
    {
        return $this->myName;
    }

    /**
     * Compare to other.
     *
     * @param CardContract $card
     * @return int
     */
    public function compareTo( CardContract $card ) : int
    {
        $rankDiff = (int)($this->getRank() - $card->getRank());
        if( $rankDiff === 0 ) {
            return $this->getSuit() - $card->getSuit();
        }
        else {
            return $rankDiff;
        }
    }
}

