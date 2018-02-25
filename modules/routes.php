<?php

$diretorioBase = __DIR__;
$diretorioBaseAberto = opendir($diretorioBase);

while ($diretorio = readdir($diretorioBaseAberto)) {
  if (ehUmDiretorioValido($diretorioBase, $diretorio)) {
    carregarModulo([$diretorio, 'module.php'], $router);
  }
}

function ehUmDiretorioValido ($diretorioBase, $diretorio) {
  $diretoriosExcluidos = ['.', '..'];

  return
    is_dir($diretorioBase . DIRECTORY_SEPARATOR . $diretorio) &&
    !in_array($diretorio, $diretoriosExcluidos);
}

function carregarModulo (Array $paths, $router) {
  try {
    require_once join(DIRECTORY_SEPARATOR, $paths);
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

closedir($diretorioBaseAberto);
