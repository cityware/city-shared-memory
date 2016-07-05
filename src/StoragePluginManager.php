<?php

namespace Cityware\MemoryShared;

use Zend\ServiceManager\AbstractPluginManager;

class StoragePluginManager extends AbstractPluginManager {

    /**
     * Default set of storage
     *
     * @var array
     */
    protected $invokableClasses = array(
        'apc' => 'Cityware\MemoryShared\Storage\Apc',
        'db' => 'Cityware\MemoryShared\Storage\Db',
        'file' => 'Cityware\MemoryShared\Storage\File',
        //'file_ftp'    => 'Cityware\MemoryShared\Storage\FileFtp',
        'memcached' => 'Cityware\MemoryShared\Storage\Memcached',
        //'redis'       => 'Cityware\MemoryShared\Storage\Redis',
        'segment' => 'Cityware\MemoryShared\Storage\Segment',
        'bloc' => 'Cityware\MemoryShared\Storage\Bloc',
        'session' => 'Cityware\MemoryShared\Storage\Session',
        'zendshmcache' => 'Cityware\MemoryShared\Storage\ZendShmCache',
        'zendshm' => 'Cityware\MemoryShared\Storage\ZendShmCache',
        'zenddiskcache' => 'Cityware\MemoryShared\Storage\ZendDiskCache',
        'zenddisk' => 'Cityware\MemoryShared\Storage\ZendDiskCache',
    );

    /**
     * Validate the plugin
     *
     * Checks that the adapter loaded is an instance
     * of Storage\StorageInterfaceInterface.
     *
     * @param  mixed $plugin
     * @return void
     * @throws Exception\RuntimeException if invalid
     */
    public function validatePlugin($plugin) {
        if ($plugin instanceof Storage\StorageInterface) {
            // we're okay
            return;
        }

        throw new Storage\Exception\RuntimeException(sprintf(
                'Plugin of type %s is invalid; must implement %s\Storage\StorageInterfaceInterface', (is_object($plugin) ? get_class($plugin) : gettype($plugin)), __NAMESPACE__
        ));
    }

}
