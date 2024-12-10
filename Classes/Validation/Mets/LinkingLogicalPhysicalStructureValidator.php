<?php

namespace Slub\Dfgviewer\Validation\Mets;

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

use DOMNode;
use Slub\Dfgviewer\Validation\ApplicationProfileBaseValidator;

/**
 * The validator validates against the rules outlined in chapter 2.3 of the METS application profile 2.3.1.
 *
 * @package TYPO3
 * @subpackage dfg-viewer
 *
 * @access public
 */
class LinkingLogicalPhysicalStructureValidator extends ApplicationProfileBaseValidator
{

    protected function isValid($value): void
    {
        $this->setupIsValid($value);

        $structLinks = $this->xpath->query('//mets:structLink');
        // Validates against the rules of chapter "2.3.1 Structure links - mets:structLink"
        if ($structLinks === false || $structLinks->length > 1) {
            $this->addError('Every METS file has to have no or one struct link element.', 1723727164447);
        } elseif ($structLinks->length == 1) {
            $this->validateLinkElements();
        }
    }

    /**
     * Validates the linking elements.
     *
     * Validates against the rules of chapter "2.3.2.1 Linking – mets:smLink"
     *
     * @return void
     */
    private function validateLinkElements(): void
    {
        $linkingElements = $this->xpath->query('//mets:structLink/mets:smLink');

        if ($linkingElements->length === 0) {
            $this->addError('There should be at least one "mets:smLink" under "mets:structLink".', 1723727164447);
        }

        foreach ($linkingElements as $linkingElement) {
            $this->validateLinkingElement($linkingElement, "xlink:from", "LOGICAL");
            $this->validateLinkingElement($linkingElement, "xlink:to", "PHYSICAL");
        }

    }

    /**
     * Validate linking element.
     *
     * @param DOMNode $linkingElement
     * @param string $attribute
     * @param string $structMapType
     * @return void
     */
    private function validateLinkingElement(DOMNode $linkingElement, string $attribute, string $structMapType): void
    {
        if (!$linkingElement->hasAttribute($attribute)) {
            $this->addError('Mandatory "' . $attribute . ' attribute of mets:div in the logical structure is missing.', 1724234607);
        } else {
            $id = $linkingElement->getAttribute($attribute);
            $structMaps = $this->xpath->query('//mets:structMap[@TYPE="' . $structMapType . '"]');
            $foundElements = 0;
            foreach ($structMaps as $structMap) {
                $foundElements += $this->xpath->query('//mets:div[@ID = \'' . $id . '\']', $structMap)->length;
            }
            if ($foundElements !== 1) {
                $this->addError('None or multiple ids found for "' . $id . '" in struct map type "' . $structMapType . '".', 1724234607);
            }
        }
    }
}