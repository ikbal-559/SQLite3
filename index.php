<?php

//putenv('TMP=C:/temp');
if(!class_exists('SQLite3')){
    phpinfo();
    die('Add Class SQLite3!');
}


class MyDB extends SQLite3
{

    public function __construct()
    {
        $this->open('mysqlitedb.db');
    }

    public function createTable(){
        $this->exec('create table if not exists `users` (`id` INTEGER PRIMARY KEY, `name` VARCHAR(128), `email` VARCHAR (128))');
    }

    public function add(){
        $this->query('INSERT INTO `users` (`name`, `email`) VALUES ("Albert Einstein", "einstein@example.com")');
    }

    public function get(){
       return  $this->query('SELECT * FROM `users`');

    }


}

$db = new MyDB();

$db->createTable();
$db->add();

echo '<br>Result:<br>';
$res=$db->get();
while($row=$res->fetchArray()){
    $id=$row['id'];
    $name=$row['name'];
    $email=$row['email'];
    echo '	' . $name . ' : ' . $email . '<br>';
}


