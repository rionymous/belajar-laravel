/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";

$("#table-user").dataTable({
    "columnDefs": [
      { "sortable": false, "targets": -1 }
    ]
  });

  $("#table-role").dataTable({
    "columnDefs": [
      { "sortable": false, "targets": -1 }
    ]
  });