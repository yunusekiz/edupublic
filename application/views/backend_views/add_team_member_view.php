			<div class="content-box"><!-- Start Content Box -->
				   
			 	<div class="content-box-header">
					<h3> <font style="margin-left:240px;">Yeni Ekip Üyesi Ekleme Formu</font></h3>
					<div class="clear"></div>
			 	</div> <!-- End .content-box-header -->	
				
				
				  <div class="content-box-content">	
					
					 <div class="tab-content default-tab" id="1">
					
						<form action="{base}backend/ourTeam/controlTeam" method="post" enctype="multipart/form-data">
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label><b style="font-size:16px;">Ekip Üyesinin Fotoğrafı</b> </label>
									<!--<input type="file" name="resimler[]" class="multi" accept="gif|jpg|png" /><br />-->
                                	<input type="file" name="t_mem_photo_field" accept="image/*" />
                                </p><br /><hr><br />

								<p>
									<label>Ekip Üyesinin Adı </label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="t_mem_name_field" 
									/>
								</p><br />

								<p>
									<label>Ekip Üyesinin Soyadı </label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="t_mem_surname_field" 
									/>
								</p><br />

								<p>
									<label>Ekip Üyesinin Ünvanı --Başlık-- </label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="t_mem_position_title_field" 
									/>
								</p><br />								

								<p>
									<label>Ekip Üyesinin Ünvanı --Detay-- </label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="t_mem_position_detail_field" 
									/>
								</p><br />
							
								<hr><br />
																						
								<p>
									<label>Ekip Üyesinin Fecebook Hesabı</label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="t_mem_facebook_field" 
									value="" />
								</p><br />
								
								<p>
									<label>Ekip Üyesinin Twitter Hesabı</label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="t_mem_twitter_field" 
									value="" />
								</p><br />

								<p>
									<label>Ekip Üyesinin Linkedin Hesabı</label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="t_mem_linkedin_field" 
									value="" />
								</p><br />								
								
								<p>
									<input class="button" type="submit" value="Kaydet" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div>  <!-- End #tab1 -->      
					
				</div> <!-- End .content-box-content -->                     
                
			</div> <!-- End .content-box -->