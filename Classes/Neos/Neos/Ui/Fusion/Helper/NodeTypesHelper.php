<?php
namespace Neos\Neos\Ui\Fusion\Helper;

use Neos\Flow\Annotations as Flow;
use Neos\Eel\ProtectedContextAwareInterface;
use Neos\Neos\Service\NodeTypeSchemaBuilder;

class NodeTypesHelper implements ProtectedContextAwareInterface
{

    /**
     * @Flow\Inject
     * @var NodeTypeSchemaBuilder
     */
    protected $nodeTypeSchemaBuilder;

    protected $nodeTypeSchema;

    protected function getNodeTypeSchema()
    {
        if (!$this->nodeTypeSchema) {
            $this->nodeTypeSchema = $this->nodeTypeSchemaBuilder->generateNodeTypeSchema();
        }
        return $this->nodeTypeSchema;
    }

    public function nodeTypesByName()
    {
        return $this->getNodeTypeSchema()['nodeTypes'];
    }

    public function nodeTypeConstraints()
    {
        return $this->getNodeTypeSchema()['constraints'];
    }

    public function nodeTypeInheritanceMap()
    {
        return $this->getNodeTypeSchema()['inheritanceMap'];
    }


    /**
     * @param string $methodName
     * @return boolean
     */
    public function allowsCallOfMethod($methodName)
    {
        return true;
    }
}
