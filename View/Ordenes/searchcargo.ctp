<script type="text/javascript">
function crearCampos(cantidad){
var div = document.getElementById("campos_dinamicos");
    
while(div.firstChild)div.removeChild(div.firstChild); // remover elementos;
    for(var i = 1, cantidad = Number(cantidad); i <= cantidad; i++){
    var salto = document.createElement("P");
   
  //  var select_element = document.getElementById('FolioPizza').options[document.getElementById('FolioPizza').selectedIndex].text;
    
    var select_element = document.createElement('select');
 
    select_element.setAttribute("id", "pizza");
    select_element.setAttribute("name", "data[Cargordene]["+i+"][cargo_id]");
    select_element.setAttribute("class", "form-control");
       
     var options = new Array();
   
		"<?php foreach($cargo as $car){ ?>"
        options.push(new Option("<?php echo $car['Cargo']['nombre'];?>", "<?php echo $car['Cargo']['id'];?>", false, false)); "<?php } ?>"
        
        
   
    for ( var option in options ){
        select_element.appendChild(options[option]);
    }
    
    $("#select-holder").append(select_element);
    var input2 = document.createElement("input");
    input2.setAttribute("name", "data[Cargordene]["+i+"][cantidad]");
    input2.setAttribute("class", "form-control");
    input2.setAttribute("placeholder", "cantidad");
    var text = document.createTextNode("Cargo " + i + ": ");
    
        
    salto.appendChild(text);
    salto.appendChild(select_element);
    salto.appendChild(input2);
    div.appendChild(salto);
    }
}
</script>

¿Cuántos Cargos? <input type="text" name="" id="" value="" onkeyup="crearCampos(this.value);" /> 
           
           <br/> <br/>
           
           
            <div id="campos_dinamicos">
            

         </div>


