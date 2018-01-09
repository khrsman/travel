    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Dashboard</h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
        <section class="content" id="page_content">
          <!-- <btn type="button" name="button" class="btn btn-flat bg-purple" id='toogle_jenis_surat'>Jenis Surat </btn> -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">Page</h3>

                      </div>
                        <!-- <div class="box-header">
                            <button class="btn btn-primary" id="btn_add_page"><span class="fa fa-plus"></span> Tambah</button>
                            <button class="btn btn-primary" id="btn_lihat"><span class="fa fa-plus"></span> lihat</button>
                        </div> -->
                        <div class="box-body" id="jenis_surat">

                </div>
            </div>
    </div>
</div>
</section>

<script type="text/javascript">

  // $(document).ready(function(){
  //   console.log('kaharisman');
  // })

  $(document).ready(function () {
  $('.style_prevu_kit').click(function(){
    id = this.id;
    $('#buat_surat').show();
      //  $('#jenis_surat').slideToggle();
      //   $('#show_jenis_surat').toggle();
      //   $('#hide_jenis_surat').toggle();
  });
  $('.toggle_jenis_surat').click(function(){
     $('#jenis_surat').slideToggle();
     $('#show_jenis_surat').toggle();
     $('#hide_jenis_surat').toggle();
  });
  });
</script>



<style media="screen">
.fond{position:absolute;padding-top:85px;top:0;left:0; right:0;bottom:0;
background-color:#00506b;}

.style_prevu_kit
{
  cursor:pointer;
  display:inline-block;
  border-radius: 10px;
  border:0;
  width:100%;
  height:100px;
  padding: 10px;
  /*margin: 10px;*/
  color:white;
  position: relative;
  -webkit-transition: all 200ms ease-in;
  -webkit-transform: scale(1);
  -ms-transition: all 200ms ease-in;
  -ms-transform: scale(1);
  -moz-transition: all 200ms ease-in;
  -moz-transform: scale(1);
  transition: all 200ms ease-in;
  transform: scale(1);

}
.style_prevu_kit:hover
{
  box-shadow: 0px 0px 150px #000000;
  z-index: 2;
  -webkit-transition: all 200ms ease-in;
  -webkit-transform: scale(1.2);
  -ms-transition: all 200ms ease-in;
  -ms-transform: scale(1.2);
  -moz-transition: all 200ms ease-in;
  -moz-transform: scale(1.2);
  transition: all 200ms ease-in;
  transform: scale(1.2);
}
</style>
