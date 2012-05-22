<?php

namespace Base\EJSTreeGridBundle\Framework;

/**
 * Data Formatter for JSON format
 *
 * @author Luis Diego Flores Villalobos
 */
class GridDataFormatter {
    /**
     * Data formatted
     * @var array Array containing data's formatted representation
     */
    private $data;

    function __construct(array $data = array()) {
        $this->data = $data;
    }

    /**
     * Sets data's formatted representation
     * @param array $data
     * @return \Gnd\EJSTreeGridBundle\Framework\GridDataFormatter Self for method chaining
     */
    public function setData(array $data) {
        $this->data = $data;

        return $this;
    }

    /**
     * Adds one row's information
     * @param array $row
     * @return \Gnd\EJSTreeGridBundle\Framework\GridDataFormatter Self for method chaining
     */
    public function addRow(array $row) {
        $this->data[] = $row;

        return $this;
    }

    /**
     * Adds one subrow's information
     * @param type $subRow The information of the subrow to add
     * @param type $level The level of the [sub]row parent to which add the subrow.
     *      I.e. This parameter is set according to the level of the parent, not the level of the subrow to create.
     *          Parent Row Level 1
     *              Parent Row Level 2
     *                  Parent Row Level 3
     *                      ...
     * @return \Gnd\EJSTreeGridBundle\Framework\GridDataFormatter Self for method chaining
     * @throws \InvalidArgumentException If either the level, i.e. The level is less than 1
     */
    public function addSubRow(array $subRow, $level = 1) {
        if ($level < 1) {
            throw new \InvalidArgumentException("Invalid level ($level). Level must be greater than or equal to 1.");
        }

        $parentRow = &$this->data;
        for ($i = 1; $i <= $level; ++$i) {
            $rowCount = isset($parentRow) && is_array($parentRow)
                ? count($parentRow)
                : 0;
            $rowIndex = $rowCount === 0 ? 0 : $rowCount - 1;
            $parentRow = &$parentRow[$rowIndex]['Items'];
        }
        $parentRow[] = $subRow;
        unset($parentRow);

        return $this;
    }

    /**
     * Returns the array representation of the formatted data of the table
     * @return type
     */
    public function getFormattedData() {
        return array(
            "Body" => array(
                $this->data
            )
        );
    }
}
