<?php

namespace Exercise\Sendgrid\Marketing\Command;

use Guzzle\Http\QueryAggregator\DuplicateAggregator;
use Guzzle\Service\Command\OperationCommand;

class DuplicateAggregatorCommand extends OperationCommand
{
    /**
     * {@inheritedDoc}
     */
    protected function build()
    {
        parent::build();
        $this->request->getPostFields()->setAggregator(new DuplicateAggregator());
    }
}
