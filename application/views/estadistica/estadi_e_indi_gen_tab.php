<div class="container">
  <div class="card">
    <div class="card-header">ALUMNOS</div>
    <div class="card-body">
      <div><?= $srt_tab_alumnos?>  </div>
    </div><!-- card-body -->
  </div><!-- card -->

  <div class="card">
    <div class="card-header">PERSONAL DOCENTE</div>
    <div class="card-body">
      <div><?= $srt_tab_pdocentes?>  </div>
    </div><!-- card-body -->
  </div><!-- card -->
</div><!-- container -->

<div class="card">
  <div class="card-header">INFRAESTRUCTURA</div>
  <div class="card-body">
    <div><?= $srt_tab_infraestructura?>  </div>
  </div><!-- card-body -->
</div><!-- card -->
</div><!-- container -->

<script>
$(function () {
  $(".hide-ini").css("display","none");

  $('tr.parent').css("cursor","pointer").attr("title","Click para expander/contraer").click(function()
    {
      if($(this).siblings('.child-'+this.id).is(":visible"))
      {
        $(this).find('img').css("transform", "rotate(360deg)");
          $(this).siblings('.child-'+this.id).fadeOut('500');
          $(this).siblings('.child-'+this.id).siblings('.class-hide-'+this.id).fadeOut('500');
      }
      else
      {
        $(this).find('img').css("transform", "rotate(270deg)");
            $(this).siblings('.child-'+this.id).fadeIn('500');
      }
    });

    $('tr.child-parent').css("cursor","pointer").attr("title","Click para expander/contraer").click(function()
    {

          if($(this).siblings('.nieto-'+this.id).is(":visible"))
              {
                $(this).find('img').css("transform", "rotate(360deg)");
                    $(this).siblings('.nieto-'+this.id).fadeOut('500');
                    $(this).siblings('.nieto-'+this.id).siblings('.class-hide-'+this.id).fadeOut('500');
              }
              else
              {
                $(this).find('img').css("transform", "rotate(270deg)");
                    $(this).siblings('.nieto-'+this.id).fadeIn('500');
              }
    });

    $('tr.child-nieto').css("cursor","pointer").attr("title","Click para expander/contraer").click(function()
    {
        if($(this).siblings('.bisnieto-'+this.id).is(":visible"))
        {
          $(this).find('img').css("transform", "rotate(360deg)");
              $(this).siblings('.bisnieto-'+this.id).fadeOut('500');
        }
        else
        {
          $(this).find('img').css("transform", "rotate(270deg)");
              $(this).siblings('.bisnieto-'+this.id).fadeIn('500');
        }
    });
});

</script>
