<div class="col-md-12 col-xs-12 col-xs-12" >
    <div class="card">
        <img class="card-img-top perfil  rounded mx-auto d-block"  id="imagenSeleccionada">
      </div>
</div>
<div class="position-relative">
    <div class="position-absolute top-100 start-50 translate-middle mb-3">
        <label for="">Foto Conductor</label>
        <input type="file" name="imagen" id="imagen">
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function(e){
            $('#imagen').change(function(){
             let reader=new FileReader();
             reader.onload=(e)=>{
                $('#imagenSeleccionada').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
        });
    </script>