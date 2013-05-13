			<div class="content-box"><!-- Start Content Box -->
				   
			 	<div class="content-box-header">
					<h3> <font style="margin-left:240px;">Yeni Vize Detayı Ekleme Formu</font></h3>
					<div class="clear"></div>
			 	</div> <!-- End .content-box-header -->	
				
				
				  <div class="content-box-content">	
					
					 <div class="tab-content default-tab" id="1">
					
						<form action="{base}backend/visa/controlVisa" method="post" enctype="multipart/form-data">
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label><b style="font-size:16px;">Ülke Fotoğrafı</b> </label>
									<!--<input type="file" name="resimler[]" class="multi" accept="gif|jpg|png" /><br />-->
                                	<input type="file" name="visa_photo_field" accept="image/*" />
                                </p><br /><hr><br />

								<p>
									<label>Başlık (ülke adı) </label>
									<input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="visa_title_field" 
									/>
								</p><br />							

								<p>
									<label>Detay (vize detayı) </label>
									<textarea class="text-input textarea" id="textarea" name="visa_detail_field" cols="79" rows="10" style="color:#000;"></textarea>									
									<!-- <input class="text-input large-input" type="text"
									style="color:#000;" id="large-input" name="fb_detail_field" 
									/> -->
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