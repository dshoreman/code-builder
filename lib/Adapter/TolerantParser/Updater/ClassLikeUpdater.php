<?php

namespace Phpactor\CodeBuilder\Adapter\TolerantParser\Updater;

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
}
