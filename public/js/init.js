var tooltip_data = [];

var getUrl = window.location;
var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/";

function initJS($outer) {



    // Switchery
    if ($outer.find('.js-switch').length) {
        $outer.find('.js-switch').each(function () {
            new Switchery($(this)[0], $(this).data());
        });
    }

    // Switchery
    if ($outer.find('.select2').length) {
        $outer.find('.select2').select2();
    }

    // Switchery
    if ($outer.find('.mdate').length) {
        $outer.find('.mdate').bootstrapMaterialDatePicker({ weekStart: 0, time: false });

    }

    if ($outer.find('#table_task').length) {
        $outer.find('#table_task').dataTable({
            scrollCollapse: true,
            fixedColumns:   true,
            scrollY: 607,
            scrollX: false,
            "dom": 'l<"top-data"<"data-search"f><"data-page"p>>rti',
            stateSaveCallback: function (oSettings, oData) {
                // console.log(oData);
                var hash = window.location.hash;
                localStorage.setItem('DataTables_table_task' + hash, JSON.stringify(oData));
            },
            stateLoadCallback: function (oSettings) {
                var hash = window.location.hash;
                return JSON.parse(localStorage.getItem('DataTables_table_task' + hash));
            },
            "paging": false,
            'searching': false,
            "ordering": false,
            "colReorder": true,
            "stateSave": true,
            "buttons": false
        })
    }

    if($outer.find('#basic_table2').length){
        var tableobj = $outer.find('#basic_table2');
        var fetVisibleCols = function (visibleCols) {
            console.log('visibleCols--',visibleCols);
            if(tableobj.length){
                var $visi = [];
                tableobj.find("thead > tr > th").each(function(i, val) {
                    $visi.push($(val).data('field_name'))
                });
                tableobj.attr('data-columns-visible',JSON.stringify($visi))
                /*$.each(visibleCols,function (i,v) {
                    tableobj.attr('data-columns-visible',JSON.stringify(v));
                })*/
            }
        }

        $('.c-btn').hide();
        var col = tableobj.attr('data-target-column') != undefined ? tableobj.attr('data-target-column') : 0;
        var order = tableobj.attr('data-target-column-order') != undefined  ? tableobj.attr('data-target-column-order') : 'desc';

        if(col != 0){
            if(col.indexOf(',') !== -1){
                col = col.split(',');
            }
        }

        if(order.indexOf(',') !== -1){
            var col_order = [];
            order = order.split(',');

            $.each(col, function (i,v) {
                col_order.push([
                    parseInt(v),
                    $.trim(order[i]).toLowerCase()
                ])
            })
        }else{
            var col_order = [parseInt(col),$.trim(order).toLowerCase()]; //tableobj.attr('data-target-column-order')
        }

        console.log(col_order);

        var col_order1 = [0,'desc'];
        var col_order2 = [1,'desc'];



        console.log('order--',col_order);
         var dtable = tableobj.DataTable({
            "width" : "100%",
            dom: 'Bfrtp',
            "paging": false,
            "displayLength": 5,
            'searching': false,
            "ordering": true,
            //"order": [col_order1, col_order2],
             "stateSave": true,
             "stateDuration": -1,
             stateSaveCallback: function (oSettings, oData) {
                 // console.log(oData);
                 var hash = window.location.hash;
                 localStorage.setItem('DataTables_basic_table2' + hash, JSON.stringify(oData));
             },
             stateLoadCallback: function (oSettings) {
                 var hash = window.location.hash;
                 return JSON.parse(localStorage.getItem('DataTables_basic_table2' + hash));
             },
            "language": {
                 "emptyTable": tableobj.data('message') ? tableobj.data('message') : "No data available in table"
            },
            "buttons": [{
                extend: 'colvis',
                text: '<i class="fas fa-table ds-c"></i>',
                collectionLayout: 'fixed two-column'
            }],

            //"dom": 'l<"top-data"<"data-search"f><"data-page"p>>rti',
            //responsive: true
        });

        fetVisibleCols(dtable.columns(':visible'));

        $('.c-btn').html('');
            dtable.buttons().container()
                .appendTo( $('.c-btn') );

        tableobj.on('column-visibility.dt', function (e, settings, column, state) {
            var visibleCols = tableobj.DataTable().columns(':visible');
            var numCols = visibleCols.nodes().length;
            fetVisibleCols(visibleCols);

            tableobj.attr('style','width:100% !important')
        });

        setTimeout(function () {
            $('.dt-buttons').css({'padding-top' : '0px','margin-bottom' : '0px'});
            $('.dt-button').prop('title','Set Columns');
            $('.dt-button').prop('class','').addClass('btn btn-light d-none d-lg-block font-16');

            $('.c-btn').show();
            dtable.order(col_order).draw();
        },1000);
    }



    if($outer.find('#basic_table').length){
        var dtable = $outer.find('#basic_table').DataTable({
            "width" : "100%",
            "dom": 'l<"top-data"<"data-search"f><"data-page"p>>rti',
            "paging": false,
            "displayLength": 5,
            'searching': false,
            "ordering": false,
            "stateSave": true,
            //"dom": 'l<"top-data"<"data-search"f><"data-page"p>>rti',
            //responsive: true
        });

    }

    if($outer.find('#basic_table_without_dynamic_pagination').length){
        var fetVisibleCols = function (visibleCols) {
            if($('#basic_table_without_dynamic_pagination').length){
                $.each(visibleCols,function (i,v) {
                    $('#basic_table_without_dynamic_pagination').attr('data-columns-visible',JSON.stringify(v));
                })
            }
        }
        var dtable = $outer.find('#basic_table_without_dynamic_pagination').DataTable({
            "width" : "100%",
            "dom": '<"top">rt<"bottom"ip><"clear">',
            "paging": true,
            "displayLength": 15,
            'searching': false,
            "order": [[ 0, 'desc' ]],
            "stateSave": false,
            "buttons": [{
                extend: 'colvis',
                text: '<i class="fas fa-table ds-c"></i>',
                collectionLayout: 'fixed two-column'
            }],
            drawCallback: function(){
                $('.paginate_button', this.api().table().container()).on('click', function(){
                    $('#basic_table_without_dynamic_pagination > thead > tr > th').each(function(){
                        var matched = $(this).hasClass('matched');
                        var columnclass = $(this).attr('data-class');
                        if(columnclass){
                            if(matched)
                                $('.' + columnclass).addClass('matched').removeClass('unmatched');
                            else
                                $('.' + columnclass).addClass('unmatched').removeClass('matched');
                        }
                    })

                });
            }
        });

        fetVisibleCols(dtable.columns(':visible'));

        $('.c-btn').html('');
        dtable.buttons().container()
            .appendTo( $('.c-btn') );

        $('#basic_table_without_dynamic_pagination').on('column-visibility.dt', function (e, settings, column, state) {
            var visibleCols = $('#basic_table_without_dynamic_pagination').DataTable().columns(':visible');
            var numCols = visibleCols.nodes().length;
            fetVisibleCols(visibleCols);

            $('#basic_table_without_dynamic_pagination').attr('style','width:100% !important')
        });

        setTimeout(function () {
            $('.dt-buttons').css({'padding-top' : '0px','margin-bottom' : '0px'});
            $('.dt-button').prop('title','Set Columns');
            $('.dt-button').prop('class','').addClass('btn btn-light d-none d-lg-block font-16');

            $('.c-btn').show();
        },1000);

        $('#select_all').click(function(e) {
            var cells = dtable.column(0).nodes(), // Cells from 1st column
                state = this.checked;

            for (var i = 0; i < cells.length; i += 1) {
                cells[i].querySelector("input[type='checkbox']").checked = state;
            }
        });

    }

    if($outer.find('#editableTable').length){
        $outer.find('#editableTable').editableTableWidget();
    }

    if ($outer.find('.dropify-attachment').length) {
        $outer.find('.dropify-attachment').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                // 'replace': 'Drag and drop or click to replace',
                // 'remove': 'Remove',
                // 'error': 'Ooops, something wrong happended.'
            }
        });
    }


    if ($outer.find("#filer_input").length) {
        $outer.find("#filer_input").filer(
            {
                showThumbs: true,
                addMore: true,
                allowDuplicates: false,
                theme: "default",
                excludeName: null,
                extensions: null,
                changeInput: true,
                showThumbs: true,
                appendTo: null,
                onRemove: function(){
                    setTimeout(function(){
                        $('#input_file').trigger("filer.remove", {id:0});
                        $('#input_file').trigger("filer.reset");
                        }, 1000);

                },
            }
        );
    }
    if ($outer.find("#filer_input1").length) {
        $outer.find("#filer_input1").filer({showThumbs: true, addMore: true, allowDuplicates: false});
    }
    if ($outer.find("#filer_input2").length) {
        $outer.find("#filer_input2").filer({showThumbs: true, addMore: true, allowDuplicates: false});
    }

    if ($outer.find("#filer_input_meeting_task").length) {
        $outer.find("#filer_input_meeting_task").filer({showThumbs: true, addMore: true, allowDuplicates: false});
    }

    if ($outer.find("#filer_input_meeting").length) {
        $outer.find("#filer_input_meeting").filer({showThumbs: true, addMore: true, allowDuplicates: false});
    }

    if ($outer.find("#filer_input_meeting_tasks").length) {
        $outer.find("#filer_input_meeting_tasks").filer({showThumbs: true, addMore: true, allowDuplicates: false});
    }

    if ($outer.find("#filer_input_event").length) {
        $outer.find("#filer_input_event").filer({showThumbs: true, addMore: true, allowDuplicates: false});
    }

    if ($outer.find("a.grouped_elements").length) {
        $outer.find("a.grouped_elements").fancybox({
            prevEffect: 'none',
            nextEffect: 'none',
            closeBtn: false,
            helpers: {
                title: {type: 'inside'},
                buttons: {}
            }
        });
    }

    if ($(".ajax-import-Link").length) {
        $(".ajax-import-Link").on('click', function () {
            var url = $(".ajax-import-Link").attr('data-href');
            var import_data = localStorage.getItem('import_data');

            ACFn.sendAjax(url, 'post', {
                import_data : import_data,
                _token : $('[name="_token"]').val()
            })
        });

    }
    if ($(".word").length) {
        $(".word").fancybox({
            width: 1000, // or whatever
            height: 600,
            type: 'iframe',
            href: this.href,
        });
    }

    if ($outer.find('#example23').length) {
        $outer.find('#example23').DataTable({
            searching: false, paging: false,
            "stateSave": true,
            "scrollY": 350,
            "scrollX": true,

        });
    }
    if ($outer.find('#upcoming').length) {
        $outer.find('#upcoming').DataTable({
            dom: 'Bfrtip',
            // "ordering": false,
            order: [[4, 'asc']],
            "iDisplayLength": 20,
            buttons: []
        });
    }
    if ($outer.find('#late').length) {
        $outer.find('#late').DataTable({
            dom: 'Bfrtip',
            "ordering": false,
            "iDisplayLength": 20,
            buttons: []
        });
    }
    if ($outer.find('#done').length) {
        $outer.find('#done').DataTable({
            "paging": false,
            "ordering": false,
            "info": false
        });
    }
    if ($outer.find('#taskList').length) {
        $outer.find('#taskList').DataTable({
            dom: 'Bfrtip',
            "ordering": false,
            "iDisplayLength": 20,
            buttons: []
        });
    }

    var config = {
        '.chosen-select': {display_selected_options: false},
        '.chosen-select-deselect': {allow_single_deselect: true, display_selected_options: false},
        '.chosen-select-no-single': {disable_search_threshold: 10, display_selected_options: false},
        '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!', display_selected_options: false},
        '.chosen-select-width': {width: "95%", display_selected_options: false},
        '.chosen-select-disable-search': {disable_search: true}
    }
    for (var selector in config) {
        if ($outer.find(selector).length) {
            if (typeof  ($outer.find(selector).chosen) == 'function') {
                $outer.find(selector).chosen(config[selector]);
            } else {
                console.error('Load Chosen Library');
            }
        }
    }

    if ($outer.find('#s_0').length) {
        $outer.find('#s_0').chosen().change(function (evt, params) {
            var action = params.selected ? 'selected' : 'deselected';
            var fieldname = params.selected ? params.selected : params.deselected;
            add_field(fieldname,action,$outer)
        });
    }
    if ($outer.find('#s_1').length) {
        $outer.find('#s_1').chosen().change(function (evt, params) {
            var action = params.selected ? 'selected' : 'deselected';
            var fieldname = params.selected ? params.selected : params.deselected;
            add_field(fieldname,action,$outer)
        });
    }

    if ($outer.find('#s_2').length) {
        $outer.find('#s_2').chosen().change(function (evt, params) {
            var action = params.selected ? 'selected' : 'deselected';
            var fieldname = params.selected ? params.selected : params.deselected;
            add_field(fieldname,action,$outer)
        });
    }

    if ($outer.find('#s_3').length) {
        $outer.find('#s_3').chosen().change(function (evt, params) {
            var action = params.selected ? 'selected' : 'deselected';
            var fieldname = params.selected ? params.selected : params.deselected;
            add_field(fieldname,action,$outer)
        });
    }

    if ($outer.find('#s_4').length) {
        $outer.find('#s_4').chosen().change(function (evt, params) {
            var action = params.selected ? 'selected' : 'deselected';
            var fieldname = params.selected ? params.selected : params.deselected;
            add_field(fieldname,action,$outer)
        });
    }

    if ($outer.find('#s_5').length) {
        $outer.find('#s_5').chosen().change(function (evt, params) { console.log(params)
            var action = params.selected ? 'selected' : 'deselected';
            var fieldname = params.selected ? params.selected : params.deselected;
            add_field(fieldname,action,$outer)
        });
    }

    if ($outer.find('#s_6').length) {
        $outer.find('#s_6').chosen().change(function (evt, params) {
            var action = params.selected ? 'selected' : 'deselected';
            var fieldname = params.selected ? params.selected : params.deselected;
            add_field(fieldname,action,$outer)
        });
    }

    if ($outer.find('#s_7').length) {
        $outer.find('#s_7').chosen().change(function (evt, params) {
            var action = params.selected ? 'selected' : 'deselected';
            var fieldname = params.selected ? params.selected : params.deselected;
            add_field(fieldname,action,$outer)
        });
    }

    if ($outer.find('#s_8').length) {
        $outer.find('#s_8').chosen().change(function (evt, params) {
            var action = params.selected ? 'selected' : 'deselected';
            var fieldname = params.selected ? params.selected : params.deselected;
            add_field(fieldname,action,$outer)
        });
    }

    if ($outer.find('#s_9').length) {
        $outer.find('#s_9').chosen().change(function (evt, params) {
            var action = params.selected ? 'selected' : 'deselected';
            var fieldname = params.selected ? params.selected : params.deselected;
            add_field(fieldname,action,$outer)
        });
    }

    if ($outer.find('#s_10').length) {
        $outer.find('#s_10').chosen().change(function (evt, params) {
            var action = params.selected ? 'selected' : 'deselected';
            var fieldname = params.selected ? params.selected : params.deselected;
            add_field(fieldname,action,$outer)
        });
    }

    if ($outer.find('#s_11').length) {
        $outer.find('#s_11').chosen().change(function (evt, params) {
            var action = params.selected ? 'selected' : 'deselected';
            var fieldname = params.selected ? params.selected : params.deselected;
            add_field(fieldname,action,$outer)
        });
    }

    if ($outer.find('#s_12').length) {
        $outer.find('#s_12').chosen().change(function (evt, params) {
            var action = params.selected ? 'selected' : 'deselected';
            var fieldname = params.selected ? params.selected : params.deselected;
            add_field(fieldname,action,$outer)
        });
    }

    if ($outer.find('#s_13').length) {
        $outer.find('#s_13').chosen().change(function (evt, params) {
            var action = params.selected ? 'selected' : 'deselected';
            var fieldname = params.selected ? params.selected : params.deselected;
            add_field(fieldname,action,$outer)
        });
    }

    if ($outer.find('#s_14').length) {
        $outer.find('#s_14').chosen().change(function (evt, params) {
            var action = params.selected ? 'selected' : 'deselected';
            var fieldname = params.selected ? params.selected : params.deselected;
            add_field(fieldname,action,$outer)
        });
    }

    if ($outer.find("#timepicker").length) {
        var $timepicker = $outer.find("#timepicker");
        var $parent = $timepicker.parent('div');
        var $timpicker_hour = $parent.find('#timepicker-hour');
        var $timpicker_minute = $parent.find('#timepicker-minute');
        var hours = parseInt($timepicker.val() / 60);
        var minutes = parseInt($timepicker.val() % 60);
        $timpicker_hour.val(hours);
        $timpicker_minute.val(minutes);
        $timpicker_hour.on('change', function () {
            putTime();
        });
        $timpicker_minute.on('change', function () {
            putTime();
        });

        function putTime() {
            var hours = $timpicker_hour.val();
            var minutes = $timpicker_minute.val();
            var calc = (hours * 60) + parseInt(minutes);
            if (calc) {
                $timepicker.val(calc);
            } else {
                $timepicker.val('');
            }
        }
    }

    if ($outer.find('[data-toggle="tooltip"]').length) {
        $outer.find('[data-toggle="tooltip"]').tooltip();
    }

    if ($outer.find('.summernote').length) {
        $outer.find('.summernote').summernote({
            toolbar:[
                // This is a Custom Button in a new Toolbar Area

                ['font', ['bold', 'italic', 'underline']],
                ['fontname',['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph', 'link']],
                ['custom', ['checklist']]
            ],
            height: 350,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false,                 // set focus to editable area after initializing summernote

            callbacks: {
                onImageUpload: function (data) {
                    data.pop();
                },onPaste: function (e) { console.log('hereee');
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    document.execCommand('insertText', false, bufferText);
                }
            }
        });
        $.each($outer.find('.summernote'), function (index, element) {
            var disabled = $(element).prop('disabled');
            if (disabled) {
                $(element).summernote('disable');
            }
        })
    }

    if ($outer.find("#tickets_table").length) {
        var $table = $outer.find("#tickets_table");
        // console.log($table);
        $table.DataTable({
            scrollY: 380,
            scrollX: true,
            "dom": 'l<"top-data"<"data-search"f><"data-page"p>>rti',
            stateSaveCallback: function (oSettings, oData) {
                // console.log(oData);
                var hash = window.location.hash;
                localStorage.setItem('DataTables_tickets_table' + hash, JSON.stringify(oData));
            },
            stateLoadCallback: function (oSettings) {
                var hash = window.location.hash;
                return JSON.parse(localStorage.getItem('DataTables_tickets_table' + hash));
            },
            "paging": false,
            'searching': false,
            "colReorder": true,
            "stateSave": true,
            "buttons": [
                'colvis'
            ]


        });
    }

    if ($outer.find('#gap_reports_table').length) {
        var $table = $outer.find('#gap_reports_table');
        $table.DataTable({
            searching: false, paging: false,"stateSave": true, "scrollY": true,"scrollX": true,
        });
    }

    if ($outer.find('#row_variable').length) {
        var MS = [
            'row_variable'
        ];

        $.each(MS, function (index, value) {
            if ($("#" + value).length) {
                $("#" + value).multiselect({
                    appendTo: '#modal-popup',
                    close: function () {
                    },
                    header: true, //"Region",
                    selectedList: 1, // 0-based index
                    nonSelectedText: 'Select Values',
                    enableFiltering: true,
                    filterBehavior: 'text',
                }).multiselectfilter({label: 'Search'});

                $("#" + value + "_ms").attr('style', 'width:245.156px !important;height: 28px; background-color: white !important;height: calc(1.5em + .5rem + 2px);padding: .25rem .5rem;border-radius: .2rem;background-clip: padding-box;border: 1px solid #e9ecef;font-size: .76563rem;min-height: 27px;');
                //$("#" + value).multiselect('refresh');
            }
        });
    }


    if ($outer.find('.ajax-Tooltip').length) {
        // $outer.find('.ajax-Tooltip').on('mouseenter', function () {
        //     var url = $(this).data('href');
        //     var id = $(this).data('tooltip-id');
        //     $(this).data('popover-show', true);
        //     if ($(this).data('popover-loaded')) {
        //         $(this).tooltip('show');
        //     } else if (typeof (tooltip_data[id]) != 'undefined') {
        //         initAjaxTooltip($(this), tooltip_data[id]);
        //     } else {
        //         ACFn.sendAjax(url, 'GET', [], $(this), false);
        //     }
        //
        // })
        // $outer.find('.ajax-Tooltip').on('mouseleave', function () {
        //     $(this).data('popover-show', false);
        //     $(this).tooltip('hide');
        // })
    }

    if ($outer.find('#datepicker-autoclose1').length) {
        $outer.find('#datepicker-autoclose1').datepicker({
            todayBtn: "linked",
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true
        });
    }

    if ($outer.find('.js-datepicker').length) {
        // console.log('datepicker Found');
        $.each($outer.find('.js-datepicker'), function (index, element) {
            $(element).datepicker({
                format: $(element).data('date-format') ? $(element).data('date-format') : 'yyyy-mm-dd',
                autoclose: true,
                calendarWeeks: true,
                todayHighlight: true
            });
        });
    }

    if ($outer.find('.js-clockpicker').length) {
        // console.log('datepicker Found');
        $.each($outer.find('.js-clockpicker'), function (index, element) {
            $(element).clockpicker({
                donetext: 'Done',
                twelvehour: true,
                'default': '09:00'
            }).find('input').click(function() {
                console.log(this.value);

            });
        });
    }

    if ($outer.find('.js-clockpicker-24h').length) {
        // console.log('datepicker Found');
        $.each($outer.find('.js-clockpicker-24h'), function (index, element) {
            $(element).clockpicker({
                donetext: 'Done',
                twelvehour: false,
                'default': '09:00'
            }).find('input').click(function() {
                console.log(this.value);

            });
        });
    }

    if ($outer.find('.dev_popover').length) {
        $.each($outer.find('.dev_popover'), function (index, element) {
            // $(element).popover({
            //     html: true,
            //     content: $("#" + $(element).data('id')).html()
            // });
        })
    }

    if ($outer.find('.js-slim-scroll').length) {
        $.each($outer.find('.js-slim-scroll'), function (index, element) {
            var height = $(element).data('height');
            var start = $(element).data('start');
            if (!height) {
                height = '200px'
            } else if (height == 'auto') {
                height = '';
            }
            if (!start) {
                start = 'top'
            }
            $(element).slimScroll({
                height: height,
                start: start
            });
        });
    }

    if ($outer.find('.timeline-html-popover').length) {
        $outer.find('.timeline-html-popover').on('click', function (e) {
            e.preventDefault();
        })
        $.each($outer.find('.timeline-html-popover'), function (index, element) {
            $(element).popover({
                html: true,
                trigger: 'hover',
                placement: 'right',
                container: 'body',
                template: '<div class="popover timeline-popover fade right in">\n' +
                '    <div class="arrow"></div\n' +
                '    <h3 class="popover-title"></h3>\n' +
                '    <div class="popover-content">\n' +
                '\n' +
                '    </div>\n' +
                '</div>'
            });
        });
    }

    if ($outer.find('.t-f-tooltip').length) {
        // alert('tool');
        $outer.find('.t-f-tooltip').tooltip({
            container: 'body',
            html: true,
            placement: 'auto top'

        });
    }

    if ($outer.find('.t-t-tooltip').length) {
        // alert('tool');
        $outer.find('.t-t-tooltip').tooltip({
            container: 'body',
            placement: 'auto top'

        });
    }

    if ($outer.find('.ti-t-tooltip').length) {
        // alert('tool');
        $outer.find('.ti-t-tooltip').tooltip({
            container: 'body',
            placement: 'auto top'

        });
    }

    if ($outer.find('.colorpicker').length) { console.log('colorpicker-------', $outer.find('.colorpicker').length)
        let mode = $outer.find('.colorpicker').attr('mode');
        $outer.find('.colorpicker').asColorPicker({
            mode: mode,
            color: {
                format: false,
                alphaConvert: false,
                shortenHex: false,
                hexUseName: false,
                reduceAlpha: true,
                nameDegradation: 'HEX',
                invalidValue: '',
                zeroAlphaAsTransparent: true
            },
        });
    }

    if ($('.startDateId').length) {
        $('.startDateId').datepicker({  //#datepicker-autoclose
            todayBtn: "linked",
            format: $('.startDateId').data('date-format') ? $('.startDateId').data('date-format') : 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            orientation: "bottom"
        }).on('changeDate', function(e) {
            console.log("sdfgs");
            validateStartEndDate();
            // validateEventStartEndDate();
        });
    }
    if ($('.endDateId').length) {
        $('.endDateId').datepicker({
            todayBtn: "linked",
            format: $('.endDateId').data('date-format') ? $('.endDateId').data('date-format') : 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            orientation: "bottom"
        }).on('changeDate', function(e) {
            validateStartEndDate();
        });
    }

    jQuery('.addon').click(function () {
        jQuery('.startDateId').datepicker('show');
    });
    jQuery('.addon1').click(function () {
        jQuery('.endDateId').datepicker('show');
    });

    function validateStartEndDate(){
        if((jQuery('.startDateId').val() != "" && jQuery('.endDateId').val() != "")){
            //jQuery('#dft_input_from').val() > jQuery('#dft_input_to').val()
            var startDate = jQuery('.startDateId').val();

            var startDatePart = startDate.split('-');

            var convertedStartDate = startDatePart[2]+'-'+startDatePart[1]+'-'+startDatePart[0];
            stringStartdate = new Date(convertedStartDate).toISOString();

            var endDate = jQuery('.endDateId').val();
            var endDatePart = endDate.split('-');

            var convertedEndDate = endDatePart[2]+'-'+endDatePart[1]+'-'+endDatePart[0];
            stringEnddate = new Date(convertedEndDate).toISOString();


            if(stringStartdate > stringEnddate){
                ACFn.display_message('End Date cannot be less than Start Date  !!', '', 'error', 3000);
                jQuery('.endDateId').val('');
            }
        }
    }

    if ($outer.find("input[type=text]").length > 0) {
        $outer.find("input[type=text]").attr('autocomplete','new-password');
    }

    if ($outer.find("input[type=password]").length > 0) {
        $outer.find("input[type=password]").attr('autocomplete','new-password');
    }

    if ($outer.find("input[type=email]").length > 0) {
        $outer.find("input[type=email]").attr('autocomplete','new-password');
    }

    if ($outer.find("form").length > 0) {
        $outer.find("form").attr('autocomplete','new-password');

    }



}



