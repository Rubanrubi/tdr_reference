
var url = window.location.origin;

function prepareHtml(i)
{
    const input_class = 'input border border-gray-400 appearance-none rounded w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900';

    const html = '<br><div id="rowadded'+i+'" >' +
        '<div class="flex mb-1"><div class="w-11/12 h-12">' +
        '<div class="intro-y w-auto mr-6 "><div class="relative">' +
        '<input name="creditor_name[]" onfocusout="storeCreditorDraft(this)" required class="'+input_class+'" ' +
        'id="creditor_name" ' +
        'type="text">' +
        '<label for="creditor_name" class="label font-sans absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">' +
        'Creditor Name</label>' +
        '</div></div>' +
        '</div>' +
        '<div id="'+i+'" class="intro-y inline-block float-right border mr-5 p-3 rounded">' +
        '<span style="cursor: pointer;">' +
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus" id="more_fields" onclick="add_fields();"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>' +
        '</span>' +
        '</div>' +
        '</div></div>' +
        '<div id="dynamicContent'+i+'"></div>';
    return html;
}


let index = 0;
function add_fields(count = 0) {
    if(count!=0)
    {
        index = count;
    }
    $("#"+index).hide();
    let next = index + 1;
    const html = prepareHtml(next);
    const element = document.getElementById("dynamicContent"+index);
    element.innerHTML = html;
    refreshInputs();
    index++;
}



// window.addEventListener("load", function() {
//     const inputs = document.getElementsByClassName("input");
//     for (var i = 0; i < inputs.length; i++) {
//         inputs[i].addEventListener('focusout', function() {
//             console.log("name : "+ this.getAttribute("name"));
//             if(this.value && this.getAttribute("name") != "creditor_name[]" && this.getAttribute("name") != "asset_type[]")
//                 ajaxRequest(this.getAttribute("name"),this.value);
//             if(this.getAttribute("name") == "asset_type[]")
//                 localStorage.setItem("asset_type",this.value);
//         });
//     }
// });

function storeCreditorDraft(obj){
    ajaxRequest('creditor_name[]',obj.value);
}

function storeAssetType(obj, id) {
    console.log("value : "+ obj.value);
    localStorage.setItem("asset_type",obj.value);
    localStorage.setItem("creditor_id",id);
}

function storeAssetDraft(obj) {
    console.log("value : "+ obj.value);
    ajaxRequest('account_number[]',obj.value);
}

function ajaxRequest(key,value) {
    let dataString={};
    if(key == "account_number[]")
    {
        dataString["asset_type[]"] = localStorage.getItem("asset_type");
        dataString["creditor_id[]"] = localStorage.getItem("creditor_id");
    }
    dataString[key] = value;
    dataString["user_id"] = $("#user_id").val();
    if ($('#id').val()){
        dataString["id"] = $('#id').val();
    }else if(localStorage.getItem("id")) {
        dataString["id"] = localStorage.getItem("id");
    }
    console.log(dataString);
    $.ajax({
        url: url+"/notifier/decedent-request/draft",
        dataType: "json",
        method: "POST",
        data: dataString
    }).done(function(success) {
        localStorage.setItem("id", success.id);
        $("#id").val(success.id);
    });
    //todo ajax error function
}

//multiselect functionality starts
$('.select21').select2({
    templateResult: formatState,
    templateSelection: formatState
});

function formatState(opt) {
    // console.log(opt);
    var optimage = $(opt).attr('title');
    // console.log(optimage)
    // var str = opt.text;
    // var res = str.replace(" ", "_");
    var $opt = $(
        '<span><img src="' + optimage + '" style="width: 40px;display: inline-block;height: 13px;    margin-top: -3px;" /> ' + opt.text.toUpperCase() + '</span>'
    );
    return $opt;
};


