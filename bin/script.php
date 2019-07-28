#!/usr/bin/php
<?php
require_once __DIR__ . '/../vendor/autoload.php';

use splitbrain\phpcli\CLI;
use splitbrain\phpcli\Options;

class Script extends CLI
{
    // register options and arguments
    protected function setup(Options $options)
    {

        // options
        $options->registerOption('controller', 'Create a controller followed by <name-controller>', 'c');
        $options->registerOption('model', 'Create a model followed by <name-model>', 'm');
        $options->registerOption('view', 'Create a view followed by <name-view>', 'v');


        // arguments
        $options->registerArgument('argument', 'Name of the Model / Controller / View');


    }

    // implement your code
    protected function main(Options $options)
    {
        if ($options->getOpt('model')) {
            $model = ucfirst(strtolower($options->getArgs()[0]));

            $pathTemplate = dirname(__DIR__).DIRECTORY_SEPARATOR.'bin'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR;
            $path = dirname(__DIR__).DIRECTORY_SEPARATOR.'App'.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR;
            $pathComposer = dirname(__DIR__).DIRECTORY_SEPARATOR;

            if(!is_dir($path.$model)){
                mkdir($path.$model, 0755, true);

                //Model
                $fichier = fopen($path.$model.DIRECTORY_SEPARATOR.$model.'.php', 'w');
                $modelContent = file_get_contents($pathTemplate.'templateModel.php');
                $modelContent = str_replace("TemplateModel" ,$model, $modelContent);
                fwrite($fichier, $modelContent);
                fclose($fichier);

                //ModelRepository
                $fichier = fopen($path.$model.DIRECTORY_SEPARATOR.$model.'Repository.php', 'w');
                $modelRepoContent = file_get_contents($pathTemplate.'templateModelRepository.php');
                $modelRepoContent = str_replace("TemplateModel", $model, $modelRepoContent);
                fwrite($fichier, $modelRepoContent);
                fclose($fichier);

                //utiliser json_decode pour modifier le fichier compser.json
                $fileJson = file_get_contents($pathComposer.'composer.json');
                $composerJson = json_decode($fileJson, true);
                $composerJson["autoload"]["psr-4"]["App\\".$model.'\\'] = 'App/models/'.$model.'/';
                $fichier = fopen($pathComposer.'composer.json', 'w');
                fwrite($fichier, str_replace('\/', '/', json_encode($composerJson, JSON_PRETTY_PRINT)));
                fclose($fichier);

                $this->info('Model successfully created'.PHP_EOL.PHP_EOL.$model.'.php file created here : App/models/'.$model.'/'.$model.'.php'.PHP_EOL.$model.'Repository.php file created here : App/models/'.$model.'/'.$model.'Repository.php');

            }else{
                $this->info('This model already exists');
            }

        }else {
            $this->info($options->help());
        }
    }
}
// execute it
$cli = new Script();
$cli->run();
