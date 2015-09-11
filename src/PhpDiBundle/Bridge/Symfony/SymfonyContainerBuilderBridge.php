<?php
/**
 * @author     mfris
 * @license    Internal use only
 */

namespace PhpDiBundle\Bridge\Symfony;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * SymfonyContainerBuilderBridge - overrides the default symfony container builder
 * - indicates that the container has some services available in the php-di definitions
 *
 * @author  mfris
 * @package PhpDiBundle\Bridge\Symfony
 */
class SymfonyContainerBuilderBridge extends ContainerBuilder
{

    /**
     * @var array
     */
    private $definitions;

    /**
     * Constructor.
     *
     * @param ParameterBagInterface $parameterBag A ParameterBagInterface instance
     * @param array $diDefinitions
     *
     * @api
     */
    public function __construct(ParameterBagInterface $parameterBag = null, array $diDefinitions)
    {
        $this->definitions = $diDefinitions;
        parent::__construct($parameterBag);
    }

    /**
     * Returns true if the given service is defined.
     *
     * @param string $id The service identifier
     *
     * @return bool true if the service is defined, false otherwise
     */
    public function has($id)
    {
        return isset($this->definitions[$id]) || parent::has($id);
    }
}
