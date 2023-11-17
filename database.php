<?php

$pdo = new PDO('sqlite:./data.db', '', '', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);