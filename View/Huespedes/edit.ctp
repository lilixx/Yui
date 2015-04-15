
   <head>
    
 <?php echo $this->Html->script('jquery-loader'); ?>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />

 <!--script calendario de nacimiento
    ================================================== -->
  
    <script type="text/javascript">
$(function() {
	$('#dob').datepicker({dateFormat: 'yy/mm/dd', changeMonth: true, changeYear: true, yearRange: '-100:-10', minDate:"-100Y -0D", maxDate: "-10Y -0D"});
});
</script>

 <!--fin del script calendario nacimiento
    ================================================== --> 
    
       
    <!--script calendario fecha entrada y salida
       ================================================== --> 
<script type="text/javascript">
jQuery(function($){
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'yy/mm/dd',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});    

        $(document).ready(function() {
           $("#datepicker").datepicker();
           
        });
        
 $(document).ready(function() {
    // obtenemos la fecha actual
    var date = new Date();
    var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();    
    // inicializamos datapicker para cada input en este caso con la fecha activa a partir del dia de hoy y con el formato de fecha dd/mm/yy                
    $("#llegada").datepicker({minDate: new Date(y, m, d), dateFormat: 'yy/mm/dd'});
    $("#salida").datepicker({minDate: new Date(y, m, d), dateFormat: 'yy/mm/dd'});

 });
    </script>

<!--fin del script calendario fecha entrada y salida
   ================================================== -->
  
   </head>


  <!-- COLUMNA IZQUIERDAA
    ================================================== -->

	  <div class="col-md-3"> 
      		<div class="list-group">
	      	
		      	<?php echo $this->Html->link('Mostrar Huespedes',array('controller' => 'Huespedes', 'action' => 'index', 'full_base' => true),  array('class' => 'list-group-item')); ?>
		        <?php echo $this->Html->link('Búsqueda de Huespedes',array('controller' => 'Huespedes', 'action' => 'search', 'full_base' => true),  array('class' => 'list-group-item')); ?>		      
			      
		    </div>
      </div> 
     

 
    
    <!-- EN FRENTE
    ================================================== -->
<div class="col-md-9">
    
		
		

		<h2 id="input-groups-basic">Editar Huésped</h2>
		
		<?php echo $this->Form->create('Huespede',array('action' => 'edit', 'id' => 'formulario', 'role' => 'form')); ?>
	