function details_in_popup(link, div_id) {
    //
    // $.ajax({
    //     url: link,
    //     success: function (response) {
    //         $('#' + div_id).html(response);
    //     }
    // });
    return '<div id="' + div_id + '">Loading...</div>';
}

function scroll_div_to_bottom($div) {
    setTimeout(function () {
        // console.log($div.prop("scrollHeight"));
        $div.animate({scrollTop: $div.prop("scrollHeight")}, 0);
    }, 100);

    $div.animate({scrollTop: $div.prop("scrollHeight")}, 0);
}

function initAjaxTooltip(F, R) {
    // var id = F.data('tooltip-id');

    // $allpopovers = $('[data-tooltip-id="' + id + '"]');
    // if ($allpopovers) {
    //     $allpopovers.each(function (index, element) {
    //         $(element).attr('title', R.html);
    //         $(element).tooltip({
    //             "html": true,
    //             trigger: 'manual',
    //             container: 'body',
    //             'viewport': {selector: '#page-wrapper', padding: 107},
    //             placement: 'auto top',
    //             // "content": R.html
    //         });
    //         $(element).data('popover-loaded', true);
    //     });
    // }
    F.attr('title', R.html);
    F.tooltip({
        "html": true,
        trigger: 'manual',
        container: 'body',
        'viewport': {selector: '#page-wrapper', padding: 107},
        placement: 'auto left',
        // "content": R.html
    });
    F.data('popover-loaded', true);
    // F.popover({
    //     "html": true,
    //     trigger: 'manual',
    //     placement: 'auto top',
    //     "content": R.html
    // });
    if (F.data('popover-show')) {
        F.tooltip('show');
    }
}

