$(function(){

    $( '.request-button' ).click( function() {
        var description = $( this ).data( 'description' );
        var header = $( this ).data( 'header' );
        var submit = $( this ).data( 'submit' );

        $( '#freeWorkoutModal .hidden-description' ).val( description );
        $( '#freeWorkoutModalLabel' ).html( header );
        $( '#freeWorkoutModalSubmit' ).val( submit );

    } );

});