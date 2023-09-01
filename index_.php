<?php
	session_start();

	require("cargaDatos.php");
        echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><?php
    $xajax->printJavascript();?>
<link rel="stylesheet" TYPE="text/css" HREF="Clases/estilo.css" />
<script src="Clases/mootools-1.2.4-core-yc.js" type="text/javascript"></script>
<style type="text/css">
/*POPUP*/
#capasombra {
background:#000000 none repeat scroll 0 0;
cursor:pointer;
left:0;
opacity:0;
position:absolute;
text-align:center;
top:0;
}
#capapopup {
background-color:#ccF;
border:3px solid #339;
height:5px;
left:50%;
overflow:hidden;
padding:4px;
position:absolute;
text-align:left;
width:4px;
}
#cerrarpopup {
background:transparent url(imagenes/cerrarpopup.png) no-repeat scroll 0 0;
cursor:pointer;
float:right;
height:28px;
width:35px;
}
#titulopopup {
background: #06F none repeat scroll 0 0;
border-bottom: 2px solid #ffc;
font-size:2em;
font-weight:bold;
height:32px;
line-height:27px;
margin-bottom:3px;
overflow:hidden;
padding:2px 3px 0 10px;
text-align:left;
}
#contenidopopup {
display:none;
opacity:0;
}
.cuerpotextopopup{padding:5px;font-size: 1.5em; font-weight:bold;}

</style>
<script>
var MiPopup = new Class({
   initialize: function(miHtml,ancho,alto,titulo){
      this.titulo=titulo;
      this.tamanoBody = window.getScrollSize();
      this.posScroll = window.getScroll();
      this.espacioDisponibleVentana = window.getSize();
      this.capaSombra = new Element("div", {'id': 'capasombra', 'style': 'width: ' + this.tamanoBody.x + 'px; height: ' + this.tamanoBody.y + 'px; ' });
      this.capaSombra.inject(document.body);
      var myFx = new Fx.Tween(this.capaSombra,{'duration': 300});
      myFx.start('opacity',0,0.8);
      
      this.contenido = new Element("div", {'id': 'contenidopopup'});
      this.contenido.set('html', "<div class=cuerpotextopopup>" + miHtml + "</div>");
      var titulo = new Element("div", {'id': 'titulopopup'});
      titulo.set('html', this.titulo);
      var cerrar = new Element("div", {'id': 'cerrarpopup'});
      cerrar.addEvent('click', function(){
         this.cerrar();
      }.bind(this));
      cerrar.inject(titulo,'top');
      titulo.inject(this.contenido,'top');
            
      this.capaPopup = new Element("div", {'id': 'capapopup', 'style': 'margin-left:-' + ancho/2 +'px; top:' + (this.posScroll.y + (this.espacioDisponibleVentana.y/2) - (alto/2)-15) +'px'});
      this.capaPopup.inject(this.capaSombra,'after');
      
      var myFx2 = new Fx.Tween(this.capaPopup,{'duration': 700});
      myFx2.start('width',4,ancho);
      myFx2.addEvent('complete', function(){
         var myFx3 = new Fx.Tween(this.capaPopup,{'duration': 700});
         myFx3.start('height',4,alto+30);
         myFx3.addEvent('complete', function(){
            this.contenido.inject(this.capaPopup);
            this.contenido.setStyle('opacity', 0);
            this.contenido.setStyle('display', 'block');
            var myFx4 = new Fx.Tween(this.contenido,{'duration': 600});
            myFx4.start('opacity',0,1);
         }.bind(this));
      }.bind(this));
      
      this.capaSombra.addEvent('click', function(){
            this.cerrar();
         }.bind(this)
      );
   },
   
   cerrar: function(){
      var myFx = new Fx.Tween(this.capaPopup,{'duration': 500});
      myFx.start('opacity',1,0);
      myFx.addEvent('complete', function(){
         var myFx2 = new Fx.Tween(this.capaSombra,{'duration': 500});
         myFx2.start('opacity',0.8,0);
         myFx2.addEvent('complete', function(){
            this.capaSombra.destroy();
            this.capaPopup.destroy();
         }.bind(this));
      }.bind(this));
   }
});

