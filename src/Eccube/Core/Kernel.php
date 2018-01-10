<?php
namespace Eccube\Core;

class Kernel extends \Symfony\Component\HttpKernel\Kernel
{
    /**
     * {@inheritdoc}
     *
     * @return \Symfony\Component\HttpKernel\Bundle\BundleInterface[]
     */
    public function registerBundles()
    {
        return [
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Symfony\Bundle\TwigBundle\TwigBundle(),
            new \Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new \Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new \Eccube\Core\CoreBundle(),
            new \Eccube\User\UserBundle(),
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @param \Symfony\Component\Config\Loader\LoaderInterface $loader
     */
    public function registerContainerConfiguration(\Symfony\Component\Config\Loader\LoaderInterface $loader)
    {
        $loader->load(CONFIG_PATH . 'config.yml');
    }

    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function getCacheDir()
    {
        return VAR_PATH . 'cache' . DS . $this->getEnvironment();
    }

    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function getLogDir()
    {
        return VAR_PATH . 'logs' . DS . $this->getEnvironment();
    }
}