<?php

declare (strict_types=1);

namespace AppBundle\Utils\Game\Pile;

use AppBundle\Utils\Game\Display\DisplayerContract;

interface PileContract
{

    /**
     * Get top card.
     *
     * @return PileContract
     */
    public function viewTopCard() : PileContract;

    /**
     * Remove top card.
     */
    public function removeTopCard() : void;

    /**
     * Add card.
     *
     * @param PileContract $card
     * @return bool
     */
    public function addCard( PileContract $card ) : bool;

    /**
     * Display.
     *
     * @param DisplayerContract $displayer
     */
    public function display( DisplayerContract $displayer ) :  void;

}