$("document").ready(function () {

    $("body").on('click', '.dev_popover', function (e) {
        e.preventDefault();
        var $element = $(this);
        if ($element.next().hasClass('popover')) {
            $element.popover("destroy");
        } else {
            $element.popover({
                trigger: 'manual',
                html: true,
                content: $("#" + $element.data('id')).html()
            });

            $element.popover("show");
            $popover = $element.next();
            $popover.find('.dev_slider').slider({
                //ticks: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100],
                ticks: [0, 50, 100],
                tooltip: 'always',
                tooltip_position: 'bottom',
                min: 0,
                max: 100,
                value: $popover.find('.dev_slider').val(),
                step: 10
            });
            //

        }
    });


    if (typeof NProgress != 'undefined') {
        NProgress.configure({minimum: 0.4});
    }


    ACFn.append_tooltip_data = function (F, R) {
        var id = F.data('tooltip-id');
        tooltip_data[id] = R;
        initAjaxTooltip(F, R);
        return;
        // console.log(R.html);
        // F.html(R.html);
        var id = F.data('tooltip-id');
        $allpopovers = $('[data-tooltip-id="' + id + '"]');
        if ($allpopovers) {
            $allpopovers.each(function (index, element) {
                $(element).attr('title', R.html);
                var placement = $(element).data('placement');
                if(!placement) {
                    placement = 'auto top';
                }
                $(element).tooltip({
                    "html": true,
                    trigger: 'manual',
                    container: 'body',
                    'viewport': {selector: '#page-wrapper', padding: 107},
                    placement: placement,
                    // "content": R.html
                });
                $(element).data('popover-loaded', true);
            });
        }
        // F.popover({
        //     "html": true,
        //     trigger: 'manual',
        //     placement: 'auto top',
        //     "content": R.html
        // });
        if (F.data('popover-show')) {
            F.tooltip('show');
        }
    }

    ACFn.Task_Reset = function (F, R) {
        $('.tab-ajax:first-child').removeClass('active');
        target = $('#autoajax ul');
        if(R.tab_id){
            $('#autoajax li').parent().find('li').removeClass("active");
            $('a[data-tabid=' + R.tab_id + ']').trigger('click');
        }else{
            $('li:first-child', target).removeClass('active');
            $('li:first-child a', target).trigger('click');
        }
        $('#single-task_'+R.task_id+' a').trigger('click');
        if(R.decision){
            $('#single-task_'+R.task_id+' a span').text(R.decision);
        }
        $('#modal-popup').modal('hide');
        $('.bk-overlay').removeClass("in");
        $('.bk-overlay').addClass("out");
        $("body").removeClass('bk-overlay-in');
        setTimeout(function () {
            $('.bk-overlay').remove();
        }, 1000);
        ACFn.display_message(R.messageTitle, '', 'success', null);
    }

    ACFn.Ticket_Reset = function (F, R) {
        $('.tab-ajax:first-child').removeClass('active');
        target = $('#autoajax ul');
        if(R.tab_id){
            $('#autoajax li').parent().find('li').removeClass("active");
            $('a[data-tabid=' + R.tab_id + ']').trigger('click');
        }else{
            $('li:first-child', target).removeClass('active');
            $('li:first-child a', target).trigger('click');
        }
        $('#single-ticket_'+R.ticket_id+' a').trigger('click');
        if(R.decision){
            $('#single-ticket_'+R.ticket_id+' a span').text(R.decision);
        }

        $('#modal-popup').modal('hide');
        $('.bk-overlay').removeClass("in");
        $('.bk-overlay').addClass("out");
        $("body").removeClass('bk-overlay-in');

        setTimeout(function () {
            $('.bk-overlay').remove();


        }, 1000);
        ACFn.display_message(R.messageTitle, '', 'success', null);
    }

    ACFn.append_associate_grid = function(F, R){
        var tab = $('[href="#related"]');
        tab.find('.notify').html('('+R.countt+')');
        $('#related').html(R.associatetask);
        $('#modal-popup').modal('hide');
        $('.bk-overlay').removeClass("in");
        $('.bk-overlay').addClass("out");
        $("body").removeClass('bk-overlay-in');

        setTimeout(function () {
            $('.bk-overlay').remove();


        }, 1000);
        ACFn.display_message(R.messageTitle, '', 'success', null);
    }

    ACFn.ajax_user_pwdCng = function(F, R){
        if(R.success){
            ACFn.display_message(R.messageTitle,'','success');
            $('#changepasswordBox').modal('hide');
        }
    }

    ACFn.ajax_user_settings = function(F, R){
        if(R.success){
            ACFn.display_message(R.messageTitle,'','success');
            $('#modal-popup').modal('hide');
        }
    };

    ACFn.ajax_download_file = function(F,R){
        if(R.success){
            window.location.href = R.download_url;
        }
    };

    ACFn.ajax_download_sr_file = function (F,R) {
        var dDownloadLink = $.trim(R.link);
        if (dDownloadLink.indexOf('http') > -1) {
            //window.location.href = $.trim(o.responseText);
            var blob = R.link;
            var link = document.createElement('a');
            link.href = blob;
            link.download = R.filename;
            // append the link to the document body
            document.body.appendChild(link);
            link.click();
            $('#modal-popup').modal('hide');
        } else {
            ACFn.display_message('There are some issues with this query. Please try another query.','success');
        }
    }

    $('body').on('mouseenter', '.ajax-Tooltip', function () {
        var url = $(this).data('href');
        var id = $(this).data('tooltip-id');
        $(this).data('popover-show', true);
        if ($(this).data('popover-loaded')) {
            $(this).tooltip('show');
        } else if (typeof (tooltip_data[id]) != 'undefined') {
            initAjaxTooltip($(this), tooltip_data[id]);
        } else {
            ACFn.sendAjax(url, 'GET', [], $(this), {
                progress: 'nprogress',
                showServerError: false
            });
        }

    })
    $('body').on('mouseleave', '.ajax-Tooltip', function () {
        $(this).data('popover-show', false);
        $(this).tooltip('hide');
    })

    $("body").on("click", ".nav li a", function () {
        if ($(this).data('toggle') == 'tab') {
            var target = $(this).attr('href');
            if ($(target).length) {
                if ($(target).find('.scroll-task').length) {
                    scroll_div_to_bottom($(target).find('.scroll-task'));
                }
            }
        }
    });

    if ($(".scroll-task").length) {
        $(".scroll-task").each(function (index, element) {
            // console.log("scroll to  bottom");
            scroll_div_to_bottom($(element));
        });
    }

    if (typeof (swal) == 'function') { console.log(swal);
        swal.mixin({
            customClass: 'wd_alert',
            padding: 10,
            animation: false
        });
    }
    //

    initJS($("body"));
    if (typeof (ACFn) != 'undefined') {
        ACFn.loadSideLayout = function (F, R) {
            $(".bk-overlay").remove();
            $("body").append(R.html);
            setTimeout(function () {
                $(".bk-overlay").addClass("in");
                $("body").addClass('bk-overlay-in');
                initJS($(".bk-overlay"));
            }, 50);
        };
        ACFn.loadModalLayout = function (F, R) {
            $("#modal-popup").remove();
            //$(".modal-backdrop ").remove();
            $("body").append(R.html);

            setTimeout(function () {
                $("#modal-popup").modal('show');
                //$('#modal-popup').modal({backdrop: true,show: true});
                //$('#modal-popup').find('.modal-dialog').draggable({handle: '.modal-header'});
                initJS($("#modal-popup"));

                /*$('#modal-popup').find('.modal-content').resizable({
                    minWidth: 625,
                    minHeight: 175,
                    handles: 'n, e, s, w, ne, sw, se, nw',
                })*/

               /* var $modal = $('#myModal');
                $modal.find('.modal-content')
                    .css({
                        width: 625,
                        height: 175,
                    })
                    .resizable({
                        minWidth: 625,
                        minHeight: 175,
                        handles: 'n, e, s, w, ne, sw, se, nw',
                    })
                    .draggable({
                        handle: '.modal-header'
                    });

                var launch = function () {
                    $modal.modal();
                }*/

                if(R.quillshow){
                    ACFn.runQuillEditor();
                }
            }, 50);
        }
    }
    $("body").on('click', '.bk-overlay .close, .bk-overlay [type="reset"]', function (e) {
        e.preventDefault();
        $(".note-popover").hide();
        $(this).parents('.bk-overlay').removeClass("in");
        $(this).parents('.bk-overlay').addClass("out");
        $("body").removeClass('bk-overlay-in');
        setTimeout(function () {
            $(this).parents('.bk-overlay').remove();
        }, 1000);
    });

    ACFn.loaddescriptiontab = function (F, R) {
        location.reload();
    }

    $("body").on('change', ".table-developer-percent", function () {
        var data = {
            percent_complete: $(this).val(),
            // id: $(this).parents("tr").data("id")
        };
        ACFn.sendAjax($(this).data('url'), 'get', data, $(this));
    });

    var dev_slider_timeout = null;
    $("body").on('change', ".dev_slider", function (slideEvt) { //change from slide
        var dev_slider = $(this);
        console.log(slideEvt);
        window.clearTimeout(dev_slider_timeout);
        dev_slider_timeout = window.setTimeout(function () {
            var data = {
                percent_complete: slideEvt.value.newValue
            };
            ACFn.sendAjax(dev_slider.data('url'), 'get', data, dev_slider);
        }, 1000);
        // console.log(slideEvt);
        // console.log($(this).val());

    });

    $("body").on("change", '.table-milestone-selector', function () {
        var data = {
            milestone_id: $(this).val()
        };
        ACFn.sendAjax($(this).data('url'), 'get', data, $(this));
    });


    $("body").on("change", '.table-tester-status', function (e) {
        // console.log(e);
        // e.preventDefault();
        var oldValue = '';
        var newValue = $(this).val();
        // console.log(oldValue);
        // console.log(newValue);
        var data = {
            decision: $(this).val()
        };
        $(this).val(oldValue);
        ACFn.sendAjax($(this).data('url'), 'get', data, $(this));
    });

    $("body").on("change", '.table-developer-status', function () {
        var data = {
            decision: $(this).val()
        };
        ACFn.sendAjax($(this).data('url'), 'get', data, $(this));
    });

    $("body").on("change", '.table-manager-status', function () {
        var data = {
            decision: $(this).val()
        };
        ACFn.sendAjax($(this).data('url'), 'get', data, $(this));
    });

    $("body").on("change", '.table-task-status', function () {
        // console.log(e);
        // e.preventDefault();
        var oldValue = '';
        var newValue = $(this).val();
         console.log(oldValue);
         console.log(newValue);
         if(newValue == "RECHECK"){
             $(this).val(oldValue);
         }

        var data = {
            status: newValue,
            // id: $(this).parents("tr").data("id")
        };
        ACFn.sendAjax($(this).data('url'), 'get', data, $(this));
    });

    $('body').on('click', function (e) {
        //did not click a popover toggle or popover
        // console.log('clicked2');
        if (!$(e.target).hasClass('dev_popover')
            && $(e.target).parents('.dev_popover').length === 0
            && $(e.target).parents('.popover.in').length === 0) {
            // console.log('clicked');
            if ($('.popover.in').length) {

                $('.popover.in').prev().popover('destroy');
            }
        }
    });

    $('body').on('click',".right-side-toggle",function () { console.log($('.right-sidebar').length)
        ACFn.sendAjax('/user/getpanel','GET',{},$('.right-sidebar'))
        $('.right-sidebar').addClass('shw-rside');

    });

    $('body').on('click',".ti-close",function () { console.log($('.right-sidebar').length)
            $('.right-sidebar').removeClass('shw-rside')
    });



    if (typeof SETTING_SELECT_COPY_CLIPBOARD != 'undefined' && SETTING_SELECT_COPY_CLIPBOARD) {
        var clipboardTimeout = null;
        $("body").on('mouseup', function (e) {
            // console.log(e);
            // console.log('isException : ' + CopyToClipboardObj.isException($(e.target)));

            if (
                $(e.target).parents('form').length > 0 || CopyToClipboardObj.isException(e.target)) {

            } else {
                // console.log($(e.target));
                window.clearTimeout(clipboardTimeout);
                clipboardTimeout = setTimeout(function () {
                    copyToClipboard();
                }, 300);
            }
        });
    }
});

