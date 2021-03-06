<div id="body-wrapper" > <!-- Wrapper for the radial gradient background -->
		
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="#">Admin Template</a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="#"><img id="logo" src="{base}assets/backend_assets/images/logo.png" alt="Simpla Admin logo" /></a>
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">

				<br />
				<a href="{base}backend/pass/changePass" title="Şifremi Değiştir" style="color:#9F6">Şifremi Değiştir</a> |
                <a href="#" title="Oturumu Kapat" style="color:#F00" data-reveal-id="myModal">Oturumu Kapat</a>
			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				
				<li>
					<a href="#" class="nav-top-item {slider_current_nav}">
						Anasayfa Düzeni
					</a>
					<ul>
						<li><a href="{base}backend/promo_slider/addPromoSlider" class="{big_slider_current}">Metin Slider'ı Ekle</a></li>
						<li><a href="{base}backend/school_slider/addSchoolSlider" class="{big_slider_current}">Haber Slider'ı Ekle</a></li>
						<li><a href="{base}backend/promo_slider/allItems" class="{big_slider_current}">Metin Slider'ı Düzenle/Sil</a></li>
						<li><a href="{base}backend/school_slider/allItems"	 class="{big_slider_current}">Haber Slider'ı Düzenle/Sil</a></li>												
					</ul>

				</li>
							
				
				
				<li> 
					<a href="#" class="nav-top-item {ref_current_nav}"> <!-- Add the class "current" to current menu item -->
					Dil Okulları
					</a>
					<ul>
						<li><a href="{base}backend/school/addSchool" class="{add_ref_current}">Dil Okulu Ekle</a></li>
						<li><a href="{base}backend/school/allItems" class="{edit_ref_current}">Dİl Okulu Düzenle/Sil</a></li> <!-- Add class "current" to sub menu items also -->
						<li><a href="{base}backend/country/addCountry" class="{edit_ref_current}">Ülke Ekle </a></li>
						<li><a href="{base}backend/country/allItems" class="{edit_ref_current}">Ülke Düzenle / Sil</a></li>
					</ul>
				</li>

				<li> 
					<a href="#" class="nav-top-item {ref_current_nav}"> <!-- Add the class "current" to current menu item -->
					Vizeler
					</a>
					<ul>
						<li><a href="{base}backend/visa/addVisa" class="{add_ref_current}">Vize Ekle</a></li>
						<li><a href="{base}backend/visa/allItems" class="{edit_ref_current}">Vize Düzenle/Sil</a></li> <!-- Add class "current" to sub menu items also -->
					</ul>
				</li>


				<li> 
					<a href="#" class="nav-top-item {ref_current_nav}"> <!-- Add the class "current" to current menu item -->
					Bildirimler
					</a>
					<ul>
						<li><a href="{base}backend/feedback/addFeedback" class="{add_ref_current}">Bildirim Ekle</a></li>
						<li><a href="{base}backend/feedback/allItems" class="{edit_ref_current}">Bildirim Düzenle/Sil</a></li> <!-- Add class "current" to sub menu items also -->
					</ul>
				</li>

				<li> 
					<a href="#" class="nav-top-item {ref_current_nav}"> <!-- Add the class "current" to current menu item -->
					Ekibimiz
					</a>
					<ul>
						<li><a href="{base}backend/ourTeam/addTeamMember" class="{add_ref_current}">Ekip Üyesi Ekle</a></li>
						<li><a href="{base}backend/ourTeam/allTeam" class="{edit_ref_current}">Ekip Üyesi Düzenle/Sil</a></li> <!-- Add class "current" to sub menu items also -->
					</ul>
				</li>																		
				

				<li> 
					<a href="#" class="nav-top-item {ref_current_nav}"> <!-- Add the class "current" to current menu item -->
					İletisim
					</a>
					<ul>
						<li><a href="{base}backend/contact/editContact" class="{add_ref_current}">İletisim Bilgilerini Düzenle</a></li>
					</ul>
				</li>	                
				
			</ul> <!-- End #main-nav -->
			
			<div id="messages" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
				
				<h3>3 Messages</h3>
			 
				<p>
					<strong>17th May 2009</strong>User<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>2nd May 2009</strong>User<br />
					Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>25th April 2009</strong>User<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
				
				<form action="" method="post">
					
					<h4>New Message</h4>
					
					<fieldset>
						<textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
					</fieldset>
					
					<fieldset>
					
						<select name="dropdown" class="small-input">
							<option value="option1">Send to...</option>
							<option value="option2">Everyone</option>
							<option value="option3">Admin</option>
							<option value="option4">Admin</option>
						</select>
						
						<input class="button" type="submit" value="Send" />
						
					</fieldset>
					
				</form>
				
			</div> <!-- End #messages -->
			
		</div></div> <!-- End #sidebar -->
        
        		<div id="main-content"> <!-- Main Content Section with everything -->	
				



			
			<!-- Page Head -->
<!-- 			<h2>Hoşgeldiniz</h2>
			<p id="page-intro">Ne Yapmak İstersiniz?</p> -->
			
<!-- 			<ul class="shortcut-buttons-set">
				
				<li><a class="shortcut-button" href="{base}backend/about/editAboutUs"><span>
					<img src="{base}assets/backend_assets/images/icons/about_us_48.png" alt="icon" /><br />
					Hakkımızda Metnini Düzenle
				</span></a></li>
				
				<li><a class="shortcut-button" href="{base}backend/contact/editContact"><span>
					<img src="{base}assets/backend_assets/images/icons/contact_48.png" alt="icon" /><br />
					İletişim Bilgilerini Düzenle
				</span></a></li> -->
				
				<!--<li><a class="shortcut-button" href="#"><span>
					<img src="{base}assets/backend_assets/images/icons/services_48.png" alt="icon" /><br />
					Hizmetlerimiz Metnini Düzenle
				</span></a></li>-->
<!-- 				<li><a class="shortcut-button" href="{base}backend/news/addNews"><span>
					<img src="{base}assets/backend_assets/images/icons/news_48.png" alt="icon" /><br />
					Yeni Bir Haber Ekle
				</span></a></li> -->
<!--				<li><a class="shortcut-button" href="#" ><span>
					<img src="{base}assets/backend_assets/images/icons/gallery_48.png" alt="icon" /><br />
					Galeriye Resim Ekle
				</span></a></li>-->
                
<!-- 				<li><a class="shortcut-button" href="{base}backend/reference/addReference" > <span>
					<img src="{base}assets/backend_assets/images/icons/references_45.gif" alt="icon" /><br />
					Yeni Bir Referans Ekle
				</span></a></li>                
				
			</ul> --><!-- End .shortcut-buttons-set -->
            
            <div class="clear"></div>
            
			<!-- Start Notifications -->
            
         <!-- Start Reveal Modal Popup -->   
		<div id="myModal" class="reveal-modal small">
			<h3><center>Oturum Kapatılıyor ?</center></h3>
            <center><a href="{base}logout"><input type="button" value="Kapat" /></a></center>
			<a class="close-reveal-modal" title="İptal">&#215;</a>
		</div>
         <!-- End Reveal Modal Popup -->