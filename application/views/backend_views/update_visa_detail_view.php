			<div class="content-box"><!-- Start Content Box -->
				   
			 	<div class="content-box-header">
					<h3> <font style="margin-left:240px;">Vize Detayı Güncelleme Formu</font></h3>
					<div class="clear"></div>
			 	</div> <!-- End .content-box-header -->	
				
				
				  <div class="content-box-content">	
					
					 <div class="tab-content default-tab" id="1">
					
						<form action="{base}backend/visa/updateItemDetail" method="post" enctype="multipart/form-data">
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
							{item_detail}	
								<p>
									<label>Başlık (ülke adı) </label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="visa_title_field" value="{visa_title}"
									/>
								</p><br />							

								<p>
									<label>Detay (vize detayı) </label>
									<textarea class="text-input textarea" id="textarea" name="visa_detail_field" cols="79" rows="10" style="color:#000;">{visa_detail}</textarea>									
									<!-- <input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="fb_detail_field" 
									/> -->
								</p><br />
								
								<p>
									<input type="hidden" name="id" value="{visa_id}"/>
									<input class="button" type="submit" value="Kaydet" />
								</p>
							{/item_detail}	
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div>  <!-- End #tab1 -->      
					
				</div> <!-- End .content-box-content -->                     
                
			</div> <!-- End .content-box -->