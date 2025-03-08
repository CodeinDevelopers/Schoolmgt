$.extend(theme.PluginDatePicker.defaults, {
	format: "yyyy-mm-dd",
	autoclose: true
});

(function($) {
	'use strict';

	// DataTable Config
	$('.table_default').DataTable({
		"dom": '<"row"<"col-sm-6"l><"col-sm-6"f>><"table-responsive"t>p',
		"pageLength": 25,
		"ordering": false
	});

	var table = $('.table-export').DataTable({
		"dom": '<"row"<"col-sm-6 mb-xs"B><"col-sm-6"f>><"table-responsive"t>p',
		"lengthChange": false,
		"pageLength": 25,
		"columnDefs": [
			{targets: 'no-sort', orderable: false},
			{targets: [-1], orderable: false}
		],
		"buttons": [
			{
				extend: 'copyHtml5',
				text: '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M15 1.25H10.9436C9.10583 1.24998 7.65019 1.24997 6.51098 1.40314C5.33856 1.56076 4.38961 1.89288 3.64124 2.64124C2.89288 3.38961 2.56076 4.33856 2.40314 5.51098C2.24997 6.65019 2.24998 8.10582 2.25 9.94357V16C2.25 17.8722 3.62205 19.424 5.41551 19.7047C5.55348 20.4687 5.81753 21.1208 6.34835 21.6517C6.95027 22.2536 7.70814 22.5125 8.60825 22.6335C9.47522 22.75 10.5775 22.75 11.9451 22.75H15.0549C16.4225 22.75 17.5248 22.75 18.3918 22.6335C19.2919 22.5125 20.0497 22.2536 20.6517 21.6517C21.2536 21.0497 21.5125 20.2919 21.6335 19.3918C21.75 18.5248 21.75 17.4225 21.75 16.0549V10.9451C21.75 9.57754 21.75 8.47522 21.6335 7.60825C21.5125 6.70814 21.2536 5.95027 20.6517 5.34835C20.1208 4.81753 19.4687 4.55348 18.7047 4.41551C18.424 2.62205 16.8722 1.25 15 1.25ZM17.1293 4.27117C16.8265 3.38623 15.9876 2.75 15 2.75H11C9.09318 2.75 7.73851 2.75159 6.71085 2.88976C5.70476 3.02502 5.12511 3.27869 4.7019 3.7019C4.27869 4.12511 4.02502 4.70476 3.88976 5.71085C3.75159 6.73851 3.75 8.09318 3.75 10V16C3.75 16.9876 4.38624 17.8265 5.27117 18.1293C5.24998 17.5194 5.24999 16.8297 5.25 16.0549V10.9451C5.24998 9.57754 5.24996 8.47522 5.36652 7.60825C5.48754 6.70814 5.74643 5.95027 6.34835 5.34835C6.95027 4.74643 7.70814 4.48754 8.60825 4.36652C9.47522 4.24996 10.5775 4.24998 11.9451 4.25H15.0549C15.8297 4.24999 16.5194 4.24998 17.1293 4.27117ZM7.40901 6.40901C7.68577 6.13225 8.07435 5.9518 8.80812 5.85315C9.56347 5.75159 10.5646 5.75 12 5.75H15C16.4354 5.75 17.4365 5.75159 18.1919 5.85315C18.9257 5.9518 19.3142 6.13225 19.591 6.40901C19.8678 6.68577 20.0482 7.07435 20.1469 7.80812C20.2484 8.56347 20.25 9.56458 20.25 11V16C20.25 17.4354 20.2484 18.4365 20.1469 19.1919C20.0482 19.9257 19.8678 20.3142 19.591 20.591C19.3142 20.8678 18.9257 21.0482 18.1919 21.1469C17.4365 21.2484 16.4354 21.25 15 21.25H12C10.5646 21.25 9.56347 21.2484 8.80812 21.1469C8.07435 21.0482 7.68577 20.8678 7.40901 20.591C7.13225 20.3142 6.9518 19.9257 6.85315 19.1919C6.75159 18.4365 6.75 17.4354 6.75 16V11C6.75 9.56458 6.75159 8.56347 6.85315 7.80812C6.9518 7.07435 7.13225 6.68577 7.40901 6.40901Z" fill="currentColor"></path> </g></svg>',
				titleAttr: 'Copy',
				title: $('.export_title').html(),
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'excelHtml5',
				text: '<svg viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg" fill="#0f773d" stroke="#0f773d" stroke-width="3.2" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:#0f773d;}</style> </defs> <title></title> <g id="xxx-word"> <path class="cls-1" d="M325,105H250a5,5,0,0,1-5-5V25a5,5,0,1,1,10,0V95h70a5,5,0,0,1,0,10Z"></path> <path class="cls-1" d="M325,154.83a5,5,0,0,1-5-5V102.07L247.93,30H100A20,20,0,0,0,80,50v98.17a5,5,0,0,1-10,0V50a30,30,0,0,1,30-30H250a5,5,0,0,1,3.54,1.46l75,75A5,5,0,0,1,330,100v49.83A5,5,0,0,1,325,154.83Z"></path> <path class="cls-1" d="M300,380H100a30,30,0,0,1-30-30V275a5,5,0,0,1,10,0v75a20,20,0,0,0,20,20H300a20,20,0,0,0,20-20V275a5,5,0,0,1,10,0v75A30,30,0,0,1,300,380Z"></path> <path class="cls-1" d="M275,280H125a5,5,0,1,1,0-10H275a5,5,0,0,1,0,10Z"></path> <path class="cls-1" d="M200,330H125a5,5,0,1,1,0-10h75a5,5,0,0,1,0,10Z"></path> <path class="cls-1" d="M325,280H75a30,30,0,0,1-30-30V173.17a30,30,0,0,1,30-30h.2l250,1.66a30.09,30.09,0,0,1,29.81,30V250A30,30,0,0,1,325,280ZM75,153.17a20,20,0,0,0-20,20V250a20,20,0,0,0,20,20H325a20,20,0,0,0,20-20V174.83a20.06,20.06,0,0,0-19.88-20l-250-1.66Z"></path> <path class="cls-1" d="M152.44,236H117.79V182.68h34.3v7.93H127.4v14.45h19.84v7.73H127.4v14.92h25Z"></path> <path class="cls-1" d="M190.18,236H180l-8.36-14.37L162.52,236h-7.66L168,215.69l-11.37-19.14h10.2l6.48,11.6,7.38-11.6h7.46L177,213.66Z"></path> <path class="cls-1" d="M217.4,221.51l7.66.78q-1.49,7.42-5.74,11A15.5,15.5,0,0,1,209,236.82q-8.17,0-12.56-6a23.89,23.89,0,0,1-4.39-14.59q0-8.91,4.8-14.73a15.77,15.77,0,0,1,12.81-5.82q12.89,0,15.35,13.59l-7.66,1.05q-1-7.34-7.23-7.34a6.9,6.9,0,0,0-6.58,4,20.66,20.66,0,0,0-2.05,9.59q0,6,2.13,9.22a6.74,6.74,0,0,0,6,3.24Q215.49,229,217.4,221.51Z"></path> <path class="cls-1" d="M257,223.42l8,1.09a16.84,16.84,0,0,1-6.09,8.83,18.13,18.13,0,0,1-11.37,3.48q-8.2,0-13.2-5.51t-5-14.92q0-8.94,5-14.8t13.67-5.86q8.44,0,13,5.78t4.61,14.84l0,1H238.61a22.12,22.12,0,0,0,.76,6.45,8.68,8.68,0,0,0,3,4.22,8.83,8.83,0,0,0,5.66,1.8Q254.67,229.83,257,223.42Zm-.55-11.8a9.92,9.92,0,0,0-2.56-7,8.63,8.63,0,0,0-12.36-.18,11.36,11.36,0,0,0-2.89,7.13Z"></path> <path class="cls-1" d="M282.71,236h-8.91V182.68h8.91Z"></path> </g> </g></svg>',
				titleAttr: 'Excel',
				title: $('.export_title').html(),
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'csvHtml5',
				text: '<svg viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" stroke-width="5.6000000000000005"width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:currentColor;}</style> </defs> <title></title> <g id="xxx-word"> <path class="cls-1" d="M325,105H250a5,5,0,0,1-5-5V25a5,5,0,1,1,10,0V95h70a5,5,0,0,1,0,10Z"></path> <path class="cls-1" d="M325,154.83a5,5,0,0,1-5-5V102.07L247.93,30H100A20,20,0,0,0,80,50v98.17a5,5,0,0,1-10,0V50a30,30,0,0,1,30-30H250a5,5,0,0,1,3.54,1.46l75,75A5,5,0,0,1,330,100v49.83A5,5,0,0,1,325,154.83Z"></path> <path class="cls-1" d="M300,380H100a30,30,0,0,1-30-30V275a5,5,0,0,1,10,0v75a20,20,0,0,0,20,20H300a20,20,0,0,0,20-20V275a5,5,0,0,1,10,0v75A30,30,0,0,1,300,380Z"></path> <path class="cls-1" d="M275,280H125a5,5,0,1,1,0-10H275a5,5,0,0,1,0,10Z"></path> <path class="cls-1" d="M200,330H125a5,5,0,1,1,0-10h75a5,5,0,0,1,0,10Z"></path> <path class="cls-1" d="M325,280H75a30,30,0,0,1-30-30V173.17a30,30,0,0,1,30-30h.2l250,1.66a30.09,30.09,0,0,1,29.81,30V250A30,30,0,0,1,325,280ZM75,153.17a20,20,0,0,0-20,20V250a20,20,0,0,0,20,20H325a20,20,0,0,0,20-20V174.83a20.06,20.06,0,0,0-19.88-20l-250-1.66Z"></path> <path class="cls-1" d="M168.48,217.48l8.91,1a20.84,20.84,0,0,1-6.19,13.18q-5.33,5.18-14,5.18-7.31,0-11.86-3.67a23.43,23.43,0,0,1-7-10,37.74,37.74,0,0,1-2.46-13.87q0-12.19,5.78-19.82t15.9-7.64a18.69,18.69,0,0,1,13.2,4.88q5.27,4.88,6.64,14l-8.91.94q-2.46-12.07-10.86-12.07-5.39,0-8.38,5t-3,14.55q0,9.69,3.2,14.63t8.48,4.94a9.3,9.3,0,0,0,7.19-3.32A13.25,13.25,0,0,0,168.48,217.48Z"></path> <path class="cls-1" d="M179.41,223.15l9.34-2q1.68,7.93,12.89,7.93,5.12,0,7.87-2a6.07,6.07,0,0,0,2.75-5,7.09,7.09,0,0,0-1.25-4q-1.25-1.85-5.35-2.91l-10.2-2.66a25.1,25.1,0,0,1-7.73-3.11,12.15,12.15,0,0,1-4-4.9,15.54,15.54,0,0,1-1.5-6.76,14,14,0,0,1,5.31-11.46q5.31-4.32,13.59-4.32a24.86,24.86,0,0,1,12.29,3,13.56,13.56,0,0,1,6.89,8.52l-9.14,2.27q-2.11-6.05-9.84-6.05-4.49,0-6.86,1.88a5.83,5.83,0,0,0-2.36,4.77q0,4.57,7.42,6.41l9.06,2.27q8.24,2.07,11.05,6.11a15.29,15.29,0,0,1,2.81,8.93,14.7,14.7,0,0,1-5.92,12.36q-5.92,4.51-15.33,4.51a28,28,0,0,1-13.89-3.32A16.29,16.29,0,0,1,179.41,223.15Z"></path> <path class="cls-1" d="M250.31,236h-9.77L224.1,182.68h10.16l12.23,40.86L259,182.68h8Z"></path> </g> </g></svg>',
				titleAttr: 'CSV',
				title: $('.export_title').html(),
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'pdfHtml5',
				text: '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M5.25 14.5001C5.25 14.0858 5.58579 13.7501 6 13.7501H14C14.4142 13.7501 14.75 14.0858 14.75 14.5001C14.75 14.9143 14.4142 15.2501 14 15.2501H6C5.58579 15.2501 5.25 14.9143 5.25 14.5001Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M5.25 18C5.25 17.5858 5.58579 17.25 6 17.25H11.5C11.9142 17.25 12.25 17.5858 12.25 18C12.25 18.4143 11.9142 18.75 11.5 18.75H6C5.58579 18.75 5.25 18.4143 5.25 18Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M12.25 2.83422C11.7896 2.75598 11.162 2.75005 10.0298 2.75005C8.11311 2.75005 6.75075 2.75163 5.71785 2.88987C4.70596 3.0253 4.12453 3.27933 3.7019 3.70195C3.27869 4.12516 3.02502 4.70481 2.88976 5.7109C2.75159 6.73856 2.75 8.09323 2.75 10.0001V14.0001C2.75 15.9069 2.75159 17.2615 2.88976 18.2892C3.02502 19.2953 3.27869 19.8749 3.7019 20.2981C4.12511 20.7214 4.70476 20.975 5.71085 21.1103C6.73851 21.2485 8.09318 21.2501 10 21.2501H14C15.9068 21.2501 17.2615 21.2485 18.2892 21.1103C19.2952 20.975 19.8749 20.7214 20.2981 20.2981C20.7213 19.8749 20.975 19.2953 21.1102 18.2892C21.2484 17.2615 21.25 15.9069 21.25 14.0001V13.5629C21.25 12.0269 21.2392 11.2988 21.0762 10.7501H17.9463C16.8135 10.7501 15.8877 10.7501 15.1569 10.6518C14.3929 10.5491 13.7306 10.3268 13.2019 9.79815C12.6732 9.26945 12.4509 8.60712 12.3482 7.84317C12.25 7.1123 12.25 6.18657 12.25 5.05374V2.83422ZM13.75 3.6095V5.00005C13.75 6.19976 13.7516 7.0241 13.8348 7.64329C13.9152 8.24091 14.059 8.53395 14.2626 8.73749C14.4661 8.94103 14.7591 9.08486 15.3568 9.16521C15.976 9.24846 16.8003 9.25005 18 9.25005H20.0195C19.723 8.9625 19.3432 8.61797 18.85 8.17407L14.8912 4.61117C14.4058 4.17433 14.0446 3.85187 13.75 3.6095ZM10.1755 1.25002C11.5601 1.24965 12.4546 1.24942 13.2779 1.56535C14.1012 1.88129 14.7632 2.47735 15.7873 3.39955C15.8226 3.43139 15.8584 3.46361 15.8947 3.49623L19.8534 7.05912C19.8956 7.09705 19.9372 7.1345 19.9783 7.17149C21.162 8.23614 21.9274 8.92458 22.3391 9.84902C22.7508 10.7734 22.7505 11.8029 22.75 13.3949C22.75 13.4502 22.75 13.5062 22.75 13.5629V14.0565C22.75 15.8942 22.75 17.3499 22.5969 18.4891C22.4392 19.6615 22.1071 20.6104 21.3588 21.3588C20.6104 22.1072 19.6614 22.4393 18.489 22.5969C17.3498 22.7501 15.8942 22.7501 14.0564 22.7501H9.94359C8.10583 22.7501 6.65019 22.7501 5.51098 22.5969C4.33856 22.4393 3.38961 22.1072 2.64124 21.3588C1.89288 20.6104 1.56076 19.6615 1.40314 18.4891C1.24997 17.3499 1.24998 15.8942 1.25 14.0565V9.94363C1.24998 8.10587 1.24997 6.65024 1.40314 5.51103C1.56076 4.33861 1.89288 3.38966 2.64124 2.64129C3.39019 1.89235 4.34232 1.56059 5.51887 1.40313C6.66283 1.25002 8.1257 1.25003 9.97352 1.25005L10.0298 1.25005C10.0789 1.25005 10.1275 1.25004 10.1755 1.25002Z" fill="currentColor"></path> </g></svg>',
				titleAttr: 'PDF',
				title: $('.export_title').html(),
				footer: true,
				customize: function ( win ) {
					win.styles.tableHeader.fontSize = 10;
					win.styles.tableFooter.fontSize = 10;
					win.styles.tableHeader.alignment = 'left';
				},
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'print',
				text: '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M18 13.5H18.5C19.4428 13.5 19.9142 13.5 20.2071 13.2071C20.5 12.9142 20.5 12.4428 20.5 11.5V10.5C20.5 8.61438 20.5 7.67157 19.9142 7.08579C19.3284 6.5 18.3856 6.5 16.5 6.5H7.5C5.61438 6.5 4.67157 6.5 4.08579 7.08579C3.5 7.67157 3.5 8.61438 3.5 10.5V12.5C3.5 12.9714 3.5 13.2071 3.64645 13.3536C3.79289 13.5 4.0286 13.5 4.5 13.5H6" stroke="#222222"></path> <path d="M6.5 19.8063L6.5 11.5C6.5 10.5572 6.5 10.0858 6.79289 9.79289C7.08579 9.5 7.55719 9.5 8.5 9.5L15.5 9.5C16.4428 9.5 16.9142 9.5 17.2071 9.79289C17.5 10.0858 17.5 10.5572 17.5 11.5L17.5 19.8063C17.5 20.1228 17.5 20.2811 17.3962 20.356C17.2924 20.4308 17.1422 20.3807 16.8419 20.2806L14.6738 19.5579C14.5878 19.5293 14.5448 19.5149 14.5005 19.5162C14.4561 19.5175 14.4141 19.5344 14.3299 19.568L12.1857 20.4257C12.094 20.4624 12.0481 20.4807 12 20.4807C11.9519 20.4807 11.906 20.4624 11.8143 20.4257L9.67005 19.568C9.58592 19.5344 9.54385 19.5175 9.49952 19.5162C9.45519 19.5149 9.41221 19.5293 9.32625 19.5579L7.15811 20.2806C6.8578 20.3807 6.70764 20.4308 6.60382 20.356C6.5 20.2811 6.5 20.1228 6.5 19.8063Z" stroke="#222222"></path> <path d="M9.5 13.5L13.5 13.5" stroke="#222222" stroke-linecap="round"></path> <path d="M9.5 16.5L14.5 16.5" stroke="#222222" stroke-linecap="round"></path> <path d="M17.5 6.5V6.1C17.5 4.40294 17.5 3.55442 16.9728 3.02721C16.4456 2.5 15.5971 2.5 13.9 2.5H10.1C8.40294 2.5 7.55442 2.5 7.02721 3.02721C6.5 3.55442 6.5 4.40294 6.5 6.1V6.5" stroke="#222222"></path> </g></svg>',
				titleAttr: 'Print',
				title: $('.export_title').html(),
				customize: function ( win ) {
					$(win.document.body)
						.css( 'font-size', '9pt' );

					$(win.document.body).find( 'table' )
						.addClass( 'compact' )
						.css( 'font-size', 'inherit' );

					$(win.document.body).find( 'h1' )
						.css( 'font-size', '14pt' );
				},
				footer: true,
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'colvis',
				text: '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" style="display: inline-block; vertical-align: middle;" aria-hidden="true"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M18.25 7C18.25 9.07107 16.5711 10.75 14.5 10.75C12.4289 10.75 10.75 9.07107 10.75 7C10.75 4.92893 12.4289 3.25 14.5 3.25C16.5711 3.25 18.25 4.92893 18.25 7ZM14.5 9.25C15.7426 9.25 16.75 8.24264 16.75 7C16.75 5.75736 15.7426 4.75 14.5 4.75C13.2574 4.75 12.25 5.75736 12.25 7C12.25 8.24264 13.2574 9.25 14.5 9.25Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M5.75 17C5.75 19.0711 7.42893 20.75 9.5 20.75C11.5711 20.75 13.25 19.0711 13.25 17C13.25 14.9289 11.5711 13.25 9.5 13.25C7.42893 13.25 5.75 14.9289 5.75 17ZM9.5 19.25C8.25736 19.25 7.25 18.2426 7.25 17C7.25 15.7574 8.25736 14.75 9.5 14.75C10.7426 14.75 11.75 15.7574 11.75 17C11.75 18.2426 10.7426 19.25 9.5 19.25Z" fill="currentColor"></path> <path d="M14.25 16.9585C14.25 16.5443 14.5858 16.2085 15 16.2085H22C22.4142 16.2085 22.75 16.5443 22.75 16.9585C22.75 17.3727 22.4142 17.7085 22 17.7085H15C14.5858 17.7085 14.25 17.3727 14.25 16.9585Z" fill="currentColor"></path> <path d="M9 6.20852C9.41421 6.20852 9.75 6.54431 9.75 6.95852C9.75 7.37273 9.41421 7.70852 9 7.70852L2 7.70852C1.58579 7.70852 1.25 7.37273 1.25 6.95852C1.25 6.54431 1.58579 6.20852 2 6.20852L9 6.20852Z" fill="currentColor"></path> <path d="M1.25 16.9585C1.25 16.5443 1.58579 16.2085 2 16.2085H4C4.41421 16.2085 4.75 16.5443 4.75 16.9585C4.75 17.3727 4.41421 17.7085 4 17.7085H2C1.58579 17.7085 1.25 17.3727 1.25 16.9585Z" fill="currentColor"></path> <path d="M22 6.20852C22.4142 6.20852 22.75 6.54431 22.75 6.95852C22.75 7.37273 22.4142 7.70852 22 7.70852H20C19.5858 7.70852 19.25 7.37273 19.25 6.95852C19.25 6.54431 19.5858 6.20852 20 6.20852H22Z" fill="currentColor"></path> </g></svg>',
				titleAttr: 'Columns',
				title: $('.export_title').html(),
				postfixButtons: ['colvisRestore']
			},
		]
	});

	// permission page select all
	$("#all_view").on( "click", function() {
		if($(this).is(':checked')){           
			$(".cb_view").prop("checked", true);
		}else{
			$(".cb_view").prop("checked", false);
		}
	});

	$("#all_add").on( "click", function() {
		if($(this).is(':checked')){           
			$(".cb_add").prop("checked", true);
		}else{
			$(".cb_add").prop("checked", false);
		}
	});

	$("#all_edit").on( "click", function() {
		if($(this).is(':checked')){           
			$(".cb_edit").prop("checked", true);
		}else{
			$(".cb_edit").prop("checked", false);
		}
	});
	
	$("#all_delete").on( "click", function() {
		if($(this).is(':checked')){           
			$(".cb_delete").prop("checked", true);
		}else{
			$(".cb_delete").prop("checked", false);
		}
	});

	if($.isFunction($.fn.validate)) {
		$("form.validate").each(function(i, el)
		{
			var $this = $(el),
			opts = {
				highlight: function( label ) {
					$(label).closest('.form-group').removeClass('has-success').addClass('has-error');
				},
				success: function( label ) {
					$(label).closest('.form-group').removeClass('has-error');
					label.remove();
				},
				errorPlacement: function( error, element ) {
					var placement = element.closest('.input-group');
					if (!placement.get(0)) {
						placement = element;
					}
					if (error.text() !== '') {
						if(element.parent('.checkbox, .radio').length || element.parent('.input-group').length) {
							placement.after(error);
						} else {
							var placement = element.closest('div');
							placement.append(error);
							wrapper: "li"
						}
					}
				}
			};
			$this.validate(opts);
		});
	}

	// page full screen
	$(".s-expand").on('click', function(e) {
		if (typeof screenfull != 'undefined') {
			if (screenfull.enabled) {
				screenfull.toggle();
			}
		}
	});
	
	if (typeof screenfull != 'undefined') {
		if (screenfull.enabled) {
			$(document).on(screenfull.raw.fullscreenchange, function() {
				if (screenfull.isFullscreen) {
					$('.s-expand').find('i').toggleClass('fas fa-expand fas fa-expand-arrows-alt');
				} else {
					$('.s-expand').find('i').toggleClass('fas fa-expand-arrows-alt fas fa-expand');
				}
			});
		}
	}
	
	// checkbox, radio and selects
	$("#chk-radios-form, #selects-form").each(function() {
		$(this).validate({
			highlight: function(element) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element) {
				$(element).closest('.form-group').removeClass('has-error');
			},
			errorPlacement: function( error, element ) {
				var placement = element.closest('div');
				if (!placement.get(0)) {
					placement = element;
				}
				if (error.text() !== '') {
					placement.append(error);
				}
			}
		});
	});

	// date range picker
	if ($(".daterange").length) {
		$('.daterange').daterangepicker({
			opens: 'left',
		    locale: {format: 'YYYY/MM/DD'},
		    ranges: {
		       'Today': [moment(), moment()],
		       'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
		       'Last 7 Days': [moment().subtract(6, 'days'), moment()],
		       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
		       'This Month': [moment().startOf('month'), moment().endOf('month')],
		       'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
		       'This Year': [moment().startOf('year'), moment().endOf('year')],
		       'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
		    }
		});
	}

	// modal dismiss
	$(document).on("click", ".modal-dismiss", function(e) {
		e.preventDefault();
		$.magnificPopup.close();
	});

	$(document).ready(function () {
		// document print function
		$("#print").on( "click", function() {
			var mode = 'iframe'; //popup
			var close = mode == "popup";
			var options = {
				mode: mode,
				popClose: close
			};
			$("#printResult").printArea(options);
		});

		// document export CSV
		$("#csv_btn").on("click", function() {
			$("#export_table").table2csv({filename: 'student_attendance_sheet.csv'});
		});

		// script to print show / hidden all
		$("input[name='chkPrint']").on("change", function() {	
			if ($(this).is(":checked"))
			{
				$(this).parents('tr').removeClass("hidden-print");
			} else {
				$(this).parents('tr').addClass("hidden-print");
			}
		});

		// script to id card print show / hidden all
		$("input[name='chk_idcard']").on( "change", function() {
			if ($(this).is(":checked"))
			{
				$(this).parents('.idcard-col').removeClass("hidden-print");
			} else {
				$(this).parents('.idcard-col').addClass("hidden-print");
			}
		});

		// student admission guardian slow / hidden
		$("#chkGuardian").on( "change", function() {
			if ($(this).is(":checked")){
				$("#guardian_form").hide("slow");
				$("#exist_list").show("slow");
			} else {
				$("#guardian_form").show("slow");	
				$("#exist_list").hide("slow");
			}
		});

		// script for all checkbox checked / unchecked
		$("#selectAllchkbox").on("change", function(ev)
		{
			var $chcks = $(".checked-area input[type='checkbox']");
			if($(this).is(':checked'))
			{
				$chcks.prop('checked', true).trigger('change');
			} else {
				$chcks.prop('checked', false).trigger('change');
			}
		});

		// script for Table all checkbox checked / unchecked
		$("#selectAllcbTable").on("change", function(ev)
		{
			var $chcks = $(this).parents('table').find("tbody td input[type='checkbox']");
			if($(this).is(':checked'))
			{
				$chcks.prop('checked', true).trigger('change');
			} else {
				$chcks.prop('checked', false).trigger('change');
			}
		});

		// event holiday show / hide
		$("#chk_holiday").on("change", function(ev)
		{
			if($(this).is(':checked'))
			{
				$("#typeDiv").hide("slow");
				$("#auditionDiv").hide("slow");
				$("#selected_user").hide("slow");
			} else {
				$("#typeDiv").show("slow");
				$("#auditionDiv").show("slow");
			}
		});

		// attachments class and subject show / hide
		$("#all_class_set").on("change", function()
		{
			if($(this).is(':checked'))
			{
				$("#class_div").hide("slow");
				$("#sub_div").hide("slow");
			} else {
				$("#class_div").show("slow");
				$("#sub_div").show("slow");
			}
		});

		$("#subject_wise").on("change", function()
		{
			if($(this).is(':checked'))
			{
				$("#subject_div").hide("slow");
			} else {
				$("#subject_div").show("slow");
			}
		});

		// skipped employee bank details
		$("#chk_bank_skipped").on( "change", function() {
			if ($(this).is(":checked")){
				$("#bank_details_form").hide("slow");
			} else {
				$("#bank_details_form").show("slow");
			}
		});

		$("#live_class_method").on( "change", function() {
			if (this.value == 1)
			{
				$("#bbb_config").hide("slow");
				$("#gmeet").hide("slow");
				$("#zoom_config").show("slow");
			} else if(this.value == 2) {
				$("#zoom_config").hide("slow");
				$("#gmeet").hide("slow");
				$("#bbb_config").show("slow");
			} else if(this.value == 3) {
				$("#zoom_config").hide("slow");
				$("#bbb_config").hide("slow");
				$("#gmeet").show("slow");
			}
		});

		// message delete script
		$(document).on('click', '#msgAction', function() {
			var id = "";
			var type = $(this).data('type');
			var arrayID = [];
			$("input[type='checkbox'].msg_checkbox").each(function (index) {
				if(this.checked) {
					id = $(this).attr('id');
					arrayID.push(id);
				}
			});
			if (arrayID.length != 0) {
				$.ajax({
					url: base_url + "communication/trash_observe",
					type: 'POST',
					data: {
						array_id : arrayID,
						mode : type
					},
					success: function (data) {
						location.reload();
					}
				});
			}
		});

		// message conversation is important
		$(".mailbox-fav").on("click", function() {
			var messageID = $(this).attr('data-id');
			var $this = $(this).find('i');
			var status = $this.hasClass('far fa-bell');
			$this.toggleClass("far fa-bell");
			$this.toggleClass("fas fa-bell");
			$.ajax({
				url: base_url + "communication/set_fvourite_status",
				type: 'POST',
				data: {
					messageID: messageID,
					status: status
				},
				dataType: "json",
				success: function (data) {
					if(data.status == true) {
						alertMsg(data.msg);
					}
				}
			});  
		});

		// events status
		$(".event-switch").on("change", function() {
			var state = $(this).prop('checked');
			var id = $(this).data('id');
			if (state != null) {
				$.ajax({
					type: 'POST',
					url: base_url + "event/status",
					data: {
						id: id,
						status: state
					},
					dataType: "json",
					success: function (data) {
						if(data.status == true) {
							alertMsg(data.msg);
						}
					}
				});
			}
		});
		$(".event-website").on("change", function() {
			var state = $(this).prop('checked');
			var id = $(this).data('id');
			if (state != null) {
				$.ajax({
					type: 'POST',
					url: base_url + "event/show_website",
					data: {
						id: id,
						status: state
					},
					dataType: "json",
					success: function (data) {
						if(data.status == true) {
							alertMsg(data.msg);
						}
					}
				});
			}
		});

		$(".gallery_website").on("change", function() {
			var state = $(this).prop('checked');
			var id = $(this).data('id');
			if (state != null) {
				$.ajax({
					type: 'POST',
					url: base_url + "frontend/gallery/show_website",
					data: {
						id: id,
						status: state
					},
					dataType: "json",
					success: function (data) {
						if(data.status == true) {
							alertMsg(data.msg);
						}
					}
				});
			}
		});
	});

	// bootstrapToggle configurations
	if ($(".toggle-switch").length) {
		$('.toggle-switch').bootstrapToggle();
	}

	// dropify basic configurations
	if (typeof Dropify != 'undefined') {
		if ($(".dropify").length) {
			$(".dropify").dropify();
		}
	}

	// month and year mode datepicker
	if ($(".monthyear").length) {
        $(".monthyear").datepicker({
            orientation: 'bottom',
            autoclose: true,
            startView: 1,
            format: 'yyyy-mm',
            minViewMode: 1,
        });
    }

	// customize ckeditor
	if ($("#ckeditor").length) {
		CKEDITOR.replace('ckeditor');
	}

	if ($(".editor").length) {
		$('.editor').ckeditor();
	}

	// customize summernote
	if ($(".summernote").length) {
		$('.summernote').summernote({
			height: 220,
			toolbar: [
				["style", ["style"]],
				["name", ["fontname","fontsize"]],
				["font", ["bold","italic","underline", "clear"]],
				["color", ["color"]],
				["para", ["ul", "ol", "paragraph"]],
				["insert", ["link","table"]],
				["misc", ["fullscreen", "undo", "codeview"]]
			]
		});
	}

	// date range picker
	if ($(".daterange").length) {
		$('.daterange').daterangepicker({
			opens: 'left',
		    locale: {format: 'YYYY/MM/DD'},
		    ranges: {
		       'Today': [moment(), moment()],
		       'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
		       'Last 7 Days': [moment().subtract(6, 'days'), moment()],
		       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
		       'This Month': [moment().startOf('month'), moment().endOf('month')],
		       'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
		       'This Year': [moment().startOf('year'), moment().endOf('year')],
		       'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
		    }
		});
	}
})(jQuery);

