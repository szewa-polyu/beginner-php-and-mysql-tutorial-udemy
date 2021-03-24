<?php

function getAssocArraySafe($key, $array) {
  return array_key_exists($key, $array) ? $array[$key] : null;
}

?>
