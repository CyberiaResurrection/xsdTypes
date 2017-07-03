<?php

namespace AlgoWeb\xsdTypes;

/**
 * The type xsd:ENTITIES represents a list of ENTITY values separated by whitespace.
 * There must be at least one ENTITY in the list. Each of the ENTITY values must match the name of an unparsed entity
 * that has been declared in a document type definition (DTD) for the instance.
 *
 * @package AlgoWeb\xsdTypes
 */
class xsENTITIES extends xsAnySimpleType
{
    /**
     * Construct
     *
     * @param xsENTITY $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->setMinLengthFacet(1);
    }

    protected function isOK()
    {
        if (!is_array($this->__value)) {
            throw new \InvalidArgumentException(
                "the provided value for " . __CLASS__ . " Must be an array of type xsENTITY "
            );
        }
        foreach ($this->__value as $v) {
            $v->isOKInternal();
        }
    }
}
