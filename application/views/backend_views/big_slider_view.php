 <br /><br /><br />
<div class="content-box"><!-- Start Content Box -->
				          
             <div class="content-box-header">
				<h3> <font style="margin-left:230px;">Anasayfa Büyük Slider Düzenleme Formu</font></h3>
							 
			</div> <!-- End .content-box-header -->     
			
           		<div class="content-box-content">
            					
					<div class="tab-content default-tab" id="1">                 
					
						<form action="{base}backend/slider/imageUploadToBigSlider" method="post" enctype="multipart/form-data" >
						
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->											

								<p>
									<label> Büyük Slider' ın mevcut resimleri </label>
								</p>
								<div class="anadiv_cerceve_dis">
                 
                  				{buyuk_slider_detaylari}
									<div class="anadiv_cerceve_ic">
         								<div class="cocukdiv_image">
            								<a href="{base}{big_image_path}" title="{image_title}">
                								<img src="{base}{thumb_image_path}" width="80" height="80" alt="" />
            								</a>
          								</div>
          							<a href="deleteBigSlider/{id}">
          								<div class="cocukdiv_icon"><img src="{base}assets/backend_assets/lightbox_images/delete.png" title="Resmi Sil" /></div>
          								<div class="cocukdiv_icon_text"> Resmi Sil</div>  
          							</a>
									</div>
                  				{/buyuk_slider_detaylari}
                                          
								</div>
							</fieldset>
              <div class="clear"></div><!-- End .clear -->        
                    
                   <br/><hr><br/>
                  
              <p>
                  <label> Büyük Slider' a yeni resim yüklemek için dosya seçin :  </label>
              </p>
								
                  <input type="file" name="big_slider_image_form_field" accept="image/*" />
                   <br/><br/><br/>
              <p>
								<label> Seçtiğiniz resme isim verin :  </label>
								<input class="text-input large-input" type="text" style="color:black" id="large-input" name="big_slider_title_form_field" />
							</p>
							</br>
							<p>
								<input class="button" type="submit" value="Yeni Resmi Kaydet" />
							</p> 
						</form>
						
					</div>  <!-- End #tab1 -->      
					
				</div> <!-- End .content-box-content -->                      
                
			</div> <!-- End .content-box --> 