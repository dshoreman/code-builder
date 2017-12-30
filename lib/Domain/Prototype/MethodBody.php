<?php

namespace Phpactor\CodeBuilder\Domain\Prototype;

final class MethodBody extends Prototype
{
    /**
     * @var Lines
     */
    private $lines;

    private function __construct(Lines $lines = null)
    {
        $this->lines = $lines;
    }

    public static function fromLines(array $lines): MethodBody
    {
        return new self(Lines::fromLines($lines));
    }

    public static function empty(): MethodBody
    {
        return new self(Lines::empty());
    }

    public static function none()
    {
        return new self();
    }

    public function lines(): Lines
    {
        return $this->lines;
    }
}
