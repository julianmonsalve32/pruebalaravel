@extends('layouts.default')

@section('content')    
    <div class="container">        
        <div class="col-md-12">        
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title" align="center">Usuarios</h1>    
                    <p class="category">                        
                        <button class="btn btn-success" id="nuevoUsuario" data-toggle="modal" data-target="#myModal">
                            + Registrar Nuevo Usuario
                        </button>                        
                    </p>                        
                </div>
                <!-- <div class="card-content"> -->            
                    <div class="container">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>                                
                                        <th>Cédula</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Correo</th>
                                        <th>Teléfono</th>                                
                                        <th>Opciones</th>
                                    </tr>
                                </thead>                    
                                <tbody>
                                    <!-- incluimos el ciclo con la sintaxis de blade -->
                                    @foreach($usuarios as $usuario)
                                        <tr>                                    
                                            <td>{{$usuario->cedula}}</td>
                                            <td>{{$usuario->nombres}}</td>
                                            <td>{{$usuario->apellidos}}</td>
                                            <td>{{$usuario->email}}</td>
                                            <td>{{$usuario->telefono}}</td>                                    
                                            <th>
                                                <input type="hidden" value="{{$usuario->id}}">
                                                <button class="btn btn-warning" onclick="cargar_modal({{$usuario->id}})">
                                                    Editar
                                                </button>                                     
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>     
                        </div>    
                    </div>
                <!-- </div> -->
            </div>    
        </div>
    </div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="center">                
                <center><h3 class="modal-title" >Registrar Nuevo Usuario</h3></center>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form id="frmajax" method="POST">
                        <div class="row">
                            <div class="col-sm-2">
                                Cedula:
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="cedula" id="cedula" data-validation="number required" class="form-control">
                            </div>	
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-2">
                                Nombres:
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="nombres" id="nombres" data-validation="length required" data-validation-length="min2" class="form-control" >
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-2">
                                Apellidos:
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="apellidos" id="apellidos" data-validation="length required" data-validation-length="min2" class="form-control">
                            </div>                       
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-2">
                                Email:
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="email" id="email" data-validation="email required" class="form-control">
                            </div>                       
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-2">
                                Teléfono:
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="telefono" id="telefono" data-validation="number required" class="form-control">
                            </div>      				
                        </div> 
                        <br>
                        <center>
                            <input type="submit" id="btnguardar" class="btn btn-success">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>				
                        </center>
                    </form>
                </div>
            </div>            
        </div>
    </div>
</div>
<div id="myModaledit" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="center">                
                <center><h3 class="modal-title" >Editar Usuario</h3></center>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form id="frmajax1" method="POST">
                        <input type="hidden"  id="id">
                        <div class="row">
                            <div class="col-sm-2">
                                Cedula:
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="editcedula" id="editcedula" data-validation="number required" class="form-control">
                            </div>	
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-2">
                                Nombres:
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="editnombres" id="editnombres" data-validation="length required" data-validation-length="min2" class="form-control" >
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-2">
                                Apellidos:
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="editapellidos" id="editapellidos" data-validation="length required" data-validation-length="min2" class="form-control">
                            </div>                       
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-2">
                                Email:
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="editemail" id="editemail" data-validation="email required" class="form-control">
                            </div>                       
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-2">
                                Teléfono:
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="edittelefono" id="edittelefono" data-validation="number required" class="form-control">
                            </div>      				
                        </div> 
                        <br>
                        <center>
                            <input type="submit" id="btnsave" class="btn btn-success">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>				
                        </center>
                    </form>
                </div>
            </div>            
        </div>
    </div>
</div>
@endsection
@section('scriptsown')
    <script type="text/javascript">        
        $.validate({
            lang: 'es'
        });           
        $("#btnguardar").click(function(e){
            cedula = $("#cedula").val();
            nombres = $("#nombres").val();
            apellidos = $("#apellidos").val();
            email = $("#email").val();
            telefono = $("#telefono").val();
            e.preventDefault();        
            $.ajax({                
                type:'POST',
                url:'usuarios/crear',
                data:{cedula:cedula, nombres:nombres, apellidos:apellidos, email:email, telefono:telefono, _token: '{!! csrf_token() !!}',},
                success:function(data){
                    console.log(data);
                    if (data["email"] != undefined || data["cedula"] != undefined){
                        alert("El email o la cédula ya existen");
                    }else{
                        alert("Guardado Correctamente");
                        $('#myModal').modal('hide');
                        location.reload();
                    }
                }
            });            
        });
        $("#btnsave").click(function(e){
            id = $("#id").val();
            cedula = $("#editcedula").val();
            nombres = $("#editnombres").val();
            apellidos = $("#editapellidos").val();
            email = $("#editemail").val();
            telefono = $("#edittelefono").val();
            e.preventDefault();        
            $.ajax({                
                type:'POST',
                url:'usuarios/'+id+'/actualizar',
                data:{cedula:cedula, nombres:nombres, apellidos:apellidos, email:email, telefono:telefono, _token: '{!! csrf_token() !!}',},
                success:function(data){
                    console.log(data);
                    if (data["email"] != undefined || data["cedula"] != undefined){
                        alert("El email o la cédula ya existen");
                    }else{
                        alert("Editado Correctamente");
                        $('#myModaledit').modal('hide');
                        location.reload();
                    }
                }
            });            
        });
        function cargar_modal(id) {
            $.ajax({                
                type:'GET',
                url: 'usuarios/'+id+'/editar',
                data:{id, _token: '{!! csrf_token() !!}'},
                success:function(data){
                    $("#myModaledit").modal("show");
                    $("#id").val(data["id"]);
                    $("#editcedula").val(data["cedula"]);
                    $("#editnombres").val(data["nombres"]);
                    $("#editapellidos").val(data["apellidos"]);
                    $("#editemail").val(data["email"]);
                    $("#edittelefono").val(data["telefono"]);

                    /* if (data["email"] != undefined || data["cedula"] != undefined){
                        alert("El email o la cédula ya existen");
                    }else{
                        alert("Guardado Correctamente");
                        $('#myModal').modal('hide');
                        location.reload();
                    } */
                }
            });
        }                            
    </script>
@endsection
