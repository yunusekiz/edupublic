			<div class="content-box"><!-- Start Content Box -->
				   
			 	<div class="content-box-header">
					<h3> <font style="margin-left:240px;">Yeni Promotion Slider Ekleme Formu</font></h3>
					<div class="clear"></div>
			 	</div> <!-- End .content-box-header -->	
				
				
				  <div class="content-box-content">	
					
					 <div class="tab-content default-tab" id="1">
					
						<form action="{base}backend/slider/controlPromoSlider" method="post" enctype="multipart/form-data">
							<br />
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->						
								
								<p>
									<label>Slider Büyük Metin (max 3 kelime) </label>               
									<input class="text-input large-input" type="text" 
									style="color:#000;" id="large-input" name="big_text_field" />
								</p><br /><hr><br />		
								<p>
									<label>Slider Küçük Metin --Üst-- (max 5 kelime) </label>               
									<input class="text-input large-input" type="text" 
									style="color:#000;" id="large-input" name="little_text_1_field" />
								</p><br />
								<p>
									<label>Slider Küçük Metin --Alt-- (max 5 kelime) </label>               
									<input class="text-input large-input" type="text" 
									style="color:#000;" id="large-input" name="little_text_2_field" />
								</p>									
								<div class="clear"></div>
								
								<p>
									<input class="button" type="submit" value="Kaydet" />
								</p>


								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div>  <!-- End #tab1 -->      
					
				</div> <!-- End .content-box-content -->                     
                
			</div> <!-- End .content-box -->