			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3><font style="margin-left:270px;">Kayıtlı Tüm Ekip Üyeleri</font></h3>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
			   
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
					
					<form action="{base}backend/ourTeam/operation" method="post">
						
						<table>
							
							<thead>
								<tr>
								{all_team_members_header_css}
									<th>Düzenle</th>
								    <th><font style="margin-left:-2px; margin-right:20px;">Sil</font></th>
								    <th><font style="margin-left:-8px; margin-right:10px;">Foto. Yükle</font></th>
								    <th><font style="margin-left:0px; margin-right:0px;">Mevcut Foto.</font></th>
								    <th>İsim</th>
								    <th>Ünvan</th>
								    <th>Facebook</th>
								{/all_team_members_header_css}
								</tr>	
							</thead>
						 
						 
							<tbody>
								 {all_team_members}
								<tr>
									<td>
										<a href="updateForm/{t_mem_id}" title="Düzenle"><img src="{base}assets/backend_assets/images/icons/pencil.png" alt="Düzenle" /></a>
									</td>
									
									<td>
										<a href="deleteItem/{t_mem_id}" title="Sil"><img src="{base}assets/backend_assets/images/icons/cross.png" alt="Sil" /></a>
									</td>

									<td>
										<a href="photoUploadForm/{t_mem_id}/{t_mem_photo_id}" title="Fotoğraf Yükle"><img src="{base}assets/backend_assets/images/icons/up_2.png" alt="Fotoğraf Yükle" /></a>
									</td>

									<td class="cocukdiv_image">
										<a href="{base}{t_mem_big_photo}" title="{t_mem_name}">
										 	<img src="{base}{t_mem_thumb_photo}" width="45" height="45" style="margin-bottom:-8px; margin-right:-5px;" title="mevcut fotoğraf" />
										</a>
									</td>
									<td>{t_mem_name}</td>
									<td>{t_mem_position_title}</td>
									<td>{t_mem_facebook}</td>
								</tr>
								 {/all_team_members}

							</tbody>
							
							<tfoot>
								<tr>
									<td colspan="6">
<!-- 										<div class="bulk-actions align-left">
											{submit_button_css}
											<input type="submit" class="button" value="Seçili Eylemi Uygula" />
											{/submit_button_css}
										</div> -->
										<!-- <a class="button" href="#">Seçili Eylemi Uygula</a> -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
									</td>
								</tr>
							</tfoot>							


						</table>

					  </form>	
						
					</div> <!-- End #tab1 -->
					     
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->