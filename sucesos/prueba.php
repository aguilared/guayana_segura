
<tbody>
							<?php
								$rs_sucesos_ano_ant_m = $db->Execute($sql_sucesos_ano_ant_meses);
								while(!$rs_sucesos_ano_ant_m->EOF){
									echo '<tr>';
										echo '<td><a target="_blank" href="lis_homicidios_con_ano_caro.php?ano='.$rs_sucesos_ano_ant_m->Fields('ano').'" class="btn btn-primary btn-sm">'.$ano_ant.'</a></td>';
										echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$rs_sucesos_ano_ant_m->Fields('ano').'&mes='.$mes1.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('1').'</a></td>';
										echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$rs_sucesos_ano_ant_m->Fields('ano').'&mes='.$mes2.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('2').'</a></td>';
										echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$rs_sucesos_ano_ant_m->Fields('ano').'&mes='.$mes3.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('3').'</a></td>';
										echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$rs_sucesos_ano_ant_m->Fields('ano').'&mes='.$mes4.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('4').'</a></td>';
										echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$rs_sucesos_ano_ant_m->Fields('ano').'&mes='.$mes5.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('5').'</a></td>';
										echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$rs_sucesos_ano_ant_m->Fields('ano').'&mes='.$mes6.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('6').'</a></td>';
										echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$rs_sucesos_ano_ant_m->Fields('ano').'&mes='.$mes7.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('7').'</a></td>';
										echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$rs_sucesos_ano_ant_m->Fields('ano').'&mes='.$mes8.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('8').'</a></td>';
										echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$rs_sucesos_ano_ant_m->Fields('ano').'&mes='.$mes9.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('9').'</a></td>';
										echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$rs_sucesos_ano_ant_m->Fields('ano').'&mes='.$mes10.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('10').'</a></td>';
										echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$rs_sucesos_ano_ant_m->Fields('ano').'&mes='.$mes11.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('11').'</a></td>';
										echo '<td><a target="_blank" href="lis_homicidios_con_ano_mes_caro.php?ano='.$rs_sucesos_ano_ant_m->Fields('ano').'&mes='.$mes12.'" class="btn btn-primary btn-sm">'.$rs_sucesos_ano_ant_m->Fields('12').'</a></td>';
									echo '</tr>';
									$rs_sucesos_ano_ant_m->MoveNext();
								}
								$rs_sucesos_ano_ant_m->MoveFirst()
							?>

							</tbody>