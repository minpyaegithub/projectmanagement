
function __disable(val) {
    $('[type=text],input[type=password],input[type=checkbox],input[type=radio],textarea,select').prop("disabled", val);
}

function __button_bind() {
    $("#btnNew").prop("disabled", false);
    $("#btnSave").prop("disabled", true);
    $("#btnUpdate").prop("disabled", true);
    $("#btnEdit").prop("disabled", false);
    $("#btnDelete").prop("disabled", false);
    $("#btnList").prop("disabled", false);
}

function __reload() {
    window.setTimeout(function(){
        location.reload();
    } ,1000);
}

function __delete(id) {
  $.confirm({
        title: 'Confirm!',
        content: 'Are you sure want to delete??',
        type: 'dark',
        typeAnimated: true,
        animationBounce: 2.5,
        autoClose: 'close|6000',
        buttons: {
            ok: {
                text: 'OK',
                btnClass: 'btn-dark',
                action: function () {
                    fun_delete(id);
                }
            },
            close: function () {

            }
        }
    });
}

function __logout() {
    $.confirm({
        title: 'Confirm!',
        content: 'Are you sure want to Logout??',
        type: 'purple',
        animationBounce: 2.5,
        autoClose: 'ok|6000',
        buttons: {
           ok: {
                text: 'OK',
                btnClass: 'btn-dark',
                action: function () {
                var url =  document.location.protocol + '//' + document.location.host + '/' +  'users/logout';
                alert(url);
                window.location.href = url;
                }
            },
            close: function () {

            }
        }
    });
}

function __dataTable() {

    $('.table').DataTable({

       /* buttons: [
        'excel','pdf'
    ],
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excelHtml5',
                customize: function(xlsx) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
     
                    // Loop over the cells in column `C`
                    $('row c[r^="C"]', sheet).each( function () {
                        // Get the value
                        if ( $('is t', this).text() == 'java' ) {
                            $(this).attr( 's', '20' );
                        }
                    });
                }
            }],*/

        drawCallback : function() {
            $.contextMenu({
                selector: 'tbody tr td',
                callback: function(key, options) {
                    var id = options.$trigger[0].parentElement.id;
                    alert(id);
                    var m = "clicked: " + key + ' ' + id;
                    window.console && console.log(m) || alert(m);
                     switch (key) {
                     case 'edit' :
                         //fun_edit(id);
                         //alert(id);
                     break;
                     case 'delete' :
                     alert(id);
                     break;
                     }
                },
                items: {
                    "edit": {name: "Edit", icon: "edit"},
                    "cut": {name: "Cut", icon: "cut"},
                    copy: {name: "Copy", icon: "copy"},
                    "paste": {name: "Paste", icon: "paste"},
                    "delete": {name: "Delete", icon: "delete"},
                    "sep1": "---------",
                    "quit": {name: "Quit", icon: function(){
                        return 'context-menu-icon context-menu-icon-quit';
                    }}
                }
            });
        },


         /*buttons: [
             'copy', 'excel', 'pdf'
         ],*/

        responsive: true,
        autoFill: false,
        colReorder: true,
        fixedColumns: false,
        fixedHeader: true,
        keys: false,
        select: false,



        /*rowGroup: {
            dataSrc: 'group'
        },*/
        /*rowReorder: false,*/

        //scroll

         /*scrollY:        200,
         deferRender:    false,
         scroller:       false,*/
        //end scroll



       /* "fnRowCallback": function(nRow) {
            console.log("fnRowCallback");
            $(nRow).on('mousedown', function (e) {
                if (e.button == 2) {
                    console.log('Right mouse button!');
                    return false;
                }
                return true;
            });
            document.oncontextmenu = function() {return false;};
        }*/


    });
    $('div.dataTables_filter input').focus();

}


function _dateNow() {
    var date = new Date();
    return new Date(date.getFullYear(), date.getMonth(), date.getDate());
}

function _getDateYMD(date) {
    return __startZero(date.getFullYear(), 4) + '' + __startZero((date.getMonth() + 1), 2) + '' + __startZero(date.getDate(), 2);
}

function _getDateDMY(str) {
    if (str.length === 10) {
        var year = str.substring(0, 5);
        var month = str.substring(5, 8);
        var day = str.substring(8, 10);

        return year + month  + day;
    }
    /*else {
        alert('Invalid Date!');
        return _dateNow();
    }*/
}

function __redirectpage(page) {
    $(location).attr('href', page);
}

