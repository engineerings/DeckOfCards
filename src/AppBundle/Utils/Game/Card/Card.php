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
     * Card constructor.
     *
     * @param int $suit
     * @param int $rank
     */
    public function __construct( int $suit, int $rank )
    {
        $this->mySuit = $suit;
        $this->myRank;
        $this->myName = self::RANKSTRINGS(
            $this->getRank()
            . ' of ' .
            $this->getSuit()
        );
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
        $this->myRank;
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

