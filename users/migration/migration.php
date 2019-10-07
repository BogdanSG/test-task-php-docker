<?php

require_once __DIR__.'/../helpers/DB.php';

DB::exec("CREATE TABLE users (
    user_id INTEGER PRIMARY KEY AUTOINCREMENT,
    login TEXT,
    password TEXT,
    UNIQUE(login, password)
    );
    ");

DB::exec("INSERT INTO users(login, password) VALUES ('admin', 'admin')");