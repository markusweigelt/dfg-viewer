<?php

declare(strict_types=1);

/*
 * (c) Kitodo. Key to digital objects e.V. <contact@kitodo.org>
 *
 * This file is part of the Kitodo and TYPO3 projects.
 *
 * @license GNU General Public License version 3 or later.
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Slub\Dfgviewer\Validation;

use Kitodo\Dlf\Validation\BaseValidationStack;

class ApplicationProfileValidationStack extends BaseValidationStack {

    public function __construct(array $options = [])
    {
        parent::__construct(\DOMDocument::class, $options);

        $this->addValidationItem(LogicalStructureValidator::class, "Specifications for the logical document structure", false);

    }

}