// payroll salary add more allowances
function add_more_allowances() {
	var add_new = $('<div class="row"><div class="col-md-6 mt-md"> <input class="form-control" name="allowance_name[]" placeholder="Name Of Allowance" type="text">\n\
	</div><div class="col-md-4 mt-md"> <input class="salary form-control" name="allowance_value[]" placeholder="Amount" type="number"></div>\n\
	<div class="col-md-2 mt-md text-right"><button type="button" class="btn btn-danger removeAL" ><i class="fas fa-times"></i> </button></div></div>');
	$("#add_new_allowance").append(add_new);
}

// payroll salary allowances remove
$("#add_new_allowance").on('click', '.removeAL', function () {
	$(this).parent().parent().remove();
	payrollCheckSum();
});

// payroll salary add more deduction
function add_more_deduction() {
	var add_new = $('<div class="row"><div class="col-md-6 mt-md"> <input class="form-control" name="deduction_name[]" placeholder="Name Of Deductions" type="text">\n\
	</div><div class="col-md-4 mt-md"> <input class="deduction form-control" name="deduction_value[]" placeholder="Amount" type="number"></div>\n\
	<div class="col-md-2 mt-md text-right"><button type="button" class="btn btn-danger removeDE"><i class="fas fa-times"></i> </button></div></div>');
	$("#add_new_deduction").append(add_new);
}

