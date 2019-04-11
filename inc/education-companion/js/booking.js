( function($) {
    

    // Tab 
    $('.tablist').on( 'click', function() {
        $( '.booking-settings' ).hide();
        $( '.booking-lists' ).show();
    } );

    $('.tabsettings').on( 'click', function() {
        $( '.booking-lists' ).hide();
        $( '.booking-settings' ).show();
    } );



} )( jQuery );