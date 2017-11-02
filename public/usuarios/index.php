<?php
require_once '../../includes/ini.php';

$title="Usuarios";
$subtitle="Menú de {$title}";
require_once HEADER;
?>
<div class="col-xs-8 col-xs-offset-2">
    <div class="well">
        <h1><a href="#">Ver usuarios</a></h1>
    </div>
    <div class="well">
        <h1><a href="create.php">Agregar usuario</a></h1>
    </div>
</div>
<?php require_once FOOTER; ?>
<script type="text/javascript">
    $(function(){
        $('#usuarios').attr('class','active');
    });
</script>