// payroll salary deduction remove
$("#add_new_deduction").on('click', '.removeDE', function () {
	$(this).parent().parent().remove();
	payrollCheckSum();
});

function payrollCheckSum() {
    var sum = 0;
    var deduc = 0;
    $(".salary").each(function () {
        sum += $(this).val() ? parseFloat($(this).val()) : 0;
    });

    $(".deduction").each(function () {
        deduc += $(this).val() ? parseFloat($(this).val()) : 0;
    });

    $("#total_allowance").val(sum);
    $("#total_deduction").val(deduc);

    var net_salary = 0;
	var basic = $('#basic_salary').val() ? parseFloat($('#basic_salary').val()) : 0;
	
    net_salary = (basic + sum) - deduc;
    $("#net_salary").val(net_salary);
    $("#v_basic_salary").val(basic);
}

// event modal showing
function viewEvent(id) {
	$.ajax({
		url: base_url + "event/getDetails",
		type: 'POST',
		data: {
			event_id: id
		},
		success: function (data) {
			$('#ev_table').html(data);
			mfp_modal('#modal');
		}
	});
}

function ajaxModal(url) {
	// show ajax response on request success
	$.ajax({
		url: url,
		success: function (data) {
			$.magnificPopup.open({
				items: {
					src: data,
					type: 'inline',
				},
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 400,
				mainClass: 'my-mfp-zoom-in',
				modal: true
			});
		}
	});
}

// modal with css animation
function mfp_modal(data){
	$.magnificPopup.open({
		items: {
			src: data,
			type: 'inline',
		},
		fixedContentPos: true,
		fixedBgPos: true,
		overflowY: 'auto',
		closeBtnInside: true,
		preloader: false,
		midClick: true,
		removalDelay: 400,
		mainClass: 'my-mfp-zoom-in',
		modal: true
	});
}

$(document).ready(function () {
	$(".whatsapp-button").on( "click", function() {
	    $('.whatsapp-popup').toggleClass('open');
	});

	$(".whatsapp-agent").on( "click", function() {
	    go_to_whatsapp($(this).attr('data-number'));
	});

	function go_to_whatsapp(number, text = ""){
	    var WhatsAppUrl = 'https://web.whatsapp.com/send';
	    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	        WhatsAppUrl = 'https://api.whatsapp.com/send'; 
	    }
	    var url = WhatsAppUrl+'?phone='+number;
	    if (text !== "") {
	        url += '&text='+text;
	    }
	    var win = window.open(url, '_blank');
	    win.focus();
	}
});