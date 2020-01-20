<?php

session_start();
	
	if (!isset($_SESSION['inicjuj']))
	{
		session_regenerate_id();
		$_SESSION['inicjuj'] = true;
		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
	}
	


?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Panel Pracownika</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="KinoURZ" />
<meta name="keywords" content="" />
<meta name="author" content="KinoURZ" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<style type="text/css">
    body {
        color:black;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
	.table-wrapper {
      
     
     
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {        
	

		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		
		vertical-align: middle;
    }

    table.table-striped tbody tr:nth-of-type(odd) {
    	
	}
	table.table-striped.table-hover tbody tr:hover {
		
	}
    table.table th i {
        font-size: 13px;
    
        cursor: pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
       
    }
	table.table td a {
		font-weight: bold;
		color: #000;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}
	table.table td a:hover {
		color: #000;
	}
	table.table td a.edit {
        color: #000;
    }
    table.table td a.delete {
        color: #000;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
	
	}
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
    
    }
    .pagination li.active a:hover {        
     
    }
	.pagination li.disabled i {
        color: #ccc;
    }

    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }    
	/* Custom checkbox */
	.custom-checkbox {
		position: relative;
	}
	.custom-checkbox input[type="checkbox"] {    
		opacity: 0;
		position: absolute;
		margin: 5px 0 0 3px;
		z-index: 9;
	}
	.custom-checkbox label:before{
		width: 18px;
		height: 18px;
	}
	.custom-checkbox label:before {
		content: '';
		margin-right: 10px;
		display: inline-block;
		vertical-align: text-top;
		
		border: 1px solid #bbb;
		border-radius: 2px;
		box-sizing: border-box;
		z-index: 2;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		content: '';
		position: absolute;
		left: 6px;
		top: 3px;
		width: 6px;
		height: 11px;
		border: solid #000;
		border-width: 0 3px 3px 0;
		transform: inherit;
		z-index: 3;
		transform: rotateZ(45deg);
	}
	.custom-checkbox input[type="checkbox"]:checked + label:before {
		border-color: #03A9F4;
	
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		border-color: #fff;
	}
	.custom-checkbox input[type="checkbox"]:disabled + label:before {
		color: #b8b8b8;
		cursor: auto;
		box-shadow: none;
	
	}
	/* Modal styles */
	.modal .modal-dialog {
		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
		padding: 20px 30px;
	}
	.modal .modal-content {
		border-radius: 3px;
	}
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}
    .modal .modal-title {
        display: inline-block;
    }
	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
		border-color: #dddddd;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}	
	.modal form label {
		font-weight: normal;
	}	
</style>
<script type="text/javascript">
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>

</head>
<body id="page4">
<div class="tail-top">
	<div class="tail-bottom">
		<div id="main">
<!-- HEADER -->
			<div id="header">
				<div class="row-1">
					<div class="fleft"><a href="index.php">Kino<span>URZ</span></a></div>
					<ul>
					<li><a href="index.php"><img src="images/icon1-act.gif" alt="" /></a></li>
						<li><a href="contact-us.php"><img src="images/icon2.gif" alt="" /></a></li>
						<li><a href="Panel_Pracownika.php"><img src="images/icon3.gif" alt="" /></a></li>
					</ul>
				</div>
				<div class="row-2">
					<ul>

					<li><a href="index.php" >Kino</a></li>
						<li><a href="Panel_Admina.php" >Panel Admina</a></li>
						<li><a href="Panel_Pracownika.php" class="active">Panel pracownika</a></li>
						<li><a href="Panel_Repertuaru.php">Panel Repertuaru</a></li>
						<li><a href="contact-us.php">Kontakt</a></li>
						<li><a href="logowanie.php">Wyloguj</a></li>


						
					</ul>
				</div>
			</div>
<!-- CONTENT -->
<div id="content">
				<div id="slogan2">
				
				<div class="row" style="padding:15px">
            <div class="table-title">
                    <div class="col-sm-6">
						<h2>Panel <b>Pracownika</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="index.php" class="btn btn-success" data-toggle="modal"><span>Dodaj rezerwacje</span></a>
												
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover" style="margin-left:15px;margin-right:30px;">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
                        <th>Imie i nazwisko rezerwującego</th>
                        <th>Miejsca</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
                        <td>%DANE%</td>
                        <td>%Miejsca%</td>
						
                        <td>
                            <a href="index.php" class="btn btn-success" data-toggle="modal"><span>Potwierdz</span></a>
                        </td>
                    </tr>
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox2" name="options[]" value="1">
								<label for="checkbox2"></label>
							</span>
						</td>
                        <td>%DANE%</td>
                        <td>%Miejsca%</td>
						
                        <td>
                            <a href="index.php" class="btn btn-success" data-toggle="modal"><span>Potwierdz</span></a>
                        </td>
                    </tr>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox3" name="options[]" value="1">
								<label for="checkbox3"></label>
							</span>
						</td>
                       <td>%DANE%</td>
                        <td>%Miejsca%</td>
						
                        <td>
                            <a href="index.php" class="btn btn-success" data-toggle="modal"><span>Potwierdz</span></a>
                        </td>
                    </tr>
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox4" name="options[]" value="1">
								<label for="checkbox4"></label>
							</span>
						</td>
                        <td>%DANE%</td>
                        <td>%Miejsca%</td>
						
                        <td>
                            <a href="index.php" class="btn btn-success" data-toggle="modal"><span>Potwierdz</span></a>
                        </td>
                    </tr>					
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox5" name="options[]" value="1">
								<label for="checkbox5"></label>
							</span>
						</td>
                        <td>%DANE%</td>
                        <td>%Miejsca%</td>
						
                        <td>
                            <a href="index.php" class="btn btn-success" data-toggle="modal"><span>Potwierdz</span></a>
                        </td>
                    </tr> 
                </tbody>
            </table>
			
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<div id="addFilmModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Dodaj Film</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Tytuł</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Plakat</label>
							<input type="text" class="form-control" required>
						</div>
													
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Anuluj">
						<input type="submit" class="btn btn-success" value="Dodaj">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editFilmModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Edycja użytkownika</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Tytuł</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>plakat</label>
							<input type="text" class="form-control" required>
						</div>
										
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteFilmModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Usuń Film</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Jesteś pewny że chcesz usunąć ten film ?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Anuluj">
						<input type="submit" class="btn btn-danger" value="Usuń">
					</div>
				</form>
			</div>
		</div>
	</div><br><br><br>
<!-- FOOTER -->
<div id="footer">
				<div class="left">
					<div class="right">
						<div class="inside">Copyright - Grupa laboratoryjna nr 2, projektowa nr 1<br>
							Krzysztof Banaś, Kamil Dziok, Damian Gaworowski, Hubert Jakobsze, Łukasz Kwaśny
							
						</div>
					</div>
				</div>
			</div>
		</div></div>
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>