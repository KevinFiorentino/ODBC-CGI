$(document).ready(function(){	

 var table1 = $('#reservarCanchas').DataTable({
	        "processing": true,
	        "scrollX": true,
		    "sAjaxSource":"http://localhost:8081/Polideportivo/Reservas/CargarDataTableCanchas",
		    
	        "columns": [{
			                "class":          "details-control",
			                "orderable":      false,
			                "data":           null,			           
			                "defaultContent": "" 
			            },
	                    {"data":"deporte","defaultContent":"S/D"},	
	                    {"data":"tipoCancha","defaultContent":"S/D"},
	                    {"data":"localidad","defaultContent":"S/D"}
	                    ],
	      "order": [[1, 'dsc']]
 	});
	
	 table1.columns.adjust().draw();

	    var detailRows1 = [];
	 
	    $('#reservarCanchas tbody').on( 'click', 'tr td.details-control', function () {
	        var tr1 = $(this).closest('tr');
	        var row1 = table1.row( tr1 );
	        var idx1 = $.inArray( tr1.attr('id'), detailRows1 );
	 
	        if ( row1.child.isShown() ) {
	            tr1.removeClass( 'details' );
	            row1.child.hide();
	            detailRows1.splice( idx1, 1 );
	        }
	        else {
	            tr1.addClass( 'details' );
	            row1.child( detalleReservarCanchas( row1.data() ) ).show();	 
	            if ( idx1 === -1 ) {
	                detailRows1.push( tr1.attr('id') );
	            }
	        }
	    });
	    
	    table1.on( 'draw', function () {
	        $.each( detailRows1, function ( i, id ) {
	            $('#'+id+' td.details-control').trigger( 'click' );
	        } );
	    } );   
} );


function detalleReservarCanchas(d) {
	return "asd"; }