function copyToClipboard() {
    var sel = getSelectedText();
    // console.log("'" + sel + "'");
    if (sel && sel.trim() != '') {
        if ($("#clipboardtextinput").length == 0) {
            var $temp = $("<input id='clipboardtextinput' type='hidden' >");
            $("body").append($temp);
        }
        var field = $("#clipboardtextinput");

        // $("div").text(sel);
        field.val(sel).select();
        document.execCommand("copy");
        clearSelectionClipboard();
        swal.fire({
            customClass: 'swal-wd swal-clipboard',
            title: 'Copied to clipboard',
            timer: 1500,
            backdrop: false,
            toast: true,
            animation: false,
            showConfirmButton: false
        });
        // $temp.remove();
    }
}

function getSelectedText() {
    if (window.getSelection) { // all browsers, except IE before version 7
        var selectionRange = window.getSelection();
        // console.log(selectionRange);
        if ($(selectionRange.anchorNode).is('input')) {
            return false;
        }
        return selectionRange.toString();
    } else {
        if (document.selection.type == 'None') {
            return false;
        } else {
            var textRange = document.selection.createRange();
            return textRange.text;
        }
    }
}

function clearSelectionClipboard() {
    if (document.selection) {
        document.selection.empty();
    } else if (window.getSelection) {
        window.getSelection().removeAllRanges();
    }
}

