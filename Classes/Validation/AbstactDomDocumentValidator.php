<?php

namespace Slub\Dfgviewer\Validation;

/**
 * Copyright notice
 *
 * (c) Saxon State and University Library Dresden <typo3@slub-dresden.de>
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 */

use DOMDocument;
use DOMNode;
use DOMXPath;
use Kitodo\Dlf\Validation\AbstractDlfValidator;
use Slub\Dfgviewer\Validation\Dom\DomNodeListValidator;
use Slub\Dfgviewer\Validation\Dom\DomNodeValidator;

abstract class AbstactDomDocumentValidator extends AbstractDlfValidator
{
    protected DOMXpath $xpath;

    public function __construct()
    {
        parent::__construct(DOMDocument::class);
    }

    protected function isValid($value): void
    {
        $this->xpath = new DOMXPath($value);
        $this->isValidDocument();
    }

    protected function createNodeListValidator(string $expression, ?DOMNode $contextNode = null): DomNodeListValidator
    {
        return new DomNodeListValidator($this->xpath, $this->result, $expression, $contextNode);
    }

    protected function createNodeValidator(?DOMNode $node): DomNodeValidator
    {
        return new DomNodeValidator($this->xpath, $this->result, $node);
    }

    protected abstract function isValidDocument();

}