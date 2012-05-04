<div id="breadcrumbs">
				<?php 
				//print "El id actual es " . $cat_ID;
				
				$idCategoria = 0;
				$muestraCompleto = false;
				if (is_page() || is_single()):
					$category = get_the_category();
					$idCategoria = $category[0]->cat_ID;
					$muestraCompleto = true;
				else:
					$idCategoria = get_cat_id( single_cat_title("",false) );//$category[0]->cat_ID;
				endif;
				//$idCategoria = get_cat_ID(single_cat_title( '', false ));
				$navegacion = get_category_parents($idCategoria,true,',',false); 
				$elementosNavegacion = explode(",",$navegacion);
				if (in_category('veracruzanos-tv') || in_category('la-entrevista') || in_category('voto-veracruz') || in_category('sucesion-presidencial')):
					//Navegación especial
					print "<div class='navegacionEspecial'>";
					print "<a href='".get_bloginfo('wpurl')."'>Inicio</a>";
					
					$numElementos = count($elementosNavegacion) - 1;
					$elemMenu = 1;
					foreach ($elementosNavegacion as $item){
						if (!empty($item)):
							if ($elemMenu == $numElementos):
								if ($muestraCompleto):
									print " / <h1 class='title-list'><span>" . $item . "</span></h1>";
								else:
									print " / ";
								endif;
								//continue;
							else:
								print " / " . $item;
							endif;
							$elemMenu++;
						endif;
					}
				else:
					//Navegacion normal
					print "<div class='navegacionNormal'>";
					print "<a href='".get_bloginfo('wpurl')."'>Inicio</a>";
					$numElementos = count($elementosNavegacion) - 1;
					$elemMenu = 1; 
					foreach ($elementosNavegacion as $item){
						if (!empty($item)):
							if ($elemMenu == $numElementos):
								if ($muestraCompleto):
									print " / " . $item;
								else:
									print " / ";
								endif;
								//continue;
							else:
								print " / " . $item;
							endif;
							$elemMenu++;
						endif;
					}
				endif;
				print "</div>";
			//print $navegacion;
				?>
			</div>