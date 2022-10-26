<?php
namespace Deployer;

require 'recipe/symfony.php';

// Config

set('repository', 'https://github.com/Dmaina5054/sleepingsymfony');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('10.18.7.68')
    ->set('remote_user', 'root')
    ->set('deploy_path', '/home/ahadi-daniel/Desktop/symf/');

// Hooks

after('deploy:failed', 'deploy:unlock');
