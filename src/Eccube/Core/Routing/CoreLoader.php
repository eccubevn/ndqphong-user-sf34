<?php
namespace Eccube\Core\Routing;

class CoreLoader extends \Symfony\Component\Config\Loader\Loader
{
    const TYPE = 'core';

    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected $container;

    /**
     * @var \Symfony\Component\Routing\Loader\YamlFileLoader
     */
    protected $yamlFileLoader;

    /**
     * RouterLoader constructor.
     *
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
     * @param \Symfony\Component\Routing\Loader\YamlFileLoader $yamlFileLoader
     */
    public function __construct(
        \Symfony\Component\DependencyInjection\ContainerInterface $container,
        \Symfony\Component\Routing\Loader\YamlFileLoader $yamlFileLoader
    ) {
        $this->container = $container;
        $this->yamlFileLoader = $yamlFileLoader;
    }

    /**
     * {@inheritdoc}
     *
     * @param mixed $resource
     * @param null $type
     *
     * @return \Symfony\Component\Routing\RouteCollection
     */
    public function load($resource, $type = null)
    {
        $collection = new \Symfony\Component\Routing\RouteCollection();

        $fs = new \Symfony\Component\Filesystem\Filesystem();
        $bundles = $this->container->getParameter('kernel.bundles');
        foreach ($bundles as $bundle) {
            $configFile = $this->getRouteConfigFile($bundle);
            if (!$configFile || !$fs->exists($configFile)) {
                continue;
            }

            $collection->addCollection($this->yamlFileLoader->load($configFile));
        }

        return $collection;
    }

    /**
     * Get route config from namespace
     *
     * @param $namespace
     *
     * @return string
     */
    protected function getRouteConfigFile($namespace)
    {
        list($cop, $name) = explode("\\", $namespace);
        if (!isset($cop) || !isset($name)) {
            return '';
        }

        return SRC_PATH . $cop . DS . $name . DS . 'Resources' . DS . 'config' . DS . 'routing.yml';
    }

    /**
     * {@inheritdoc}
     *
     * @param mixed $resource
     * @param null $type
     *
     * @return bool
     */
    public function supports($resource, $type = null)
    {
        return $type === static::TYPE;
    }
}