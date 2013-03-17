<?php

namespace SclZfPages\Formatter;

/**
 * Treats the content as HTML.
 *
 * @author <tom@scl.co.uk>
 */
class Html implements FormatterInterface
{
    /**
     * {@inheritDoc}
     *
     * @param  string $content
     * @return string
     */
    public function format($content)
    {
        return $content;
    }
}
