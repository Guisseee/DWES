<?php

$listaTarea = $data["listaTareas"];

echo "<form action='index.php'>
      </form><br>";

if (count($listaTarea) == 0) {
  echo "No hay datos";
} else {
  echo "<table border ='1'>";
  foreach ($listaTarea as $fila) {
    echo "<tr>";
    echo "<td>" . $fila->titulo . "</td>";
    echo "<td>" . $fila->descripcion . "</td>";
    echo "<td><a href='index.php?action=formularioModificarTarea&idTarea=" . $fila->id . "'>Modificar</a></td>";
    echo "<td><a href='index.php?action=borrarTarea&idTarea=" . $fila->id . "'>Borrar</a></td>";
    echo "</tr>";
  }
  echo "</table>";
}
echo "<p><a href='index.php?action=formularioInsertarTarea'>Nuevo</a></p>";