function print_notes(note_id, note_type) {
    var newWin = window.open();
    $.ajax({
        // The URL for the request
        url: "/WdProjects/ticket/print/" + note_type + "/" + note_id,
        // Whether this is a POST or GET request
        type: "GET",
        //data: form, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: false,
        // The type of data we expect back
        dataType: "json",
    })
        .done(function (json) {
            if (json.success == true) {


                newWin.document.write(json.html);
                setTimeout(function () {
                    newWin.document.close();
                    newWin.focus();
                    newWin.print();
                    newWin.close();
                }, 1000)
            } else {
                newWin.close();
                ACFn.display_message(json.messageTitle, json.messageTitle, 'success');
            }

        })
        // Code to run if the request fails; the raw request and
        // status codes are passed to the function
        .fail(function (xhr, status, errorThrown) {
            $(".preloader").hide();
            alert("Sorry, there was a problem!");
            console.log("Error: " + errorThrown);
            console.log("Status: " + status);
            console.dir(xhr);
        })// Code to run regardless of success or failure;
}

var PageTitleNotification = {
    Vars: {
        OriginalTitle: document.title,
        Interval: null,
        notification: {},
        speed: 2000,
        displayedNotifications: 0
    },
    On: function (notification, type, intervalSpeed) {
        var _this = this;
        clearInterval(_this.Vars.Interval);
        var speed = _this.Vars.speed;
        if (typeof intervalSpeed != 'undefined') {
            speed = intervalSpeed;
        }
        _this.Vars.notification[type] = notification;

        console.log(_this.Vars.notification);

        // var speed = (typeof intervalSpeed == 'int') ? intervalSpeed : 3000
        _this.Vars.Interval = setInterval(function () {
            var title = _this.Vars.OriginalTitle;
            var totalnotifications = 0;
            $.each(_this.Vars.notification, function (index, value) {
                totalnotifications++;
            });

            if (_this.Vars.displayedNotifications < totalnotifications) {
                _this.Vars.displayedNotifications++;
                var count = 0;
                $.each(_this.Vars.notification, function (index, value) {
                    count++;
                    if (count == _this.Vars.displayedNotifications) {
                        title = value;
                    }
                });
                // title = _this.Vars.displayedNotifications;
            } else {
                _this.Vars.displayedNotifications = 0;
            }
            document.title = title;

            // document.title = (_this.Vars.OriginalTitle == document.title)
            //     ? notification
            //     : _this.Vars.OriginalTitle;
        }, speed);
    },
    Off: function (type) {
        delete this.Vars.notification[type];
        var totalnotifications = 0;
        $.each(this.Vars.notification, function (index, value) {
            totalnotifications++;
        });
        if (totalnotifications == 0) {
            clearInterval(this.Vars.Interval);
        }
        document.title = this.Vars.OriginalTitle;
    }
}

