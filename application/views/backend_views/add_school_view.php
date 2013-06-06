			<div class="content-box"><!-- Start Content Box -->
				   
			 	<div class="content-box-header">
					<h3> <font style="margin-left:240px;">Yeni Dil Okulu Ekleme Formu</font></h3>
					<div class="clear"></div>
			 	</div> <!-- End .content-box-header -->	
				
				
				  <div class="content-box-content">	
					
					 <div class="tab-content default-tab" id="1">
					
						<form action="{base}backend/school/controlSchool" method="post" enctype="multipart/form-data">
							<br />
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

								<p>
									<label>Ülke Seçenekleri </label>              
									<select name="country_field" class="small-input" style="color:#000;">
										<option value="0"> Ülke Seçiniz</option>
										{countries}
										<option value="{country_id}">{country_name}</option>
										{/countries}
									</select> 
								</p><br />

								<hr width="100%" style="margin-top:10px;" /><br /><br />							
								
								<p>
									<label>Dil Okulunun Adı </label>               
									<input class="text-input large-input" type="text" 
									style="color:#000;" id="large-input" name="school_name_field" />
									<br />
									<label>(Bilgi ::: yeni bir dil okulu ekleyebilmek için önce ülke seçmelisiniz)</label> 
								</p>	<br /><br />
								
								<p>
									<label>Dil Okulunun Resmi </label>
                               		 <input type="file" name="school_image_form_field" accept="image/*" />
                                <br/>	<br/>
                                </p>

								<div class="clear"></div>
								<hr>
									<br /><br />														
								<p>
									<label>Dil Okulu Açıklama --Özet-- (max. 35 kelime)</label>
									<textarea class="text-input textarea" id="textarea" name="school_summary_field"
									 	cols="79" rows="5" style="color:#000;"></textarea>	
								</p><br />
								
								<p>
									<label>Dil Okulu Açıklama --Detay--</label>
									<textarea class="text-input textarea" id="textarea" name="school_detail_field"
									 	cols="79" rows="12" style="color:#000;"></textarea>	
								</p>
								
								<p>
									<input class="button" type="submit" value="Kaydet" />
								</p>


								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div>  <!-- End #tab1 -->      
					
				</div> <!-- End .content-box-content -->                     
                
			</div> <!-- End .content-box -->