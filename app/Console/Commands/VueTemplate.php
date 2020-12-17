<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class VueTemplate extends GeneratorCommand
{
    //protected $signature = 'command:name';
    protected $name = 'make:vue-template';
    
    protected $description = 'Create a new Vue template';

    protected $type = 'Vue template';

    protected function getStub()
    {
        return __DIR__ . '/../stubs/vue-template.stub';
    }
    
    protected function alreadyExists($rawName)
    {
        $name = class_basename(str_replace('\\', '/', $rawName));

        $path = "{$this->laravel['path']}/../resources/js/components/{$name}.vue";

        return file_exists($path);
    }

    protected function replaceNamespace(&$stub, $name)
    {
        $name = class_basename(str_replace('\\', '/', $name));

        $stub = str_replace('{Component}', $name, $stub);

        return $this;
    }

    protected function getPath($name)
    {
        $name = class_basename(str_replace('\\', '/', $name));

        return "{$this->laravel['path']}/../resources/js/components/{$name}.vue";
    }

}
