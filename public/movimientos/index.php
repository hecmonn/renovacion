<?php
require_once '../../includes/ini.php';

$title="Donadores";
$subtitle="Menú de {$title}";
require_once HEADER;
?>
<div class="col-xs-8 col-xs-offset-2">
    <div class="well">
        <div class="header block-center">
            <h1><a href="create_ing.php">Agregar ingreso</a></h1>
        </div>
    </div>
    <div class="well">
        <div class="header block-center">
            <h1><a href="create.php">Agregar egreso</a></h1>
        </div>
    </div>
    <div class="well">
        <div class="header block-center">
            <h1><a href="create.php">Estado de cuenta</a></h1>
        </div>
    </div>
</div>
<?php require_once FOOTER; ?>
<script type="text/javascript">
    $(function(){
        $('#movimientos').attr('class','active');
    });
</script>
