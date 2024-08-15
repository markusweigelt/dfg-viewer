<?php

namespace Slub\Dfgviewer\Validation;

use DOMXPath;
use Kitodo\Dlf\Validation\BaseValidator;

class LogicalStructureValidator extends BaseValidator {

    private $xpath = null;

    public function __construct()
    {
        // sudo apt-get update
        // sudo apt install default-jdk
        parent::__construct(\DOMDocument::class);
    }

    protected function isValid($value)
    {
        $this->xpath = new DOMXPath($value);
        $logicalStructures = $this->xpath->query('//mets:structMap[@TYPE="LOGICAL"]');
        if (count($logicalStructures) == 0) {
            $this->addError('Every METS file has to have at least one logical structural element.',1723727164447);
        }

        $physicalStructures = $this->xpath->query('//mets:structMap[@TYPE="PHYSICAL"]');
        if (count($physicalStructures) > 1) {
            $this->addError('A document may only have one physical structure.',1723728177);
        }
    }

}
