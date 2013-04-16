	<div class="page pad-top-page" id="about" >
    <section class="container-fluid full-bg">
      <div class="row-fluid">
        <section class="container">

          <div class="row add-top add-bottom">
            <article class="span12">
              <h1 class="main-heading col-white">Ekibimiz</h1>
              <div><p class="sub-heading col-white"><span class="major">ekibimiz</span> ve üstlendikleri görevler</p></div>
            </article>
          </div><!-- row : ends -->

          <div class="row add-top-half add-bottom">
            {our_team_loop}
            <article class="span3 col-white about-team-block center-mobile">
              <img alt="edupublic our team" title="edupublic our team" class="image" src="{team_member_big_photo}"/>
              <h4>{team_member_name}</h4>
              <p class="about-team-des">{team_member_position_title}</p>
              <p>{team_member_position_detail}</p>
              <nav class="about-team-social">
                <a href="#"><img alt="edupublic our team" title="twitter"   src="{base}assets/images/icons/t01.png"/></a>
                <a href="#"><img alt="edupublic our team" title="facebook"  src="{base}assets/images/icons/t02.png"/></a>
                <a href="#"><img alt="edupublic our team" title="linkedin"  src="{base}assets/images/icons/t03.png"/></a>
              </nav>
            </article>
            {/our_team_loop}
          </div><!-- row : ends -->

        </section>
      </div>
    </section>
  </div> <!-- page : ends -->