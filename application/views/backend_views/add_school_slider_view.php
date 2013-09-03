			<div class="content-box"><!-- Start Content Box -->
				   
			 	<div class="content-box-header">
					<h3> <font style="margin-left:240px;">Haber Slider'ı Ekleme Formu</font></h3>
					<div class="clear"></div>
			 	</div> <!-- End .content-box-header -->	
				
				
				  <div class="content-box-content">	
					
					 <div class="tab-content default-tab" id="1">
					
						<form action="{base}backend/school_slider/controlSchoolSlider" method="post" enctype="multipart/form-data">
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Slider Fotoğrafı </label>
                                	<input type="file" name="school_slider_photo_field" accept="image/*" />
                                </p><br /><hr><br />

								<p>
									<label>Haber --Başlık--</label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="school_slider_caption_field" 
									/>
								</p><br />

								<p>
									<label>Haber  --Detay-- </label>
<!-- 									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="fb_detail_field" 
									/> -->
									<textarea class="text-input textarea" id="textarea" name="school_slider_detail_field"
									 cols="79" rows="10" style="color:#000;"></textarea>										
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