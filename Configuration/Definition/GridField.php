<?php
namespace Atompulse\Component\Grid\Configuration\Definition;

use Atompulse\Component\Domain\Data\DataContainer;
use Atompulse\Component\Domain\Data\DataContainerInterface;

/**
 * Class GridField
 * @package Atompulse\Component\Grid\Configuration\Definition
 *
 * @author Petru Cojocar <petru.cojocar@gmail.com>
 *
 * @property string name
 * @property boolean visible
 * @property string type
 * @property string label
 * @property boolean sort
 * @property string render
 * @property string css
 * @property string cell_css
 * @property string width
 * @property string scope
 */
class GridField implements DataContainerInterface
{
    use DataContainer;

    const FIELD_TYPE_STRING = 'string';
    const FIELD_TYPE_NUMBER = 'number';
    const FIELD_TYPE_VIRTUAL = 'virtual';
    const FIELD_TYPE_ACTIONS = 'actions';

    /**
     * @param array $field
     * @throws \Atompulse\Component\Domain\Data\Exception\PropertyValueNotValidException
     */
    public function __construct(array $field = [])
    {
        $this->validProperties = [
            'name' => 'string',
            'visible' => 'boolean|null',
            'type' => 'string|null',
            'label' => 'string|null',
            'sort' => 'boolean|null',
            'render' => 'string|null',
            'header_css' => 'string|null',
            'cell_css' => 'string|null',
            'width' => 'string|null',
            'scope' => 'string|null',
        ];

        $this->defaultValues = [
            'visible' => true,
            'type' => GridField::FIELD_TYPE_STRING,
            'sort' => false,
            'render' => null,
            'header_css' => null,
            'cell_css' => null,
            'width' => '',
        ];

        $this->setPropertyNotValidErrorMessage('GridField property ["%s"] not supported');

        if ($field !== null) {
            return $this->fromArray($field, false);
        }

        return $this;
    }

}
