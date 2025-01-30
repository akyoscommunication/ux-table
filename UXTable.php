<?php

namespace Akyos\UXTable;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class UXTable extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);
    }
}
