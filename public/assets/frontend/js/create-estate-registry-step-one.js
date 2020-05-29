
localStorage.removeItem("id");
localStorage.removeItem("id_type");

var url = window.location.origin;

function prepareHtml(i)
{
    const input_class = 'input border border-gray-400 appearance-none rounded w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900';

    const html = '<br><div id="rowadded'+i+'" class="intro-y inline-block custom-width mr-6">' +
        '<div class="relative">' +
        '<input name="id_type[]" required class="'+input_class+'" ' +
        'id="executive" ' +
        'type="text">' +
        '<label for="executive" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">' +
        'What form of ID? *' +
        '</label>' +
        '</div>' +
        '</div>' +
        '<div class="intro-y inline-block custom-width mr-6">' +
        '<div class="relative">' +
        '<input name="id_number[]" ' +
        'class="'+input_class+'" required id="IDno" type="text">' +
        '<label for="IDno" ' +
        'class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">' +
        'ID No*' +
        '</label>' +
        '</div>' +
        '</div>' +
        '<div id="'+i+'" class="intro-y inline-block float-right border mr-5 p-3 rounded">' +
        '<span style="cursor: pointer;">' +
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus" id="more_fields" onclick="add_fields();"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>' +
        '</span>' +
        '</div><div id="dynamicContent'+i+'"></div>';
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



window.addEventListener("load", function() {
    const inputs = document.getElementsByClassName("input");
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('focusout', function() {
            console.log("name : "+ this.getAttribute("name"));
            if(this.value && this.getAttribute("noDraft") != "true" && this.getAttribute("name") != "id_type[]" && this.getAttribute("name") != "id_number[]")
                ajaxRequest(this.getAttribute("name"),this.value);
            if(this.getAttribute("name") == "id_type[]")
                localStorage.setItem("id_type",this.value);
        });
    }
});

function ajaxRequest(key,value) {
    let dataString={};
    if(key == "id_number[]")
    {
        dataString["id_type[]"] = localStorage.getItem("id_type");
    }
    dataString[key] = value;
    dataString["user_id"] = $("#user_id").val();
    if ($('#id').val()){
        dataString["id"] = $('#id').val();
    }else if(localStorage.getItem("id")) {
        dataString["id"] = localStorage.getItem("id");
    }
    dataString['request_stage'] = 1;
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
