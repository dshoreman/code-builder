<?php

namespace Phpactor\CodeBuilder\Domain;

use Phpactor\CodeBuilder\Domain\Prototype\Prototype;
use Phpactor\CodeBuilder\Domain\Code;

interface Generator
{
    public function generate(Prototype $prototype): Code;
}