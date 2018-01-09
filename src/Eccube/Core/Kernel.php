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

}