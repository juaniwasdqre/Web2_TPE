<!-- formulario de alta de disco -->
<?php
require_once 'templates/header.phtml';
?>
<h2>AGREGA UN DISCO...</h2>
<form action="subirdisco" method="POST" class="my-4" enctype="multipart/form-data">
    <div class="row">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Título</label>
                    <input required name="titulo" type="text" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Artista</label>
                    <input required name="artista" type="text" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Año</label>
                    <div>
                        <input type="number" name="year" min="1900" max="2100" required class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Productor</label>
                    <input required name="producer" type="text" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label>Género</label>
                    <input required name="genre" type="text" class="form-control">
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Imagen</label>

                    <input type="file" name="img" class="form-control" id="imageToUpload">
                </div>
            </div>
        </div> -->
        
        <!-- <div class="col-3">
            <div class="form-group">
                <label>Prioridad</label>
                <select required name="prioridad" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div> 
    </div>
    <div class="form-group">
        <label>Descripcion</label>
        <textarea name="descripcion" class="form-control" rows="3"></textarea>
    </div>
    ESTO VA A SERVIR PARA LA RESEÑA (EL RATING DE 1--5) Y LA RESEÑA EN SI (TEXTO) -->
    <button type="submit" class="btn btn-primary mt-2">Guardar</button>
</form>

