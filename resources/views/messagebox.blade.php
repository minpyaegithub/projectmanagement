<link rel="stylesheet" href="{!! asset('css/messagebox.css') !!}">

{{--
<style type="text/css">
    .vertical-alignment-helper {
        display:table;
        height: 100%;
    }
    .vertical-align-center {
        /* To center vertically */
        display: table-cell;
        vertical-align: middle;
    }
    #events {
        margin-bottom: 1em;
        padding: 1em;
        background-color: #f6f6f6;
        border: 1px solid #999;
        border-radius: 3px;
        height: 100px;
        overflow: auto;
    }
</style>
--}}

<!--Browser Modal content-->
{{--<div class="modal fade" id="browse_modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-header-info" style="padding:8px;">
                <button type="button" id="btnclose" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title pull-left" id="myModalLabel" style="color:White; font-weight:bold;">asfasd</h4>
            </div>
            <div class="modal-body" style="padding:8px;">
            </div>
            <div class="modal-footer" style="padding:5px;">
                <button id="btnCancel" type="submit" class="btn btn-info pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
        </div>
    </div>
</div>

<!--Master Modal content-->
<div class="modal fade" id="master_modal" role="dialog" >
    <div class="modal-dialog modal-xlg" style="margin-top:10px;">
        <div class="modal-content">
            <div class="modal-body" style="padding:0px; height:550px;">
            </div>
            <div class="modal-footer" style="padding:5px;">
                <button id="Button1" type="submit" class="btn btn-info pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
        </div>
    </div>
</div>

<!--Loading Modal Start here-->
<div class="modal fade" id="mdLoading" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog modal-sm vertical-align-center loading-style ">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="progress" style="margin:0px;">
                        <div class="progress-bar progress-bar-info
                        progress-bar-striped active"
                             style="width: 100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal ends Here -->

<!--Browser Modal content-->
<div class="modal fade" id="loading_box" tabindex="-2" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog modal-sm vertical-align-center loading-style ">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="progress" style="margin:0px;">
                        <div class="progress-bar progress-bar-info
                        progress-bar-striped active"
                             style="width: 100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="info_messagebox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header modal-header-info">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;</button>
                <h4 class="modal-title pull-left" id="H2">Confirmation!</h4>
            </div>
            <div class="modal-body">
                Body
            </div>
            <div class="modal-footer" style="padding:10px;">

                <button type="button" class="btn btn-success btn-ok" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span> Close
                </button>
            </div>
        </div>
    </div>
</div>--}}

<div class="modal fade" id="confirm_messagebox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header modal-header-info">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;</button>
                <h4 class="modal-title pull-left" id="H1">Confirmation!</h4>
            </div>
            <div class="modal-body">
                Body
            </div>
            <div class="modal-footer" style="padding:10px;">

                <button type="button" class="btn btn-success btn-ok" id="btnYes" data-dismiss="modal">
                    <span class="glyphicon glyphicon-ok" onclick="_unload_message_lookup();"></span> Yes
                </button>

                <button type="button" class="btn btn-danger btn-default" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span> No
                </button>

            </div>
        </div>
    </div>
</div>

<div class="confirm">

</div>


<div class="alert alert-success alert-dismissible fade in hide-me" hid aria-hidden="true" tabindex="-1">
    <strong>Success!</strong>
    <label id="LblSuccessMessage" runat="server" clientidmode="Static" style="font-weight:normal;"/>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="alert alert-info alert-dismissible fade in hide-me" hid aria-hidden="true" tabindex="-1">
    <strong>Info!</strong>
    <label id="LblInfoMessage" runat="server" runat="server" clientidmode="Static" style="font-weight:normal;"/>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="alert alert-warning alert-dismissible fade in hide-me" hid aria-hidden="true" tabindex="-1">
    <strong>Warning!</strong>
    <label id="LblWarningMessage" runat="server" clientidmode="Static" style="font-weight:normal;"/>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="alert alert-danger alert-dismissible fade in hide-me" hid aria-hidden="true" tabindex="-1">
    <strong>Fail!</strong>
    <label id="LblDangerMessage" runat="server" clientidmode="Static" style="font-weight:normal;"/>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>


