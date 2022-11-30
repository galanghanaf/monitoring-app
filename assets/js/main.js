$(document).ready(function () {
	$("#dataTablesAccessPoint").DataTable({
		order: [],
		columnDefs: [
			{
				targets: "no-sort", //menghilang sorting pada colom tabel
				orderable: false,
			},
		],
	});
});
$(document).ready(function () {
	$("#dataTablesTaskList").DataTable({
		order: [],
		columnDefs: [
			{
				targets: "no-sort", //menghilang sorting pada colom tabel
				orderable: false,
			},
		],
	});
});
$(document).ready(function () {
	$("#dataTablesLogBook").DataTable({
		order: [],
		columnDefs: [
			{
				targets: "no-sort", //menghilang sorting pada colom tabel
				orderable: false,
			},
		],
	});
});
$(document).ready(function () {
	$("#dataTablesSwitch").DataTable({
		order: [],
		columnDefs: [
			{
				targets: "no-sort", //menghilang sorting pada colom tabel
				orderable: false,
			},
		],
	});
});
$(document).ready(function () {
	$("#dataTablesDataAdmin").DataTable({
		order: [],
		columnDefs: [
			{
				targets: "no-sort", //menghilang sorting pada colom tabel
				orderable: false,
			},
		],
	});
});
$(document).ready(function () {
	$("#dataTablesItAsset").DataTable({
		order: [],
		columnDefs: [
			{
				targets: "no-sort", //menghilang sorting pada colom tabel
				orderable: false,
			},
		],
	});
});
$(document).ready(function () {
	$("#dataTablesOtAsset").DataTable({
		order: [],
		columnDefs: [
			{
				targets: "no-sort", //menghilang sorting pada colom tabel
				orderable: false,
			},
		],
	});
});


/**
 * Download Data
 */

 $(document).ready(function () {
	$("#downloadDataAdmin").DataTable({
		dom: "Bfrtip",
		bLengthChange: false,
		bFilter: false,

		buttons: [
			{
				extend: "excel",
				className: "btn btn-lg btn-primary",
				text: "<i class='fas fa-download'> Download Data</i>",
				titleAttr: "Excel",
			},
		],
		order: [],
		columnDefs: [
			{
				targets: "no-sort", //menghilang sorting pada colom tabel
				orderable: false,
			},
		],
	});
});
$(document).ready(function () {
	$("#downloadTaskList").DataTable({
		dom: "Bfrtip",
		bLengthChange: false,
		bFilter: false,

		buttons: [
			{
				extend: "excel",
				className: "btn btn-lg btn-primary",
				text: "<i class='fas fa-download'> Download Data</i>",
				titleAttr: "Excel",
			},
		],
		order: [],
		columnDefs: [
			{
				targets: "no-sort", //menghilang sorting pada colom tabel
				orderable: false,
			},
		],
	});
});
$(document).ready(function () {
	$("#downloadLogBook").DataTable({
		dom: "Bfrtip",
		bLengthChange: false,
		bFilter: false,

		buttons: [
			{
				extend: "excel",
				className: "btn btn-lg btn-primary",
				text: "<i class='fas fa-download'> Download Data</i>",
				titleAttr: "Excel",
			},
		],
		order: [],
		columnDefs: [
			{
				targets: "no-sort", //menghilang sorting pada colom tabel
				orderable: false,
			},
		],
	});
});
$(document).ready(function () {
	$("#downloadAccessPoint").DataTable({
		dom: "Bfrtip",
		bLengthChange: false,
		bFilter: false,

		buttons: [
			{
				extend: "excel",
				className: "btn btn-lg btn-primary",
				text: "<i class='fas fa-download'> Download Data</i>",
				titleAttr: "Excel",
			},
		],
		order: [],
		columnDefs: [
			{
				targets: "no-sort", //menghilang sorting pada colom tabel
				orderable: false,
			},
		],
	});
});
$(document).ready(function () {
	$("#downloadIpStatic").DataTable({
		dom: "Bfrtip",
		bLengthChange: false,
		bFilter: false,

		buttons: [
			{
				extend: "excel",
				className: "btn btn-lg btn-primary",
				text: "<i class='fas fa-download'> Download Data</i>",
				titleAttr: "Excel",
			},
		],
		order: [],
		columnDefs: [
			{
				targets: "no-sort", //menghilang sorting pada colom tabel
				orderable: false,
			},
		],
	});
});
$(document).ready(function () {
	$("#downloadSwitch").DataTable({
		dom: "Bfrtip",
		bLengthChange: false,
		bFilter: false,

		buttons: [
			{
				extend: "excel",
				className: "btn btn-lg btn-primary",
				text: "<i class='fas fa-download'> Download Data</i>",
				titleAttr: "Excel",
			},
		],
		order: [],
		columnDefs: [
			{
				targets: "no-sort", //menghilang sorting pada colom tabel
				orderable: false,
			},
		],
	});
});
$(document).ready(function () {
	$("#downloadItAsset").DataTable({
		dom: "Bfrtip",
		bLengthChange: false,
		bFilter: false,

		buttons: [
			{
				extend: "excel",
				className: "btn btn-lg btn-primary",
				text: "<i class='fas fa-download'> Download Data</i>",
				titleAttr: "Excel",
			},
		],
		order: [],
		columnDefs: [
			{
				targets: "no-sort", //menghilang sorting pada colom tabel
				orderable: false,
			},
		],
	});
});
$(document).ready(function () {
	$("#downloadOtAsset").DataTable({
		dom: "Bfrtip",
		bLengthChange: false,
		bFilter: false,

		buttons: [
			{
				extend: "excel",
				className: "btn btn-lg btn-primary",
				text: "<i class='fas fa-download'> Download Data</i>",
				titleAttr: "Excel",
			},
		],
		order: [],
		columnDefs: [
			{
				targets: "no-sort", //menghilang sorting pada colom tabel
				orderable: false,
			},
		],
	});
});