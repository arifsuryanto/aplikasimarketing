<div class="testimonial-section">
      <div class="inner-width">
        <h1>Our Developer</h1>
        <center>
        <div class="upnlogo">
          <img src="<?=base_url('template/')?>img/upn.png" alt="test-3">
        </div>
        </center>
        <div class="testimonial-pics">
          <img src="<?=base_url('template/')?>img/p1.png" alt="test-1" class="active">
          <img src="<?=base_url('template/')?>img/p2.png" alt="test-2">
          <img src="<?=base_url('template/')?>img/p3.png" alt="test-3">
          <img src="<?=base_url('template/')?>img/p4.png" alt="test-4">
        </div>

        <div class="testimonial-contents">
          <div class="testimonial active" id="test-1">
            <p>Cempe !</p>
            <span class="description">Arif Suryanto</span>
          </div>

          <div class="testimonial" id="test-2">
            <p>Dzaky !</p>
            <span class="description">Dzaky Muhammad Iqbal</span>
          </div>

          <div class="testimonial" id="test-3">
            <p>Fhrezha !</p>
            <span class="description">Fhrezha Zeaneth</span>
          </div>

          <div class="testimonial" id="test-4">
            <p>Danti !</p>
            <span class="description">Judanti Cahyaning Tyas</span>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      $('.testimonial-pics img').click(function(){
        $(".testimonial-pics img").removeClass("active");
        $(this).addClass("active");

        $(".testimonial").removeClass("active");
        $("#"+$(this).attr("alt")).addClass("active");
      });
    </script>

