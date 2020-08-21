<?php

namespace Eccube2\Composer\Installers;

use Composer\Installers\BaseInstaller;

class Eccube2Installer extends BaseInstaller
{
    protected $locations = array(
        'plugin' => 'data/downloads/plugin/{$name}/',
        'module' => 'data/downloads/module/{$name}/',
        'template' => 'data/Smarty/templates/{$name}/',
    );

    /**
     * Format package name to CamelCase
     */
    public function inflectPackageVars($vars)
    {
        if ($this->package->getType() === 'eccube2-module' || $this->package->getType() === 'eccube2-template') {
            return $vars;
        }

        // eccube2-plugin
        $nameParts = explode('/', $vars['name']);
        foreach ($nameParts as &$value) {
            $value = strtolower(preg_replace('/(?<=\\w)([A-Z])/', '_\\1', $value));
            $value = str_replace(array('-', '_'), ' ', $value);
            $value = str_replace(' ', '', ucwords($value));
        }
        $vars['name'] = implode('/', $nameParts);

        return $vars;
    }
}
