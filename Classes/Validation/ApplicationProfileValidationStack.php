<?php

declare(strict_types=1);

namespace Slub\Dfgviewer\Validation;

use Kitodo\Dlf\Validation\BaseValidationStack;

class ApplicationProfileValidationStack extends BaseValidationStack {

    public function __construct(array $options = [])
    {
        parent::__construct(\DOMDocument::class, $options);

        $this->addValidationItem(LogicalStructureValidator::class, "Specifications for the logical document structure", false);
        $this->addValidationItem(PhysicalStructureValidator::class, "Specifications for the logical document structure", false);

    }

}
