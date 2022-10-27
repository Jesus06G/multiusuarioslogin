<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Multiusuarios PHP MySQL: Niveles de Usuarios</title>
<link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
<script src="https://kit.fontawesome.com/634962e990.js" crossorigin="anonymous"></script>
  <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		

<style type="text/css">

	.login-form {
		width: 340px;
    	margin: 20px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>

	<body>
<?php include("../header.php");?>
	
	<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
		 
			<center>
				<h1>Pagina personal</h1>
				
				<h3>
				<?php
				
				session_start();

				if(!isset($_SESSION['personal_login']))	
				{
					header("location: ../index.php");
				}

				if(isset($_SESSION['admin_login']))	
				{
					header("location: ../admin/admin_portada.php");
				}

				if(isset($_SESSION['usuarios_login']))	
				{
					header("location: ../usuarios/usuarios_portada.php");
				}
				
				if(isset($_SESSION['personal_login']))
				{
				?>
					Bienvenido,
				<?php
					echo $_SESSION['personal_login'];
				}
				?>
				</h3>
			</center>



 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añdir Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

<form action="insert.php" method="POST">
<input type="hidden" name="id">

<div class="form-group p-1">
<input type="text" class="form-control" name="username" placeholder="user" >
</div>
<div class="form-group p-1">
<input type="text" class="form-control " name="email" placeholder="email" >
</div>

<div class="form-group p-1">
<input type="text" class="form-control" name="password" placeholder="pass" >
</div>

<div class="form-group p-1">
<select name="role" id="" class="form-select">
<option value="" disabled="disabled" selected>Rol</option>
<option value="admin">Admin</option>
<option value="personal">Personal</option>
<option value="usuarios">Usuarios</option>
</select>
</div>

<div class="form-group p-1">
<input  class="btn btn-primary col-12 " type="submit" value="Enviar">
</div>

  </form>


      </div>

    </div>
  </div>
</div>


		</div>

	
		<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
			<!-- Button trigger modal -->
      <a type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="fa-solid fa-user-plus"></i>Añadir Usuario</a></div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover " id="myTable">
                                    <thead class="table-dark">
                                        <tr>
                                            <th width="4%">ID</th>
                                            <th width="18%">Usuario</th>
                                            <th width="24%">Email</th>
                                            <th width="19%">Rol</th>
                                            <th width="24%">Password</th>
											<th colspan="2">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									require_once '../DBconect.php';
									$select_stmt=$db->prepare("SELECT id,username,email,role FROM mainlogin");
									$select_stmt->execute();
									
									while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
									{
									?>
                                        <tr>
                                            <td><?php echo $row["id"]; ?></td>
                                            <td><?php echo $row["username"]; ?></td>
                                            <td><?php echo $row["email"]; ?></td>
                                            <td><?php echo $row["role"]; ?></td>
                                            <td>*******</td>
											<td width="4%"><a class="btn btn-primary" href="actualizar.php?id=<?php echo $row['id'] ?>" name="edit" data-toggle="modal" data-target="#edit"><i class="fa-solid fa-pen-to-square"></i></a></td>



											<td width="7%"><a class="btn btn-danger" href="delete.php?id=<?php echo $row['id'] ?>" name="delete"><i class="fa-solid fa-trash-can"></i></a></td>
                                        </tr>
									<?php 
									}
									?>
                                    </tbody>


<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">



<form action="edit.php" method="POST">

<div class="form-group">
<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
</div>

<input type="text" class="form-control" name="username" placeholder="user" value="<?php echo $row['username'] ?>">
</div>

<div class="form-group p-3">
<input type="text" class="form-control " name="email" placeholder="email" value="<?php echo $row['email'] ?>">
</div>

<div class="form-group">
<input type="text" class="form-control" name="password" placeholder="pass" value="<?php echo $row['password'] ?>" >
</div>

<div class="form-group">
<input type="text" class="form-control " name="role" placeholder="rol" value="<?php echo $row['rol'] ?>" >
</div>

<div class="form-group">
<input  class="btn btn-success d-grid" type="submit" value="Enviar">
</div>


  </form>
      </div>
  
    </div>
  </div>
</div>



                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
		
	</div>
			
	</div>
										
	</body>
</html>

<script>
var dataTable = new DataTable("#myTable");
</script>

