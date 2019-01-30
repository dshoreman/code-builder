<?php

namespace Phpactor\CodeBuilder\Adapter\TolerantParser\Updater;

use Microsoft\PhpParser\Node;
use Microsoft\PhpParser\Node\Expression\Variable;
use Microsoft\PhpParser\Node\Expression\AssignmentExpression;
use Phpactor\CodeBuilder\Domain\Renderer;

abstract class ClassLikeUpdater
{
    /**
     * @var Renderer
     */
    protected $renderer;

    /**
     * @var MethodUpdater
     */
    protected $methodUpdater;

    public function __construct(Renderer $renderer)
    {
        $this->renderer = $renderer;
        $this->methodUpdater = new ClassMethodUpdater($renderer);
    }

    protected function resolvePropertyName(Node $property)
    {
        if ($property instanceof Variable) {
            return $property->getName();
        }

        if ($property instanceof AssignmentExpression) {
            return $this->resolvePropertyName($property->leftOperand);
        }

        throw new \InvalidArgumentException(sprintf(
            'Do not know how to resolve property element of type "%s"',
            get_class($property)
        ));
    }
}
