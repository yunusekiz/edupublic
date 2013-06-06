			<div class="content-box"><!-- Start Content Box -->
				   
			 	<div class="content-box-header">
					<h3> <font style="margin-left:240px;">Bildirim Güncelleme Formu</font></h3>
					<div class="clear"></div>
			 	</div> <!-- End .content-box-header -->	
				
				
				  <div class="content-box-content">	
					
					 <div class="tab-content default-tab" id="1">
					
						<form action="{base}backend/feedback/updateItemDetail" method="post" enctype="multipart/form-data">
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
							{item_detail}	
								<p>
									<label>Öğrencinin Adı </label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="fb_student_name_field" value="{fb_student_name}"
									/>
								</p><br />

								<p>
									<label>Öğrencinin Soyadı </label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="fb_student_surname_field" value="{fb_student_surname}"
									/>
								</p><br />

								<p>
									<label>Bildirim --Başlık-- </label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="fb_title_field" value="{fb_title}"
									/>
								</p><br />								

								<p>
									<label>Bildirim  --Detay-- </label>
<!-- 									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="fb_detail_field" 
									/> -->
									<textarea class="text-input textarea" id="textarea" name="fb_detail_field"
									 cols="79" rows="10" style="color:#000;">{fb_detail}</textarea>										
								</p><br />
							
								<hr><br />
																						
								<p>
									<label>Ülke</label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="fb_country_field" value="{fb_country}"
									value="" />
								</p><br />
								
								<p>
									<label>Dil Okulu</label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="fb_lang_school_field" value="{fb_lang_school}"
									value="" />
								</p><br />								
								
								<p>
									<input type="hidden" name="id" value="{fb_id}"/>
									<input class="button" type="submit" value="Kaydet" />
								</p>
							{/item_detail}	
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div>  <!-- End #tab1 -->      
					
				</div> <!-- End .content-box-content -->                     
                
			</div> <!-- End .content-box -->