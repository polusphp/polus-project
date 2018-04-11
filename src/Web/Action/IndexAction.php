<?php

namespace Web\Action;

use Polus\Adr\AbstractAction;
use Web\Responder\IndexResponder;

class IndexAction extends AbstractAction
{
    protected $responder = IndexResponder::class;
}
