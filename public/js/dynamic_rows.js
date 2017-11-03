$(document).ready(function(){
      var i=1;
      $('#add').click(function(){
           i++;
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="familia_persona_nombre[]" placeholder="Nombre" class="form-control" required /></td><td><input type="text" name="familia_persona_edad[]" placeholder="Edad" class="form-control" /></td><td><input type="radio" name="familia_persona_sexo[]" value="M">M</input><br/><input type="radio" name="familia_persona_sexo[]" value="F">F</input></td><td><input type="text" name="familia_persona_parentesco[]" placeholder="Parentesco" class="form-control" required/></td><td><input type="text" name="familia_persona_ocupacion[]" placeholder="Ocupacion" class="form-control" required/></td><td><input type="text" name="familia_persona_escolaridad[]" placeholder="Escolaridad" class="form-control" required/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></tr>');
      });
      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });
});
