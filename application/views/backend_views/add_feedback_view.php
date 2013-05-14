			<div class="content-box"><!-- Start Content Box -->
				   
			 	<div class="content-box-header">
					<h3> <font style="margin-left:240px;">Yeni Bildirim Ekleme Formu</font></h3>
					<div class="clear"></div>
			 	</div> <!-- End .content-box-header -->	
				
				
				  <div class="content-box-content">	
					
					 <div class="tab-content default-tab" id="1">
					
						<form action="{base}backend/feedback/controlFeedback" method="post" enctype="multipart/form-data">
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label><b style="font-size:16px;">Öğrencinin Fotoğrafı</b> </label>
									<!--<input type="file" name="resimler[]" class="multi" accept="gif|jpg|png" /><br />-->
                                	<input type="file" name="fb_photo_field" accept="image/*" />
                                </p><br /><hr><br />

								<p>
									<label>Öğrencinin Adı </label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="fb_student_name_field" 
									/>
								</p><br />

								<p>
									<label>Öğrencinin Soyadı </label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="fb_student_surname_field" 
									/>
								</p><br />

								<p>
									<label>Bildirim --Başlık-- </label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="fb_title_field" 
									/>
								</p><br />								

								<p>
									<label>Bildirim  --Detay-- </label>
<!-- 									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="fb_detail_field" 
									/> -->
									<textarea class="text-input textarea" id="textarea" name="fb_detail_field"
									 cols="79" rows="10" style="color:#000;"></textarea>										
								</p><br />
							
								<hr><br />
																						
								<p>
									<label>Ülke</label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="fb_country_field" 
									value="" />
								</p><br />
								
								<p>
									<label>Dil Okulu</label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="fb_lang_school_field" 
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