//Calendario cosas
$(function() {
   $( "#from, #to" ).datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: false,
        numberOfMonths: 1,
        onSelect: function( selectedDate ) {
            var option = this.id == "from" ? "minDate" : "maxDate",
            instance = $( this ).data( "datepicker" ),
            date = $.datepicker.parseDate(
                instance.settings.dateFormat ||
                $.datepicker._defaults.dateFormat,
                selectedDate, instance.settings );
            dates.not( this ).datepicker( "option", option, date  );
        }
    });  
    
});
