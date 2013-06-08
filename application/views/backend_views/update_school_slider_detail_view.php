			<div class="content-box"><!-- Start Content Box -->
				   
			 	<div class="content-box-header">
					<h3> <font style="margin-left:240px;">Dil Okulu Slider'ı Güncelleme Formu</font></h3>
					<div class="clear"></div>
			 	</div> <!-- End .content-box-header -->	
				
				
				  <div class="content-box-content">	
					
					 <div class="tab-content default-tab" id="1">
					
						<form action="{base}backend/school_slider/updateItemDetail" method="post" enctype="multipart/form-data">
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Dil Okulu Seçenekleri </label>              
									<select name="school_field" class="small-input" style="color:#000;">
										<option value="0">Dil Okulu Seçiniz</option>
										{schools}
										<option value="{school_id}">{school_name}</option>
										{/schools}
									</select> 
								</p><br /><br /><hr><br />
							{item_detail}
								<p>
									<label>Kayıtlı Olan Dil Okulu </label>               
									<input class="text-input large-input" type="text" 
									style="color:#000;" id="large-input" value="{school_name}" readonly/>
									<input type="hidden" name="school_id_hidden" value="{school_id}"/>
								</p><br />
									<hr width="100%" style="margin-top:10px;" /><br />
								<p>
									<label>Slider Açıklaması </label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="school_slider_caption_field" value="{slider_caption}"
									/>
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