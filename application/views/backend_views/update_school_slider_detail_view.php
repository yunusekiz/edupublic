			<div class="content-box"><!-- Start Content Box -->
				   
			 	<div class="content-box-header">
					<h3> <font style="margin-left:240px;">Haber Slider'ı Güncelleme Formu</font></h3>
					<div class="clear"></div>
			 	</div> <!-- End .content-box-header -->	
				
				
				  <div class="content-box-content">	
					
					 <div class="tab-content default-tab" id="1">
					
						<form action="{base}backend/school_slider/updateItemDetail" method="post" enctype="multipart/form-data">
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
							{item_detail}
								<p>
									<label>Haber --Başlık--</label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="slider_caption"
									value="{slider_caption}" 
									/>
								</p><br />
								<p>
									<label>Haber  --Detay-- </label>
<!-- 									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="fb_detail_field" 
									/> -->
									<textarea class="text-input textarea" id="textarea" name="slider_detail"
									 cols="79" rows="10" style="color:#000;">{slider_detail}</textarea>										
								</p><br />
								<p>
									<input type="hidden" name="id" value="{slider_id}"/>
									<input class="button" type="submit" value="Kaydet" />
								</p>

							{/item_detail}			
							
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div>  <!-- End #tab1 -->      
					
				</div> <!-- End .content-box-content -->                     
                
			</div> <!-- End .content-box -->