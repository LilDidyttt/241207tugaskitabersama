// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
  $('#dataTablePetugas').DataTable();

  // Ganti placeholder search
  $('.dataTables_filter input').attr('placeholder', 'Cari data di sini...');
});