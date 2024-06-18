<?php
session_start(); // verifica que la sesion este iniciada

require_once("libs/conex.php");
require_once("libs/setup.lib.php");
require_once("libs/sugerencias.lib.php");

$titulo = "Agregue sugerencia";
$sugerencia = ["id" => "", "telefono" => "", "sugerencias" => ""];

// validacion del GET id
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    if ($id) {
        $sugerencia = sugerenciaTraerId($conn, $id);
        if ($_SESSION['administrador'] == 1 || $_SESSION['id'] == $sugerencia['usuario_id']) {
            $titulo = "Editar sugerencia #" . htmlspecialchars($sugerencia["id"], ENT_QUOTES, 'UTF-8');
        } else {
            $error = "no tiene permiso para realizar la operacion";
            $url = "index.php?errores=" . urlencode($error);
            header("Location: $url");
            exit;
        }
    }
}
?>

<div class="container">
  <div class="card">
    <div class="card-header text-white bg-primary">
      <h3><?php echo $titulo; ?></h3>
    </div>
    <div class="card-body">
      <form action="procesar.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($sugerencia["id"], ENT_QUOTES, 'UTF-8'); ?>">
        <input type="text" name="telefono" value="<?php echo htmlspecialchars($sugerencia["telefono"], ENT_QUOTES, 'UTF-8'); ?>" class="form-control" placeholder="Ingrese el teléfono" required> <br>
        <textarea name="sugerencias" rows="8" cols="80" class="form-control" placeholder="Ingrese su sugerencia" required><?php echo htmlspecialchars($sugerencia["sugerencias"], ENT_QUOTES, 'UTF-8'); ?></textarea>
        <br>
        <button type="submit" name="button" class="form-control btn btn-primary">Enviar</button>
      </form>
    </div>
  </div>
</div>
