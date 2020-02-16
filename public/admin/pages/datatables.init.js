/**
 * Theme: Xadmino
 * Datatable
 * DEMO ONLY MINIFY
 */
var handleDataTableButtons=function(){"use strict";0!==$("#datatable-buttons").length&&$("#datatable-buttons").DataTable({dom:"Bfrtip",buttons:[{extend:"copy",className:"btn-success"},{extend:"csv"},{extend:"excel"},{extend:"pdf"},{extend:"print"}],responsive:!0})},TableManageButtons=function(){"use strict";return{init:function(){handleDataTableButtons()}}}();TableManageButtons.init(),$(document).ready(function(){$("#datatable").dataTable(),$("#datatable-keytable").DataTable({keys:!0}),$("#datatable-responsive").DataTable(),$("#datatable-scroller").DataTable({ajax:"assets/plugins/datatables/json/scroller-demo.json",deferRender:!0,scrollY:380,scrollCollapse:!0,scroller:!0});$("#datatable-fixed-header").DataTable({fixedHeader:!0})});