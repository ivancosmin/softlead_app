var DatatablesDataSourceHtml = function() {

	var initTable1 = function() {
		var table = $('#m_table_1');

		// begin first table
		table.DataTable({
			responsive: true,
			columnDefs: [

				{
					targets: 5,
					render: function(data, type, full, meta) {
						var status = {
                            0: {'title': 'Canceled', 'class': ' m-badge--danger'},
                            1: {'title': 'Success', 'class': ' m-badge--success'},
                            2: {'title': 'Pending', 'class': 'm-badge--warning'},
                            // 0: {'title': 'Warning', 'class': ' m-badge--warning'},
							// 2: {'title': 'Delivered', 'class': ' m-badge--metal'},
							// 5: {'title': 'Info', 'class': ' m-badge--info'},
							// 6: {'title': 'Danger', 'class': ' m-badge--danger'},

						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="m-badge ' + status[data].class + ' m-badge--wide">' + status[data].title + '</span>';
					},
				},
				// {
				// 	targets: 7,
				// 	render: function(data, type, full, meta) {
				// 		var status = {
				// 			1: {'title': 'Online', 'state': 'danger'},
				// 			2: {'title': 'Retail', 'state': 'primary'},
				// 			3: {'title': 'Direct', 'state': 'accent'},
				// 		};
				// 		if (typeof status[data] === 'undefined') {
				// 			return data;
				// 		}
				// 		return '<span class="m-badge m-badge--' + status[data].state + ' m-badge--dot"></span>&nbsp;' +
				// 			'<span class="m--font-bold m--font-' + status[data].state + '">' + status[data].title + '</span>';
				// 	},
				// },

			],
		});

	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
		},

	};

}();

jQuery(document).ready(function() {
	DatatablesDataSourceHtml.init();
});