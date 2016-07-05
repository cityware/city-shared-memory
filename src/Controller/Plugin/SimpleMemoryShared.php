<?php

namespace Cityware\MemoryShared\Controller\Plugin;

use Cityware\MemoryShared\MemorySharedManager;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class CitywareMemoryShared extends AbstractPlugin {

    /**
     * Memory shared manager
     * @var MemorySharedManager
     */
    protected $manager;

    public function __invoke($storage = null, $options = null) {
        if (null === $storage) {
            return $this->getMemorySharedManager();
        }
        return $this->getMemorySharedManager()->setStorage($storage, $options);
    }

    public function getMemorySharedManager() {
        if (null === $this->manager) {
            throw new \InvalidArgumentException('Memory shared manager must be injected.');
        }
        return $this->manager;
    }

    public function setMemorySharedManager(MemorySharedManager $manager) {
        $this->manager = $manager;
    }

}
