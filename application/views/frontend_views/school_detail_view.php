	<div class="page pad-top-page" id="about" >
  {school_parser_data}  
    <section class="container-fluid full-bg">
      <div class="row-fluid">
        <section class="container">

          <div class="row add-top add-bottom">
            <article class="span12">
              <h1 class="main-heading col-white">{school_name}</h1>
              <div><p class="sub-heading col-white">{school_summary}</p></div>
            </article>
          </div><!-- row : ends -->

        </section>
      </div>
    </section>

    <section class="container-fluid about-inner">
      <div class="row-fluid">
        <section class="container">

          <div class="row add-top add-bottom">
            <article class="span4 image center-mobile">
              <img src="{base}{school_big_photo}"/>
            </article>
            <article class="span8 col-white center-mobile">
              <h3>Detaylar</h3>
              <p>{school_detail}</p>
            </article>
          </div><!-- row : ends -->

        </section>
      </div>
    </section>

</div> <!-- page : ends -->
{/school_parser_data}
