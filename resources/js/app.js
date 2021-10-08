require('./bootstrap');
import $ from 'jquery';
window.$ = window.jQuery = $;

var moment = require('moment');
window.moment = moment;

var daterangepicker = require('daterangepicker');
window.daterangepicker = daterangepicker;

$(function() {

    $('input[name="datefilter"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear',
            "format": "YYYY/MM/DD",
            "separator": "    ",
            "applyLabel": "Valider",
            "cancelLabel": "Annuler",
            "fromLabel": "From",
            "toLabel": "To",
            "customRangeLabel": "Custom",
            "weekLabel": "W",
            
            "daysOfWeek": [
                "Dim",
                "Lun",
                "Mar",
                "Mer",
                "Jeu",
                "Ven",
                "Sam"
            ],
            "monthNames": [
                "Janvier",
                "Février",
                "Mars",
                "Avril",
                "Mai",
                "Juin",
                "Juillet",
                "Août",
                "Septembre",
                "Octobre",
                "Novembre",
                "Décembre"
            ],
            "firstDay": 1
        },
        minDate: moment(),
    });
  
    $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val( "du " + picker.startDate.format('DD/MM/YYYY') + '      ' + "au " + picker.endDate.format('DD/MM/YYYY'));
        $('#arrivee').val(picker.startDate.format('DD/MM/YYYY'));
        $('#depart').val(picker.endDate.format('DD/MM/YYYY'));
    });
  
    $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });
  
  });