function limitText(limitField, limitCount, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
    } else {
        limitCount.value = limitNum - limitField.value.length;
    }
}

function getFilters(F) {
    if (typeof F == 'undefined') {
        if($("#filter_milestone_form").length > 0){
            F = $("#filter_milestone_form");
        }else{
            F = $("#filter_form");
        }

    }
    var filters = [];
    var filtersFlag = false;
    if (F.length) {
        $.each(F.serializeArray(), function (index, element) {
            if (typeof filters[element.name] == 'undefined') {
                filters[element.name] = [];
            }
            if (element.value) {
                filters[element.name].push(element.value);
                filtersFlag = true;
            }
        });
    }
    var obj = $.extend({}, filters);
    if(filtersFlag == true){
        filtersApplied(obj, F);

    }else{
        if($("#filtersApplied").length > 0){
            $('#filtersApplied').remove();
            $('.clear-btn').hide();
        }
    }
    /*console.log('Form elements');
    console.log(obj);
    console.log('Form elements end------');*/
    return obj;
}

function filtersApplied(filters, $form) {
    if (typeof $form == 'undefined') {
        $form = $("#filter_form");
    }
    var key = null;
    for (var prop in filters) {
        if (filters.hasOwnProperty(prop)) {
            key++;
        }
    }
    if (key > 0 && $("#filtersApplied").length == 0) {
        //$("#collapseFilters").after('<ul id="filtersApplied" class="selected-filters" ></ul>');
        $(".after-filter").html('<ul id="filtersApplied" class="selected-filters" ></ul>'); //<button type="button" class="btn clear-btn" onclick="clearFilters()"><i class="fa fa-refresh" aria-hidden="true"></i> Clear Filter</button>

    }
    var fouter = $("#filtersApplied");
    fouter.empty();
    $.each(filters, function (name, element) {
        var elselect = $form.find("select[name='" + name + "']");
        var elinput = $form.find("input[name='" + name + "']");
        $.each(element, function (key, value) {
            if (value == '') {
                return;
            }
            var long_name = value;
            var elcheckbox = $form.find("[name='" + name + "'][value='" + value + "'][type='checkbox']");
            var elradio = $form.find("[name='" + name + "'][value='" + value + "'][type='radio']");
            if (elcheckbox.length && elcheckbox.next('label').length) {
                long_name = elcheckbox.next('label').html();
            } else if (elradio.length && elradio.next('label').length) {
                long_name = elradio.next('label').html();
            } else if (elselect.length) {
                var opt = elselect.find('option[value="' + value + '"]');
                if (opt.length) {
                    long_name = opt.html();
                }
            } else if (elinput.length) {
                var opr = $form.find("select[name='" + name + "_op_']").length ?  $form.find("select[name='" + name + "_op_']").val() : '';
                if(name.indexOf('-') != -1){
                    var fname = name.split('-');
                    var opr = $form.find("select[name='" + fname[1] + "_op_']").length ?  $form.find("select[name='" + fname[1] + "_op_']").val() : '';
                }


                long_name = elinput.attr('data-placeholder') + ' '+ opr + ' ' + elinput.val();
            }
            //console.log("not allowed----",elselect.data('notallowed'));
            if(elselect.data('notallowed') == false || elselect.data('notallowed') == undefined){
                fouter.append('<li class="selected-filter mr-1"><span>' + long_name + '</span><a href="#" class="removeFilter" data-name="' + name + '" data-value="' + value + '" ><i class="fa fa-times-circle"></i></a></li>');
                $(".clear-btn").show();
            }

        });

    });
}

