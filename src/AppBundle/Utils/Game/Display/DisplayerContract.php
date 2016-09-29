<?php

declare (strict_types=1);

namespace AppBundle\Utils\Game\Display;

use AppBundle\Utils\Game\Card\Card;

interface DisplayerContract
{
    /**
     * Show card.
     *
     * @param Card $card
     * @return string
     */
    public function show( Card $card ) : string ;
}