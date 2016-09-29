<?php

declare (strict_types=1);

namespace AppBundle\Utils\Game\Display\Type;


use AppBundle\Utils\Game\Card\Card;

class TextDisplayer implements DisplayerContract
{

    /**
     * Get card on text format.
     *
     * @param Card $card
     * @return string
     */
    public function show( Card $card ) : string
    {
        return $card->toString();
    }
}