function applyFilters() {
    delay(function(){
        $('#filter_form').submit();
    }, 1000 );

}

function custom_sorting(obj,index = 0) {
    var field_name = obj.data('field_name');
    var action = obj.attr('class');
    var aria_sort = obj.attr('aria-sort');

    if(aria_sort == undefined){
        action = 'ASC'
    }else if(aria_sort == 'descending'){
        action = 'ASC'
    }else if(aria_sort == 'ascending'){
        action = 'DESC'
    }else{
        action = 'ASC'
    }

    var url = $('.tab-ajax').data('href');
    var method = $('.tab-ajax').data('method');
    var tabid = $('.tab-ajax li a.active').data('tabid');

    var target = $('.tab-ajax li a.active');
    var filters = getFilters($('#filter_form'));
    $(target.attr('href')).css("opacity", "0.3");
    ACFn.sendAjax(url, method, {
        tabid: tabid,
        filters: filters,
        show_entries: 15,
        sort_column: field_name,
        sort_dir: action,
        column_index: index,
        mergeKeys : JSON.parse(localStorage.getItem('MergeKeys')),
    }, target);
}

function getType(type) {
    var t_type = '';
    switch (type) {
        case 'C':
            t_type = 'Campaign';
            break;
        case 'A':
            t_type = 'Report';
            break;
        case 'M':
            t_type = 'Model';
            break;
        case 'P':
            t_type = 'Profile';
            break;
        default:
            t_type = '';
            break;
    }
    return t_type;
}

