			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3><font style="margin-left:270px;">Kayıtlı Tüm Dil Okulları</font></h3>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
			   
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
					
					<form action="{base}backend/ourTeam/operation" method="post">
						
						<table>
							
							<thead>
								<tr>
								{all_items_header_css}
									<th>Düzenle</th>
								    <th><font style="margin-left:-2px; margin-right:20px;">Sil</font></th>
								    <th><font style="margin-left:-8px; margin-right:10px;">Foto. Yükle</font></th>
								    <th><font style="margin-left:0px; margin-right:0px;">Mevcut Foto.</font></th>
								    <th>İsim</th>
								    <th>Ülke</th>
								    <th>Detay-Başlık</th>
								{/all_items_header_css}
								</tr>	
							</thead>
						 
						 
							<tbody>
								 {all_items}
								<tr>
									<td>
										<a href="updateForm/{school_id}" title="Düzenle"><img src="{base}assets/backend_assets/images/icons/pencil.png" alt="Düzenle" /></a>
									</td>
									
									<td>
										<a href="deleteItem/{school_id}" title="Sil"><img src="{base}assets/backend_assets/images/icons/cross.png" alt="Sil" /></a>
									</td>

									<td>
										<a href="photoUploadForm/{school_id}/{school_photo_id}" title="Fotoğraf Yükle"><img src="{base}assets/backend_assets/images/icons/up_2.png" alt="Fotoğraf Yükle" /></a>
									</td>

									<td class="cocukdiv_image">
										<a href="{base}{school_big_photo}" title="{school_name}">
										 	<img src="{base}{school_thumb_photo}" width="45" height="45" style="margin-bottom:-8px; margin-right:-5px;" title="mevcut fotoğraf" />
										</a>
									</td>
									<td>{school_name}</td>
									<td>{country_name}</td>
									<td>{school_summary}</td>
								</tr>
								 {/all_items}

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