{{-- <script src="{{asset('js/app.js')}}"></script> --}}

<script src="{{asset('DataTables/jquery/jquery-3.3.1.js')}}"></script>

<script src="{{asset('js/bootstrap.min.js')}}"></script>

<script type="text/javascript" src="{{asset('DataTables/datatables.min.js')}}"></script>

<!-- DATA TABLES -->
<script>
	$(function () {
	    $("#example").DataTable(
	    	{
		       "language":{
		       "lengthMenu":"Mostrar _MENU_ registros por página.",
		       "zeroRecords": "Lo sentimos. No se encontraron registros.",
			   "sInfo": "Mostrando: _START_ de _END_ - Total registros: _TOTAL_ ",
			   "infoEmpty": "No hay registros aún.",
			   "infoFiltered": "(filtrados de un total de _MAX_ registros)",
			   "search" : "Búsqueda",
			   "LoadingRecords": "Cargando ...",
			   "Processing": "Procesando...",
			   "SearchPlaceholder": "Escribe...",
			   "paginate": {
			   "previous": "Anterior",
			   "next": "Siguiente", 
			      }
			    }
			}
    	);
	});
</script>
<!-- DATA TABLES -->