function toggleView() {
    var $btn = $('#layout');
    var view = $btn.attr('data-view');
    if(view == 'Grid'){
        $('.grid-view').addClass('d-none')
        $('.table-view').removeClass('d-none');
        $btn.find('i').removeClass('fa-th-large').addClass('fa-th');
        view = 'Table';
    }else{
        $('.grid-view').removeClass('d-none');
        $('.table-view').addClass('d-none');
        $btn.find('i').removeClass('fa-th').addClass('fa-th-large');
        view = 'Grid';
    }
    $btn.attr('data-view', view)
}

function downloadESDLink(obj,type){
    var url = obj.data('href');
    var tab = obj.attr('data-tab');
    var t_type = getType(type);
    var singleid = $('#singleid').length ? $('#singleid').val() : '';
    var downloadableColumns = '';
    var existingEntries = [];
    var filters = [];
    var exist = false;
    if(tab === 'SingleCamp'){
        if(singleid === ''){
            $('#singleid').parents('.form-group').addClass('has-error');
            $('#singleid').after('<span class="error-block help-block">'+ t_type +' is required</span>');

            setTimeout(function () {
                ACFn.clear_errors($('#singlecamp_tab'));
            },2000)

            return false;
        }
        existingEntries = JSON.parse(localStorage.getItem("allEntries"));
        exist = true;
    }else //if(tab === 'Catalog')
    {
        getFilters($('#filter_form'));
        var table = $('#basic_table2');
        downloadableColumns = table.attr('data-columns-visible') ? table.attr('data-columns-visible') : '';
        exist = true;
    }

    if(exist === true){
        ACFn.sendAjax(url,'POST',{
            tab : tab,
            filters : filters,
            type : type,
            t_type : t_type,
            downloadableColumns : downloadableColumns,
            existingEntries : existingEntries,
            singleid : singleid
        },obj);
    }
}


function ajax_import_field_update(obj) {
    var table_name = obj.data('table_name');
    var primary_column = obj.data('primary_column');
    var primary_column_value = obj.data('primary_column_value');
    var fieldname = obj.data('field');
    var fieldvalue = obj.val();
    delay(function(){
        ACFn.sendAjax(baseUrl+'common/importquickupdate','POST',{
            primary_column : primary_column,
            primary_column_value : primary_column_value,
            fieldname : fieldname,
            fieldvalue : fieldvalue,
            tablename : table_name,
        })
    }, 1000 );
}


function yajraDatatables(elem,params = {}, url, type, postdata, dataType, columns, columnDefs, order = [[ 0, "desc" ]]){
    if(elem.length > 0){
        var getVisibleCols = function (visibleCols) {
            $.each(visibleCols,function (i,v) {
                elem.attr('data-columns-visible',JSON.stringify(v));
            })
        }

        var ytable = elem.DataTable({
            processing: false,//params.processing,
            serverSide: params.serverSide,
            searching: params.searching,
            paging: params.paging,
            lengthChange: params.lengthChange,
            pageLength: params.pageLength,
            dom: 'Bfrtip',
            buttons: [{
                extend: 'colvis',
                text: '<i class="fas fa-table ds-c"></i>',
                collectionLayout: 'fixed two-column'
            }],
            ajax: {
                url: url,
                'headers': {
                    'X-CSRF-TOKEN': $('[name="_token"]').val()
                },
                type: type,
                data: postdata,
                dataType: "JSON"
            },
            columns: columns,
            order : order,
            'columnDefs': columnDefs
        });

        getVisibleCols(ytable.columns(':visible'));

        $('.c-btn').html('');
        ytable.buttons().container()
            .appendTo( $('.c-btn') );

        elem.on('column-visibility.dt', function (e, settings, column, state) {
            var visibleCols = elem.DataTable().columns(':visible');
            var numCols = visibleCols.nodes().length;
            getVisibleCols(visibleCols);

            elem.attr('style','width:100% !important')
        });

        //setTimeout(function () {
            $('.dt-buttons').css({'padding-top' : '0px','margin-bottom' : '0px'});
            $('.dt-button').prop('title','Set Columns');
            $('.dt-button').prop('class','').addClass('btn btn-light d-none d-lg-block font-16');

            $('.c-btn').show();
        //},1000);
    }
}

var CopyToClipboardFunctions = function () {
    this.exceptions = [];
    this.addException = function (a) {
        this.exceptions.push(a);
    }
    this.isException = function (a) {
        var flag = false;
        $.each(this.exceptions, function (index, element) {
            if ($(a).parents(element).length) {
                flag = true;
            }
            // console.log(element);
        })
        return flag;
    }
}

var delay = (function(){
    var timer = 0;
    return function(callback, ms){
        clearTimeout (timer);
        timer = setTimeout(callback, ms);
    };
})();

window.CopyToClipboardObj = new CopyToClipboardFunctions();