<script type="text/javascript">
    /*var sorting;
    var method_name;
    var grid;
    var iurl;*/

    $(document).ready(function () {
    });

   /* function __show_master_modal(url) {
        $("#master_modal .modal-body").html('<iframe width="100%" height="100%" frameborder="0" scrolling="auto" allowtransparency="true" src="' + url + '"></iframe>');
        setTimeout(remove_header, 500);
    }

    function remove_header() {
        $('#master_modal').modal({ "backdrop": "static" });
        $('#master_modal .modal-body > iframe').contents().find('div.header').remove();
        $('#master_modal .modal-body > iframe').contents().find('div.main').css('padding-top', '2px');
        $('#master_modal .modal-body > iframe').contents().find('button#btnList').remove();
    }

    function __show_modal(query, fields, mode, sort, title) {
        sorting = sort;

        $('#mdLoading').modal('show');
        $('#browse_modal .modal-title').html(title);

        $.ajax({
            type: "POST",
            url: "../Controller/Controller.aspx/BrowseData",
            data: "{query: '" + query + "', fields: '" + fields + "', mode: 'browser'}",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: Success_Modal,
            error: Failure_Modal
        });
    }

    ///Link Database Modal
    function __show_linkdb_modal(query, fields, mode, sort, title) {
        sorting = sort;

        $('#mdLoading').modal('show');
        $('#browse_modal .modal-title').html(title);

        $.ajax({
            type: "POST",
            url: "../Controller/Controller.aspx/BrowseLinkDBData",
            data: "{query: '" + query + "', fields: '" + fields + "', mode: 'browser'}",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: Success_Modal,
            error: Failure_Modal
        });
    }

    function Success_Modal(response) {
        var v = response.d;

        $('#mdLoading').modal('hide');
        $('#browse_modal .modal-body').html(v);
        $('div.dataTables_filter input').focus();

        setTimeout(__load_modal, 500);
    }

    function __load_modal() {
        $('#browse_modal').modal({ "backdrop": "static" });

        var table = $('#result').DataTable({
            select: true,
            order: [1, sorting],
            "columnDefs": [
                {
                    "targets": [0],
                    'searchable': false,
                    "visible": false
                }]
        });

        table.on('select', function (e, dt, type, indexes) {
            var rowData = table.rows(indexes).data().toArray();
            var data = table.row(indexes).data();
            unLoad_Lookup(data);
            //$("#btnCancel").click();
        });

        var input = $('div.dataTables_filter input');
        setTimeout(function () {
            input.focus();
        }, 500);
    }

    function Failure_Modal(xhr, status, error) {
        $('#mdLoading').modal('hide');

        alert("responseText=" + xhr.responseText +
            "\n textStatus=" + status + "\n errorThrown=" + error);
    }

    function __show_loading() {
        $('#loading_box').modal('show');
    }

    function __hide_loading() {
        $('#loading_box').modal('hide');
        $('.modal-backdrop').remove();
    }

    function __show_confirm_delete_all(msgtype, gridid) {
        ___deleted_mode = 'deleteall';
        var message = 'Are you sure you want to delete?';
        grid = gridid;

        $('#confirm_messagebox').modal({ backdrop: 'static', keyboard: false });
        $('#confirm_messagebox').modal('show');
        $('#confirm_messagebox .modal-body').html(message);
    }

    function __show_confirm_box(message, method) {
        ___deleted_mode = 'confirm';
        method_name = method;

        $('#confirm_messagebox').modal({ backdrop: 'static', keyboard: false });
        $('#confirm_messagebox').modal('show');
        $('#confirm_messagebox .modal-body').html(message);
    }

    function __show_master_box(url) {
        ___deleted_mode = 'addnew';
        iurl = url;

        $('#confirm_messagebox').modal({ backdrop: 'static', keyboard: false });
        $('#confirm_messagebox').modal('show');
        $('#confirm_messagebox .modal-body').html('Not found! Do you want to add new?');
    }


    function __hide_confirm_message() {
        $('#confirm_messagebox').modal('hide');
    }

    function __show_message(title, message) {

        $('#info_messagebox').modal({ backdrop: 'static', keyboard: false });
        $('#info_messagebox').modal('show');
        $('#info_messagebox .modal-title').html(title);
        $('#info_messagebox .modal-body').html(message);

    }

    function __hide_message() {
        $('#info_messagebox').modal('hide');
    }*/

    function __show_success_alert(message) {
        $('#LblSuccessMessage').html(message);
        $('.alert-success').show();

        $(".alert-success").delay(3000).slideUp(400, function () {
            $('.alert').hide();
        });
    }

    function __show_info_alert(message) {
        $('#LblInfoMessage').html(message);
        $('.alert-info').show();

        $(".alert-info").delay(3000).slideUp(400, function () {
            $('.alert').hide();
        });
    }

    function __show_warning_alert(message) {
        $('#LblWarningMessage').html(message);
        $('.alert-warning').show();

        $(".alert-warning").delay(3000).slideUp(400, function () {
            $('.alert').hide();
        });
    }

    function __show_danger_alert(message) {
        $('#LblDangerMessage').html(message);
        $('.alert-danger').show();

        $(".alert-danger").delay(3000).slideUp(400, function () {
            $('.alert').hide();
        });
    }

    function _show_confirm_message(msgtype) {
        var message = '';
        __deleted_status = msgtype;

        if (msgtype == 1) //logout
            message = 'Are you sure you want to logout?';
        else if (msgtype == 2) //exit
            message == 'Are you sure you want to exit?';
        else//delete
            message = 'Are you sure you want to delete?';

        $('#confirm_messagebox').modal({ backdrop: 'static', keyboard: false });
        $('#confirm_messagebox').modal('show');
        $('#confirm_messagebox .modal-body').html(message);
    }

    function _unload_message_lookup() {
        var id = $("#btnEdit").val();
        if (__deleted_status == 'delete')
            fun_delete(id);

        return true;
    }

   /* function __hide_alert() {
        $('.alert').hide();
    }

    function unLoad_Lookup(rowData) {
        _do_PostBack(rowData);
        //setTimeout(function () { $("#browse_modal").modal("hide") }, 3000);
        $("#btnCancel").click();
        //  $('#browse_modal').modal('hide');
        //$('.modal-backdrop').remove();
        return false;
    }*/
</script>
