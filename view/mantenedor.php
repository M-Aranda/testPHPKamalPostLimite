<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <head>

        <meta charset="UTF-8">

        <title></title>



        <script type="text/javascript"  src="../JQuery/JQuery.js"></script>  <!--  este js funciona bien -->
  <!--<script language="JavaScript"  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>  este es el CDN de jquery-->

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script> <!-- Sweet Alert -->


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


        <style>


            header{
                background-color: #008000;
            }

            #TituloMantenedor{
                background-color: #008000;
            }


        </style>


    </head>
    <body>
        <?php
        // put your code here
        session_start();
        require_once("../model/Data.php");
        require_once("../model/Usuario.php");
        require_once("../model/Perfil.php");

        $d = new Data();
        $listadoDeUsuarios = $d->listarUsuarios();
        $listadoDePerfiles = $d->listarPerfiles();


        $listadoDeUsuariosParaJSON = array();
        foreach ($listadoDeUsuarios as $u) {

            $estado = "Activo";
            if ($u->getEstado() == 0) {
                $estado = "Inactivo";
            }
            $usuarioParaArray = array("id_usuario" => $u->getId_usuario(), "Perfil Usuario" => $u->getPerfil()->getPerfil(), "Usuario" => $u->getUsuario(), "Nombres" => $u->getNombres(), "APaterno" => $u->getAp_paterno(), "AMaterno" => $u->getAp_materno(), "Email" => $u->getEmail(), "Estado" => $estado);
            array_push($listadoDeUsuariosParaJSON, $usuarioParaArray);
        }
        ?>

        <header style="color:white">Test de conocimientos Marcelo Aranda</header>



        <div id="agregarUsuarioModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Agregar usuario</h4>
                    </div>
                    <div class="modal-body">

                        <h5>Usuario:</h5>
                        <input type="text" id="agregar_usuario" class="swal2-input" placeholder="ej: usuario31">

                        <h5>Nombres:</h5>
                        <input type="text" id="agregar_nombres" class="swal2-input" placeholder="ej: Feliper Andres">

                        <h5>A.Paterno</h5>
                        <input type="text" id="agregar_a_paterno" class="swal2-input" placeholder="ej: Zaldivar">

                        <h5>A.Materno</h5>
                        <input type="text" id="agregar_a_materno" class="swal2-input" placeholder="ej: Norambuena">

                        <h5>Email:</h5>
                        <input type="text" id="agregar_email" class="swal2-input" placeholder="ej: nmbn@gmail.com">

                        <h5>Perfil:</h5>
                        <select id="seleccionarPerfil" name="seleccionarPerfil" >
                            <?php
                            foreach ($listadoDePerfiles as $p) {
                                echo "<option value=" . $p->getId_perfil() . ">" . $p->getPerfil() . "</option>";
                            }
                            ?>                            
                        </select>
                        <h5>Estado:</h5>
                        <select id="seleccionarEstado" name="seleccionarEstado" >
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" onclick="agregarUsuario()" >Guardar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Volver</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="modificarUsuarioModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Editar Usuario</h4>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" id="editar_id_usuario" class="swal2-input" placeholder="ej: usuario31" disabled="true">
                        <h5>Usuario:</h5>
                        <input type="text" id="editar_usuario" class="swal2-input" placeholder="ej: usuario31" disabled="true">

                        <h5>Nombres:</h5>
                        <input type="text" id="editar_nombres" class="swal2-input" placeholder="ej: Feliper Andres">

                        <h5>A.Paterno</h5>
                        <input type="text" id="editar_a_paterno" class="swal2-input" placeholder="ej: Zaldivar">

                        <h5>A.Materno</h5>
                        <input type="text" id="editar_a_materno" class="swal2-input" placeholder="ej: Norambuena">

                        <h5>Email:</h5>
                        <input type="text" id="editar_email" class="swal2-input" placeholder="ej: nmbn@gmail.com">

                        <h5>Perfil:</h5>
                        <select id="editarPerfil" name="editarPerfil" >
                            <?php
                            foreach ($listadoDePerfiles as $p) {
                                echo "<option value=" . $p->getId_perfil() . ">" . $p->getPerfil() . "</option>";
                            }
                            ?>                            
                        </select>
                        <h5>Estado:</h5>
                        <select id="editarEstado" name="editarEstado" >
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" onclick="modificarUsuario()" >Guardar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Volver</button>
                    </div>
                </div>
            </div>
        </div>


        <div id="eliminarUsuarioModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Eliminar Usuario</h4>
                    </div>
                    <div class="modal-body">


                        <input type="hidden" id="eliminar_id_usuario" class="swal2-input" placeholder="ej: usuario31" disabled="true">

                        <h5>Usuario:</h5>
                        <input type="text" id="eliminar_usuario" class="swal2-input" placeholder="ej: usuario31" disabled="true">

                        <h5>Nombres:</h5>
                        <input type="text" id="eliminar_nombres" class="swal2-input" placeholder="ej: Feliper Andres" disabled="true">

                        <h5>A.Paterno</h5>
                        <input type="text" id="eliminar_a_paterno" class="swal2-input" placeholder="ej: Zaldivar" disabled="true">

                        <h5>A.Materno</h5>
                        <input type="text" id="eliminar_a_materno" class="swal2-input" placeholder="ej: Norambuena" disabled="true">

                        <h5>Email:</h5>
                        <input type="text" id="eliminar_email" class="swal2-input" placeholder="ej: nmbn@gmail.com" disabled="true">

                        <h5>Perfil:</h5>
                        <select id="eliminarPerfil" name="eliminarPerfil" disabled="true">
                            <?php
                            foreach ($listadoDePerfiles as $p) {
                                echo "<option value=" . $p->getId_perfil() . ">" . $p->getPerfil() . "</option>";
                            }
                            ?>                            
                        </select>
                        <h5>Estado:</h5>
                        <select id="eliminarEstado" name="eliminarEstado" disabled="true">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"  onclick="eliminarUsuario()">Eliminar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Volver</button>
                    </div>
                </div>
            </div>
        </div>




        <div class="box">
            <h2  id="TituloMantenedor" style="color:white"> Mantenedor </h2>

            <br>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#agregarUsuarioModal">Agregar usuario</button>
            <br>
            <br>
            <a href="index.php"><button>Cerrar aplicación</button></a>
            <br>

            <!--
                      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modificarUsuarioModal">Modificar usuario</button>
                      <br>
                      <br>
          
                      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#eliminarUsuarioModal">Eliminar usuario</button>
                      <br>
                      <br>
            -->

            <table id="tablaUsuarios" class="display">
