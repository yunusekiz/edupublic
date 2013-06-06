			<div class="content-box"><!-- Start Content Box -->
				   
			 	<div class="content-box-header">
					<h3> <font style="margin-left:240px;">Ekip Üyesi Güncelleme Formu</font></h3>
					<div class="clear"></div>
			 	</div> <!-- End .content-box-header -->	
				
				
				  <div class="content-box-content">	
					
					 <div class="tab-content default-tab" id="1">
					
						<form action="{base}backend/ourTeam/updateTeam" method="post" enctype="multipart/form-data">
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
							{single_record}
								<p>
									<label>Ekip Üyesinin Adı </label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="t_mem_name_field"
									value="{t_mem_name}"/>
								</p><br />

								<p>
									<label>Ekip Üyesinin Soyadı </label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="t_mem_surname_field" 
									value="{t_mem_surname}" />
								</p><br />

								<p>
									<label>Ekip Üyesinin Ünvanı --Başlık-- </label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="t_mem_position_title_field"
									value="{t_mem_position_title}" />
								</p><br />								

								<p>
									<label>Ekip Üyesinin Ünvanı --Detay-- </label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="t_mem_position_detail_field"
									value="{t_mem_position_detail}" />
								</p><br />
							
								<hr><br />
																						
								<p>
									<label>Ekip Üyesinin Fecebook Hesabı</label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="t_mem_facebook_field" 
									value="{t_mem_twitter}" />
								</p><br />
								
								<p>
									<label>Ekip Üyesinin Twitter Hesabı</label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="t_mem_twitter_field" 
									value="{t_mem_twitter}" />
								</p><br />

								<p>
									<label>Ekip Üyesinin Linkedin Hesabı</label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="t_mem_linkedin_field" 
									value="{t_mem_linkedin}" />
								</p><br />								
								
								<p>
									<input type="hidden" name="t_mem_id" value="{t_mem_id}"/>
									<input class="button" type="submit" value="Kaydet" />
								</p>
							{/single_record}
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div>  <!-- End #tab1 -->      
					
				</div> <!-- End .content-box-content -->                     
                
			</div> <!-- End .content-box -->