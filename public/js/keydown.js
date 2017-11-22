
var __0_KEYCODE = 48;
var __1_KEYCODE = 49;
var __2_KEYCODE = 50;
var __3_KEYCODE = 51;
var __4_KEYCODE = 52;
var __5_KEYCODE = 53;
var __6_KEYCODE = 54;
var __7_KEYCODE = 55;
var __8_KEYCODE = 56;
var __9_KEYCODE = 57;

var __A_KEYCODE = 65;
var __B_KEYCODE = 66;
var __C_KEYCODE = 67;
var __D_KEYCODE = 68;
var __E_KEYCODE = 69;
var __F_KEYCODE = 70;
var __G_KEYCODE = 71;
var __H_KEYCODE = 72;
var __I_KEYCODE = 73;
var __J_KEYCODE = 74;
var __K_KEYCODE = 75;
var __L_KEYCODE = 76;
var __M_KEYCODE = 77;
var __N_KEYCODE = 78;
var __O_KEYCODE = 79;
var __P_KEYCODE = 80;
var __Q_KEYCODE = 81;
var __R_KEYCODE = 82;
var __S_KEYCODE = 83;
var __T_KEYCODE = 84;
var __U_KEYCODE = 85;
var __V_KEYCODE = 86;
var __W_KEYCODE = 87;
var __X_KEYCODE = 88;
var __Y_KEYCODE = 89;
var __Z_KEYCODE = 90;

var __LEFT_WINDOW_KEYCODE = 91;
var __RIGHT_WINDOW_KEYCODE = 92;
var __SELECT_KEYCODE = 93;
var __NUMPAD_0_KEYCODE = 96;
var __NUMPAD_1_KEYCODE = 97;
var __NUMPAD_2_KEYCODE = 98;
var __NUMPAD_3_KEYCODE = 99;
var __NUMPAD_4_KEYCODE = 100;
var __NUMPAD_5_KEYCODE = 101;
var __NUMPAD_6_KEYCODE = 102;
var __NUMPAD_7_KEYCODE = 103;
var __NUMPAD_8_KEYCODE = 104;
var __NUMPAD_9_KEYCODE = 105;
var __MULTIPLY_KEYCODE = 106;
var __ADD_KEYCODE = 107;
var __SUBTRACT_KEYCODE = 109;
var __DECIMAL_POINT_KEYCODE = 110;
var __DIVIDE_KEYCODE = 111;

var __F1_KEYCODE = 112;
var __F2_KEYCODE = 113;
var __F3_KEYCODE = 114;
var __F4_KEYCODE = 115;
var __F5_KEYCODE = 116;
var __F6_KEYCODE = 117;
var __F7_KEYCODE = 118;
var __F8_KEYCODE = 119;
var __F9_KEYCODE = 120;
var __F10_KEYCODE = 121;
var __F11_KEYCODE = 122;
var __F12_KEYCODE = 123;

var __NUM_LOCK_KEYCODE = 144;
var __SCROLL_LOCK_KEYCODE = 145;
var __SEMI_COLON_KEYCODE = 186;
var __EQUAL_SIGN_KEYCODE = 187;
var __COMMA_KEYCODE = 188;
var __DASH_KEYCODE = 189;
var __PERIOD_KEYCODE = 190;
var __FORWARD_SLASH_KEYCODE = 191;
var __GRAVE_ACCENT_KEYCODE = 192;
var __OPEN_BRACKET_KEYCODE = 219;
var __BACK_SLASH_KEYCODE = 220;
var __CLOSE_BRAKET_KEYCODE = 221;
var __SINGLE_QUOTE_KEYCODE = 222;
var __BACKSPACE_KEYCODE = 8;
var __TAB_KEYCODE = 9;
var __ENTER_KEYCODE = 13;
var __SHIFT_KEYCODE = 16;
var __CTRL_KEYCODE = 17;
var __ALT_KEYCODE = 18;
var __PAUSE_BREAK_KEYCODE = 19;
var __CAPS_LOCK_KEYCODE = 20;
var __ESCAPE_KEYCODE = 27;
var __PAGE_UP_KEYCODE = 33;
var __PAGE_DOWN_KEYCODE = 34;
var __END_KEYCODE = 35;
var __HOME_KEYCODE = 36;
var __LEFT_ARROW_KEYCODE = 37;
var __UP_ARROW_KEYCODE = 38;
var __RIGHT_ARROW_KEYCODE = 39;
var __DOWN_ARROW_KEYCODE = 40;
var __INSERT_KEYCODE = 45;
var __DELETE_KEYCODE = 46;

var IntervalID = null;
var Counter = 0;

var btnsave_id = "btnSave";
var btnnew_id = "btnNew";
var btnedit_id = "btnEdit";
var btndelete_id = "btnDelete";
var btnview_id = "btnView";
var btnadd_id = "btnAdd";

var particularElementHasFocus;

window.onkeydown = function (e) {
    var code = e.keyCode ? e.keyCode : e.charCode;
    var isAltKeyDown = e.altKey ? true : false;

    if (isAltKeyDown && code == __S_KEYCODE) {
        e.preventDefault();
        if (findById(btnsave_id) != null) {
            if (findById(btnsave_id).getAttribute("alt") != "New")
                findById(btnsave_id).click();
        }
    } else if (isAltKeyDown && code == __N_KEYCODE) {
        e.preventDefault();
        if (findById(btnnew_id) != null)
            findById(btnnew_id).click();
        else {
            if (findById(btnsave_id) != null) {
                if (findById(btnnew_id).getAttribute("alt") == "New")
                    findById(btnsave_id).click();
            }
        }
    } else if (isAltKeyDown && code == __E_KEYCODE) {
        e.preventDefault();
        if (findById(btnedit_id) != null)
            findById(btnedit_id).click();
        else {
            if (findById(btnreset_id) != null) {
                if (findById(btnreset_id).getAttribute("alt") == "Edit")
                    findById(btnreset_id).click();
            }
        }
    } else if (isAltKeyDown && code == __D_KEYCODE) {
        e.preventDefault();
        if (findById(btndelete_id) != null)
            findById(btndelete_id).click();
        else {
            if (findById(btnreset_id) != null) {
                if (findById(btnreset_id).getAttribute("alt") == "Delete")
                    findById(btnreset_id).click();
            }
        }
    } else if (isAltKeyDown && code == __U_KEYCODE) {
        e.preventDefault();
        if (findById(btnupdate_id) != null)
            findById(btnupdate_id).click();
    }else if (isAltKeyDown && code == __V_KEYCODE){
        e.preventDefault();
        if (findById(btnview_id) != null)
            findById(btnview_id).click();
    }else if (isAltKeyDown && code == __A_KEYCODE){
        e.preventDefault();
        if (findById(btnadd_id) != null)
            findById(btnadd_id).click();
    }
}

function findById(element) {
    return document.getElementById(element);
}

$(document).ready(function () {
    $('input:text,textarea').keydown(function (e) {
        var code = e.keyCode ? e.keyCode : e.charCode;
        if (code == 121) {
            $(particularElementHasFocus).closest('.input-group').find('button').click();
        }

        if (code == 13 || code == 9) {
            var status = false;

            e.preventDefault();
            var ntabindex = parseFloat($(this).attr('tabindex')) + 1;

            while (!status) {
                if ($('input[tabindex=' + ntabindex + ']').prop('disabled'))
                    ntabindex++;
                else
                    status = true;
            }

            $('input[tabindex=' + ntabindex + '],textarea[tabindex=' + ntabindex + '],button[tabindex=' + ntabindex +'],select[tabindex=' + ntabindex +']').focus();
        }
    });

});