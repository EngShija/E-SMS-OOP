<?php
spl_autoload_unregister(fn($class) => require_once __DIR__. "/../models/{$class}.php");