var url = window.location.origin;

function prepareHtml(i,j,_name)
{
    let html = '<br><div class="rowadded">\n' +
        '                    <div class="flex mb-1">\n' +
        '                        <div class="w-11/12 h-12">\n' +
        '                            <div class="intro-y w-auto mr-6 ">\n' +
        '                                <div class="relative">\n' +
        '                                    <input name="'+_name+'" class="input border w-full border-gray-400 appearance-none rounded-sm px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900" id="formID" type="text">\n' +
        '                                    <label for="formID" class="label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text">Previous Address* (i.e. last 3 years)</label>\n' +
        '                                </div>\n' +
        '                            </div>\n' +
        '                        </div>\n';

        if(i < 1)
        {
            html += '                        <div class="w-1/12 h-12" id="plus'+j+'">\n' +
                '                            <div class="intro-y inline-block float-right border p-3 rounded">\n' +
                '                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus" style="cursor:pointer;" id="more_fields" onclick="add_fields();"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>\n' +
                '                            </div>\n' +
                '                        </div>\n' ;
        }

        html += '                    </div>\n' +
        '                </div>';
        html +=  '<div id="dynamic'+j+'">';
        html += '</div>';
    return html;
}

let i = 0;

function add_fields(count=0) {
    if(count!=0)
    {
        i=count;
    }
    let name;
    if (i == 0){
        name = "second_previous_address";
    }else{
        name = "third_previous_address";
    }
    if (i < 2){
        $("#plus"+i).hide();
        const j = i + 1;
        const html = prepareHtml(i,j,name);
        $("#dynamic"+i).html(html);
        i++;
        refreshInputs();
    }else{
        alert("Maximum 3 address allowed");
    }
}

window.addEventListener("load", function() {
    const inputs = document.getElementsByClassName("input");
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('focusout', function() {
            console.log("name : "+ this.getAttribute("name"));
            if(this.value && this.getAttribute("noDraft") != "true")
                ajaxRequest(this.getAttribute("name"),this.value);
        });
    }
});

function update_draft(name, obj){
    console.log($(obj).val())
    ajaxRequest(name,$(obj).val());
}

function ajaxRequest(key,value) {
    let dataString={};
    dataString[key] = value;
    dataString["user_id"] = $("#user_id").val();
    if ($('#id').val()){
        dataString["id"] = $('#id').val();
    }else if(localStorage.getItem("id")) {
        dataString["id"] = localStorage.getItem("id");
    }
    dataString['request_stage'] = 2;
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
