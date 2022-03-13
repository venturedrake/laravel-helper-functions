<?php

namespace Illuminated\Helpers\Tests\debug;

use Illuminated\Helpers\Tests\TestCase;

class MinimizedBacktraceAsStringTest extends TestCase
{
    /** @test */
    public function it_returns_minimized_backtrace_as_string()
    {
        $pattern = file_get_contents(__DIR__ . '/MinimizedBacktraceAsStringTest/pattern.txt');
        $backtrace = $this->getBacktrace();

        $this->assertMatchesRegularExpression("/{$pattern}/m", $backtrace);
    }

    /**
     * This method is used to simply add calls in the backtrace.
     */
    private function getBacktrace(): string
    {
        return $this->anotherExtraMethod();
    }

    /**
     * This method is used to simply add calls in the backtrace.
     */
    private function anotherExtraMethod(): string
    {
        return minimized_backtrace_as_string();
    }
}
