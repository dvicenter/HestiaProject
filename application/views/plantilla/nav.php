				<div class="datos_usuarios">
					<div>
						<div class="imagen_dato_usuario">
							<img src="<?php echo base_url("public/img/demo.jpg")?>"/>
						</div>
						<div class="divisor"></div>
						<div class="texto_dato_usuario">
							<p>							 
								<b>Usuario:</b>
								<i><?php echo $this->session->userdata('NombreUsuario')?></i><br>
								<b>Persona:</b>
								<i><?php echo $this->session->userdata('Persona')?></i><br>
								<b>Sucursal:</b>
								<i><?php echo $this->session->userdata('CentroAtencion')?>
									<a><img class="link_dato_usuario" title="Editar Datos" src="<?php echo base_url('public/img/editar_usuario_16x16.png')?>"/></a>
									<a href="<?php echo base_url('index.php/login/cerrarSesion')?>"><img class="link_dato_usuario" title="Cerrar Sesión" src="<?php echo base_url('public/img/cerrar_sesion_16x16.png')?>"/></a>
								</i>
							</p>
						</div>
					</div>
				</div>
				
				<nav>
					<ul class="nav nav-list">
					<?php
					
						function tienePermiso($id,$permisos)
						{
							foreach ($permisos as $key => $value)
							{
									if($value['ClavePermiso']==$id)
									{
										return true;
									}
							}
							return false;
						}
						$menu=array(
						 			array("nombreMenu"=>"Gestión de Asistencia","padre"=>"true","id"=>"p_gestion_asistencia","data-target"=>"gestion_asistencia","icon"=>"asistencia_16x16.png",
						 	  		"submenu"=>array(
						 	  		 				 array("data-id"=>"marcadoasistencia","nombreSubMenu"=>"Marcado de Asistencia","icon"=>"icon-chevron-right","href"=>"index.php/asistencia/gestion_asistencia/marcadoAsistenciaIndex"))),
									array("nombreMenu"=>"Gestión de Beneficiados","padre"=>"true","id"=>"p_gestion_beneficiado","data-target"=>"gestion_beneficiado","icon"=>"asistencia_16x16.png",
						 	  		"submenu"=>array(
						 	  		 				 array("data-id"=>"consultabeneficiado","nombreSubMenu"=>"Consulta de Beneficiados","icon"=>"icon-chevron-right","href"=>"index.php/beneficiado/gestion_beneficiado/consultaBeneficiadoIndex")))
						);
						foreach ($menu as $key => $value) 
						{
							$menuTemporal=$value;
							if($menuTemporal['padre']=="true")
							{
								echo '<div id='.$menuTemporal['id'].' data-toggle="collapse"'.' data-target="#'.$menuTemporal['data-target'].'"><li class="nav-header"><img src="'.base_url("public/img/".$menuTemporal['icon'].'"').">".$menuTemporal['nombreMenu'].'</li></div>';
								echo '<div id='.$menuTemporal['data-target'].' class="collapse" data-parent="#'.$menuTemporal['id'].'">';
								echo '<li class="divider"></li>';
								foreach ($menuTemporal['submenu'] as $keySubMenu => $valueMenu) 
								{
									$subMenuTemporal=$valueMenu;
									if(tienePermiso($subMenuTemporal["data-id"],$this->session->userdata('Acl')))
									{
									echo '<li class="item_menu_nav" ><a data-id='.$subMenuTemporal["data-id"].' href="'.base_url("".$subMenuTemporal['href'].'"').'"><i class="'.$subMenuTemporal['icon'].'"></i>'.$subMenuTemporal['nombreSubMenu'].'</a></li>';
									} 																	
								}	
								echo "</div>";
							}
							
						}
					?>						
						<!--
						
						  <div id="p_gestion_asistencia" data-toggle="collapse" data-target="#gestion_asistencia"><li class="nav-header"><img src="<?php echo base_url("public/img/asistencia_16x16.png")?>">Gestión de Asistencia</li></div>
						  <div id="gestion_asistencia" class="collapse out" data-parent="#p_gestion_asistencia">
							  <li class="divider"></li>
							  <li class="item_menu_nav" ><a data-id="marcadoAsistencia" href="<?php echo base_url("index.php/asistencia/gestionAsistencia/marcadoAsistencia")?>"><i class="icon-chevron-right"></i>Marcado de Asistencia</a></li>						  
							  <li class="item_menu_nav" ><a href="#"><i class="icon-chevron-right"></i>Lorem Ipsum</a></li>
							  <li class="item_menu_nav" ><a href="#"><i class="icon-chevron-right"></i>Lorem Ipsum</a></li>
							  <li class="item_menu_nav" ><a href="#"><i class="icon-chevron-right"></i>Lorem Ipsum</a></li>
						  </div>
						  -->
					
					</ul>
					
					
					
				</nav>
  