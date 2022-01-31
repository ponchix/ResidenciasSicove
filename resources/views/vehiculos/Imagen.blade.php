   <div >
        <img id="imagenSeleccionada" width="150px">
    </div>
    <div>
            <label for="">Subir Imagen</label>
            <input type="file" name="imagen" id="imagen">
            {{-- {!! Form::file('imagen',null,array('class'=>'form-control')) !!} --}}
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