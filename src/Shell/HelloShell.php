<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Shell;

use Cake\Console\Shell;

class HelloShell extends Shell
{
    public function main() //called when no other commangds or args given to a shell.
    {
        $this->out('Hello world.'); //main() not use positional args, first positional arg interpreted as cmd name
    }

    public function heyThere($name = 'Anonymous') // underscored shell args transformed to camel method
    {
        $this->out('Hey there ' . $name); 
    }
}

class UserShell extends Shell //app business logic in shell util, load models in shell
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Users');
    }

    public function show()
    {
        if(empty($this->args[0])) {
            return $this->error('Please enter a username.');
        }
        $user = $this->Users->findByUsername($this->args[0])->first();
        $this->out(print_r($user, true));
    }

    public $tasks = ['Template']; //extract cmds into classes, re-useable classes shared across shells, ie 'bake'
}