window.addEvent("domready", function(){
   $("popup1").addEvent("click", function(e){
      e.stop();
      var htmlPopup = "SISTEMA DE REGISTRO DE EX&Aacute;MENES M&Eacute;DICOS (SISTREM)<br />Versi&oacute;n: 2.0<p>Desarrolado Por: DisWeb System Computer CA, R.I.F. J-40217554-0<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8226;&nbsp;&nbsp;&nbsp;Lerma Su&aacute;rez Juan Carlos<br /><br />T.S.U. Inform&aacute;tica.<br />Contacto: 0424-7123344 y 0416-1373241<br />e-mail: lesujuca@gmail.com<br /><br />Desarrollamos software y p&aacute;ginas web. Cubriendo sus necesidades empresariales.";
      new MiPopup(htmlPopup, 500, 280, "ACERCA DE...");
   });
});
</script>
<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
<script src="Scripts/dir.js" type="text/javascript" language="javascript"></script>
<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>
<script src="Clases/rutinas_main.js" type="text/javascript" language="javascript"></script>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>SISTEMA DE REGISTRO DE EX&Aacute;MENES M&Eacute;DICOS (SISTREM)</title>
	<link type="text/css" href="jquery-ui-1.8.2.custom/development-bundle/themes/base/jquery.ui.all.css" rel="stylesheet" />
	<script type="text/javascript" src="jquery-ui-1.8.2.custom/development-bundle/jquery-1.4.2.js"></script>
	<script type="text/javascript" src="jquery-ui-1.8.2.custom/development-bundle/ui/jquery.ui.core.js"></script>
	<script type="text/javascript" src="jquery-ui-1.8.2.custom/development-bundle/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="jquery-ui-1.8.2.custom/development-bundle/ui/jquery.ui.accordion.js"></script>
	<link type="text/css" href="jquery-ui-1.8.2.custom/development-bundle/demos/demos.css" rel="stylesheet" />
	<script type="text/javascript">
	var $j = jQuery.noConflict();
	$j(function() {
		$j("#accordion").accordion({
			collapsible: true
		});
		$j("#accordion1").accordion({
			collapsible: true
		});
	});
	</script>
</head>

