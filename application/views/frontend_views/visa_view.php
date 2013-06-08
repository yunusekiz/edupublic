  <div class="page pad-top-page" id="services" >    
    <section class="container-fluid full-bg">
      <div class="row-fluid">
        <section class="container">

          <div class="row add-top add-bottom">
            <article class="span12">
              <h1 class="main-heading col-white">Vizeler</h1>
              <div><p class="sub-heading col-white"><span class="major"></span></p></div>
            </article>
          </div><!-- row : ends -->

        </section>
      </div>
    </section>


    <section class="container-fluid services-inner">
      <div class="row-fluid">
        <section class="container">

          <div class="row add-top">
            <article class="span12 col-white">
            <h3 class="inner-sub-caps">Vizeler</h3>
            </article>
          </div>

          <div class="row add-top-half add-bottom">
          {visas_parser_data}  
            <article class="span4 image align-center col-white services-block center-mobile">
              <img alt="edupublic by edupublic" title="{visa_title}" src="{base}{visa_big_photo}"/>
              <h4>{visa_title}</h4>
              <p>{visa_detail}</p>
            </article>
          {/visas_parser_data}
          </div><!-- row : ends -->

        </section>
      </div>
    </section>

  </div> <!-- page : ends -->