<div class="row">
		
			
		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Nombres</label>
	          <?php echo $this->Form->input('Huespede.nombres',array('label'=>false,'placeholder'=>'Ingrese los nombres', 'required'=>"required", 'class'=>'form-control')); ?>
	        </div>
		</div>

               
        <?php   echo $this->Form->input('id', array('type' => 'hidden')); ?> 

		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Apellidos</label>
	          <?php echo $this->Form->input('Huespede.apellidos',array('label'=>false,'placeholder'=>'Ingrese los apellidos', 'required'=>"required", 'class'=>'form-control')); ?>
	        </div>
		</div>
	
		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Dirección permanente</label>
	          <?php echo $this->Form->input('Huespede.direccion',array('label'=>false,'placeholder'=>'Ingrese la dirección permanente', 'class'=>'form-control')); ?>
	        </div>
		</div>
		
		
		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Profesión u oficio</label>
	          <?php echo $this->Form->input('Huespede.profesion',array('label'=>false,'placeholder'=>'Ingrese la profesión', 'class'=>'form-control')); ?>
	        </div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Fecha de Nacimiento</label>
	        <?php echo $this->Form->input('Huespede.fechanacimiento',array('label'=>false,'type'=> "datepicker", 'id'=>"dob",'readonly'=>"readonly", 'size'=>"5",'class'=>'form-control')); ?>
	        </div>
		</div>
		
         <div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Sexo</label> &nbsp;
	        <?php
				$options=array('M'=>'Masculino','F'=>'Femenino');
			    $attributes=array('legend'=>false);
				echo $this->Form->radio('Huespede.sexo',$options,$attributes);
			?>
	        </div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Estado Civil</label>
	          <?php echo $this->Form->input('Huespede.estadocivil', array('label'=>false,'type'=>'select', 'options'=>array('------','soltero(a)'=>'soltero(a)', 'casado(a)'=>'casado(a)'), 'required'=>"required", 'class'=>'form-control')); ?>
	        </div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Nacionalidad</label>
	          <?php echo $this->Form->input('Huespede.nacionalidad',array('label'=>false,'placeholder'=>'Ingrese la nacionalidad', 'required'=>"required", 'class'=>'form-control')); ?>
	        </div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Tipo de documento</label>
	         <?php echo $this->Form->input('Huespede.tipodoc',array('label'=>false,'type'=>'select', 'options'=>array('------','cedula'=>'cedula', 'pasaporte ord.'=>'pasaporte ord.', 'pasaporte ofic.'=>'pasaporte ofic.', 'pasaporte diplo.'=>'pasaporte diplo.'), 'class'=>'form-control')); ?>
	        </div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">Número de Documento</label>
	          <?php echo $this->Form->input('Huespede.numdoc',array('label'=>false,'placeholder'=>'Ingrese el número de documento', 'class'=>'form-control')); ?>
	        </div>
		</div>
		
				
		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">País de Procedencia</label>
	             <?php echo $this->Form->input('Huespede.paisprocedencia',array('label'=>false,'type'=>'select', 'options'=>array('00' =>'Selecciona un país de procedencia',
                             '00' =>'Selecciona un pais',
                             'AF'=>'Afganistán',
                             'AL'=>'Albania',
                             'DE'=>'Alemania',
                             'AD'=>'Andorra',
                             'AO'=>'Angola',
                             'AI'=>'Anguila',
                             'AQ'=>'Antártica',
                             'AG'=>'Antigua y Barbuda',
                             'AN'=>'Antillas Holandesas',
                             'SA'=>'Arabia Saudá',
                             'DZ'=>'Argelia',
                             'AR'=>'Argentina',
                             'AM'=>'Armenia',
                             'AW'=>'Aruba',
                             'AU'=>'Australia',
                             'AT'=>'Austria',
                             'AZ'=>'Azerbaiján',
                             'BE'=>'Bélgica',
                             'BS'=>'Bahamas',
                             'BH'=>'Bahrain',
                             'BD'=>'Bangladesh',
                             'BB'=>'Barbados',
                             'BY'=>'Belarus',
                             'BZ'=>'Belice',
                             'BJ'=>'Benin',
                             'BM'=>'Bermuda',
                             'BO'=>'Bolivia',
                             'BA'=>'Bosnia-Hercegovina',
                             'BW'=>'Botswana',
                             'BR'=>'Brasil',
                             'BN'=>'Brunei Darussalam',
                             'BG'=>'Bulgaria',
                             'BF'=>'Burkina Faso',
                             'BI'=>'Burundi',
                             'BT'=>'Bután',
                             'CV'=>'Cabo Verde',
                             'KH'=>'Camboya',
                             'CM'=>'Camerún',
                             'CA'=>'Canadá',
                             'TD'=>'Chad',
                             'CL'=>'Chile',
                             'CN'=>'China',
                             'CY'=>'Chipre',
                             'VA'=>'Ciudad del Vaticano',
                             'CO'=>'Colombia',
                             'KM'=>'Comoras',
                             'CG'=>'Congo',
                             'KP'=>'Corea del Norte',
                             'KR'=>'Corea del Sur',
                             'CI'=>'Costa de Marfil',
                             'CR'=>'Costa Rica',
                             'HR'=>'Croacia',
                             'CU'=>'Cuba',
                             'DK'=>'Dinamarca',
                             'DJ'=>'Djibuti',
                             'DM'=>'Dominica',
                             'EC'=>'Ecuador',
                             'EG'=>'Egipto',
                             'SV'=>'El Salvador',
                             'AE'=>'Emiratos Árabes Unidos',
                             'ER'=>'Eritrea',
                             'SK'=>'Eslovaquia',
                             'SI'=>'Eslovenia',
                             'SP'=>'España',
                             'EE'=>'Estonia',
                             'ET'=>'Etiopía',
                             'RU'=>'Federación Rusa',
                             'FJ'=>'Fiji',
                             'PH'=>'Filipinas',
                             'FI'=>'Finlandia',
                             'FR'=>'Francia',
                             'FX'=>'Francia Metropolitana',
                             'GA'=>'Gabón',
                             'GM'=>'Gambia',
                             'GE'=>'Georgia',
                             'GS'=>'Georgia del Sur e Islas Sandwich del Sur',
                             'GH'=>'Ghana',
                             'GI'=>'Gibraltar',
                             'GR'=>'Grecia',
                             'GL'=>'Groenlandia',
                             'GP'=>'Guadalupe',
                             'GU'=>'Guam',
                             'GT'=>'Guatemala',
                             'GF'=>'Guayana Francesa',
                             'GN'=>'Guinea',
                             'GQ'=>'Guinea Ecuatorial',
                             'GW'=>'Guinea-Bissau',
                             'GY'=>'Guyana',
                             'HT'=>'Haití',
                             'HN'=>'Honduras',
                             'HK'=>'Hong Kong',
                             'HU'=>'Hungría',
                             'IN'=>'India',
                             'ID'=>'Indonesia',
                             'IR'=>'Irán',
                             'IQ'=>'Irak',
                             'IE'=>'Irlanda',
                             'BV'=>'Isla Bouvet',
                             'CX'=>'Isla Christmas',
                             'NF'=>'Isla Norfolk',
                             'IS'=>'Islandia',
                             'KY'=>'Islas Caimanes',
                             'CC'=>'Islas Cocos (Keeling)',
                             'CK'=>'Islas Cook',
                             'FO'=>'Islas Faroe',
                             'HM'=>'Islas Heard y Mc Donald',
                             'FK'=>'Islas Malvinas',
                             'MP'=>'Islas Marianas Septentrionales',
                             'MH'=>'Islas Marshall',
                             'SB'=>'Islas Salomón',
                             'SJ'=>'Islas Svalbard y Jan Mayen',
                             'TC'=>'Islas Turks y Caicos',
                             'VG'=>'Islas Vírgenes (Británicas)',
                             'VI'=>'Islas Vírgenes (EEUU)',
                             'WF'=>'Islas Wallis y Futuna',
                             'IL'=>'Israel',
                             'IT'=>'Italia',
                             'JM'=>'Jamaica',
                             'JP'=>'Japón',
                             'JO'=>'Jordania',
                             'QA'=>'Katar',
                             'KZ'=>'Kazajistán',
                             'KE'=>'Kenia',
                             'KG'=>'Kirguizistán',
                             'KI'=>'Kiribati',
                             'KW'=>'Kuwait',
                             'LB'=>'Líbano',
                             'LA'=>'Laos, República Popular',
                             'LS'=>'Lesoto',
                             'LV'=>'Letonia',
                             'LR'=>'Liberia',
                             'LY'=>'Libia',
                             'LI'=>'Liechtenstein',
                             'LT'=>'Lituania',
                             'LU'=>'Luxemburgo',
                             'MX'=>'México',
                             'MC'=>'Mónaco',
                             'MO'=>'Macao',
                             'MK'=>'Macedonia',
                             'MG'=>'Madagascar',
                             'MY'=>'Malasia',
                             'MW'=>'Malaui',
                             'MV'=>'Maldivas',
                             'ML'=>'Mali',
                             'MT'=>'Malta',
                             'MA'=>'Marruecos',
                             'MQ'=>'Martinica',
                             'MU'=>'Mauricio',
                             'MR'=>'Mauritania',
                             'YT'=>'Mayotte',
                             'FM'=>'Micronesia',
                             'MD'=>'Moldova',
                             'MN'=>'Mongolia',
                             'MS'=>'Montserrat',
                             'MZ'=>'Mozambique',
                             'MM'=>'Myanmar',
                             'NE'=>'Níger',
                             'NA'=>'Namibia',
                             'NR'=>'Nauru',
                             'NP'=>'Nepal',
                             'NI'=>'Nicaragua',
                             'NG'=>'Nigeria',
                             'NU'=>'Niue',
                             'NO'=>'Noruega',
                             'NC'=>'Nueva Caledonia',
                             'NZ'=>'Nueva Zelanda',
                             'OM'=>'Omán',
                             'NL'=>'Países Bajos',
                             'PK'=>'Pakistán',
                             'PW'=>'Palau',
                             'PA'=>'Panamá',
                             'PG'=>'Papua Nueva Guinea',
                             'PY'=>'Paraguay',
                             'PE'=>'Perú',
                             'PN'=>'Pitcairn',
                             'PF'=>'Polinesia Francesa',
                             'PL'=>'Polonia',
                             'PT'=>'Portugal',
                             'PR'=>'Puerto Rico',
                             'GB'=>'Reino Unido',
                             'SY'=>'República Árabe de Siria',
                             'CF'=>'República Centroafricana',
                             'CZ'=>'República Checa',
                             'DO'=>'República Dominicana',
                             'RE'=>'Reunión',
                             'RW'=>'Ruanda',
                             'RO'=>'Rumanía',
                             'EH'=>'Sahara Occidental',
                             'WS'=>'Samoa',
                             'AS'=>'Samoa Americana',
                             'KN'=>'San Cristóbal y Nevis',
                             'SM'=>'San Marino',
                             'VC'=>'San Vicente y las Granadinas',
                             'SH'=>'Santa Elena',
                             'LC'=>'Santa Lucía',
                             'ST'=>'Santo Tomé y Príncipe',
                             'SN'=>'Senegal',
                             'yu'=>'Serbia y Montenegro',
                             'SC'=>'Seychelles',
                             'SL'=>'Sierra Leona',
                             'SG'=>'Singapur',
                             'SO'=>'Somalía',
                             'LK'=>'Sri Lanka',
                             'PM'=>'St Pierre y Miquelon',
                             'SZ'=>'Suazilandia',
                             'ZA'=>'Sudáfrica',
                             'SD'=>'Sudán',
                             'SE'=>'Suecia',
                             'CH'=>'Suiza',
                             'SR'=>'Surinam',
                             'TN'=>'Túnez',
                             'TH'=>'Tailandia',
                             'TW'=>'Taiwan',
                             'TZ'=>'Tanzanía',
                             'TJ'=>'Tayiquistán',
                             'TF'=>'Territorios australes y antárticos franceses',
                             'IO'=>'Territorios Británicos del Océano Índico',
                             'TP'=>'Timor Oriental',
                             'TG'=>'Togo',
                             'TK'=>'Tokelau',
                             'TO'=>'Tonga',
                             'TT'=>'Trinidad y Tobago',
                             'TM'=>'Turkmenistán',
                             'TR'=>'Turquía',
                             'TV'=>'Tuvalu',
                             'UA'=>'Ucrania',
                             'UG'=>'Uganda',
                             'UY'=>'Uruguay',
                             'US'=>'USA',
                             'UZ'=>'Uzbekistán',
                             'VU'=>'Vanuatu',
                             'VE'=>'Venezuela',
                             'VN'=>'Vietnam',
                             'YE'=>'Yemen',
                             'ZR'=>'Zaire',
                             'ZM'=>'Zambia',
                             'ZW'=>'Zimbabue',
                             'ZZ'=>'Otros-No indicados'), 'required'=>"required", 'class'=>'form-control')); ?>     
                   
	           </div>
		</div>
		
		<div class="col-md-6">
			<div class="form-group">
	          <label for="exampleInputEmail1">País de Destino</label>
	            <?php echo $this->Form->input('Huespede.paisdestino',array('label'=>false,'type'=>'select', 'options'=>array('00' =>'Selecciona un país de destino',
                             '00' =>'Selecciona un pais',
                             'AF'=>'Afganistán',
                             'AL'=>'Albania',
                             'DE'=>'Alemania',
                             'AD'=>'Andorra',
                             'AO'=>'Angola',
                             'AI'=>'Anguila',
                             'AQ'=>'Antártica',
                             'AG'=>'Antigua y Barbuda',
                             'AN'=>'Antillas Holandesas',
                             'SA'=>'Arabia Saudá',
                             'DZ'=>'Argelia',
                             'AR'=>'Argentina',
                             'AM'=>'Armenia',
                             'AW'=>'Aruba',
                             'AU'=>'Australia',
                             'AT'=>'Austria',
                             'AZ'=>'Azerbaiján',
                             'BE'=>'Bélgica',
                             'BS'=>'Bahamas',
                             'BH'=>'Bahrain',
                             'BD'=>'Bangladesh',
                             'BB'=>'Barbados',
                             'BY'=>'Belarus',
                             'BZ'=>'Belice',
                             'BJ'=>'Benin',
                             'BM'=>'Bermuda',
                             'BO'=>'Bolivia',
                             'BA'=>'Bosnia-Hercegovina',
                             'BW'=>'Botswana',
                             'BR'=>'Brasil',
                             'BN'=>'Brunei Darussalam',
                             'BG'=>'Bulgaria',
                             'BF'=>'Burkina Faso',
                             'BI'=>'Burundi',
                             'BT'=>'Bután',
                             'CV'=>'Cabo Verde',
                             'KH'=>'Camboya',
                             'CM'=>'Camerún',
                             'CA'=>'Canadá',
                             'TD'=>'Chad',
                             'CL'=>'Chile',
                             'CN'=>'China',
                             'CY'=>'Chipre',
                             'VA'=>'Ciudad del Vaticano',
                             'CO'=>'Colombia',
                             'KM'=>'Comoras',
                             'CG'=>'Congo',
                             'KP'=>'Corea del Norte',
                             'KR'=>'Corea del Sur',
                             'CI'=>'Costa de Marfil',
                             'CR'=>'Costa Rica',
                             'HR'=>'Croacia',
                             'CU'=>'Cuba',
                             'DK'=>'Dinamarca',
                             'DJ'=>'Djibuti',
                             'DM'=>'Dominica',
                             'EC'=>'Ecuador',
                             'EG'=>'Egipto',
                             'SV'=>'El Salvador',
                             'AE'=>'Emiratos Árabes Unidos',
                             'ER'=>'Eritrea',
                             'SK'=>'Eslovaquia',
                             'SI'=>'Eslovenia',
                             'SP'=>'España',
                             'EE'=>'Estonia',
                             'ET'=>'Etiopía',
                             'RU'=>'Federación Rusa',
                             'FJ'=>'Fiji',
                             'PH'=>'Filipinas',
                             'FI'=>'Finlandia',
                             'FR'=>'Francia',
                             'FX'=>'Francia Metropolitana',
                             'GA'=>'Gabón',
                             'GM'=>'Gambia',
                             'GE'=>'Georgia',
                             'GS'=>'Georgia del Sur e Islas Sandwich del Sur',
                             'GH'=>'Ghana',
                             'GI'=>'Gibraltar',
                             'GR'=>'Grecia',
                             'GL'=>'Groenlandia',
                             'GP'=>'Guadalupe',
                             'GU'=>'Guam',
                             'GT'=>'Guatemala',
                             'GF'=>'Guayana Francesa',
                             'GN'=>'Guinea',
                             'GQ'=>'Guinea Ecuatorial',
                             'GW'=>'Guinea-Bissau',
                             'GY'=>'Guyana',
                             'HT'=>'Haití',
                             'HN'=>'Honduras',
                             'HK'=>'Hong Kong',
                             'HU'=>'Hungría',
                             'IN'=>'India',
                             'ID'=>'Indonesia',
                             'IR'=>'Irán',
                             'IQ'=>'Irak',
                             'IE'=>'Irlanda',
                             'BV'=>'Isla Bouvet',
                             'CX'=>'Isla Christmas',
                             'NF'=>'Isla Norfolk',
                             'IS'=>'Islandia',
                             'KY'=>'Islas Caimanes',
                             'CC'=>'Islas Cocos (Keeling)',
                             'CK'=>'Islas Cook',
                             'FO'=>'Islas Faroe',
                             'HM'=>'Islas Heard y Mc Donald',
                             'FK'=>'Islas Malvinas',
                             'MP'=>'Islas Marianas Septentrionales',
                             'MH'=>'Islas Marshall',
                             'SB'=>'Islas Salomón',
                             'SJ'=>'Islas Svalbard y Jan Mayen',
                             'TC'=>'Islas Turks y Caicos',
                             'VG'=>'Islas Vírgenes (Británicas)',
                             'VI'=>'Islas Vírgenes (EEUU)',
                             'WF'=>'Islas Wallis y Futuna',
                             'IL'=>'Israel',
                             'IT'=>'Italia',
                             'JM'=>'Jamaica',
                             'JP'=>'Japón',
                             'JO'=>'Jordania',
                             'QA'=>'Katar',
                             'KZ'=>'Kazajistán',
                             'KE'=>'Kenia',
                             'KG'=>'Kirguizistán',
                             'KI'=>'Kiribati',
                             'KW'=>'Kuwait',
                             'LB'=>'Líbano',
                             'LA'=>'Laos, República Popular',
                             'LS'=>'Lesoto',
                             'LV'=>'Letonia',
                             'LR'=>'Liberia',
                             'LY'=>'Libia',
                             'LI'=>'Liechtenstein',
                             'LT'=>'Lituania',
                             'LU'=>'Luxemburgo',
                             'MX'=>'México',
                             'MC'=>'Mónaco',
                             'MO'=>'Macao',
                             'MK'=>'Macedonia',
                             'MG'=>'Madagascar',
                             'MY'=>'Malasia',
                             'MW'=>'Malaui',
                             'MV'=>'Maldivas',
                             'ML'=>'Mali',
                             'MT'=>'Malta',
                             'MA'=>'Marruecos',
                             'MQ'=>'Martinica',
                             'MU'=>'Mauricio',
                             'MR'=>'Mauritania',
                             'YT'=>'Mayotte',
                             'FM'=>'Micronesia',
                             'MD'=>'Moldova',
                             'MN'=>'Mongolia',
                             'MS'=>'Montserrat',
                             'MZ'=>'Mozambique',
                             'MM'=>'Myanmar',
                             'NE'=>'Níger',
                             'NA'=>'Namibia',
                             'NR'=>'Nauru',
                             'NP'=>'Nepal',
                             'NI'=>'Nicaragua',
                             'NG'=>'Nigeria',
                             'NU'=>'Niue',
                             'NO'=>'Noruega',
                             'NC'=>'Nueva Caledonia',
                             'NZ'=>'Nueva Zelanda',
                             'OM'=>'Omán',
                             'NL'=>'Países Bajos',
                             'PK'=>'Pakistán',
                             'PW'=>'Palau',
                             'PA'=>'Panamá',
                             'PG'=>'Papua Nueva Guinea',
                             'PY'=>'Paraguay',
                             'PE'=>'Perú',
                             'PN'=>'Pitcairn',
                             'PF'=>'Polinesia Francesa',
                             'PL'=>'Polonia',
                             'PT'=>'Portugal',
                             'PR'=>'Puerto Rico',
                             'GB'=>'Reino Unido',
                             'SY'=>'República Árabe de Siria',
                             'CF'=>'República Centroafricana',
                             'CZ'=>'República Checa',
                             'DO'=>'República Dominicana',
                             'RE'=>'Reunión',
                             'RW'=>'Ruanda',
                             'RO'=>'Rumanía',
                             'EH'=>'Sahara Occidental',
                             'WS'=>'Samoa',
                             'AS'=>'Samoa Americana',
                             'KN'=>'San Cristóbal y Nevis',
                             'SM'=>'San Marino',
                             'VC'=>'San Vicente y las Granadinas',
                             'SH'=>'Santa Elena',
                             'LC'=>'Santa Lucía',
                             'ST'=>'Santo Tomé y Príncipe',
                             'SN'=>'Senegal',
                             'yu'=>'Serbia y Montenegro',
                             'SC'=>'Seychelles',
                             'SL'=>'Sierra Leona',
                             'SG'=>'Singapur',
                             'SO'=>'Somalía',
                             'LK'=>'Sri Lanka',
                             'PM'=>'St Pierre y Miquelon',
                             'SZ'=>'Suazilandia',
                             'ZA'=>'Sudáfrica',
                             'SD'=>'Sudán',
                             'SE'=>'Suecia',
                             'CH'=>'Suiza',
                             'SR'=>'Surinam',
                             'TN'=>'Túnez',
                             'TH'=>'Tailandia',
                             'TW'=>'Taiwan',
                             'TZ'=>'Tanzanía',
                             'TJ'=>'Tayiquistán',
                             'TF'=>'Territorios australes y antárticos franceses',
                             'IO'=>'Territorios Británicos del Océano Índico',
                             'TP'=>'Timor Oriental',
                             'TG'=>'Togo',
                             'TK'=>'Tokelau',
                             'TO'=>'Tonga',
                             'TT'=>'Trinidad y Tobago',
                             'TM'=>'Turkmenistán',
                             'TR'=>'Turquía',
                             'TV'=>'Tuvalu',
                             'UA'=>'Ucrania',
                             'UG'=>'Uganda',
                             'UY'=>'Uruguay',
                             'US'=>'USA',
                             'UZ'=>'Uzbekistán',
                             'VU'=>'Vanuatu',
                             'VE'=>'Venezuela',
                             'VN'=>'Vietnam',
                             'YE'=>'Yemen',
                             'ZR'=>'Zaire',
                             'ZM'=>'Zambia',
                             'ZW'=>'Zimbabue',
                             'ZZ'=>'Otros-No indicados'), 'required'=>"required", 'class'=>'form-control')); ?>     
                     </div>
		</div>
	
		
		<div class="col-md-6">
		    <div class="form-group">
	          <label for="exampleInputEmail1">Correo electrónico </label>
	          <?php echo $this->Form->input('Huespede.email',array('label'=>false,'placeholder'=>'Ingrese el correo electrónico ', 'class'=>'form-control')); ?>
	        </div>
		</div>
		
		<div class="col-md-6">
		    <div class="form-group">
	          <label for="exampleInputEmail1">Teléfono </label>
	          <?php echo $this->Form->input('Huespede.telefono',array('label'=>false,'placeholder'=>'Ingrese el número de teléfono', 'class'=>'form-control')); ?>
	        </div>
		</div>
		
		
               
              	<div class="col-md-6">
		    <div class="form-group">
	              <br/> 
	                  
	        </div>
		</div>

               <div class="col-md-6">
		    <div class="form-group">
	              <br/> 
	                  
	        </div>
		</div>
		
		 <div class="col-md-6">
		    <div class="form-group">
	              <br/> 
	                  
	        </div>
		</div>

          
	
		<div class="col-md-6">
			<div class="form-group">
	              <?php	echo $this->Form->end(array('label' => 'Editar Huésped','class' =>  'btn btn-default dropdown-toggle')); ?>        
	        </div>
		</div>


	
</div>



		  

  
</div>


