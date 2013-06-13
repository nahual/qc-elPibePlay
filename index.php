<?php
/**
 * User: Proyecto Nahual
 * Date: 30/10/12
 * Time: 13:46
 *
 * Cualquier inquietud, enviar un mail a sumate@nahual.com.ar
 *
 */
include_once("includes.php");

include_once("version_addendum.php");
include_once("classes/GameType.php");
include_once("classes/GameTable.php");
include_once("classes/ActionType.php");



error_reporting(E_ALL);
ini_set('display_errors', '1');

$gameTypes = GameType::getValues();

$gameTable = new GameTable();

$visibleFilters = false;
$onlyImportantColumns = false;

if (isset($_POST) && isset($_POST['aplicarFiltros'])) {
  $visibleFilters = true;
  if (isset($_POST['checkProyeccion'])) {
    $onlyImportantColumns = true;
  }
  $gameTypeFilter = $_POST['gameTypeFilter'];
  $games = $gameTable->getGames($onlyImportantColumns, $gameTypeFilter);
} else {
  $games = $gameTable->getAllGames();
}

function getIcon($game)
{
  echo "<img src='resources/img/iconos/" . $game->getGameType() . ".png' class='console-icon'  title='" . $game->getGameType() . "' alt='" . $game->getGameType() . "' />";
}

?>

<html>
<head>
  <?php include_once("common_head.php") ?>
    <script type="text/javascript">

        $(function() {
            var $filtersToggle = $("#filtersToggle");
            var $filtersFormContainer = $("#filtersFormContainer");

            $filtersToggle.click(function() {
                $filtersFormContainer.fadeToggle("fast", null, function() {
                    if ($filtersFormContainer.is(":visible")) {
                        $filtersToggle.text("Ocultar Filtros");
                    } else {
                        $filtersToggle.text("Ver Filtros");
                    }
                });

            });

            <?php if ($visibleFilters) : ?>
            $filtersFormContainer.show();
            <?php if ($onlyImportantColumns) : ?>
            $("#checkProyeccion").attr('checked', 'true');
            <?php endif ?>
            $("#gameType").val('<?php echo $gameTypeFilter; ?>');
            <?php endif ?>
        });


        function remove_contact(id) {
            if (confirm("Estas seguro?")) {
                $.ajax({
                    type:"POST",
                    url:"GameAjaxController.php",
                    data:{
                        action:'<?php echo ActionType::ACTION_DELETE ?>',
                        id:id
                    },

                    success:function (result) {
                        if (result) {
                            $("tr#" + id).remove();
                        } else {
                            alert("Error");
                        }
                    },
                    error:function (objeto, error, otroobj) {
                        alert("Error: " + error);
                    }
                });
            }
        }

        function edit_contact(id) {
            window.location.href="newGame.php?id=" + id;
        }

    </script>
</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <span class="brand">
                elPibePlay <span id='version'></span>
            </span>
            <a href="http://www.youtube.com/watch?v=YF7jfH3McSA&feature=related" target="_blank"><img alt="elPibePlay" title="elPibePlay" src="resources/img/icon.png" width="32"/></a>
            <ul class="nav">
                <li class="active"><a href="index.php">Juegos</a></li>
                <li><a href="newGame.php">+ Nuevo Juego</a></li>
            </ul>
        </div>
    </div>
</div>
<div id="filtersContainer">
    <a id="filtersToggle" class="btn btn-info">Ver Filtros</a>
    <div id="filtersFormContainer" class="well">
      <form id="formFiltros" class="form-horizontal" action="index.php" method="POST">
          <div class="control-group">
              <label class="control-label" for="gameType">Consola</label>
              <div class="controls">
                  <select id="gameType" name="gameTypeFilter">
                    <option value="todos">Todos</option>
                    <?php foreach ($gameTypes as $gameType) : ?>
                      <option value="<?php echo $gameType?>"><?php echo $gameType?></option>
                    <?php endforeach ?>
                  </select>
              </div>
          </div>
          <div class="control-group">
              <label class="control-label" for="checkProyeccion">Quiero jugar ya!</label>
              <div class="controls">
                  <input id="checkProyeccion" type="checkbox" name="checkProyeccion"/>
                  &nbsp;
                  <span class="label label-info" style="font-size: 7pt; cursor: default" title="El pibe play a veces est&aacute; tan desesperado por jugar, que usa este filtro para ver solo la columnas realmente importantes: nombre del juego y en que consola lo tiene, y como siempre, ordenado por puntaje">info</span>
              </div>
          </div>
          <div class="form-actions" style="text-align:right">
              <button type="submit" id="aplicarFiltros" name="aplicarFiltros" class="btn btn-success" value="filtersOn">Aplicar filtros</button>
          </div>
          <input type="hidden" name="v" value="<?php echo $_SESSION['v'] ?>">
      </form>
    </div>
</div>



<div id="originalGameList" class="tableContainer">
    <table class="table table-stripped table-hover">
        <thead>
        <th>Nombre</th>
        <th>Consola</th>

        <?php if (!$onlyImportantColumns): ?>
        <th>Puntaje</th>
        <th>Creador</th>
        <th>A&ntilde;o</th>
        <?php endif ?>

        <th>Acciones</th>
        </thead>
        <tbody>
        <?php foreach ($games as $game) : ?>
        <tr id="<?php echo $game->getId() ?>">
            <td><?php echo $game->getName() ?></td>
            <td><?php echo getIcon($game) . "&nbsp;" . $game->getGameType() ?></td>
            <?php if (!$onlyImportantColumns): ?>
            <td><?php echo $game->getRating() ?></td>
            <td><?php echo $game->getCompany(); ?></td>
            <td><?php echo $game->getYear() ?></td>
            <?php endif ?>
            <td>
                <i class='icon-pencil' style="cursor: pointer" onclick='edit_contact(<?php echo $game->getId() ?>)'></i>
                / <i
                    class='icon-remove' style="cursor: pointer"
                    onclick='remove_contact(<?php echo $game->getId() ?>);'></i>
            </td>
        </tr>
          <?php endforeach ?>
        </tbody>
    </table>
</div>
</body>
</html>