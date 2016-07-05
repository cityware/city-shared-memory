<?php

namespace Cityware\MemoryShared\Storage\Feature;

interface CapacityStorageInterface {

    /**
     * Get max bloc allow
     * @return int
     */
    public function canAllowBlocsMemory($numBloc);
}