$('.select21').on("select2:select", function (e) {
    console.log(e.params.data);
    var data = e.params.data;
    var html = '<div class="intro-y mt-12" id="'+data.id+'">\n' +
        '                    <div class=" px-4 py-4 mb-3 xl:flex items-center ">\n' +
        '\n' +
        '                        <div class="w-32 h-32 border border-tdr-blue xl:mt-2 xl:flex bg-box-light-blue  rounded-md overflow-hidden">\n' +
        '                            <img alt="" class="object-scale-down" width="100%" src="'+data.title+'">\n' +
        '                            <i class="fas fa-times mt-2 mr-2" ></i>\n' +
        '                        </div>' +
        '                           <input type="hidden" name="creditor_id[]" value="'+data.id+'" id="creditor_id">\n' +
        '                        <div class="xl:ml-6">\n' +
        '                            <div class="relative mb-4">\n' +
        '                                <input name="asset_type[]" onfocusout="storeAssetType(this,'+data.id+')" class="input border border-gray-400 appearance-none rounded-l  w-37 px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900" id="asset_type_1"\n' +
        '                                       type="text">\n' +
        '                                <label for="asset_type_1" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base font-sans mt-2 cursor-text">Asset type or service (Credit card, Mortgage Electric, Telecom)</label>\n' +
        '                            </div>\n' +
        '\n' +
        '                            <div class="relative">\n' +
        '                                <input name="account_number[]" onfocusout="storeAssetDraft(this)" class="input border border-gray-400 appearance-none rounded-l w-37 px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900" id="account_no_1"\n' +
        '                                       type="number">\n' +
        '                                <label for="account_no_1" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base font-sans mt-2 cursor-text">Account Number</label>\n' +
        '                            </div>\n' +
        '                        </div>\n' +
        '                    </div>\n' +
        '                </div>';


    var mob_html = '<div class="intro-y mt-12">\n' +
        '                    <div class=" px-4 py-4 mb-3 xl:flex items-center ">\n' +
        '\n' +
        '                        <div class="w-32 h-32 flex border border-tdr-blue xl:mt-2 xl:flex bg-box-light-blue  rounded-md overflow-hidden">\n' +
        '                            <img alt="" class="object-scale-down" width="100%" src="'+data.title+'">\n' +
        '                            <i class="fas fa-times mt-2 mr-2" ></i>\n' +
        '                        </div>\n' +
        '                        <div class="xl:ml-6 mt-5">\n' +
        '                            <div class="relative mb-4">\n' +
        '                                <input class="input border border-gray-400 appearance-none rounded-l w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900" id="asset_type_1"\n' +
        '                                       type="text">\n' +
        '                                <label for="asset_type_1" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base font-sans mt-2 cursor-text">Asset type or service </label>\n' +
        '                            </div>\n' +
        '\n' +
        '                            <div class="relative">\n' +
        '                                <input class="input border border-gray-400 appearance-none rounded-l w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900" id="account_no_1"\n' +
        '                                       type="number">\n' +
        '                                <label for="account_no_1" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base font-sans mt-2 cursor-text">Account Number</label>\n' +
        '                            </div>\n' +
        '                        </div>\n' +
        '                    </div>\n' +
        '                </div>';


    $('#multiselect_web').append(html);
    $('#multiselect_mobile').append(mob_html);
});

$('.select21').on("select2:unselect", function (e) {
    var data = e.params.data;
    $("#"+data.id).remove();
});

//multiselect functionality ends

//participating modal starts
$(".close_modal").click(function() {
    $("#large-modal-size-preview").hide();
    $('body').removeClass("overflow-y-hidden");
});
$(".open_modal").click(function() {
    $("#large-modal-size-preview").show();
    $('body').addClass("overflow-y-hidden");
});

function box_select(id)
{
    if ($('.checkbox'+id).is(':checked')) {

        $('.bank'+id).removeClass("box-unselect");
        $('.bank'+id).addClass("box-select");

    } else {

        $('.bank'+id).removeClass("box-select");
        $('.bank'+id).addClass("box-unselect");
    }
}

function store_participants() {
    var val = [];
    $(':checkbox:checked').each(function(i){
        val[i] = $(this).val();
    });
    ajaxRequest('participating_creditors[]',val);
    localStorage.setItem("participating_creditors",val);
    $("#large-modal-size-preview").hide();
    $('body').removeClass("overflow-y-hidden");
}

//participating modal ends
