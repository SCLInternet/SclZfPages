<?php

namespace SclZfPages\Formatter;

use Zend\Filter\StaticFilter;

/**
 * Treats the content as PlainText.
 *
 * @author <tom@scl.co.uk>
 */
class PlainText implements FormatterInterface
{
    /**
     * {@inheritDoc}
     *
     * @param  string $content
     * @return string
     */
    public function format($content)
    {
        return StaticFilter::execute($content, 'HtmlEntities');
    }
}
