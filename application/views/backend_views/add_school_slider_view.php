			<div class="content-box"><!-- Start Content Box -->
				   
			 	<div class="content-box-header">
					<h3> <font style="margin-left:240px;">Dil Okulu Slider'ı Ekleme Formu</font></h3>
					<div class="clear"></div>
			 	</div> <!-- End .content-box-header -->	
				
				
				  <div class="content-box-content">	
					
					 <div class="tab-content default-tab" id="1">
					
						<form action="{base}backend/school_slider/controlSchoolSlider" method="post" enctype="multipart/form-data">
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Dil Okulu Seçenekleri </label>              
									<select name="school_field" class="small-input" style="color:#000;">
										<option value="0">Dil Okulu Seçiniz</option>
										{schools}
										<option value="{school_id}">{school_name}</option>
										{/schools}
									</select> 
								</p><br /><br />
								<label>(Bilgi ::: yeni bir slider ekleyebilmek için önce dil okulu seçmelisiniz)</label> 
								<br /><hr><br />
								<p>
									<label>Slider Fotoğrafı </label>
                                	<input type="file" name="school_slider_photo_field" accept="image/*" />
                                </p><br /><hr><br />

								<p>
									<label>Slider Açıklaması </label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="school_slider_caption_field" 
									/>
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