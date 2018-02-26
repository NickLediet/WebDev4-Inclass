<?php

require_once("./phpscripts/config.php");
$hash = crypt("A!Hb#}?`.7s8B:W=kHeJ", '$2y$12$n1tNimq4IuqFyrylMAxOAO03GEN04NaGRs0yT6HjRB0MdI5ZWfpR.');
echo $hash == '$2y$12$n1tNimq4IuqFyrylMAxOAO03GEN04NaGRs0yT6HjRB0MdI5ZWfpR.';