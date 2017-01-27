<?php

namespace PlentyConnector\Connector\ValueObject\Identity;

use Assert\Assertion;

/**
 * Class Identity.
 */
class Identity implements IdentityInterface
{
    /**
     * Identifier of the object.
     *
     * @var string
     */
    private $objectIdentifier;

    /**
     * TransferObject type.
     *
     * @var string
     */
    private $objectType;

    /**
     * Identifier inside the adapter domain.
     *
     * @var string
     */
    private $adapterIdentifier;

    /**
     * Adapter name.
     *
     * @var string
     */
    private $adapterName;

    /**
     * Identity constructor.
     *
     * @param string $objectIdentifier
     * @param string $objectType
     * @param string $adapterIdentifier
     * @param string $adapterName
     */
    private function __construct($objectIdentifier, $objectType, $adapterIdentifier, $adapterName)
    {
        Assertion::string($objectIdentifier);
        Assertion::notBlank($objectIdentifier);
        Assertion::string($objectType);
        Assertion::notBlank($objectType);
        Assertion::string($adapterIdentifier);
        Assertion::notBlank($adapterIdentifier);
        Assertion::string($adapterName);
        Assertion::notBlank($adapterName);

        $this->objectIdentifier = $objectIdentifier;
        $this->objectType = $objectType;
        $this->adapterIdentifier = $adapterIdentifier;
        $this->adapterName = $adapterName;
    }

    /**
     * {@inheritdoc}
     */
    public static function fromArray(array $params = [])
    {
        Assertion::allInArray(array_keys($params), [
            'objectIdentifier',
            'objectType',
            'adapterIdentifier',
            'adapterName',
        ]);

        return new self(
            $params['objectIdentifier'],
            $params['objectType'],
            $params['adapterIdentifier'],
            $params['adapterName']
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getObjectIdentifier()
    {
        return $this->objectIdentifier;
    }

    /**
     * {@inheritdoc}
     */
    public function getObjectType()
    {
        return $this->objectType;
    }

    /**
     * {@inheritdoc}
     */
    public function getAdapterIdentifier()
    {
        return $this->adapterIdentifier;
    }

    /**
     * {@inheritdoc}
     */
    public function getAdapterName()
    {
        return $this->adapterName;
    }
}