<body background="imagenes/15.jpg";><?php
if(!empty($_SESSION["id_usuario"])){?>
<script>
	xajax_inicio();
</script>
<table width="100%" border="0">
  <tr>
  	<td colspan="3" align="center">
	  <hr size="10" style="background:#006699">
    </td>
  </tr>
  <tr>
  	<td colspan="3" align="center"><div id="encabezado" class="encabezado">
    	<table width="100%" border="0">
		  <tr>
		    <td align="center">SISTEMA DE REGISTRO DE EX&Aacute;MENES M&Eacute;DICOS (SISTREM)</td>
		    <td width="25%">
            	<div id="Fecha">
				<script>
					<!-- This figures out what day of the week it is, and the date, and year. -->
					<!--
			        s_date = new Date();
        			var weekDay = "";

			        selectMonth = new Array(12);
        	        selectMonth[0] = "Enero";
    	            selectMonth[1] = "Febrero";
	                selectMonth[2] = "Marzo";
                	selectMonth[3] = "Abril";
            	    selectMonth[4] = "Mayo";
        	        selectMonth[5] = "Junio";
    	            selectMonth[6] = "Julio";
	                selectMonth[7] = "Agosto";
                	selectMonth[8] = "Septiembre";
            	    selectMonth[9] = "Octubre";
        	        selectMonth[10] = "Noviembre";
    	            selectMonth[11] = "Diciembre";

					if(s_date.getDay() == 1){
						weekDay = "Lunes";
					}
					if(s_date.getDay() == 2){
						weekDay = "Martes";
					}
					if(s_date.getDay() == 3){
						weekDay = "Miércoles";
					}
					if(s_date.getDay() == 4){
						weekDay = "Jueves";
					}
					if(s_date.getDay() == 5){
						weekDay = "Viernes";
					}
					if(s_date.getDay() == 6){
						weekDay = "Sábado";
					}
					if(s_date.getDay() == 7){
						weekDay = "Domingo";
					}
					if(s_date.getDay() == 0){
						weekDay = "Domingo";
					}


					var setYear = s_date.getYear();

					 var BName = navigator.appName;

					if(BName == "Netscape"){
						var setYear = s_date.getYear() + 1900;
					}

					document.write(weekDay + ", " + s_date.getDate() + " de " + selectMonth[s_date.getMonth()] + " " + setYear);

					// -->
				</script>
                </div>
            </td>
            <td rowspan="3" align="center"><a href="#" style="border:outset" onclick="xajax_cerrar_sesion()"><img src="imagenes/puerta-e7.jpg" width="67" height="89" alt="SALIR" /></a></td>
		  </tr>
		  <tr>
		    <td align="center">LABORATORIO CLÍNICO LIC. RUDY TRABUCCO VARELA</td>
		    <td>
            	<DIV id="Clock">
            	<SCRIPT language=JavaScript>

					//This script was created by Gary Perry
					//Email: shadow_chaser@hotmail.com
					//Web: http://www.garyperry.com

					//This script will display a real time clock at the top of your webpage.


					//Put this code in the body section of your webpage, and that's all
					//there is to it. No images to worry about, nothing, except it
					//only works for IE 4 and above.

					//Change the color of the font above in the div tag to match your webpage
					//colors.


					function tick() {
						var hours, minutes, seconds, ap;
						var intHours, intMinutes, intSeconds;
						var today;

						today = new Date();

						intHours = today.getHours();
						intMinutes = today.getMinutes();
						intSeconds = today.getSeconds();

						switch(intHours){
							case 0:
								intHours = 12;
								hours = intHours+":";
								ap = "A.M.";
								break;
							case 12:
								hours = intHours+":";
								ap = "P.M.";
								break;
							case 24:
								intHours = 12;
								hours = intHours + ":";
								ap = "A.M.";
								break;
							default:
								if (intHours > 12)
								{
									intHours = intHours - 12;
									hours = intHours + ":";
									ap = "P.M.";
									break;
								}
								if(intHours < 12)
								{
									hours = intHours + ":";
									ap = "A.M.";
								}
						}

						if (intMinutes < 10) {
							minutes = "0"+intMinutes+":";
						} else {
							minutes = intMinutes+":";
						}

						if (intSeconds < 10) {
							seconds = "0"+intSeconds+" ";
						} else {
							seconds = intSeconds+" ";
						}

						timeString = hours+minutes+seconds+ap;

						Clock.innerHTML = timeString;

						window.setTimeout("tick();", 100);
					}

					window.onload = tick;

				</SCRIPT>
                </DIV>
            </td>
		  </tr>
		  <tr>
		    <td align="center">RIF. V-05664207-9</td>
		    <td><?php echo $_SESSION['nom_usuario'];?></td>
		  </tr>
		</table>
    </div></td>
  </tr>
  <tr>
  	<td colspan="3" align="center">
	  <hr size="10" style="background:#006699">
    </td>
  </tr>
  <tr>
  	<td valign="top" width="18%"><div id="menuPrimario" class="menuPrimario">
  		<div class="demo">

			<div id="accordion">
				<h3><a href="#" onmousemove="window.status=''" onfocus="window.status=''"><font style="font-weight:bold">&Oacute;rdenes</font></a></h3>
				<div>
					<table cellpadding="5" align="center">
						<tr>
			            	<td><input type="button" onclick="xajax_registrar_orden()" value="Insertar" class="boton1" /></td>
            			</tr>
			            <tr>
			                <td><input type="button" onclick="xajax_consultar_orden(1)" value="Consultar" class="boton1" /></td>
            			</tr><?php
							if($_SESSION['tipo_usuario'] == 2){?>
			            <tr>
			                <td><input type="button" onclick="xajax_consultar_orden(2)" value="Eliminar" class="boton1" /></td>
            			</tr><?php
							}?>
                        <tr>
			                <td><input type="button" onclick="xajax_consultar_orden(3)" value="Reporte" class="boton1" /></td>
            			</tr>
			        </table>
				</div>
			    <h3><a href="#" onmousemove="window.status=''" onfocus="window.status=''"><font style="font-weight:bold">Resultados</font></a></h3>
				<div>
					<table cellpadding="5" align="center">
			        	<tr>
			            	<td><input type="button" onclick="xajax_incluir_resultado()" value="Insertar" class="boton1" /></td>
            			</tr>
			            <tr>
			                <td><input type="button" onclick="xajax_buscar_resultado()" value="Consultar" class="boton1" /></td>
            			</tr>
                        <tr>
			                <td><input type="button" onclick="xajax_entrega_resultado()" value="Entregar" class="boton1" /></td>
            			</tr>
                        <tr>
			                <td><input type="button" onclick="xajax_listado_produccion()" value="Producci&oacute;n" class="boton1" /></td>
            			</tr>
                        <tr>
			                <td><input type="button" onclick="xajax_listado_descuento()" value="Descuento" class="boton1" /></td>
            			</tr>
			        </table>
				</div>
				<h3><a href="#" onmousemove="window.status=''" onfocus="window.status=''"><font style="font-weight:bold">Usuarios</font></a></h3>
				<div>
					<table cellpadding="5" align="center">
			        	<tr>
			            	<td><input type="button" onclick="xajax_registrar_usuario(0)" value="Insertar" class="boton1" /></td>
            			</tr>
			            <tr>
			                <td><input type="button" onclick="xajax_consultar_usuario(1)" value="Consultar" class="boton1" /></td>
            			</tr>
			            <tr>
			            	<td><input type="button" onclick="xajax_consultar_usuario(2)" value="Modificar" class="boton1" /></td>
            			</tr>
			            <tr>
			                <td><input type="button" onclick="xajax_consultar_usuario(3)" value="Eliminar" class="boton1" /></td>
            			</tr>
                        <tr>
			                <td><input type="button" onclick="xajax_consultar_usuario(4)" value="Listado" class="boton1" /></td>
            			</tr>
			        </table>
				</div>
			    <h3><a href="#" onmousemove="window.status=''" onfocus="window.status=''"><font style="font-weight:bold">Listados</font></a></h3>
				<div>
					<table cellpadding="5" align="center">
			        	<tr>
			            	<td><input type="button" onclick="xajax_consultar_paciente(4)" value="Pacientes" class="boton1" /></td>
            			</tr>
			            <tr>
			                <td><input type="button" onclick="xajax_consultar_examen(4)" value="Ex&aacute;menes" class="boton1" /></td>
            			</tr>
			            <tr>
			            	<td><input type="button" onclick="xajax_consultar_tipo_examen(4)" value="Tipos de Ex&aacute;menes" class="boton1" /></td>
            			</tr>
                        <tr>
			                <td><input type="button" onclick="xajax_consultar_bioanalista(4)" value="Bioanalistas" class="boton1" /></td>
            			</tr>
                        <tr>
			                <td><input type="button" onclick="xajax_consultar_antibiograma(4)" value="Antibi&oacute;ticos" class="boton1" /></td>
            			</tr>
			        </table>
				</div>
			    <h3><a href="#" onmousemove="window.status=''" onfocus="window.status=''"><font style="font-weight:bold">Herramientas</font></a></h3>
				<div>
					<table cellpadding="5" align="center">
			        	<tr>
			                <td><a class="boton1" onclick="mifuncion2();" href="#">AYUDA</a></td>
            			</tr>
                        <tr>
			                <td><a class="boton1" href="calc.exe">CALCULADORA</a></td>
            			</tr>
                        <tr>
							<td>
                                <a class="boton1" href="#" id="popup1" onmousemove="window.status='Acera de...'">ACERCA DE...</a>
							</td>
            			</tr>
			        </table>
				</div>
			</div>

		</div>
  	</div></td>
    <td valign="top"><div id="principal" class="div1">&nbsp;</div></td>
  	<td valign="top" width="18%"><div id="menuSecundario" class="menuSecundario">
  		<div class="demo">

			<div id="accordion1">
				<h3><a href="#" onmousemove="window.status=''" onfocus="window.status=''"><font style="font-weight:bold">Pacientes</font></a></h3>
				<div>
					<table cellpadding="5" align="center">
						<tr>
			            	<td><input type="button" onclick="xajax_registrar_paciente(0)" value="Insertar" class="boton1" /></td>
            			</tr>
			            <tr>
			                <td><input type="button" onclick="xajax_consultar_paciente(1)" value="Consultar" class="boton1" /></td>
            			</tr>
			            <tr>
			            	<td><input type="button" onclick="xajax_consultar_paciente(2)" value="Modificar" class="boton1" /></td>
            			</tr>
			            <tr>
			                <td><input type="button" onclick="xajax_consultar_paciente(3)" value="Eliminar" class="boton1" /></td>
            			</tr>
			        </table>
				</div>
			    <h3><a href="#" onmousemove="window.status=''" onfocus="window.status=''"><font style="font-weight:bold">Bioanalista</font></a></h3>
				<div>
					<table cellpadding="5" align="center">
			        	<tr>
			            	<td><input type="button" onclick="xajax_registrar_bioanalista(0)" value="Insertar" class="boton1" /></td>
            			</tr>
			            <tr>
			                <td><input type="button" onclick="xajax_consultar_bioanalista(1)" value="Consultar" class="boton1" /></td>
            			</tr>
			            <tr>
			            	<td><input type="button" onclick="xajax_consultar_bioanalista(2)" value="Modificar" class="boton1" /></td>
            			</tr>
			            <tr>
			                <td><input type="button" onclick="xajax_consultar_bioanalista(3)" value="Eliminar" class="boton1" /></td>
            			</tr>
			        </table>
				</div>
				<h3><a href="#" onmousemove="window.status=''" onfocus="window.status=''"><font style="font-weight:bold">Ex&aacute;menes</font></a></h3>
				<div>
					<table cellpadding="5" align="center">
			        	<tr>
			            	<td><input type="button" onclick="xajax_registrar_examen(0)" value="Insertar" class="boton1" /></td>
            			</tr>
			            <tr>
			                <td><input type="button" onclick="xajax_consultar_examen(1)" value="Consultar" class="boton1" /></td>
            			</tr>
			            <tr>
			            	<td><input type="button" onclick="xajax_consultar_examen(2)" value="Modificar" class="boton1" /></td>
            			</tr>
			            <tr>
			                <td><input type="button" onclick="xajax_consultar_examen(3)" value="Eliminar" class="boton1" /></td>
            			</tr>
			        </table>
				</div>
			    <h3><a href="#" onmousemove="window.status=''" onfocus="window.status=''"><font style="font-weight:bold">Tipos de Ex&aacute;menes</font></a></h3>
				<div>
					<table cellpadding="5" align="center">
			        	<tr>
			            	<td><input type="button" onclick="xajax_registrar_tipo_examen(0)" value="Insertar" class="boton1" /></td>
            			</tr>
			            <tr>
			                <td><input type="button" onclick="xajax_consultar_tipo_examen(1)" value="Consultar" class="boton1" /></td>
            			</tr>
			            <tr>
			            	<td><input type="button" onclick="xajax_consultar_tipo_examen(2)" value="Modificar" class="boton1" /></td>
            			</tr>
			            <tr>
			                <td><input type="button" onclick="xajax_consultar_tipo_examen(3)" value="Eliminar" class="boton1" /></td>
            			</tr>
			        </table>
				</div>
			    <h3><a href="#" onmousemove="window.status=''" onfocus="window.status=''"><font style="font-weight:bold">Antibi&oacute;tico</font></a></h3>
				<div>
					<table cellpadding="5" align="center">
			        	<tr>
			            	<td><input type="button" onclick="xajax_registrar_antibiograma(0)" value="Insertar" class="boton1" /></td>
            			</tr>
			            <tr>
			                <td><input type="button" onclick="xajax_consultar_antibiograma(1)" value="Consultar" class="boton1" /></td>
            			</tr>
			            <tr>
			            	<td><input type="button" onclick="xajax_consultar_antibiograma(2)" value="Modificar" class="boton1" /></td>
            			</tr>
			            <tr>
			                <td><input type="button" onclick="xajax_consultar_antibiograma(3)" value="Eliminar" class="boton1" /></td>
            			</tr>
			        </table>
				</div>
				<h3><a href="#" onmousemove="window.status=''" onfocus="window.status=''"><font style="font-weight:bold">Valores de Referencia</font></a></h3>
				<div>
					<table cellpadding="5" align="center">
			            <tr>
			                <td><input type="button" onclick="xajax_consultar_valor(1)" value="Consultar" class="boton1" /></td>
            			</tr>
			            <tr>
			            	<td><input type="button" onclick="xajax_consultar_valor(2)" value="Modificar" class="boton1" /></td>
            			</tr>
			        </table>
				</div>
			</div>

		</div>
  	</div></td>
  </tr>
</table>
<script language="JavaScript">
	//Opacidad
	//$('encabezado').setOpacity(1);
	//$('principal').setOpacity(1);
</script><?php
}else{?>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<P ALIGN='CENTER'><span class="Estilo1">Acceso No Autorizado</span></P>
	<P ALIGN='CENTER'><span class="Estilo2">[ <a href='/sistrem3/index.html' target="_top">Conectar</A> ]</span></P><?php
}?>
</body>
</html>