<!--                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Nombres</th>
                        <th>A.Paterno</th>
                        <th>A.Materno</th>
                        <th>Email</th>
                        <th>Perfil Usuario</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php /*

                  $d = new Data();
                  $listadoDeUsuarios = $d->listarUsuarios();

                  foreach ($listadoDeUsuarios as $u) {

                  $estado = "Inactivo";
                  if ($u->getEstado() == 1) {
                  $estado = "Activo";
                  }



                  echo "</tr>
                  <td>" . $u->getUsuario() . "</td>
                  <td>" . $u->getNombres() . "</td>
                  <td>" . $u->getAp_paterno() . "</td>
                  <td>" . $u->getAp_materno() . "</td>
                  <td>" . $u->getEmail() . "</td>
                  <td>" . $u->getPerfil()->getPerfil() . "</td>
                  <td>" . $estado . "</td>

                  <td> <button id='BotonModificar' value=" . $u->getId_usuario() . ">Modificar</button></td>
                  <td><button id='BotonEliminar' value=" . $u->getId_usuario() . ">Eliminar</button> </td>
                  </tr>";
                  }
                 */ ?>
                </tbody> 
            </table>
            <br>
        </div>

                --> 




                <script>



                    var dataSet =<?php echo json_encode($listadoDeUsuariosParaJSON); ?>;
                    //console.log(dataSet);


                    $(document).ready(function () {
                        var table = $('#tablaUsuarios').DataTable({
                            data: dataSet,
                            columns: [
                                {data: "Usuario"},
                                {data: "Nombres"},
                                {data: "APaterno"},
                                {data: "AMaterno"},
                                {data: "Email"},
                                {data: "Perfil Usuario"},
                                {data: "Estado"},
                                {
                                    "targets": -1,
                                    "data": null,
                                    "defaultContent":
                                            '<button type="button" value="id_usuario" class="btn-modificar" data-toggle="modal" data-target="#modificarUsuarioModal">Modificar</button>'
                                            + '<button type="button" value="id_usuario" class="btn-eliminar" data-toggle="modal" data-target="#eliminarUsuarioModal">Eliminar</button>'

                                }
                            ],
                            "columnDefs": [
                                {"title": "Usuario", "targets": 0},
                                {"title": "Nombres", "targets": 1},
                                {"title": "A.Paterno", "targets": 2},
                                {"title": "A.Materno", "targets": 3},
                                {"title": "Email", "targets": 4},
                                {"title": "Perfil Usuario", "targets": 5},
                                {"title": "Estado", "targets": 6},
                                {"title": "Opción", "targets": 7}
                            ]
                        });

                        $('#tablaUsuarios').on('click', '.btn-modificar', function (e) {
                            var data = table.row($(this).parents('tr')).data();
                            // console.log(data);


                            document.getElementById("editar_id_usuario").value = data.id_usuario;
                            document.getElementById("editar_usuario").value = data.Usuario;
                            document.getElementById("editar_nombres").value = data.Nombres;
                            document.getElementById("editar_a_paterno").value = data.APaterno;
                            document.getElementById("editar_a_materno").value = data.AMaterno;
                            document.getElementById("editar_email").value = data.Email;

                            var estado = data.Estado;

                            if (estado == "Activo") {
                                $('#editarEstado').val(1);
                            } else if (estado == "Inactivo") {
                                $('#editarEstado').val(0);
                            }


                            var tipoPerfil = data["Perfil Usuario"];
                            //console.log(tipoPerfil);

                            if (tipoPerfil == "Administrador") {
                                $('#editarPerfil').val(1);
                            } else if (tipoPerfil == "Usuario normal") {
                                $('#editarPerfil').val(2);
                            } else if (tipoPerfil == "Supervisor") {
                                $('#editarPerfil').val(3);
                            }


                        });


                        // Handle click on "Delete" button
                        $('#tablaUsuarios').on('click', '.btn-eliminar', function (e) {
                            var data = table.row($(this).parents('tr')).data();

                            console.log(data.Usuario);

                            document.getElementById("eliminar_usuario").value = data.Usuario;
                            document.getElementById("eliminar_id_usuario").value = data.id_usuario;

                            document.getElementById("eliminar_nombres").value = data.Nombres;
                            document.getElementById("eliminar_a_paterno").value = data.APaterno;
                            document.getElementById("eliminar_a_materno").value = data.AMaterno;
                            document.getElementById("eliminar_email").value = data.Email;


                            var estado = data.Estado;

                            if (estado == "Activo") {
                                $('#eliminarEstado').val(1);
                            } else if (estado == "Inactivo") {
                                $('#eliminarEstado').val(0);
                            }


                            var tipoPerfil = data["Perfil Usuario"];
                            //console.log(tipoPerfil);

                            if (tipoPerfil == "Administrador") {
                                $('#eliminarPerfil').val(1);
                            } else if (tipoPerfil == "Usuario normal") {
                                $('#eliminarPerfil').val(2);
                            } else if (tipoPerfil == "Supervisor") {
                                $('#eliminarPerfil').val(3);
                            }



                        });


                    });






                    /*
                     * 
                     agregar_usuario
                     agregar_nombres
                     agregar_a_paterno
                     agregar_a_materno
                     agregar_email
                     seleccionarPerfil
                     seleccionarEstado
                     */

                    function agregarUsuario() {

                        var perfilSeleccionado = document.getElementById('seleccionarPerfil').value;
                        var estadoSeleccionado = document.getElementById('seleccionarEstado').value;

                        var usuario = document.getElementById('agregar_usuario').value
                        var nombres = document.getElementById('agregar_nombres').value;
                        var aPaterno = document.getElementById('agregar_a_paterno').value;
                        var aMaterno = document.getElementById('agregar_a_materno').value;
                        var email = document.getElementById('agregar_email').value;
                        var perfil = document.getElementById('seleccionarPerfil').value;
                        var estado = document.getElementById('seleccionarEstado').value;


                        //var datos = {id_perfil: perfil, usuario: usuario, "clave": "123", nombres: nombres, ap_paterno: aPaterno, ap_materno: aMaterno, email: email, estado: estado};


                        //console.log(datos);
                        $.ajax({
                            url: '../controller/AgregarUsuario.php',
                            type: 'POST',
                            data: {
                                'id_perfil': perfil, 'usuario': usuario, 'clave': "123", 'nombres': nombres, 'ap_paterno': aPaterno, 'ap_materno': aMaterno, 'email': email, 'estado': estado
                            },
                            success: function (result) { //we got the response
                                Swal.fire('Usuario agregado');
                                //alert(result);

                            },
                            error: function (jqxhr, status, exception) {
                                Swal.fire('Hubo un error');
                            }
                        })
                    }



                    function cargarUsuario(id_usuario) {
                        var idUsuarioABuscar = id_usuario;
                        $.ajax({
                            url: '../controller/CargarUsuario.php',
                            type: 'POST',
                            data: {
                                'id_usuario': idUsuarioABuscar
                            },
                            success: function (result) { //we got the response

                                return result;
                            },
                            error: function (jqxhr, status, exception) {

                            }
                        })

                    }


                    function eliminarUsuario() {
                        var idUsuario = document.getElementById("eliminar_id_usuario").value;

                        $.ajax({
                            url: '../controller/EliminarUsuario.php',
                            type: 'POST',
                            data: {
                                'id_usuario': idUsuario
                            },
                            success: function (result) { //we got the response
                                Swal.fire('Usuario eliminado');
                                alert(result);

                            },
                            error: function (jqxhr, status, exception) {
                                Swal.fire('Hubo un error');
                            }
                        })
                    }

                    




                    function modificarUsuario() {

                        var idUsuario = document.getElementById("editar_id_usuario").value;
                        var usuario = document.getElementById("editar_usuario").value;
                        var nombres = document.getElementById("editar_nombres").value;
                        var a_paterno = document.getElementById("editar_a_paterno").value;
                        var a_materno = document.getElementById("editar_a_materno").value;
                        var email = document.getElementById("editar_email").value;
                        var perfil = document.getElementById("editarPerfil").value;
                        var estado = document.getElementById("editarEstado").value;


                        console.log(idUsuario);
                        console.log(usuario);
                        console.log(nombres);
                        console.log(a_paterno);
                        console.log(a_materno);
                        console.log(email);
                        console.log(perfil);
                        console.log(perfil);

                        $.ajax({
                            url: '../controller/EditarUsuario.php',
                            type: 'POST',
                            data: {
                                'idUsuario': idUsuario, 'id_perfil': perfil, 'usuario': usuario, 'clave': "123", 'nombres': nombres, 'ap_paterno': a_paterno, 'ap_materno': a_materno, 'email': email, 'estado': estado
                            },
                            success: function (result) { //we got the response
                                Swal.fire('Usuario actualizado');
                                console.log(result);

                            },
                            error: function (jqxhr, status, exception) {
                                Swal.fire('Hubo un error');
                            }
                        })


                    }






                </script>


                </body>
                </html>
