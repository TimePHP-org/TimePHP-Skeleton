#!/usr/bin/php
<?php
require __DIR__ . '/../vendor/autoload.php';

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

            $path = dirname(__DIR__).DIRECTORY_SEPARATOR.'App'.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR;
            $pathComposer = dirname(__DIR__).DIRECTORY_SEPARATOR;

            if(!is_dir($path.$model)){
                mkdir($path.$model, 0755, true);

                //Model
                $fichier = fopen($path.$model.DIRECTORY_SEPARATOR.$model.'.php', 'w');
                $modelContent = implode(PHP_EOL, [
                    '<?php',
                    'namespace App\\'.$model.';',
                    '',
                    'class '.$model.' {',
                    '',
                    '   //Put the different attributes here as private attributes',
                    '',
                    '   public function __construct(array $arrayOfValues = null){',
                    '       if($arrayOfValues != null){',
                    '           $this->hydrate($arrayOfValues);',
                    '       }',
                    '   }',
                    '',
                    '   public function hydrate(array $donnees){',
                    '       foreach($donnees as $key => $value){,',
                    '           $method = "set".ucfirst($key);',
                    '           if(method_exists($this,$method)){',
                    '               $this->$method($value);',
                    '           }',
                    '       }',
                    '   }',
                    '',
                    '   //Getters and Setters',
                    '}',
                ]);
                fwrite($fichier, $modelContent);
                fclose($fichier);

                //ModelRepository
                $fichier = fopen($path.$model.DIRECTORY_SEPARATOR.$model.'Repository.php', 'w');
                $modelRepoContent = implode(PHP_EOL, [
                    '<?php',
                    'namespace App\\'.$model.';',
                    '',
                    'use PDO;',
                    'use App\\'.$model.'\\'.$model.';',
                    'use App\\Repository\\Repository;',
                    '',
                    'class '.$model.'Repository {',
                    '',
                    '   private $db;',
                    '',
                    '   public function __construct(Repository $db){',
                    '       $this->db = $db;',
                    '   }',
                    '',
                    '   //Put the different functions here as public functions',
                    '',
                    '}',
                ]);
                fwrite($fichier, $modelRepoContent);
                fclose($fichier);



                //utiliser json_decode pour modifier le fichier compser.json
                $fileJson = file_get_contents($pathComposer.'composer.json');
                $composerJson = json_decode($fileJson, true);
                $composerJson["autoload"]["psr-4"]["App\\".$model.'\\'] = 'App/models/'.$model.'/';


                $fichier = fopen($pathComposer.'composer.json', 'w');
                fwrite($fichier, str_replace('\/', '/', json_encode($composerJson, JSON_PRETTY_PRINT)));
                fclose($fichier);



                // echo json_encode($composerJson, JSON_PRETTY_PRINT);


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
