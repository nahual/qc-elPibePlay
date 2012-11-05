<?php

/**
 * User: Proyecto Nahual
 * Date: 30/10/12
 * Time: 13:46
 *
 * Cualquier inquietud, enviar un mail a sumate@nahual.com.ar
 *
 */
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once("config/includes.php");
include_once("classes/GameType.php");
include_once("classes/GameTable.php");
include_once("GameAjaxController.php");

$gameTypes = GameType::getValues();

if (isset($_GET['id'])) {
  $gameTable = new GameTable();
  $game = $gameTable->getById($_GET['id']);
}

?>

<html>
<head>
  <?php include_once("common_head.php") ?>
    <script type="text/javascript">
        $(function () {

            jQuery.fn.reset = function () {
                $(this).each(function () {
                    this.reset();
                });
            }

            var $formNuevoJuego = $("#formNuevoJuego");

            $("#guardarJuego").click(function (e) {
                e.preventDefault();
                var name = $("#name").val();
                var gameType = $("#gameType").val();
                var rating = $("#rating").val();
                var year = $("#year").val();
                var company = $("#company").val();
                var id = null;

                <?php if (isset($game)) : ?>
                id = <?php echo $game->getId(); ?>;
                <?php endif ?>

                var action = '<?php echo ACTION_SAVE; ?>';
                <?php if (isset($game)) : ?>
                action =  '<?php echo ACTION_MODIFY; ?>',
                <?php endif ?>

                $.ajax({
                    type:"POST",
                    url:"GameAjaxController.php",
                    data:{
                        action:action,
                        name:name,
                        gameType:gameType,
                        rating:rating,
                        company: company,
                        id: id,
                        year:year
                    },

                    success:function (result) {
                        if (result) {
                            $formNuevoJuego.reset();
                            window.location.href = "index.php";
                        }
                        else {
                            alert("Error");
                        }
                    },
                    error:function (objeto, error, otroobj) {
                        alert("Error: " + error);
                    }
                });
            })

            $("#cancelGuardarJuego").click(function () {
                $formNuevoJuego.reset();
            });

        <?php if (isset($game)) : ?>
            var name = $("#name").val('<?php echo $game->getName(); ?>');
            var gameType = $("#gameType").val('<?php echo $game->getGameType(); ?>');
            var rating = $("#rating").val('<?php echo $game->getRating(); ?>');
            var year = $("#year").val('<?php echo $game->getYear(); ?>');
          <?php endif ?>

        });
    </script>
</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <span class="brand">
                elPibePlay <span id='version'></span>
            </span>
            <img alt="elPibePlay" title="elPibePlay" src="resources/img/icon.png" width="32"/>
            <ul class="nav">
                <li><a href="index.php">Juegos</a></li>
                <li class="active"><a href="newGame.php">+ Nuevo Juego</a></li>
            </ul>
        </div>
    </div>
</div>
<div id="newGameContainer" class="well">
    <form id="formNuevoJuego" class="form-horizontal">
        <div class="control-group">
            <label class="control-label" for="name">Nombre</label>

            <div class="controls">
                <input type="text" id="name" placeholder="Nombre jueguito" class="input-xlarge">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="gameType">Consola</label>

            <div class="controls">
                <select id="gameType">
                  <?php foreach ($gameTypes as $gameType) : ?>
                    <option value="<?php echo $gameType?>"><?php echo $gameType?></option>
                  <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="gameType">Puntaje</label>

            <div class="controls">
                <select id="rating">
                  <?php for ($i = 1; $i < 11; $i++) : ?>
                    <option value="<?php echo $i?>"><?php echo $i?></option>
                  <?php endfor ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="gameType">A&ntilde;o</label>

            <div class="controls">
                <select id="year">
                  <?php for ($i = 1980; $i < date('Y'); $i++) : ?>
                    <option value="<?php echo $i?>"><?php echo $i?></option>
                  <?php endfor ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="name">Empresa</label>

            <div class="controls">
                <input type="text" id="company" placeholder="Empresa que lo creo" class="input-xlarge">
            </div>
        </div>
        <div class="form-actions" style="text-align:right">
            <button type="submit" id="guardarJuego" class="btn btn-primary">Guardar juego</button>
            <button type="button" id="cancelGuardarJuego" class="btn">Cancel</button>
        </div>
    </form>
</div>
</body>
</html>